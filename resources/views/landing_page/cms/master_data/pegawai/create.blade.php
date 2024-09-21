@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-12">
            <div class="bg-white p-4  mb-3 rounded-lg flex justify-between items-center">
        <div class="">
            <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">Data Pegawai</h1>
            <p class="text-sm lg:text-base font-normal text-secondary">Data dari setiap lengkap setiap pegawai Desa Palasari</p>
        </div>
    </div>
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form action="{{ route('cms.pegawai.store') }}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" value="{{ old('nama') }}" class="form-control"
                                    id="nama" placeholder="Masukkan nama pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="ttl" class="form-label">Tempat Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="text" name="ttl" value="{{ old('ttl') }}" class="form-control"
                                    id="ttl" placeholder="Masukkan Tempat Tanggal Lahir pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <input type="text" name="status" value="{{ old('status') }}" class="form-control"
                                    id="status" placeholder="Masukkan Status pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control"
                                    id="alamat" placeholder="Masukkan Alamat pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Pendidikan Trakhir</label>
                                <input type="text" name="pendidikan" value="{{ old('pendidikan') }}" class="form-control"
                                    id="pendidikan" placeholder="Masukkan Pendidikan pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Nama Jabatan</label>
                                <select name="jabatan" class="form-select" id="jabatan">
                                    <option value="SEKRETARIS DESA">SEKRETARIS DESA</option>
                                    <option value="KEPALA DESA">KEPALA DESA</option>
                                    <option value="KETUA BPD">KETUA BPD</option>
                                    <option value="BHABINKAMTIBNAS">BHABINKAMTIBNAS</option>
                                    <option value="BABINSA">BABINSA</option>
                                    <option value="KASI KESRA">KASI KESRA</option>
                                    <option value="STAF KASI KESRA">STAF KASI KESRA</option>
                                    <option value="STAF KASI KESRA DRIVER AMBULANCE">STAF KASI KESRA DRIVER AMBULANCE</option>
                                    <option value="KASI PEMERINTAHAN">KASI PEMERINTAHAN</option>
                                    <option value="STAF KASI PEMERINTAHAN">STAF KASI PEMERINTAHAN</option>
                                    <option value="KASI PELAYANAN">KASI PELAYANAN</option>
                                    <option value="STAF KASI PELAYANAN">STAF PELAYANAN</option>
                                    <option value="KAUR KEUANGAN">KAUR KEUANGAN</option>
                                    <option value="STAF KAUR KEUANGAN">STAF KEUANGAN</option>
                                    <option value="KAUR TATA USAHA & UMUM">KAUR TATA USAHA & UMUM</option>
                                    <option value="STAF KAUR TATA USAHA & UMUM">STAF KAUR TATA USAHA & UMUM</option>
                                    <option value="STAF KAUR UMUM">STAF PELAYANAN UMUM</option>
                                    <option value="KAUR PERENCANAAN">KAUR PERENCANAAN</option>
                                    <option value="KEPALA DUSUN I">KEPALA DUSUN I</option>
                                    <option value="KEPALA DUSUN II">KEPALA DUSUN II</option>
                                    <option value="KEPALA DUSUN III">KEPALA DUSUN III</option>
                                    <option value="KEPALA DUSUN IV">KEPALA DUSUN IV</option>
                                    <option value="KEPALA DUSUN V">KEPALA DUSUN V</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" name="foto" value="{{ old('foto') }}" class="form-control"
                                    id="foto" placeholder="Masukkan foto pegawai">
                            </div>
                        </div>
                        <div class="modal-footer">
                           <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection