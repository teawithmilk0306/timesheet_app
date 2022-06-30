<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

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
  
  
}
