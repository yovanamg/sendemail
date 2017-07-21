<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller {
  protected $redirectTo = '/admin_home';

  use ResetsPasswords;

  public function showResetForm(Request $request, $token = null) {
    return view('admin.passwords.reset')->with(
        ['token' => $token, 'email' => $request->email]
    );
  }

  public function broker() {
    return Password::broker('admins');
  }

  protected function guard() {
    return Auth::guard('web_admin');
  }
}