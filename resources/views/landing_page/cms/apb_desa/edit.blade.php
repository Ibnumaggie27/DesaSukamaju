@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid bg-white p-4">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row mb-5">
            <div class="bg-white p-4 mb-3 rounded-lg flex justify-between items-center">
        <div class="">
            <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">Data Tahun APB Desa</h1>
            <p class="text-sm lg:text-base font-normal text-secondary">Data dari setiap pengeluaran dan dana masuk APBDes Desa Palasari</p>
        </div>
    </div>
            <div class="col-md-12 ">
                <form action="{{ route('cms.apb.update', $apb->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h6>Edit APB Desa</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="tahun" class="form-label">Tahun <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="tahun" value="{{ old('tahun', $apb->tahun) }}"
                                        class="form-control" id="tahun" placeholder="Masukkan tahun">
                                </div>
                                <div class="col-md-4">
                                    <label for="anggaran" class="form-label">Anggaran <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="anggaran" value="{{ old('anggaran', $apb->anggaran) }}"
                                        class="form-control" id="anggaran" placeholder="Masukkan Anggaran">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-right mt-2">
                   <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
