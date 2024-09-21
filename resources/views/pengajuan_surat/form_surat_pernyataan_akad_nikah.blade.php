@extends('templates/dashboard')
@section('content')
<div class="bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
    <h1 class="text-2xl text-center my-8">Form Pengisian Surat Pernyataan Akad Nikah</h1>
    <form action="{{ route('pengajuan-surat.store') }}" method="POST" enctype="multipart/form-data" class=" mt-5
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf

        <input type="hidden" value="Pernyataan Akad Nikah" name="jenis_surat">
        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                <h1 class="text-2xl text-center my-8">Form Isian untuk Pembuat Pernyataan</h1>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                    <input type="text" name="nama" class="mt-1 px-3 py-2 @error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama" value="{{ old('nama') }}" />
                    @error('nama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat & Tanggal Lahir</label>
                    <input type="text" name="ttl" class="mt-1 px-3 py-2 @error('ttl') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Cipanas, 20 Agustus 2000" value="{{ old('ttl') }}" />
                    @error('ttl')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Pelapor</label>
                    <input type="text" name="status_pelapor" class="mt-1 px-3 py-2 @error('status_pelapor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Orang Tua Wali Nikah" value="{{ old('status_pelapor') }}" />
                    @error('status_pelapor')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pekerjaan </label>
                    <input type="text" name="pekerjaan" class="mt-1 px-3 py-2 @error('pekerjaan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Pekerjaan " value="{{ old('pekerjaan') }}" />
                    @error('pekerjaan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat" value="{{ old('alamat') }}" />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Pembuat Surat Dalam Acara</label>
                    <div class="relative">
                        <select class="appearance-none px-3 py-2 @error('status') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="status">
                            <option value="">Pilih Status</option>
                            <option value="calon Suami">calon Suami</option>
                            <option value="Calon Istri">Calon Istri</option>
                            <option value="Wali Nikah">wali Nikah</option>
                            <option value="Keluarga Lainnya">Keluarga Lainnya</option>
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
                    <input type="text" name="daftar_kua" class="mt-1 px-3 py-2 @error('daftar_kua') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Mendaftarkan" value="{{ old('daftar_kua') }}" />
                    @error('daftar_kua')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Hari Mendaftar</label>
                    <input type="text" name="hari_daftar" class="mt-1 px-3 py-2 @error('hari_daftar') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Hari" value="{{ old('hari_daftar') }}" />
                    @error('hari_daftar')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Mendaftar</label>
                    <input type="text" name="tanggal_daftar" class="mt-1 px-3 py-2 @error('tanggal_daftar') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal" value="{{ old('tanggal_daftar') }}" />
                    @error('tanggal_daftar')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Keperluan Surat</label>
                    <input type="text" name="keperluan" class="mt-1 px-3 py-2 @error('keperluan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="contoh : Akad Nikah" value="{{ old('keperluan') }}" />
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
                    <input type="text" name="nama_wanita" class="mt-1 px-3 py-2 @error('nama_wanita') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama " value="{{ old('nama_wanita') }}" />
                    @error('nama_wanita')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Mempelai Pria</label>
                    <input type="text" name="nama_pria" class="mt-1 px-3 py-2 @error('nama_pria') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama" value="{{ old('nama_pria') }}" />
                    @error('nama_pria')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:ml-0.5 after:text-danger">Acara Dilaksanakan Pada Hari dan Jam?</label>
                    <input type="text" name="waktu_acara" class="mt-1 px-3 py-2 @error('waktu_acara') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Rabu  waktu : Pukul /Jam : 09.00 WIB " value="{{ old('waktu_acara') }}" />
                    @error('waktu_acara')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:ml-0.5 after:text-danger">Tanggal Acara</label>
                    <input type="text" name="tanggal_acara" class="mt-1 px-3 py-2 @error('tanggal_acara') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Acara " value="{{ old('tanggal_acara') }}" />
                    @error('tanggal_acara')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:ml-0.5 after:text-danger">Alamat Acara</label>
                    <input type="text" name="alamat_acara" class="mt-1 px-3 py-2 @error('alamat_acara') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat Acara " value="{{ old('alamat_acara') }}" />
                    @error('alamat_acara')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Foto surat Pengantar RT</label>
                    <input type="file" name="fotoketeranganrt" class="mt-1 px-3 py-2 @error('fotoketeranganrt') border-danger @else border-gray @enderror ocus:outline-none focus:border-gray focus:ring-gray focus:ring-1 form-control" accept="image/*" />
                    @error('fotoketeranganrt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Foto KTP</label>
                    <input type="file" name="fotoktp" class="mt-1 px-3 py-2 @error('fotoktp') border-danger @else border-gray @enderror ocus:outline-none focus:border-gray focus:ring-gray focus:ring-1 form-control" accept="image/*" />
                    @error('fotoktp')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Foto KK</label>
                    <input type="file" name="fotokk" class="mt-1 px-3 py-2 @error('fotokk') border-danger @else border-gray @enderror ocus:outline-none focus:border-gray focus:ring-gray focus:ring-1 form-control" accept="image/*" />
                    @error('fotokk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Keperluan Tanda Tangan</label>
                        <div class="relative">
                            <select
                            class="appearance-none px-3 py-2 @error('kttd') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            id="grid-state" name="kttd">
                            <option value="">Pilih Jenis Tanda Tangan</option>
                            @can('petugas')
                                <option value="basah">Tanda Tangan & Cap Basah</option>
                            @elsecan('masyarakat')
                                <option value="basah">Tanda Tangan & Cap Basah</option>
                                <option value="barcode">Tanda Tangan Barcode</option>
                            @endcan
                        </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <i class='bx bx-chevron-down text-xl'></i>
                            </div>
                        </div>
                        @error('kttd')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
        <div class="w-full mb-6">
            <label class="after:ml-0.5 after:text-danger">Pesan</label>
            <small class="text-secondary">Masukan Keperluan Atau Kepentingan Surat</small>
            <textarea id="keterangan" name="pesan" rows="4" class="px-3 py-2 focus:outline-none @error('pesan') border-danger @else border-gray @enderror focus:border-gray focus:ring-gray" placeholder="Masukkan pesan surat atau pesan anda kepada petugas.">{{ old('pesan') }}</textarea>
            @error('pesan')
            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
@endsection