@extends('layout.sideBarUjian')

@section('title', 'Dashboard | Mahasiswa Disabilitas')

@section('content')
    <!-- Main Content -->
    <main class="flex-1 bg-gray-100 flex flex-col">
        <div class="flex items-center space-x-3 bg-[#1B4E71] text-white px-6 py-2 cursor-pointer h-18">
            <!-- Home Simple -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="9" rx="1"/>
                    <rect x="14" y="3" width="7" height="5" rx="1"/>
                    <rect x="14" y="12" width="7" height="9" rx="1"/>
                    <rect x="3" y="16" width="7" height="5" rx="1"/>
            </svg>

            <!-- Teks -->
            <span class="font-medium text-2xl">Data Asesmen Kebutuhan Ujian Mahasiswa</span>
            <!-- Narahubung (kanan) -->
            <div class="ml-auto flex items-center space-x-3 text-sm">
                <!-- Ikon Email -->
                <!-- Ikon WhatsApp -->
                <a href="https://wa.me/6282227021332" target="_blank"
                class="flex items-center space-x-1 hover:text-gray-200 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 21l1.2-4.2A8.959 8.959 0 015 4a8.959 8.959 0 0112.728 12.728A8.959 8.959 0 018.8 19.8L4.2 21z" />
                    </svg>
                    <span>Hubungi Kami</span>
                </a>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto bg-gray-100 p-6">
            {{-- <div class="flex-1 overflow-y-auto bg-gray-100"> --}}
            {{-- <div class="p-6 bg-white rounded-xl shadow"> --}}
            <div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-6">
                <form action="{{ route('ujian.update', $asesmen_ujian->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- 1. Identitas Utama -->
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-semibold mb-4 text-[#083D62]">Edit Data Asesmen Ujian Mahasiswa</h2>
                        <a href="{{ route('ujian.index') }}" 
                        class="flex items-center space-x-1 text-gray-700 cursor-pointer  bg-gray-200 hover:bg-gray-300 p-2 rounded w-26">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                            <span class="font-medium">Kembali</span>
                        </a>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium text-[#083D62]">Nama Lengkap</label>
                            <input type="text" name="nama" 
                                value="{{ old('nama', $asesmen_ujian->nama) }}" 
                                class="w-full border rounded-2xl p-2 mt-1" required>
                        </div>

                        <div>
                            <label class="block font-medium text-[#083D62]">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full border rounded-2xl p-2 mt-1" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $asesmen_ujian->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $asesmen_ujian->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-medium text-[#083D62]">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" 
                                value="{{ old('tanggal_lahir', $asesmen_ujian->tanggal_lahir) }}" 
                                class="w-full border rounded-2xl p-2 mt-1" required>
                        </div>

                        <div>
                            <label class="block font-medium text-[#083D62]">NIM</label>
                            <input type="text" name="nim" 
                                value="{{ old('nim', $asesmen_ujian->nim) }}" 
                                class="w-full border rounded-2xl p-2 mt-1" required>
                        </div>

                        <div>
                            <label class="block font-medium text-[#083D62]">Program Studi</label>
                            <input type="text" name="prodi" 
                                value="{{ old('prodi', $asesmen_ujian->prodi) }}" 
                                class="w-full border rounded-2xl p-2 mt-1" required>
                        </div>

                        <div>
                            <label class="block font-medium text-[#083D62]">Fakultas</label>
                            <input type="text" name="fakultas" 
                                value="{{ old('fakultas', $asesmen_ujian->fakultas) }}" 
                                class="w-full border rounded-2xl p-2 mt-1" required>
                        </div>

                        <div>
                            <label class="block font-medium text-[#083D62]">Semester</label>
                            <input type="text" name="semester" 
                                value="{{ old('semester', $asesmen_ujian->semester) }}" 
                                class="w-full border rounded-2xl p-2 mt-1" required>
                        </div>  

                        <div>
                            <label class="block font-medium text-[#083D62]">Ragam Disabilitas</label>
                            <input type="text" name="ragam_disabilitas" 
                                value="{{ old('ragam_disabilitas', $asesmen_ujian->ragam_disabilitas) }}" 
                                class="w-full border rounded-2xl p-2 mt-1" required>
                        </div>

                        {{-- <div>
                            <label class="block font-medium mb-1 text-[#083D62]">Upload Surat Keterangan Baru</label>
                            <div class="w-full border rounded-2xl p-2 pl-5 bg-[#FFFFFF]">
                                <input type="file" 
                                    name="surat_keterangan"
                                    class="w-full text-sm text-gray-600
                                            file:mr-4 file:py-2 file:px-4
                                            file:rounded-md file:border-0
                                            file:text-sm file:font-semibold
                                            file:bg-[#dedede] file:text-[#7B7E89]
                                            hover:file:bg-[#78a6ba] hover:file:text-[#FFFFFF]"
                                    accept=".pdf,.jpg,.png">
                            </div>
                            @if($asesmen_ujian->surat_keterangan)
                                <p class="mt-1 text-sm text-gray-500">File lama: {{ $asesmen_ujian->surat_keterangan }}</p>
                            @endif
                        </div> --}}
                    </div>

                    <!-- 2. Informasi Tambahan -->
                    <h2 class="text-2xl font-semibold mt-8 mb-4 text-[#083D62]">Informasi Tambahan</h2>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="block font-medium text-[#083D62]">Keperluan Perpanjangan Waktu</label>
                            <textarea name="keperluan_perpanjangan" class="w-full border rounded-2xl p-2 mt-2">{{ old('detail_disabilitas', $asesmen_ujian->detail_disabilitas) }}</textarea>
                        </div>

                        <div class="col-span-2">
                            <label class="block font-medium text-[#083D62]">Alat Bantu</label>
                            <textarea name="alat_bantu" class="w-full border rounded-2xl p-2 mt-2">{{ old('alat_bantu', $asesmen_ujian->alat_bantu) }}</textarea>
                        </div>

                        <div class="col-span-2">
                            <label class="block font-medium text-[#083D62]">Preferensi Format Soal Ujian</label>
                            <textarea name="preferensi_format" class="w-full border rounded-2xl p-2 mt-2">{{ old('kendala', $asesmen_ujian->kendala) }}</textarea>
                        </div>

                        <div class="col-span-2">
                            <label class="block font-medium text-[#083D62]">Keperluan Pendampingan saat Ujian</label>
                            <textarea name="keperluan_pendampingan" class="w-full border rounded-2xl p-2 mt-2">{{ old('akomodasi', $asesmen_ujian->akomodasi) }}</textarea>
                        </div>

                        <div class="col-span-2">
                            <label class="block font-medium text-[#083D62]">Penyesuaian Lain yang Diperlukan</label>
                            <textarea name="penyesuaian_lain" class="w-full border rounded-2xl p-2 mt-2">{{ old('pendampingan', $asesmen_ujian->pendampingan) }}</textarea>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="mt-6">
                        <button type="submit" class="bg-[#174A6F] text-white px-4 py-2 rounded-lg">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <script>
        function toggleUserMenu() {
            const menu = document.getElementById('user-menu');
            menu.classList.toggle('hidden');
        }
    </script>
@endsection