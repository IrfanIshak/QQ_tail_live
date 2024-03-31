<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{ asset('uploads/q_icon.png') }}" type="image/png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            {{-- <livewire:layout.navigation /> --}}
            <!-- Page Content -->
            <main>
                <div class="h-screen relative">
                    <div class="absolute inset-0 bg-orange-500" style="height: 50%;"></div>
                    <div class="absolute inset-0 bg-gray-200 top-1/2" style="height: 50%;"></div>
                    {{-- @livewire('company.add') --}}
                    @yield('content')
                </div>
            </main>
        </div>
        @stack('scripts')
    </body>
</html>
