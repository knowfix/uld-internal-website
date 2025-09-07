<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;


class MahasiswaController extends Controller
{
    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas',
            'surat_keterangan' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $data = $request->all();

        // Upload file jika ada
        if ($request->hasFile('surat_keterangan')) {
            $file = $request->file('surat_keterangan');
            $filename = time() . '_' . $file->getClientOriginalName();

            // simpan ke storage/app/private/surat_keterangan
            $file->storeAs('private/surat_keterangan', $filename);

            // masukkan ke array data
            $data['surat_keterangan'] = $filename;
        }

        // if ($request->hasFile('surat_keterangan')) {
        //     $fileName = time().'_'.$request->file('surat_keterangan')->getClientOriginalName();
        //     $request->file('surat_keterangan')->move(public_path('uploads/surat_keterangan'), $fileName);
        //     $data['surat_keterangan'] = $fileName;
        // }

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    // public function download($id)
    // {
    //     $mahasiswa = Mahasiswa::findOrFail($id);

    //     if (!$mahasiswa->surat_disabilitas) {
    //         return redirect()->back()->with('error', 'File tidak ditemukan.');
    //     }

    //     return Storage::download($mahasiswa->surat_disabilitas);
    // }

    public function download($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        if (!$mahasiswa->surat_disabilitas) {
            return redirect()->back()->with('error', 'File tidak tersedia.');
        }

        $filePath = storage_path('app/private/surat_keterangan/' . $mahasiswa->surat_disabilitas);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath, $mahasiswa->surat_disabilitas);
    }


}
