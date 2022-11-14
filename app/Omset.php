<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Omset extends Authenticatable
{

  use Notifiable;

  protected $table='omset';
  protected $primaryKey='id_omset';
  public $incrementing =false;
  public $timestamps=true;

  protected $fillable = [
     'id_usaha',
     'nisn',
     'tahun',
     'bulan',
     'omset',
     'link_usaha',
  ];
}
