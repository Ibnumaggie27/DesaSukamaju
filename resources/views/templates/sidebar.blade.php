<div class="sidebar hidden z-30 fixed inset-y-0">
    <div class="flex flex-col w-72 bg-dark overflow-hidden shadow-md h-full">
        <div class="flex items-center py-3 px-5 shadow-sm shadow-secondary">
            <span class="text-2xl text-gray top-5 left-4 cursor-pointer flex items-center" onclick="openSidebar()">
                <i class="bx bx-x mr-3"></i> <img src="{{ asset('img/desaa.png') }}" width="150" alt="Logo!">
            </span>
        </div>
        <ul class="flex flex-col px-2 py-4 [&>li>a]:text-gray [&>li>a]:flex [&>li>a]:flex-row [&>li>a]:items-center [&>li>a]:h-12">
            <li>
                <a href="/dashboard" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-home {{ Request::is('/dashboard') ? 'text-primary' : '' }}"></i></span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pengajuan-surat.index') }}" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-envelope {{ Request::is('pengajuan-surat') ? 'text-primary' : '' }}"></i></span>
                    <span class="text-sm font-medium">Pengajuan Surat</span>
                </a>
            </li>

            <li>
                <a href="/pengaduan" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-notepad {{ Request::is('pengaduan*') && !Request::is('pengaduan/create') && !Request::is('pengaduan/selesai') && !Request::is('pengaduan/proses') && !Request::is('pengaduan/belum') ? 'text-primary' : '' }}"></i></span>
                    <span class="text-sm font-medium">Pengaduan Masyarakat</span>
                </a>
            </li>

            @canany(['petugas', 'admin'])
{{-- 
<li>
    <a href="/tanggapan" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
        <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-comment-dots {{ Request::is('tanggapan*') && !Request::is('tanggapan/proses') && !Request::is('tanggapan/selesai') ? 'text-primary' : '' }}"></i></span>
        <span class="text-sm font-medium">Semua Tanggapan</span>
    </a>
</li>
--}}

            @endcanany
            @canany('kesra')
            <li>
                <a href="/pengelolaan-data/masyarakat" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-group {{ Request::is('pengguna/masyarakat*') ? 'text-primary' : '' }}"></i></span>
                    <span class="text-sm font-medium">Pengelolaan Data Masyarakat</span>
                </a>
            </li>
            @endcanany
            @can('admin')
            <li class="relative" x-data="{ open: false }">
                <button class="transform hover:translate-x-2 transition-transform ease-in duration-200 flex items-center w-full text-sm font-medium text-left rounded-t-lg focus:outline-none" @click="open = !open">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="text-white bx bx-user-check"></i></span>
                    <span class="text-white font-medium">Pengguna</span>
                    <i class="text-white bx bx-chevron-down ml-auto p-3"></i>
                </button>
                <ul x-show="open" x-transition:enter="transition-all duration-300 ease-in-out" x-transition:enter-start="opacity-0 transform scale-y-0" x-transition:enter-end="opacity-100 transform scale-y-100" x-transition:leave="transition-all duration-300 ease-in-out" x-transition:leave-start="opacity-100 transform scale-y-100" x-transition:leave-end="opacity-0 transform scale-y-0" class="px-4 space-y-2 bg-grey rounded-b-lg shadow-md ">
                    <li>
                        <a href="/pengguna/petugas" class="text-decoration-none transform hover:translate-x-2 transition-transform ease-in duration-200 {{ Request::is('pengguna/petugas*') ? 'text-primary' : '' }}">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="text-white bx bx-comment-dots {{ Request::is('tanggapan*') && !Request::is('tanggapan/proses') && !Request::is('tanggapan/selesai') ? 'text-primary' : '' }}"></i></span>
                            <span class="text-white text-sm font-medium"> Data Petugas</span>
                        </a>

                    </li>
                    <li>
                        <a href="/pengguna" class="text-decoration-none transform hover:translate-x-2 transition-transform ease-in duration-200 {{ Request::is('pengguna/petugas*') ? 'text-primary' : '' }}">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="text-white bx bx-comment-dots {{ Request::is('tanggapan*') && !Request::is('tanggapan/proses') && !Request::is('tanggapan/selesai') ? 'text-primary' : '' }}"></i></span>
                            <span class="text-white text-sm font-medium fs-8"> Data Masyarakat</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('petugas')
            <li>
                <a href="{{ route('cms.index') }}" class="transform hover:translate-x-2 transition-transform ease-in duration-200">
                    <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-edit {{ Request::is('cms') ? 'text-primary' : '' }}"></i></span>
                    <span class="text-sm font-medium">Setting Landing Page</span>
                </a>
            </li>
            @endcan
            <li class="transform hover:translate-x-2 hover:cursor-pointer transition-transform ease-in duration-200 text-white">
                <form action="/keluar" method="post">
                    @csrf
                    <button type="submit">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-log-out"></i></span>
                        <span class="text-sm font-medium ">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>