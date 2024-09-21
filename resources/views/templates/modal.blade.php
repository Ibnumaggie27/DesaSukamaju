<div id="dialogDetail" class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] lg:w-[40vw] bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
    <h1 class="text-2xl font-semibold text-dark mb-4">Detail</h1>
    <div class="dialog-body mb-4"></div>
    <div class="flex justify-end">
        <button id="closeDialogDetail" class="text-white bg-secondary focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Kembali</button>
    </div>
</div>
<div id="dialogEdit" class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] lg:w-[40vw] bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
    <h1 class="text-2xl font-semibold text-dark mb-4">Edit Pengguna</h1>
    <div class="dialog-body-edit mb-4">
        <form id="formEditPengguna" action="" method="POST" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    ">
            @csrf
            @method('PUT')
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK</label>
                <input id="username" type="text" name="username" class="mt-1 px-3 py-2 @error('username') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="" value="" />
                @error('username')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>

            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                <input id="nama" type="text" name="nama" class="mt-1 px-3 py-2 @error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="" value="" />
                @error('nama')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>

            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Telepon</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="" value="" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>

            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Password</label>
                <input id="password" type="password" name="password" class="mt-1 px-3 py-2 @error('password') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" />
                @error('password')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full mb-6">
                <label class="tracking-wide after:content-['*'] after:ml-0.5 after:text-danger mb-1" for="grid-state">Role</label>
                <div class="relative">
                    <select class="appearance-none px-3 py-2 @error('level') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="level">
                        <option id="role-petugas" value="petugas">Petugas</option>
                        <option id="role-admin" value="admin">Admin</option>
                        <option id="role-masyarakat" value="masyarakat">Masyarakat</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class='bx bx-chevron-down text-xl'></i>
                    </div>
                </div>
                @error('level')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>

    </div>
    <div class="flex justify-between">
        <button type="submit" class="text-black gap-x-8 themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </form>
        <button id="closeDialogEdit" class="text-white bg-secondary focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Kembali</button>
    </div>
</div>
<div id="modalKependudukan" class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] lg:w-[40vw] bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg" style="width: 88%;">
    <h1 class="text-2xl font-semibold text-dark mb-4">Data Detail Penduduk</h1>
    <div class="dialog-body-edit mb-4">
        <form id="formDetailKependudukan" action="" method="POST" class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    ">
            @csrf
            @method('PUT')
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">No Kartu Keluarga</label>
                <input id="username" type="text" name="username" class="mt-1 px-3 py-2 @error('username') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="user.name" value="{{ old('username') }}" />
                @error('username')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>

            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK</label>
                <input id="nama" type="text" name="nama" class="mt-1 px-3 py-2 @error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="John Doe" value="{{ old('nama') }}" />
                @error('nama')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>

            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full mb-6">
                <label class="tracking-wide after:content-['*'] after:ml-0.5 after:text-danger mb-1" for="grid-state">Jenis Kelamin</label>
                <div class="relative">
                    <select class="appearance-none px-3 py-2 @error('level') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="level">
                        <option id="role-petugas" value="petugas">Petugas</option>
                        <option id="role-admin" value="admin">Admin</option>
                        <option id="role-masyarakat" value="masyarakat">Masyarakat</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class='bx bx-chevron-down text-xl'></i>
                    </div>
                </div>
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pendidikan</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Pekerjaan</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Golongan Darah</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Perkawinan</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Perkawinan</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Hubungan</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kewarganegaraan</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">No Pasport</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">No Kitap</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">RT</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">RW</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal di Keluarkan</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tipe Penduduk</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="block mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status NIK</label>
                <input id="telepon" type="text" name="telepon" class="mt-1 px-3 py-2 @error('telepon') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="089907319323" value="{{ old('telepon') }}" />
                @error('telepon')
                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
    </div>
    <div class="flex justify-between">
        <button type="submit" class="text-black gap-x-8 themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
        </form>
        <button id="closeDialogKependudukan" class="text-white bg-secondary focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Kembali</button>
    </div>
</div>


<div id="modalBuatSurat" class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] lg:w-[40vw] bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">

    <div class="dialog-body-buat-surat mb-4 text-center">
        <h1 class="text-xl lg:text-2xl font-semibold text-dark mb-4">Pilih Jenis Surat</h1>
        <h4 class="text-xl lg:text-2xl font-semibold text-dark mb-4">Pembuatan Surat Paling Lambat Akan di Proses 5x24 jam</h4>
        <div class="flex flex-col lg:flex-row pb-10 px-10 justify-center w-full">
            <div class="w-full mb-3">
                <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan']) }}">
                    <div class="w-36 lg:w-40 h-32 lg:h-48 mx-auto border-solid border-2 border-dark rounded-lg p-3 lg:p-5">
                        <img class="w-[70px] text-center lg:w-[100px] mx-auto" src="{{ asset('/img/keterangan_pengantar.png') }}" alt="">
                        <p class="py-1 text-md text-dark">Keterangan</p>
                    </div>
                </a>
            </div>
            <div class="w-full mb-3">
                <a href="{{ route('pengajuan-surat.create',['surat' => 'kelahiran']) }}">
                    <div class="w-36 lg:w-40 h-32 lg:h-48 mx-auto border-solid border-2 border-dark rounded-lg p-3 lg:p-5">
                        <img class="w-[70px] text-center lg:w-[90px] mx-auto" src="{{ asset('/img/kelahiran.png') }}" alt="">
                        <p class="py-1 text-md text-dark">Kelahiran</p>
                    </div>
                </a>
            </div>
            <div class="w-full mb-3">
                <a href="{{ route('pengajuan-surat.create',['surat' => 'kematian']) }}">
                    <div class="w-36 lg:w-40 h-32 lg:h-48 mx-auto border-solid border-2 border-dark rounded-lg p-3 lg:p-5">
                        <img class="w-[70px] text-center lg:w-[160px] mx-auto" src="{{ asset('/img/kematian.png') }}" alt="">
                        <p class="py-1 text-md text-dark">Kematian</p>
                    </div>
                </a>
            </div>


        </div>
    </div>
    <div class="flex justify-between">

        <button id="closeDialogSurat" class="text-white bg-secondary focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Kembali</button>
    </div>
</div>

<div id="dialogDelete" class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] lg:w-[40vw] bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
    <h1 class="text-2xl font-semibold text-dark">Hapus</h1>
    <p class="mb-4 text-lg text-secondary">Yakin ingin menghapus?</p>
    <form action="" method="post" id="formDelete">
        @csrf
        @method('delete')
        <div class="flex justify-end">
            <button type="button" id="closeDialogDelete" class="text-white bg-secondary focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">Kembali</button>
            <button type="submit" class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Hapus</button>
        </div>
    </form>
</div>

<div id="dialogDeletePenduduk" class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] lg:w-[40vw] bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
    <h1 class="text-2xl font-semibold text-dark">Hapus</h1>
    <p class="mb-4 text-lg text-secondary">Yakin ingin menghapus?</p>
    <form action="" method="post" id="formDeletePenduduk">
        @csrf
        @method('delete')
        <div class="flex justify-end">
            <button type="button" id="closeDialogDeletePenduduk
            " class="text-white bg-secondary focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">Kembali</button>
            <button type="submit" class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Hapus</button>
        </div>
    </form>
</div>