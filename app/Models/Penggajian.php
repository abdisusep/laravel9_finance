<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Karyawan;

class Penggajian extends Model
{
    use HasFactory;

    protected $table = 'penggajian';
    protected $fillable = [
        'karyawan_id',
        'bonus',
        'potongan',
        'total',
        'tanggal',
        'keterangan'
    ];

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class, 'id', 'karyawan_id');
    }
}
