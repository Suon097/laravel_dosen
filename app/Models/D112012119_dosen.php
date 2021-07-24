<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class D112012119_dosen extends Model
{
    //
	use HasFactory;

    protected $fillable = [
    	'ktp_dosen','nama_dosen','alamat_dosen','email_dosen','notlp_dosen','bidang_dosen','jadwal_dosen'
    ];
    
}




