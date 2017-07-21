<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller {
  use SendsPasswordResetEmails;

  public function showLinkRequestForm() {
      return view('admin.passwords.email');
  }

  public function broker() {
       return Password::broker('admins');
  }
}



