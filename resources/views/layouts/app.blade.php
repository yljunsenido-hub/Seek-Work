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
        
        {{-- 1. Main Wrapper with Flex --}}
        <div class="min-h-screen bg-gray-100 flex">

            {{-- 2. Sidebar (Fixed width) --}}
            <x-sidebar />

            {{-- 3. Content Area (Grows to fill remaining space) --}}
            {{-- We add ml-64 to prevent the content from going UNDER the fixed sidebar --}}
            <div class="flex-1 ml-64 flex flex-col">
                
                {{-- Top Navigation (For Profile/Logout) --}}
                @include('layouts.navigation')

                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <main class="p-6">
                    {{ $slot }}
                </main>
                
            </div>
        </div>
    </body>
</html>