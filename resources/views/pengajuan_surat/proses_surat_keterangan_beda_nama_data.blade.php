@extends('templates/dashboard')
@section('content')
@php
$surat = json_decode($pengajuan_surat->surat);
@endphp
<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-2xl text-center my-8">Proses Surat Keterangan Pengantar</h1>
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
                <h3>Data yang tertulis di Kartu Keluarga</h3>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger"> No. KK</label>
                    <input type="text" name="kk" class="mt-1 px-3 py-2 @error('kk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Masukan Nomor KK" value="{{ old('kk', $surat->kk) }}" readonly />
                    @error('kk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Atas nama KK</label>
                    <input type="text" name="ankk" class="mt-1 px-3 py-2 @error('ankk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Atas nama KK" value="{{ old('ankk', $surat->ankk) }}" readonly />
                    @error('ankk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah Dari a.n KK</label>
                    <input type="text" name="ayahkk" class="mt-1 px-3 py-2 @error('ayahkk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ayah Dari a.n KK" value="{{ old('ayahkk', $surat->ayahkk) }}" readonly />
                    @error('ayahkk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu Dari a.n KK</label>
                    <input type="text" name="ibukk" class="mt-1 px-3 py-2 @error('ibukk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ibu Dari a.n KK" value="{{ old('ibukk', $surat->ibukk) }}" readonly />
                    @error('ibukk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                @for ($i = 1; $i <= 10; $i++) @if (isset($surat->{'nama' . $i}))
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                        <input type="text" name="nama{{ $i }}" class="mt-1 px-3 py-2 @error('nama' . $i) border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama" value="{{ old('nama' . $i, $surat->{'nama' . $i}) }}" readonly />
                        @error('nama' . $i)
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                        <input type="text" name="nama_ayah{{ $i }}" class="mt-1 px-3 py-2 @error('nama_ayah' . $i) border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Cipanas, 20 Agustus 2000" value="{{ old('nama_ayah' . $i, $surat->{'nama_ayah' . $i}) }}" readonly />
                        @error('ttl' . $i)
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                        <input type="text" name="nama_ibu{{ $i }}" class="mt-1 px-3 py-2 @error('nama_ibu' . $i) border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ibu" value="{{ old('nama_ibu' . $i, $surat->{'nama_ibu' . $i}) }}" readonly />
                        @error('nama_ibu' . $i)
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    @endif
                    @endfor
            </div>
            <div class="w-full
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm">
                <h3>input data yang ingin dibenarkan</h3>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Yang Tertulis di?</label>
                    <input type="text" name="data_benar" class="mt-1 px-3 py-2 @error('data_benar') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Buku Nikah" value="{{ old('data_benar', $surat->data_benar) }}" readonly />
                    @error('data_benar')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Atas Nama?</label>
                    <input type="text" name="atas_nama" class="mt-1 px-3 py-2 @error('atas_nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : jaenudin & Susi" value="{{ old('atas_nama', $surat->atas_nama) }}" readonly />
                    @error('atas_nama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">perbaikan data</label>
                    <input type="text" name="perbaikan_data" class="mt-1 px-3 py-2 @error('perbaikan_data') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Nama Ayah Burhanudin : MEMED" value="{{ old('perbaikan_data', $surat->perbaikan_data) }}" readonly />
                    @error('perbaikan_data')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                @for ($i = 1; $i <= 10; $i++) @if (isset($surat->{'perbaikan' . $i}))
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Perbaikan Data</label>
                        <input type="text" name="perbaikan{{ $i }}" class="mt-1 px-3 py-2 @error('perbaikan' . $i) border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Perbaikan Data" value="{{ old('perbaikan' . $i, $surat->{'perbaikan' . $i}) }}" readonly />
                        @error('perbaikan' . $i)
                        <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    @endif
                    @endfor
                    <div class="flex flex-col mb-6">
                        <label class="after:ml-0.5 after:text-danger">Keterangan</label>
                        <input type="text" name="keterangan" class="mt-1 px-3 py-2 @error('keterangan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Tertukar" value="{{ old('keterangan', $surat->keterangan) }}" readonly />
                        @error('keterangan')
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