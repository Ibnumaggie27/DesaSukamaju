@extends('templates/dashboard')
@section('content')
<div class="bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
    <h1 class="text-2xl text-center my-8">Form Pengisian Surat Keterangan Numpang Nikah</h1>
    <form action="{{ route('pengajuan-surat.store') }}" method="POST" enctype="multipart/form-data" class=" mt-5
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf

        <input type="hidden" value="keterangan Numpang Nikah" name="jenis_surat">
        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap dan Alias</label>
                    <input type="text" name="nama" class="mt-1 px-3 py-2 @error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap dan Alias" value="{{ old('nama') }}" />
                    @error('nama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Bin/Binti</label>
                    <input type="text" name="bin" class="mt-1 px-3 py-2 @error('bin') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Bin/binti" value="{{ old('bin') }}" />
                    @error('bin')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK</label>
                    <input type="text" name="nik" maxlength="16" pattern="\d*"
                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="NIK" value="{{ old('nik') }}" />
                    @error('nik')
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
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kewarganegaraan</label>
                    <div class="relative">
                        <select class="appearance-none px-3 py-2 @error('kewarganegaraan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="kewarganegaraan">
                            <option value="">Pilih Kewarganegaraan</option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class='bx bx-chevron-down text-xl'></i>
                        </div>
                    </div>
                    @error('kewarganegaraan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <div class="relative">
                        <select class="appearance-none px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="agama">
                            <option value="">Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class='bx bx-chevron-down text-xl'></i>
                        </div>
                    </div>
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Perkawinan</label>
                    <div class="relative">
                        <select class="appearance-none px-3 py-2 @error('status_pernikahan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="status_pernikahan">
                            <option value="">Pilih Status Pernikahan</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin Belum Tercatat">Kawin Belum Tercatat</option>
                            <option value="Kawin Tercatat">Kawin Tercatat</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class='bx bx-chevron-down text-xl'></i>
                        </div>
                    </div>
                    @error('status_pernikahan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="mt-1 px-3 py-2 @error('pekerjaan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Pekerjaan" value="{{ old('pekerjaan') }}" />
                    @error('pekerjaan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Tinggal</label>
                    <input type="text" name="tempat_tinggal" class="mt-1 px-3 py-2 @error('tempat_tinggal') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Tinggal" value="{{ old('tempat_tinggal') }}" />
                    @error('tempat_tinggal')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap dan Alias</label>
                    <input type="text" name="nama_perempuan" class="mt-1 px-3 py-2 @error('nama_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap dan Alias" value="{{ old('nama_perempuan') }}" />
                    @error('nama_perempuan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Bin/Binti</label>
                    <input type="text" name="bin_perempuan" class="mt-1 px-3 py-2 @error('bin_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Bin/binti" value="{{ old('bin_perempuan') }}" />
                    @error('bin_perempuan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK</label>
                    <input type="text" name="nik_perempuan" maxlength="16" pattern="\d*"
                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="mt-1 px-3 py-2 @error('nik_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="NIK" value="{{ old('nik_perempuan') }}" />
                    @error('nik_perempuan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat & Tanggal Lahir</label>
                    <input type="text" name="ttl_perempuan" class="mt-1 px-3 py-2 @error('ttl_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Cipanas, 20 Agustus 2000" value="{{ old('ttl_perempuan') }}" />
                    @error('ttl_perempuan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kewarganegaraan</label>
                    <div class="relative">
                        <select class="appearance-none px-3 py-2 @error('kewarganegaraan_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="kewarganegaraan_perempuan">
                            <option value="">Pilih Kewarganegaraan</option>
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class='bx bx-chevron-down text-xl'></i>
                        </div>
                    </div>
                    @error('kewarganegaraan_perempuan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <div class="relative">
                        <select class="appearance-none px-3 py-2 @error('agama_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="agama_perempuan">
                            <option value="">Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class='bx bx-chevron-down text-xl'></i>
                        </div>
                    </div>
                    @error('agama_perempuan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Perkawinan</label>
                    <div class="relative">
                        <select class="appearance-none px-3 py-2 @error('status_pernikahan_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="status_pernikahan_perempuan">
                            <option value="">Pilih Status Perkawinan</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin Belum Tercatat">Kawin Belum Tercatat</option>
                            <option value="Kawin Tercatat">Kawin Tercatat</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class='bx bx-chevron-down text-xl'></i>
                        </div>
                    </div>
                    @error('status_pernikahan_perempuan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pekerjaan</label>
                    <input type="text" name="pekerjaan_perempuan" class="mt-1 px-3 py-2 @error('pekerjaan_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Pekerjaan" value="{{ old('pekerjaan_perempuan') }}" />
                    @error('pekerjaan_perempuan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Tinggal</label>
                    <input type="text" name="tempat_tinggal_perempuan" class="mt-1 px-3 py-2 @error('tempat_tinggal_perempuan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Tinggal" value="{{ old('tempat_tinggal_perempuan') }}" />
                    @error('tempat_tinggal_perempuan')
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