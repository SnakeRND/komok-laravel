<?php

namespace App\Http\Controllers;

use App\Models\PageMeta;
use App\Models\Setting;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    protected $layoutSettings = [];
    protected $meta = [];

    public function __construct(Request $request)
    {
        $this->layoutSettings = Setting::all()->keyBy('key');
        $this->meta = PageMeta::query()
            ->where('route', $request->route()->getName())
            ->first();
    }

    public function getLayoutSettings()
    {
        return $this->layoutSettings;
    }

    public function getMeta()
    {
        return $this->meta;
    }
}
