<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>


    @include('partials.sidebar')

    <div class=" ml-64 pt-6 text-blue-950 font-semibold tabcontent" id="User">
        
        @yield('head')
        @yield('tambah')
        @yield('tabel')

    </div>

    @stack('script-alt')
</body>
</html>