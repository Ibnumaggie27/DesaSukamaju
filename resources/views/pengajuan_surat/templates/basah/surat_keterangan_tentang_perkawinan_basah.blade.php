<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Tentang Perkawinan</title>

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

    <!-- No. Kode Desa -->

    <!-- Title -->
    <div align="center" style="text-align: center; margin-top: 1em;">
         <div  class="fw-bold fs-1 text-uppercase">
            <span style="text-decoration: underline; padding: 10px;"> Surat Keterangan Tentang Perkawinan</span>
        </div>
        <p class="fs-1" style="margin-top: 1px;">Nomor : {{ $surat->nomor_surat }}</p>
    </div>

    <!-- Content -->

    <div style="margin-top: 50px;">
        <div class="fs-1" style="margin-bottom: 10px;">Pemerintah Desa Palasari Kecamatan Cipanas kabupaten Cianjur, dengan ini menerangkan
        berdasarkan pengakuan dari yang bersangkutan serta Surat Pengantar dari Ketua RT/RW setempat bahwa :</div>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->nama_laki)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tempat & Tanggal Lahir</td>
                <td class="fs-1"> : {{ $surat->ttl }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->pekerjaan_laki)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Warga Negara</td>
                <td class="fs-1"> : {{ strtoupper($surat->kewarganegaraan_laki) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Alamat</td>
                <td class="fs-1" style="white-space: pre-wrap; text-indent: -0.5em; padding-left: 0.5em;">: {!! nl2br(e(ucwords(strtolower($surat->alamat_laki)))) !!}</td>
            </tr>
            <tr>
                <td colspan="2" class="fs-1">
                    <div style="margin-top: 10px; margin-bottom: 10px;">
                        Benar telah menikah di <span style="font-weight: bold white-space: pre-wrap; text-indent: -0.5em; padding-left: 0.5em;">{!! nl2br(e(ucwords(strtolower($surat->alamat)))) !!}</span> pada hari <span style="font-weight: bold;">{{ ucwords(strtolower($surat->hari_nikah)) }}</span>
                         tanggal <span style="font-weight: bold;">{{ $surat->tanggal_nikah }}</span> dengan seorang Perempuan bernama :
                    </div>
                </td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Nama</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->nama_perempuan)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tempat & Tanggal Lahir</td>
                <td class="fs-1"> : {{ $surat->ttl_perempuan }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->pekerjaan_perempuan)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Warga Negara</td>
                <td class="fs-1"> : {{ strtoupper($surat->kewarganegaraan_perempuan) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Alamat</td>
                <td class="fs-1" style="white-space: pre-wrap; text-indent: -0.5em; padding-left: 0.5em;">: {!! nl2br(e(ucwords(strtolower($surat->alamat_perempuan)))) !!}</td>
            </tr>
        </table>

        <div class="fs-1" style="margin-top: 20px;">Surat Keterangan ini kami berikan kepada yang bersangkutan untuk dipergunakan sebagai pelengkap <span style="font-weight: bold;">{{ $surat->kepentingan }}</span>.</div>
        <div class="fs-1" style="margin-top: 20px;">Demikian agar yang berkepentingan maklum.</div>
    </div>

    <br>
    <br>
    <br>
    <!-- Tanda Tangan -->
    <div style="width: 100%;">
        <div align="center" style="width: 200px; position: relative; right: -30em" class="fs-1">
            <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p style="margin-top: -10px !important">Kepala Desa Palasari</p>
                
                <p style="margin-top: 90px !important">H.Ridwan.SH</p>
        </div>
    </div>
</body>

</html>
