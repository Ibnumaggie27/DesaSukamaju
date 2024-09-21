@extends('templates/dashboard')
@section('min-height', '100vh')
@section('content')
<div class="surat">
    <div class="row">
        <div class="col-12 p-2 my-4 themeColor rounded-3 pilihSurat" style="border: 1px solid;">
            <div class="container-fluid text-center">
                <h1 class="font-semibold p-2"><b>Pilih Jenis Surat</b></h1>
                <p class="">Pembuatan Surat Paling Lambat Akan di Proses 5x24 jam</p>
            </div>
        </div>
    </div>

    <div class="kontenSurat row d-flex justify-center m-auto">

        <div class="pilihan-surat row">
            <!-- Item 1 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a class="text-decoration-none" href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_domisili_haji']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b> </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Domisili Haji</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a class="text-decoration-none" href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_domisili_yayasan']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b> </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Domisili Yayasan</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_penguburan']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>  </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Penguburan</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_numpang_nikah']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Numpang Nikah</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 5 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_duda_janda']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Duda atau Janda</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_tentang_perkawinan']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Perkawinan</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 7 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_belum_nikah']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Belum Nikah</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 8 -->
            <!--<div class="layout__surat col-md-4">-->
            <!--    <div class="isiSurat1">-->
            <!--        <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_pindah_WNI']) }}">-->
            <!--            <div class="card card_color  card-demografi-penduduk shadow py-2">-->
            <!--                <div class="card-body text-center bg-white">-->
            <!--                    <div class="">-->
            <!--                        <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>-->
            <!--                    </div>-->
            <!--                    <div class="ImgSurat">-->
            <!--                        <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">-->
            <!--                    </div>-->
            <!--                    <p class="p-2 jenis-surat-nama fw-semibold">Pindah WNI</p>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--</div>-->

            <!-- Continue this structure for each item -->

            <!-- Item 9 -->
            <!--<div class="layout__surat col-md-4">-->
            <!--    <div class="isiSurat1">-->
            <!--        <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_pindah']) }}">-->
            <!--            <div class="card card_color  card-demografi-penduduk shadow py-2">-->
            <!--                <div class="card-body text-center bg-white">-->
            <!--                    <div class="">-->
            <!--                        <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>-->
            <!--                    </div>-->
            <!--                    <div class="ImgSurat">-->
            <!--                        <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">-->
            <!--                    </div>-->
            <!--                    <p class="p-2 jenis-surat-nama fw-semibold">Pindah</p>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--</div>-->

            <!-- Item 10 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_tidak_mampu']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold"> Tidak Mampu</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 11 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_usaha']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Usaha</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 12 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_domisili']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Domisili</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 13 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_beda_nama_data']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Beda Nama/Data</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 14 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_kehilangan']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Kehilangan</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 15 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_orang_tua_wali']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Orang tua Wali</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 16 -->
            <!--<div class="layout__surat col-md-4">-->
            <!--    <div class="isiSurat1">-->
            <!--        <a href="{{ route('pengajuan-surat.create',['surat' => 'pengantar_pembuatan_kartu_keluarga']) }}">-->
            <!--            <div class="card card_color  card-demografi-penduduk shadow py-2">-->
            <!--                <div class="card-body text-center bg-white">-->
            <!--                    <div class="">-->
            <!--                        <p class=""><b class="jenis-surat fw-semibold">Surat Pengantar</b>  </p>-->
            <!--                    </div>-->
            <!--                    <div class="ImgSurat">-->
            <!--                        <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">-->
            <!--                    </div>-->
            <!--                    <p class="p-2 jenis-surat-nama fw-semibold">Pembuatan Kartu Keluarga</p>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--</div>-->

            <!-- Continue this structure for each item -->

            <!-- Item 17 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'pengantar_keterangan_catatan_kepolisian']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Pengantar</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">SKCK</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 18 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'surat_pernyataan_akad_nikah']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Pernyataan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Akad Nikah</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 19 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'surat_pernyataan_ahli_waris']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Pernyataan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Ahli Waris</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 20 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'kelahiran']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Kelahiran</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 21 -->
            <div class="layout__surat col-md-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'kematian']) }}">
                        <div class="card card_color  card-demografi-penduduk shadow py-2">
                            <div class="card-body text-center bg-white">
                                <div class="">
                                    <p class=""><b class="jenis-surat fw-semibold">Surat Keterangan</b>   </p>
                                </div>
                                <div class="ImgSurat">
                                    <img src="{{ asset('/img/letter.png') }}" style="max-width: 100px;" alt="">
                                </div>
                                <p class="p-2 jenis-surat-nama fw-semibold">Kematian</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

        </div>
    </div>


    @endsection