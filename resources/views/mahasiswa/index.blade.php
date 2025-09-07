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
        <div class="flex items-center justify-between bg-white p-3 rounded-lg shadow">
            <!-- Kiri: Icon + Nama -->
            <div class="flex items-center space-x-3">
                <!-- Icon user -->
                <div class="w-10 h-10 bg-[#083D62] text-white flex items-center justify-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A9 9 0 1118.364 4.56M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>

                <!-- Nama + Role -->
                <div>
                    <p class="text-[#083D62] font-semibold">Admin1 ULD</p>
                    <p class="text-gray-500 text-sm">Administrator</p>
                </div>
            </div>

            <!-- Panah kanan -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#083D62]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
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
                <div class="flex items-center space-x-3 bg-[#083D62] text-white px-6 py-2 rounded-xl cursor-pointer h-15 mx-4 my-2">
                    <!-- Home Simple -->
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
            <a href="#">
                <div class="group flex items-center space-x-3 bg-white text-[#757575] 
                            px-6 py-1 rounded-xl cursor-pointer h-15 mx-4 my-2
                            hover:bg-[#517289] hover:text-white transition duration-200">
                    
                    <!-- Graduation Cap -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" 
                        fill="none" viewBox="0 0 24 24" 
                        stroke="currentColor" stroke-width="2">
                        <path d="M22 10l-10-5L2 10l10 5 10-5z" 
                            class="stroke-[#757575] group-hover:stroke-white"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5" 
                            class="stroke-[#757575] group-hover:stroke-white"/>
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

        <div class="flex-1 overflow-y-auto bg-gray-100">
            <div class="bg-[#EAF3FA] px-6 py-3 flex items-center justify-between">
                <!-- Search -->
                <div class="relative w-72">
                    <input type="text" placeholder="Cari mahasiswa...."
                        class="w-full pl-4 pr-10 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#1F4E79] focus:outline-none" />
                    <button class="absolute right-3 top-2 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z" />
                        </svg>
                    </button>
                </div>

                <!-- Actions -->
                <div class="flex items-center space-x-6 text-[#1F4E79] font-medium">
                    <a href="{{ route('mahasiswa.create') }}" 
                    class="flex items-center space-x-2 text-[#174A6F] font-medium cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Tambah Data</span>
                    </a>
                    <button class="flex items-center space-x-1 hover:text-[#163a5c]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                            viewBox="0 0 24 24" stroke="currentColor">
                            <!-- Icon download -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                        </svg>
                        <span>Export File</span>
                    </button>
                    <button class="flex items-center space-x-1 hover:text-[#163a5c]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                        <span>Filter</span>
                    </button>
                </div>
            </div>
            <div class="p-6">
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-2 border">Nama</th>
                            <th class="p-2 border">Fakultas</th>
                            <th class="p-2 border">Pendidikan</th>
                            <th class="p-2 border">Angkatan</th>
                            <th class="p-2 border">Jenis Disabilitas</th>
                            <th class="p-2 border">Surat Disabilitas</th>
                            <th class="p-2 border">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswas as $mhs)
                        <tr>
                            <td class="p-2 border">{{ $mhs->nama }}</td>
                            <td class="p-2 border">{{ $mhs->fakultas }}</td>
                            <td class="p-2 border">{{ $mhs->pendidikan }}</td>
                            <td class="p-2 border">{{ $mhs->angkatan }}</td>
                            <td class="p-2 border">{{ $mhs->ragam_disabilitas }}</td>
                            <td class="border text-center">
                                @if($mhs->surat_keterangan)
                                <a href="{{ route('mahasiswa.download', $mhs->id) }}" class="text-blue-600 hover:underline">
                                    Download PDF
                                </a>
                                @else
                                <span class="text-gray-400">Tidak ada file</span>
                                @endif
                            </td>
                            <td class="text-center border">Aksi</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>
</html>
