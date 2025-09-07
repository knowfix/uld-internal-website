<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'nim',
        'angkatan',
        'pendidikan',
        'prodi',
        'fakultas',
        'nomor_hp',
        'beasiswa',
        'ragam_disabilitas',
        'surat_keterangan',
        'detail_disabilitas',
        'alat_bantu',
        'kendala',
        'akomodasi',
        'pendampingan',
    ];
}
