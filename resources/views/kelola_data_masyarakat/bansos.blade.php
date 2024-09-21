@extends('templates/dashboard')
@section('content')

<div class="layoutWelcome bg-white py-4 px-9 mb-5 rounded-lg">
    <div class="row d-flex align-items-center">
        <div class="col-12">
            <h1 class="text-lg lg:text-2xl headDash fw-bolder mb-2">Data Bantuan Sosial Penduduk Desa Palasari</h1>
            <p class="textDashboard text-base text-[13px] lg:text-lg font-normal text-secondary">Semua data Bansos pada masyarakat Desa Palasari Kecamatan Cipanas</p>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/data/importbansos" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="file" name="file" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white py-3">
        <div class="col-12">
            <div id="btn__up_mobileKependudukan" class="col-md-6 d-flex justify-content-end py-2">
                <div class="layoutBtnPengaduan">
                    <a href="/data/input-bansos" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;"><i class="bx bxs-plus-circle"></i> Tambah Data</a>
                    <a href="#" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none ms-2" style="background-color: #b7efff;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Import Data
                    </a>
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
                        <a href="/data/input-bansos" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;"><i class="bx bxs-plus-circle"></i> Tambah Data</a>
                        <!--<a href="#" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none ms-2" style="background-color: #b7efff;" data-bs-toggle="modal" data-bs-target="#exampleModal">-->
                        <!--    <i class="bx bx-import"></i>-->
                        <!--    Import Data-->
                        <!--</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="w-full rounded-lg bg-white divide-y  overflow-x-auto divide-gray overflow-x-auto mb-5">

            <table id="pendudukTable" class="table table-bordered border w-full rounded-lg bg-white divide-y divide-gray overflow-hidden">
                <thead class="themeColor text-white text-center">
                    <tr>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-3 align-middle">No</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-3 align-middle">NIK</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-3 align-middle">Nama Lengkap</th>
                        {{-- <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-3 align-middle">Tempat Tanggal Lahir</th>
                    <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-3 align-middle">Tempat Tanggal Kematian</th>
                    <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-3 align-middle">Nama Pelapor</th>
                    <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-3 align-middle">NIK Pelapor</th>
                    <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-3 align-middle">Nomor Yang Bisa Di Hubungi</th> --}}
                        <th colspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-3 align-middle">Aksi</th>
                    </tr>
                    <tr>

                        <th class="textTabelTop font-semibold text-sm uppercase px-4 py-3 align-middle">Detail</th>
                        <th class="textTabelTop font-semibold text-sm uppercase px-4 py-3 align-middle">Hapus</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($bansos as $item)
                    @php
                        // Ambil data penduduk berdasarkan penduduk_id yang disimpan di bayi1sampai5tahun
                        $penduduk = \App\Models\penduduk::find($item->penduduk_id);
                    @endphp
                    <tr>
                        <td class="textTable px-2 py-4 text-secondary align-middle">{{ $item->id }}</td>
                        <td class="textTable px-2 py-4 text-secondary align-middle">{{ $penduduk->NIK }}</td>
                        <td class="textTable px-2 py-4 text-secondary align-middle">{{ $penduduk->namaLengkap }}</td>
                        {{-- Tambahkan kolom lainnya sesuai kebutuhan --}}
                        <td class="textTable px-2 py-4 text-secondary align-middle">
                            <button class="text-primary text-center detailKependudukan" data-user="">
                                <i class='bx bx-edit-alt'></i>
                            </button>
                        </td>
                        <td class="textTable px-2 py-4 text-secondary align-middle">
                            <button class="text-danger text-center deletePenduduk" data-id="{{ $item->id }}">
                                <i class="bx bxs-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-4">

            </div>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#searchInput').on('keyup', function() {
                        var value = $(this).val().toLowerCase();
                        $('#pendudukTable tbody tr').filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                        });
                    });
                });
            </script>
        </div>
    </div>
</div>

@endsection
