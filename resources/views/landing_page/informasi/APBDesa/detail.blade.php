@extends('landing_page.layouts.app')

@section('title')
    {{ $apb->judul }} Tahun {{ $apb->tahun }}
@endsection
@section('content')
    <div id="breadcrumb" class="container my-4 my-md-4 my-lg-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('informasi.apb.index') }}">APBDesa</a></li>
                <li class="breadcrumb-item">{{ $apb->judul }} - Tahun {{ $apb->tahun }}</li>
            </ol>
        </nav>
    </div>

    <div id="details-news" class="container">
        <h1> {{ $apb->judul }} - Tahun {{ $apb->tahun }}</h1>
        <p id="info-news" class="my-4"><i class="fa-solid fa-calendar-days me-1"></i>
            {{ \Carbon\Carbon::parse($apb->created_at)->isoFormat('MMMM D , Y') }}
        </p>

        @if ($apb->gambar)
            <img id="thumbnail" src="{{ asset($apb->gambar) }}">
        @endif

        <div id="content-desc" class="my-5 lh-lg" align="justify">
            <div class="card mb-5">
                <div class="card-header">
                    <p>1. Pendapatan Desa</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered " style="font-size: 13px">
                            <thead class="bg-primary-2">
                                <tr class="text-white">
                                    <th scope="col" width="65%"></th>
                                    <th scope="col">Rencana / Anggaran</th>
                                    <th scope="col">Realisasi</th>
                                    <th scope="col">Lebih / Kurang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="4">PENDAPATAN ASLI DESA</th>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>Hasil Usaha</th>
                                    <td>Rp. {{ number_format(json_decode($apb->hasil_usaha)->rencana) }}</td>
                                    <td>Rp. {{ number_format(json_decode($apb->hasil_usaha)->realisasi) }}</td>
                                    <td>Rp. {{ number_format(json_decode($apb->hasil_usaha)->lebih) }}</td>
                                </tr>
                                <tr class="text-secondary">
                                    <th>Hasil Aset</th>
                                    <td>Rp. {{ number_format(json_decode($apb->hasil_aset)->rencana) }}</td>
                                    <td>Rp. {{ number_format(json_decode($apb->hasil_aset)->realisasi) }}</td>
                                    <td>Rp. {{ number_format(json_decode($apb->hasil_aset)->lebih) }}</td>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>Swadaya, Partisipasi, Gotong Royong</th>
                                    <td>Rp. {{ number_format(json_decode($apb->hasil_lain)->rencana) }}</td>
                                    <td>Rp. {{ number_format(json_decode($apb->hasil_lain)->realisasi) }}</td>
                                    <td>Rp. {{ number_format(json_decode($apb->hasil_lain)->lebih) }}</td>
                                </tr>
                                <tr>
                                    <th colspan="4">PENDAPATAN TRANSFER</th>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>Dana Desa</th>
                                    <td>Rp. {{ number_format(json_decode($apb->dana_desa)->rencana) }}</td>
                                    <td>Rp. {{ number_format(json_decode($apb->dana_desa)->realisasi) }}</td>
                                    <td>Rp. {{ number_format(json_decode($apb->dana_desa)->lebih) }}</td>
                                </tr>
                                <tr class="text-secondary">
                                    <th>Bagi Hasil Pajak & Retribusi</th>
                                    <td>Rp. {{ number_format(json_decode($apb->bagi_hasil_pajak)->rencana) }}</td>
                                    <td>Rp. {{ number_format(json_decode($apb->bagi_hasil_pajak)->realisasi) }}</td>
                                    <td>Rp. {{ number_format(json_decode($apb->bagi_hasil_pajak)->lebih) }}</td>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>Alokasi Dana Desa</th>
                                    <td>Rp. {{ number_format(json_decode($apb->alokasi_dana_desa)->rencana) }}</td>
                                    <td>Rp. {{ number_format(json_decode($apb->alokasi_dana_desa)->realisasi) }}</td>
                                    <td>Rp. {{ number_format(json_decode($apb->alokasi_dana_desa)->lebih) }}</td>
                                </tr>
                                <tr class="text-secondary">
                                    <th>Bantuan Keuangan Kabupaten</th>
                                    <td>Rp. {{ number_format(json_decode($apb->bantuan_keuangan_kabupaten)->rencana) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->bantuan_keuangan_kabupaten)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->bantuan_keuangan_kabupaten)->lebih) }}</td>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>Bantuan Keuangan Provinsi</th>
                                    <td>Rp. {{ number_format(json_decode($apb->bantuan_keuangan_provinsi)->rencana) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->bantuan_keuangan_provinsi)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->bantuan_keuangan_provinsi)->lebih) }}</td>
                                </tr>
                                <tr>
                                    <th colspan="4">PENDAPATAN LAIN-LAIN</th>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>Hibah</th>
                                    <td>Rp. {{ number_format(json_decode($apb->hibah)->rencana) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->hibah)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->hibah)->lebih) }}</td>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>Sumbangan Pihak ketiga</th>
                                    <td>Rp. {{ number_format(json_decode($apb->sumbangan_pihak_ketiga)->rencana) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->sumbangan_pihak_ketiga)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->sumbangan_pihak_ketiga)->lebih) }}</td>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>Pendapatan Lain-lain</th>
                                    <td>Rp. {{ number_format(json_decode($apb->pendapatan_lain)->rencana) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->pendapatan_lain)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->pendapatan_lain)->lebih) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header">
                    <p>2. Belanja Desa</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered " style="font-size: 13px">
                            <thead class="bg-primary-2">
                                <tr class="text-white">
                                    <th scope="col" width="65%"></th>
                                    <th scope="col">Rencana / Anggaran</th>
                                    <th scope="col">Realisasi</th>
                                    <th scope="col">Lebih / Kurang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-secondary bg-light">
                                    <th>PENYELENGGARAAN PEMERINTAHAN DESA</th>
                                    <td>Rp.
                                        {{ number_format(json_decode($apb->penyelenggaraan_pemerintahan_desa)->rencana) }}
                                    </td>
                                    <td>Rp.
                                        {{ number_format(json_decode($apb->penyelenggaraan_pemerintahan_desa)->realisasi) }}
                                    </td>
                                    <td>Rp.
                                        {{ number_format(json_decode($apb->penyelenggaraan_pemerintahan_desa)->lebih) }}
                                    </td>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>PELAKSANAAN PEMBANGUNAN DESA</th>
                                    <td>Rp. {{ number_format(json_decode($apb->pelaksanaan_pembangunan_desa)->rencana) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->pelaksanaan_pembangunan_desa)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->pelaksanaan_pembangunan_desa)->lebih) }}
                                    </td>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>PEMBINAAN KEMASYARAKATAN DESA</th>
                                    <td>Rp. {{ number_format(json_decode($apb->pembinaan_kemasyarakatan_desa)->rencana) }}
                                    </td>
                                    <td>Rp.
                                        {{ number_format(json_decode($apb->pembinaan_kemasyarakatan_desa)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->pembinaan_kemasyarakatan_desa)->lebih) }}
                                    </td>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>PEMBERDAYAAN MASYARAKAT DESA</th>
                                    <td>Rp. {{ number_format(json_decode($apb->pemberdayaan_masyarakat_desa)->rencana) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->pemberdayaan_masyarakat_desa)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->pemberdayaan_masyarakat_desa)->lebih) }}
                                    </td>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>BELANJA TAK TERDUGA</th>
                                    <td>Rp. {{ number_format(json_decode($apb->belanja_tidak_terduga)->rencana) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->belanja_tidak_terduga)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->belanja_tidak_terduga)->lebih) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header">
                    <p>3. Pembiayaan Desa</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered " style="font-size: 13px">
                            <thead class="bg-primary-2">
                                <tr class="text-white">
                                    <th scope="col" width="65%"></th>
                                    <th scope="col">Rencana / Anggaran</th>
                                    <th scope="col">Realisasi</th>
                                    <th scope="col">Lebih / Kurang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="4">PENDAPATAN ASLI DESA</th>
                                </tr>

                                <tr class="text-secondary bg-light">
                                    <th>SiLPA</th>
                                    <td>Rp. {{ number_format(json_decode($apb->silpa)->rencana) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->silpa)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->silpa)->lebih) }}</td>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>Pencairan Dana Cadangan</th>
                                    <td>Rp. {{ number_format(json_decode($apb->pencairan_dana_cadangan)->rencana) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->pencairan_dana_cadangan)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->pencairan_dana_cadangan)->lebih) }}</td>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>Hasil penjualan kekayaan Desa yang dipisahkan</th>
                                    <td>Rp. {{ number_format(json_decode($apb->hasil_penjualan_kekayaan_desa)->rencana) }}
                                    </td>
                                    <td>Rp.
                                        {{ number_format(json_decode($apb->hasil_penjualan_kekayaan_desa)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->hasil_penjualan_kekayaan_desa)->lebih) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="4">PENGELUARAN PEMBIAYAAN</th>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>Pembentukan Dana Cadangan</th>
                                    <td>Rp. {{ number_format(json_decode($apb->pembentukan_dana_cadangan)->rencana) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->pembentukan_dana_cadangan)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->pembentukan_dana_cadangan)->lebih) }}</td>
                                </tr>
                                <tr class="text-secondary bg-light">
                                    <th>Penyertaan Modal Desa</th>
                                    <td>Rp. {{ number_format(json_decode($apb->penyertaan_modal_desa)->rencana) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->penyertaan_modal_desa)->realisasi) }}
                                    </td>
                                    <td>Rp. {{ number_format(json_decode($apb->penyertaan_modal_desa)->lebih) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-style')
    <style>
        /* add custom padding 3px for th and td  */
        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td,
        .table-bordered>tfoot>tr>td {
            padding-top: 3px;
            padding-bottom: 3px;
        }

        #thumbnail {
            height: 500px;
        }
    </style>
@endpush
