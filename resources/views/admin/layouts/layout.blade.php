<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="bg-gray-100">

    {{-- Header --}}
    @include('admin.layouts.navbar')

    {{-- Sidebar + Konten --}}
    <div x-data="{ open: true }" class="flex">
        {{-- Sidebar --}}
        @include('admin.layouts.sidebar')

        {{-- Spacer untuk shifting konten --}}
        <div class="w-48"></div>

        {{-- Main Konten --}}
        <div class="flex-1 px-6 py-6">
            @yield('content')
        </div>
    </div>
    @stack('scripts')
    {{-- Scripts can be added here --}}
</body>
</html>
