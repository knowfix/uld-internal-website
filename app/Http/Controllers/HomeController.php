<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Layanan;
use Illuminate\Support\Facades\DB;

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
        $totalAlumni = Alumni::count();

        // total layanan dari tabel layanan
        $fakultas = Mahasiswa::selectRaw('LOWER(TRIM(fakultas)) as jenis, COUNT(*) as total')
                        ->groupBy('jenis')
                        ->pluck('total', 'jenis');
        $totalFakultas=count($fakultas);

        // Grafik Sebaran Mahasiswa per Fakultas
        $dataFakultas = Mahasiswa::select('fakultas', DB::raw('count(*) as jumlah'))
                ->groupBy('fakultas')
                ->orderByDesc('jumlah')
                ->get();
        // Data line chart: jumlah mahasiswa disabilitas per tahun angkatan
        $tahunData = Mahasiswa::select('angkatan', DB::raw('count(*) as jumlah'))
            ->whereNotNull('angkatan')
            ->groupBy('angkatan')
            ->orderBy('angkatan')
            ->get();

        $disabilitasData = Mahasiswa::select('ragam_disabilitas', DB::raw('count(*) as jumlah'))
            ->groupBy('ragam_disabilitas')
            ->orderByDesc('jumlah')
            ->get();

        // Stacked Chart Mahasiswa per Jenis Disabilitas per Tahun
        $jenisData = Mahasiswa::select(
            'angkatan',
            DB::raw('SUM(CASE WHEN ragam_disabilitas = "Disabilitas Fisik" THEN 1 ELSE 0 END) as fisik'),
            DB::raw('SUM(CASE WHEN ragam_disabilitas = "Disabilitas Sensorik" THEN 1 ELSE 0 END) as sensorik'),
            DB::raw('SUM(CASE WHEN ragam_disabilitas = "Disabilitas Mental" THEN 1 ELSE 0 END) as mental'),
            DB::raw('SUM(CASE WHEN ragam_disabilitas = "Disabilitas Ganda" THEN 1 ELSE 0 END) as ganda'),
            DB::raw('SUM(CASE WHEN ragam_disabilitas = "Disabilitas Lainnya" THEN 1 ELSE 0 END) as lainnya')
        )
        ->groupBy('angkatan')
        ->orderBy('angkatan')
        ->get();

        return view('home', compact(
            'totalMahasiswa',
            'totalJenis',
            'totalAlumni',
            'totalFakultas',
            'dataFakultas',
            'tahunData',
            'jenisData',
            'disabilitasData',
            'disabilitas',
        ));
    }
}
