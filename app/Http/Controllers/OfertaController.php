<?php

namespace App\Http\Controllers;



class OfertaController extends LayoutController
{
    public function index()
    {
        return view('oferta', [
            'settings'=> $this->getLayoutSettings(),
            'meta' => $this->getMeta()
        ]);
    }
}
