<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usaha extends Authenticatable
{

  use Notifiable;

  protected $table='usaha';
  protected $primaryKey='id_usaha';
  public $incrementing =false;
  public $timestamps=true;

  protected $fillable = [
     'nisn',
     'nama_usaha',
     'tlp',
     'alamat',
  ];
}
