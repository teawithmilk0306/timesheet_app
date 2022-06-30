<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HolidayRequest extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'date' => 'required',
        'start_time' => 'required',
        'end_time'=> 'required',
    );
}
