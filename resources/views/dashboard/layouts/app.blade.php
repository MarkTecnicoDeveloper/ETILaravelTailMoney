<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased min-h-screen bg-slate-400">
        <div class="w-full h-[120px]">
            @include('dashboard.layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow h-[40px]">
                <div class="max-w-7xl mx-auto py-2 px-2 sm:px-4 lg:px-6">
                    {{ $header }}
                </div>
            </header>
        </div>
        <div style="min-height: calc(100vh - 120px);" class="w-full flex flex-row">
            <aside class="w-1/5 bg-slate-800 px-4 py-4 text-white">
                lateral
            </aside>
            <main class="w-4/5">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
