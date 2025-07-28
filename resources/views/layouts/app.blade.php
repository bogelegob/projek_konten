<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">
            <aside class="w-64 bg-white shadow-md">
                <div class="py-4 px-6 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
                </div>
                <nav class="mt-6">
                    <a href="{{ route('dashboard') }}" class="flex items-center py-2 px-6 text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m0 0l7-7 7 7M19 10v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>
                    {{-- Tambahkan menu Manajemen Post di sini --}}
                    <a href="{{ route('posts.index') }}" class="flex items-center py-2 px-6 text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        Manajemen Post
                    </a>
                    {{-- <a href="#" class="flex items-center py-2 px-6 text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h-5m-5 0h10m-5 0v-5a2 2 0 012-2h2a2 2 0 012 2v5m-8-12V7a2 2 0 012-2h2a2 2 0 012 2v3m-4 0v4m-4-4H7m0 0l-4 4m4-4l4 4"></path></svg>
                        Pengguna
                    </a> --}}
                    {{-- Tambahkan menu Laporan di sini --}}
                    <a href="{{ route('reports.index') }}" class="flex items-center py-2 px-6 text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                        <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 2v-6m2 9H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Laporan PDF
                    </a>
                    </nav>
            </aside>
            <div class="flex-1 flex flex-col">
                <nav class="bg-white border-b border-gray-100">
                    @include('layouts.navigation')
                </nav>

                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <main class="flex-1 p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>