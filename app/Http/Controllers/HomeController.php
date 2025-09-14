<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Layanan;

class HomeController extends Controller
{
    public function index()
    {
        // Statistik
        $totalMahasiswa = Mahasiswa::count();
        $disabilitas = Mahasiswa::selectRaw('LOWER(TRIM(ragam_disabilitas)) as jenis, COUNT(*) as total')
                        ->groupBy('jenis')
                        ->pluck('total', 'jenis');
        $totalJenis = count($disabilitas);
        
        // sementara total lulusan = 0 karena belum ada kolom
        $totalLulusan = Mahasiswa::select('ragam_disabilitas')->distinct()->count();;

        // total layanan dari tabel layanan
        $fakultas = Mahasiswa::selectRaw('LOWER(TRIM(fakultas)) as jenis, COUNT(*) as total')
                        ->groupBy('jenis')
                        ->pluck('total', 'jenis');
        $totalFakultas=count($fakultas);

        // Grafik Sebaran Mahasiswa per Fakultas
        $mahasiswaPerFakultas = Mahasiswa::selectRaw('fakultas, COUNT(*) as total')
            ->groupBy('fakultas')
            ->pluck('total', 'fakultas');

        // Grafik Jumlah Mahasiswa per Tahun Angkatan
        $mahasiswaPerTahun = Mahasiswa::selectRaw('angkatan, COUNT(*) as total')
            ->groupBy('angkatan')
            ->pluck('total', 'angkatan');

        // Pie Chart Ragam Disabilitas
        $disabilitas = Mahasiswa::selectRaw('ragam_disabilitas, COUNT(*) as total')
            ->groupBy('ragam_disabilitas')
            ->pluck('total', 'ragam_disabilitas');

        // Stacked Chart Mahasiswa per Jenis Disabilitas per Tahun
        $stacked = Mahasiswa::selectRaw('angkatan, ragam_disabilitas, COUNT(*) as total')
            ->groupBy('angkatan', 'ragam_disabilitas')
            ->get();

        return view('home', compact(
            'totalMahasiswa',
            'totalJenis',
            'totalLulusan',
            'totalFakultas',
            'mahasiswaPerFakultas',
            'mahasiswaPerTahun',
            'disabilitas',
            'stacked'
        ));
    }
}
