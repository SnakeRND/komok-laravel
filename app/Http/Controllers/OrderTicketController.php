<?php

namespace App\Http\Controllers;

use App\Models\OrderTicket;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class OrderTicketController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'phone' => ['required_without:mail'],
            'mail' => ['required_without:phone'],
            'shift' => [],
        ], [
            'name.required' => 'Необходимо заполнить имя',
            'phone.required_without' => 'Необходимо заполнить телефон или почту',
            'mail.required_without' => 'Необходимо заполнить телефон или почту',
        ]);

        if ($validator->fails())
            return Redirect::to(URL::previous() . "#orderTicket")
                ->withErrors($validator)
                ->withInput();

        /** @var OrderTicket $orderTicket */
        $orderTicket = OrderTicket::create($validator->validated());

        Mail::to(
            Setting::query()
                ->where('key', 'site.form_email')
                ->first()->value
        )->send(new \App\Mail\OrderTicket($orderTicket));

        Mail::to(
            $orderTicket->getAttributeValue('mail')
        )->send(new \App\Mail\AnketaTicket($orderTicket)
            );


        return Redirect::to(URL::previous() . "#orderTicket")
            ->with('success', 'Заявка отправлена, скоро наш менеджер с вами свяжется.');
    }
}
