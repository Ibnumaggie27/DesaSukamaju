<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PengajuanSuratController extends Controller
{

    public function index()
    {
        if (Auth::user()->level == 'masyarakat') {
            $pengajuan_saya = PengajuanSurat::with('masyarakat')
                ->whereMasyarakatId(Auth::user()->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else if (Auth::user()->level == 'petugas') {
            $pengajuan_saya = PengajuanSurat::with('masyarakat')
                ->whereIn("status", ["Pending", "Selesai", "beres"])
                ->orderBy('created_at', 'desc')
                ->get();
        } else if (in_array(Auth::user()->level, ['kesra', 'pelayanan', 'pemerintahan'])) {
            $pengajuan_saya = PengajuanSurat::with('masyarakat')
                ->whereIn("status", ["verifikasi"])
                ->orderBy('created_at', 'desc')
                ->get();
        } else if (Auth::user()->level == 'admin') {
            $pengajuan_saya = PengajuanSurat::with('masyarakat')
                ->whereIn("status", ["Diproses", "Selesai"])
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('pengajuan_surat.index', [
            'title' => 'Pengajuan Surat Online',
            'pengajuan_saya' => $pengajuan_saya
        ]);
    }

    public function search(Request $request)
    {

        $search = $request->input('search');


        $PengajuanSurat = PengajuanSurat::whereRaw("DATE_FORMAT(created_at, '%d %M %Y') LIKE '%" . $search . "%'")
            ->orWhere('jenis_surat', 'LIKE', '%' . $search . '%')
            ->orWhere('status', 'LIKE', '%' . $search . '%')
            ->orWhereHas('masyarakat', function ($query) use ($search) {
                $query->where('nama', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('masyarakat', function ($query) use ($search) {
                $query->where('telepon', 'LIKE', '%' . $search . '%');
            })
            ->with('masyarakat:id,nama,telepon')
            ->orderBy('created_at', 'desc')
            ->get();


        return response()->json($PengajuanSurat);
    }




    public function create(Request $request)
    {

        if ($request->surat == 'keterangan') {
            return view('pengajuan_surat.form_surat_keterangan', [
                'title' => 'Pengajuan Surat Keterangan',
            ]);
        } elseif ($request->surat === 'kelahiran') {
            return view('pengajuan_surat.form_surat_kelahiran', [
                'title' => 'Pengajuan Surat Keterangan Kelahiran',
            ]);
        } elseif ($request->surat === 'kematian') {
            return view('pengajuan_surat.form_surat_kematian', [
                'title' => 'Pengajuan Surat Keterangan Kematian',
            ]);
        } elseif ($request->surat === 'keterangan_domisili_haji') {
            return view('pengajuan_surat.form_surat_keterangan_domisili_haji', [
                'title' => 'Pengajuan Surat Keterangan Domisili Haji',
            ]);
        } elseif ($request->surat === 'keterangan_domisili_yayasan') {
            return view('pengajuan_surat.form_surat_keterangan_domisili_yayasan', [
                'title' => 'Pengajuan Surat Keterangan Domisili yayasan',
            ]);
        } elseif ($request->surat === 'keterangan_penguburan') {
            return view('pengajuan_surat.form_surat_keterangan_penguburan', [
                'title' => 'Pengajuan Surat Keterangan penguburan',
            ]);
        } elseif ($request->surat === 'keterangan_numpang_nikah') {
            return view('pengajuan_surat.form_surat_keterangan_numpang_nikah', [
                'title' => 'Pengajuan Surat Keterangan numpang nikah',
            ]);
        } elseif ($request->surat === 'keterangan_duda_janda') {
            return view('pengajuan_surat.form_surat_keterangan_duda_janda', [
                'title' => 'Pengajuan Surat Keterangan duda/janda',
            ]);
        } elseif ($request->surat === 'keterangan_tentang_perkawinan') {
            return view('pengajuan_surat.form_surat_keterangan_tentang_perkawinan', [
                'title' => 'Pengajuan Surat Keterangan tentang perkawinan',
            ]);
        } elseif ($request->surat === 'keterangan_belum_nikah') {
            return view('pengajuan_surat.form_surat_keterangan_belum_nikah', [
                'title' => 'Pengajuan Surat Keterangan belum nikah',
            ]);
        } elseif ($request->surat === 'keterangan_pindah_WNI') {
            return view('pengajuan_surat.form_surat_keterangan_pindah_WNI', [
                'title' => 'Pengajuan Surat Keterangan pindah WNI',
            ]);
        } elseif ($request->surat === 'keterangan_pindah') {
            return view('pengajuan_surat.form_surat_keterangan_pindah', [
                'title' => 'Pengajuan Surat Keterangan pindah',
            ]);
        } elseif ($request->surat === 'keterangan_tidak_mampu') {
            return view('pengajuan_surat.form_surat_keterangan_tidak_mampu', [
                'title' => 'Pengajuan Surat Keterangan tidak mampu',
            ]);
        } elseif ($request->surat === 'keterangan_usaha') {
            return view('pengajuan_surat.form_surat_keterangan_usaha', [
                'title' => 'Pengajuan Surat Keterangan usaha',
            ]);
        } elseif ($request->surat === 'keterangan_domisili') {
            return view('pengajuan_surat.form_surat_keterangan_domisili', [
                'title' => 'Pengajuan Surat Keterangan domisili',
            ]);
        } elseif ($request->surat === 'keterangan_beda_nama_data') {
            return view('pengajuan_surat.form_surat_keterangan_beda_nama_data', [
                'title' => 'Pengajuan Surat Keterangan beda nama/data',
            ]);
        } elseif ($request->surat === 'keterangan_kehilangan') {
            return view('pengajuan_surat.form_surat_keterangan_kehilangan', [
                'title' => 'Pengajuan Surat Keterangan kehilangan',
            ]);
        } elseif ($request->surat === 'keterangan_orang_tua_wali') {
            return view('pengajuan_surat.form_surat_keterangan_orang_tua_wali', [
                'title' => 'Pengajuan Surat Keterangan orang tua wali',
            ]);
        } elseif ($request->surat === 'pengantar_pembuatan_kartu_keluarga') {
            return view('pengajuan_surat.form_surat_pengantar_Pembuatan_kartu_keluarga', [
                'title' => 'Pengajuan Surat pembuatan kartu keluarga',
            ]);
        } elseif ($request->surat === 'pengantar_keterangan_catatan_kepolisian') {
            return view('pengajuan_surat.form_surat_pengantar_keterangan_catatan_kepolisian', [
                'title' => 'Pengajuan Surat pengatar keterangan catatan kepolisian',
            ]);
        } elseif ($request->surat === 'surat_pernyataan_akad_nikah') {
            return view('pengajuan_surat.form_surat_pernyataan_akad_nikah', [
                'title' => 'Pengajuan Surat pernyataan akad nikah',
            ]);
        } elseif ($request->surat === 'surat_pernyataan_ahli_waris') {
            return view('pengajuan_surat.form_surat_pernyataan_ahli_waris', [
                'title' => 'Pengajuan Surat pernyataan ahli waris',
            ]);
        } else {
            return redirect()->route('pengajuan-surat.index');
        }
    }


    public function store(Request $request)
    {
        if ($request->jenis_surat == 'keterangan') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'no_kk' => 'required',
                'negara_agama' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keperluan' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', $nama_photo);
                    $data[$photoField] = $path;
                }
            }


            $data['jenis_surat'] = 'Surat Keterangan';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'keterangan Domisili Haji') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'no_kk' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'JK' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Domisili Haji';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'keterangan Domisili Yayasan') {
            $request->validate([
                'nama_pimpinan' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'JK' => 'required',
                'pekerjaan' => 'required',
                'kewarganegaraan' => 'required',
                'alamat' => 'required',
                'nama_yayasan' => 'required',
                'jenis_yayasan' => 'required',
                'alamat_yayasan' => 'required',
                'akta_pendirian' => 'required',
                'sk_kemenkumham' => 'required',
                'jumlah_pengurus' => 'required',
                'penanggung_jawab_yayasan' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Domisili Yayasan';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'keterangan Penguburan') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'JK' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'hari_tanggal' => 'required',
                'tempat_meninggal' => 'required',
                'dikuburkan' => 'required',
                'waktu' => 'required',
                'tempat_penguburan' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Penguburan';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'keterangan Tentang Perkawinan') {
            $request->validate([
                'nama_laki' => 'required',
                'ttl' => 'required',
                'pekerjaan_laki' => 'required',
                'kewarganegaraan_laki' => 'required',
                'alamat_laki' => 'required',
                'nama_perempuan' => 'required',
                'ttl_perempuan' => 'required',
                'pekerjaan_perempuan' => 'required',
                'kewarganegaraan_perempuan' => 'required',
                'alamat_perempuan' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Tentang Perkawinan';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'keterangan Numpang Nikah') {
            $request->validate([
                'nama' => 'required',
                'bin' => 'required',
                'nik' => 'required',
                'ttl' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'status_pernikahan' => 'required',
                'pekerjaan' => 'required',
                'tempat_tinggal' => 'required',
                'nama_perempuan' => 'required',
                'bin_perempuan' => 'required',
                'nik_perempuan' => 'required',
                'ttl_perempuan' => 'required',
                'kewarganegaraan_perempuan' => 'required',
                'agama_perempuan' => 'required',
                'status_pernikahan_perempuan' => 'required',
                'pekerjaan_perempuan' => 'required',
                'tempat_tinggal_perempuan' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Numpang Nikah';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'keterangan Kehilangan') {
            $request->validate([
                'nama' => 'required',
                'kk_nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'kewarganegaraan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Kehilangan';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'keterangan Belum Nikah') {
            $request->validate([
                'nama' => 'required',
                'kk_nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'pendidikan_trakhir' => 'required',
                'alamat' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Belum Nikah';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'keterangan Tidak Mampu') {
            $request->validate([
                'nama' => 'required',
                'kk_nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'kewarganegaraan' => 'required',
                'pendidikan' => 'required',
                'pekerjaan' => 'required',
                'nama_ayah_ibu' => 'required',
                'alamat_lengkap' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Tidak Mampu';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'Keterangan Duda Janda') {
            $request->validate([
                'nama' => 'required',
                'kk_nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'kewarganegaraan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keterangan_status' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Duda Janda';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'keterangan Domisili') {
            $request->validate([
                'nama' => 'required',
                'kk_nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'kewarganegaraan' => 'required',
                'pendidikan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Domisili';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'Keterangan Pindah WNI') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'no_kk' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keperluan' => 'required',
                'keterangan_surat' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Pindah WNI';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'Keterangan Pindah') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'no_kk' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keperluan' => 'required',
                'keterangan_surat' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Pindah';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'keterangan Orang Tua Wali') {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'nama_anak' => 'required',
                'nik_anak' => 'required',
                'ttl_anak' => 'required',
                'jk_anak' => 'required',
                'kewarganegaraan_anak' => 'required',
                'agama_anak' => 'required',
                'status_perkawinan_anak' => 'required',
                'pekerjaan_anak' => 'required',
                'alamat_anak' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Orang Tua Wali';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'keterangan Usaha') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'kewarganegaraan' => 'required',
                'status_perkawinan' => 'required',
                'agama' => 'required',
                'pekerjaan' => 'required',
                'no_kk' => 'required',
                'nik' => 'required',
                'alamat' => 'required',
                'jenis_usaha' => 'required',
                'selama' => 'required',
                'alamat_usaha' => 'required',
                'keperluan_surat' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Usaha';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'Pengantar Keterangan Catatan Kepolisian') {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'agama' => 'required',
                'kewarganegaraan' => 'required',
                'status_perkawinan' => 'required',
                'pendidikan_trakhir' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Pengantar Keterangan Catatan Kepolisian';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'Pengantar Pembuatan Kartu Keluarga') {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'ttl' => 'required',
                'no_kk' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keperluan' => 'required',
                'keterangan_surat' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Pengantar Pembuatan Kartu Keluarga';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'Pernyataan Akad Nikah') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'status_pelapor' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'status' => 'required',
                'daftar_kua' => 'required',
                'hari_daftar' => 'required',
                'tanggal_daftar' => 'required',
                'keperluan' => 'required',
                'nama_wanita' => 'required',
                'nama_pria' => 'required',
                'waktu_acara' => 'required',
                'tanggal_acara' => 'required',
                'alamat_acara' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Pernyataan Akad Nikah';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'Pernyataan Ahli Waris') {
            // Inisialisasi aturan validasi
            $request->validate([
                'nama_almarhum' => 'required',
                'nama_pertama' => 'required',
                'ttl_pertama' => 'required',
                'alamat_pertama' => 'required',
                'warisan' => 'required',
                'nama_penerima' => 'required',
                'ttl_penerima' => 'required',
                'alamat_penerima' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Pernyataan Ahli Waris';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'Keterangan Beda Nama Data') {
            // Inisialisasi aturan validasi
            $request->validate([
                'kk' => 'required',
                'ankk' => 'required',
                'ayahkk' => 'required',
                'ibukk' => 'required',
                'data_benar' => 'required',
                'atas_nama' => 'required',
                'perbaikan_data' => 'required',
                'keterangan' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Keterangan Beda Nama Data';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'kelahiran') {
            $request->validate([
                'hari' => 'required',
                'tanggal' => 'required',
                'tempat_lahir' => 'required',
                'anak_ke' => 'required',
                'kelamin' => 'required',
                'nama_anak' => 'required',
                'nama_ibu' => 'required',
                'umur' => 'required',
                'agama' => 'required',
                'nama_ayah' => 'required',
                'umur_ayah' => 'required',
                'agama_ayah' => 'required',
                'pekerjaan_ayah' => 'required',
                'kewarganegaraan' => 'required',
                'alamat' => 'required',
                'nama_pelapor' => 'required',
                'hub_pelapor_anak' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Kelahiran';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        } elseif ($request->jenis_surat == 'kematian') {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'kelamin' => 'required',
                'umur' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'hari_meninggal' => 'required',
                'tanggal_meninggal' => 'required',
                'tempat_meninggal' => 'required',
                'meninggal_karena' => 'required',
                'nama_pelapor' => 'required',
                'nik_pelapor' => 'required',
                'hub_pelapor_almarhum' => 'required',
                'kttd' => 'required',
                'fotoktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotokk' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
                'fotoketeranganrt' => 'required|image|mimes:jpeg,png,jpg,gif|max:7048',
            ], [
                'fotoktp.required' => 'Foto KTP harus diunggah.',
                'fotokk.required' => 'Foto KK harus diunggah.',
                'fotoketeranganrt.required' => 'Foto Keterangan RT/RW harus diunggah.',
            ]);

            $data = $request->except('_token');

            // Memproses foto-foto yang diunggah
            foreach (['fotoktp', 'fotokk', 'fotoketeranganrt'] as $photoField) {
                if ($request->hasFile($photoField)) {
                    $photo = $request->file($photoField);
                    $nama_photo = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();
                    $path = $photo->store('public/Persyaratan', 'public');
                    $data[$photoField] = $path;
                }
            }

            $data['jenis_surat'] = 'Surat Kematian';

            // Simpan data ke database atau lakukan operasi lainnya sesuai kebutuhan
        }

        PengajuanSurat::create([
            'masyarakat_id' => Auth::user()->id,
            'pesan' => $data['pesan'] ?? '-',
            'jenis_surat' => $data['jenis_surat'],
            'surat' => json_encode($data),
            'status' => 'Pending'
        ]);

        return redirect()->route('pengajuan-surat.index')->with('berhasil', 'Berhasil membuat pengajuan surat');
    }


    public function show(PengajuanSurat $pengajuanSurat)
    {
        if (Auth::user()->level == 'masyarakat') {
            if (Auth::user()->id == $pengajuanSurat->masyarakat_id) {
                return view('pengajuan_surat.detail', [
                    'title' => 'Detail Pengajuan Surat',
                    'pengajuan_surat' => $pengajuanSurat
                ]);
            } else {
                return redirect('/');
            }
        } else {
            return view('pengajuan_surat.detail', [
                'title' => 'Detail Pengajuan Surat',
                'pengajuan_surat' => $pengajuanSurat
            ]);
        }
    }


    public function approve(PengajuanSurat $pengajuanSurat)
    {
        if (Auth::user()->level != 'masyarakat') {
            $pengajuanSurat->update(['status' => 'Diproses']);
            return redirect()->route('pengajuan-surat.index')->with('berhasil', 'Berhasil diproses pengajuan surat!');
        } else {
            return redirect('/');
        }
    }

    public function verifikasi(Request $request, PengajuanSurat $pengajuanSurat)
{
    // Simpan inputan lama
    $surat = json_decode($pengajuanSurat->surat, true);

    // Validasi inputan baru sesuai dengan jenis surat
    if (in_array($pengajuanSurat->jenis_surat, ['Surat Keterangan Tidak Mampu', 'Surat Keterangan Domisili Haji', 'Surat Keterangan Kehilangan','Surat Pengantar Keterangan Catatan Kepolisian','Surat Keterangan Domisili Yayasan'])) {
        $request->validate([
            'keperluan' => 'required',
        ]);
    } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Belum Nikah') {
        $request->validate([
            'benar_nikah' => 'required',
            'perlu' => 'required',
        ]);
    } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili') {
        $request->validate([
            'berlaku' => 'required',
            'keperluan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Usaha') {
        $request->validate([
            'berlaku_mulai' => 'required',
            'keperluan_surat' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {
        $request->validate([
            'kepentingan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Duda Janda') {
        $request->validate([
            'keterangan_status' => 'required',
        ]);
    }

    // Menyesuaikan bidang yang disimpan berdasarkan jenis surat
    $fieldsToKeep = [];
    if ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tidak Mampu' || $pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji' || $pengajuanSurat->jenis_surat === 'Surat Keterangan Kehilangan'|| $pengajuanSurat->jenis_surat === 'Surat Pengantar Keterangan Catatan Kepolisian'|| $pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
        $fieldsToKeep = ['keperluan'];
    } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Belum Nikah') {
        $fieldsToKeep = ['benar_nikah','perlu'];
    } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili') {
        $fieldsToKeep = ['berlaku', 'keperluan'];
    }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Usaha') {
        $fieldsToKeep = ['berlaku_mulai', 'keperluan_surat'];
    }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {
        $fieldsToKeep = ['kepentingan'];
    }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Duda Janda') {
        $fieldsToKeep = ['keterangan_status'];
    }

    // Hanya menyimpan bidang yang sesuai dengan jenis surat yang sedang diproses
    $data = $request->only($fieldsToKeep);

    // Update status pengajuan surat
    if (Auth::user()->level != 'masyarakat') {
        $pengajuanSurat->update(['status' => 'verifikasi']);

        // Menambahkan bidang yang sesuai dengan jenis surat yang sedang diproses
        $surat = array_merge($surat, $data);

        $pengajuanSurat->update(['surat' => json_encode($surat)]);

        return redirect()->route('pengajuan-surat.index')->with('berhasil', 'Berhasil verifikasi pengajuan surat!');
    } else {
        return redirect('/');
    }
}

    public function reject(Request $request, PengajuanSurat $pengajuanSurat)
{
    // Pengecekan jenis surat
    if ($pengajuanSurat->jenis_surat == 'Surat Keterangan Domisili Haji') {
        $request->validate([
            'catatan' => 'required',
        ]);
    
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Domisili yayasan'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Penguburan'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Numpang Nikah'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Duda Janda'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Tentang Perkawinan'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Belum Nikah'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Pindah WNI'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Pindah'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Tidak Mampu'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Usaha'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Domisili'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Beda Nama Data'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Kehilangan'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Keterangan Orang Tua Wali'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Pengantar Pembuatan Kartu Keluarga'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Pengantar Keterangan Catatan Kepolisian'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Pernyataan Akad Nikah'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Pernyataan Ahli Waris'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Kematian'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }elseif ($pengajuanSurat->jenis_surat == 'Surat Kelahiran'){
        $request->validate([
            'catatan' => 'required',
        ]);
    }
    
        // Update data dan simpan catatan petugas
        $pengajuanSurat->update([
            'status' => 'Ditolak',
            'catatan' => $request->catatan,
        ]);
    return redirect()->route('pengajuan-surat.index')->with('berhasil', 'Berhasil menolak pengajuan surat!');
}

    public function romawi($num)
    {
        $romans = array(
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII'
        );

        return $romans[$num];
    }

    public function jumlahSurat($jenis)
    {
        $jumlahSurat = PengajuanSurat::where('jenis_surat', $jenis)->count();

        return $jumlahSurat;
    }

    public function edit(PengajuanSurat $pengajuanSurat)
    {
        $bulanRomawi = $this->romawi(date("n"));

        $jumlahSurat = $this->jumlahSurat($pengajuanSurat->jenis_surat);
        $nomorSurat = $jumlahSurat;

        if (Auth::user()->level == 'masyarakat') {
            return redirect('/');
        } else {
            if ($pengajuanSurat->status == 'Diproses') {
                if ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {

                    $nomor_surat = '456/' . $nomorSurat . '/KESRA/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_keterangan_domisili_haji', [
                        'title' => 'Proses Surat Keterangan Dimisili Haji',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {

                    $nomor_surat = '500/' . $nomorSurat . '/EKB/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_keterangan_domisili_yayasan', [
                        'title' => 'Proses Surat Keterangan Dimisili Yayasan',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {

                    $nomor_surat = '469.1/' . $nomorSurat . '/PEM/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_keterangan_penguburan', [
                        'title' => 'Proses Surat Keterangan Penguburan',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {

                    $nomor_surat = '472.2/' . $nomorSurat . '/KESRA/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_keterangan_tentang_perkawinan', [
                        'title' => 'Proses Surat Keterangan tentang perkawinan',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Numpang Nikah') {

                    $nomor_surat = '472.2/' . $nomorSurat . '/KESRA/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_keterangan_numpang_nikah', [
                        'title' => 'Proses Surat Keterangan numpang nikah',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Orang Tua Wali') {

                    $nomor_surat = '470/' . $nomorSurat . '/PEM/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_keterangan_orang_tua_wali', [
                        'title' => 'Proses Surat Keterangan orang tua wali',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Kehilangan') {

                    $nomor_surat = '470/' . $nomorSurat . '/PEM/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_keterangan_kehilangan', [
                        'title' => 'Proses Surat Keterangan kehilangan',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Belum Nikah') {

                    $nomor_surat = '472.2/' . $nomorSurat . '/KESRA/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_keterangan_belum_nikah', [
                        'title' => 'Proses Surat Keterangan Belum Nikah',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tidak Mampu') {

                    $nomor_surat = '400/' . $nomorSurat . '/KESRA/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_keterangan_tidak_mampu', [
                        'title' => 'Proses Surat Keterangan Tidak Mampu',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Duda Janda') {

                    $nomor_surat = '474.2/' . $nomorSurat . '/KESRA/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_keterangan_duda_janda', [
                        'title' => 'Proses Surat Keterangan Duda Janda',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili') {

                    $nomor_surat = '471.1/' . $nomorSurat . '/PEM/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_keterangan_domisili', [
                        'title' => 'Proses Surat Keterangan Domisili',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Usaha') {

                    $nomor_surat = '510/' . $nomorSurat . '/EKB/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_keterangan_usaha', [
                        'title' => 'Proses Surat Keterangan Usaha',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pengantar Keterangan Catatan Kepolisian') {

                    $nomor_surat = '331.1/' . $nomorSurat . '/PEL/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_pengantar_keterangan_catatan_kepolisian', [
                        'title' => 'Proses Surat Keterangan catatan Kepolisian',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Akad Nikah') {

                    $nomor_surat = '472.2/' . $nomorSurat . '/KESRA/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_pernyataan_akad_nikah', [
                        'title' => 'Proses Surat pernyataan Akad Nikah',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Ahli Waris') {

                    $nomor_surat = '470/' . $nomorSurat . '/PEM/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_pernyataan_ahli_waris', [
                        'title' => 'Proses Surat pernyataan Ahli Waris',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Beda Nama Data') {

                    $nomor_surat = '470/' . $nomorSurat . '/PEM/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_keterangan_beda_nama_data', [
                        'title' => 'Proses Surat Keterangan Beda Nama Data',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {

                    $nomor_surat = '472.1.11/' . $nomorSurat . '/PEM/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_kelahiran', [
                        'title' => 'Proses Surat Keterangan Kelahiran',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {

                    $nomor_surat = '472.1.12/' . $nomorSurat . '/PEM/' . $bulanRomawi . '/' . date("Y");

                    return view('pengajuan_surat.proses_surat_kematian', [
                        'title' => 'Proses Surat Keterangan Kematian',
                        'pengajuan_surat' => $pengajuanSurat,
                        'nomor_surat' => $nomor_surat
                    ]);
                } else {
                    return redirect()->route('pengajuan-surat.index');
                }
            } else {
                return redirect('/');
            }
        }
    }

    public function update(Request $request, PengajuanSurat $pengajuanSurat)
   {
        if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'no_kk' => 'required',
                'negara_agama' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keperluan' => 'required',
                'kode_desa' => 'required',
                'nomor_surat' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'no_kk' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'JK' => 'required',
                'keperluan' => 'required',
                'nomor_surat' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
            $request->validate([
                'nama_pimpinan' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'JK' => 'required',
                'pekerjaan' => 'required',
                'kewarganegaraan' => 'required',
                'alamat' => 'required',
                'nama_yayasan' => 'required',
                'jenis_yayasan' => 'required',
                'alamat_yayasan' => 'required',
                'akta_pendirian' => 'required',
                'sk_kemenkumham' => 'required',
                'jumlah_pengurus' => 'required',
                'penanggung_jawab_yayasan' => 'required',
                'keperluan' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'JK' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'hari_tanggal' => 'required',
                'tempat_meninggal' => 'required',
                'dikuburkan' => 'required',
                'waktu' => 'required',
                'tempat_penguburan' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {
            $request->validate([
                'nama_laki' => 'required',
                'ttl' => 'required',
                'pekerjaan_laki' => 'required',
                'kewarganegaraan_laki' => 'required',
                'alamat_laki' => 'required',
                'nama_perempuan' => 'required',
                'ttl_perempuan' => 'required',
                'pekerjaan_perempuan' => 'required',
                'kewarganegaraan_perempuan' => 'required',
                'alamat_perempuan' => 'required',
                'hari_nikah' => 'required',
                'tanggal_nikah' => 'required',
                'kepentingan' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Numpang Nikah') {
            $request->validate([
                'nama' => 'required',
                'bin' => 'required',
                'nik' => 'required',
                'ttl' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'status_pernikahan' => 'required',
                'pekerjaan' => 'required',
                'tempat_tinggal' => 'required',
                'nama_perempuan' => 'required',
                'bin_perempuan' => 'required',
                'nik_perempuan' => 'required',
                'ttl_perempuan' => 'required',
                'kewarganegaraan_perempuan' => 'required',
                'agama_perempuan' => 'required',
                'status_pernikahan_perempuan' => 'required',
                'pekerjaan_perempuan' => 'required',
                'tempat_tinggal_perempuan' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Orang Tua Wali') {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'nama_anak' => 'required',
                'nik_anak' => 'required',
                'ttl_anak' => 'required',
                'jk_anak' => 'required',
                'ket' => 'required',
                'kewarganegaraan_anak' => 'required',
                'agama_anak' => 'required',
                'status_perkawinan_anak' => 'required',
                'pekerjaan_anak' => 'required',
                'alamat_anak' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Kehilangan') {
            $request->validate([
                'nama' => 'required',
                'kk_nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'kewarganegaraan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keperluan' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Belum Nikah') {
            $request->validate([
                'nama' => 'required',
                'kk_nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'pendidikan_trakhir' => 'required',
                'alamat' => 'required',
                'perlu' => 'required',
                'benar_nikah' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tidak Mampu') {
            $request->validate([
                'nama' => 'required',
                'kk_nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'kewarganegaraan' => 'required',
                'pendidikan' => 'required',
                'pekerjaan' => 'required',
                'nama_ayah_ibu' => 'required',
                'keperluan' => 'required',
                'alamat_lengkap' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Duda Janda') {
            $request->validate([
                'nama' => 'required',
                'kk_nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'kewarganegaraan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keterangan_status' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili') {
            $request->validate([
                'nama' => 'required',
                'kk_nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'kewarganegaraan' => 'required',
                'pendidikan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'berlaku' => 'required',
                'keperluan' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Usaha') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'kewarganegaraan' => 'required',
                'status_perkawinan' => 'required',
                'agama' => 'required',
                'pekerjaan' => 'required',
                'no_kk' => 'required',
                'nik' => 'required',
                'alamat' => 'required',
                'jenis_usaha' => 'required',
                'selama' => 'required',
                'alamat_usaha' => 'required',
                'berlaku_mulai' => 'required',
                'keperluan_surat' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Pindah WNI') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'no_kk' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keperluan' => 'required',
                'keterangan_surat' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Pindah') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'no_kk' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keperluan' => 'required',
                'keterangan_surat' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Pengantar Keterangan Catatan Kepolisian') {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'ttl' => 'required',
                'jk' => 'required',
                'agama' => 'required',
                'kewarganegaraan' => 'required',
                'status_perkawinan' => 'required',
                'pendidikan_trakhir' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keperluan' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Pengantar Pembuatan Kartu Keluarga') {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'ttl' => 'required',
                'no_kk' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keperluan' => 'required',
                'keterangan_surat' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Akad Nikah') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'status_pelapor' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'status' => 'required',
                'daftar_kua' => 'required',
                'hari_daftar' => 'required',
                'tanggal_daftar' => 'required',
                'keperluan' => 'required',
                'nama_wanita' => 'required',
                'nama_pria' => 'required',
                'waktu_acara' => 'required',
                'tanggal_acara' => 'required',
                'alamat_acara' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Ahli Waris') {
            $rules = [
                'nama_almarhum' => 'required',
                'nama_pertama' => 'required',
                'ttl_pertama' => 'required',
                'alamat_pertama' => 'required',
                'warisan' => 'required',
                'nama_penerima' => 'required',
                'ttl_penerima' => 'required',
                'alamat_penerima' => 'required',
            ];

            $request->validate($rules);

            $data = $request->except('_token');

            // Periksa setiap input tambahan
            for ($i = 1; $i <= 10; $i++) {
                if ($request->has('nama' . $i)) {
                    $data['nama' . $i] = $request['nama' . $i];
                    $data['ttl' . $i] = $request['ttl' . $i];
                    $data['alamat' . $i] = $request['alamat' . $i];
                }
            }

            // Update data sesuai dengan $data
            $pengajuanSurat->update($data);

            // Redirect atau lakukan tindakan lain yang sesuai
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Beda Nama Data') {
            $rules = [
                'kk' => 'required',
                'ankk' => 'required',
                'ayahkk' => 'required',
                'ibukk' => 'required',
                'data_benar' => 'required',
                'atas_nama' => 'required',
                'perbaikan_data' => 'required',
                'keterangan' => 'required',
            ];

            $request->validate($rules);

            $data = $request->except('_token');

            // Periksa setiap input tambahan
            for ($i = 1; $i <= 10; $i++) {
                if ($request->has('nama' . $i)) {
                    $data['nama' . $i] = $request['nama' . $i];
                    $data['nama_ayah' . $i] = $request['nama_ayah' . $i];
                    $data['nama_ibu' . $i] = $request['nama_ibu' . $i];
                }
            }
            for ($i = 1; $i <= 10; $i++) {
                if ($request->has("perbaikan$i")) {
                    $data["perbaikan$i"] = $request["perbaikan$i"];
                }
            }
            // Update data sesuai dengan $data
            $pengajuanSurat->update($data);

            // Redirect atau lakukan tindakan lain yang sesuai
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
            $request->validate([
                'hari' => 'required',
                'tanggal' => 'required',
                'tempat_lahir' => 'required',
                'anak_ke' => 'required',
                'kelamin' => 'required',
                'nama_anak' => 'required',
                'nama_ibu' => 'required',
                'umur' => 'required',
                'agama' => 'required',
                'nama_ayah' => 'required',
                'umur_ayah' => 'required',
                'agama_ayah' => 'required',
                'pekerjaan_ayah' => 'required',
                'kewarganegaraan' => 'required',
                'alamat' => 'required',
                'nama_pelapor' => 'required',
                'hub_pelapor_anak' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'kelamin' => 'required',
                'umur' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'hari_meninggal' => 'required',
                'tanggal_meninggal' => 'required',
                'tempat_meninggal' => 'required',
                'meninggal_karena' => 'required',
                'nama_pelapor' => 'required',
                'nik_pelapor' => 'required',
                'hub_pelapor_almarhum' => 'required',
            ]);

            $data = $request->except('_token');
        } else {
            return redirect()->route('pengajuan-surat.index');
        }

        $pengajuanSurat->update([
            'surat' => json_encode($data),
            'status' => 'Selesai'
        ]);

        return redirect()->route('pengajuan-surat.index')->with('berhasil', 'Berhasil membuat surat!');
    }


    public function destroy(PengajuanSurat $pengajuanSurat)
    {
        //
    }


    public function preview(PengajuanSurat $pengajuanSurat)
    {
        if (Auth::user()->level == 'masyarakat') {
            if ($pengajuanSurat->status == 'Selesai' && $pengajuanSurat->masyarakat_id == Auth::user()->id) {
                if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_domisili_haji';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_domisili_yayasan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_penguburan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_tentang_perkawinan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Numpang Nikah') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_numpang_nikah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Pindah') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_pindah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Orang Tua Wali') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_orang_tua_wali';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Kehilangan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_kehilangan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Belum Nikah') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_belum_nikah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tidak Mampu') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_tidak_mampu';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Duda Janda') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_duda_janda';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_domisili';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Usaha') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_usaha';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pengantar Keterangan Catatan Kepolisian') {
                    $html = 'pengajuan_surat.templates.surat_pengantar_keterangan_catatan_kepolisian';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Akad Nikah') {
                    $html = 'pengajuan_surat.templates.surat_pernyataan_akad_nikah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Ahli Waris') {
                    $html = 'pengajuan_surat.templates.surat_pernyataan_ahli_waris';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Beda Nama Data') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_beda_nama_data';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
                    $html = 'pengajuan_surat.templates.surat_kelahiran';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
                    $html = 'pengajuan_surat.templates.surat_kematian';
                } else {
                    return redirect()->route('pengajuan-surat.index');
                }
            } else {
                return redirect('/');
            }
        } else {
            if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
                $html = 'pengajuan_surat.templates.surat_keterangan';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Pindah') {
                $html = 'pengajuan_surat.templates.surat_keterangan_pindah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
                $html = 'pengajuan_surat.templates.surat_keterangan_domisili_haji';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
                $html = 'pengajuan_surat.templates.surat_keterangan_domisili_yayasan';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
                $html = 'pengajuan_surat.templates.surat_keterangan_penguburan';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {
                $html = 'pengajuan_surat.templates.surat_keterangan_tentang_perkawinan';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Numpang Nikah') {
                $html = 'pengajuan_surat.templates.surat_keterangan_numpang_nikah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Orang Tua Wali') {
                $html = 'pengajuan_surat.templates.surat_keterangan_orang_tua_wali';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Kehilangan') {
                $html = 'pengajuan_surat.templates.surat_keterangan_kehilangan';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Belum Nikah') {
                $html = 'pengajuan_surat.templates.surat_keterangan_belum_nikah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tidak Mampu') {
                $html = 'pengajuan_surat.templates.surat_keterangan_tidak_mampu';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Duda Janda') {
                $html = 'pengajuan_surat.templates.surat_keterangan_duda_janda';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili') {
                $html = 'pengajuan_surat.templates.surat_keterangan_domisili';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Usaha') {
                $html = 'pengajuan_surat.templates.surat_keterangan_usaha';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Pengantar Keterangan Catatan Kepolisian') {
                $html = 'pengajuan_surat.templates.surat_pengantar_keterangan_catatan_kepolisian';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Akad Nikah') {
                $html = 'pengajuan_surat.templates.surat_pernyataan_akad_nikah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Ahli Waris') {
                $html = 'pengajuan_surat.templates.surat_pernyataan_ahli_waris';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Beda Nama Data') {
                $html = 'pengajuan_surat.templates.surat_keterangan_beda_nama_data';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
                $html = 'pengajuan_surat.templates.surat_kelahiran';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
                $html = 'pengajuan_surat.templates.surat_kematian';
            } else {
                return redirect()->route('pengajuan-surat.index');
            }
        }

        return Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView($html, [
            'pengajuan_surat' => $pengajuanSurat,
            'surat' => json_decode($pengajuanSurat->surat),
        ])->stream();
    }

    public function previewew(PengajuanSurat $pengajuanSurat)
    {
        if (Auth::user()->level == 'masyarakat') {
            if ($pengajuanSurat->status == 'Selesai' && $pengajuanSurat->masyarakat_id == Auth::user()->id) {
                if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_domisili_haji';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_domisili_yayasan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_penguburan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_tentang_perkawinan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Numpang Nikah') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_numpang_nikah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Orang Tua Wali') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_orang_tua_wali';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Kehilangan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_kehilangan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Belum Nikah') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_belum_nikah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tidak Mampu') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_tidak_mampu';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Duda Janda') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_duda_janda';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_domisili';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Usaha') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_usaha';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pengantar Keterangan Catatan Kepolisian') {
                    $html = 'pengajuan_surat.templates.surat_pengantar_keterangan_catatan_kepolisian';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Akad Nikah') {
                    $html = 'pengajuan_surat.templates.surat_pernyataan_akad_nikah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Ahli Waris') {
                    $html = 'pengajuan_surat.templates.surat_pernyataan_ahli_waris';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Beda Nama Data') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_beda_nama_data';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
                    $html = 'pengajuan_surat.templates.surat_kelahiran';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
                    $html = 'pengajuan_surat.templates.surat_kematian';
                } else {
                    return redirect()->route('pengajuan-surat.index');
                }
            } else {
                return redirect('/');
            }
        } else {
            if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_domisili_haji_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_domisili_yayasan_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_penguburan_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_tentang_perkawinan_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Numpang Nikah') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_numpang_nikah_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Orang Tua Wali') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_orang_tua_wali_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Kehilangan') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_kehilangan_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Belum Nikah') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_belum_nikah_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tidak Mampu') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_tidak_mampu_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Duda Janda') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_duda_janda_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_domisili_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Usaha') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_usaha_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Pengantar Keterangan Catatan Kepolisian') {
                $html = 'pengajuan_surat.templates.basah.surat_pengantar_keterangan_catatan_kepolisian_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Akad Nikah') {
                $html = 'pengajuan_surat.templates.basah.surat_pernyataan_akad_nikah_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Ahli Waris') {
                $html = 'pengajuan_surat.templates.basah.surat_pernyataan_ahli_waris_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Beda Nama Data') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_beda_nama_data_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
                $html = 'pengajuan_surat.templates.basah.surat_kelahiran_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
                $html = 'pengajuan_surat.templates.basah.surat_kematian_basah';
            } else {
                return redirect()->route('pengajuan-surat.index');
            }
        }

        return Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView($html, [
            'pengajuan_surat' => $pengajuanSurat,
            'surat' => json_decode($pengajuanSurat->surat),
        ])->stream();
    }

    public function download(PengajuanSurat $pengajuanSurat)
    {
        if (Auth::user()->level == 'masyarakat') {
            if ($pengajuanSurat->status == 'Selesai' && $pengajuanSurat->masyarakat_id == Auth::user()->id) {
                if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_domisili_haji';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_domisili_yayasan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_penguburan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_tentang_perkawinan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Pindah WNI') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_tentang_perkawinan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Numpang Nikah') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_numpang_nikah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Orang Tua Wali') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_orang_tua_wali';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Kehilangan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_kehilangan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Belum Nikah') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_belum_nikah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tidak Mampu') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_tidak_mampu';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Duda Janda') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_duda_janda';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_domisili';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Usaha') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_usaha';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pengantar Keterangan Catatan Kepolisian') {
                    $html = 'pengajuan_surat.templates.surat_pengantar_keterangan_catatan_kepolisian';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Akad Nikah') {
                    $html = 'pengajuan_surat.templates.surat_pernyataan_akad_nikah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Ahli Waris') {
                    $html = 'pengajuan_surat.templates.surat_pernyataan_ahli_waris';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Beda Nama Data') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_beda_nama_data';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
                    $html = 'pengajuan_surat.templates.surat_kelahiran';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
                    $html = 'pengajuan_surat.templates.surat_kematian';
                } else {
                    return redirect()->route('pengajuan-surat.index');
                }
            } else {
                return redirect('/');
            }
        } else {
            if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
                $html = 'pengajuan_surat.templates.surat_keterangan';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
                $html = 'pengajuan_surat.templates.surat_keterangan_domisili_haji';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
                $html = 'pengajuan_surat.templates.surat_keterangan_domisili_yayasan';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
                $html = 'pengajuan_surat.templates.surat_keterangan_penguburan';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {
                $html = 'pengajuan_surat.templates.surat_keterangan_tentang_perkawinan';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Numpang_nikah') {
                $html = 'pengajuan_surat.templates.surat_keterangan_numpang_nikah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Orang Tua Wali') {
                $html = 'pengajuan_surat.templates.surat_keterangan_orang_tua_wali';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Kehilangan') {
                $html = 'pengajuan_surat.templates.surat_keterangan_kehilangan';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Belum Nikah') {
                $html = 'pengajuan_surat.templates.surat_keterangan_belum_nikah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tidak Mampu') {
                $html = 'pengajuan_surat.templates.surat_keterangan_tidak_mampu';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Duda Janda') {
                $html = 'pengajuan_surat.templates.surat_keterangan_duda_janda';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili') {
                $html = 'pengajuan_surat.templates.surat_keterangan_domisili';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Usaha') {
                $html = 'pengajuan_surat.templates.surat_keterangan_usaha';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Pengantar Keterangan Catatan Kepolisian') {
                $html = 'pengajuan_surat.templates.surat_pengantar_keterangan_catatan_kepolisian';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Akad Nikah') {
                $html = 'pengajuan_surat.templates.surat_pernyataan_akad_nikah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Ahli Waris') {
                $html = 'pengajuan_surat.templates.surat_pernyataan_ahli_waris';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Beda Nama Data') {
                $html = 'pengajuan_surat.templates.surat_keterangan_beda_nama_data';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
                $html = 'pengajuan_surat.templates.surat_kelahiran';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
                $html = 'pengajuan_surat.templates.surat_kematian';
            } else {
                return redirect()->route('pengajuan-surat.index');
            }
        }

        return Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView($html, [
            'pengajuan_surat' => $pengajuanSurat,
            'surat' => json_decode($pengajuanSurat->surat),
        ])->download($pengajuanSurat->jenis_surat . '.pdf');
    }

    public function downloaded(PengajuanSurat $pengajuanSurat)
    {
        if (Auth::user()->level == 'admin') {
            if ($pengajuanSurat->status == 'beres') {
                if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan_domisili_haji_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan_domisili_yayasan_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan_penguburan_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan_tentang_perkawinan_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Numpang Nikah') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan_numpang_nikah_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Orang Tua Wali') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan_orang_tua_wali_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Kehilangan') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan_kehilangan_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Belum Nikah') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan_belum_nikah_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tidak Mampu') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan_tidak_mampu_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Duda Janda') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan_duda_janda_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan_domisili_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Usaha') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan_usaha_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pengantar Keterangan Catatan Kepolisian') {
                    $html = 'pengajuan_surat.templates.basah.surat_pengantar_keterangan_catatan_kepolisian_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Akad Nikah') {
                    $html = 'pengajuan_surat.templates.basah.surat_pernyataan_akad_nikah_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Ahli Waris') {
                    $html = 'pengajuan_surat.templates.basah.surat_pernyataan_ahli_waris_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Beda Nama Data') {
                    $html = 'pengajuan_surat.templates.basah.surat_keterangan_beda_nama_data_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
                    $html = 'pengajuan_surat.templates.basah.surat_kelahiran_basah';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
                    $html = 'pengajuan_surat.templates.basah.surat_kematian_basah';
                } else {
                    return redirect()->route('pengajuan-surat.index');
                }
            } else {
                return redirect('/');
            }
        } else {
            if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_domisili_haji_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_domisili_yayasan_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_penguburan_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_tentang_perkawinan_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Numpang Nikah') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_numpang_nikah_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Orang Tua Wali') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_orang_tua_wali_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Kehilangan') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_kehilangan_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Belum Nikah') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_belum_nikah_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tidak Mampu') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_tidak_mampu_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Duda Janda') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_duda_janda_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_domisili_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Usaha') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_usaha_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Pengantar Keterangan Catatan Kepolisian') {
                $html = 'pengajuan_surat.templates.basah.surat_pengantar_keterangan_catatan_kepolisian_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Akad Nikah') {
                $html = 'pengajuan_surat.templates.basah.surat_pernyataan_akad_nikah_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Pernyataan Ahli Waris') {
                $html = 'pengajuan_surat.templates.basah.surat_pernyataan_ahli_waris_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Beda Nama Data') {
                $html = 'pengajuan_surat.templates.basah.surat_keterangan_beda_nama_data_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
                $html = 'pengajuan_surat.templates.basah.surat_kelahiran_basah';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
                $html = 'pengajuan_surat.templates.basah.surat_kematian_basah';
            } else {
                return redirect()->route('pengajuan-surat.index');
            }
        }

        return Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView($html, [
            'pengajuan_surat' => $pengajuanSurat,
            'surat' => json_decode($pengajuanSurat->surat),
        ])->download($pengajuanSurat->jenis_surat . '.pdf');
    }
}
