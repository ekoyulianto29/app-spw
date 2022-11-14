<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Sekolah extends Authenticatable
{

  use Notifiable;

  protected $table='sekolah';
  protected $primaryKey='id_sekolah';
  public $incrementing =false;
  public $timestamps=true;

  protected $fillable = [
     'nama_sekolah',
     'npsn',
     'alamat',
  ];
}
