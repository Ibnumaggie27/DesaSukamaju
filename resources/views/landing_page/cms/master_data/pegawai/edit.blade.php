@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid">

      
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-12 mb-3">
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
                    <form action="{{ route('cms.pegawai.update', $pegawai->id) }}" method="post"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 text-center">
                                <img src="{{ asset($pegawai->foto ? 'storage/' . $pegawai->foto : 'img/no-image.png') }}"
                                    width="150" alt="{{ $pegawai->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" value="{{ ( $pegawai->nama) }}"
                                    class="form-control" id="nama" placeholder="Masukkan nama pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Tempat, Tanggal Lahir</label>
                                <input type="text" name="pendidikan" value="{{ ( $pegawai->ttl) }}" class="form-control"
                                    id="pendidikan" placeholder="Masukkan Pendidikan pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Alamat</label>
                                <input type="text" name="pendidikan" value="{{ ( $pegawai->alamat) }}" class="form-control"
                                    id="pendidikan" placeholder="Masukkan Pendidikan pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Jabatan</label>
                                <input type="text" name="pendidikan" value="{{ ( $pegawai->jabatan) }}" class="form-control"
                                    id="pendidikan" placeholder="Masukkan Pendidikan pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Kepala Jabatan</label>
                                <input type="text" name="pendidikan" value="{{ ( $pegawai->is_kepala_jabatan) }}" class="form-control"
                                    id="pendidikan" placeholder="Masukkan Pendidikan pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                <input type="text" name="pendidikan" value="{{ ( $pegawai->pendidikan) }}" class="form-control"
                                    id="pendidikan" placeholder="Masukkan Pendidikan pegawai">
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
