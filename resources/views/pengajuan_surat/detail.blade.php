@extends('templates/dashboard')
@section('content')
@php
$surat = json_decode($pengajuan_surat->surat);
@endphp
<div class="bg-white p-3 mb-5 rounded-lg row items-center">
    <div class="layout__Konfirmasi--Desktop col-6 text-center lg:text-left">
        <h1 class="text-lg lg:text-4xl text-danger font-semibold mb-2"><b>Konfirmasi</b> Pengajuan Surat</h1>
        <p class=" text-xs lg:text-lg font-normal text-secondary">*Konfirmasi petugas terhadap surat yang akan di buat</p>
        @canany(['admin'])
        <p class="text-base text-[13px] lg:text-lg font-normal text-secondary">Jenis Surat : {{ $surat->kttd }}</p>
        @endcanany
    </div>
    <div class="layout__Konfirmasi--Desktop col-6">
        <div class="mt-4 flex justify-center text-center gap-1">
            @canany(['admin', 'petugas','kesra','pelayanan','pemerintahan'])
            @if ($pengajuan_surat->status == 'Pending')
                        
                        <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tolak Pengajuan Surat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulir di dalam modal untuk menolak dengan catatan -->
                            <form action="{{ route('pengajuan_surat.reject', $pengajuan_surat->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="catatan_petugas" class="form-label">Catatan Petugas</label>
                                    <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-danger">Tolak</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <form class="mt-0 ml-0 lg:ml-3 lg:mt-0" action="{{ route('pengajuan_surat.verifikasi', $pengajuan_surat->id) }}" method="post">
                @csrf
                @method('PUT')
                @if (in_array($pengajuan_surat->jenis_surat, ['Surat Keterangan Tidak Mampu','Surat Keterangan Domisili Haji','Surat Keterangan Kehilangan','Surat Pengantar Keterangan Catatan Kepolisian','Surat Keterangan Domisili Yayasan']))
                    <h1 class="text-2xl my-8">Keperluan Surat Yang di Minta</h1>
                    
                    <div class="flex flex-col lg:flex-row gap-5 justify-center">
                        <div class="w-full">
                            <div class="flex flex-col mb-6">
                                <label class="after:content-['*'] after:ml-0.5 after:text-danger"> Masukkan Keperluan Surat yang diminta</label>
                                <input type="text" name="keperluan"
                                    class="mt-1 px-3 py-2 @error('keperluan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                                    placeholder="Keperluan Surat" value="{{ old('keperluan') }}" required />
                                @error('keperluan')
                                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif

                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Belum Nikah')
                <h1 class="text-2xl my-8">Proses Surat Keterangan Belum nikah</h1>
            
                <div class="flex flex-col lg:flex-row gap-5 justify-center">
                    <div class="w-full">
                        <div class="flex flex-col mb-6">
                            <label class="after:content-['*'] after:ml-0.5 after:text-danger"> Masukkan Status Kebenaran Pernikahan</label>
                            <input type="text" name="benar_nikah"
                                class="mt-1 px-3 py-2 @error('benar_nikah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                                placeholder="Status Pernikahan" value="{{ old('benar_nikah') }}" required />
                            @error('benar_nikah')
                                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Keperluan Surat</label>
                        <input type="text" name="perlu"
                            class="mt-1 px-3 py-2 @error('perlu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Keperluan Surat" value="{{ old('perlu') }}" required />
                        @error('perlu')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Domisili')
                <h1 class="text-2xl my-8">Proses Surat Keterangan Domisili</h1>
            
                <div class="flex flex-col lg:flex-row gap-5 justify-center">
                    <div class="w-full">
                        <div class="flex flex-col mb-6">
                            <label class="after:content-['*'] after:ml-0.5 after:text-danger">Masa Berlaku Surat</label>
                            <input type="date" name="berlaku"
                                class="mt-1 px-3 py-2 @error('berlaku') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                                placeholder="Masa Berlaku Surat" value="{{ old('berlaku') }}" required />
                            @error('berlaku')
                                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col mb-6">
                            <label class="after:content-['*'] after:ml-0.5 after:text-danger">Keperluan Surat</label>
                            <input type="text" name="keperluan"
                                class="mt-1 px-3 py-2 @error('keperluan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                                placeholder="Keperluan Surat" value="{{ old('keperluan') }}" required />
                            @error('keperluan')
                                <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                @endif
                <button type="button" class="text-white bg-danger focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tolak
                </button>
                <button type="submit" class="text-dark bg-warning focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">Verifikasi</button>
            </form>
            @endif
            @endcanany

            @canany(['admin'])

            @if ($pengajuan_surat->status == 'Diproses')

                @if ($surat->kttd == 'barcode'||$surat->kttd == 'basah')
                <a href="{{ route('pengajuan-surat.edit', $pengajuan_surat->id) }}" class="text-white bg-success focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">
                    Proses Surat
                </a>
                @endif
                
            @endif

            @endcanany
            
           @canany(['kesra'])
            @if ($pengajuan_surat->status == 'verifikasi' && in_array($pengajuan_surat->jenis_surat, ['Surat Keterangan Numpang Nikah','Surat Keterangan Duda Janda','Surat Keterangan Tentang Perkawinan','Surat Keterangan Tidak Mampu','Surat Keterangan Kehilangan','Surat Keterangan Orang Tua Wali','Surat Pengantar Keterangan Catatan Kepolisian','Surat Keterangan Domisili']))
            <form class="mt-3 ml-0 lg:ml-3 lg:mt-0" action="{{ route('pengajuan_surat.approve', $pengajuan_surat->id) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="text-dark bg-warning focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">Setujui
                    & Proses
                    Surat</button>
            </form>
            @endif
            @endcanany
            @canany(['pelayanan'])
            @if ($pengajuan_surat->status == 'verifikasi' && in_array($pengajuan_surat->jenis_surat, ['Surat Keterangan Usaha']))
            <form class="mt-3 ml-0 lg:ml-3 lg:mt-0" action="{{ route('pengajuan_surat.approve', $pengajuan_surat->id) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="text-dark bg-warning focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">Setujui
                    & Proses
                    Surat</button>
            </form>
            @endif
            @endcanany
            @canany(['pemerintahan'])
            @if ($pengajuan_surat->status == 'verifikasi' && in_array($pengajuan_surat->jenis_surat, ['Surat Keterangan Domisili Haji','Surat Keterangan Domisili Yayasan','Surat Keterangan Pindah WNI','Surat Keterangan Pindah','Surat Keterangan Beda Nama Data','Surat Pengantar Pembuatan Kartu Keluarga','Surat Kematian','Surat Kelahiran','Surat Keterangan Penguburan','Surat Pernyataan Akad Nikah','Surat Pernyataan Ahli Waris','Surat Keterangan Belum Nikah']))
            <form class="mt-3 ml-0 lg:ml-3 lg:mt-0" action="{{ route('pengajuan_surat.approve', $pengajuan_surat->id) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="text-dark bg-warning focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">Setujui
                    & Proses
                    Surat</button>
            </form>
            @endif
            @endcanany
        </div>
    </div>
