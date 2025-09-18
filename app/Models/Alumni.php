<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $fillable = [
        'nama', 'jenis_kelamin', 'tanggal_lahir', 'nim', 'angkatan',
        'pendidikan', 'prodi', 'fakultas', 'nomor_hp', 'beasiswa',
        'ragam_disabilitas', 'detail_disabilitas', 'alat_bantu', 'kendala',
        'akomodasi', 'pendampingan', 'pdf_path',
    ];
}
