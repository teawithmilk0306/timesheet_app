<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function add()
  {
      return view('setting');
  }
  
  public function request()
  {
      return view('timesheet_request');
  }
}
