@extends('landing_page.layouts.app')

@section('title')
Struktur Organisasi
@endsection


@section('content')
<section id="StrukturOrganisasi" class="p-5">
    <div class="container mb-3">
        <div class="HeaderArticle">
            <h4 class="">Struktur Organisasi Desa</h4>
        </div>
    </div>

    <section class="space-subHeader">
        <div class="row d-flex">
            <div class="card-imgStruktur col-8 m-auto">
                <div class="card rounded filter shadow-lg border">
                    <img src="{{ asset('img/landing-page/opt.jpg') }}" width="100%" alt="" class="rounded">
                </div>
            </div>
        </div>
    </section>
</section>


<section id="ProfilPegawai"  class="px-5 bg-light">
    <div class="container">
        <div class="text-center my-3 d-flex justify-content-center">
            <div class="HeaderArticle-mengenaiDesa">
                <h4 class="shadow mb-5">Siapa Saja Perangkat Desa Palasari?</h4>
            </div>
        </div>
    </div>

    <section class="space-subHeader container">
        <div class="owl-carousel owl-carousel owl-theme owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transition: all 0.25s ease 0s; width: 16665px; transform: translate3d(-9999px, 0px, 0px);">
                    @isset($strukturs)
                    @foreach ($strukturs as $item)
                    <div class="owl-item">
                        <!-- Your first carousel item -->
                        <div class="col-12 d-flex justify-content-center align-items-center m-auto">
                            <div class="card card-profil-desa filter shadow-lg py-2">
                                <div class="card-body bg-white ">
                                    <div class="col-12 text-center content-profil-desa">
                                        <p class="mb-4">{{ $item->nama }}</p>
                                        <div class="img-round center-img">
                                            <img alt="" class="img-round" src="{{ asset($item->foto ? 'storage/' . $item->foto : 'img/no-image.png') }}" style="border-radius: 50%;">
                                        </div>
                                        <div class="m-2"><i>{{ $item->jabatan }}</i></div>

                                    </div>
                                    <div class="col-12 rounded-1 bg-light rounded-1">
                                        <div class="row my-4 p-3">
                                            <div class="col-12 isi-profil d-flex justify-content-center">
                                                <ul class="m-0 p-0">
                                                    <li class="py-1">Pendidikan Terakhir : {{ $item->pendidikan }}</li>
                                                    <li class="py-1">TTL : {{ $item->ttl}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endisset
                </div>
            </div>
        </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                items: 1, // You can customize the number of items displayed.
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1 // Adjust the number of items displayed on different screen sizes.
                    },
                    768: {
                        items: 2
                    },
                    1024: {
                        items: 3
                    }
                }
            });
        });
    </script>

</section>

<section class=" p-5">
    <div class="container">
        <div class="row">
            <div class="container mb-3">
                <div class="HeaderArticle">
                    <h4 class="">Lembaga & Organisasi Desa</h4>
                </div>
            </div>
        </div>
        <div class="row mt-5 p-0">
            <div class="AnggotaLembaga bg-white col-md-4 p-0 mb-5">
                <div class="tg-wrap rounded shadow">
                    <table>
                        <thead>
                            <tr>
                                <th class="th-1 fw-normal">Lembaga & Organisasi</th>
                                <th class="th-1 fw-normal">Jumlah Anggota</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Badan Permusyawaratan Desa (BPD)</td>
                                <td class="td-center">7</td>
                            </tr>
                            <tr>
                                <td>LPMD/LKMD</td>
                                <td class="td-center">6</td>
                            </tr>
                            <tr>
                                <td>MUI</td>
                                <td class="td-center">10</td>
                            </tr>
                            <tr>
                                <td>Linmas</td>
                                <td class="td-center">36</td>
                            </tr>
                            <tr>
                                <td>PKK</td>
                                <td class="td-center">13</td>
                            </tr>
                            <tr>
                                <td>Karang Taruna</td>
                                <td class="td-center">21</td>
                            </tr>
                            <tr>
                                <td>BUMDES</td>
                                <td class="td-center">4</td>
                            </tr>
                            <tr>
                                <td>Posyandu</td>
                                <td class="td-center">18</td>
                            </tr>
                            <tr>
                                <td>Polindes</td>
                                <td class="td-center">1</td>
                            </tr>
                            <tr>
                                <td>RW</td>
                                <td class="td-center">12</td>
                            </tr>
                            <tr>
                                <td>RT</td>
                                <td class="td-center">38</td>
                            </tr>
                            <tr>
                                <td>Gakpotan</td>
                                <td class="td-center">2</td>
                            </tr>
                            <tr>
                                <td>Kelompok Tani</td>
                                <td class="td-center">2</td>
                            </tr>
                            <tr>
                                <td>DKM/Masjid</td>
                                <td class="td-center">41</td>
                            </tr>
                            <tr>
                                <td>Partai Politik</td>
                                <td class="td-center">6</td>
                            </tr>
                            <tr>
                                <td>Kelompok Senam</td>
                                <td class="td-center">1</td>
                            </tr>
                            <tr>
                                <td>Unit Simpan Pinjam</td>
                                <td class="td-center">1</td>
                            </tr>
                            <tr>
                                <td>Koperasi</td>
                                <td class="td-center">1</td>
                            </tr>
                            <tr>
                                <td>Lainnya</td>
                                <td class="td-center">3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="iconLembagaDesa col-md-8 py-0">
                <div class="row text-center">
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card penduduk-card bg-white rounded border shadow">
                            <div class="card-body">
                                <div class="center-img">
                                    <img src="{{ asset('img/struktur-organisasi/lembaga-desa/bpd.png') }}" class="img-round" alt="">
                                    <p class="penduduk-card__info my-3">Badan Permusyawaratan Desa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card penduduk-card bg-white rounded border shadow">
                            <div class="card-body">
                                <div class="center-img">
                                    <img src="{{ asset('img/struktur-organisasi/lembaga-desa/karang-taruna.png') }}" class="img-round" alt="">
                                    <p class="penduduk-card__info my-3">Karang Taruna</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card penduduk-card bg-white rounded border shadow">
                            <div class="card-body">
                                <div class="center-img">
                                    <img src="{{ asset('img/struktur-organisasi/lembaga-desa/linmas.png') }}" class="img-round" alt="">
                                    <p class="penduduk-card__info my-3">Satuan Perlindungan Masyarakat</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card penduduk-card bg-white rounded border shadow">
                            <div class="card-body">
                                <div class="center-img">
                                    <img src="{{ asset('img/struktur-organisasi/lembaga-desa/mui.png') }}" class="img-round" alt="">
                                    <p class="penduduk-card__info my-3">Majelis Ulama Indonesia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card penduduk-card bg-white rounded border shadow">
                            <div class="card-body">
                                <div class="center-img">
                                    <img src="{{ asset('img/struktur-organisasi/lembaga-desa/pkk.png') }}" class="img-round" alt="">
                                    <p class="penduduk-card__info my-3">Pemberdayaan Kesejahteraan Keluarga</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card penduduk-card bg-white rounded border shadow">
                            <div class="card-body">
                                <div class="center-img">
                                    <img src="{{ asset('img/struktur-organisasi/lembaga-desa/lpmd.png') }}" class="img-round" alt="">
                                    <p class="penduduk-card__info my-3">Lembaga Pemberdayaan Masyarakat Desa</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection