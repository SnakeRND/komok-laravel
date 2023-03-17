<?php

namespace App\Http\Controllers;

use App\Models\ReviewBlock;
use App\Services\ResizeService;
use Illuminate\Support\Facades\Storage;

class ReviewController extends LayoutController
{
    public function index()
    {
        $data['blocks_on_review'] = ReviewBlock::query()->paginate(9);
        foreach ($data['blocks_on_review']->items() as $item)
        {
            if (Storage::disk('public')->exists($item->picture)) {
                $item->picture = ResizeService::resize(
                    Storage::path('public/' . $item->picture),
                    'public',
                    128, 128
                );
            }
        }

        return view('review', [
            'blocks_on_review' => $data['blocks_on_review'],
            'settings'=> $this->getLayoutSettings(),
            'meta' => $this->getMeta()
        ]);
    }
}
