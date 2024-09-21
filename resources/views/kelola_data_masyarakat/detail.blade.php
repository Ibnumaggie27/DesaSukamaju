<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('img/icon.png') }}" rel="shortcut" type="image/png">

    <link rel="stylesheet" href="{{ asset('css/landing-page/index.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Optional: Add Bootstrap Icons for icon support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">

    <title>@yield('title', 'Desa Palasari') | Website Resmi desa Palasari</title>

</head>

<body style="background-image: linear-gradient(to bottom, #4facfe 0%, #00f2fe 100%);">

    <div id="modalKependudukan" class=" fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] lg:w-[40vw] bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg" style="width: 88%;">
        <h1 class=" text-lg lg:text-2xl font-bold mb-3">Data Detail {{$title}}</h1>
        <div class="dialog-body-edit mb-4">

            {{-- Form Untuk Edit Data Kependudukan --}}
            @if($page == 'Kependudukan' || $page == 'Kelahiran')
            <form id="formDetailKependudukan" action="/data/{{ $page }}/update/{{ $penduduk->id }}" method="POST" class="
                    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark
                    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm">
                @csrf
                @method('POST')
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">No Kartu Keluarga</label>
                    <input id="username" type="text" name="noKK" class="mt-1 px-3 py-2 @error('') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->noKK }}" />
                    @error('No KK')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK</label>
                    <input id="nama" type="text" name="NIK" class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->NIK }}" readonly />
                    @error('NIK')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                    <input id="telepon" type="text" name="namaLengkap" class="mt-1 px-3 py-2 @error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->namaLengkap }}" />
                    @error('Nama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full mb-6">
                    <label class="tracking-wide after:content-['*'] after:ml-0.5 after:text-danger mb-1" for="grid-state">Jenis Kelamin</label>
                    <div class="relative">
                        <select class="appearance-none px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="jk">
                            <option value="LAKI-LAKI" {{ $penduduk->jk == 'LAKI-LAKI' ? 'selected' : '' }}>LAKI-LAKI</option>
                            <option value="PEREMPUAN" {{ $penduduk->jk == 'PEREMPUAN' ? 'selected' : '' }}>PEREMPUAN</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class='bx bx-chevron-down text-xl'></i>
                        </div>
                    </div>
                    @error('jk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input id="telepon" type="text" name="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->tempatLahir }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input id="telepon" type="text" name="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->tanggalLahir }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input id="telepon" type="text" name="agama" class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->agama }}" />
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pendidikan</label>
                    <input id="telepon" type="text" name="pendidikan" class="mt-1 px-3 py-2 @error('pendidikan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->pendidikan }}" />
                    @error('jenisPekerjaan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Pekerjaan</label>
                    <input id="telepon" type="text" name="jenisPekerjaan" class="mt-1 px-3 py-2 @error('jenisPekerjaan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->jenisPekerjaan }}" />
                    @error('jenisPekerjaan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Golongan Darah</label>

                    @if($penduduk->goldar == NULL)
                    <input id="telepon" type="text" name="goldar" class="mt-1 px-3 py-2 @error('goldar') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Belum ada" value="" />
                    @elseif($penduduk->goldar != NULL)
                    <input id="telepon" type="text" name="goldar" class="mt-1 px-3 py-2 @error('goldar') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->goldar }}" />
                    @endif

                    @error('goldar')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Perkawinan</label>
                    <input id="telepon" type="text" name="statusPerkawinan" class="mt-1 px-3 py-2 @error('statusPerkawinan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->statusPerkawinan }}" />
                    @error('statusPerkawinan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Perkawinan</label>

                    @if($penduduk->tanggalPerkawinan == NULL)
                    <input id="tanggalPerkawinan" type="text" name="tanggalPerkawinan" class="mt-1 px-3 py-2 @error('tanggalPerkawinan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="" />
                    @elseif($penduduk->tanggalPerkawinan != NULL)
                    <input id="tanggalPerkawinan" type="text" name="tanggalPerkawinan" class="mt-1 px-3 py-2 @error('tanggalPerkawinan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->tanggalPerkawinan ? \Carbon\Carbon::createFromFormat('Y-m-d', $penduduk->tanggalPerkawinan)->format('Y-m-d') : '' }}" />

                    @endif

                    @error('tanggalPerkawinan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Hubungan</label>
                    <input id="telepon" type="text" name="statusHubungan" class="mt-1 px-3 py-2 @error('statusHubungan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->statusHubungan  }}" />
                    @error('statusHubungan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kewarganegaraan</label>
                    <input id="telepon" type="text" name="kewarganegaraan" class="mt-1 px-3 py-2 @error('kewarganegaraan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->kewarganegaraan }}" />
                    @error('kewarganegaraan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">No Pasport</label>
                    @if($penduduk->noPaspor == NULL)
                    <input id="telepon" type="text" name="noPaspor" class="mt-1 px-3 py-2 @error('noPaspor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Belum ada" value="" />
                    @elseif($penduduk->noPaspor != NULL)
                    <input id="telepon" type="text" name="noPaspor" class="mt-1 px-3 py-2 @error('noPaspor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->noPaspor }}" />
                    @endif
                    @error('noPaspor')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">No Kitap</label>
                    @if($penduduk->noKitap == NULL)
                    <input id="telepon" type="text" name="noKitap" class="mt-1 px-3 py-2 @error('noKitap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" placeholder="Belum ada" value="" />
                    @elseif($penduduk->noKitap != NULL)
                    <input id="telepon" type="text" name="noKitap" class="mt-1 px-3 py-2 @error('noKitap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->noKitap }}" />
                    @endif
                    @error('noKitap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input id="telepon" type="text" name="namaAyah" class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->namaAyah }}" />
                    @error('namaAyah')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input id="telepon" type="text" name="namaIbu" class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->namaIbu }}" />
                    @error('namaIbu')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input id="telepon" type="text" name="namaKepalaKeluarga" class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->namaKepalaKeluarga }}" />
                    @error('namaKepalaKeluarga')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input id="telepon" type="text" name="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->alamat }}" />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">RT</label>
                    <input id="telepon" type="text" name="rt" class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->rt }}" />
                    @error('rt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">RW</label>
                    <input id="telepon" type="text" name="rw" class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->rw}}" />
                    @error('rw')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input id="telepon" type="text" name="kodePos" class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->kodePos }}" />
                    @error('kodePos')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input id="telepon" type="text" name="desa" class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->desa }}" />
                    @error('desa')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input id="telepon" type="text" name="kecamatan" class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->kecamatan }}" />
                    @error('kecamatan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input id="telepon" type="text" name="kabupaten" class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->kabupaten }}" />
                    @error('kabupaten')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input id="telepon" type="text" name="provinsi" class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->provinsi }}" />
                    @error('provinsi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal di Keluarkan</label>
                    <input id="tanggalDikeluarkan" type="text" name="tanggalDikeluarkan" class="mt-1 px-3 py-2 @error('tanggalDikeluarkan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->tanggalDikeluarkan  }}" />
                    @error('tanggalDikeluarkan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tipe Penduduk</label>
                    <input id="telepon" type="text" name="tipePenduduk" class="mt-1 px-3 py-2 @error('tipePenduduk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->tipePenduduk }}" />
                    @error('tipePenduduk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status NIK</label>
                    <input id="telepon" type="text" name="statusNik" class="mt-1 px-3 py-2 @error('statusNik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->statusNik }}" />
                    @error('statusNik')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-content-end gap-3">
                    <button id="closeDialogKependudukan" type="button" class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                        Kembali
                    </button>

                    <button type="submit" class=" gap-x-8 text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-3 py-2.5 text-center">Ubah</button>
                </div>
            </form>

            @endif
            {{-- Form Untuk Edit Data Masyarakat Miskin --}}
            @if(in_array($page, ['miskin', 'ibuhamil', 'bayi_1-5_tahun', 'anakyatim', 'bpn', 'bbp', 'bps', 'pkh']))
            <form id="formDetailKependudukan" action="/data/{{ $page }}/update/{{ $penduduk->id }}" method="POST" class="
                    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark
                    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm">
                @csrf
                @method('POST')

                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK</label>
                    <input id="nama" type="text" name="NIK" class="mt-1 px-3 py-2 @error('NIK') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->NIK }}" readonly />
                    @error('NIK')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                    <input id="telepon" type="text" name="namaLengkap" class="mt-1 px-3 py-2 @error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->namaLengkap }}" />
                    @error('Nama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full mb-6">
                    <label class="tracking-wide after:content-['*'] after:ml-0.5 after:text-danger mb-1" for="grid-state">Jenis Kelamin</label>
                    <div class="relative">
                        <select class="appearance-none px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" id="grid-state" name="jk">
                            <option value="LAKI-LAKI" {{ $penduduk->jk == 'LAKI-LAKI' ? 'selected' : '' }}>LAKI-LAKI</option>
                            <option value="PEREMPUAN" {{ $penduduk->jk == 'PEREMPUAN' ? 'selected' : '' }}>PEREMPUAN</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class='bx bx-chevron-down text-xl'></i>
                        </div>
                    </div>
                    @error('jk')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input id="telepon" type="text" name="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->tempatLahir }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input id="telepon" type="text" name="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->tanggalLahir }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                    <input id="telepon" type="text" name="agama" class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->agama }}" />
                    @error('agama')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                    <input id="telepon" type="text" name="namaAyah" class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->namaAyah }}" />
                    @error('namaAyah')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                    <input id="telepon" type="text" name="namaIbu" class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->namaIbu }}" />
                    @error('namaIbu')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                    <input id="telepon" type="text" name="namaKepalaKeluarga" class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->namaKepalaKeluarga }}" />
                    @error('namaKepalaKeluarga')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                    <input id="telepon" type="text" name="alamat" class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->alamat }}" />
                    @error('alamat')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">RT</label>
                    <input id="telepon" type="text" name="rt" class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->rt }}" />
                    @error('rt')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">RW</label>
                    <input id="telepon" type="text" name="rw" class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->rw}}" />
                    @error('rw')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                    <input id="telepon" type="text" name="kodePos" class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->kodePos }}" />
                    @error('kodePos')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                    <input id="telepon" type="text" name="desa" class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->desa }}" />
                    @error('desa')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                    <input id="telepon" type="text" name="kecamatan" class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->kecamatan }}" />
                    @error('kecamatan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                    <input id="telepon" type="text" name="kabupaten" class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->kabupaten }}" />
                    @error('kabupaten')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                    <input id="telepon" type="text" name="provinsi" class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->provinsi }}" />
                    @error('provinsi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-content-end gap-3">
                    <button id="closeDialogKependudukan" type="button" class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                        Kembali
                    </button>

                    <button type="submit" class=" gap-x-8 text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-3 py-2.5 text-center">Ubah</button>
            </form>

            @endif

            {{-- Form Untuk Edit Data Kematian --}}
            @if($page == 'kematian')
            <form id="formDetailKependudukan" action="{{ route('updateKematian', $penduduk->id) }}" method="POST" class="
                    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark
                    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm">
                @csrf
                @method('POST')

                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK</label>
                    <input id="nama" type="text" name="NIK" class="mt-1 px-3 py-2 @error('NIK') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->NIK }}" />
                    @error('NIK')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                    <input id="telepon" type="text" name="namaLengkap" class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->namaLengkap }}" />
                    @error('namaLengkap')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                    <input id="telepon" type="text" name="tempatLahir" class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->tempatLahir }}" />
                    @error('tempatLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                    <input id="telepon" type="text" name="tanggalLahir" class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->tanggalLahir }}" />
                    @error('tanggalLahir')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Kematian</label>
                    <input id="telepon" type="text" name="tempatKematian" class="mt-1 px-3 py-2 @error('tempatKematian') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->tempatKematian }}" />
                    @error('tempatKematian')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Kematian</label>
                    <input id="telepon" type="text" name="tanggalKematian" class="mt-1 px-3 py-2 @error('tanggalKematian') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->tanggalKematian }}" />
                    @error('tanggalKematian')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK Pelapor</label>
                    <input id="telepon" type="text" name="nikPelapor" class="mt-1 px-3 py-2 @error('nikPelapor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->nikPelapor }}" />
                    @error('nikPelapor')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Pelapor</label>
                    <input id="telepon" type="text" name="namaPelapor" class="mt-1 px-3 py-2 @error('namaPelapor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->namaPelapor }}" />
                    @error('namaPelapor')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="block mb-6">
                    <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor yang dapat di hubungi</label>
                    <input id="telepon" type="text" name="noDapatDihubungi" class="mt-1 px-3 py-2 @error('noDapatDihubungi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1" value="{{ $penduduk->noDapatDihubungi }}" />
                    @error('noDapatDihubungi')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-content-end gap-3">
                    <button id="closeDialogKependudukan" type="button" class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                        Kembali
                    </button>

                    <button type="submit" class=" gap-x-8 text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-3 py-2.5 text-center">Ubah</button>
                </div>


            </form>

            @endif

            <script>
                // Letakkan script di bawah tombol "Kembali"
                document.getElementById("closeDialogKependudukan").addEventListener("click", function() {
                    redirectToPreviousPage();
                });

                function redirectToPreviousPage() {
                    window.location.href = document.referrer;
                }
            </script>

        </div>
    </div>

    </div>

</body>