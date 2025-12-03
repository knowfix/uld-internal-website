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
            <div class="flex items-center space-x-4 text-[#1F4E79] font-medium">
                <!-- Tombol Edit Data (hidden awalnya) -->
                <a id="edit-btn" href="#"
                class="hidden flex items-center space-x-2 text-green-800 font-medium cursor-pointer 
                        border border-green-800 rounded-lg px-3 py-2
                        hover:bg-green-800 hover:text-white transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    <span>Edit Data</span>
                </a>

                <form id="delete-form" action="{{ route('mahasiswa.bulkDelete') }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="ids" id="delete-ids">
                    <button type="submit" 
                        class="flex items-center space-x-2 text-red-600 font-medium cursor-pointer
                            border border-red-600 rounded-lg px-3 py-2
                            hover:bg-red-600 hover:text-white transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m-4 0h14"/>
                        </svg>
                        <span>Hapus Data</span>
                    </button>
                </form>
                <form id="alumni-form" action="{{ route('mahasiswa.jadikanAlumni') }}" method="POST" class="hidden">
                    @csrf
                    <input type="hidden" id="alumni-ids" name="ids">
                    <button type="submit" 
                        class="flex items-center space-x-2 text-purple-600 font-medium cursor-pointer
                            border border-purple-600 rounded-lg px-3 py-2
                            hover:bg-purple-700 hover:text-white transition-colors duration-200">
                        Pindah Alumni
                    </button>
                </form>

                @if(auth()->user()->role === 'superadmin')
                    <a href="{{ route('mahasiswa.create') }}" 
                        class="flex items-center space-x-2 text-[#174A6F] font-medium cursor-pointer 
                                border border-[#174A6F] rounded-lg px-3 py-2 
                                hover:bg-[#174A6F] hover:text-white transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span>Tambah Data</span>
                    </a>
                @endif
                {{-- Menu Export !!!Pending --}}
                {{-- <button  class="flex items-center space-x-2 text-[#174A6F] font-medium cursor-pointer 
                        border border-[#174A6F] rounded-lg px-3 py-2 
                        hover:bg-[#174A6F] hover:text-white transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                        viewBox="0 0 24 24" stroke="currentColor">
                        <!-- Icon download -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                    </svg>
                    <span>Export File</span>
                </button> --}}
                <button  class="flex items-center space-x-2 text-[#174A6F] font-medium cursor-pointer 
                        border border-[#174A6F] rounded-lg px-3 py-2 
                        hover:bg-[#174A6F] hover:text-white transition-colors duration-200">
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
                        @if(auth()->user()->role === 'superadmin')
                            <th class="p-2 border text-center">
                                <input type="checkbox" id="select-all">
                            </th>
                        @endif
                        {{-- <th class="p-2 border"></th> --}}
                        <th class="p-2 border">Nama</th>
                        <th class="p-2 border">Fakultas</th>
                        <th class="p-2 border">Pendidikan</th>
                        <th class="p-2 border">Angkatan</th>
                        <th class="p-2 border">Jenis Disabilitas</th>
                        <th class="p-2 border">Surat Hasil Asesmen</th>
                        <th class="p-2 border">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswas as $mhs)
                    <tr>
                        @if(auth()->user()->role === 'superadmin')
                            <td class="p-2 border text-center">
                                <input type="checkbox" class="select-mahasiswa" value="{{ $mhs->id }}">
                            </td>
                        @endif
                        <td class="p-2 border">{{ $mhs->nama }}</td>
                        <td class="p-2 border">{{ $mhs->fakultas }}</td>
                        <td class="p-2 border">{{ $mhs->pendidikan }}</td>
                        <td class="p-2 border">{{ $mhs->angkatan }}</td>
                        <td class="p-2 border">{{ $mhs->ragam_disabilitas }}</td>
                        <td class="p-2 border text-center">
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
                        <td class="p-2 border text-center">
                            <a href="{{ route('mahasiswa.show', $mhs->id) }}" 
                            class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                    class="h-4 w-4 mr-1" 
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Detail
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Tombol Edit (awal tersembunyi) -->
        </div>
    </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const alumniForm = document.getElementById("alumni-form");
    const alumniIds = document.getElementById("alumni-ids"); //alumni
    const selectAll = document.getElementById("select-all"); // header checkbox
    const checkboxes = document.querySelectorAll(".select-mahasiswa");
    const editBtn = document.getElementById("edit-btn");
    const deleteForm = document.getElementById("delete-form");
    const deleteIds = document.getElementById("delete-ids");

    function updateSelection() {
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
            alumniForm.classList.remove("hidden");
            alumniIds.value = selected.join(",");
        } else {
            deleteForm.classList.add("hidden");
            deleteIds.value = "";
            alumniForm.classList.add("hidden");
            alumniIds.value = "";
        }
    }

    // Checkbox tiap baris
    checkboxes.forEach(cb => {
        cb.addEventListener("change", updateSelection);
    });

    // Checkbox "select all"
    if (selectAll) {
        selectAll.addEventListener("change", function () {
            checkboxes.forEach(cb => cb.checked = this.checked);
            updateSelection();
        });
    }
});
function toggleUserMenu() {
    const menu = document.getElementById('user-menu');
    menu.classList.toggle('hidden');
}
</script>

@endsection
