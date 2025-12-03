<?php

namespace App\Http\Controllers;

use App\Models\Tendik;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class tendikController extends Controller
{
    public function index()
    {
        $tendiks = Tendik::all();
        return view('dosen_tendik.index', compact('tendiks'));
    }
    public function bulkDelete(Request $request)
    {
        $ids = explode(",", $request->ids);

        Tendik::whereIn('id', $ids)->delete();

        return redirect()->route('dosen_tendik.index')->with('success', 'Data berhasil dihapus.');
    }
    public function create()
    {
        return view('dosen_tendik.create');
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
        $tendik = Tendik::create($data);

        // === Generate PDF otomatis ===
        $pdf = Pdf::loadView('dosen_tendik.pdf', compact('tendik'));

        $pdfFilename = 'tendik_' . preg_replace('/[\/\\\\]/', '-', $tendik->nim) . '.pdf';
        $pdfPath = 'private/pdf_tendik/' . $pdfFilename;

        // Simpan ke storage/app/private/pdf_mahasiswa
        Storage::put($pdfPath, $pdf->output());

        // Update path pdf ke mahasiswa
        $tendik->update(['pdf_path' => $pdfPath]);

        return redirect()->route('dosen_tendik.index')->with('success', 'Data tendik berhasil ditambahkan!');
    }
    public function download($id)
    {
        $tendik = Tendik::findOrFail($id);

        if (!$tendik->surat_keterangan) {
            return redirect()->back()->with('error', 'File tidak tersedia.');
        }

        $filePath = storage_path('app/private/surat_keterangan/' . $tendik->surat_keterangan);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath, $tendik->surat_keterangan);
    }
    public function generatePdf($id)
    {
        $tendik = Tendik::findOrFail($id);

        $pdf = Pdf::loadView('dosen_tendik.pdf', compact('tendik'));
        
        $filename = 'tendik_' . preg_replace('/[\/\\\\]/', '-', $tendik->nim) . '.pdf';

        return $pdf->download($filename);

    }
    public function downloadPdf($id)
    {
        $tendik = Tendik::findOrFail($id);

        if (!$tendik->pdf_path) {
            return back()->with('error', 'File PDF belum tersedia.');
        }

        $filePath = storage_path('app/' . $tendik->pdf_path);

        if (!file_exists($filePath)) {
            return back()->with('error', 'File tidak ditemukan di server.');
        }

        $filename = 'tendik_' . preg_replace('/[\/\\\\]/', '-', $tendik->nim) . '.pdf';

        return response()->download($filePath, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function edit($id)
    {
        $tendik = Tendik::findOrFail($id);
        return view('dosen_tendik.edit', compact('tendik'));
    }
    public function update(Request $request, $id)
    {
        $tendik = Tendik::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:tendiks,nim,' . $id, // nim boleh sama asal milik dirinya
            'surat_keterangan' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $data = $request->all();

        // Jika ada file baru diupload
        if ($request->hasFile('surat_keterangan')) {
            // Hapus file lama jika ada
            if ($tendik->surat_keterangan && Storage::exists('private/surat_keterangan/' . $tendik->surat_keterangan)) {
                Storage::delete('private/surat_keterangan/' . $tendik->surat_keterangan);
            }

            $file = $request->file('surat_keterangan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('private/surat_keterangan', $filename);
            $data['surat_keterangan'] = $filename;
        } else {
            unset($data['surat_keterangan']); // jangan timpa kalau kosong
        }

        // Update mahasiswa
        $tendik->update($data);

        // === Regenerate PDF (opsional) ===
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('dosen_tendik.pdf', compact('tendik'));
        $pdfFilename = 'tendik_' . preg_replace('/[\/\\\\]/', '-', $tendik->nim) . '.pdf';
        $pdfPath = 'private/pdf_tendik/' . $pdfFilename;

        Storage::put($pdfPath, $pdf->output());
        $tendik->update(['pdf_path' => $pdfPath]);

        return redirect()->route('dosen_tendik.index')->with('success', 'Data tendik berhasil diperbarui!');
    }
    public function show($id)
    {
        $tendik = Tendik::findOrFail($id);
        return view('dosen_tendik.show', compact('tendik'));
    }
}
