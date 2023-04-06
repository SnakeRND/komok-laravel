<?php

namespace App\Http\Controllers;


use App\Helpers\PictureHelper;
use App\Models\Employee;
use App\Models\ReviewBlock;
use App\Models\Shift;
use App\Models\ShiftPeriod;
use App\Models\ShiftProgram;
use App\Models\TeamBlock;
use App\Services\GalleryService;
use App\Services\ResizeService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShiftsController extends LayoutController
{
    /**
     * @param Request $request
     * @param GalleryService $gallery
     * @return Application|Factory|View
     */
    public function index(Request $request, GalleryService $gallery)
    {
        if ($request->has('age')) {
            $data['shifts_period'] = ShiftPeriod::query()
                ->orderBy('id', 'asc')
                ->when($request->has('age') && $request->get('age') === 'family', function ($query) {
                    $query->whereJsonContains('shift', strval(3));
                }
                )
                ->when($request->has('age') && $request->get('age') === 'younger', function ($query) {
                    $query->whereJsonContains('shift', strval(1));
                })
                ->get();
        } else {
            $data['shifts_period'] = ShiftPeriod::query()
                ->orderBy('id', 'asc')
                ->when(
                    $request->has('age'),
                    function ($query) {
                        $query->whereJsonContains('shift', strval(2));
                    },
                    function ($query) {
                        $query->whereJsonContains('shift', strval(2));
                    }
                )
                ->get();
        }

        $data['shifts_period']->each(function ($item) {
            $item->programs = ShiftProgram::query()->whereIn('id', json_decode($item->programs, true))->get();
            $item->shift = Shift::query()->whereIn('id', json_decode($item->shift, true))->get();
        });

        $reviews = ReviewBlock::query()->inRandomOrder()->limit(5)->get();
        foreach ($reviews as $item) {
            if (Storage::disk('public')->exists($item->picture)) {
                $item->picture = ResizeService::resize(
                    Storage::path('public/' . $item->picture),
                    'public',
                    160,
                    160
                );
            }
        }

        $employees = Employee::all();

        $elders = $employees->filter(function ($item) {
            return in_array(trim($item->profession), ['Методист', 'Вожатая', 'Вожатый']);
        });

        /*        $employees = $employees->filter(function($item) {
                    return !in_array(trim($item->profession), ['Методист', 'Вожатая', 'Вожатый']);
                });*/
        $data['blocks_on_team'] = TeamBlock::all()->keyBy('id');

        $data['blocks_on_team']->each(function ($item) {
            if ($item->emphasized_text) {
                $item->headline = str_replace($item->emphasized_text, '', $item->headline);
            }

            $item->employees = Employee::query()->whereIn('id', json_decode($item->employees, true))->get();

            $item->employees->each(function ($employee) {
                if (Storage::disk('public')->exists($employee->picture)) {
                    $existImage = PictureHelper::getExistImage($employee->picture);
                    $picturePath = 'resize/' . $existImage . '.jpg';

                    if (Storage::disk('public')->exists($picturePath)) {
                        $existImage = PictureHelper::getExistImage($employee->picture);
                        $employee->picture = 'resize/' . $existImage . '.jpg';
                    } else {
                        $employee->picture = ResizeService::resize(
                            Storage::path('public/' . $employee->picture),
                            'public',
                            128,
                            128
                        );
                    }
                }
            });
        });
        /*        $employees = Employee::query()->whereIn('id', json_decode($data['blocks_on_team'][3]['employees'], true))->get();*/

        if ($request->has('age') && $request->get('age') === 'family') {
            $pictures = $gallery->getShiftImages(2);

            if ($pictures->count() === 0) {
                $pictures = $gallery->getGalleryImages(2);
                $pictures = $pictures->filter(function ($item) {
                    return explode('/', $item)[1] === 'Смены 7-12 лет';
                });
            }

            if ($pictures->count() > 10) {
                $pictures = $pictures->random(10);
            }
        } else {
            $pictures = $gallery->getShiftImages();

            if ($pictures->count() === 0) {
                $pictures = $gallery->getGalleryImages();
                $pictures = $pictures->filter(function ($item) {
                    return explode('/', $item)[1] === 'Смены 13-17 лет';
                });
            }

            if ($pictures->count() > 10) {
                $pictures = $pictures->random(10);
            }
        }

        $pictures = $pictures->map(function ($picture) {
            if (Storage::disk('public')->exists($picture)) {
                $existImage = PictureHelper::getExistImage($picture);
                $picturePath = 'resize/' . $existImage . '.jpg';

                if (Storage::disk('public')->exists($picturePath)) {
                    $existImage = PictureHelper::getExistImage($picture);
                    $picture = 'resize/' . $existImage . '.jpg';
                } else {
                    $picture = ResizeService::resize(
                        Storage::path('public/' . $picture),
                        'public',
                        470,
                        313
                    );
                }
            }
            return $picture;
        });

        return view('shifts', [
            'shifts_period' => $data['shifts_period'],
            'reviews' => $reviews,
            'employees' => $data['blocks_on_team'][3],
            'elders' => $elders,
            'pictures' => $pictures,
            'settings' => $this->getLayoutSettings(),
            'meta' => $this->getMeta()
        ]);
    }
}
