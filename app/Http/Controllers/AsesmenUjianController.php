<?php

namespace App\Http\Controllers;

use App\Models\AsesmenUjian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsesmenUjianController extends Controller
{
    public function index(Request $request)
    {
        $asesmen_ujians = AsesmenUjian::all();

        // Ambil nilai semester dari request (kalau ada)
        $semester = $request->input('semester');
        // Query data
        $query = AsesmenUjian::query();
        if (!empty($semester)) {
            $query->where('semester', $semester);
        }
        $data = $query->latest()->paginate(10);

        return view('ujian.index', compact( 'data', 'semester'));
    }
    public function create()
    {
        return view('ujian.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswas',
            // 'surat_keterangan' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $data = $request->all();

        // Upload file jika ada
        // if ($request->hasFile('surat_keterangan')) {
        //     $file = $request->file('surat_keterangan');
        //     $filename = time() . '_' . $file->getClientOriginalName();

        //     // simpan ke storage/app/private/surat_keterangan
        //     $file->storeAs('private/surat_keterangan', $filename);

        //     // masukkan ke array data
        //     $data['surat_keterangan'] = $filename;
        // }
        // Simpan mahasiswa ke database
        $asesmen_ujian = AsesmenUjian::create($data);

        // === Generate PDF otomatis ===
        $pdf = Pdf::loadView('ujian.pdf', compact('asesmen_ujian'));

        $pdfFilename = 'asesmen_ujian_' . preg_replace('/[\/\\\\]/', '-', $asesmen_ujian->nim) . '.pdf';
        $pdfPath = 'private/pdf_asesmen_ujian/' . $pdfFilename;

        // Simpan ke storage/app/private/pdf_mahasiswa
        Storage::put($pdfPath, $pdf->output());

        // Update path pdf ke mahasiswa
        $asesmen_ujian->update(['pdf_path' => $pdfPath]);

        return redirect()->route('ujian.index')->with('success', 'Data asesmen ujian mahasiswa berhasil ditambahkan!');
    }

    public function download($id)
    {
        $asesmen_ujian = AsesmenUjian::findOrFail($id);

        if (!$asesmen_ujian->surat_keterangan) {
            return redirect()->back()->with('error', 'File tidak tersedia.');
        }

        $filePath = storage_path('app/private/surat_keterangan/' . $asesmen_ujian->surat_keterangan);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath, $asesmen_ujian->surat_keterangan);
    }
    public function generatePdf($id)
    {
        $asesmen_ujian = AsesmenUjian::findOrFail($id);

        $pdf = Pdf::loadView('ujian.pdf', compact('asesmen_ujian'));
        
        $filename = 'asesmen_ujian_' . preg_replace('/[\/\\\\]/', '-', $asesmen_ujian->nim) . '.pdf';

        return $pdf->download($filename);

    }
    public function downloadPdf($id)
    {
        $asesmen_ujian = AsesmenUjian::findOrFail($id);

        if (!$asesmen_ujian->pdf_path) {
            return back()->with('error', 'File PDF belum tersedia.');
        }

        $filePath = storage_path('app/' . $asesmen_ujian->pdf_path);

        if (!file_exists($filePath)) {
            return back()->with('error', 'File tidak ditemukan di server.');
        }

        $filename = 'asesmen_ujian_' . preg_replace('/[\/\\\\]/', '-', $asesmen_ujian->nim) . '.pdf';

        return response()->download($filePath, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }
    public function bulkDelete(Request $request)
    {
        $ids = explode(",", $request->ids);

        AsesmenUjian::whereIn('id', $ids)->delete();

        return redirect()->route('ujian.index')->with('success', 'Data berhasil dihapus.');
    }

    public function edit($id)
    {
        $asesmen_ujian = AsesmenUjian::findOrFail($id);
        return view('ujian.edit', compact('asesmen_ujian'));
    }
    public function update(Request $request, $id)
    {
        $asesmen_ujian = AsesmenUjian::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:asesmen_ujians,nim,' . $id, // nim boleh sama asal milik dirinya
            'surat_keterangan' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $data = $request->all();

        // Jika ada file baru diupload
        // if ($request->hasFile('surat_keterangan')) {
        //     // Hapus file lama jika ada
        //     if ($asesmen_ujian->surat_keterangan && Storage::exists('private/surat_keterangan/' . $asesmen_ujian->surat_keterangan)) {
        //         Storage::delete('private/surat_keterangan/' . $asesmen_ujian->surat_keterangan);
        //     }

        //     $file = $request->file('surat_keterangan');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $file->storeAs('private/surat_keterangan', $filename);
        //     $data['surat_keterangan'] = $filename;
        // } else {
        //     unset($data['surat_keterangan']); // jangan timpa kalau kosong
        // }

        // Update mahasiswa
        $asesmen_ujian->update($data);

        // === Regenerate PDF (opsional) ===
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('ujian.pdf', compact('asesmen_ujian'));
        $pdfFilename = 'asesmen_ujian_' . preg_replace('/[\/\\\\]/', '-', $asesmen_ujian->nim) . '.pdf';
        $pdfPath = 'private/pdf_asesmen_ujian/' . $pdfFilename;

        Storage::put($pdfPath, $pdf->output());
        $asesmen_ujian->update(['pdf_path' => $pdfPath]);

        return redirect()->route('ujian.index')->with('success', 'Data asesmen ujian berhasil diperbarui!');
    }

    public function show($id)
    {
        $asesmen_ujian = AsesmenUjian::findOrFail($id);
        return view('ujian.show', compact('asesmen_ujian'));
    }
}
