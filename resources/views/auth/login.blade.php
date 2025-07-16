<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Admin</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="relative w-full h-screen flex items-center justify-center" style="background: url('R_imresizer.jpg') center/cover no-repeat;">
    <div class="absolute inset-0 bg-white bg-opacity-70"></div>
    <div class="relative z-10 w-full max-w-md mx-auto">
        <div class="bg-blue-900 bg-opacity-95 rounded-lg shadow-lg p-8">
            <h2 class="text-3xl font-bold text-white text-center mb-6">LOGIN ADMIN</h2>
            <form method="POST" action="{{ url('/xhqadmin765') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-white mb-2">Username</label>
                    <input type="text" name="username" class="w-full px-4 py-2 rounded bg-white text-gray-800" required autofocus>
                </div>
                <div class="mb-6">
                    <label class="block text-white mb-2">Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 rounded bg-white text-gray-800" required>
                </div>
                <button type="submit" class="w-full py-3 bg-green-500 text-white font-bold rounded hover:bg-green-600 text-lg">LOGIN</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
