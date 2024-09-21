@extends('landing_page.cms.layouts.app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="bg-white p-4 mb-5 rounded-lg flex">
            <div class="">
                <h1 class="text-lg lg:text-2xl font-bold mb-2 headDash">Selamat datang petugas,
                    <span class="capitalize"><b class="text-black">{{ auth()->user()->nama }}!</b></span>
                </h1>
                <p class="text-xs lg:text-base font-normal text-secondary">Halaman ini adalah tempat menambah data dari landing-page utama!</p>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@endsection