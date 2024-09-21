@extends('landing_page.layouts.app')


@section('content')
<div class="content-wrapper">
    <div class="d-sm-block">
        <section class="wrapper video-wrapper bg-overlay ratio ratio-21x9 shadow" id="hero">
            <video poster="{{ asset('img/landing-page/carousel-2.png') }}" src="{{ asset('img/landing-page/test.mp4') }}" autoplay="" loop="" playsinline="" muted="" __idm_id__="3162113"></video>
            <div class="video-content">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-8 justify-content-center mx-auto contentVideo p-5" data-cues="slideInDown" data-group="page-title" data-disabled="true">
                            <img src="{{ asset('img/desaa.png') }}" class="img-fluid" alt="" data-cue="slideInDown" data-group="page-title" data-show="true" style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                            <h2 class="display-4 text-white fs-60  px-md-15 px-lg-0 fw-bold" data-cue="slideInDown" data-group="page-title" data-show="true" style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 300ms; animation-direction: normal; animation-fill-mode: both;"> Desa Palasari</h2>
                            <p class="lead fs-24 text-white lh-sm mb-7 mx-md-13 mx-lg-10" data-cue="slideInDown" data-group="page-title" data-show="true" style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 600ms; animation-direction: normal; animation-fill-mode: both;">"PALASARI LEBIH CERDAS, SEJAHTERA, ADIL DAN BERAKHLAKUL KARIMAH."</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Mengenai Desa -->
<section id="MengenaiDesa" class="p-5 bg-light ">
    <div class="container">
        <div class="text-center my-3 d-flex justify-content-center">
            <div data-aos="zoom-out-down" data-aos-offset="100" data-aos-delay="200" class="HeaderArticle-mengenaiDesa">
                <h4 class="shadow mb-5">Apa itu Desa Palasari ?</h4>
            </div>
        </div>
    </div>

    <section id="sejarah-desa" class="">
        <article class="space-subHeader container">
            <div class="row">
                <div class="col-md-6 VisiMisiImg">
                    <div data-aos="fade-right" class="">
                        <img src="{{ asset('img/landing-page/carousel-3.jpg') }}" height="100%" class="img-fluid rounded shadow" alt="Gambar Mengenai Desa">
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-offset="200" data-aos-delay="500" class="KeteranganVisiMisi col-md-6 aos-init aos-animate">
                    <div class="row p-3">
                        <div class="card-body card_color p-3 rounded border shadow">

                            <h5 class="fw-bold py-3 headContent text-center">SEJARAH DESA</h5>

                            <div class="isiContent p-2 rounded">
                                <p>Desa Palasari merupakan pemekaran dari desa Cimacan Kecamatan Cipanas (Dahulu Kecamatan Pacet)
                                    pada Tanggal 17 Januari 1980. Desa Palasari Berada di kaki Gunung Gede Pangrango Yang Terdapat Tugu Kerajaan Prabu Siliwanggi,Tugu Tersebut menandakan 3 (Tiga) Daerah kekuasaanya yaitu cianjur, Sukabumi, dan Bogor.
                                    Pemerintah Desa Palasari Sejak Tahun 1980 Mengalami Pergantian Kepala Desa sebanyak 15 kali dan yang menjabat saat ini adalah H.Ridwan.SH</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </article>
    </section>
    <section id="visi-misi" class="">
        <article class="space-subHeader container">
            <div class="row">
                <div id="img_Smallscreen" class="col-md-6 VisiMisiImg">
                    <div data-aos="fade-right" class="">
                        <img src="{{ asset('img/landing-page/carousel-2.png') }}" height="100%" class="img-fluid rounded shadow" alt="Gambar Mengenai Desa">
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-offset="200" data-aos-delay="500" class="KeteranganVisiMisi col-md-6 aos-init aos-animate">
                    <div class="row p-3">
                        <div class="card-body card_color p-3 rounded border shadow">

                            <h5 class="fw-bold py-3 headContent text-center">VISI & MISI</h5>

                            <div class="isiContent p-2 rounded">
                                <p>“PALASARI LEBIH CERDAS, SEJAHTERA, ADIL DAN BERAKHLAKUL KARIMAH “</p>
                                <p>Meningkatkan SDM dan SDA Desa Palasari untuk kesejahteraan masyarakat Desa Palasari serta Meningkatkan Pembinaan yang berakhlaqul karimah dalam kehidupan bermasyarakat dan bernegara dan Mewujudkan iklim demokrasi ditingkat desa.</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="img_Largescreen" class="col-md-6 VisiMisiImg">
                    <div data-aos="fade-right" class="">
                        <img src="{{ asset('img/landing-page/carousel-2.png') }}" height="100%" class="img-fluid rounded" alt="Gambar Mengenai Desa">
                    </div>
                </div>
            </div>
        </article>
    </section>
