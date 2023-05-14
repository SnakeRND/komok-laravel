<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\PlaceBlock;
use App\Services\ResizeService;
use Illuminate\Support\Facades\Storage;

class PlaceController extends LayoutController
{
    public function index()
    {
        $data['blocks_on_place'] = PlaceBlock::all()->keyBy('id');

        $data['blocks_on_place']->each(function($item) {
            if ($item->emphasized_text)
                $item->headline = str_replace($item->emphasized_text, '', $item->headline);
            if ($item->pictures) {
                $item->pictures = json_decode($item->pictures, true);
                $item->pictures = collect($item->pictures)->map(function($picPath) {
                    if (!Storage::disk('public')->exists($picPath))
                        return false;
                    return ResizeService::resize(
                        Storage::path('public/' . $picPath),
                        'public',
                        1430, 774
                    );
                })->toArray();
            }
        });

        return view('place', [
            'blocks_on_place' => $data['blocks_on_place'],
            'settings'=> $this->getLayoutSettings(),
            'meta' => $this->getMeta(),
            'features' => Feature::all()->each(function(&$item) {
                $tmp = json_decode($item['picture'], true);
                $item['picture'] = (is_array($tmp) && !empty($tmp)) ?
                    json_decode($item['picture'], true)[0]['download_link'] :
                    "#";
            })
        ]);
    }
}
