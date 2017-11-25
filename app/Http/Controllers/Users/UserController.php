<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Admin;
use DB;

class UserController extends Controller {

  public function viewmain() {
    $users = User::all();
    return view('user.users', compact('users'));
  }

  public function saveuser(Request $data) {
    $user = new User();

    $user->name=$data->input('name');
    $user->email=$data->input('email');
    $user->telephone=$data->input('telephone');

    $user->save();

    return redirect('/user');
  }

  public function updateuser($id, Request $data) {
    $user = User::find($id);

    $user->name=$data->input('edit-name');
    $user->email=$data->input('edit-email');
    $user->telephone=$data->input('edit-telephone');

    $user->save();

    return redirect('/user');
  }

  public function deleteuser($id) {
    print_r($id);
    $user = User::find($id);
    $user->delete();

    return redirect('/user');
  }
  
  public function viewadmin (){
    $admins = Admin::all();
    return view('admin.admins', compact('admins'));
  }
}

