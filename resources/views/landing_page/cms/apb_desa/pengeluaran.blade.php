@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid bg-white p-4 rounded">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row mb-5 ">
            <div class="bg-white p-4 mb-3 rounded-lg flex justify-between items-center">
        <div class="">
            <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">Data Pengeluaran APB Desa</h1>
            <p class="text-sm lg:text-base font-normal text-secondary">Data dari setiap pengeluaran dan dana masuk APBDes Desa Palasari</p>
        </div>
    </div>
            <div class="col-md-12 ">
                <form action="{{ route('cms.apb.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="pengeluaran">
                    <div class="card">
                        <div class="card-header">
                            <h6>Tambah APB Desa</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="judulPengeluaran" class="form-label">Judul Kegiatan <span class="text-danger">*</span></label>
                                    <input type="text" name="judulPengeluaran" value="{{ old('judulPengeluaran') }}" class="form-control @error('judulPengeluaran') is-invalid @enderror" id="judulPengeluaran" placeholder="Masukkan Judul Kegiatan">
                                    @error('judulPengeluaran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="pengeluaran" class="form-label">Pengeluaran <span class="text-danger">*</span></label>
                                    <input type="text" name="pengeluaran" value="{{ old('pengeluaran') }}" class="form-control @error('pengeluaran') is-invalid @enderror" id="pengeluaran" placeholder="Masukkan anggaran">
                                    @error('pengeluaran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" name="gambar" value="{{ old('gambar') }}" class="form-control @error('gambar') is-invalid @enderror" id="gambar" placeholder="Masukkan gambar">
                                    @error('gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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