<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
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

  public function edituser($id) {
    $user = User::find($id);
    return view('user.users', compact('user'));
  }
}

