@extends('templates/dashboard')
@section('content')
    @php
        $surat = json_decode($pengajuan_surat->surat);
    @endphp
    <div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-2xl text-center my-8">Proses Surat Keterangan Perkawinan</h1>
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
                <h3>inputan untuk laki laki</h3><br>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Laki Laki</label>
                    <input type="text" name="nama_laki"
                        class="mt-1 px-3 py-2 @error('nama_laki') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Nama" value="{{ old('nama_laki', $surat->nama_laki) }}" readonly/>
                    @error('nama_laki')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat & Tanggal Lahir</label>
                    <input type="text" name="ttl"
                        class="mt-1 px-3 py-2 @error('ttl') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Contoh : Cipanas, 20 Agustus 2000" value="{{ old('ttl', $surat->ttl) }}" readonly/>
                    @error('ttl')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pekerjaan Laki Laki</label>
                    <input type="text" name="pekerjaan_laki"
                        class="mt-1 px-3 py-2 @error('pekerjaan_laki') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Pekerjaan Laki Laki" value="{{ old('pekerjaan_laki', $surat->pekerjaan_laki) }}" readonly/>
                    @error('pekerjaan_laki')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Warga Negara</label>
                    <input type="text" name="kewarganegaraan_laki"
                        class="mt-1 px-3 py-2 @error('kewarganegaraan_laki') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Warga Negara" value="{{ old('kewarganegaraan_laki', $surat->kewarganegaraan_laki) }}" readonly/>
                    @error('kewarganegaraan_laki')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat_laki"
                        class="mt-1 px-3 py-2 @error('alamat_laki') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Alamat" value="{{ old('alamat_laki', $surat->alamat_laki) }}" readonly/>
                    @error('alamat_laki')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                </div>
                <div
                    class="w-full
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm">
                <h3>inputan untuk perempuan</h3><br>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Perempuan</label>
                    <input type="text" name="nama_perempuan"
                        class="mt-1 px-3 py-2 @error('nama_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Nama" value="{{ old('nama_perempuan', $surat->nama_perempuan) }}" readonly/>
                    @error('nama_perempuan')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat & Tanggal Lahir</label>
                    <input type="text" name="ttl_perempuan"
                        class="mt-1 px-3 py-2 @error('ttl_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Contoh : Cipanas, 20 Agustus 2000" value="{{ old('ttl_perempuan', $surat->ttl_perempuan) }}" readonly/>
                    @error('ttl_perempuan')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pekerjaan Perempuan</label>
                    <input type="text" name="pekerjaan_perempuan"
                        class="mt-1 px-3 py-2 @error('pekerjaan_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Pekerjaan Perempuan" value="{{ old('pekerjaan_perempuan', $surat->pekerjaan_perempuan) }}" readonly/>
                    @error('pekerjaan_perempuan')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Warga Negara</label>
                    <input type="text" name="kewarganegaraan_perempuan"
                        class="mt-1 px-3 py-2 @error('kewarganegaraan_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Warga Negara" value="{{ old('kewarganegaraan_perempuan', $surat->kewarganegaraan_perempuan) }}" readonly/>
                    @error('kewarganegaraan_perempuan')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat_perempuan"
                        class="mt-1 px-3 py-2 @error('alamat_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Alamat" value="{{ old('alamat_perempuan', $surat->alamat_perempuan) }}" readonly/>
                    @error('alamat_perempuan')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Hari</label>
                    <small class="text-secondary">Input hari menikah</small>
                    <input type="text" name="hari_nikah"
                        class="mt-1 px-3 py-2 @error('hari_nikah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Hari" value="{{ old('hari_nikah', $surat->hari_nikah) }}" readonly/>
                    @error('hari_nikah')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal</label>
                    <small class="text-secondary">Input Tanggal Nikah</small>
                    <input type="text" name="tanggal_nikah"
                        class="mt-1 px-3 py-2 @error('tanggal_nikah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Tanggal" value="{{ old('tanggal_nikah', $surat->tanggal_nikah) }}"readonly/>
                    @error('tanggal_nikah')
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kepentingan Surat</label>
                    <input type="text" name="kepentingan"
                        class="mt-1 px-3 py-2 @error('kepentingan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        placeholder="Kepentingan Surat" value="{{ old('kepentingan', $surat->kepentingan) }}" readonly />
                    @error('kepentingan')
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