</section>

<!-- Data Kependudukan -->
<section id="DataKependudukan" class="p-3 ">
    <div class="container p-0">
        <div data-aos="fade-right" data-aos-offset="100" data-aos-delay="200" class="HeaderArticle my-3">
            <h4 class="">Data Kependudukan</h4>
        </div>
    </div>

    <div class="space-subHeader container">
        <section class="mt-5">
            <div class="row mt-3">
                <div data-aos="flip-right" data-aos-offset="100" data-aos-delay="200" class="col-6 col-lg-4 mb-3 text-center">
                    <div class="card card-demografi-penduduk card_color py-2 shadow">
                        <div class="card-body bg-white">
                            <p class="card-demografi-penduduk__info mb-4 fw-semibold">Perempuan</p><img src="{{ asset('img/landing-page/iconPendudukPerempuan.png') }}" alt="icon jumlah perempuan" height="100">
                            <p id="jumlahPerempuan" class="card-demografi-penduduk__jumlah mb-0 mt-4 fw-semibold">1802</p>
                        </div>
                    </div>
                </div>
                <div data-aos="flip-right" data-aos-offset="100" data-aos-delay="400" class="col-6 col-lg-4 mb-3 text-center">
                    <div class="card card-demografi-penduduk card_color py-2 shadow">
                        <div class="card-body bg-white">
                            <p class="card-demografi-penduduk__info mb-4 fw-semibold">Laki-Laki</p><img src="{{ asset('img/landing-page/iconPendudukLaki.png') }}" alt="icon jumlah perempuan" height="100">
                            <p id="jumlahLaki" class="card-demografi-penduduk__jumlah mb-0 mt-4 fw-semibold">1849</p>
                        </div>
                    </div>
                </div>
                <div data-aos="flip-right" data-aos-offset="100" data-aos-delay="600" class="iconKeluarga  col-lg-4 mb-3 text-center">
                    <div class="card card-demografi-penduduk card_color py-2 shadow">
                        <div class="card-body bg-white">
                            <p class="card-demografi-penduduk__info mb-4 fw-semibold">Total Penduduk</p><img src="{{ asset('img/landing-page/iconPenduduk.png') }}" alt="icon jumlah perempuan" height="100">
                            <p id="jumlahPenduduk" class="card-demografi-penduduk__jumlah mb-0 mt-4 fw-semibold">3651</p>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" class="col-12 text-center isiContent mt-5">
                    <p>Ini adalah total data dari warga setiap dusun pada <b>Desa Palasari</b> yang di bagi menurut jenis kelamin.</p>
                </div>
            </div>
        </section>
    </div>

</section>

