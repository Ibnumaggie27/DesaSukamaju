@extends('landing_page.cms.layouts.app')
@section('content')
<div class="container-fluid ">

    @if (session('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger mt-3" role="alert">
        {{ session('error') }}
    </div>
    @endif
    <!-- Page Heading -->
    <div class="bg-white p-4 mb-3 rounded-lg flex justify-between items-center">
        <div class="">
            <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">Struktur Desa</h1>
            <p class="text-xs lg:text-base font-normal text-secondary">Data dari pegawai yang di tampilkan pada Website Desa Palasari</p>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card">
        <div class="card-header bg-white py-3">
            <div class="col-12">
                <div id="btn__up_mobileKependudukan" class="col-md-6 d-flex justify-content-end py-2">
                    <div class="layoutBtnPengaduan">
                        <button type="button" class="btn btn-sm btnPengaduan shadow-sm mt-3 mt-md-0 mt-lg-0" style="background-color: #b7efff;" data-toggle="modal" data-target="#strukturDesaModal">
                            <i class="fas fa-plus-circle"></i>
                            Tambah Data</button>
                        <button type="button" class="btn btn-sm btnPengaduan shadow-sm mt-3 mt-md-0 mt-lg-0" style="background-color: #b7efff;" data-toggle="modal" data-target="#gambarStrukturModal">
                            Upload Gambar
                        </button>
                    </div>
                </div>
                <div class="row align-items-center py-2">
                    <div class="col-md-6 py-2">
                        <div class="input-group">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div id="btn__down_largeKependudukan" class="col-md-6 d-flex justify-content-end py-2">
                        <div class="layoutBtnPengaduan">
                            <button type="button" class="btn btn-sm btnPengaduan shadow-sm mt-3 mt-md-0 mt-lg-0" style="background-color: #b7efff;" data-toggle="modal" data-target="#strukturDesaModal">
                                <i class="fas fa-plus-circle"></i>
                                Tambah Data</button>
                            <button type="button" class="btn btn-sm btnPengaduan shadow-sm mt-3 mt-md-0 mt-lg-0" style="background-color: #b7efff;" data-toggle="modal" data-target="#gambarStrukturModal">
                                Upload Gambar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="w-full rounded-lg bg-white divide-y divide-gray overflow-x-auto mb-5">
                <div id="informasiTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="themeColor text-white text-center">
                            <tr>
                                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-2 align-middle">No</th>
                                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-2 align-middle">Level</th>
                                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-2 align-middle">Jabatan</th>
                                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-2 align-middle">Pegawai</th>
                                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-2 align-middle">Alamat</th>
                                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-2 align-middle">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="text-center">
                            @foreach ($pegawais as $pegawai)
                            <tr>
                                <td class="textTable px-2 py-4 text-secondary align-middle align-middle">{{ $loop->iteration }}</td>
                                <td class="textTable px-2 py-4 text-secondary align-middle align-middle">{{ $pegawai->is_kepala_jabatan ? 'Kepala Jabatan' : 'Anggota' }}</td>
                                <td class="textTable px-2 py-4 text-secondary align-middle align-middle">{{ $pegawai->jabatan }}</td>
                                <td class="textTable px-2 py-4 text-secondary align-middle align-middle">{{ $pegawai->nama }}</td>
                                <td class="textTable px-2 py-4 text-secondary align-middle align-middle">{{ $pegawai->alamat }}</td>
                                <td class="textTable px-2 py-4 text-secondary align-middle align-middle">
                                    <form action="{{ route('cms.struktur-desa.destroy', $pegawai->id) }}" method="post" class="d-flex justify-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-2 mx-1"><i class="bx bxs-trash"></i></button>

                                        <a href="{{ route('cms.struktur-desa.edit', $pegawai->id) }}" class="btn btn-primary btn-sm mt-2 mx-1"><i class='bx bx-edit-alt'></i></a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="strukturDesaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atur Struktur Desa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cms.struktur-desa.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="pegawai" class="form-label">Pegawai</label>
                        <select name="pegawai_id" class="form-control">
                            <option value="">-- Pilih Pegawai --</option>
                            @foreach ($pegawais as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan/Struktur</label>
                            <select name="jabatan_pegawai_id" class="form-control">
                                <option value="">-- Pilih Jabatan --</option>
                                @foreach ($jabatans as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                    </select>
                </div> --}}
                <div class="mb-3 form-group form-check">
                    <input type="checkbox" name="is_kepala_jabatan" class="form-check-input" id="ketua">
                    <label class="form-check-label" for="ketua">Kepala Jabatan ?</label>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade" id="gambarStrukturModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atur Struktur Desa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cms.struktur-desa.upload') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Struktur Organisasi</label>
                        <input type="file" name="image" value="{{ old('image') }}" class="form-control" id="image" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('addon-style')
<link href="{{ url('') }}/cms/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@push('addon-script')
<!-- Page level plugins -->
<script src="{{ url('') }}/cms/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('') }}/cms/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ url('') }}/cms/js/demo/datatables-demo.js"></script>
@endpush