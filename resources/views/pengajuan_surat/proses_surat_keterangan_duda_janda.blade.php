@extends('templates/dashboard')
@section('content')
    @php
        $surat = json_decode($pengajuan_surat->surat);
    @endphp
    <div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-2xl text-center my-8">Proses Surat Keterangan Duda Janda</h1>
    <form action="{{ route('pengajuan-surat.update', $pengajuan_surat->id) }}" target="blank" method="POST" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf
        @method('PUT')

            <div class="flex flex-col lg:flex-row gap-5 justify-center">
                <div
                    class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                ">
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Surat</label>
                        <small class="text-secondary">Contoh penulisan : 474.3 / 016 / I / 2022</small>
                        <input type="text" name="nomor_surat"
                            class="mt-1 px-3 py-2 @error('nomor_surat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Masukkan Nomor Surat" value="{{ $nomor_surat }}" required />
                        @error('nomor_surat')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div
                    class="w-full
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm">

                </div>
            </div>
            <h2 class="text-[20px] mb-10">Informasi Surat</h2>
            <div class="flex flex-col lg:flex-row gap-5 justify-center">
                <div
                    class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                    <input type="text" name="nama"
                        class="mt-1 px-3 py-2 @error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Nama" value="{{ old('nama', $surat->nama) }}" readonly/>
                    @error('nama')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor KK/NIK</label>
                    <input type="text" name="kk_nik"
                        class="mt-1 px-3 py-2 @error('kk_nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Nomor KK/NIK" value="{{ old('kk_nik', $surat->kk_nik) }}" readonly/>
                    @error('kk_nik')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat / Tgl. Lahir</label>
                    <input type="text" name="ttl"
                        class="mt-1 px-3 py-2 @error('ttl') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Tempat / Tgl. Lahir" value="{{ old('ttl', $surat->ttl) }}" readonly/>
                    @error('ttl')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                    <input type="text" name="jk"
                        class="mt-1 px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Jenis Kelamin" value="{{ old('jk', $surat->jk) }}" readonly/>
                    @error('jk')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input type="text" name="agama"
                        class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Agama" value="{{ old('agama', $surat->agama) }}" readonly/>
                    @error('agama')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                </div>
                <div
                    class="w-full
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Perkawinan</label>
                    <input type="text" name="status_perkawinan"
                        class="mt-1 px-3 py-2 @error('status_perkawinan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Status Perkawinan" value="{{ old('status_perkawinan', $surat->status_perkawinan) }}" readonly/>
                    @error('status_perkawinan')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Warga Negara</label>
                    <input type="text" name="kewarganegaraan"
                        class="mt-1 px-3 py-2 @error('kewarganegaraan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Warga Negara" value="{{ old('kewarganegaraan', $surat->kewarganegaraan) }}" readonly/>
                    @error('kewarganegaraan')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pekerjaan</label>
                    <input type="text" name="pekerjaan"
                        class="mt-1 px-3 py-2 @error('pekerjaan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Pekerjaan" value="{{ old('pekerjaan', $surat->pekerjaan) }}" readonly/>
                    @error('pekerjaan')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat"
                        class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Alamat" value="{{ old('alamat', $surat->alamat) }}" readonly/>
                    @error('alamat')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Keterangan Status Pernikahan</label>
                    <input type="text" name="keterangan_status"
                        class="mt-1 px-3 py-2 @error('keterangan_status') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Keterangan Status Pernikahan" value="{{ old('keterangan_status', $surat->keterangan_status) }}" readonly/>
                    @error('keterangan_status')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                </div>
            </div>


            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
            </div>
        </form>
    </div>
@endsection
