<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Customer;
use DB;

class CustomerController extends Controller {

  public function viewmain() {
    $customers = Customer::all();

    return view('customer.customers', compact('customers'));
  }
  public function savecustomer(Request $data) {
    $customer = new Customer();

    $customer->name=$data->input('name');
    $customer->email=$data->input('email');
    $customer->telephone=$data->input('telephone');
    $customer->database_id=$data->input('database_id');
    

    $customer->save();

    return redirect('/customer');
  }

  public function updatecustomer($id, Request $data) {
    $customer = Customer::find($id);

    $customer->name=$data->input('edit-name');
    $customer->email=$data->input('edit-email');
    $customer->telephone=$data->input('edit-telephone');
    $customer->database_id=$data->input('edit-database_id');    

    $customer->save();

    return redirect('/customer');
  }

  public function deletecustomer($id) {
    $customer = Customer::find($id);
    $customer->delete();

    return redirect('/customer');
  }

}