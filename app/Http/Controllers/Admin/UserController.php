<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Auth;
use App\HolidayRequest;

class UserController extends Controller
{
    public function index()

    { 
        $users = User::All();
        return view('admin.user.index', ['users' => $users]);
    }
    
    public function show(Request $request)

    { 

    $user = User::find($request->id);
    $currentMonth = '7';
    $dates = $this->getCalendarDates('2022',$currentMonth);
    
        return view('admin.user.show',['today' => today(),'dates'=> $dates,'currentMonth'=> $currentMonth,'user'=> $user]);
    }
     public function getCalendarDates($year, $month)
    {
        $dateStr = sprintf('%04d-%02d-01', $year, $month);
        $date = new Carbon($dateStr);
        // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
        $date->subDay($date->dayOfWeek);
        // 同上。右下の隙間のための計算。
        $count = 31 + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }
        return $dates;
    }
    
}