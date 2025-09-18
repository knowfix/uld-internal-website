<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::all();
        return view('alumni.index', compact('alumnis'));
    }
    public function bulkDelete(Request $request)
    {
        $ids = explode(",", $request->ids);

        Alumni::whereIn('id', $ids)->delete();

        return redirect()->route('alumni.index')->with('success', 'Data berhasil dihapus.');
    }
    public function create()
    {
        return view('alumni.create');
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
        $alumni = Alumni::create($data);

        // === Generate PDF otomatis ===
        $pdf = Pdf::loadView('alumni.pdf', compact('alumni'));

        $pdfFilename = 'alumni_' . preg_replace('/[\/\\\\]/', '-', $alumni->nim) . '.pdf';
        $pdfPath = 'private/pdf_alumni/' . $pdfFilename;

        // Simpan ke storage/app/private/pdf_mahasiswa
        Storage::put($pdfPath, $pdf->output());

        // Update path pdf ke mahasiswa
        $alumni->update(['pdf_path' => $pdfPath]);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil ditambahkan!');
    }
    public function download($id)
    {
        $alumni = Alumni::findOrFail($id);

        if (!$alumni->surat_keterangan) {
            return redirect()->back()->with('error', 'File tidak tersedia.');
        }

        $filePath = storage_path('app/private/surat_keterangan/' . $alumni->surat_keterangan);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath, $alumni->surat_keterangan);
    }
    public function generatePdf($id)
    {
        $alumni = Alumni::findOrFail($id);

        $pdf = Pdf::loadView('alumni.pdf', compact('alumni'));
        
        $filename = 'alumni_' . preg_replace('/[\/\\\\]/', '-', $alumni->nim) . '.pdf';

        return $pdf->download($filename);

    }
    public function downloadPdf($id)
    {
        $alumni = Alumni::findOrFail($id);

        if (!$alumni->pdf_path) {
            return back()->with('error', 'File PDF belum tersedia.');
        }

        $filePath = storage_path('app/' . $alumni->pdf_path);

        if (!file_exists($filePath)) {
            return back()->with('error', 'File tidak ditemukan di server.');
        }

        $filename = 'alumni_' . preg_replace('/[\/\\\\]/', '-', $alumni->nim) . '.pdf';

        return response()->download($filePath, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('alumni.edit', compact('alumni'));
    }
    public function update(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:alumnis,nim,' . $id, // nim boleh sama asal milik dirinya
            'surat_keterangan' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $data = $request->all();

        // Jika ada file baru diupload
        if ($request->hasFile('surat_keterangan')) {
            // Hapus file lama jika ada
            if ($alumni->surat_keterangan && Storage::exists('private/surat_keterangan/' . $alumni->surat_keterangan)) {
                Storage::delete('private/surat_keterangan/' . $alumni->surat_keterangan);
            }

            $file = $request->file('surat_keterangan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('private/surat_keterangan', $filename);
            $data['surat_keterangan'] = $filename;
        } else {
            unset($data['surat_keterangan']); // jangan timpa kalau kosong
        }

        // Update mahasiswa
        $alumni->update($data);

        // === Regenerate PDF (opsional) ===
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('alumni.pdf', compact('alumni'));
        $pdfFilename = 'alumni_' . preg_replace('/[\/\\\\]/', '-', $alumni->nim) . '.pdf';
        $pdfPath = 'private/pdf_alumni/' . $pdfFilename;

        Storage::put($pdfPath, $pdf->output());
        $alumni->update(['pdf_path' => $pdfPath]);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diperbarui!');
    }
    public function show($id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('alumni.show', compact('alumni'));
    }
}
