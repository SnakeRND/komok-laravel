<?php

namespace App\Http\Controllers;


use App\Services\GalleryService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class GalleryController extends LayoutController
{
    public function index(Request $request, GalleryService $gallery)
    {
        $validator = false;
        if (!empty($request->all())) {
            $validator = Validator::make(
                $request->all(),
                [
                    'year' => ['required', 'not_in:0'], 'season' => ['required', 'not_in:0'],
                    'shift' => ['required', 'not_in:0'], 'age' => ['required']
                ],
                [
                    'year.required' => 'Нужно выбрать год', 'year.not_in' => 'Нужно выбрать год',
                    'season.required' => 'Нужно выбрать время года', 'season.not_in' => 'Нужно выбрать время года',
                    'shift.required' => 'Нужно выбрать смену', 'shift.not_in' => 'Нужно выбрать смену',
                    'age.required' => 'Нужно выбрать возраст смены'
                ]
            );
        }

        $filter = [];
        if ($validator) {
            $filter = $validator->validated();
        }

        $pictures = $gallery->getList($filter);
        $years = range(Carbon::now()->year, 2015);

        return view('gallery', [
            'meta' => $this->getMeta(),
            'settings' => $this->getLayoutSettings(),
            'pictures' => $pictures,
            'years' => $years
        ]);
    }
}
