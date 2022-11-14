<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection,WithHeadings
{

    public function collection()
    {
        
        
        return Siswa::join('usaha','usaha.nisn','=','siswa.nisn')
        ->JOIN('omset','omset.nisn','=','siswa.nisn')
        ->JOIN('sekolah', 'sekolah.npsn','=','siswa.npsn')
        ->select('siswa.nama_lengkap','usaha.nama_usaha','siswa.tlp','siswa.tingkat','sekolah.nama_sekolah','omset.omset')
        ->get();

      
    }
    public function headings():array
    {
        
        
        // return Siswa::join('usaha','usaha.nisn','=','siswa.nisn')
        // ->JOIN('omset','omset.nisn','=','siswa.nisn')
        // ->JOIN('sekolah', 'sekolah.npsn','=','siswa.npsn')
        // ->select('siswa.nama_lengkap','usaha.nama_usaha','siswa.tlp','siswa.tingkat','sekolah.nama_sekolah','omset.omset')
        // ->get();

        return ["Nama Siswa","Nama Usaha","Telepon","Tingkat","Asal Sekolah","Jumlah Omset (Rp)"];
    }
}