</div>

<div class="bg-white mb-5 rounded-lg w-full">
    <div class="overflow-x">
        <div class="layout__detail__surat card border-0">
            <div class="layout__headSurat py-3">
                <h2 class="text-center text-2xl lg:text-3xl">{{ $pengajuan_surat->jenis_surat }}</h2>
            </div>
            <div class="p-4 row m-2 ">
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Domisili Haji')
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">No Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="no_kk" id="no_kk" value="{{ $surat->no_kk }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="kewarganegaraan">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan" id="kewarganegaraan" value="{{ $surat->kewarganegaraan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="agama">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" disabled />
                    </div>
                </div>

                
                @endif

                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Domisili Yayasan')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Nama Pimpinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="nama_pimpinan" value="{{ $surat->nama_pimpinan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan" id="kewarganegaraan" value="{{ $surat->kewarganegaraan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Nama Yayasan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_yayasan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Jenis / Klasifikasi Yayasan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->jenis_yayasan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat Yayasan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat_yayasan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Akta Pendirian</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->akta_pendirian}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">SK Kemenkumham</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->sk_kemenkumham}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Jumlah Pengurus</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->jumlah_pengurus}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Penanggung Jawab Yayasan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->penanggung_jawab_yayasan}}" disabled />
                    </div>
                </div>
                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Penguburan')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan" id="kewarganegaraan" value="{{ $surat->kewarganegaraan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="hari_tanggal"> Pada hari/Tanggal</label>
                        <input type="text" class="form-control my-1" name="hari_tanggal" id="hari_tanggal" value="{{ $surat->hari_tanggal }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="tempat_meninggal"> Tempat Meniggal </label>
                        <input type="text" class="form-control my-1" name="tempat_meninggal" id="tempat_meninggal" value="{{ $surat->tempat_meninggal }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="dikuburkan"> Dikuburkan Hari </label>
                        <input type="text" class="form-control my-1" name="dikuburkan" id="dikuburkan" value="{{ $surat->dikuburkan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="waktu"> Waktu </label>
                        <input type="text" class="form-control my-1" name="waktu" id="waktu" value="{{ $surat->waktu }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="tempat_penguburan"> Tempat Penguburan </label>
                        <input type="text" class="form-control my-1" name="tempat_penguburan" id="tempat_penguburan" value="{{ $surat->tempat_penguburan }}" disabled />
                    </div>
                </div>

                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Tentang Perkawinan')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama_laki"> Nama </label>
                        <input type="text" class="form-control my-1" name="nama_laki" id="nama_laki" value="{{ $surat->nama_laki }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama_perempuan"> Nama</label>
                        <input type="text" class="form-control my-1" name="nama_perempuan" id="nama_perempuan" value="{{ $surat->nama_perempuan }}" disabled />
                    </div>
                </div>

                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="kewarganegaraan_laki"> Warga Negara</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan_laki" id="kewarganegaraan_laki" value="{{ $surat->kewarganegaraan_laki }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="kewarganegaraan_perempuan"> Warga Negara</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan_perempuan" id="kewarganegaraan_perempuan" value="{{ $surat->kewarganegaraan_perempuan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="pekerjaan_laki"> Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan_laki" id="pekerjaan_laki" value="{{ $surat->pekerjaan_laki }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="pekerjaan_perempuan"> Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan_perempuan" id="pekerjaan_perempuan" value="{{ $surat->pekerjaan_perempuan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl_perempuan"> Tempat tanggal lahir</label>
                        <input type="text" class="form-control my-1" name="ttl_perempuan" id="ttl_perempuan" value="{{ $surat->ttl_perempuan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="alamat_laki"> Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat_laki" id="alamat_laki" value="{{ $surat->alamat_laki}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="alamat_perempuan"> Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat_perempuan" id="alamat_perempuan" value="{{ $surat->alamat_perempuan }}" disabled />
                    </div>
                </div>

                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Pindah WNI')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama"> Nama </label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Tempat Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>

                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik"> Nik</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan_laki" id="nik" value="{{ $surat->nik }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk"> Nomor Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="no_kk" id="no_kk" value="{{ $surat->no_kk }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="kewarganegaraan"> Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan" id="kewarganegaraan" value="{{ $surat->kewarganegaraan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="agama"> Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="alamat"> Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="keperluan"> Keperluan Surat</label>
                        <input type="text" class="form-control my-1" name="keperluan" id="keperluan" value="{{ $surat->keperluan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="keterangan_surat"> Keterangan Surat</label>
                        <input type="text" class="form-control my-1" name="keterangan_surat" id="keterangan_surat" value="{{ $surat->keterangan_surat }}" disabled />
                    </div>
                </div>
                
                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Pindah')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama"> Nama </label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Tempat Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>

                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik"> Nik</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan_laki" id="nik" value="{{ $surat->nik }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk"> Nomor Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="no_kk" id="no_kk" value="{{ $surat->no_kk }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="kewarganegaraan"> Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan" id="kewarganegaraan" value="{{ $surat->kewarganegaraan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="agama"> Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="alamat"> Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="keperluan"> Keperluan Surat</label>
                        <input type="text" class="form-control my-1" name="keperluan" id="keperluan" value="{{ $surat->keperluan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="keterangan_surat"> Keterangan Surat</label>
                        <input type="text" class="form-control my-1" name="keterangan_surat" id="keterangan_surat" value="{{ $surat->keterangan_surat }}" disabled />
                    </div>
                </div>
                
                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Numpang Nikah')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> Nama</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->nama_perempuan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> NIK</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->nik_perempuan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Bin/Binti</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->bin }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> Bin/Binti</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->bin_perempuan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik">Tempat/Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> Tempat/Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->ttl_perempuan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik">Agama</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->agama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> Agama</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->agama_perempuan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->kewarganegaraan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->kewarganegaraan_perempuan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->status_pernikahan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->status_pernikahan_perempuan  }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> Pekerjaan </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->pekerjaan_perempuan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik">Tempat Tinggal</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->tempat_tinggal }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> Tempat Tinggal </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->tempat_tinggal_perempuan  }}" disabled />
                    </div>
                </div>

                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Orang Tua Wali')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="kewarganegaraan">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan" id="kewarganegaraan" value="{{ $surat->kewarganegaraan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="agama">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Status Kawin</label>
                        <input type="text" class="form-control my-1" name="status_kawin" id="status_kawin" value="{{ $surat->status_perkawinan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Nama</label>
                        <input type="text" class="form-control my-1" name="nama_anak" id="nama_anak" value="{{ $surat->nama_anak}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">NIK</label>
                        <input type="text" class="form-control my-1" name="nik_anak" id="nik_anak" value="{{ $surat->nik_anak}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl_anak" id="ttl_anak" value="{{ $surat->ttl_anak}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk_anak" id="jk_anak" value="{{ $surat->jk_anak}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan_anak" id="kewarganegaraan_anak" value="{{ $surat->kewarganegaraan_anak}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Agama</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->agama_anak}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->status_perkawinan_anak}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->pekerjaan_anak}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Alamat</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->alamat_anak}}" disabled />
                    </div>
                </div>

                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Kehilangan')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Nomor KK/NIK </label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kk_nik}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kewarganegaraan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> Nama Barang </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->nama_barang }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> Hari/Tgl. Kehilangan </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->tgl_hilang}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> Waktu Hilang </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->waktu_hilang }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> Lokasi Hilang </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->lokasi_hilang }}" disabled />
                    </div>
                </div>
                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Belum Nikah')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Nomor KK/NIK </label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kk_nik}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <tr>
                    <div class="col-12 my-2">
                        <div class="form-group">
                            <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Pendidikan Terakhir </label>
                            <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->pendidikan_trakhir}}" disabled />
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <div class="form-group">
                            <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                            <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                        </div>
                    </div>

                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Tidak Mampu')

                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nomor KK/NIK</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->kk_nik }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Tempat tanggal lahir</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->jk }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Agama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->agama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->status_perkawinan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->kewarganegaraan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Pendidikan</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->pendidikan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama Ayah/Ibu</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama_ayah_ibu }}" disabled />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Alamat Lengkap</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat_lengkap}}"</textarea>
                    </div>
                </div>

                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Jenis Tanda tangan</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->kttd }}" disabled />
                    </div>
                </div>


                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Duda Janda')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Nomor KK/NIK </label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kk_nik}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kewarganegaraan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk"> Keterangan Status Pernikahan </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->keterangan_status }}" disabled />
                    </div>
                </div>

                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Domisili')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Nomor KK/NIK </label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kk_nik}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kewarganegaraan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Pendidikan</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->pendidikan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                    </div>
                </div>

                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Usaha')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kewarganegaraan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">No Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="no_kk" id="no_kk" value="{{ $surat->no_kk }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Jenis Usaha</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->jenis_usaha}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Lama Usaha</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->selama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat Usaha</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat_usaha}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Keperluan Surat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->keperluan_surat}}" disabled />
                    </div>
                </div>

                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Pengantar Keterangan Catatan Kepolisian')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kewarganegaraan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Pendidikan Terakhir</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->pendidikan_trakhir}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Keperluan Surat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->keperluan}}" disabled />
                    </div>
                </div>

                

                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Pernyataan Akad Nikah')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Status Pelapor</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->status_pelapor}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Status</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->status}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Telah Mendaftar Di KUA</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->daftar_kua}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Hari Daftar</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->hari_daftar}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tanggal Daftar</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->tanggal_daftar}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Keperluan Surat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->keperluan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Nama Wanita</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_wanita }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Nama Pria</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_pria }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Waktu Acara</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->waktu_acara}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tanggal Acara</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->tanggal_acara}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat Acara</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat_acara}}" disabled />
                    </div>
                </div>

                

                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Kelahiran')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Hari</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->hari }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tanggal</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->tanggal }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Tempat Lahir</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->tempat_lahir}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Anak Ke</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->anak_ke }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->kelamin}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Nama Anak</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_anak}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Nama Ibu</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_ibu}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Umur</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->umur}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Agama</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->agama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Nama Ayah</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_ayah}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Agama Ayah</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->agama_ayah }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Pekerjaan Ayah</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->pekerjaan_ayah }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->kewarganegaraan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Nama Pelapor</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_pelapor}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Hubungan Pelapor Dengan Anak</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->hub_pelapor_anak}}" disabled />
                    </div>
                </div>

                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Pengantar Pembuatan Kartu Keluarga')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">NIK</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->nik }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Tempat Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->ttl}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Nomor Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->no_kk}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->kewarganegaraan }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Agama</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->agama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->pekerjaan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Keperluan Surat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->keperluan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Keterangan Surat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->keterangan_surat}}" disabled />
                    </div>
                </div>

                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Beda Nama Data')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nomor Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->kk }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Atas Nama Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ankk }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Ayah Atas Nama Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->ayahkk}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Ibu Atas Nama Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->ibukk }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Daya Yang Benar</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->data_benar}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Atas Nama</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->atas_nama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Yang Ingin Di Perbaiki</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->perbaikan_data}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Keterangan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->keterangan}}" disabled />
                    </div>
                </div>

                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Kematian')


                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Nik</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->nik }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->kelamin}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="no_kk">Umur</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->umur }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->pekerjaan}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat</label>
                        <textarea id="isi_laporan" name="isi_laporan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-secondary  rounded-lg border @error('isi_laporan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" disabled>{{ $surat->alamat}}"</textarea>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Hari Meninggal</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->hari_meninggal}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tanggal Meninggal</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->tanggal_meninggal}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat Meninggal</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->tempat_meninggal}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Nama Pelapor</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_pelapor}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Nik Pelapor</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nik_pelapor }}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Hubungan Pelapor Dengan Almarhum</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->hub_pelapor_almarhum }}" disabled />
                    </div>
                </div>

                



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Pernyataan Ahli Waris')



                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Nama Almarhum</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_almarhum}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Nama Anak Pertama</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_pertama}}" disabled />
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->ttl_pertama}}" disabled />
                    </div>
                </div>
                <<div class="col-12 my-2">
                    <div class="form-group">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat </label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat_pertama }}" disabled />
                    </div>

                    @for ($i = 1; $i <= 10; $i++) @if (isset($surat->{'nama' . $i}))
                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Nama Tambahan {{ $i }} </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->{'nama' . $i} }}" disabled />
                            </div>
                        </div>
                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Tempat tanggal lahir Tambahan {{ $i }} </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->{'ttl' . $i} }}" disabled />
                            </div>
                        </div>
                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Alamat Tambahan {{ $i }} </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->{'alamat' . $i} }}" disabled />
                            </div>
                        </div>
                        @endif
                        @endfor

                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Warisan </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->warisan }}" disabled />
                            </div>
                        </div>
                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl"> Nama Penerima </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_penerima }}" disabled />
                            </div>
                        </div>
                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Tempat, Tanggal Lahir Penerima </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->ttl_penerima }}" disabled />
                            </div>
                        </div>
                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="ttl">Alamat Penerima </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat_penerima }}" disabled />
                            </div>
                        </div>
                       


                        @endif

                        <div class="layout__buktiFoto row my-2 lg:p-4">
                            <p class="textDashboard text-base text-[13px] lg:text-lg font-normal text-secondary">*Bukti foto persyaratan surat</p>
                            <div class="col-md-4 my-2">
                                <div class="form-group">
                                    <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">KTP</label>
                                    @if ($surat->fotoktp)
                                    <div class="row">
                                        <div class="col-6 thumbnail-container overflow-hidden bg-light">
                                             <a href="{{ asset('storage/' . $surat->fotoktp) }}" target="_blank" data-lightbox="fotoktp">
                                                <div class="thumbnail-containero verflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                                    <img src="{{ asset('storage/' . $surat->fotoktp) }}" alt="Foto KTP" class="thumbnail-image position-absolute top-0 start-0 w-100 h-100" alt="..." style="object-fit: contain;">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @else
                                    Foto tidak tersedia
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 my-2">
                                <div class="form-group w-full">
                                    <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Kartu keluarga</label>
                                    @if ($surat->fotokk)
                                    <div class="row">
                                        <div class="col-6 thumbnail-container overflow-hidden bg-light">
                                             <a href="{{asset('storage/' . $surat->fotokk) }}" target="_blank" data-lightbox="fotokk">
                                                <div class="thumbnail-container  overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                                    <img src="{{ asset('storage/' . $surat->fotokk) }}" alt="Foto KK" class="thumbnail-image position-absolute top-0 start-0 w-100 h-100" alt="..." style="object-fit: contain;">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @else
                                    Foto tidak tersedia
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4 my-2">
                                <div class="form-group w-full">
                                    <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Surat Keterangan RT</label>
                                    @if ($surat->fotoketeranganrt)
                                    <div class="row">
                                        <div class="col-6 thumbnail-container rounded-20 overflow-hidden">
                                            <a href="{{asset('storage/' . $surat->fotoketeranganrt) }}" target="_blank" data-lightbox="fotoketeranganrt">
                                                <div class="thumbnail-container  overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                                    <img src="{{ asset('storage/' . $surat->fotoketeranganrt) }}" alt="Foto Keterangan RT/RW" class="thumbnail-image position-absolute top-0 start-0 w-100 h-100" alt="..." style="object-fit: contain;">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @else
                                    Foto tidak tersedia
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label class="after:content-['*'] after:ml-0.5 after:text-danger" for="nama">Pesan untuk Petugas/Admin</label>
                                <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $pengajuan_surat->pesan }}" disabled />
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>



@endsection