<?php

namespace App\Http\Controllers;

use App\Helpers\PictureHelper;
use App\Models\Employee;
use App\Models\TeamBlock;
use App\Services\ResizeService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class TeamController extends LayoutController
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $data['blocks_on_team'] = TeamBlock::all()->keyBy('id');

        $data['blocks_on_team']->each(function($item) {
            if ($item->emphasized_text)
                $item->headline = str_replace($item->emphasized_text, '', $item->headline);

            $item->employees = Employee::query()->whereIn('id', json_decode($item->employees, true))->get();

            $item->employees->each(function($employee) {
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
                        $employee->is_new = false;
                        $employee->save();
                    }
                }
            });
        });

        return view('team', [
            'blocks_on_team' => $data['blocks_on_team'],
            'settings'=> $this->getLayoutSettings(),
            'meta' => $this->getMeta()
        ]);
    }
}
