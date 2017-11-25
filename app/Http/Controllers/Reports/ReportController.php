<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Emisores;
use DB;

class ReportController extends Controller {

  public function viewmain() {
    $emisores = Emisores::all();
    return view('admin.reports', compact('emisores'));
  }
}