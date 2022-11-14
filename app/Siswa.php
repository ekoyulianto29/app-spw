<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{

  use Notifiable;

  protected $table='siswa';
  protected $primaryKey='id_siswa';
  public $incrementing =false;
  public $timestamps=true;

  protected $fillable = [
     'nisn',
     'npsn',
     'nama_lengkap',
     'password',
     'tlp',
     'tingkat',
     'kelas',
     'foto',
     'npsn',
     'nama_sekolah',
     'alamat',
     'guru_pembimbing',
     'tlp_guru',
  ];
}
