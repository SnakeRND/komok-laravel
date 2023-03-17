<?php

namespace App\Http\Controllers;

use App\Models\AboutBlock;
use App\Models\Program;
use App\Models\Shift;
use App\Models\Skill;

class AboutController extends LayoutController
{
    public function index()
    {
        $data['blocks_on_about'] = AboutBlock::all()->keyBy('id');

        $data['blocks_on_about']->each(function($item) {
            if ($item->emphasized_text)
                $item->headline = str_replace($item->emphasized_text, '', $item->headline);
        });

        $shifts = Shift::all();
        $shifts->each(function($item) {
            $item->programs = Program::query()->whereIn('id', json_decode($item->programs, true))->get();
            $item->programs->each(function(&$item) {
                $tmp = json_decode($item['picture'], true);
                $item['picture'] = (is_array($tmp) && !empty($tmp)) ?
                    json_decode($item['picture'], true)[0]['download_link'] :
                    "#";
            });
        });

        $programs = Program::all();

        $skills = Skill::all();
        $skills->each(function(&$item) {
            $tmp = json_decode($item['picture'], true);
            $item['picture'] = (is_array($tmp) && !empty($tmp)) ?
                json_decode($item['picture'], true)[0]['download_link'] :
                "#";
        });
        return view('about', [
            'blocks_on_about' => $data['blocks_on_about'],
            'settings'=> $this->getLayoutSettings(),
            'meta' => $this->getMeta(),
            'shifts' => $shifts,
            'skills' => $skills,
            'programs' => $programs
        ]);
    }
}
