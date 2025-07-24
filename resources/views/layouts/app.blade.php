<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Rhythm Trainer')</title>

    @vite(['resources/js/app.js'])
    @stack('styles')
</head>
<body class="min-h-full flex flex-col bg-gray-100 font-sans antialiased">
<header class="bg-[#84A98C] text-white shadow-md">
    <div class="container mx-auto px-4 py-8 flex justify-center">
        <a href="{{ url('/') }}" class="text-3xl font-semibold tracking-wide">
            Rhythm Trainer
        </a>
    </div>
</header>

<main class="flex-1 container mx-auto px-4 py-10">
    @yield('content')
</main>

<footer class="bg-[#52796F] text-white py-6 mt-12">
    <div class="container mx-auto px-4 text-center text-sm opacity-90">
        &copy; {{ date('Y') }} Rhythm Trainer. All rights reserved.
    </div>
</footer>

@stack('scripts')
</body>
</html>
