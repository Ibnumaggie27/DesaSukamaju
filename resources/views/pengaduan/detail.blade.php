@extends('templates/dashboard')
@section('content')
<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-lg lg:text-2xl headDash  font-bold mb-6">Detail Pengaduan</h1>
    <div class="d-flex flex-col lg:flex-row">
        <div class="w-full lg:w-1/2 grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div class="flex flex-col">
                <label for="nama_pimpinan" class="text-black after:content-['*'] after:ml-0.5 after:text-danger">Nama Pelapor</label>
                <input type="text" id="nama_pimpinan" name="nama_pimpinan" class="mt-1 px-3 py-2 border-gray-300 focus:outline-none focus:border-gray-400 focus:ring-gray-400 rounded-lg text-sm" value="{{ $pengaduan->masyarakat->nama }}" disabled />
            </div>
            <div class="flex flex-col">
                <label for="nama_pimpinan" class="text-black after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Laporan</label>
                <input type="text" id="nama_pimpinan" name="nama_pimpinan" class="mt-1 px-3 py-2 border-gray-300 focus:outline-none focus:border-gray-400 focus:ring-gray-400 rounded-lg text-sm" value="{{ date('d F Y     H:i', strtotime($pengaduan->created_at)) }}" disabled />
            </div>
            <div class="flex flex-col">
                <label for="nama_pimpinan" class="text-black after:content-['*'] after:ml-0.5 after:text-danger">Telepon</label>
                <input type="text" id="nama_pimpinan" name="nama_pimpinan" class="mt-1 px-3 py-2 border-gray-300 focus:outline-none focus:border-gray-400 focus:ring-gray-400 rounded-lg text-sm" value="{{ $pengaduan->masyarakat->telepon }}" disabled />
            </div>
            <div class="flex flex-col">
                <label for="nama_pimpinan" class="text-black after:content-['*'] after:ml-0.5 after:text-danger">Status</label>
                <span class="text-white text-sm w-1/3 p-2 text-center {{ $pengaduan->status == 'proses' ? 'bg-warning' : ''}} {{ $pengaduan->status == 'selesai' ? 'bg-success' : ''}} {{ $pengaduan->status == '0' ? 'bg-orange' : ''}} font-semibold px-2 rounded-full">{{ $pengaduan->status == '0' ? 'menunggu' : $pengaduan->status }}</span>
            </div>

            <div class="flex flex-col w-full lg:col-span-2">
                <label for="nama_pimpinan" class="text-black after:content-['*'] after:ml-0.5 after:text-danger mb-2">Isi Laporan</label>
                <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-sm text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $pengaduan->isi_laporan }}</textarea>
            </div>
        </div>
        <div class="w-full lg:w-1/2">
            <div class="mx-auto sm:w-2/3 lg:w-1/1 xl:w-1/1  text-center my-2">
                <label for="isi_laporan" class="after:content-['*'] after:ml-0.5 after:text-danger text-xs">Foto</label>
                <div class="rounded border">
                    <img src="{{ asset('storage/' . $pengaduan->lampiran) }}" alt="{{ $pengaduan->masyarakat->nama }}" class="w-full h-80 rounded previewImage object-contain">
                </div>
            </div>
        </div>
    </div>
</div>


@if(!$pengaduan->status == 0)

<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-lg lg:text-2xl headDash  font-semibold mb-6">Tanggapan</h1>
    <div class="d-flex flex-col lg:flex-row">
        <div class="w-full lg:w-1/1 grid grid-cols-1 lg:grid-cols-3 gap-4">
            @foreach ($pengaduan->tanggapan as $tanggapan)
            <div class="flex flex-col ">
                <label for="nama_pimpinan" class="text-black after:content-['*'] after:ml-0.5 after:text-danger">Nama Petugas</label>
                <input type="text" id="nama_pimpinan" name="nama_pimpinan" class="mt-1 px-3 py-2 border-gray-300 focus:outline-none focus:border-gray-400 focus:ring-gray-400 rounded-lg text-sm" value="{{ $tanggapan->petugas->nama }}" disabled />
            </div>
            <div class="flex flex-col ">
                <label for="nama_pimpinan" class="text-black after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Tanggapan</label>
                <input type="text" id="nama_pimpinan" name="nama_pimpinan" class="mt-1 px-3 py-2 border-gray-300 focus:outline-none focus:border-gray-400 focus:ring-gray-400 rounded-lg text-sm" value="{{ date('d F Y     H:i', strtotime($tanggapan->created_at)) }}" disabled />
            </div>
            <div class="flex flex-col ">
                <label for="nama_pimpinan" class="text-black after:content-['*'] after:ml-0.5 after:text-danger">Status</label>
                <span class="text-white text-sm w-1/4 p-2 text-center {{ $tanggapan->status == 'proses' ? 'bg-warning' : ''}} {{ $tanggapan->status == 'selesai' ? 'bg-success' : ''}} font-semibold px-2 rounded-full">{{  $tanggapan->status }}</span>
            </div>
            <div class="flex flex-col w-full lg:col-span-3">
                <label for="nama_pimpinan" class="text-black after:content-['*'] after:ml-0.5 after:text-danger mb-2">Isi Tanggapan</label>
                <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-sm text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $tanggapan->tanggapan }}</textarea>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

@if($pengaduan->status == 'proses' OR $pengaduan->status == 0)
@canany(['petugas'])
<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-lg lg:text-2xl headDash font-semibold mb-6">Tanggapan</h1>
    <form action="/pengaduan/respon/{{ $pengaduan->id }}" method="post" class="[&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark">
        @csrf
        @method('put')
        <div class="w-full mb-6">
            <label class="tracking-wide after:content-['*'] after:ml-0.5 after:text-danger" for="grid-state">Status</label>
            <div class="relative">
                <select class="appearance-none px-3 py-2 rounded-lg bg-white border shadow-sm @error('status') border-danger @else border-gray @enderror placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary" id="grid-state" name="status">
                    @if ($pengaduan->status == 'proses')
                    <option selected disabled>Pilih status</option>
                    <option value="selesai">Selesai</option>
                    @elseif($pengaduan->status == 'selesai')
                    <option selected disabled>Selesai</option>
                    <option value="proses">Proses</option>
                    @elseif($pengaduan->status == 0)
                    <option selected disabled>Belum ditanggapi</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                    @endif
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <i class='bx bx-chevron-down text-xl'></i>
                </div>
            </div>
            @error('status')
            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="tanggapan" class="after:content-['*'] after:ml-0.5 after:text-danger">Isi Tanggapan</label>
            <textarea id="tanggapan" name="tanggapan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-sm text-secondary bg-white rounded-lg border @error('tanggapan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" placeholder="Ketik tanggapan...">{{ old('tanggapan') }}</textarea>
            @error('tanggapan')
            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" class="themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
@endcanany
@endif


@endsection