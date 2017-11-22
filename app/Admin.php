<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable {

  use Notifiable;

  protected $fillable = [
      'name', 'email', 'sucursal', 'rol_id', 'telephone','password'
  ];

   protected $hidden = [
       'password', 'remember_token',
   ];

  public function sendPasswordResetNotification($token) {
      $this->notify(new AdminResetPasswordNotification($token));
  }

}
