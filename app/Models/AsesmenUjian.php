<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsesmenUjian extends Model
{
    protected $fillable = [
        'nama', 'semester', 'jenis_kelamin', 'tanggal_lahir', 'nim', 'angkatan',
        'pendidikan', 'prodi', 'fakultas', 'nomor_hp', 'beasiswa',
        'ragam_disabilitas', 'detail_disabilitas', 'alat_bantu', 'kendala',
        'akomodasi', 'pendampingan','surat_keterangan_link', 
    ];
}
