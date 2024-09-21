@extends('landing_page.layouts.app')

@section('title')
{{ $berita->judul }}
@endsection
@section('content')
<div class="container-fluid layout__detail-berita">
    <div class="row">
        <div class="BeritaDetail col-8 bg-light">
            <article id="breadcrumb" class="card container layout__detail-berita bg-white">
                <div id="details-news">
                    <div class="">
                        <div class="pt-3">
                            <h1>{{ $berita->judul }}</h1>
                            <h6 class="ml-3 text-decoration-underline ">Berita</h6>
                        </div>

                        <div class="d-block mt-5">
                            <p id="info-news" class=""><i class="fa fa-user"></i> : {{ $berita->author->nama }}</p>
                            <p id="info-news" class=""> <i class="fa fa-calendar"></i> : {{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('MMMM , D , Y') }} </p>

                        </div>
                    </div>

                    <div id="thumbnail" class="bg-dark mt-4">
                        @if ($berita->gambar)
                        <img id="thumbnail" src="{{ asset('storage/' . $berita->gambar) }}" style="width: 100%; height: auto; object-fit: contain;">
                        @endif
                    </div>

                    <div class=" overflow-hidden">
                        <div id="content-desc" class="content-desc py-5 px-5 lh-lg content-p thumbnail-image object-cover" alt="..." style="object-fit: contain;"> {!! $berita->deskripsi !!}</div>
                    </div>

                </div>
            </article>
        </div>
         <div class="LatestNews col-4">
            <div class="bg-white">
                <div id="latest-news">
                    <div id="body" class="card p-2 row ">
                        <div class="col-12 ">
                            <h3 class="mt-3 fw-medium">TERBARU</h3>
                            @foreach ($berita_terbaru as $berita_baru)
                            <a href="{{ route('informasi.berita.detail', $berita_baru->slug) }}" class="text-decoration-none text-black">
                                <div class="card border-0 mb-3">
                                    <div class="row g-0 p-5">
                                        <div class="col-6">
                                            <img src="{{ asset($berita_baru->gambar ? 'storage/' . $berita_baru->gambar : 'img/no-picture.png') }}" class="img-fluid rounded-start" alt="News Image" style="object-fit: cover; height: 100%;">
                                        </div>
                                        <div class="col-6">
                                            <div class="card-body p-0" style="margin-left:8px;">
                                                <p class="card-title fw-semibold">{{ $berita_baru->judul_singkat }}...</p>
                                                <p class="card-text" style="font-size:12px;"><i class="fa-solid fa-calendar-days me-1"></i> {{ \Carbon\Carbon::parse($berita_baru->created_at)->isoFormat('MMMM D, Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection