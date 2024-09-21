@extends('templates/dashboard')
@section('content')

@if ($title == 'Input Kependudukan')
<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-3xl text-center mb-5">Form Pengisian Data Kependudukan</h1>
    <form action="{{ route('data.store') }}" method="POST" enctype="multipart/form-data" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf

        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor KK</label>
                    <input type="text" name="noKK" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="mt-1 px-3 py-2 @error('noKK') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nomor KK" value="{{ old('noKK') }}" />
                    @error('noKK')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap" value="{{ old('namaLengkap') }}" />
                    @error('namaLengkap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                    <input type="text" name="NIK" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="mt-1 px-3 py-2 @error('NIK') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nomor Induk Kependudukan" value="{{ old('NIK') }}" />
                    @error('NIK')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                    <select name="jk" class="mt-1 px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1">
                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                        <option value="0" {{ old('jk') == '0' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="1" {{ old('jk') == '1' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>  
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Lahir" value="{{ old('tempatLahir') }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input type="date" name="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Lahir" value="{{ old('tanggalLahir') }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <select name="agama" class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1">
                        <option value="" selected disabled>Pilih Agama</option>
                        <option value="0" {{ old('agama') == '0' ? 'selected' : '' }}>Islam</option>
                        <option value="1" {{ old('agama') == '1' ? 'selected' : '' }}>Kristen</option>
                        <option value="2" {{ old('agama') == '2' ? 'selected' : '' }}>Hindu</option>
                        <option value="3" {{ old('agama') == '3' ? 'selected' : '' }}>Buddha</option>
                        <option value="4" {{ old('agama') == '4' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>  
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pendidikan</label>
                    <input type="text" name="pendidikan" class="mt-1 px-3 py-2 @error('pendidikan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Pendidikan" value="{{ old('pendidikan') }}" />
                    @error('pendidikan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Pekerjaan</label>
                    <input type="text" name="jenisPekerjaan" class="mt-1 px-3 py-2 @error('jenisPekerjaan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Jenis Pekerjaan" value="{{ old('jenisPekerjaan') }}" />
                    @error('jenisPekerjaan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Golongan Darah</label>
                    <select name="goldar" class="mt-1 px-3 py-2 @error('goldar') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1">
                        <option value="" selected disabled>Pilih Golongan Darah</option>
                        <option value="0" {{ old('goldar') == '0' ? 'selected' : '' }}>A</option>
                        <option value="1" {{ old('goldar') == '1' ? 'selected' : '' }}>B</option>
                        <option value="2" {{ old('goldar') == '2' ? 'selected' : '' }}>AB</option>
                        <option value="3" {{ old('goldar') == '3' ? 'selected' : '' }}>O</option>
                    </select>
                    @error('goldar')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div> 
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Perkawinan</label>
                    <select name="statusPerkawinan" class="mt-1 px-3 py-2 @error('statusPerkawinan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1">
                        <option value="" selected disabled>Pilih Status Perkawinan</option>
                        <option value="0" {{ old('statusPerkawinan') == '0' ? 'selected' : '' }}>Belum Kawin</option>
                        <option value="1" {{ old('statusPerkawinan') == '1' ? 'selected' : '' }}>Kawin</option>
                        <option value="2" {{ old('statusPerkawinan') == '2' ? 'selected' : '' }}>Cerai Hidup</option>
                        <option value="3" {{ old('statusPerkawinan') == '3' ? 'selected' : '' }}>Cerai Mati</option>
                    </select>
                    @error('statusPerkawinan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div> 
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Perkawinan</label>
                    <input type="date" name="tanggalPerkawinan" class="mt-1 px-3 py-2 @error('tanggalPerkawinan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Perkawinan" value="{{ old('tanggalPerkawinan') }}" />
                    @error('tanggalPerkawinan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Hubungan</label>
                    <input type="text" name="statusHubungan" class="mt-1 px-3 py-2 @error('statusHubungan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Status Hubungan" value="{{ old('statusHubungan') }}" />
                    @error('statusHubungan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kewarganegaraan</label>
                    <select name="kewarganegaraan" class="mt-1 px-3 py-2 @error('kewarganegaraan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1">
                        <option value="" selected disabled>Pilih Kewarganegaraan</option>
                        <option value="0" {{ old('kewarganegaraan') == '0' ? 'selected' : '' }}>WNI</option>
                        <option value="1" {{ old('kewarganegaraan') == '1' ? 'selected' : '' }}>WNA</option>
                    </select>
                    @error('kewarganegaraan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div> 
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Paspor</label>
                    <input type="text" name="noPaspor" class="mt-1 px-3 py-2 @error('noPaspor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nomor Paspor" value="{{ old('noPaspor') }}" />
                    @error('noPaspor')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Kitap</label>
                    <input type="text" name="noKitap" class="mt-1 px-3 py-2 @error('noKitap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nomor Kitap" value="{{ old('noKitap') }}" />
                    @error('noKitap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input type="text" name="namaAyah" class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="nama Ayah" value="{{ old('namaAyah') }}" />
                    @error('namaAyah')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input type="text" name="namaIbu" class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="nama Ibu" value="{{ old('namaIbu') }}" />
                    @error('namaIbu')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input type="text" name="namaKepalaKeluarga" class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Kepala Keluarga" value="{{ old('namaKepalaKeluarga') }}" />
                    @error('namaKepalaKeluarga')
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
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">RT</label>
                    <input type="text" name="rt" class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rt" value="{{ old('rt') }}" />
                    @error('rt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">RW</label>
                    <input type="text" name="rw" class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="RW" value="{{ old('rw') }}" />
                    @error('rw')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input type="text" name="kodePos" class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kode Pos" value="{{ old('kodePos') }}" />
                    @error('kodePos')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input type="text" name="desa" class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Desa" value="{{ old('desa') }}" />
                    @error('desa')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input type="text" name="kecamatan" class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kecamatan" value="{{ old('kecamatan') }}" />
                    @error('kecamatan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input type="text" name="kabupaten" class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kabupaten" value="{{ old('kabupaten') }}" />
                    @error('kabupaten')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input type="text" name="provinsi" class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Provinsi" value="{{ old('provinsi') }}" />
                    @error('provinsi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Di Keluarkan</label>
                    <input type="date" name="tanggalDikeluarkan" class="mt-1 px-3 py-2 @error('tanggalDikeluarkan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Di Keluarkan" value="{{ old('tanggalDikeluarkan') }}" />
                    @error('tanggalDikeluarkan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Type Penduduk</label>
                    <select name="tipePenduduk" class="mt-1 px-3 py-2 @error('tipePenduduk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1">
                        <option value="" selected disabled>Pilih Tipe Penduduk</option>
                        <option value="0" {{ old('tipePenduduk') == '0' ? 'selected' : '' }}>Baik</option>
                        <option value="1" {{ old('tipePenduduk') == '1' ? 'selected' : '' }}>Tidak Baik</option>
                    </select>
                    @error('tipePenduduk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div> 
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status NIK</label>
                    <select name="statusNik" class="mt-1 px-3 py-2 @error('statusNik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1">
                        <option value="" selected disabled>Pilih Tipe Penduduk</option>
                        <option value="0" {{ old('statusNik') == '0' ? 'selected' : '' }}>Aktif</option>
                        <option value="1" {{ old('statusNik') == '1' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                    @error('statusNik')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div> 
            </div>
        </div>

        <br>
        <br>


        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
@endif

@if ($title == 'Input Kematian')
<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-3xl text-center mb-5">Form Pengisian Data Kematian</h1>
    <form action="{{ route('data.kirim') }}" method="POST" enctype="multipart/form-data" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf


        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">
                <div class="row align-items-center justify-content-center py-2 my-5">
                    <div class="col-md-6 py-2 bg-white">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                        <div class="input-group">
                            <input type="text" name="nikCari" id="NIKInput" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control" placeholder="Cari Nomor Induk Penduduk">
                            <button type="button" id="getDataButton" class="btn btn-submit border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                    <input type="text" name="NIK" id="NIK" class="mt-1 px-3 py-2 @error('NIK') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nomor Induk Kependudukan" readonly />
                    @error('NIK')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror

                </div>

                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap" readonly />
                    @error('namaLengkap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" id="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Tanggal Lahir" readonly />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input type="text" name="tanggalLahir" id="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Tanggal Lahir" readonly />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Kematian</label>
                    <input type="text" name="tempatKematian" class="mt-1 px-3 py-2 @error('tempatKematian') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Tanggal Kematian" />
                    @error('tempatKematian')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Kematian</label>
                    <input type="date" name="tanggalKematian" class="mt-1 px-3 py-2 @error('tanggalKematian') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Tanggal Kematian" />
                    @error('tanggalKematian')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Pelapor</label>
                    <input type="text" name="namaPelapor" class="mt-1 px-3 py-2 @error('namaPelapor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Pelapor" />
                    @error('namaPelapor')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK Pelapor</label>
                    <input type="text" name="nikPelapor" class="mt-1 px-3 py-2 @error('nikPelapor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nomor Induk Kependudukan Pelapor" />
                    @error('nikPelapor')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor yang dapat di hubungi</label>
                    <input type="text" name="noDapatDihubungi" class="mt-1 px-3 py-2 @error('noDapatDihubungi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nomor yang Dapat di Hubungi" />
                    @error('noDapatDihubungi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#getDataButton').click(function() {
            let NIK_CARI = $('#NIKInput').val();

            // Make an AJAX request to fetch data based on NIK
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/get-data-by-nik/${NIK_CARI}`,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#NIK').val(response.NIK);
                        $('#namaLengkap').val(response.namaLengkap);
                        $('#tempatLahir').val(response.tempatLahir);
                        $('#tanggalLahir').val(response.tanggalLahir);
                        // Add similar lines for other input fields
                    } else {
                        console.error('No data found for the provided NIK.');
                    }
                }


            });
        });
    });
</script>
@endif

@if ($title == 'Input Kelahiran')
<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-3xl text-center mb-5">Form Pengisian Data Kelahiran</h1>
    <form action="{{ route('data.kirimKelahiran') }}" method="POST" enctype="multipart/form-data" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf

        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor KK</label>
                    <input type="text" name="noKK" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="mt-1 px-3 py-2 @error('noKK') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nomor KK" value="{{ old('noKK') }}" />
                    @error('noKK')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                    <input type="text" name="nik" id="NIK" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nomor Induk Kependudukan" />
                    @error('NIK')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap" />
                    @error('namaLengkap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                    <input type="text" name="jk" class="mt-1 px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Jenis Kelamin" value="{{ old('jk') }}" />
                    @error('jk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Lahir" value="{{ old('tempatLahir') }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input type="date" name="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Lahir" value="{{ old('tanggalLahir') }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input type="text" name="agama" class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Agama" value="{{ old('agama') }}" />
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input type="text" name="namaAyah" class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ayah" value="{{ old('namaAyah') }}" />
                    @error('namaAyah')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input type="text" name="namaIbu" class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ibu" value="{{ old('namaIbu') }}" />
                    @error('namaIbu')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input type="text" name="namaKepalaKeluarga" class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Kepala Keluarga" value="{{ old('namaKepalaKeluarga') }}" />
                    @error('namaKepalaKelurga')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full 
        [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
        [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
        ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat" value="{{ old('alamat') }}" />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">RT</label>
                    <input type="text" name="rt" class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="RT" value="{{ old('rt') }}" />
                    @error('rt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">RW</label>
                    <input type="text" name="rw" class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="RW" value="{{ old('rw') }}" />
                    @error('rw')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input type="text" name="kodePos" class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kode Pos" value="{{ old('kodePos') }}" />
                    @error('kodePos')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" class="mt-1 px-3 py-2 @error('kewarganegaraan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kewarganegaraan" value="{{ old('kewarganegaraan') }}" />
                    @error('kewarganegaraan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input type="text" name="desa" class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Desa" value="{{ old('desa') }}" />
                    @error('desa')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input type="text" name="kecamatan" class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kecamatan" value="{{ old('kecamatan') }}" />
                    @error('kecamatan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input type="text" name="kabupaten" class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kabupaten" value="{{ old('kabupaten') }}" />
                    @error('kabupaten')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input type="text" name="provinsi" class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Provinsi" value="{{ old('provinsi') }}" />
                    @error('provinsi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#getDataButton').click(function() {
            let NIK_CARI = $('#NIKInput').val();

            // Make an AJAX request to fetch data based on NIK
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/get-data-by-nik/${NIK_CARI}`,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#NIK').val(response.NIK);
                        $('#namaLengkap').val(response.namaLengkap);
                        // Add similar lines for other input fields
                    } else {
                        console.error('No data found for the provided NIK.');
                    }
                }


            });
        });
    });
</script>
@endif

@if ($title == 'Input miskin')

<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-3xl text-center mb-5">Form Pengisian Data Masyarakat Miskin</h1>
    <form action="{{ route('data.kirimMasyarakatMiskin') }}" method="POST" enctype="multipart/form-data" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf


        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">
                <div class="row align-items-center justify-content-center py-2 my-5">
                    <div class="col-md-6 py-2 bg-white">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                        <div class="input-group">
                            <input type="text" name="nikCari" id="NIKInput" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control" placeholder="Cari Nomor Induk Penduduk">
                            <button type="button" id="getDataButton" class="btn btn-submit border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

               <div class="flex flex-col mb-6">
                    <!-- Pesan Kesalahan atau Sukses -->
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                
                    @if (session('berhasil'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('berhasil') }}
                        </div>
                    @endif
                
                    <!-- Form Input NIK -->
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                    <input type="text" name="nik" id="NIK" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" 
                    placeholder="Nomor Induk Kependudukan" 
                    value="{{ old('nik') }}" 
                />
                    @error('nik')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap" />
                    @error('namaLengkap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                    <input type="text" name="jk" id="jk" class="mt-1 px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Jenis Kelamin" value="{{ old('jk') }}" />
                    @error('jk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" id="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Lahir" value="{{ old('tempatLahir') }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input type="text" name="tanggalLahir" id="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Lahir" value="{{ old('tanggalLahir') }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input type="text" name="agama" id="agama" class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Agama" value="{{ old('agama') }}" />
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input type="text" name="namaAyah" id="namaAyah" class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ayah" value="{{ old('namaAyah') }}" />
                    @error('namaAyah')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input type="text" name="namaIbu" id="namaIbu" class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ibu" value="{{ old('namaIbu') }}" />
                    @error('namaIbu')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input type="text" name="namaKepalaKeluarga" id="namaKepalaKeluarga" class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Kepala Keluarga" value="{{ old('namaKepalaKeluarga') }}" />
                    @error('namaKepalaKeluarga')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat" value="{{ old('alamat') }}" />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rt</label>
                    <input type="text" name="rt" id="rt" class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rt" value="{{ old('rt') }}" />
                    @error('rt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rw</label>
                    <input type="text" name="rw" id="rw" class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rw" value="{{ old('rw') }}" />
                    @error('rw')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input type="text" name="kodePos" id="kodePos" class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kode Pos" value="{{ old('kodePos') }}" />
                    @error('kodePos')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input type="text" name="desa" id="desa" class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Desa" value="{{ old('desa') }}" />
                    @error('desa')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kecamatan" value="{{ old('kecamatan') }}" />
                    @error('kecamatan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kabupaten" value="{{ old('kabupaten') }}" />
                    @error('kabupaten')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Provinsi" value="{{ old('provinsi') }}" />
                    @error('provinsi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#getDataButton').click(function() {
            let NIK_CARI = $('#NIKInput').val();

            // Make an AJAX request to fetch data based on NIK
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/get-data-by-nik/${NIK_CARI}`,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#NIK').val(response.NIK);
                        $('#namaLengkap').val(response.namaLengkap);
                        $('#jk').val(response.jk);
                        $('#tempatLahir').val(response.tempatLahir);
                        $('#tanggalLahir').val(response.tanggalLahir);
                        $('#agama').val(response.agama);
                        $('#namaAyah').val(response.namaAyah);
                        $('#namaIbu').val(response.namaIbu);
                        $('#namaKepalaKeluarga').val(response.namaKepalaKeluarga);
                        $('#alamat').val(response.alamat);
                        $('#rt').val(response.rt);
                        $('#rw').val(response.rw);
                        $('#kodePos').val(response.kodePos);
                        $('#desa').val(response.desa);
                        $('#kecamatan').val(response.kecamatan);
                        $('#kabupaten').val(response.kabupaten);
                        $('#provinsi').val(response.provinsi);
                        // Add similar lines for other input fields
                    } else {
                        console.error('No data found for the provided NIK.');
                    }
                }


            });
        });
    });
</script>
@endif

@if ($title == 'Input ibu_hamil')

<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-3xl text-center mb-5">Form Pengisian Data Ibu Hamil</h1>
    <form action="{{ route('data.kirimIbuHamil') }}" method="POST" enctype="multipart/form-data" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf


        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">

                <div class="row align-items-center justify-content-center py-2 my-5">
                    <div class="col-md-6 py-2 bg-white">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                        <div class="input-group">
                            <input type="text" name="nikCari" id="NIKInput" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control" placeholder="Cari Nomor Induk Penduduk">
                            <button type="button" id="getDataButton" class="btn btn-submit border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mb-6">
                    <!-- Pesan Kesalahan atau Sukses -->
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                
                    @if (session('berhasil'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('berhasil') }}
                        </div>
                    @endif
                
                    <!-- Form Input NIK -->
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                    <input type="text" name="nik" id="NIK" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" 
                    placeholder="Nomor Induk Kependudukan" 
                    value="{{ old('nik') }}" 
                readonly/>
                    @error('nik')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap" />
                    @error('namaLengkap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                    <input type="text" name="jk" id="jk" class="mt-1 px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Jenis Kelamin" value="{{ old('jk') }}" />
                    @error('jk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" id="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Lahir" value="{{ old('tempatLahir') }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input type="text" name="tanggalLahir" id="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Lahir" value="{{ old('tanggalLahir') }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input type="text" name="agama" id="agama" class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Agama" value="{{ old('agama') }}" />
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input type="text" name="namaAyah" id="namaAyah" class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ayah" value="{{ old('namaAyah') }}" />
                    @error('namaAyah')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input type="text" name="namaIbu" id="namaIbu" class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ibu" value="{{ old('namaIbu') }}" />
                    @error('namaIbu')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input type="text" name="namaKepalaKeluarga" id="namaKepalaKeluarga" class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Kepala Keluarga" value="{{ old('namaKepalaKeluarga') }}" />
                    @error('namaKepalaKeluarga')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat" value="{{ old('alamat') }}" />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rt</label>
                    <input type="text" name="rt" id="rt" class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rt" value="{{ old('rt') }}" />
                    @error('rt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rw</label>
                    <input type="text" name="rw" id="rw" class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rw" value="{{ old('rw') }}" />
                    @error('rw')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input type="text" name="kodePos" id="kodePos" class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kode Pos" value="{{ old('kodePos') }}" />
                    @error('kodePos')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input type="text" name="desa" id="desa" class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Desa" value="{{ old('desa') }}" />
                    @error('desa')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kecamatan" value="{{ old('kecamatan') }}" />
                    @error('kecamatan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kabupaten" value="{{ old('kabupaten') }}" />
                    @error('kabupaten')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Provinsi" value="{{ old('provinsi') }}" />
                    @error('provinsi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#getDataButton').click(function() {
            let NIK_CARI = $('#NIKInput').val();

            // Make an AJAX request to fetch data based on NIK
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/get-data-by-nik/${NIK_CARI}`,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#NIK').val(response.NIK);
                        $('#namaLengkap').val(response.namaLengkap);
                        $('#jk').val(response.jk);
                        $('#tempatLahir').val(response.tempatLahir);
                        $('#tanggalLahir').val(response.tanggalLahir);
                        $('#agama').val(response.agama);
                        $('#namaAyah').val(response.namaAyah);
                        $('#namaIbu').val(response.namaIbu);
                        $('#namaKepalaKeluarga').val(response.namaKepalaKeluarga);
                        $('#alamat').val(response.alamat);
                        $('#rt').val(response.rt);
                        $('#rw').val(response.rw);
                        $('#kodePos').val(response.kodePos);
                        $('#desa').val(response.desa);
                        $('#kecamatan').val(response.kecamatan);
                        $('#kabupaten').val(response.kabupaten);
                        $('#provinsi').val(response.provinsi);
                        // Add similar lines for other input fields
                    } else {
                        console.error('No data found for the provided NIK.');
                    }
                }


            });
        });
    });
</script>
@endif

@if ($title == 'Input bayi')

<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-3xl text-center mb-5">Form Pengisian Data Bayi 1 Sampai 5 Tahun</h1>
    <form action="{{ route('data.kirimbayi1sampai5tahun') }}" method="POST" enctype="multipart/form-data" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf


        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">

                <div class="row align-items-center justify-content-center py-2 my-5">
                    <div class="col-md-6 py-2 bg-white">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                        <div class="input-group">
                            <input type="text" name="nikCari" id="NIKInput" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control" placeholder="Cari Nomor Induk Penduduk">
                            <button type="button" id="getDataButton" class="btn btn-submit border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mb-6">
                    <!-- Pesan Kesalahan atau Sukses -->
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                
                    @if (session('berhasil'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('berhasil') }}
                        </div>
                    @endif
                
                    <!-- Form Input NIK -->
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                    <input type="text" name="nik" id="NIK" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" 
                    placeholder="Nomor Induk Kependudukan" 
                    value="{{ old('nik') }}" 
                readonly/>
                    @error('nik')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap" />
                    @error('namaLengkap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                    <input type="text" name="jk" id="jk" class="mt-1 px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Jenis Kelamin" value="{{ old('jk') }}" />
                    @error('jk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" id="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Lahir" value="{{ old('tempatLahir') }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input type="text" name="tanggalLahir" id="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Lahir" value="{{ old('tanggalLahir') }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input type="text" name="agama" id="agama" class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Agama" value="{{ old('agama') }}" />
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input type="text" name="namaAyah" id="namaAyah" class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ayah" value="{{ old('namaAyah') }}" />
                    @error('namaAyah')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input type="text" name="namaIbu" id="namaIbu" class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ibu" value="{{ old('namaIbu') }}" />
                    @error('namaIbu')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input type="text" name="namaKepalaKeluarga" id="namaKepalaKeluarga" class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Kepala Keluarga" value="{{ old('namaKepalaKeluarga') }}" />
                    @error('namaKepalaKeluarga')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat" value="{{ old('alamat') }}" />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rt</label>
                    <input type="text" name="rt" id="rt" class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rt" value="{{ old('rt') }}" />
                    @error('rt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rw</label>
                    <input type="text" name="rw" id="rw" class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rw" value="{{ old('rw') }}" />
                    @error('rw')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input type="text" name="kodePos" id="kodePos" class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kode Pos" value="{{ old('kodePos') }}" />
                    @error('kodePos')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input type="text" name="desa" id="desa" class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Desa" value="{{ old('desa') }}" />
                    @error('desa')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kecamatan" value="{{ old('kecamatan') }}" />
                    @error('kecamatan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kabupaten" value="{{ old('kabupaten') }}" />
                    @error('kabupaten')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Provinsi" value="{{ old('provinsi') }}" />
                    @error('provinsi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#getDataButton').click(function() {
            let NIK_CARI = $('#NIKInput').val();

            // Make an AJAX request to fetch data based on NIK
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/get-data-by-nik/${NIK_CARI}`,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#NIK').val(response.NIK);
                        $('#namaLengkap').val(response.namaLengkap);
                        $('#jk').val(response.jk);
                        $('#tempatLahir').val(response.tempatLahir);
                        $('#tanggalLahir').val(response.tanggalLahir);
                        $('#agama').val(response.agama);
                        $('#namaAyah').val(response.namaAyah);
                        $('#namaIbu').val(response.namaIbu);
                        $('#namaKepalaKeluarga').val(response.namaKepalaKeluarga);
                        $('#alamat').val(response.alamat);
                        $('#rt').val(response.rt);
                        $('#rw').val(response.rw);
                        $('#kodePos').val(response.kodePos);
                        $('#desa').val(response.desa);
                        $('#kecamatan').val(response.kecamatan);
                        $('#kabupaten').val(response.kabupaten);
                        $('#provinsi').val(response.provinsi);
                        // Add similar lines for other input fields
                    } else {
                        console.error('No data found for the provided NIK.');
                    }
                }


            });
        });
    });
</script>
@endif

@if ($title == 'Input yatim')

<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-3xl text-center mb-5">Form Pengisian Data Anak Yatim</h1>
    <form action="{{ route('data.kirimanakyatim') }}" method="POST" enctype="multipart/form-data" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf


        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">
                <div class="row align-items-center justify-content-center py-2 my-5">
                    <div class="col-md-6 py-2 bg-white">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                        <div class="input-group">
                            <input type="text" name="nikCari" id="NIKInput" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control" placeholder="Cari Nomor Induk Penduduk">
                            <button type="button" id="getDataButton" class="btn btn-submit border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mb-6">
                    <!-- Pesan Kesalahan atau Sukses -->
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                
                    @if (session('berhasil'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('berhasil') }}
                        </div>
                    @endif
                
                    <!-- Form Input NIK -->
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                    <input type="text" name="nik" id="NIK" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" 
                    placeholder="Nomor Induk Kependudukan" 
                    value="{{ old('nik') }}" 
                readonly/>
                    @error('nik')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap" />
                    @error('namaLengkap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                    <input type="text" name="jk" id="jk" class="mt-1 px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Jenis Kelamin" value="{{ old('jk') }}" />
                    @error('jk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" id="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Lahir" value="{{ old('tempatLahir') }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input type="text" name="tanggalLahir" id="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Lahir" value="{{ old('tanggalLahir') }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input type="text" name="agama" id="agama" class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Agama" value="{{ old('agama') }}" />
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input type="text" name="namaAyah" id="namaAyah" class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ayah" value="{{ old('namaAyah') }}" />
                    @error('namaAyah')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input type="text" name="namaIbu" id="namaIbu" class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ibu" value="{{ old('namaIbu') }}" />
                    @error('namaIbu')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input type="text" name="namaKepalaKeluarga" id="namaKepalaKeluarga" class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Kepala Keluarga" value="{{ old('namaKepalaKeluarga') }}" />
                    @error('namaKepalaKeluarga')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat" value="{{ old('alamat') }}" />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rt</label>
                    <input type="text" name="rt" id="rt" class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rt" value="{{ old('rt') }}" />
                    @error('rt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rw</label>
                    <input type="text" name="rw" id="rw" class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rw" value="{{ old('rw') }}" />
                    @error('rw')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input type="text" name="kodePos" id="kodePos" class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kode Pos" value="{{ old('kodePos') }}" />
                    @error('kodePos')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input type="text" name="desa" id="desa" class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Desa" value="{{ old('desa') }}" />
                    @error('desa')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kecamatan" value="{{ old('kecamatan') }}" />
                    @error('kecamatan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kabupaten" value="{{ old('kabupaten') }}" />
                    @error('kabupaten')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Provinsi" value="{{ old('provinsi') }}" />
                    @error('provinsi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#getDataButton').click(function() {
            let NIK_CARI = $('#NIKInput').val();

            // Make an AJAX request to fetch data based on NIK
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/get-data-by-nik/${NIK_CARI}`,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#NIK').val(response.NIK);
                        $('#namaLengkap').val(response.namaLengkap);
                        $('#jk').val(response.jk);
                        $('#tempatLahir').val(response.tempatLahir);
                        $('#tanggalLahir').val(response.tanggalLahir);
                        $('#agama').val(response.agama);
                        $('#namaAyah').val(response.namaAyah);
                        $('#namaIbu').val(response.namaIbu);
                        $('#namaKepalaKeluarga').val(response.namaKepalaKeluarga);
                        $('#alamat').val(response.alamat);
                        $('#rt').val(response.rt);
                        $('#rw').val(response.rw);
                        $('#kodePos').val(response.kodePos);
                        $('#desa').val(response.desa);
                        $('#kecamatan').val(response.kecamatan);
                        $('#kabupaten').val(response.kabupaten);
                        $('#provinsi').val(response.provinsi);
                        // Add similar lines for other input fields
                    } else {
                        console.error('No data found for the provided NIK.');
                    }
                }


            });
        });
    });
</script>
@endif

@if ($title == 'Input pkh')

<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-3xl text-center mb-5">Form Pengisian Data Program Keluarga Harapan</h1>
    <form action="{{ route('data.kirimpkh') }}" method="POST" enctype="multipart/form-data" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf


        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">

                <div class="row align-items-center justify-content-center py-2 my-5">
                    <div class="col-md-6 py-2 bg-white">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                        <div class="input-group">
                            <input type="text" name="nikCari" id="NIKInput" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control" placeholder="Cari Nomor Induk Penduduk">
                            <button type="button" id="getDataButton" class="btn btn-submit border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mb-6">
                    <!-- Pesan Kesalahan atau Sukses -->
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                
                    @if (session('berhasil'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('berhasil') }}
                        </div>
                    @endif
                
                    <!-- Form Input NIK -->
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                    <input type="text" name="nik" id="NIK" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" 
                    placeholder="Nomor Induk Kependudukan" 
                    value="{{ old('nik') }}" 
                readonly/>
                    @error('nik')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap" />
                    @error('namaLengkap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                    <input type="text" name="jk" id="jk" class="mt-1 px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Jenis Kelamin" value="{{ old('jk') }}" />
                    @error('jk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" id="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Lahir" value="{{ old('tempatLahir') }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input type="text" name="tanggalLahir" id="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Lahir" value="{{ old('tanggalLahir') }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input type="text" name="agama" id="agama" class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Agama" value="{{ old('agama') }}" />
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input type="text" name="namaAyah" id="namaAyah" class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ayah" value="{{ old('namaAyah') }}" />
                    @error('namaAyah')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input type="text" name="namaIbu" id="namaIbu" class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ibu" value="{{ old('namaIbu') }}" />
                    @error('namaIbu')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input type="text" name="namaKepalaKeluarga" id="namaKepalaKeluarga" class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Kepala Keluarga" value="{{ old('namaKepalaKeluarga') }}" />
                    @error('namaKepalaKeluarga')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat" value="{{ old('alamat') }}" />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rt</label>
                    <input type="text" name="rt" id="rt" class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rt" value="{{ old('rt') }}" />
                    @error('rt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rw</label>
                    <input type="text" name="rw" id="rw" class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rw" value="{{ old('rw') }}" />
                    @error('rw')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input type="text" name="kodePos" id="kodePos" class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kode Pos" value="{{ old('kodePos') }}" />
                    @error('kodePos')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input type="text" name="desa" id="desa" class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Desa" value="{{ old('desa') }}" />
                    @error('desa')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kecamatan" value="{{ old('kecamatan') }}" />
                    @error('kecamatan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kabupaten" value="{{ old('kabupaten') }}" />
                    @error('kabupaten')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Provinsi" value="{{ old('provinsi') }}" />
                    @error('provinsi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#getDataButton').click(function() {
            let NIK_CARI = $('#NIKInput').val();

            // Make an AJAX request to fetch data based on NIK
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/get-data-by-nik/${NIK_CARI}`,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#NIK').val(response.NIK);
                        $('#namaLengkap').val(response.namaLengkap);
                        $('#jk').val(response.jk);
                        $('#tempatLahir').val(response.tempatLahir);
                        $('#tanggalLahir').val(response.tanggalLahir);
                        $('#agama').val(response.agama);
                        $('#namaAyah').val(response.namaAyah);
                        $('#namaIbu').val(response.namaIbu);
                        $('#namaKepalaKeluarga').val(response.namaKepalaKeluarga);
                        $('#alamat').val(response.alamat);
                        $('#rt').val(response.rt);
                        $('#rw').val(response.rw);
                        $('#kodePos').val(response.kodePos);
                        $('#desa').val(response.desa);
                        $('#kecamatan').val(response.kecamatan);
                        $('#kabupaten').val(response.kabupaten);
                        $('#provinsi').val(response.provinsi);
                        // Add similar lines for other input fields
                    } else {
                        console.error('No data found for the provided NIK.');
                    }
                }


            });
        });
    });
</script>
@endif

@if ($title == 'Input bansos')

<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-3xl text-center mb-5">Form Pengisian Data Bantuan Sosial</h1>
    <form action="{{ route('data.kirimabansos') }}" method="POST" enctype="multipart/form-data" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf


        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">

                <div class="row align-items-center justify-content-center py-2 my-5">
                    <div class="col-md-6 py-2 bg-white">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                        <div class="input-group">
                            <input type="text" name="nikCari" id="NIKInput" class="form-control" placeholder="Cari Nomor Induk Penduduk">
                            <button type="button" id="getDataButton" class="btn btn-submit border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                    <input type="text" name="nik" id="NIK" class="mt-1 px-3 py-2 @error('NIK') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nomor Induk Kependudukan" readonly />
                    @error('NIK')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror

                </div>

                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap" />
                    @error('namaLengkap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                    <input type="text" name="jk" id="jk" class="mt-1 px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Jenis Kelamin" value="{{ old('jk') }}" />
                    @error('jk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" id="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Lahir" value="{{ old('tempatLahir') }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input type="text" name="tanggalLahir" id="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Lahir" value="{{ old('tanggalLahir') }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input type="text" name="agama" id="agama" class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Agama" value="{{ old('agama') }}" />
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input type="text" name="namaAyah" id="namaAyah" class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ayah" value="{{ old('namaAyah') }}" />
                    @error('namaAyah')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input type="text" name="namaIbu" id="namaIbu" class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ibu" value="{{ old('namaIbu') }}" />
                    @error('namaIbu')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input type="text" name="namaKepalaKeluarga" id="namaKepalaKeluarga" class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Kepala Keluarga" value="{{ old('namaKepalaKeluarga') }}" />
                    @error('namaKepalaKeluarga')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat" value="{{ old('alamat') }}" />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rt</label>
                    <input type="text" name="rt" id="rt" class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rt" value="{{ old('rt') }}" />
                    @error('rt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rw</label>
                    <input type="text" name="rw" id="rw" class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rw" value="{{ old('rw') }}" />
                    @error('rw')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input type="text" name="kodePos" id="kodePos" class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kode Pos" value="{{ old('kodePos') }}" />
                    @error('kodePos')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input type="text" name="desa" id="desa" class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Desa" value="{{ old('desa') }}" />
                    @error('desa')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kecamatan" value="{{ old('kecamatan') }}" />
                    @error('kecamatan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kabupaten" value="{{ old('kabupaten') }}" />
                    @error('kabupaten')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Provinsi" value="{{ old('provinsi') }}" />
                    @error('provinsi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#getDataButton').click(function() {
            let NIK_CARI = $('#NIKInput').val();

            // Make an AJAX request to fetch data based on NIK
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/get-data-by-nik/${NIK_CARI}`,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#NIK').val(response.NIK);
                        $('#namaLengkap').val(response.namaLengkap);
                        $('#jk').val(response.jk);
                        $('#tempatLahir').val(response.tempatLahir);
                        $('#tanggalLahir').val(response.tanggalLahir);
                        $('#agama').val(response.agama);
                        $('#namaAyah').val(response.namaAyah);
                        $('#namaIbu').val(response.namaIbu);
                        $('#namaKepalaKeluarga').val(response.namaKepalaKeluarga);
                        $('#alamat').val(response.alamat);
                        $('#rt').val(response.rt);
                        $('#rw').val(response.rw);
                        $('#kodePos').val(response.kodePos);
                        $('#desa').val(response.desa);
                        $('#kecamatan').val(response.kecamatan);
                        $('#kabupaten').val(response.kabupaten);
                        $('#provinsi').val(response.provinsi);
                        // Add similar lines for other input fields
                    } else {
                        console.error('No data found for the provided NIK.');
                    }
                }


            });
        });
    });
</script>
@endif

@if ($title == 'Input bpn')

<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-3xl text-center mb-5">Form Pengisian Data Bantuan Pangan Non Tunai</h1>
    <form action="{{ route('data.kirimbpn') }}" method="POST" enctype="multipart/form-data" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf


        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">

                <div class="row align-items-center justify-content-center py-2 my-5">
                    <div class="col-md-6 py-2 bg-white">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                        <div class="input-group">
                            <input type="text" name="nikCari" id="NIKInput" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control" placeholder="Cari Nomor Induk Penduduk">
                            <button type="button" id="getDataButton" class="btn btn-submit border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mb-6">
                    <!-- Pesan Kesalahan atau Sukses -->
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                
                    @if (session('berhasil'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('berhasil') }}
                        </div>
                    @endif
                
                    <!-- Form Input NIK -->
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                    <input type="text" name="nik" id="NIK" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" 
                    placeholder="Nomor Induk Kependudukan" 
                    value="{{ old('nik') }}" 
                readonly/>
                    @error('nik')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap" />
                    @error('namaLengkap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                    <input type="text" name="jk" id="jk" class="mt-1 px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Jenis Kelamin" value="{{ old('jk') }}" />
                    @error('jk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" id="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Lahir" value="{{ old('tempatLahir') }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input type="text" name="tanggalLahir" id="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Lahir" value="{{ old('tanggalLahir') }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input type="text" name="agama" id="agama" class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Agama" value="{{ old('agama') }}" />
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input type="text" name="namaAyah" id="namaAyah" class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ayah" value="{{ old('namaAyah') }}" />
                    @error('namaAyah')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input type="text" name="namaIbu" id="namaIbu" class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ibu" value="{{ old('namaIbu') }}" />
                    @error('namaIbu')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input type="text" name="namaKepalaKeluarga" id="namaKepalaKeluarga" class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Kepala Keluarga" value="{{ old('namaKepalaKeluarga') }}" />
                    @error('namaKepalaKeluarga')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat" value="{{ old('alamat') }}" />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rt</label>
                    <input type="text" name="rt" id="rt" class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rt" value="{{ old('rt') }}" />
                    @error('rt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rw</label>
                    <input type="text" name="rw" id="rw" class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rw" value="{{ old('rw') }}" />
                    @error('rw')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input type="text" name="kodePos" id="kodePos" class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kode Pos" value="{{ old('kodePos') }}" />
                    @error('kodePos')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input type="text" name="desa" id="desa" class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Desa" value="{{ old('desa') }}" />
                    @error('desa')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kecamatan" value="{{ old('kecamatan') }}" />
                    @error('kecamatan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kabupaten" value="{{ old('kabupaten') }}" />
                    @error('kabupaten')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Provinsi" value="{{ old('provinsi') }}" />
                    @error('provinsi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#getDataButton').click(function() {
            let NIK_CARI = $('#NIKInput').val();

            // Make an AJAX request to fetch data based on NIK
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/get-data-by-nik/${NIK_CARI}`,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#NIK').val(response.NIK);
                        $('#namaLengkap').val(response.namaLengkap);
                        $('#jk').val(response.jk);
                        $('#tempatLahir').val(response.tempatLahir);
                        $('#tanggalLahir').val(response.tanggalLahir);
                        $('#agama').val(response.agama);
                        $('#namaAyah').val(response.namaAyah);
                        $('#namaIbu').val(response.namaIbu);
                        $('#namaKepalaKeluarga').val(response.namaKepalaKeluarga);
                        $('#alamat').val(response.alamat);
                        $('#rt').val(response.rt);
                        $('#rw').val(response.rw);
                        $('#kodePos').val(response.kodePos);
                        $('#desa').val(response.desa);
                        $('#kecamatan').val(response.kecamatan);
                        $('#kabupaten').val(response.kabupaten);
                        $('#provinsi').val(response.provinsi);
                        // Add similar lines for other input fields
                    } else {
                        console.error('No data found for the provided NIK.');
                    }
                }


            });
        });
    });
</script>
@endif

@if ($title == 'Input bps')

<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-3xl text-center mb-5">Form Pengisian Data Bantuan Pangan Stunting</h1>
    <form action="{{ route('data.kirimbps') }}" method="POST" enctype="multipart/form-data" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf


        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">

                <div class="row align-items-center justify-content-center py-2 my-5">
                    <div class="col-md-6 py-2 bg-white">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                        <div class="input-group">
                            <input type="text" name="nikCari" id="NIKInput" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control" placeholder="Cari Nomor Induk Penduduk">
                            <button type="button" id="getDataButton" class="btn btn-submit border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mb-6">
                    <!-- Pesan Kesalahan atau Sukses -->
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                
                    @if (session('berhasil'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('berhasil') }}
                        </div>
                    @endif
                
                    <!-- Form Input NIK -->
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                    <input type="text" name="nik" id="NIK" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" 
                    placeholder="Nomor Induk Kependudukan" 
                    value="{{ old('nik') }}" 
                readonly/>
                    @error('nik')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap" />
                    @error('namaLengkap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                    <input type="text" name="jk" id="jk" class="mt-1 px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Jenis Kelamin" value="{{ old('jk') }}" />
                    @error('jk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" id="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Lahir" value="{{ old('tempatLahir') }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input type="text" name="tanggalLahir" id="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Lahir" value="{{ old('tanggalLahir') }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input type="text" name="agama" id="agama" class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Agama" value="{{ old('agama') }}" />
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input type="text" name="namaAyah" id="namaAyah" class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ayah" value="{{ old('namaAyah') }}" />
                    @error('namaAyah')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input type="text" name="namaIbu" id="namaIbu" class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ibu" value="{{ old('namaIbu') }}" />
                    @error('namaIbu')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input type="text" name="namaKepalaKeluarga" id="namaKepalaKeluarga" class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Kepala Keluarga" value="{{ old('namaKepalaKeluarga') }}" />
                    @error('namaKepalaKeluarga')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat" value="{{ old('alamat') }}" />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rt</label>
                    <input type="text" name="rt" id="rt" class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rt" value="{{ old('rt') }}" />
                    @error('rt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rw</label>
                    <input type="text" name="rw" id="rw" class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rw" value="{{ old('rw') }}" />
                    @error('rw')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input type="text" name="kodePos" id="kodePos" class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kode Pos" value="{{ old('kodePos') }}" />
                    @error('kodePos')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input type="text" name="desa" id="desa" class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Desa" value="{{ old('desa') }}" />
                    @error('desa')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kecamatan" value="{{ old('kecamatan') }}" />
                    @error('kecamatan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kabupaten" value="{{ old('kabupaten') }}" />
                    @error('kabupaten')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Provinsi" value="{{ old('provinsi') }}" />
                    @error('provinsi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#getDataButton').click(function() {
            let NIK_CARI = $('#NIKInput').val();

            // Make an AJAX request to fetch data based on NIK
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/get-data-by-nik/${NIK_CARI}`,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#NIK').val(response.NIK);
                        $('#namaLengkap').val(response.namaLengkap);
                        $('#jk').val(response.jk);
                        $('#tempatLahir').val(response.tempatLahir);
                        $('#tanggalLahir').val(response.tanggalLahir);
                        $('#agama').val(response.agama);
                        $('#namaAyah').val(response.namaAyah);
                        $('#namaIbu').val(response.namaIbu);
                        $('#namaKepalaKeluarga').val(response.namaKepalaKeluarga);
                        $('#alamat').val(response.alamat);
                        $('#rt').val(response.rt);
                        $('#rw').val(response.rw);
                        $('#kodePos').val(response.kodePos);
                        $('#desa').val(response.desa);
                        $('#kecamatan').val(response.kecamatan);
                        $('#kabupaten').val(response.kabupaten);
                        $('#provinsi').val(response.provinsi);
                        // Add similar lines for other input fields
                    } else {
                        console.error('No data found for the provided NIK.');
                    }
                }


            });
        });
    });
</script>
@endif

@if ($title == 'Input bbp')

<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <h1 class="text-3xl text-center mb-5">Form Pengisian Data Bantuan Beras Pemerintah</h1>
    <form action="{{ route('data.kirimbbp') }}" method="POST" enctype="multipart/form-data" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf


        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">

                <div class="row align-items-center justify-content-center py-2 my-5">
                    <div class="col-md-6 py-2 bg-white">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                        <div class="input-group">
                            <input type="text" name="nikCari" id="NIKInput" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control" placeholder="Cari Nomor Induk Penduduk">
                            <button type="button" id="getDataButton" class="btn btn-submit border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mb-6">
                    <!-- Pesan Kesalahan atau Sukses -->
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                
                    @if (session('berhasil'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('berhasil') }}
                        </div>
                    @endif
                
                    <!-- Form Input NIK -->
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                    <input type="text" name="nik" id="NIK" maxlength="16" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" 
                    placeholder="Nomor Induk Kependudukan" 
                    value="{{ old('nik') }}" 
                readonly/>
                    @error('nik')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Lengkap" />
                    @error('namaLengkap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                    <input type="text" name="jk" id="jk" class="mt-1 px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Jenis Kelamin" value="{{ old('jk') }}" />
                    @error('jk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" id="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Lahir" value="{{ old('tempatLahir') }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input type="text" name="tanggalLahir" id="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tanggal Lahir" value="{{ old('tanggalLahir') }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input type="text" name="agama" id="agama" class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Agama" value="{{ old('agama') }}" />
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input type="text" name="namaAyah" id="namaAyah" class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ayah" value="{{ old('namaAyah') }}" />
                    @error('namaAyah')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input type="text" name="namaIbu" id="namaIbu" class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ibu" value="{{ old('namaIbu') }}" />
                    @error('namaIbu')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input type="text" name="namaKepalaKeluarga" id="namaKepalaKeluarga" class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Kepala Keluarga" value="{{ old('namaKepalaKeluarga') }}" />
                    @error('namaKepalaKeluarga')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat" value="{{ old('alamat') }}" />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rt</label>
                    <input type="text" name="rt" id="rt" class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rt" value="{{ old('rt') }}" />
                    @error('rt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Rw</label>
                    <input type="text" name="rw" id="rw" class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Rw" value="{{ old('rw') }}" />
                    @error('rw')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input type="text" name="kodePos" id="kodePos" class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kode Pos" value="{{ old('kodePos') }}" />
                    @error('kodePos')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input type="text" name="desa" id="desa" class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Desa" value="{{ old('desa') }}" />
                    @error('desa')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input type="text" name="kecamatan" id="kecamatan" class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kecamatan" value="{{ old('kecamatan') }}" />
                    @error('kecamatan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Kabupaten" value="{{ old('kabupaten') }}" />
                    @error('kabupaten')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input type="text" name="provinsi" id="provinsi" class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Provinsi" value="{{ old('provinsi') }}" />
                    @error('provinsi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="flex justify-end">
            <button type="submit" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#getDataButton').click(function() {
            let NIK_CARI = $('#NIKInput').val();

            // Make an AJAX request to fetch data based on NIK
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/get-data-by-nik/${NIK_CARI}`,
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#NIK').val(response.NIK);
                        $('#namaLengkap').val(response.namaLengkap);
                        $('#jk').val(response.jk);
                        $('#tempatLahir').val(response.tempatLahir);
                        $('#tanggalLahir').val(response.tanggalLahir);
                        $('#agama').val(response.agama);
                        $('#namaAyah').val(response.namaAyah);
                        $('#namaIbu').val(response.namaIbu);
                        $('#namaKepalaKeluarga').val(response.namaKepalaKeluarga);
                        $('#alamat').val(response.alamat);
                        $('#rt').val(response.rt);
                        $('#rw').val(response.rw);
                        $('#kodePos').val(response.kodePos);
                        $('#desa').val(response.desa);
                        $('#kecamatan').val(response.kecamatan);
                        $('#kabupaten').val(response.kabupaten);
                        $('#provinsi').val(response.provinsi);
                        // Add similar lines for other input fields
                    } else {
                        console.error('No data found for the provided NIK.');
                    }
                }


            });
        });
    });
</script>
@endif
@endsection