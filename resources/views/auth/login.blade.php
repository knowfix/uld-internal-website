<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Mahasiswa Disabilitas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen flex items-center justify-center bg-cover bg-center" 
      style="background-image: url('{{ asset('images/Dashboard.jpg') }}')">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-6">
                <img src="{{ asset('images/logoBaru.png') }}" alt="Logo" class="mx-auto h-16">
            </div>
            <h2 class="text-2xl font-bold text-center text-[#083D62] mb-6">Login</h2>
            {{-- Pesan error login --}}
            @if ($errors->any())
                <div class="mb-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2">
                        {{ $errors->first() }}
                    </div>
                </div>
            @endif

            <div class="mb-4">
                <input id="email" type="email" name="email"
                    class="w-full px-4 py-2 border rounded-lg"
                    placeholder="username@mail.ugm.ac.id" required autofocus>
            </div>

            <div class="mb-4">
                <input id="password" type="password" name="password"
                    class="w-full px-4 py-2 border rounded-lg"
                    placeholder="Password" required>
            </div>

            <button type="submit" class="w-full bg-[#083D62] text-white py-2 rounded-lg">
                Login
            </button>
        </form>
    </div>
</body>

</html>
