<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'jabatan',
        'alamat',
        'gaji_pokok',
    ];
}
