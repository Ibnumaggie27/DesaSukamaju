@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid ">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 col-12">
            <h1 class="h3 mb-0 text-gray-800">Data Jabatan</h1>
            <button type="button" class="btn btn-sm btn-primary shadow-sm mt-3 mt-md-0 mt-lg-0" data-toggle="modal"
                data-target="#addJabatanModal">
                <i class="fas fa-plus-circle"></i>
                Buat Jabatan</button>
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

        <div class="card shadow mb-4 col-12">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($jabatans as $jabatan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jabatan->nama }}</td>
                                    <td class="">
                                        <div class="d-flex justify-content-evenly">
                                            <div class="pr-2">
                                                <a href="{{ route('cms.jabatan.edit', $jabatan->id) }}"
                                                    class="btn btn-primary btn-sm me-3">Edit</a>
                                            </div>

                                            <form action="{{ route('cms.jabatan.destroy', $jabatan->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addJabatanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Jabatan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('cms.jabatan.store') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Jabatan</label>
                            <select name="nama" class="form-select" id="nama">
                                <option value="SEKRETARIS DESA">SEKRETARIS DESA</option>
                                <option value="KEPALA DESA">KEPALA DESA</option>
                            </select>
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
