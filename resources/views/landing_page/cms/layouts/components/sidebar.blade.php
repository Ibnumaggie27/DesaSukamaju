<!-- Sidebar -->
<div class="sidebar hidden z-30 fixed inset-y-0 bg-black">
    <div class="flex flex-col w-72 bg-dark overflow-hidden shadow-md h-full">
        <div class="flex items-center py-3 px-5 shadow-sm shadow-secondary">
            <span class="text-2xl text-gray top-5 left-4 cursor-pointer flex items-center" onclick="openSidebar()">
                <i class="bx bx-x mr-3"></i> <img src="{{ asset('img/desaa.png') }}" width="150" alt="Logo!">
            </span>
        </div>
        <ul class="flex flex-col px-2 py-4 [&>li>a]:text-gray [&>li>a]:flex [&>li>a]:flex-row [&>li>a]:items-center [&>li>a]:h-12">
            <li>
                <a href="/LandingPage" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-home {{ Request::is('/dashboard') ? 'text-primary' : '' }}"></i></span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('cms.pegawai.index') }}" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class=" bx bx-user {{ Request::is('/dashboard') ? 'text-primary' : '' }}"></i></span>
                    <span class="text-sm font-medium">Pegawai</span>
                </a>
            </li>
            <li>
                <a href="{{ route('cms.apb.index') }}" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-money-withdraw {{ Request::is('/dashboard') ? 'text-primary' : '' }}"></i></span>
                    <span class="text-sm font-medium">APBDes</span>
                </a>
            </li>
            <li>
                <a href="{{ route('cms.berita.index') }}" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-info-circle {{ Request::is('/dashboard') ? 'text-primary' : '' }}"></i></span>
                    <span class="text-sm font-medium">Berita & Pengumuman</span>
                </a>
            </li>
            <li>
                <a href="{{ '/dashboard ' }}" class="btn btn-secondary btn-block transition-transform ease-in duration-200 my-5">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="fas fa-arrow-left {{ Request::is('/dashboard') ? 'text-primary' : '' }}"></i></span>
                    <span class="text-sm font-medium">Kembali</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- End of Sidebar -->