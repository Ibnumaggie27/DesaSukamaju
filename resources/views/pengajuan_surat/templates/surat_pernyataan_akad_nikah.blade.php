<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar Pernyataan Akad Nikah</title>

    <style>
        .fs-1 {
            font-size: 14px;
        }

        .fs-2 {
            font-size: 20px;
        }

        .fs-3 {
            font-size: 14px;
        }

        .table,
        .td,
        .th {
            border: 1px solid #595959;
            border-collapse: collapse;
        }

        .td,
        .th {
            padding: 3px;
            width: 100px;
            text-align: center;
        }

        .fw-bold {
            font-weight: bold;
        }

        .text-uppercase {
            text-transform: uppercase;
        }
        .default-style {
        text-decoration: line-through;
    }
    </style>
</head>


<body style="margin: 0px 10px;">


    <!-- Kop Surat -->
    <!-- Title -->
    <div align="center" style="text-align: center; margin-top: -10px;">
         <div  class="fw-bold fs-1 text-uppercase">
            <span style="text-decoration: underline; padding: 10px;" > Surat pernyataan Pelaksanaan Akad Nikah</span>
        </div>
    </div>

    <!-- Content -->

    <div style="margin-top: 10px;">
        <div class="fs-1" style="margin-top: 10px;">Saya yang bertanda tangan di bawah ini :</div>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama</td>
                <td class="fs-1"style="font-weight: bold;"> : {{ ucwords(strtolower($surat->nama)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tempat & Tanggal Lahir</td>
                <td class="fs-1"> : {{ $surat->ttl }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Status</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->status_pelapor)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->pekerjaan)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Alamat</td>
                <td class="fs-1" style="white-space: pre-wrap; text-indent: -0.5em; padding-left: 0.5em;">: {!! nl2br(e(ucwords(strtolower($surat->alamat)))) !!}</td>
            </tr>
            
            <tr>
                <td colspan="2" class="fs-1">
                    <div style="margin-top: 10px;">
                        Status dalam pernikahan :
                        @foreach(['calon Suami', 'Calon Istri', 'Wali Nikah', 'Keluarga Lainnya'] as $option)
                            <span class="{{ $surat->status === $option ? '' : 'default-style' }}">
                                {{ $option }}
                            </span>
                        @endforeach
                        <br>
                        Dengan ini menyatakan hal-hal sebagai berikut :
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="fs-1">
                    <div>
                        1. Kami Telah <span style="font-weight: bold; text-decoration: underline;">{{ ucwords(strtolower($surat->daftar_kua)) }}</span> untuk pelaksanaan Akad Nikah ke KUA Kec. Cipanas pada :
                    </div>
                </td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">a. Hari</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->hari_daftar)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">b. Tanggal</td>
                <td class="fs-1"> : {{ $surat->tanggal_daftar }}</td>
            </tr>
            <tr>
                <td colspan="2" class="fs-1">
                    <div style="margin-top:10px;">
                        2. Dan telah menyampaikan secara tertulis untuk pelaksanaan <span style="font-weight: bold; text-decoration: underline;">{{ $surat->keperluan }}</span> a/n. : 
                        <span style="text-transform: uppercase;">{{ ucwords(strtolower($surat->nama_pria)) }}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Calon Suami</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">a. Suami Nama</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->nama_pria)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">b. Istri Nama</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->nama_wanita)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">c. Pada Hari</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->waktu_acara)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">d. Tanggal</td>
                <td class="fs-1"> : {{ $surat->tanggal_acara }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">e. Alamat Di</td>
                <td class="fs-1" style="white-space: pre-wrap; text-indent: -0.5em; padding-left: 0.5em;">: {!! nl2br(e(ucwords(strtolower($surat->alamat_acara)))) !!}</td>
            </tr>
        </table>
        <div class="fs-1" style="margin-top: 10px;">3. Dalam pelaksanaan Akad Nikah <span style="font-weight: bold;">kami siap memenuhi Protokol Kesehatan</span> yang telah ditetapkan Dari
         <span style="font-weight: bold; text-decoration: underline;">Surat Edaran Direktur Jendral Kemenag RI, Nomor : P-006/DJ.III.007/06/2020</span> diantaranya :</div>
        <div class="fs-1"style="margin-left:15px;">1. hand Sanitazer / Tempat Cuci Tangan</div>
        <div class="fs-1" style="margin-left:15px;">2. Memakai Masker dan Sarung Tangan</div>
        <div class="fs-1" style="margin-left:15px;">3. Yang Hadir Dalam Akad Nikah <span style="font-weight: bold;">Maksimal 10 Orang di rumah / di KUA</span></div>
        <div class="fs-1" style="margin-left:15px;">4. <span style="font-weight: bold;">Tidak</span> mengadakan Resepsi Pernikahan / mengumpulkan orang banyak setelah Akah NIkah</div>
        <div class="fs-1" style="margin-left:15px;">5. Proses Akad Nikah yang dilaksanakan di Masjid / Gedung <span style="font-weight: bold;">diikuti sebanyak-banyaknya 20</span> % Dari kapasistas ruangan <span style="font-weight: bold;">dan tidak boleh lebih dari 30 (tiga puluh) orang</span></div>
        <div class="fs-1" style=" margin-top: 20px;">Demikian surat pernyataan ini kami buat dengan sebenar-benarnya tanpa ada paksaan dari siapapun dan dari pihak manapun dan apabila dikemudian hari ada permasalahan yang diakibatkan dari pernyataan ini, maka saya siap untuk mempertanggungjawabkannya dan siap untuk dituntut sesuai dengan peraturan dan perundang-undangan yang berlaku </div>
        
    </div>

    <!-- Tanda Tangan -->
    <div style="width: 100%;margin-top:15px">
        <div align="center" style="width: 200px; position: relative; right: -30em" class="fs-1">
            <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p style="margin-top: -13px !important">Yang Membuat Pernyataan</p>
            <p style="margin-top: 50px !important">{{ $surat->nama }}</p>
        </div>
    </div>
    <table style="margin-top:-30px;">
    <div class="fs-1" style="margin-left:15px;">Saksi-saksi, .....</div>
    <div class="fs-1" style="margin-left:15px;">1. Nama   :  .................................  <span style="margin-left:40px;">( .................................)</span></div>
    <div class="fs-1" style="margin-left:15px; margin-top:6px;">2. Nama   :  .................................  <span style="margin-left:40px;">( .................................)</span></div>
    </table>   
    <div style="width: 100%;">
        <div align="center"class="fs-1">
            <p class="fs-1" style="margin-top: 20px;">Nomor : {{ $surat->nomor_surat }}</p>
            <p style="margin-top: -10px !important">Mengetahui,</p>
            <p style="margin-top: -15px !important">Kepala Desa Palasari</p>
            <img style="margin-top: -1em !important"
                src="https://raw.githubusercontent.com/Ibnumaggie27/project/main/public/img/barttd.png"
                width="100" alt="">

            <p style="margin-top: -2px !important">Ridwan</p>
        </div>
    </div>
</body>

</html>
