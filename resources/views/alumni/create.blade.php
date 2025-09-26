@extends('layout.sideBarAlumni')

@section('title', 'Dashboard | Mahasiswa Disabilitas')

@section('content')
    <!-- Main Content -->
    <main class="flex-1 bg-gray-100 flex flex-col">
        <div class="flex items-center space-x-3 bg-[#1B4E71] text-white px-6 py-2 cursor-pointer h-18">
            <!-- Home Simple -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" 
                        fill="none" viewBox="0 0 24 24" 
                        stroke="currentColor" stroke-width="2">
                        <path d="M22 10l-10-5L2 10l10 5 10-5z" 
                            class=" group-hover:stroke-white"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5" 
                            class=" group-hover:stroke-white"/>
            </svg>

            <!-- Teks -->
            <span class="font-medium text-2xl">Data Alumni</span>
        </div>

        <div class="flex-1 overflow-y-auto bg-gray-100 p-6">
            <div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-6">
            {{-- <div class="p-6 bg-white rounded-xl shadow"> --}}
                <form action="{{ route('alumni.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- 1. Identitas Utama -->
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-semibold mb-4 text-[#083D62]">Identitas Utama</h2>
                        <a href="{{ route('alumni.index') }}" 
                        class="flex items-center space-x-1 text-gray-700 cursor-pointer  bg-gray-200 hover:bg-gray-300 p-2 rounded w-26">
                            <!-- Icon panah -->
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                class="h-5 w-5" fill="none" 
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                            <span class="font-medium  ">Kembali</span>
                        </a>

                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium text-[#083D62]">Nama Lengkap</label>
                            <input type="text" name="nama" class="w-full border rounded-2xl p-2 mt-1" required>
                        </div>

                        <div>
                            <label class="block font-medium text-[#083D62]">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full border rounded-2xl p-2 mt-1 " required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-medium text-[#083D62]">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="w-full border rounded-2xl p-2  mt-1" required>
                        </div>

                        <div>
                            <label class="block font-medium text-[#083D62]">NIM</label>
                            <input type="text" name="nim" class="w-full border rounded-2xl p-2  mt-1" required>
                        </div>

                        <div>
                            <label class="block font-medium text-[#083D62]">Program Studi</label>
                            <input type="text" name="prodi" class="w-full border rounded-2xl p-2  mt-1" required>
                        </div>

                        <div>
                            <label class="block font-medium text-[#083D62]">Fakultas</label>
                            <input type="text" name="fakultas" class="w-full border rounded-2xl p-2  mt-1" required>
                        </div>

                        <div>
                            <label class="block font-medium text-[#083D62]">Pendidikan</label>
                            <input type="text" name="pendidikan" class="w-full border rounded-2xl p-2  mt-1 h-13" required>
                        </div>
                        <div>
                            <label class="block font-medium text-[#083D62]">Angkatan</label>
                            <input type="text" name="angkatan" class="w-full border rounded-2xl p-2  mt-1 h-13" required>
                        </div>
                        
                        <div>
                            <label class="block font-medium text-[#083D62]">Beasiswa</label>
                            <input type="text" name="beasiswa" class="w-full border rounded-2xl p-2  mt-1">
                        </div>
                        
                        <div>
                            <label class="block font-medium text-[#083D62]">Nomor HP</label>
                            <input type="text" name="nomor_hp" class="w-full border rounded-2xl p-2  mt-1" required>
                        </div>
                        <div>
                            <label class="block font-medium text-[#083D62]">Ragam Disabilitas</label>
                            <input type="text" name="ragam_disabilitas" class="w-full border rounded-2xl p-2  mt-1 h-13" required>
                        </div>
                        <div>
                            <label class="block font-medium text-[#083D62]">Surat Keterangan Disabilitas</label>
                            <input type="text" name="surat_keterangan_link" class="w-full border rounded-2xl p-2  mt-1 h-13" required>
                        </div>

                        <div>
                            <label class="block font-medium mb-1 text-[#083D62]">Surat Keterangan Disabilitas</label>
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
                        </div>
                    </div>

                    <!-- 2. Informasi Tambahan -->
                    <h2 class="text-2xl font-semibold mt-8 mb-4 text-[#083D62]">Informasi Tambahan</h2>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="block font-medium text-[#083D62]">Detail Disabilitas</label>
                            <textarea name="detail_disabilitas" class="w-full border rounded-2xl p-2 mt-2"></textarea>
                        </div>

                        <div class="col-span-2">
                            <label class="block font-medium text-[#083D62]">Alat Bantu</label>
                            <textarea name="alat_bantu" class="w-full border rounded-2xl p-2 mt-2"></textarea>
                        </div>

                        <div class="col-span-2">
                            <label class="block font-medium text-[#083D62]">Kesulitan/Kendala saat proses belajar</label>
                            <textarea name="kendala" class="w-full border rounded-2xl p-2 mt-2"></textarea>
                        </div>

                        <div class="col-span-2">
                            <label class="block font-medium text-[#083D62]">Akomodasi yang diperlukan</label>
                            <textarea name="akomodasi" class="w-full border rounded-2xl p-2 mt-2"></textarea>
                        </div>

                        <div class="col-span-2">
                            <label class="block font-medium text-[#083D62]">Pendampingan atau layanan</label>
                            <textarea name="pendampingan" class="w-full border rounded-2xl p-2 mt-2"></textarea>
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="mt-6">
                        <button type="submit" class="bg-[#174A6F] text-white px-4 py-2 rounded-lg">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </main>

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
                editBtn.href = "/alumni/" + selected[0] + "/edit";
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

@endsection