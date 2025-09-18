<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Mahasiswa Disabilitas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg flex flex-col">
        <div class="bg-[#083D62] h-18 flex items-center px-5">
            <img src="{{ asset('images/newlogo.png') }}" alt="">
        </div>
        <!-- Wrapper -->
        <div class="relative">
            <!-- Button -->
            <div class="flex items-center justify-between p-3 bg-white rounded-lg shadow cursor-pointer"
                onclick="toggleUserMenu()">
                <!-- Avatar + Nama -->
                <div class="flex items-center space-x-3">
                    <!-- Avatar -->
                    <div class="w-10 h-10 bg-[#083D62] text-white flex items-center justify-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A9 9 0 1118.364 4.56M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <!-- Nama + Role -->
                    <div>
                        <p class="text-[#083D62] font-semibold">{{ Auth::user()->name }}</p>
                        <p class="text-gray-500 text-sm">{{ Auth::user()->role ?? 'User' }}</p>
                    </div>
                </div>

                <!-- Panah -->
                <div class="text-[#083D62]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-200"
                        id="arrow-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </div>
                
            </div>

            <!-- Dropdown -->
            <div id="user-menu"
                class="hidden absolute left-0 mt-2 w-full bg-white rounded-lg shadow-lg z-50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="block w-full text-center px-4 py-2 text-sm text-red-600 hover:bg-red-600 hover:text-white hover:rounded-lg">
                        Logout
                    </button>
                </form>
            </div>
        </div>
        
        <nav class="space-y-4">
            <a href="{{ route('dashboard') }}">
                <div class="group flex items-center space-x-3 bg-white text-[#757575] 
                            px-6 py-1 rounded-xl cursor-pointer h-15 mx-4 mt-4 mb-2
                            hover:bg-[#517289] hover:text-white transition duration-200">
                    
                    <!-- Graduation Cap -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>

                    <!-- Teks -->
                    <span class="font-medium">Dashboard</span>
                </div>
            </a>
            <a href="{{ route('mahasiswa.index') }}">
                <div class="group flex items-center space-x-3 bg-white text-[#757575] 
                            px-6 py-1 rounded-xl cursor-pointer h-15 mx-4 mb-2
                            hover:bg-[#517289] hover:text-white transition duration-200">
                    
                    <!-- Graduation Cap -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <ellipse cx="12" cy="5" rx="9" ry="3"/>
                    <path d="M3 5v14c0 1.66 4.03 3 9 3s9-1.34 9-3V5"/>
                    <path d="M3 12c0 1.66 4.03 3 9 3s9-1.34 9-3"/>
                    </svg>

                    <!-- Teks -->
                    <span class="font-medium">Data Mahasiswa</span>
                </div>
            </a>
            <a href="{{ route('alumni.index') }}">
                <div class="flex items-center space-x-3 bg-[#083D62] text-white px-6 py-2 rounded-xl cursor-pointer h-15 mx-4 my-2">
                    <!-- Graduation -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" 
                        fill="none" viewBox="0 0 24 24" 
                        stroke="currentColor" stroke-width="2">
                        <path d="M22 10l-10-5L2 10l10 5 10-5z" 
                            class=" group-hover:stroke-white"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5" 
                            class=" group-hover:stroke-white"/>
                    </svg>
        
                    <!-- Teks -->
                    <span class="font-medium">Data Alumni</span>
                </div>
            </a>
            <a href="#">
                <div class="group flex items-center space-x-3 bg-white text-[#757575] 
                            px-6 py-1 rounded-xl cursor-pointer h-15 mx-4 my-2
                            hover:bg-[#517289] hover:text-white transition duration-200">
                    
                    <!-- Graduation Cap -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="9" rx="1"/>
                    <rect x="14" y="3" width="7" height="5" rx="1"/>
                    <rect x="14" y="12" width="7" height="9" rx="1"/>
                    <rect x="3" y="16" width="7" height="5" rx="1"/>
                    </svg>

                    <!-- Teks -->
                    <span class="font-medium">Kegiatan</span>
                </div>
            </a>

            
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 bg-gray-100 flex flex-col">
        <div class="flex items-center space-x-3 bg-[#1B4E71] text-white px-6 py-2 cursor-pointer h-18">
            <!-- Home Simple -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" 
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
            <polyline points="9 22 9 12 15 12 15 22"/>
            </svg>

            <!-- Teks -->
            <span class="font-medium text-2xl">Data Mahasiswa</span>
        </div>

        <div class="flex-1 overflow-y-auto bg-gray-100 p-6">
            <div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-6">
                
                {{-- Tombol kembali --}}
                <div class="mb-4">
                    <a href="{{ route('alumni.index') }}" 
                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                        ← Kembali
                    </a>
                </div>

                {{-- Judul --}}
                <h2 class="text-2xl font-bold text-blue-700 mb-6 border-b pb-2">Profil</h2>

                {{-- Data Utama --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <p><span class="text-lg font-semibold text-gray-800">Nama Lengkap:</span><br>{{ $alumni->nama }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-800">Jenis Kelamin:</span><br>{{ $alumni->jenis_kelamin }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-800">Tanggal Lahir:</span><br>{{ $alumni->tanggal_lahir }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-800">Pendidikan:</span><br>{{ $alumni->pendidikan }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-800">Angkatan:</span><br>{{ $alumni->angkatan }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-800">Fakultas:</span><br>{{ $alumni->fakultas }}</p>
                        <p class="mt-3">
                            <span class="text-lg font-semibold text-gray-800">Surat Keterangan Disabilitas:</span><br>
                            <a href="{{ $alumni->surat_keterangan_link }}" 
                            target="_blank" 
                            class="text-blue-600 hover:underline">
                                {{ $alumni->surat_keterangan_link }}
                            </a>
                        </p>                    
                    </div>
                    <div>
                        <p><span class="text-lg font-semibold text-gray-800">Program Studi:</span><br>{{ $alumni->prodi }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-700">Nomor Induk alumni:</span><br>{{ $alumni->nim }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-700">Nomor Telepon:</span><br>{{ $alumni->nomor_hp }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-700">Beasiswa:</span><br>{{ $alumni->beasiswa }}</p>
                        <p class="mt-3"><span class="text-lg font-semibold text-gray-700">Ragam Disabilitas:</span><br>{{ $alumni->ragam_disabilitas }}</p>
                    </div>
                </div>

                {{-- Detail Tambahan --}}
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Detail Disabilitas</h3>
                        <p class="text-gray-600">{{ $alumni->detail_disabilitas }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Alat Bantu</h3>
                        <p class="text-gray-600">{{ $alumni->alat_bantu }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Kesulitan/Kendala saat proses belajar</h3>
                        <p class="text-gray-600">{{ $alumni->kendala }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Akomodasi yang diperlukan</h3>
                        <p class="text-gray-600">{{ $alumni->akomodasi }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Pendampingan/Layanan</h3>
                        <p class="text-gray-600">{{ $alumni->pendampingan }}</p>
                    </div>
                </div>
            </div>
        </div>

    </main>
</body>
<script>
    function toggleUserMenu() {
        const menu = document.getElementById('user-menu');
        menu.classList.toggle('hidden');
    }
</script>

</html>
