<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('img/icon.png') }}" rel="shortcut" type="image/png">

    <link rel="stylesheet" href="{{ asset('css/landing-page/index.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Optional: Add Bootstrap Icons for icon support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">

    <title>@yield('title', 'Desa Palasari') | Website Resmi desa Palasari</title>

</head>
<style>
    body {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
    }
</style>

<body class="bg-gray">
    @include('templates/alerts')

    <div class="w-full flex flex-row">
        {{-- Sidebar --}}
        @include('templates/sidebar')

        {{-- Navbar --}}
        <nav class="top-0 w-full fixed inset-x-0 flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg shadow-sm z-3" style="background-image: linear-gradient(to bottom, #4facfe 0%, #00f2fe 100%);">
            <div class="w-full flex justify-between items-center px-3">
                <span class="text-2xl text-black top-5 cursor-pointer flex items-center">
                    <i class="bx bx-menu mr-2" onclick="openSidebar()"></i>
                    <a href="{{ route('beranda') }}"><img src="{{ asset('img/desa.png') }}" width="150" alt="Logo!"></a>
                </span>
                <span class="text-black bg-light top-5 items-center rounded-5" style="padding: .50rem; border: 1px solid; display: inline-block; overflow: hidden;">
                    <span class="mx-3 font-medium lg:text-base text-sm capitalize" style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 120px;">

                        <!-- Display full name on larger screens -->
                        <span id="usernameLargeScreen" class="lg:inline">{{ auth()->user()->nama }}</span>

                        <!-- Display abbreviated name on smaller screens -->
                        <span id="usernameSmallScreen" class="lg:hidden text-xs">{{ substr(auth()->user()->nama, 0, 12) . '...' }}</span>

                        <!-- Display abbreviated name on more smaller screens -->
                        <span id="usernameMoreSmallScreen" class="lg:hidden text-xs">{{ substr(auth()->user()->nama, 0, 6) . '..' }}</span>
                    </span>
                    <img class=" inline-block h-6 w-6 lg:h-8 lg:w-8 rounded-full themeColor" src="{{ asset('img/user.png') }}" alt="{{ auth()->user()->nama }}">
                </span>

            </div>
        </nav>

        <div class="Dashboard__content--layoutMobile container w-full mx-auto mt-24 px-10 lg:px-4" style="margin-bottom: 2%;">
            @yield('content')
        </div>
    </div>

    @include('templates/modal')
    <div id="overlay" class="fixed hidden z-40 w-screen h-screen inset-0 bg-secondary bg-opacity-40"></div>

    <script src="{{ asset('/js/costum.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/tabel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JavaScript CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>