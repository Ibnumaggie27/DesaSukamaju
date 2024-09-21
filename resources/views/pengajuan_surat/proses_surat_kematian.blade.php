@extends('templates/dashboard')
@section('content')
@php
$surat = json_decode($pengajuan_surat->surat);
@endphp
<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-2xl text-center my-8">Form Pengisian Surat Keterangan Kematian</h1>
    <form action="{{ route('pengajuan-surat.update', $pengajuan_surat->id) }}" method="POST" enctype="multipart/form-data" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf
        @method('PUT')



        <div class="flex my-12 flex-col lg:flex-row gap-5 justify-center">

            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Surat</label>
                    <small class="text-secondary">Contoh penulisan : 474.3 / 016 / I / 2022</small>
                    <input type="text" name="nomor_surat" class="mt-1 px-3 py-2 @error('nomor_surat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Masukkan Nomor Surat" value="{{ $nomor_surat }}" readonly/>
                    @error('nomor_surat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm">

            </div>
        </div>
        <input type="hidden" value="kematian" name="jenis_surat">
        <div class="flex flex-col lg:flex-row gap-5 justify-center">
            <div class="w-full 
                    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm
                    ">
                <h2 class="text-[20px] mb-10">Informasi Almarhum / mah</h2>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                    <input type="text" name="nama" class="mt-1 px-3 py-2 @error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama" value="{{ old('nama', $surat->nama) }}" readonly />
                    @error('nama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK</label>
                    <input type="text" name="nik" class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="NIK" value="{{ old('nik', $surat->nik) }}" readonly />
                    @error('nik')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kelamin</label>
                    <div class="relative">
                        <select class="appearance-none px-3 py-2 @error('kelamin') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="laki-laki" {{ $surat->kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki
                            </option>
                            <option value="perempuan" {{ $surat->kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class='bx bx-chevron-down text-xl'></i>
                        </div>
                    </div>
                    @error('kelamin')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Umur</label>
                    <input type="text" name="umur" class="mt-1 px-3 py-2 @error('umur') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Umur" value="{{ old('umur', $surat->umur) }}" readonly />
                    @error('umur')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="mt-1 px-3 py-2 @error('pekerjaan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Pekerjaan" value="{{ old('pekerjaan', $surat->pekerjaan) }}" readonly />
                    @error('pekerjaan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat" value="{{ old('alamat', $surat->alamat) }}" readonly />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Hari Meninggal</label>
                    <input type="text" name="hari_meninggal" class="mt-1 px-3 py-2 @error('hari_meninggal') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Hari Meninggal" value="{{ old('hari_meninggal', $surat->hari_meninggal) }}" readonly />
                    @error('hari_meninggal')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Meninggal</label>
                    <input type="text" name="tanggal_meninggal" class="mt-1 px-3 py-2 @error('tanggal_meninggal') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Meninggal" value="{{ old('tanggal_meninggal', $surat->tanggal_meninggal) }}" readonly />
                    @error('tanggal_meninggal')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Meninggal Di?</label>
                    <input type="text" name="tempat_meninggal" class="mt-1 px-3 py-2 @error('tempat_meninggal') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Meninggal Di?" value="{{ old('tempat_meninggal', $surat->tempat_meninggal) }}" readonly />
                    @error('tempat_meninggal')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Meninggal Karena?</label>
                    <input type="text" name="meninggal_karena" class="mt-1 px-3 py-2 @error('meninggal_karena') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Meninggal Karena?" value="{{ old('meninggal_karena', $surat->meninggal_karena) }}" readonly />
                    @error('meninggal_karena')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="w-full
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm">
                <h2 class="text-[20px] mb-10">Informasi Pelapor</h2>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama pelapor</label>
                    <input type="text" name="nama_pelapor" class="mt-1 px-3 py-2 @error('nama_pelapor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama pelapor" value="{{ old('nama_pelapor', $surat->nama_pelapor) }}" readonly />
                    @error('nama_pelapor')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK pelapor</label>
                    <input type="number" name="nik_pelapor" class="mt-1 px-3 py-2 @error('nik_pelapor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="NIK pelapor" value="{{ old('nik_pelapor', $surat->nik_pelapor) }}" readonly />
                    @error('nik_pelapor')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Hubungan Pelapor dengan
                        Almarhum / Almarhumah</label>
                    <input type="text" name="hub_pelapor_almarhum" class="mt-1 px-3 py-2 @error('hub_pelapor_almarhum') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Hubungan pelapor dengan almarhum/almarhumah" value="{{ old('hub_pelapor_almarhum', $surat->hub_pelapor_almarhum) }}" readonly />
                    @error('hub_pelapor_almarhum')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:ml-0.5 after:text-danger">Pesan</label>
                    <small class="text-secondary">Pastikan sampaikan pesan kepada admin/petugas dengan jelas
                        untuk mempercepat pembuatan surat</small>
                    <textarea id="keterangan" name="pesan" rows="4" class="px-3 py-2 focus:outline-none @error('pesan') border-danger @else border-gray @enderror focus:border-gray focus:ring-gray" placeholder="Masukkan pesan surat atau pesan anda kepada petugas.">{{ old('pesan', $pengajuan_surat->pesan) }}</textarea>
                    @error('pesan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>


        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
@endsection