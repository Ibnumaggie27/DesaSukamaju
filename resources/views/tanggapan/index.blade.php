@extends('templates/dashboard')
@section('content')
<div class="layoutWelcome bg-white py-4 px-9 mb-5 rounded-lg flex justify-between items-center">
    <div class="">
        <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">{{ $title }}</h1>
        <p class="text-sm lg:text-base lg:text-base font-normal text-secondary">Semua tanggapan yang sudah diberikan</p>
    </div>
       @can('petugas')
        <div class="layoutBtnPengaduan">
            <a href="/pengaduan/belum" class="btnPengaduan text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center text-decoration-none">Beri Tanggapan</a>
        </div>
        @endcan
</div>

<div class="card">
    <div class="card-header bg-white py-3">
        <div class="col-12">
            <div class="row align-items-center py-2">
                <div class="col-md-12 py-2">
                    <div class="input-group">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="w-full rounded-lg bg-white divide-y divide-gray overflow-x-auto">
            <table id="informasiTable" class="table table-bordered">
                <thead class="themeColor text-center align-middle">
                    <tr class="text-black text-left">
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">#</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Isi Laporan</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Tanggapan</th>
                        @cannot('petugas')
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Ditanggapi Oleh</th>
                        @endcannot
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4">Tanggal Ditanggapi</th>
                        <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4 text-center">Status</th>
                        <th colspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4 text-center">Aksi</th>
                    </tr>
                    <tr>
                        <th class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4 text-center">Lihat</th>
                        <th class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-4 text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray text-center">
                    @foreach ($tanggapan as $item)
                    <tr class="text-center align-middle">
                        <td class="textTable px-4 py-4 text-secondary">{{ $loop->iteration }}</td>
                        <td class="textTable px-4 py-4 text-secondary">{{ substr($item->pengaduan->isi_laporan,0,30) . '...' }}</td>
                        <td class="textTable px-4 py-4 text-secondary">{{ substr($item->tanggapan,0,40) . '...' }}</td>
                        @can('admin')
                        @if ($item->petugas)
                        <td class="textTable px-4 py-4">
                            <a class="openDetail text-danger cursor-pointer" data-nama="{{ $item->petugas->nama }}" data-username="{{ $item->petugas->username }}" data-telepon="{{ $item->petugas->telepon }}" data-level="{{ $item->petugas->level }}">
                                {{ $item->petugas->nama }}
                            </a>
                        </td>
                        @else
                        <td class="textTable px-4 py-4 text-secondary">-</td>
                        @endif
                        @endcan
                        <td class="textTable px-4 py-4 text-secondary">{{ date('d F Y', strtotime($item->created_at)) }}</td>
                        <td class="textTable px-4 py-4 text-center">
                            @if ($item->status == 'proses')
                            <span class="textTable text-dark text-sm lg:text-base w-1/3 py-2 font-semibold px-2 rounded-full bg-warning ">
                                Proses
                            </span>
                            @endif

                            @if ($item->status == '0')
                            <span class="textTable text-white text-sm lg:text-base w-1/3 py-2 font-semibold px-2 rounded-full bg-orange ">
                                Menunggu
                            </span>
                            @endif

                            @if ($item->status == 'selesai')
                            <span class="textTable text-white text-sm lg:text-base w-1/3 py-2 font-semibold px-2 rounded-full bg-success ">
                                Selesai
                            </span>
                            @endif
                        </td>
                        <td class="textTable px-4 py-4">
                            <a href="/pengaduan/{{ $item->pengaduan->id }}" class="text-primary"><i class="bx bxs-comment-dots text-lg"></i></a>
                        </td>
                        <td class="textTable px-4 py-4">
                            @can('petugas')
                            <button class="text-danger deleteTanggapan" data-id="{{ $item->id }}"><i class="bx bxs-trash text-lg"></i></button>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection