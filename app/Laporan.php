<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{

  use Notifiable;

  protected $table='users';
  protected $primaryKey='id_user';
  public $incrementing =false;
  public $timestamps=true;

  protected $fillable = [
     'name',
     'username',
     'password',
     'email',
  ];
}
