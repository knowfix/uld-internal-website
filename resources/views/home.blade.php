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
            <span class="font-medium text-2xl">Dashboard</span>
        </div>
        <div class="flex-1 overflow-y-auto bg-gray-100"> 

            <h1 class="text-2xl font-bold mb-4 p-6 ">DATA MAHASISWA DISABILITAS UGM</h1>
    
            <!-- Cards -->
            <div class="grid grid-cols-4 gap-4 mb-6 p-6">
                <div class="bg-white rounded-xl shadow p-4 text-center">
                    <h2 class="text-3xl font-bold">39</h2>
                    <p>Mahasiswa Terdata</p>
                </div>
                <div class="bg-white rounded-xl shadow p-4 text-center">
                    <h2 class="text-3xl font-bold">5</h2>
                    <p>Jenis Disabilitas</p>
                </div>
                <div class="bg-white rounded-xl shadow p-4 text-center">
                    <h2 class="text-3xl font-bold">8</h2>
                    <p>Jumlah Lulusan</p>
                </div>
                <div class="bg-white rounded-xl shadow p-4 text-center">
                    <h2 class="text-3xl font-bold">5</h2>
                    <p>Layanan Tersedia</p>
                </div>
            </div>
    
            <!-- Charts -->
            <div class="grid grid-cols-2 gap-4 p-6">
                <div class="bg-white rounded-xl shadow p-4">
                    <h3 class="font-semibold mb-2">Sebaran Mahasiswa di Fakultas</h3>
                    <canvas id="chartFakultas"></canvas>
                </div>
                <div class="bg-white rounded-xl shadow p-4">
                    <h3 class="font-semibold mb-2">Jumlah Mahasiswa Disabilitas per Tahun</h3>
                    <canvas id="chartTahun"></canvas>
                </div>
                <div class="bg-white rounded-xl shadow p-4">
                    <h3 class="font-semibold mb-2">Ragam Disabilitas</h3>
                    <canvas id="chartPie"></canvas>
                </div>
                <div class="bg-white rounded-xl shadow p-4">
                    <h3 class="font-semibold mb-2">Jumlah Mahasiswa Disabilitas per Jenis per Tahun</h3>
                    <canvas id="chartStacked"></canvas>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart 1: Bar
    new Chart(document.getElementById('chartFakultas'), {
        type: 'bar',
        data: {
            labels: ['Fisipol', 'Ekonomi', 'Kedokteran', 'Teknik', 'MIPA'],
            datasets: [{
                label: 'Jumlah',
                data: [5, 4, 3, 2, 1],
                backgroundColor: 'rgb(30, 64, 175)',
            }]
        }
    });

    // Chart 2: Line
    new Chart(document.getElementById('chartTahun'), {
        type: 'line',
        data: {
            labels: [2018, 2019, 2020, 2021, 2022, 2023, 2024],
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: [1, 2, 5, 6, 7, 10, 20],
                borderColor: 'rgb(37, 99, 235)',
                fill: false
            }]
        }
    });

    // Chart 3: Pie
    new Chart(document.getElementById('chartPie'), {
        type: 'pie',
        data: {
            labels: ['Fisik', 'Sensorik', 'Mental', 'Ganda', 'Lainnya'],
            datasets: [{
                data: [10, 8, 5, 3, 2],
                backgroundColor: ['#f87171','#60a5fa','#34d399','#a78bfa','#facc15'],
            }]
        }
    });

    // Chart 4: Stacked Bar
    new Chart(document.getElementById('chartStacked'), {
        type: 'bar',
        data: {
            labels: [2018, 2019, 2020, 2021, 2022, 2023, 2024],
            datasets: [
                { label: 'Fisik', data: [1,1,2,2,3,5,10], backgroundColor: '#f87171' },
                { label: 'Sensorik', data: [0,1,1,2,2,3,5], backgroundColor: '#60a5fa' },
                { label: 'Mental', data: [0,0,1,1,2,2,3], backgroundColor: '#34d399' },
                { label: 'Ganda', data: [0,0,0,1,1,2,2], backgroundColor: '#a78bfa' },
                { label: 'Lainnya', data: [0,0,0,0,1,1,1], backgroundColor: '#facc15' }
            ]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'top' } },
            scales: { x: { stacked: true }, y: { stacked: true } }
        }
    });
</script>
</html>
