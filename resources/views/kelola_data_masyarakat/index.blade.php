@extends('templates/dashboard')
@section('content')
<div class="layoutWelcome bg-white py-2 px-10 mb-5 rounded-lg d-flex">
    <div class="row">
        <div class="col-12">
            <count__total class=" text-lg lg:text-2xl headDash fw-bolder mb-2">Data Kependudukan</count__total>
        </div>

        <div class="col-12 my-4">
            <div class="row">

                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md themeColor px-4 ">
                        <a href="/data/kependudukan" class="">
                            <div class="row justify-content-around card-body bg-white card-body bg-white">
                                <div class="col-12 p-0 ">
                                    <p class="fw-bold text-black text-center lg:text-xl text-sm">Penduduk</p>
                                </div>
                                <hr>
                                <div class="layoutInsideCardKependudukan row p-3">

                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/keluarga.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        </p>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\penduduk::count('NIK') }}</p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md themeColor px-4">
                        <a class="" href="/data/kematian">
                            <div class="row justify-content-around card-body bg-white">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center lg:text-xl text-sm">Kematian</p>
                                </div>
                                <hr>
                                <div class="layoutInsideCardKependudukan row p-3">
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/kematian.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\kematian::count('NIK') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md themeColor px-4">
                        <a class="" href="/data/kelahiran">
                            <div class="row justify-content-around card-body bg-white">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center lg:text-xl text-sm">Kelahiran</p>
                                </div>
                                <hr>
                                <div class="layoutInsideCardKependudukan row p-3">
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/kelahiran.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\kelahiran::count('id') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md themeColor px-4">
                        <a class="" href="/data/miskin">
                            <div class="row justify-content-around card-body bg-white">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center lg:text-xl text-sm">Masyarakat Miskin</p>
                                </div>
                                <hr>
                                <div class="layoutInsideCardKependudukan row p-3">
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/masyrarakat_miskin.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\miskin::count('id') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="layoutWelcome bg-white py-2 px-10 mb-5 rounded-lg d-flex">
    <div class="row">
        <div class="col-12">
            <count__total class="text-lg lg:text-2xl headDash fw-bolder mb-2">Data Keluarga</count__total>
        </div>

        <div class="col-12 my-3">
            <div class="row">
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md themeColor px-4">
                        <a class="" href="/data/ibuhamil">
                            <div class="row justify-content-around card-body bg-white">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center lg:text-xl text-sm">Ibu Hamil</p>
                                </div>
                                <hr>
                                <div class="layoutInsideCardKependudukan row p-3">
                                    <div class="col-4">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/ibu_hamil.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\ibuhamil::count('id') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md themeColor px-4">
                        <a class="" href="/data/bayi1sampai5tahun">
                            <div class="row justify-content-around card-body bg-white">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center lg:text-xl text-sm">Bayi 1-5 tahun</p>
                                </div>
                                <hr>
                                <div class="layoutInsideCardKependudukan row p-3">
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/anak_1-5tahun.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\bayi1sampai5tahun::count('id') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md themeColor px-4">
                        <a class="" href="/data/anakyatim">
                            <div class="row justify-content-around card-body bg-white">
                                <div class="col-12">
                                    <p class="fw-bold text-black text-center lg:text-xl text-sm">Anak yatim usia 1 - 12 tahun</p>
                                </div>
                                <hr>
                                <div class="layoutInsideCardKependudukan row p-3">
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/anak_yatim.svg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\anakyatim::count('id') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="layoutWelcome bg-white py-2 px-10 mb-5 rounded-lg d-flex">
    <div class="row">

        <div class="col-12">
            <count__total class="text-lg lg:text-2xl headDash fw-bolder mb-2">Data Bantuan Pemerintah</count__total>
        </div>

        <div class="col-12 my-3">
            <div class="row">

                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md themeColor px-4">
                        <a class="" href="/data/pkh">
                            <div class="row justify-content-around card-body bg-white">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center lg:text-xl text-sm">Program Keluarga Harapan</p>
                                </div>
                                <hr>
                                <div class="layoutInsideCardKependudukan row p-3">
                                    <div class="col-4">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/PKH.png    ') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\pkh::count('id') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md themeColor px-4">
                        <a class="" href="/data/bpn">
                            <div class="row justify-content-around card-body bg-white">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center lg:text-xl text-sm">Bantuan Pangan Non Tunai</p>
                                </div>
                                <hr>
                                <div class="layoutInsideCardKependudukan row p-3">
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/pangan-non-tunai.jpg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\bpn::count('id') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md themeColor px-4">
                        <a class="" href="/data/bps">
                            <div class="row justify-content-around card-body bg-white">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center lg:text-xl text-sm">Bantuan Pangan Stunting</p>
                                </div>
                                <hr>
                                <div class="layoutInsideCardKependudukan row p-3">
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/pangan-stunting.jpg') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\bps::count('id') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="LayoutCardKependudukan col-4 py-2">
                    <div class="card border border-gray-200 rounded-b-lg shadow-md themeColor px-4">
                        <a class="" href="/data/bbp">
                            <div class="row justify-content-around card-body bg-white">
                                <div class="col-12 ">
                                    <p class="fw-bold text-black text-center lg:text-xl text-sm">Bantuan Beras Pemerintah</p>
                                </div>
                                <hr>
                                <div class="layoutInsideCardKependudukan row p-3">
                                    <div class="col-4 iconCardKependudukan">
                                        <br>
                                        <div class="thumbnail-container rounded-20 overflow-hidden rounded-lg" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                            <img src="{{ asset('img/kependudukan/beras.png') }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100 rounded-20" alt="..." style="object-fit: contain;">
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="card-text text-right">
                                            <medium class="text-muted textDashboardBottom">Total Data</medium>
                                            <br>
                                        <p class="text-right fw-bolder count__total">{{ \App\Models\bbp::count('id') }}</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection