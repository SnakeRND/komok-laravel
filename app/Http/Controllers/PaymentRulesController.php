<?php

namespace App\Http\Controllers;



class PaymentRulesController extends LayoutController
{
    public function index()
    {
        return view('payment_rules', [
            'settings'=> $this->getLayoutSettings(),
            'meta' => $this->getMeta()
        ]);
    }
}
