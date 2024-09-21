@extends('templates/dashboard')
@section('content')
<div class="layoutWelcome bg-white p-4 mb-5 rounded-lg flex justify-between items-center">
    <div class="py-2">
        <h1 class="text-lg lg:text-2xl font-bold mb-2 headDash">Pengajuan Surat Online</h1>
        <p class="text-xs lg:text-base font-normal text-secondary">Semua pengajuan surat yang masuk</p>
    </div>
    @canany(['masyarakat','petugas'])
    <div class="layoutBtnPengaduan">
        <a href="{{ route('surat') }}" class="btnPengaduan text-black text-decoration-none focus:outline-none font-medium rounded-lg lg:text-sm px-5 py-2.5 text-center themeColor">Buat Surat</a>
    </div>

    @endcanany
</div>
@can('masyarakat')
<p class="textDashboard fw-bold shadow-md bg-red-200 p-2 my-3 text-center rounded-20 text-[13px] lg:text-lg font-normal text-secondary">Jika Pengajuan Surat di Ajukan Dengan Cap Basah
    dan Status Surat Sudah Selesai Silahkan Datang ke Desa</p>

@endcan
<div class="card">
    <div class="card-header bg-white py-3">
        <div class="row align-items-center py-2">
            <div class="col-md-6 py-2">
                <div class="input-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search">
                    <button type="button" id="searchButton" class="btn btn-submit border">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="w-full rounded-lg bg-white divide-y divide-gray overflow-x-auto">
            <table id="informasiTable" class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead class="themeColor text-center align-middle">
                    <tr>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">NO</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Tanggal</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Pembuat</th>
                        @canany(['petugas', 'admin','kesra','pelayanan','pemerintahan'])
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">No Telepon</th>
                        @endcanany
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Jenis Surat</th>
                          @canany(['masyarakat'])
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4 ">Catatan</th>
                          @endcanany
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4 ">Status</th>
                        @canany(['petugas', 'admin','kesra','pelayanan','pemerintahan'])
                        <th colspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Aksi</th>
                        @endcanany
                    </tr>
                    <tr>
                        @canany(['petugas', 'admin','kesra','pelayanan','pemerintahan'])
                        <th class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Lihat</th>
                        @endcanany
                        <th class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Unduh</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        @foreach ($pengajuan_saya as $item)
                        <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">
                            {{ $loop->iteration }}
                        </td>
                        <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">
                            {{ date('d F Y', strtotime($item->created_at)) }}
                        <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">
                            {{ $item->masyarakat->nama }}
                        </td>
                        @canany(['petugas', 'admin' , 'kesra','pemerintahan','pelayanan'])
                        <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">
                            {{ $item->masyarakat->telepon }}
                        </td>
                        @endcanany
                        <td class="textTable px-2 py-4 text-secondary whitespace-normal text-justify text-sm lg:text-base align-middle align-middle ">
                            {{ $item->jenis_surat }}
                        </td>
                        @canany(['masyarakat'])
                    <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">
                        {{ $item->catatan }}
                    </td>
                        @endcanany
                        <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">

                            @if ($item->status == 'Pending')
                            <span class="textTable text-dark text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-warning ">
                                Pending
                            </span>
                            @endif

                            @if ($item->status == 'verifikasi')
                            <span class="textTable text-white text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-orange ">
                                Sudah Terverifikasi
                            </span>
                            @endif
                            @if ($item->status == 'Diproses')
                            <span class="textTable text-white text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-orange ">
                                Sedang Diproses
                            </span>
                            @endif
                            @if ($item->status == 'Ditolak')
                            <span class="textTable text-white text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-danger ">
                                Ditolak
                            </span>
                            @endif
                            @if ($item->status == 'Selesai')
                            <span class="textTable text-white text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-success ">
                                Selesai
                            </span>
                            @endif
                            @if ($item->status == 'beres')
                            <span class="textTable text-white text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-success ">
                                Selesai
                            </span>
                            @endif

                        </td>
                        @canany(['petugas', 'admin' , 'kesra','pemerintahan','pelayanan'])
                         @if ($item->status == 'Pending' || $item->status == 'verifikasi' || $item->status == 'Diproses')
                        <td class="textTable px-2 py-4 text-secondary align-middle">
                            <div class="d-flex gap-3 justify-content-center align-items-center">
                                <a href="{{ route('pengajuan-surat.show', $item->id) }}" class="text-primary">
                                    <i class="bx bxs-pencil text-lg px-2"></i>
                                </a>
                            </div>
                        </td>
                        @endif
                        @endcanany
                        <td class="align-middle">
                            @canany(['admin', 'petugas'])
                            @if ($item->status == 'beres')
                            <a href="{{ route('pengajuan_surat.downloaded.surat', $item->id) }}" target="__blank" class="underline text-primary">
                            <i class="bx bx-import text-lg px-2"></i>
                            </a>
                            @endif
                            @endcanany
                            @can('masyarakat')
                            @if ($item->status == 'Selesai')
                            <a href="{{ route('pengajuan_surat.download.surat', $item->id) }}" target="__blank" class="underline text-primary">
                                <i class="bx bx-import text-lg px-2"></i>
                            </a>
                            @endif
                            @endcan

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#searchButton').on('click', function() {
                    var searchValue = $('#searchInput').val();

                    // AJAX request ke route pencarian dengan query pencarian
                    $.ajax({
                        url: '/data/Pengajuan-Surat/Search',
                        method: 'GET',
                        data: {
                            search: searchValue
                        },
                        success: function(response) {
                            // Bersihkan isi tabel sebelum menambahkan hasil pencarian
                            $('#informasiTable tbody').empty();

                            // Tambahkan baris baru berdasarkan hasil pencarian
                            $.each(response, function(index, item) {
                                var newRow = '<tr>' +
                                    '<td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle>' + item.id + '</td>' +

                                    '<td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle>' + formatDate(new Date(item.created_at)) + '</td>' +

                                    '<td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle>' + item.masyarakat.nama + '</td>';

                                // Tambahkan kolom No Telepon jika user memiliki hak akses tertentu
                                @canany(['petugas', 'admin', 'kesra', 'pelayanan', 'pemerintahan'])
                                newRow += '<td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle>' + item.masyarakat.telepon + '</td>';
                                @endcanany

                                newRow += '<td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle>' + item.jenis_surat + '</td>' +
                                    '<td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle>';

                                // Tambahkan status surat sesuai dengan kondisi
                                if (item.status == 'Pending') {
                                    newRow += '<span class="textTable text-dark text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-warning">Pending</span>';
                                } else if (item.status == 'verifikasi') {
                                    newRow += '<span class="textTable text-white text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-orange">sudah Terverifikasi</span>';
                                } else if (item.status == 'Diproses') {
                                    newRow += '<span class="textTable text-white text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-orange">Sedang Diproses</span>';
                                } else if (item.status == 'Ditolak') {
                                    newRow += '<span class="textTable text-white text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-danger">Ditolak</span>';
                                } else if (item.status == 'Selesai' || item.status == 'beres') {
                                    newRow += '<span class="textTable text-white text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-success">Selesai</span>';
                                }

                                newRow += '</td>';

                                // Tambahkan kolom Aksi jika user memiliki hak akses tertentu
                                @canany(['petugas', 'admin', 'kesra', 'pelayanan', 'pemerintahan'])
                                newRow += '<td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle>' +
                                    '<div class="d-flex gap-3 justify-content-center align-items-center">' +
                                    '<a href="pengajuan-surat/' + item.id + '" class="text-primary">' +
                                    '<i class="bx bxs-pencil text-lg px-2"></i>' +
                                    '</a>' +
                                    '</div>' +
                                    '</td>';
                                @endcanany

                                newRow += '<td class="align-middle">';

                                // Tambahkan tombol untuk preview atau unduh surat
                                @canany(['admin', 'petugas'])
                                if (item.status == 'beres') {
                                    newRow += '<a href="pengajuan-surat/' + item.id + '/downloaded" target="__blank" class="underline text-primary">Preview Surat</a>';
                                }
                                @endcanany

                                @can('masyarakat')
                                if (item.status == 'Selesai') {
                                    newRow += '<a href="pengajuan-surat/' + item.id + '/download" target="__blank" class="underline text-primary"><i class="bx bx-import text-lg px-2"></i></a>';
                                }
                                @endcan

                                newRow += '</td>' +
                                    '</tr>';

                                $('#informasiTable tbody').append(newRow);
                            });

                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
            });
        </script>

    </div>
</div>
@endsection