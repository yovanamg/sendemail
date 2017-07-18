<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Validator facade used in validator method
use Illuminate\Support\Facades\Validator;

//Seller Model
use App\Admin;

//Auth Facade used in guard
use Auth;


class RegisterController extends Controller
{
  protected $redirectPath = 'admin_home';

  public function showRegistrationForm() {
    return view('admin.auth.register');
  }

  public function register(Request $request) {
       //Validates data
        $this->validator($request->all())->validate();

       //Create admin
        $admin = $this->create($request->all());

        //Authenticates admin
        $this->guard()->login($admin);

       //Redirects admin
        return redirect($this->redirectPath);
    }

    //Validates user's Input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'age' => 'required|age|max:150',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    //Create a new seller instance after a validation.
    protected function create(array $data) {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'age' => $data['age'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function guard() {
       return Auth::guard('web_admin');
   }
}
