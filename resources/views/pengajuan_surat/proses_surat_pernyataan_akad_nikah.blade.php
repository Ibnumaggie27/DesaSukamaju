@extends('templates/dashboard')
@section('content')
@php
$surat = json_decode($pengajuan_surat->surat);
@endphp
<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-2xl text-center my-8">Proses Surat Pernyataan Akad Nikah</h1>
    <form action="{{ route('pengajuan-surat.update', $pengajuan_surat->id) }}" target="blank" method="POST" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf
        @method('PUT')


        <div class="flex flex-col lg:flex-row gap-5 justify-center">
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
        <h2 class="text-[20px] mb-10">Informasi Surat</h2>
        <div class="flex flex-col lg:flex-row gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                ">
                <h1 class="text-2xl text-center my-8">Form Isian untuk Pembuat Pernyataan</h1>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                    <input type="text" name="nama" class="mt-1 px-3 py-2 @error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama" value="{{ old('nama', $surat->nama) }}" readonly />
                    @error('nama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat & Tanggal Lahir</label>
                    <input type="text" name="ttl" class="mt-1 px-3 py-2 @error('ttl') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Cipanas, 20 Agustus 2000" value="{{ old('ttl', $surat->ttl) }}" readonly />
                    @error('ttl')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Pelapor</label>
                    <input type="text" name="status_pelapor" class="mt-1 px-3 py-2 @error('status_pelapor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Orang Tua Wali Nikah" value="{{ old('status_pelapor', $surat->status_pelapor) }}" readonly />
                    @error('status_pelapor')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pekerjaan </label>
                    <input type="text" name="pekerjaan" class="mt-1 px-3 py-2 @error('pekerjaan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Pekerjaan " value="{{ old('pekerjaan', $surat->pekerjaan) }}" readonly />
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
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Pembuat Surat Dalam Acara</label>
                    <div class="relative">
                        <select class="appearance-none px-3 py-2 @error('status') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="status">
                            <option value="">Pilih Jenis Status</option>
                            <option value="calon Suami" {{ $surat->status == 'calon Suami' ? 'selected' : '' }}>Calon Suami</option>
                            <option value="Calon Istri" {{ $surat->status == 'Calon Istri' ? 'selected' : '' }}>Calon Istri</option>
                            <option value="Wali Nikah" {{ $surat->status == 'Wali Nikah' ? 'selected' : '' }}>Wali Nikah</option>
                            <option value="Keluarga Lainnya" {{ $surat->status == 'Keluarga Lainnya' ? 'selected' : '' }}>Keluarga Lainnya</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class='bx bx-chevron-down text-xl'></i>
                        </div>
                    </div>
                    @error('status')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Apakah Sudah Mendaftar Di KUA?</label>
                    <input type="text" name="daftar_kua" class="mt-1 px-3 py-2 @error('daftar_kua') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Mendaftarkan" value="{{ old('daftar_kua', $surat->daftar_kua) }}" readonly />
                    @error('daftar_kua')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Hari Mendaftar</label>
                    <input type="text" name="hari_daftar" class="mt-1 px-3 py-2 @error('hari_daftar') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Hari" value="{{ old('hari_daftar', $surat->hari_daftar) }}" readonly />
                    @error('hari_daftar')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Mendaftar</label>
                    <input type="text" name="tanggal_daftar" class="mt-1 px-3 py-2 @error('tanggal_daftar') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal" value="{{ old('tanggal_daftar', $surat->tanggal_daftar) }}" readonly />
                    @error('tanggal_daftar')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Keperluan Surat</label>
                    <input type="text" name="keperluan" class="mt-1 px-3 py-2 @error('keperluan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="contoh : Akad Nikah" value="{{ old('keperluan', $surat->keperluan) }}" readonly />
                    @error('keperluan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm">
                <h1 class="text-2xl text-center my-8">Form Isian untuk Kedua Mempelai</h1>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Mempelai Wanita</label>
                    <input type="text" name="nama_wanita" class="mt-1 px-3 py-2 @error('nama_wanita') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama " value="{{ old('nama_wanita', $surat->nama_wanita) }}" readonly />
                    @error('nama_wanita')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Mempelai Pria</label>
                    <input type="text" name="nama_pria" class="mt-1 px-3 py-2 @error('nama_pria') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama" value="{{ old('nama_pria', $surat->nama_pria) }}" readonly />
                    @error('nama_pria')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:ml-0.5 after:text-danger">Acara Dilaksanakan Pada Hari dan Jam?</label>
                    <input type="text" name="waktu_acara" class="mt-1 px-3 py-2 @error('waktu_acara') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Rabu  waktu : Pukul /Jam : 09.00 WIB " value="{{ old('waktu_acara', $surat->waktu_acara) }}" readonly />
                    @error('waktu_acara')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:ml-0.5 after:text-danger">Tanggal Acara</label>
                    <input type="text" name="tanggal_acara" class="mt-1 px-3 py-2 @error('tanggal_acara') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Acara " value="{{ old('tanggal_acara', $surat->tanggal_acara) }}" readonly />
                    @error('tanggal_acara')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:ml-0.5 after:text-danger">Alamat Acara</label>
                    <input type="text" name="alamat_acara" class="mt-1 px-3 py-2 @error('alamat_acara') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat Acara " value="{{ old('alamat_acara', $surat->alamat_acara) }}" readonly />
                    @error('alamat_acara')
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