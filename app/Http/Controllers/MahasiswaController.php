<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
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

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $id, // nim boleh sama asal milik dirinya
            'surat_keterangan' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $data = $request->all();

        // Jika ada file baru diupload
        if ($request->hasFile('surat_keterangan')) {
            // Hapus file lama jika ada
            if ($mahasiswa->surat_keterangan && Storage::exists('private/surat_keterangan/' . $mahasiswa->surat_keterangan)) {
                Storage::delete('private/surat_keterangan/' . $mahasiswa->surat_keterangan);
            }

            $file = $request->file('surat_keterangan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('private/surat_keterangan', $filename);
            $data['surat_keterangan'] = $filename;
        } else {
            unset($data['surat_keterangan']); // jangan timpa kalau kosong
        }

        // Update mahasiswa
        $mahasiswa->update($data);

        // === Regenerate PDF (opsional) ===
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('mahasiswa.pdf', compact('mahasiswa'));
        $pdfFilename = 'mahasiswa_' . preg_replace('/[\/\\\\]/', '-', $mahasiswa->nim) . '.pdf';
        $pdfPath = 'private/pdf_mahasiswa/' . $pdfFilename;

        Storage::put($pdfPath, $pdf->output());
        $mahasiswa->update(['pdf_path' => $pdfPath]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }
    public function bulkDelete(Request $request)
    {
        $ids = explode(",", $request->ids);

        Mahasiswa::whereIn('id', $ids)->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus.');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }
    public function jadikanAlumni(Request $request)
    {
        $ids = explode(',', $request->ids);

        $mahasiswas = Mahasiswa::whereIn('id', $ids)->get();

        foreach ($mahasiswas as $mhs) {
            Alumni::create($mhs->toArray()); // salin ke alumni
            $mhs->delete(); // hapus dari mahasiswa
        }

        return redirect()->route('alumni.index')
            ->with('success', 'Mahasiswa berhasil dipindah ke data alumni.');
    }
}
