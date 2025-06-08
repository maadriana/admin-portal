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

    {{-- Jqeury and data tables CDN para sa users list --}}
    <script src="{{ asset('assets') }}/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap5.min.css" />
</head>

<body>

    {{-- Optional: Sidebar/Menu/Topbar (can go here) --}}
    <div class="layout-wrapper">
        <div class="layout-container">
            @yield('content')
        </div>
    </div>

    @include('layouts.footer')


    <div class="content-backdrop fade"></div>

    <script src="{{ asset('assets') }}/js/datatable.js"></script>
    @yield('scripts')

    {{-- Bootstrap JS --}}
    {{-- Vite JS --}}
    @vite('resources/js/app.js')
</body>

</html>