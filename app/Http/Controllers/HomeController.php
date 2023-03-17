<?php

namespace App\Http\Controllers;

use App\Models\MainBlock;

class HomeController extends LayoutController
{
    public function index()
    {
        $data['blocks_on_main'] = MainBlock::all()->keyBy('id');

        $data['blocks_on_main']->each(function($item) {
            if ($item->emphasized_text)
                $item->headline = str_replace($item->emphasized_text, '', $item->headline);
        });

        return view('home', [
            'blocks_on_main' => $data['blocks_on_main'],
            'settings'  => $this->getLayoutSettings(),
            'meta'  => $this->getMeta()
        ]);
    }
}
