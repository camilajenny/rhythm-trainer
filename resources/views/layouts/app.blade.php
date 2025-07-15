<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Rhythm Trainer')</title>
    @stack('styles') {{-- for optional extra styles in children --}}
</head>
<body>
<div class="container">
    @yield('content')
</div>

@stack('scripts') {{-- for optional scripts in children --}}
</body>
</html>
