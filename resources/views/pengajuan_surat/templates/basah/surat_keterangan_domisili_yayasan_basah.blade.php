<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Domisili Yayasan</title>

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
 .tanda-tangan-kanan {
    width: 48%;
    display: inline-block;
    text-align: center;
    float: right;
}



.element {
    width: 48%;
    margin-top: 20px; /* Atur sesuai kebutuhan */
}
    </style>
</head>


<body style="margin: 0px 10px;">


    <!-- Kop Surat -->
    <div align="center" style="border-bottom: 2px solid #000000; padding-bottom: 5px; margin-top: -60px !important">
        <img src="https://raw.githubusercontent.com/Ibnumaggie27/sistem-informasi-desa-palasari/main/public/img/cop.png"
            width="100%" alt="">
    </div>

    <!-- No. Kode Desa -->

    <!-- Title -->
    <div align="center" style="text-align: center; margin-top: 1em;">
        <div class="fw-bold fs-1 text-uppercase">
            <span style="text-decoration: underline; padding: 10px;"> Surat Keterangan Domisili Yayasan</span>
        </div>
        <p class="fs-1" style="margin-top: 1px;">Nomor : {{ $surat->nomor_surat }}</p>
    </div>
    

    <!-- Content -->

    <div style="margin-top: 20px;">
        <div class="fs-1" style="margin-bottom: 10px;">Yang bertanda tangan di bawah ini, Pemerintah Desa Palasari Kecamatan Cipanas Kabupaten Cianjur, dengan ini menerangkan bahwa :</div>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama Pimpinan</td>
                <td class="fs-1" style="font-weight: bold;"> : {{ ucwords(strtolower($surat->nama_pimpinan)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tempat & Tanggal Lahir</td>
                <td class="fs-1"> : {{ $surat->ttl }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">NIK</td>
                <td class="fs-1"> : {{ $surat->nik }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Jenis Kelamin</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->JK)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Kewarganegaraan</td>
                <td class="fs-1"> : {{ strtoupper($surat->kewarganegaraan) }}</td>
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
                    <div style="margin-top: 10px; margin-bottom: 10px;">
                        Adalah benar Pimpinan Yayasan yang berdomisili dalam wilayah Desa Palasari Kecamatan Cipanas Kabupaten Cianjur, dengan keterangan sebagai berikut :
                    </div>
                </td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Nama Yayasan</td>
                <td class="fs-1" style="font-weight: bold;"> : {{ ucwords(strtolower($surat->nama_yayasan)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Jenis/Klasifikasi Yayasan</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->jenis_yayasan)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Alamat Yayasan</td>
                <td class="fs-1" style="white-space: pre-wrap; text-indent: -0.5em; padding-left: 0.5em;">: {!! nl2br(e(ucwords(strtolower($surat->alamat_yayasan)))) !!}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Akta Pendirian</td>
                <td class="fs-1"> : {{ $surat->akta_pendirian }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">SK Kemenkumham</td>
                <td class="fs-1"> : {{ $surat->sk_kemenkumham }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Jumlah Pengurus</td>
                <td class="fs-1"> : {{ $surat->jumlah_pengurus }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Penanggung Jawab Yayasan</td>
                <td class="fs-1" style="font-weight: bold;"> : {{ ucwords(strtolower($surat->penanggung_jawab_yayasan)) }}</td>
            </tr>
        </table>

        <div class="fs-1" style="margin-top: 20px;">Surat Keterangan ini kami buat dan diberikan kepada yang bersangkutan untuk dipergunakan sebagai pelengkap :</div>
        <div class="fs-1" style="margin-top: 20px; font-weight: bold; text-align:center; text-transform: uppercase;">== {{ $surat->keperluan }} ===</div>
        <div class="fs-1" style="margin-top: 20px;">Demikian Surat Keterangan ini dibuat untuk dipergunakan sebagaimana mestinya, agar yang berkepentingan maklum.</div>
    </div>

    <br>
    <br>
    <br>
    <!-- Tanda Tangan -->
    <div style="width: 100%; margin-top: -40px;">
        <div style="width: 50%; float: left; margin-left: -5%;" class="fs-1">
            <div align="center"class="fs-1">
                <p>Mencatat:</p>
            <p style="margin-top: -10px !important">camat Kecamatan Cipanas</p>
            <p style="margin-top: 90px; font-weight: bold; text-decoration: underline; !important">FIRMAN EDI. S.STP., M.Si</p>
            <p style="margin-top: -15px !important">NIP. 197604121996121001</p>
            </div>
        </div>
        <div style="width: 50%; float: right; margin-right: 0;" class="fs-1">
            <div align="center" class="fs-1">
                <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
                <p style="margin-top: -10px !important">Kepala Desa Palasari</p>
                
                <p style="margin-top: 90px !important">H.Ridwan.SH</p>
            </div>
        </div>
    </div>
</body>

</html>
