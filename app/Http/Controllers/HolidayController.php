<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\HolidayRequest;
use Auth;

class HolidayController extends Controller
{
    public function add()
    
    {
       
        if (Auth::user()->hasSubmittedHolidayRequestsInThisMonth()) {
            return view('done'); //done.blade.phpがある前提。「今月の休暇申請は提出済みです」みたいなことが書いてあるビュー
        }else{
            return view('holiday_request',['today' => today()]);
        }
    }
    public function create(Request $request)
    {
        
        foreach($request->hoge as $a => $b) {
            $hr = new HolidayRequest;
            $hr->date = $a;
            $hr->user_id = Auth::id();
            if($b == "early"){
                $hr->start_time = "09:15";
                $hr->end_time = "18:30";
            }elseif($b == "late"){
                $hr->start_time = "11:00";
                $hr->end_time = "20:15";
            }elseif($b == "absence"){
                $hr->start_time = "9:15";
                $hr->end_time = "20:15";
            }
            $hr->save();
            
        }
        return redirect()->back();
    }
}
