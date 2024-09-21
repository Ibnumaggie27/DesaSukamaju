@extends('landing_page.cms.layouts.app')
@section('content')
<div class="container-fluid">

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
            <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">Data APB Desa</h1>
            <p class="text-sm lg:text-base font-normal text-secondary">Data dari setiap pengeluaran dan dana masuk APBDes Desa Palasari</p>
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

    <div class="card ">
        <div class="card-header bg-white py-3">
            <div class="col-12">
                <div id="btn__up_mobileKependudukan" class="col-md-6 d-flex justify-content-end py-2">
                    <div class="layoutBtnPengaduan">
                        <a href="{{ route('cms.apb.create', ['type' => 'pengeluaran']) }}" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm lg:text-base px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;"><i class="fas fa-plus-circle"></i> Kegiatan</a>
                        <a href="{{ route('cms.apb.create', ['type' => 'apb']) }}" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;"><i class="fas fa-plus-circle"></i> APBDes</a>
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
                            <a href="{{ route('cms.apb.create', ['type' => 'pengeluaran']) }}" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;"><i class="fas fa-plus-circle"></i> Kegiatan</a>
                            <a href="{{ route('cms.apb.create', ['type' => 'apb']) }}" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;"><i class="fas fa-plus-circle"></i> APBDes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="w-full rounded-lg bg-white divide-y divide-gray overflow-x-auto mb-5">
                <table id="informasiTable" class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead class="themeColor text-white">
                        <tr>
                            <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-2 align-middle">No</th>
                            <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-2 align-middle">Tahun</th>
                            <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-2 align-middle">Anggaran</th>
                            <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-2 align-middle">Judul Kegiatan</th>
                            <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-2 align-middle">Pengeluaran</th>
                            <th colspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-2 align-middle">Aksi</th>
                        </tr>
                        <tr>
                            <th class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-2 align-middle">Edit</th>
                            <th class="textTabelTop font-semibold text-sm uppercase px-4 py-2 align-middle">Hapus</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($apb_desas as $item)
                        <tr class"text-center">
                            <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">{{ $loop->iteration }}</td>
                            <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">{{ $item->judul }} - Tahun {{ $item->tahun }}</td>
                            <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">{{ number_format($item->anggaran, 0, ',', '.') }}</td>
                            <td class="textTable px-2 py-4 text-secondary whitespace-normal text-justify text-sm lg:text-base align-middle align-middle">{{ $item->judulPengeluaran }}</td>
                            <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">{{ number_format($item->pengeluaran, 0, ',', '.') }}</td>
                            <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle"><div class="pr-2">
                                        <a href="{{ $item->tahun !== null ? route('cms.apb.edit', $item->id) : route('cms.apb.editPengeluaran', $item->id) }}" class="text-primary"><i class='bx bx-edit-alt'></i></a>
                                    </div></td>
                            <td class="textTable px-2 py-4 text-secondary align-middle align-middle">
                                <div class="d-flex justify-content-evenly">
                                    
                                    <form action="{{ route('cms.apb.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger"><i class="bx bxs-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#searchInput').on('keyup', function() {
                        var value = $(this).val().toLowerCase();
                        $('#informasiTable tbody tr').filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                        });
                    });
                });
            </script>
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