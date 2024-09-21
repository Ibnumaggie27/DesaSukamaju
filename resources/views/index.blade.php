@extends('templates/dashboard')
@section('content')
<div class="layoutWelcome bg-white p-4 mb-5 rounded-lg flex justify-between items-center">
    <div class="">
        <h1 class="text-lg lg:text-2xl md:text-2xl  font-bold mb-3 headDash">Selamat datang,
            <span class="capitalize"><b class="text-black">{{ auth()->user()->nama }}!</b></span>
        </h1>

        @canany(['petugas', 'admin', 'kesra'])
        <p class="text-xs lg:text-base font-normal text-secondary">Aplikasi Surat dan pengaduan masyarakat via website pada Desa Palasari Cipanas!</p>
        @endcanany

        @can('masyarakat')
        <p class="text-xs lg:text-base font-normal text-secondary">Buat proses pengaduan jadi lebih mudah dengan aplikasi!</p>
        @endcan
    </div>
</div>
<div class="layoutBaganWelcome themeColor p-4 rounded-lg ">
    <ol class="items-center px-1 flex rounded-md">
        <li class="relative flex-grow">
            <div class="flex items-center">
                <div class="flex z-10 justify-center items-center w-8 h-8 rounded-full themeColor bg-light shrink-0">
                    <i class="bx bxs-edit text-black"></i>
                </div>
            </div>
            @can('masyarakat')
            <div class="mt-3 sm:pr-8">
                <h3 class="textDashboard text-lg font-semibold text-dark">Tulis Laporan</h3>
                <p class="textDashboardBottom text-base font-normal text-secondary">Tuliskan laporan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
            </div>
            @endcan
            @canany(['petugas', 'admin', 'kesra'])
            <div class="mt-3 sm:pr-8">
                <h3 class="textDashboard text-lg font-semibold text-dark">Total Laporan</h3>
                <p class="textDashboardBottom text-base font-normal text-secondary">Total seluruh laporan yang masuk :</p>
                <p class="text-2xl font-bold text-black">{{ $total_laporan }}</p>
            </div>
            @endcanany
        </li>
        <i class="bx bxs-chevron-right-circle  text-xl hidden lg:inline-block lg:mr-16"></i>
        <li class="relative px-1 flex-grow ">
            <div class="flex items-center">
                <div class="flex z-10 justify-center items-center w-8 h-8 rounded-full bg-white shrink-0">
                    <i class="bx bx-check-double text-black"></i>
                </div>
            </div>
            @can('masyarakat')
            <div class="mt-3 sm:pr-8">
                <h3 class="textDashboard text-lg font-semibold text-dark">Proses Verifikasi</h3>
                <p class="textDashboardBottom text-base font-normal text-secondary">Laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang</p>
            </div>
            @endcan
            @canany(['petugas', 'admin', 'kesra'])
            <div class="mt-3 sm:pr-8">
                <h3 class="textDashboard text-lg font-semibold text-dark">Laporan Selesai</h3>
                <p class="textDashboardBottom text-base font-normal text-secondary">Total laporan yang selesai diproses :</p>
                <p class="text-2xl font-bold text-black">{{ $laporan_selesai }}</p>
            </div>
            @endcanany
        </li>
        <i class="bx bxs-chevron-right-circle text-black text-xl hidden lg:inline-block lg:mr-16"></i>
        <li class="relative flex-grow">
            <div class="flex items-center">
                <div class="flex z-10 justify-center items-center w-8 h-8 rounded-full bg-white shrink-0">
                    <i class="bx bx-task text-black"></i>
                </div>
            </div>
            @can('masyarakat')
            <div class="mt-3 sm:pr-8">
                <h3 class="textDashboard text-lg font-semibold text-dark">Tindakan</h3>
                <p class="textDashboardBottom text-base font-normal text-secondary">Petugas akan menanggapi laporan yang Anda berikan</p>
            </div>
            @endcan
            @canany(['petugas', 'admin', 'kesra'])
            <div class="mt-3 sm:pr-8">
                <h3 class="textDashboard text-lg font-semibold text-dark">Total Tanggapan</h3>
                <p class="textDashboardBottom text-base font-normal text-secondary">Total tanggapan yang diberikan :</p>
                <p class="text-2xl font-bold text-black">{{ $total_tanggapan }}</p>
            </div>
            @endcanany
        </li>
        <i class="bx bxs-chevron-right-circle text-black text-xl hidden lg:inline-block"></i>
    </ol>
</div>
@endsection