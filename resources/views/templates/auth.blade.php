<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/landing-page/index.css') }}">
    <link href="{{ asset('css/boxicons.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/png">
    <title>{{ $title }}</title>
</head>


<body class="bg-gray">
    @include('templates/alerts')
    <div class="flex flex-col items-center justify-center px-6 mx-auto min-h-screen py-6 shadow-lg" style="background-image: linear-gradient(to bottom, #4facfe 0%, #00f2fe 100%); ">
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0" style="box-shadow: 1px 2px 9px 2px rgb(0 0 0 / 52%), 0 1px 2px -1px rgb(0 0 0 / 0.1);">

            <a href="{{ route('beranda') }}" class="flex justify-center text-2xl font-semibold text-dark p-3">
                <img class="" src="{{ asset('img/desa.png') }}" width="160" alt="logo">
            </a>

            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
</body>

</html>