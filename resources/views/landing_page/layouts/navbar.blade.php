<div id="navbar">
    <nav class="navbar py-2 fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand " href="{{ route('beranda') }}">
                <img src="{{ asset('img/desa.png') }}" width="150" alt="Logo Website Desa Palasari">
            </a>
            <button class="btn__nav navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav nav__list ms-auto">
                    <li class="nav-item nav-item-costume {{ request()->routeIs('beranda') ? 'active' : '' }}">
                        <a class="nav-link pageLink" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item nav-item-costume {{ request()->routeIs('informasi.berita.index') ? 'active' : '' }}">
                        <a class="nav-link pageLink" href="{{ route('informasi.berita.index') }}">Berita</a>
                    </li>
                    <li class="nav-item nav-item-costume {{ request()->routeIs('informasi.apb.index') ? 'active' : '' }}">
                        <a class="nav-link pageLink" href="{{ route('informasi.apb.index') }}">APBDes</a>
                    </li>
                    <li class="nav-item nav-item-costume {{ request()->routeIs('pemerintah.organisasi.index') ? 'active' : '' }}">
                        <a class="nav-link pageLink" href="{{ route('pemerintah.organisasi.index') }}">Pemerintahaan</a>
                    </li>
                    <li class="nav-item  layout__btnLogin--Desktop">
                        @auth
                        <a class="nav-link login-item py-2 rounded" href="/dashboard">Dashboard</a>

                        @else
                        <a class="nav-link login-item py-2 rounded" href="/dashboard">Login</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>