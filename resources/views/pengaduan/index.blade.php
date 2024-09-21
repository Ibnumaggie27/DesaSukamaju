@extends('templates/dashboard')
@section('content')
<div class="layoutWelcome bg-white p-4 mb-5 rounded-lg flex justify-between items-center">
    <div class="p-2">
        <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">{{ $title }}</h1>
        <p class="text-xs lg:text-base font-normal text-secondary">Semua pengaduan yang masuk</p>
    </div>
    @can('masyarakat')
    <div class="layoutBtnPengaduan">
        <a href="/pengaduan/create" class="btnPengaduan text-black themeColor focus:outline-none font-medium rounded-lg text-xs lg:text-sm px-5 py-2.5 text-center text-decoration-none">Buat Pengaduan</a>
    </div>

    @endcan
</div>
<div class="card">
    <div class="card-header bg-white py-3">
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
     <div class="card-body">
        <div class="w-full rounded-lg bg-white divide-y divide-gray overflow-x-auto">
            <table id="informasiTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="themeColor text-center align-middle">
                    <tr class="text-center">
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">No</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Tanggal</th>
                        @canany(['petugas', 'admin'])
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Pelapor</th>
                        @endcanany
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Isi Laporan</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4 text-center">Status</th>
                        @canany('masyarakat')
                        <th colspan="3" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4 text-center">aksi</th>
                        @endcanany

                    </tr>
                    <tr>
                        <th class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Lihat</th>
                        @can('masyarakat')
                        <th class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">hapus</th>
                        <th class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">ubah</th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($pengaduan as $aduan)
                    <tr>
                        <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">{{ $loop->iteration }}</td>
                        <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">{{ date('d F Y', strtotime($aduan->created_at)) }}</td>
                        @canany(['petugas', 'admin'])
                        <td class="textTable px-4 py-4">
                            @if ($aduan->masyarakat)
                            <a class="openDetail text-secondary text-sm lg:text-base cursor-pointer" data-nama="{{ $aduan->masyarakat->nama }}" data-telepon="{{ $aduan->masyarakat->telepon }}" data-level="{{ $aduan->masyarakat->level }}">
                                {{ $aduan->masyarakat->nama }}
                            </a>
                            @else
                            <p>-</p>
                            @endif
                        </td>
                        @endcanany
                        <td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">{{ substr($aduan->isi_laporan, 0, 70) . '...' }}</td>
                        <td class="textTable px-4 py-4 text-center">
                            @if ($aduan->status == 'proses')
                            <span class="textTable text-dark text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-warning ">
                                Proses
                            </span>
                            @endif

                            @if ($aduan->status == '0')
                            <span class="textTable text-dark text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-orange ">
                                Menunggu
                            </span>
                            @endif

                            @if ($aduan->status == 'selesai')
                            <span class="textTable text-white text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-success ">
                                Selesai
                            </span>
                            @endif
                        </td>
                        <td class="textTable px-4 py-4 ">
                            <a href="/pengaduan/{{ $aduan->id }}" class="text-primary" style="margin-left:10px;">
                                <i class="bx bxs-comment-dots text-lg"></i>
                            </a>
                        </td>
                        @can('masyarakat')
                        <td class="textTable px-4 py-4">
                            @if ($aduan->status !== 'proses')
                            <button class="text-danger deletePengaduan" data-id="{{ $aduan->id }}">
                                <i class="bx bxs-trash text-lg"></i>
                            </button>
                            @endif
                        </td>
                        <td class="textTable px-4 py-4 ">
                            @if ($aduan->status == '0')
                            <a href="/pengaduan/{{ $aduan->id }}/edit" class="text-warning">
                                <i class="bx bxs-pencil text-lg"></i>
                            </a>
                            @endif

                        </td>
                        @endcan
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
                        url: '/data/Pengaduan/Search',
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
                                    '<td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">' + item.id + '</td>' +
                                    '<td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">' + formatDate(new Date(item.created_at)) + '</td>';

                                @canany(['petugas', 'admin'])
                                newRow += '<td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">';
                                newRow += '<a class="openDetail text-danger cursor-pointer" data-nama="' + item.masyarakat.nama + '" data-telepon="' + item.masyarakat.telepon + '" data-level="' + item.masyarakat.level + '">' + item.masyarakat.nama + '</a>';
                                newRow += '</td>';
                                @endcanany


                                // Tambahkan kolom isi laporan
                                newRow += '<td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">' + item.isi_laporan.substr(0, 70) + '...' + '</td>';
                                newRow += '<td class="textTable px-2 py-4 text-secondary text-sm lg:text-base align-middle align-middle">';

                                // Tambahkan status surat sesuai dengan kondisi
                                if (item.status == 'proses') {
                                    newRow += '<span class="textTable text-dark text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-warning">Proses</span>';
                                } else if (item.status == '0') {
                                    newRow += '<span class="textTable text-dark text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-orange">Menunggu</span>';
                                } else if (item.status == 'selesai') {
                                    newRow += '<span class="textTable text-white text-xs w-1/3 py-2 font-semibold px-2 rounded-full bg-success">Selesai</span>';
                                }

                                newRow += '</td>';

                                newRow += '<td class="textTable px-4 py-4 ">' +
                                    '<a href = "/pengaduan/{{ $pengaduan}}"class = "text-primary" style = "margin-left:10px;">' +
                                    '<i class = "bx bxs-comment-dots text-lg" > </i>' +
                                    '</a>' +
                                    '</td>';

                                @can('masyarakat')
                                newRow += '<td class="align-middle textTable px-4 py-4">';
                                if (item.status == 'beres') {
                                    newRow += '<button class="text-danger deletePengaduan" data-id="' + item.id + '"><i class="bx bxs-trash text-lg"></i></button>';
                                }
                                newRow += '</td>';

                                newRow += '<td class="align-middle textTable px-4 py-4">';
                                if (item.status == 'beres') {
                                    newRow += '<a href="/pengaduan/' + item.id + '/edit" class="text-warning"><i class="bx bxs-pencil text-lg"></i></a>';
                                }
                                newRow += '</td>';
                                @endcan

                                newRow += '</tr>';

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