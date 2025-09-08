<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;
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
        // Simpan mahasiswa ke database
        $mahasiswa = Mahasiswa::create($data);

        // === Generate PDF otomatis ===
        $pdf = Pdf::loadView('mahasiswa.pdf', compact('mahasiswa'));

        $pdfFilename = 'mahasiswa_' . preg_replace('/[\/\\\\]/', '-', $mahasiswa->nim) . '.pdf';
        $pdfPath = 'private/pdf_mahasiswa/' . $pdfFilename;

        // Simpan ke storage/app/private/pdf_mahasiswa
        Storage::put($pdfPath, $pdf->output());

        // Update path pdf ke mahasiswa
        $mahasiswa->update(['pdf_path' => $pdfPath]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function download($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        if (!$mahasiswa->surat_keterangan) {
            return redirect()->back()->with('error', 'File tidak tersedia.');
        }

        $filePath = storage_path('app/private/surat_keterangan/' . $mahasiswa->surat_keterangan);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath, $mahasiswa->surat_keterangan);
    }
    public function generatePdf($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $pdf = Pdf::loadView('mahasiswa.pdf', compact('mahasiswa'));
        
        $filename = 'mahasiswa_' . preg_replace('/[\/\\\\]/', '-', $mahasiswa->nim) . '.pdf';

        return $pdf->download($filename);

    }
    public function downloadPdf($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        if (!$mahasiswa->pdf_path) {
            return back()->with('error', 'File PDF belum tersedia.');
        }

        $filePath = storage_path('app/' . $mahasiswa->pdf_path);

        if (!file_exists($filePath)) {
            return back()->with('error', 'File tidak ditemukan di server.');
        }

        $filename = 'mahasiswa_' . preg_replace('/[\/\\\\]/', '-', $mahasiswa->nim) . '.pdf';

        return response()->download($filePath, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }


}
