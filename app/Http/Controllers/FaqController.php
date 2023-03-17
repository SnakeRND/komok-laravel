<?php

namespace App\Http\Controllers;

use App\Models\FaqBlock;

class FaqController extends LayoutController
{
    public function index()
    {
        $data['blocks_on_faq'] = FaqBlock::all();

        return view('faq', [
            'blocks_on_faq' => $data['blocks_on_faq'],
            'settings'  => $this->getLayoutSettings(),
            'meta'  => $this->getMeta()
        ]);
    }
}
