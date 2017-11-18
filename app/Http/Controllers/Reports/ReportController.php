<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ReportController extends Controller {

  public function viewmain() {
    return view('admin.reports');
  }
}