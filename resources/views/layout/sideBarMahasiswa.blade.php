<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard | Mahasiswa Disabilitas')</title>
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
                    <div class="w-10 h-10 bg-[#083D62] text-white flex items-center justify-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A9 9 0 1118.364 4.56M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[#083D62] font-semibold">{{ Auth::user()->name }}</p>
                        <p class="text-gray-500 text-sm">{{ Auth::user()->role ?? 'User' }}</p>
                    </div>
                </div>
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
        
        <!-- Navigation -->
        <nav class="space-y-4">
            <a href="{{ route('dashboard') }}">
                <div class="group flex items-center space-x-3 bg-white text-[#757575] 
                            px-6 py-2 rounded-xl cursor-pointer h-15 mx-4 mt-4
                            hover:bg-[#517289] hover:text-white transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </div>
            </a>
            <a href="{{ route('mahasiswa.index') }}">
                <div class="flex items-center space-x-3 bg-[#083D62] text-white px-6 py-1 rounded-xl cursor-pointer h-15 mx-4 my-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <ellipse cx="12" cy="5" rx="9" ry="3"/>
                    <path d="M3 5v14c0 1.66 4.03 3 9 3s9-1.34 9-3V5"/>
                    <path d="M3 12c0 1.66 4.03 3 9 3s9-1.34 9-3"/>
            </svg>
                    <span class="font-medium">Data Mahasiswa</span>
                </div>
            </a>
            <a href="{{ route('alumni.index') }}">
                <div class="group flex items-center space-x-3 bg-white text-[#757575] 
                            px-6 py-1 rounded-xl cursor-pointer h-15 mx-4 my-2
                            hover:bg-[#517289] hover:text-white transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M22 10l-10-5L2 10l10 5 10-5z" 
                            class="stroke-[#757575] group-hover:stroke-white"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5" 
                            class="stroke-[#757575] group-hover:stroke-white"/>
                    </svg>
                    <span class="font-medium">Data Alumni</span>
                </div>
            </a>
            <a href="{{ route('ujian.index') }}">
                <div class="group flex items-center space-x-3 bg-white text-[#757575] 
                            px-6 py-1 rounded-xl cursor-pointer h-15 mx-4 my-2
                            hover:bg-[#517289] hover:text-white transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="9" rx="1"/>
                        <rect x="14" y="3" width="7" height="5" rx="1"/>
                        <rect x="14" y="12" width="7" height="9" rx="1"/>
                        <rect x="3" y="16" width="7" height="5" rx="1"/>
                    </svg>
                    <span class="font-medium">Asesmen Ujian</span>
                </div>
            </a>
            <a href="{{ route('tendik.index') }}">
                <div class="group flex items-center space-x-3 bg-white text-[#757575] 
                            px-6 py-1 rounded-xl cursor-pointer h-15 mx-4 my-2
                            hover:bg-[#517289] hover:text-white transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M22 10l-10-5L2 10l10 5 10-5z" 
                            class="stroke-[#757575] group-hover:stroke-white"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5" 
                            class="stroke-[#757575] group-hover:stroke-white"/>
                    </svg>
                    <span class="font-medium">Data Dosen/Tendik</span>
                </div>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    @yield('content')
</body>
</html>
