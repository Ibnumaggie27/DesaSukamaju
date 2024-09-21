<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Domisili Haji</title>

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
            <span  style="text-decoration: underline; padding: 10px;" > Surat Keterangan Domisili Haji</span>
        </div>
        <p class="fs-1" style="margin-top: 1px;">Nomor : {{ $surat->nomor_surat }}</p>
    </div>

    <!-- Content -->

    <div style="margin-top: 30px;">
        <div class="fs-1" style="margin-bottom: 10px;">yang bertanda tangan dibawah ini, Kepala Desa Palasari Kecamatan Cipanas Kabupaten Cianjur, dengan ini menerangkan bahwa :</div>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama</td>
                <td class="fs-1" style="font-weight: bold;"> : {{ ucwords(strtolower($surat->nama)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Jenis Kelamin</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->JK)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tempat & Tanggal Lahir</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->ttl)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">NIK</td>
                <td class="fs-1"> : {{ $surat->nik }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">NO KK</td>
                <td class="fs-1"> : {{ $surat->no_kk }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Kewarganegaraan</td>
                <td class="fs-1"> : {{ strtoupper($surat->kewarganegaraan) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Agama</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->agama)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Status Perkawinan</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->status_perkawinan)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->pekerjaan)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Alamat</td>
                <td class="fs-1" style="white-space: pre-wrap; text-indent: -0.5em; padding-left: 0.5em;">: {!! nl2br(e(ucwords(strtolower($surat->alamat)))) !!}</td>
            </tr>
        </table>

        <div class="fs-1" style="margin-top: 20px;">Nama tersebut adalah benar warga masyarakat yang menetap dan berdomisili di kampung dan Desa sebagaimana tersebut diatas .</div>
        <div class="fs-1">Surat Keterangan ini kami berikan kepada yang bersangkutan untuk dipergunakan sebagai pelengkap <span style="font-weight: bold; text-decoration: underline; font-style: italic;">{{ $surat->keperluan }}</span>.</div>
        <div class="fs-1">Demikian agar yang berkepentingan maklum.</div>
    </div>

    <br>
    <br>
    <br>
    <!-- Tanda Tangan -->
    <div style="width: 100%; margin-top: -40px;">
        <div style="width: 50%; float: left; margin-left: -5%;" class="fs-1">
            <div align="center"class="fs-1">
                <p style="margin-top: 42px !important">Tanda Tangan Ysb,</p>
                <p style="margin-top: 114px !important">(...................................)</p>
            </div>
        </div>
        <div style="width: 50%; float: right; margin-right: 0;" class="fs-1">
            <div align="center" class="fs-1">
                <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
                <p style="margin-top: -10px !important">Kepala Desa Palasari</p>
                
                <p style="margin-top: 124px !important">Ridwan</p>
            </div>
        </div>
    </div>
    <div style="width: 100%;margin-top:-40px">
        <div align="center" class="fs-1">
            <p>Mencatat:</p>
            <p style="margin-top: -10px !important">camat Kecamatan Cipanas</p>
            <p style="margin-top: 80px; font-weight: bold; text-decoration: underline; !important">FIRMAN EDI. S.STP., M.Si</p>
            <p style="margin-top: -15px !important">NIP. 197604121996121001</p>
        </div>
    </div>
</body>

</html>
