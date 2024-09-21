<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Tidak Mampu</title>

    <style>
        .fs-1 {
            font-size: 16px;
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
    </style>
</head>


<body style="margin: 0px 10px;">


    <!-- Kop Surat -->
    <div align="center" style="border-bottom: 2px solid #000000; padding-bottom: 20px; margin-top: -60px !important">
        <img src="https://raw.githubusercontent.com/Ibnumaggie27/sistem-informasi-desa-palasari/main/public/img/cop.png"
            width="100%" alt="">
    </div>
    <!-- Title -->
    <div align="center" style="text-align: center; margin-top: 1em;">

         <div  class="fw-bold fs-1 text-uppercase">
            <span style="text-decoration: underline; padding: 10px;"  > Surat Keterangan Pengantar</span>
        </div>
        <p class="fs-1" style="margin-top: 1px;">Nomor : {{ $surat->nomor_surat }}</p>
    </div>

    <!-- Content -->

    <div style="margin-top: 50px;">
        <div class="fs-1">Yang bertanda tangan dibawah ini :</div>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama</td>
                <td class="fs-1" style="font-weight: bold;"> : H. RIDWAN, SH</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Jabatan</td>
                <td class="fs-1"> : Kepala Desa Palasari</td>
            </tr>
        </table>
        <div class="fs-1" style="margin-top: 20px;">Dengan ini menerangkan :</div>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama</td>
                <td class="fs-1" style="font-weight: bold;"> : {{ ucwords(strtolower($surat->nama)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Nomor KK/NIK</td>
                <td class="fs-1"> : {{ $surat->kk_nik }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tempat & Tanggal Lahir</td>
                <td class="fs-1"> : {{ $surat->ttl }}</td>
            </tr>
            
            <tr>
                <td width="35%" class="fs-1">Jenis Kelamin</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->jk)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Agama</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->agama)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Status perkawinan</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->status_perkawinan)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Warga Negara</td>
                <td class="fs-1"> : {{ strtoupper($surat->kewarganegaraan) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Pendidikan</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->pendidikan)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->pekerjaan)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Nama Ayah/Ibu</td>
                <td class="fs-1" style="font-weight: bold;"> : {{ ucwords(strtolower($surat->nama_ayah_ibu)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Alamat Lengkap</td>
                <td class="fs-1" style="white-space: pre-wrap; text-indent: -0.5em; padding-left: 0.5em;">: {!! nl2br(e(ucwords(strtolower($surat->alamat_lengkap)))) !!}</td>
            </tr>
        </table>

        <div class="fs-1" style="margin-top: 20px;">Berdasarkan pengakuan yang bersangkutan serta Surat Keterangan dari Ketua RT/RW setempat,
            tentang Surat Keterangan Tidak Mampu, nama tersebut diatas :</div>
        <div class="fs-1"style="margin-left:20px;">a. Benar penduduk Desa Palasari</div>
        <div class="fs-1"style="margin-left:20px;">b. Tergolong masyarakat kurang mampu (miskin)</div>
        <div class="fs-1"style="margin-left:20px;">c. Perlu mendapat keringanan biaya</div>
        <div class="fs-1">Keterangan ini dikeluarkan untuk kepentingan Administrasi</div>
        <div class="fs-1" style="margin-top: 20px; font-weight: bold; text-align:center;">"{{ $surat->keperluan }}"</div>
    </div>

    <br>
    <br>
    <br>
    <!-- Tanda Tangan -->
    <div style="width: 100%; margin-top:-40px;">
        <div align="center" style="width: 200px; position: relative; right: -30em" class="fs-1">
            <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p style="margin-top: -10px !important">Kepala Desa Palasari</p>
            <img style="margin-top: -1em !important"
                src="https://raw.githubusercontent.com/Ibnumaggie27/project/main/public/img/barttd.png"
                width="120" alt="">

            <p style="margin-top: -2px !important">H.Ridwan.SH</p>
        </div>
    </div>
</body>

</html>
