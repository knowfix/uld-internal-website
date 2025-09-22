<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Mahasiswa Disabilitas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex min-h-screen">
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
                <div class="flex items-center space-x-3 bg-[#083D62] text-white px-6 py-2 rounded-xl cursor-pointer h-15 mx-4 mt-4 mb-2">
                    <!-- Home Simple -->
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
                            px-6 py-1 rounded-xl cursor-pointer h-15 mx-4 my-2 
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
            <a href="{{ route('alumni.index') }}">
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
                    <span class="font-medium">Asesmen Ujian</span>
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
            <span class="font-medium text-2xl">Dashboard</span>
        </div>
        <!-- Section Statistik -->
        <section class="relative bg-cover bg-center h-64 flex items-center justify-center"
            style="background-image: url('{{ asset('images/fotoKantorULD.jpg') }}');">
            <!-- Overlay gelap -->
            <div class="absolute inset-0 bg-[#0a2d44]/80"></div>

            <!-- Konten -->
            <div class="relative text-center text-white px-6">
                <h1 class="text-2xl md:text-3xl font-bold">DATA MAHASISWA DISABILITAS UGM</h1>
                <p class="mt-2 text-sm md:text-base">
                    Menyediakan dukungan layanan terbaik bagi mahasiswa disabilitas untuk mendukung proses belajar yang inklusif dan setara
                </p>

                <!-- Statistik -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-6">
                    <div>
                        <p class="font-semibold">Mahasiswa Terdata</p>
                        <h2 class="text-3xl font-bold">{{ $totalMahasiswa }}</h2>
                    </div>
                    <div>
                        <p class="font-semibold">Jenis Disabilitas</p>
                        <h2 class="text-3xl font-bold">{{ $totalJenis }}</h2>
                    </div>
                    <div>
                        <p class="font-semibold">Sebaran Fakultas</p>
                        <h2 class="text-3xl font-bold">{{ $totalFakultas }}</h2>
                    </div>
                    <div>
                        <p class="font-semibold">Jumlah Lulusan</p>
                        <h2 class="text-3xl font-bold">{{ $totalAlumni }}</h2>
                    </div>
                </div>
            </div>
        </section>

        <!-- Charts -->
        <div class="grid grid-cols-2 gap-4 p-6">
            <div class="bg-white rounded-xl shadow p-4 h-80 flex flex-col">
                <h3 class="font-semibold mb-2">Sebaran Mahasiswa di Fakultas</h3>
                <canvas id="chartFakultas" class="w-full h-full"></canvas>
            </div>
            <div class="bg-white rounded-xl shadow p-4 h-80  flex flex-col">
                <h3 class="font-semibold mb-2">Jumlah Mahasiswa Disabilitas per Tahun</h3>
                <canvas id="chartTahun" class="w-full h-full"></canvas>
            </div>
            <div class="bg-white rounded-xl shadow p-4 h-  flex flex-col">
                <h3 class="font-semibold mb-2">Ragam Disabilitas</h3>
                <canvas id="chartPie" class="w-full h-full"></canvas>
            </div>
            <div class="bg-white rounded-xl shadow p-4 h-80  flex flex-col">
                <h3 class="font-semibold mb-2">Jumlah Mahasiswa Disabilitas per Jenis per Tahun</h3>
                <canvas id="chartStacked" class="w-full h-full"></canvas>
            </div>
        </div>
            

    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data dari controller (pastikan data sudah dikirimkan)
    const fakultasLabels = {!! json_encode($dataFakultas->pluck('fakultas')) !!};
    const jumlahPerFakultas = {!! json_encode($dataFakultas->pluck('jumlah')) !!};
    // Chart 1: Bar
    // Bar Chart
    new Chart(document.getElementById('chartFakultas'), {
        type: 'bar',
        data: {
            labels: fakultasLabels,
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: jumlahPerFakultas,
                backgroundColor: 'rgba(8, 61, 98, 1)',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    bottom: 20, // tambahin jarak bawah biar label tidak mepet
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });
    // Chart 2: Line
    // LINE CHART - Tahun Angkatan
    const tahunLabels = {!! json_encode($tahunData->pluck('angkatan')) !!};
    const jumlahPerTahun = {!! json_encode($tahunData->pluck('jumlah')) !!};
    new Chart(document.getElementById('chartTahun'), {
        type: 'line',
        data: {
            labels: tahunLabels,
            datasets: [{
                label: 'Jumlah Mahasiswa Disabilitas',
                data: jumlahPerTahun,
                borderColor: 'rgba(8, 61, 98, 1)',
                backgroundColor: 'rgba(8, 61, 98, 1)',
                tension: 0.3,
                fill: false,
                pointRadius: 5,
                pointBackgroundColor: 'rgba(8, 61, 98, 1)',
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    bottom: 20, // tambahin jarak bawah biar label tidak mepet
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            },
            plugins: {
                legend: {
                    display: true, // tampilkan label dataset di atas chart
                    labels: {
                        color: '#333',
                        font: {
                            weight: 'bold'
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(context) {
                            return `Jumlah mahasiswa disabilitas: ${context.parsed.y}`;
                        }
                    }
                }
            },
            hover: {
                mode: 'nearest',
                intersect: true
            }
        }
    });

    // Chart 3: Pie
    const pieLabels = {!! json_encode($disabilitasData->pluck('ragam_disabilitas')) !!};
    const pieData = {!! json_encode($disabilitasData->pluck('jumlah')) !!};
    new Chart(document.getElementById('chartPie'), {
        type: 'pie',
        data: {
            labels: pieLabels,
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: pieData,
                backgroundColor: [
                    '#ff6384', '#36a2eb', '#ffce56',
                    '#4bc0c0', '#9966ff', '#ff9f40',
                    '#c9cbcf', '#00aaff', '#ff6b6b'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            layout: {
                padding: {
                    bottom: 20, // tambahin jarak bawah biar label tidak mepet
                }
            },
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 20,
                        padding: 15
                    }
                }
            }
        }
    });

    // Chart 4: Stacked Bar
    const jenisData = {!! json_encode($jenisData) !!};

    const tahunJenis = jenisData.map(item => item.angkatan);
    const fisik = jenisData.map(item => item.fisik);
    const sensorik = jenisData.map(item => item.sensorik);
    const mental = jenisData.map(item => item.mental);
    const ganda = jenisData.map(item => item.ganda);
    const lainnya = jenisData.map(item => item.lainnya);
    new Chart(document.getElementById('chartStacked'), {
        type: 'bar',
        data: {
            labels: tahunJenis,
            datasets: [
                {
                    label: 'Fisik',
                    data: fisik,
                    backgroundColor: '#3366cc'
                },
                {
                    label: 'Sensorik',
                    data: sensorik,
                    backgroundColor: '#ff9900'
                },
                {
                    label: 'Mental',
                    data: mental,
                    backgroundColor: '#dc3912'
                },
                {
                    label: 'Ganda',
                    data: ganda,
                    backgroundColor: '#109618'
                },
                {
                    label: 'Lainnya',
                    data: lainnya,
                    backgroundColor: '#990099'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    bottom: 20, // tambahin jarak bawah biar label tidak mepet
                }
            },
            scales: {
                x: { stacked: true },
                y: {
                    stacked: true,
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            },
            plugins: {
                legend: {
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: ${context.parsed.y}`;
                        }
                    }
                }
            }
        }
    });
        
    function toggleUserMenu() {
        const menu = document.getElementById('user-menu');
        menu.classList.toggle('hidden');
    }
</script>
</html>
