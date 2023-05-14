<?php

namespace App\Http\Controllers;



class PaymentController extends LayoutController
{
    public function index()
    {
        return view('payment', [
            'settings'=> $this->getLayoutSettings(),
            'meta' => $this->getMeta()
        ]);
    }
}
