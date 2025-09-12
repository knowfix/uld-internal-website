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
                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
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
                    <!-- Tombol Edit Data (hidden awalnya) -->
                    <a id="edit-btn" href="#"
                    class="hidden flex items-center space-x-2 text-green-800 font-medium cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                        </svg>
                        <span>Edit Data</span>
                    </a>
                    <!-- Tombol Hapus Data (hidden default) -->
                    <form id="delete-form" action="{{ route('mahasiswa.bulkDelete') }}" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="ids" id="delete-ids">
                        <button type="submit" 
                            class="flex items-center space-x-2 text-red-600 font-medium cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m-4 0h14"/>
                            </svg>
                            <span>Hapus Data</span>
                        </button>
                    </form>
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
                            <th class="p-2 border"></th>
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
                            <td class="p-2 border">
                                <input type="checkbox" class="select-mahasiswa" value="{{ $mhs->id }}">
                            </td>
                            <td class="p-2 border">{{ $mhs->nama }}</td>
                            <td class="p-2 border">{{ $mhs->fakultas }}</td>
                            <td class="p-2 border">{{ $mhs->pendidikan }}</td>
                            <td class="p-2 border">{{ $mhs->angkatan }}</td>
                            <td class="p-2 border">{{ $mhs->ragam_disabilitas }}</td>
                            <td class="p-2 border">
                                <a href="{{ route('mahasiswa.pdf', $mhs->id) }}" 
                                    class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                                    Download PDF
                                </a>
                            </td>
                            {{-- <td class="border text-center">
                                @if($mhs->surat_keterangan)
                                <a href="{{ route('mahasiswa.download', $mhs->id) }}" class="text-blue-600 hover:underline">
                                    Download PDF
                                </a>
                                @else
                                <span class="text-gray-400">Tidak ada file</span>
                                @endif
                            </td> --}}
                            <td class="text-center border">Aksi</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Tombol Edit (awal tersembunyi) -->
            </div>
        </div>
    </main>
</body>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll(".select-mahasiswa");
    const editBtn = document.getElementById("edit-btn");
    const deleteForm = document.getElementById("delete-form");
    const deleteIds = document.getElementById("delete-ids");

    checkboxes.forEach(cb => {
        cb.addEventListener("change", function () {
            let selected = [];
            document.querySelectorAll(".select-mahasiswa:checked").forEach(el => {
                selected.push(el.value);
            });

            // Toggle Edit (hanya 1 terpilih)
            if (selected.length === 1) {
                editBtn.classList.remove("hidden");
                editBtn.href = "/mahasiswa/" + selected[0] + "/edit";
            } else {
                editBtn.classList.add("hidden");
                editBtn.href = "#";
            }

            // Toggle Delete (boleh >0)
            if (selected.length > 0) {
                deleteForm.classList.remove("hidden");
                deleteIds.value = selected.join(","); // kirim ID array
            } else {
                deleteForm.classList.add("hidden");
                deleteIds.value = "";
            }
        });
    });
});
function toggleUserMenu() {
    const menu = document.getElementById('user-menu');
    menu.classList.toggle('hidden');
}
</script>


</html>
