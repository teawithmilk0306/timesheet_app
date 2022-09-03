<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\HolidayRequest;


class TimesheetController extends Controller
{
    public function add()
  {
      return view('setting');
  }
  
  public function request()
  {
      return view('timesheet_request',['today' => today()]);
  }
  
  public function index()
  {
    return view('index', ['floor_name' => "そごう千葉　時計売り場", 'today' => today()]);
  }
  
  public function nextCreate()
  {
    //今月の最初の日を取得
    $dtFrom = Carbon::now()->startOfMonth()->toDateString();
    //今月の最後の日を取得
    $dtTo = Carbon::now()->endOfMonth()->toDateString();
    //holiday_requestsテーブルから、dateカラムの値が今月の最初の日~最後の日の間のレコードを検索して取得
    
    $hoge = HolidayRequest::whereBetween('date', [$dtFrom, $dtTo])->get();
    dd($hoge);
    
    
    return view('index',['today' => today()]);
  }
  
}