<!-- Data bantuan bantuan -->
<section id="DataKependudukan" class="p-3 ">
    <div class="container p-0">
        <div data-aos="fade-right" data-aos-offset="100" data-aos-delay="200" class="HeaderArticle my-3">
            <h4 class="">Data Penerima Bantuan</h4>
        </div>
    </div>

    <div class="space-subHeader container">
        <section class="mt-5">
            <div class="row mt-3">
                <div data-aos="flip-right" data-aos-offset="100" data-aos-delay="800" class="iconBansos  col-lg-3 mb-3 text-center">
                    <div class="card card-demografi-penduduk card_color py-2 shadow ">
                        <div class="card-body bg-white h-100 flex-fill">
                            <p class="card-demografi-penduduk__info mb-4 fw-semibold">Program Keluarga Harapan</p><img src="{{ asset('img/kependudukan/PKH.png') }}" alt="icon jumlah perempuan" class="iconBansosImg">
                            <p id="jumlahPenduduk" class="card-demografi-penduduk__jumlah mb-0 mt-4 fw-semibold">{{ \App\Models\pkh::count('id') }}</p>
                        </div>
                    </div>
                </div>
                <div data-aos="flip-right" data-aos-offset="100" data-aos-delay="200" class="iconBansos col-lg-3 mb-3 text-center">
                    <div class="card card-demografi-penduduk card_color py-2 shadow ">
                        <div class="card-body bg-white h-100 flex-fill">
                            <p class="card-demografi-penduduk__info mb-4 fw-semibold">Bantuan Pangan Stunting</p><img src="{{ asset('img/kependudukan/pangan-stunting.jpg') }}" alt="icon jumlah perempuan" class="iconBansosImg">
                            <p id="jumlahPenduduk" class="card-demografi-penduduk__jumlah mb-0 mt-4 fw-semibold">{{ \App\Models\bps::count('id') }}</p>
                        </div>
                    </div>
                </div>
                <div data-aos="flip-right" data-aos-offset="100" data-aos-delay="200" class="iconBansos  col-lg-3 mb-3 text-center">
                    <div class="card card-demografi-penduduk card_color py-2 shadow ">
                        <div class="card-body bg-white h-100 flex-fill">
                            <p class="card-demografi-penduduk__info mb-4 fw-semibold">Bantuan Pangan Non Tunai</p><img src="{{ asset('img/kependudukan/pangan-non-tunai.jpg') }}" alt="icon jumlah perempuan" class="iconBansosImg">
                            <p id="jumlahLaki" class="card-demografi-penduduk__jumlah mb-0 mt-4 fw-semibold">{{ \App\Models\bpn::count('id') }}</p>
                        </div>
                    </div>
                </div>
                <div data-aos="flip-right" data-aos-offset="100" data-aos-delay="200" class="iconBansos  col-lg-3 mb-3 text-center">
                    <div class="card card-demografi-penduduk card_color py-2 shadow ">
                        <div class="card-body bg-white h-100 flex-fill">
                            <p class="card-demografi-penduduk__info mb-4 fw-semibold">Bantuan Beras Pemerintah</p><img src="{{ asset('img/kependudukan/beras.png') }}" alt="icon jumlah perempuan" class="iconBansosImg">
                            <p id="jumlahPenduduk" class="card-demografi-penduduk__jumlah mb-0 mt-4 fw-semibold">{{ \App\Models\bbp::count('id') }}</p>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" class="col-12 text-center isiContent mt-5">
                    <p>Ini adalah total Bantuan di <b>Desa Palasari</b> yang di bagi menurut beberapa kategori bantuan.</p>
                </div>
            </div>
        </section>
    </div>

</section>

