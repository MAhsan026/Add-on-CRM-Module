<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Include your compiled CSS using Vite --}}
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    {{-- Yield section for additional CSS --}}
    @yield('css')

</head>

<body class="bg-#f2f2f2 text-gray-900 tracking-wider leading-normal">
    @include('Layout.navbar')
</body>

</html>