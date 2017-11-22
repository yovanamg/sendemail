<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use Auth;


class RegisterController extends Controller {
  protected $redirectPath = 'admin_home';

  public function showRegistrationForm() {
    return view('admin.auth.register');
  }

  public function register(Request $request) {
    $this->validator($request->all())->validate();
    $admin = $this->create($request->all());
    $this->guard()->login($admin);

    return redirect($this->redirectPath);
  }

  public function saveuser(Request $request) {
    $this->validator($request->all())->validate();
    $admin = $this->create($request->all());
    $this->guard()->login($admin);

    return redirect($this->redirectPath);
    return redirect('/user');
  }

  protected function validator(array $data) {
    return Validator::make($data, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:admins',
        'password' => 'required|min:6|confirmed',
        
    ]);
  }

  protected function create(array $data) {
    return Admin::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'sucursal' => 'hola',
        'rol_id' => '6',
        'telephone' => $data['telephone'],
        'password' => bcrypt($data['password']),
    ]);
  }

  protected function guard() {
    return Auth::guard('web_admin');
  }
}
