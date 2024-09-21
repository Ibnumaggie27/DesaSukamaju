@extends('templates/dashboard')

@section('content')

<div class="layoutWelcome bg-white py-4 px-9 mb-5 rounded-lg">
    <div class="row d-flex align-items-center">
        <div class="col-12">
            <h1 class="text-lg lg:text-2xl headDash fw-bolder mb-2">Data Ibu Hamil Penduduk Desa Palasari</h1>
            <p class="text-xs lg:text-base font-normal text-secondary">Semua data ibu hamil dari masyarakat Desa Palasari Kecamatan Cipanas</p>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/data/importibuhamil" method="POST" enctype="multipart/form-data">
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
                    <a href="/data/input-ibuhamil" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;"><i class="bx bxs-plus-circle"></i> Tambah Data</a>
                    <a href="#" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none ms-2" style="background-color: #b7efff;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Import Data
                    </a>
                </div>
            </div>
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
                <div id="btn__down_largeKependudukan" class="col-md-6 d-flex justify-content-end py-2">
                    <div class="layoutBtnPengaduan">
                        <a href="/data/input-ibuhamil" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;"><i class="bx bxs-plus-circle"></i> Tambah Data</a>
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
        <div class="w-full rounded-lg bg-white overflow-x-auto overflow-x-auto mb-5">

            <table id="pendudukTable" class="table table-bordered border w-full rounded-lg bg-white text-center overflow-hidden">
                <thead class="themeColor text-white text-center">
                    <tr>
                        <th rowspan="2" class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">No</th>
                        <th rowspan="2" class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">NIK</th>
                        <th rowspan="2" class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">Nama Lengkap</th>
                        <th colspan="2" class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">Aksi</th>
                    </tr>
                    <tr>

                        <th class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">Detail</th>
                        <th class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ibuhamil as $item)
                    <tr>
                        <td class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">{{ $item->id }}</td>
                        <td class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">{{ $item->NIK }}</td>
                        <td class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">{{ $item->namaLengkap }}</td>
                        <td class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">
                            <button class="text-primary text-center"  onclick="openDetailBlade('{{$url}}', '{{$item->id}}')">
                                <i class='bx bx-edit-alt'></i>
                            </button>
                        </td>
                        <td class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">
                            <button class="text-danger text-center" onclick="deleteConfirmation('{{$url}}', '{{$item->id}}', '{{$item->namaLengkap}}')">
                                <i class="bx bxs-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center m-4 p-4">
                {{ $ibuhamil->links() }}
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#searchButton').on('click', function() {
                        var searchValue = $('#searchInput').val();

                        // AJAX request to search route with search query
                        $.ajax({
                            url: '/data/ibuhamil/search', // Replace with your search route
                            method: 'GET',
                            data: {
                                search: searchValue
                            },
                            success: function(response) {
                                // Clear existing table rows
                                $('#pendudukTable tbody').empty();

                                // Append new table rows based on search results
                                $.each(response, function(index, item) {
                                    var newRow = '<tr>' +
                                        '<td class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">' + item.id + '</td>' +
                                        '<td class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">' + item.NIK + '</td>' +
                                        '<td class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">' + item.namaLengkap + '</td>' +
                                        '<td class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">' +
                                        '<button class="text-primary text-center" onclick="openDetailBlade(' + '\'{{ $url }}\', \'' + item.id + '\' )">' +
                                        '<i class="bx bx-edit-alt"></i>' +
                                        '</button>' +
                                        '</td>' +
                                        '<td class="textTabelTop  text-xs md:text-sm uppercase px-4 py-3 align-middle">' +
                                        '<button class="text-danger text-center" onclick="deleteConfirmation(' + '\'{{ $url }}\', \'' + item.id + '\', \'' + item.namaLengkap + '\' )">' +
                                        '<i class="bx bxs-trash" style="margin-left:10px;"></i>' +
                                        '</button>' +
                                        '</td>' +
                                        '</tr>';

                                    $('#pendudukTable tbody').append(newRow);
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
</div>

@endsection