<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Rank extends Authenticatable
{

  use Notifiable;

  protected $table='rank';
  public $incrementing =false;
  public $timestamps=true;

  protected $fillable = [
     'nama_lengkap',
     'tingkat',
     'kelas',
     'omset'
  ];
}
