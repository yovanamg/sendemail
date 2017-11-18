<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class CustomerController extends Controller {

  public function viewmain() {
    return view('admin.customers');
  }
}