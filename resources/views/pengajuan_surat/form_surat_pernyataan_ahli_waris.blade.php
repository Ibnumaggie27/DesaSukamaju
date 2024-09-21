@extends('templates/dashboard')
@section('content')
<div class="bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
    <h1 class="text-2xl text-center my-8">Form Pengisian Surat Pernyataan Ahli Waris</h1>
    <form action="{{ route('pengajuan-surat.store') }}" method="POST" enctype="multipart/form-data" class=" mt-5 [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf

        <input type="hidden" value="Pernyataan Ahli Waris" name="jenis_surat">
        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm ">
                <h4>Format Isian Untuk Almarhumah</h4>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Almarhum</label>
                    <input type="text" name="nama_almarhum" class="mt-1 px-3 py-2 @error('nama_almarhum') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Almarhum" value="{{ old('nama_almarhum') }}" />
                    @error('nama_almarhum')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <br>
                <h4>Format Isian Ahli Waris</h4>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                    <input type="text" name="nama_pertama" class="mt-1 px-3 py-2 @error('nama_pertama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama" value="{{ old('nama_pertama') }}" />
                    @error('nama_pertama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat & Tanggal Lahir</label>
                    <input type="text" name="ttl_pertama" class="mt-1 px-3 py-2 @error('ttl_pertama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Cipanas, 20 Agustus 2000" value="{{ old('ttl_pertama') }}" />
                    @error('ttl_pertama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input type="text" name="alamat_pertama" class="mt-1 px-3 py-2 @error('alamat_pertama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat" value="{{ old('alamat_pertama') }}" />
                    @error('alamat_pertama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm ">
                <h4>Format Isian Warisan</h4>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Warisan Yang di Wariskan?</label>
                    <input type="text" name="warisan" class="mt-1 px-3 py-2 @error('warisan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Warisan Yang di Wariskan" value="{{ old('warisan') }}" />
                    @error('warisan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full 
            [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
            [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
            ">
                <h4>Format Isian Penerima Warisan</h4>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Penerima Waris</label>
                    <input type="text" name="nama_penerima" class="mt-1 px-3 py-2 @error('nama_penerima') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Penerima Waris" value="{{ old('nama_penerima') }}" />
                    @error('nama_penerima')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Tanggal Lahir Penerima Waris</label>
                    <input type="text" name="ttl_penerima" class="mt-1 px-3 py-2 @error('ttl_penerima') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Tempat Tanggal Lahir Penerima Waris" value="{{ old('ttl_penerima') }}" />
                    @error('ttl_penerima')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat Penerima Waris</label>
                    <input type="text" name="alamat_penerima" class="mt-1 px-3 py-2 @error('alamat_penerima') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Alamat Penerima Waris" value="{{ old('alamat_penerima') }}" />
                    @error('alamat_penerima')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Formulir Tambahan -->
        <div id="formContainer"></div>
        <button type="button" id="tambahForm" style="border: 1px solid #000;">Tambah Penerima Ahli Waris</button>
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

<!-- Tambahkan ini pada bagian paling bawah sebelum </body> -->
@php
$formIndex = 1;
@endphp

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let formIndex = 1; // Initialize formIndex here
        const formContainer = document.getElementById("formContainer");
        const tambahFormButton = document.getElementById("tambahForm");

        tambahFormButton.addEventListener("click", function() {
            const newForm = document.createElement("div");
            newForm.innerHTML = `
          <div class="flex flex-col mb-6">
            <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Tambahan ${formIndex}</label>
            <input type="text" name="nama${formIndex}"
                class="mt-1 px-3 py-2" placeholder="Nama Tambahan ${formIndex}" value="{{ old('nama' . $formIndex) }}" />
          </div>
          <div class="flex flex-col mb-6">
            <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir Tambahan ${formIndex}</label>
            <input type="text" name="ttl${formIndex}"
                class="mt-1 px-3 py-2" placeholder="Tanggal Lahir Tambahan ${formIndex}" value="{{ old('ttl' . $formIndex) }}" />
          </div>
          <div class="flex flex-col mb-6">
            <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat Tambahan ${formIndex}</label>
            <input type="text" name="alamat${formIndex}"
                class="mt-1 px-3 py-2" placeholder="Alamat Tambahan ${formIndex}" value="{{ old('alamat' . $formIndex) }}" />
          </div>
          <!-- Sisipkan bagian lain sesuai kebutuhan Anda -->
        `;

            formContainer.appendChild(newForm);
            formIndex++; // Increment formIndex for the next set of input fields
        });
    });
</script>





@endsection