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
      
    </head>
    <body class="bg-black text-white">
      <div class="container px-6">
          <div class="mt-5 flex justify-end  items-center"> 
            <a href="{{ route('login') }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
              {{ __('Log in') }}
            </a>
            
          </div>
      
          <div class="flex justify-center items-center h-screen">
              <img src="uploads/q.png" alt="Logo" class="w-550">
          </div>
      </div>
    </body>
</html>
