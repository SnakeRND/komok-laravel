<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceBlock extends Model
{
    use HasFactory;

    /** custom voyager enhancement for select */
    public function featuresList()
    {
        return Feature::all();
    }
}
