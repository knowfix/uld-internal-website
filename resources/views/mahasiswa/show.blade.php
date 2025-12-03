@extends('layout.sideBarMahasiswa')

@section('title', 'Dashboard | Mahasiswa Disabilitas')

@section('content')
    <!-- Main Content -->
    <main class="flex-1 bg-gray-100 flex flex-col">
        <div class="flex items-center space-x-3 bg-[#1B4E71] text-white px-6 py-2 cursor-pointer h-18">
            <!-- Home Simple -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <ellipse cx="12" cy="5" rx="9" ry="3"/>
                    <path d="M3 5v14c0 1.66 4.03 3 9 3s9-1.34 9-3V5"/>
                    <path d="M3 12c0 1.66 4.03 3 9 3s9-1.34 9-3"/>
            </svg>

            <!-- Teks -->
            <span class="font-medium text-2xl">Data Mahasiswa</span>
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
            <div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-6">
                
                {{-- Tombol kembali --}}
                <div class="mb-4">
                    <a href="{{ route('mahasiswa.index') }}" 
                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                        ← Kembali
                    </a>
                </div>

                {{-- Judul --}}
                <h2 class="text-2xl font-bold text-blue-700 mb-6 border-b pb-2">Profil</h2>

                {{-- Data Utama --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <p><span class="text-lg font-semibold text-gray-800">Nama Lengkap:</span><br>{{ $mahasiswa->nama }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-800">Jenis Kelamin:</span><br>{{ $mahasiswa->jenis_kelamin }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-800">Tanggal Lahir:</span><br>{{ $mahasiswa->tanggal_lahir }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-800">Pendidikan:</span><br>{{ $mahasiswa->pendidikan }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-800">Angkatan:</span><br>{{ $mahasiswa->angkatan }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-800">Fakultas:</span><br>{{ $mahasiswa->fakultas }}</p>
                        <p class="mt-3">
                            <span class="text-lg font-semibold text-gray-800">Surat Keterangan Disabilitas:</span><br>
                            <a href="{{ $mahasiswa->surat_keterangan_link }}" 
                            target="_blank" 
                            class="text-blue-600 hover:underline">
                                {{ $mahasiswa->surat_keterangan_link }}
                            </a>
                        </p>                    
                    </div>
                    <div>
                        <p><span class="text-lg font-semibold text-gray-800">Program Studi:</span><br>{{ $mahasiswa->prodi }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-700">Nomor Induk Mahasiswa:</span><br>{{ $mahasiswa->nim }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-700">Nomor Telepon:</span><br>{{ $mahasiswa->nomor_hp }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-700">Beasiswa:</span><br>{{ $mahasiswa->beasiswa }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-700">Ragam Disabilitas:</span><br>{{ $mahasiswa->ragam_disabilitas }}</p>
                    </div>
                </div>

                {{-- Detail Tambahan --}}
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Detail Disabilitas</h3>
                        <p class="text-gray-600">{{ $mahasiswa->detail_disabilitas }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Alat Bantu</h3>
                        <p class="text-gray-600">{{ $mahasiswa->alat_bantu }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Kesulitan/Kendala saat proses belajar</h3>
                        <p class="text-gray-600">{{ $mahasiswa->kendala }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Akomodasi yang diperlukan</h3>
                        <p class="text-gray-600">{{ $mahasiswa->akomodasi }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Pendampingan/Layanan</h3>
                        <p class="text-gray-600">{{ $mahasiswa->pendampingan }}</p>
                    </div>
                </div>
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