<!-- Apbdes -->
<section id="Apbdes" class="p-3">
    <div class="container p-0">
        <div data-aos="fade-right" data-aos-offset="100" data-aos-delay="200" class="HeaderArticle my-3">
            <h4 class="">Data APBDesa Tahunan </h4>
        </div>
    </div>

    <div class="container">
        <section class="mt-5 row">
            <div class="col-12 d-block">
                <div class="col-12 d-block justify-content-center mx-auto">
                    <h5 class="headGraph fw-semibold text-center">Grafik Pemakaian APBDes</h5>
                    <div id="apbdes" class="text-center"></div>
                    <script>
                        var chartBeranda = @json($chart);
                    </script>
                </div>
                <div ata-aos="flip-up" data-aos-offset="200" data-aos-delay="500" class="row">
                    <div class="col-md-6 mb-2">
                        <div class="card card-idm card-idm__skor card_color px-2 filter shadow border">
                            <div class="card-body bg-light p-1 rounded border">
                                <div class="row d-block">
                                    @foreach($apb as $item)
                                    <div class="col-12">
                                        @isset($item->tahun)
                                        <p class="card-idm__text">Anggaran Desa</p>
                                        @endisset
                                    </div>
                                    <div class="col-12 text-end center-v">
                                        @if($item->anggaran !== null)
                                        <p class="fw-bold h2" >Rp{{ number_format($item->anggaran, 0, ',', '.') }}</p>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="card card-idm card-idm__status card_color px-2 filter shadow border">
                            <div class="card-body bg-light p-1 rounded ">
                                <div class="row d-block">
                                    @foreach($apb as $item)
                                    @isset($item->tahun)
                                    <div class="col-12 card-color">
                                        <p class="card-idm__text ">Belanja Desa</p>
                                    </div>
                                    <div class="col-12 text-end center-v ">
                                        @if($latestItem = $item->latest()->first())
                                        <p class=" fw-bold  h2" >- Rp{{ number_format($latestItem->jumlah, 0, ',', '.') }}</p>
                                        @endif
                                    </div>
                                    @endisset
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<!-- Berita Dan Pengumuman -->
<section id="BeritaPengumuman" class="pt-3 bg-light">
    <div class="container p-0">
        <div data-aos="fade-right" data-aos-offset="100" data-aos-delay="200" class="HeaderArticle my-3">
            <h4 class="">Berita & Pengumuman</h4>
        </div>
    </div>
    <article class="space-subHeader container">
        <div data-aos="fade-up" data-aos-offset="200" data-aos-delay="500" class="row">
            <div class="col-md-12 text-end pb-3 "><a href="{{ route('informasi.berita.index') }}" class="text-black MoreBeritaPengumuman">Lihat Selengkapnya <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.25rem;" viewBox="0 0 32 32">
                        <path d="m31.71 15.29-10-10-1.42 1.42 8.3 8.29H0v2h28.59l-8.29 8.29 1.41 1.41 10-10a1 1 0 0 0 0-1.41z" data-name="3-Arrow Right" />
                    </svg></a></div>
            <div class="row">
                @foreach($beritas as $berita)
                <div class="col-4 Berita d-flex">
                    <div class="card cardBeritaPengumuman flex-fill " style="border: none;">
                        <a href="{{ route('informasi.berita.detail', $berita->slug) }}" class="h-100 d-flex flex-column">
                            <div class="card-body artikel-card shadow card_color p-0">
                                <div id="thumbnail" class="col-12 ">
                                    <div class="thumbnail-container overflow-hidden rounded-top" style="position: relative; padding-bottom: 85%; /* Adjust the aspect ratio as needed */">
                                        <img src="{{ asset($berita->gambar ? 'storage/' . $berita->gambar : 'img/no-picture.png') }}" class="thumbnail-image position-absolute top-0 start-0 w-100 h-100 bg-dark" alt="..." style="object-fit: contain;">
                                    </div>
                                </div>
                                <div class="card_color rounded-bottom my-2">
                                    <div class="p-2 bg-white rounded">
                                        <div class="col-12">
                                            <p class="JenisBeritaPengumuman my-1">{{ $berita->tipe }}</p>
                                            <p class="artikel-judul">{{ substr($berita->judul_singkat, 0, 42) . '...' }}</p>
                                            <p id="desc" class=" d-block desc text-black my-1" align="justify" style="font-size: 12px;">
                                                {{ substr($berita->deskripsi_singkat, 0, 110) . '...' }}
                                            </p>
                                        </div>

                                        <div class="col-12 mt-3">
                                            <p class="artikel-penulis p-1 m-0">
                                                <i class="fa fa-user"></i> <span>{{ $berita->author->nama }}</span>
                                            </p>
                                            <p class="artikel-tanggal p-1 m-0">
                                                <i class="fa fa-calendar"></i> <span>{{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('MMMM , D , Y') }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </article>
</section>

<section id="Demografi" class="pt-2 Demografi">
    <div class="container p-0">
        <div data-aos="fade-right" data-aos-offset="100" data-aos-delay="200" class="HeaderArticle my-3">
            <h4 class="">Demografi Desa</h4>
        </div>
    </div>
    <article class="space-subHeader container">
        <div class="row d-block">
            <div data-aos="fade-up" data-aos-offset="100" data-aos-delay="300" class="DemografiLay KeteranganVisiMisi col-md-6 aos-init aos-animate">
                <div class="row">
                    <div class="mt-3 card border-0 shadow card_color">
                        <div class="card-body bg-white">
                            <h5 class="fw-bold my-2 ">Peta Desa</h5>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.4224179847984!2d107.03244507462495!3d-6.718196365684395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b3c15cf56f1b%3A0x321b4a4d7a9721a9!2sKantor%20Desa%20Palasari!5e0!3m2!1sid!2sid!4v1692723106353!5m2!1sid!2sid" class="" width="100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style=" border: 2px solid; "></iframe>
                            <p class="bg-light p-2 rounded">Desa Palasari, desa yang berbatasan dengan desa cimacan. kondisi Geografis, Ketinggian Tanah Dari, Permukaan Laut : 500-1000 Mdpl, Curah Hujan : 3.145 mm/th, Tofografi : Dataran Tinggi, Suhu Udara Rata-Rata : 21 derajat celcius</p>

                            <hr>

                            <h6 class="">Batas Desa</h6>
                            <div class="bg-light p-1 rounded">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="isiContent col-md-12">
                                                <p class="peta-lokasi-desa__lokasi fw-bold mb-1">Utara</p><span class="batasDesa">Desa Ciloto dan Desa Batulawang</span>
                                            </div>
                                            <div class="isiContent col-md-12">
                                                <p class="peta-lokasi-desa__lokasi fw-bold mb-1">Barat</p><span class="batasDesa">Desa Cimacan</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="isiContent col-md-12">
                                                <p class="peta-lokasi-desa__lokasi fw-bold mb-1">Selatan</p><span class="batasDesa">Desa Sindangjaya dan Desa Sindanglaya</span>
                                            </div>
                                            <div class="isiContent col-md-12">
                                                <p class="peta-lokasi-desa__lokasi fw-bold mb-1">Timur</p><span class="batasDesa">Desa Sukanagalih</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>

@endsection