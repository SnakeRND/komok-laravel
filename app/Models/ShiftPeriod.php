<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftPeriod extends Model
{
    use HasFactory;

    /** custom voyager enhancement for select */
    public function shiftList()
    {
        return Shift::all();
    }

    /** custom voyager enhancement for select */
    public function programsList()
    {
        return ShiftProgram::all();
    }
}
