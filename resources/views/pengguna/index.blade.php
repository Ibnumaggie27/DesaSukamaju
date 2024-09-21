@extends('templates/dashboard')
@section('content')
<div class="layoutWelcome bg-white p-4 mb-5 rounded-lg flex justify-between items-center">
    <div class="p-2">
        <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">{{ $title }}</h1>
        <p class="text-xs lg:text-base font-normal text-secondary">Total <span class="lowercase">{{ $title }}</span> yang
            terdaftar</p>
    </div>
    @if ($title == 'Data Petugas')
    <div class="layoutBtnPengaduan">
        <a href="/pengguna/create" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-xs lg:text-sm px-5 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;">Tambah Petugas</a>
    </div>

    @endif
</div>
<div class="tabel-container overflow-x-auto">
    <table class="w-full rounded-lg bg-white divide-y divide-gray overflow-hidden mb-5">
        <thead class="themeColor">
            <tr class="text-black text-center">
                <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-6 py-4">No</th>
                <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-6 py-4">Nama</th>
                <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-6 py-4">Nik</th>
                <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-6 py-4">Telepon </th>
                <th rowspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-6 py-4">Role</th>
                <th colspan="2" class="textTabelTop font-semibold text-sm lg:text-base uppercase px-6 py-4">Aksi</th>
            </tr>
            <tr class="text-center">
                <th class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-3 align-middle">Detail</th>
                <th class="textTabelTop font-semibold text-sm lg:text-base uppercase px-4 py-3 align-middle">Hapus</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray text-secondary text-center">
            @foreach ($users as $user)
            <tr class="text-center">
                <td class="textTable px-6 py-4 text-sm lg:text-base text-secondary">{{ $loop->iteration }}</td>
                <td class="textTable px-6 py-4 text-sm lg:text-base text-secondary">{{ $user->nama }}</td>
                <td class="textTable px-6 py-4 text-sm lg:text-base text-secondary">{{ $user->username }}</td>

                @if($user->telpon == NULL)
                <td class="textTable px-6 py-4 text-sm lg:text-base text-secondary fw-bold">-</td>
                @else
                <td class="textTable px-6 py-4 text-sm lg:text-base text-secondary">{{ $user->telepon }}</td>
                @endif

                <td class="textTable px-6 py-4 text-sm lg:text-base text-secondary">{{ $user->level }}</td>
                <td class="textTable px-6 py-4 text-sm lg:text-base text-secondary">
                    <button class="text-primary editPengguna" data-user="{{ $user }}"><i class='bx bx-edit-alt'></i></button></td>
                <td class="textTable px-6 py-4 text-sm lg:text-base text-secondary"> <button class="text-danger deletePengguna" data-id="{{ $user->id }}"><i class="bx bxs-trash"></i></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection