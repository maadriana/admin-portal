<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>

    {{-- Sneat Fonts --}}
    <link href="/assets/fonts/boxicons.css" rel="stylesheet">

    {{-- Vite CSS --}}
    @vite('resources/css/app.scss')
</head>
<body>

    {{-- Optional: Sidebar/Menu/Topbar (can go here) --}}

    <div class="layout-wrapper">
        <div class="layout-container">
            @yield('content')
        </div>
    </div>

    {{-- Vite JS --}}
    @vite('resources/js/app.js')

</body>
</html>
