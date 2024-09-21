@extends('templates/dashboard')
@section('content')
<div class="bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
    <h1 class="text-2xl text-center my-8">Form Pengisian Surat Keterangan Beda Nama/Data</h1>
    <form action="{{ route('pengajuan-surat.store') }}" method="POST" enctype="multipart/form-data" class=" mt-5
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
        @csrf

        <input type="hidden" value="Keterangan Beda Nama Data" name="jenis_surat">
        <div class="flex flex-col  gap-5 justify-center">
            <div class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                ">
                <h3>Data yang tertulis di Kartu Keluarga</h3>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger"> No. KK</label>
                    <input type="text" name="kk" maxlength="16" pattern="\d*"
                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="mt-1 px-3 py-2 @error('kk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Masukan Nomor KK" value="{{ old('kk') }}" />
                    @error('kk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Atas nama KK</label>
                    <input type="text" name="ankk" class="mt-1 px-3 py-2 @error('ankk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Atas nama KK" value="{{ old('ankk') }}" />
                    @error('ankk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah Dari a.n KK</label>
                    <input type="text" name="ayahkk" class="mt-1 px-3 py-2 @error('ayahkk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ayah Dari a.n KK" value="{{ old('ayahkk') }}" />
                    @error('ayahkk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu Dari a.n KK</label>
                    <input type="text" name="ibukk" class="mt-1 px-3 py-2 @error('ibukk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Nama Ibu Dari a.n KK" value="{{ old('ibukk') }}" />
                    @error('ibukk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div id="formContainer"></div>
                <button type="button" id="tambahForm" style="border: 1px solid #000;">Tambah Data</button>
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
                            <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama </label>
                            <input type="text" name="nama${formIndex}"
                                class="mt-1 px-3 py-2" placeholder="Nama Tambahan" value="{{ old('nama' . $formIndex) }}" />
                        </div>
                        <div class="flex flex-col mb-6">
                            <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah </label>
                            <input type="text" name="nama_ayah${formIndex}"
                                class="mt-1 px-3 py-2" placeholder="Nama Ayah" value="{{ old('Nama_ayah' . $formIndex) }}" />
                        </div>
                        <div class="flex flex-col mb-6">
                            <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu </label>
                            <input type="text" name="nama_ibu${formIndex}"
                                class="mt-1 px-3 py-2" placeholder="Nama Ibu" value="{{ old('nama_ibu' . $formIndex) }}" />
                        </div>
                        <!-- Sisipkan bagian lain sesuai kebutuhan Anda -->
                        `;

                            formContainer.appendChild(newForm);
                            formIndex++; // Increment formIndex for the next set of input fields
                        });
                    });
                </script>
            </div>
            <div class="w-full
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm">
                <h3>input data yang ingin dibenarkan</h3>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Yang Tertulis di?</label>
                    <input type="text" name="data_benar" class="mt-1 px-3 py-2 @error('data_benar') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Buku Nikah" value="{{ old('data_benar') }}" />
                    @error('data_benar')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Atas Nama?</label>
                    <input type="text" name="atas_nama" class="mt-1 px-3 py-2 @error('atas_nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : jaenudin & Susi" value="{{ old('atas_nama') }}" />
                    @error('atas_nama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">masukan perbaikan data</label>
                    <input type="text" name="perbaikan_data" class="mt-1 px-3 py-2 @error('perbaikan_data') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Nama Ayah Burhanudin : MEMED" value="{{ old('perbaikan_data') }}" />
                    @error('perbaikan_data')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div id="formContainer1"></div>
                <button type="button" id="tambahForm1" style="border: 1px solid #000;">Tambah Data</button>
                @php
                $formIndex1 = 1;
                @endphp

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        let formIndex1 = 1; // Initialize formIndex1 here
                        const formContainer = document.getElementById("formContainer1");
                        const tambahFormButton = document.getElementById("tambahForm1");

                        tambahFormButton.addEventListener("click", function() {
                            const newForm = document.createElement("div");
                            newForm.innerHTML = `
                        <div class="flex flex-col mb-6">
                            <label class="after:content-['*'] after:ml-0.5 after:text-danger">Masukkan perbaikan data </label>
                            <input type="text" name="perbaikan${formIndex1}"
                                class="mt-1 px-3 py-2" placeholder="Contoh : Nama Ayah Burhanudin : MEMED" value="{{ old('perbaikan' . $formIndex1) }}" />
                        </div>
                        <!-- ... (code lain) -->
                        `;

                            formContainer.appendChild(newForm);
                            formIndex1++; // Increment formIndex1 for the next set of input fields
                        });
                    });
                </script>
                <div class="flex flex-col mb-6">
                    <label class="after:ml-0.5 after:text-danger">Keterangan</label>
                    <input type="text" name="keterangan" class="mt-1 px-3 py-2 @error('keterangan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Contoh : Tertukar" value="{{ old('keterangan') }}" />
                    @error('keterangan')
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