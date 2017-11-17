<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;

class LoginController extends Controller {
  protected $redirectTo = '/admin_home';

  use AuthenticatesUsers;

  protected function guard() {
    return Auth::guard('web_admin');
  }

  public function init() {
      return view('admin.home');
    }

  public function showLoginForm() {
    return view('admin.auth.login');
  }
}
