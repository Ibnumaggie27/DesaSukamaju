<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Orang Tua Wali</title>

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
            <span style="text-decoration: underline; padding: 10px;" > Surat Keterangan Orang Tua Wali</span>
        </div>
        <p class="fs-1" style="margin-top: 1px;">Nomor : {{ $surat->nomor_surat }}</p>
    </div>

    <!-- Content -->

    <div style="margin-top: 30px;">
        <div class="fs-1" style="margin-bottom: 10px;">Yang bertanda tangan di bawah ini, Kepala Desa Palasari Kecamatan Cipanas Kabupaten Cianjur, dengan ini menerangkan bahwa :</div>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama</td>
                <td class="fs-1"style="font-weight: bold;"> : {{ ucwords(strtolower($surat->nama)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">NIK</td>
                <td class="fs-1"> : {{ $surat->nik }}</td>
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
            <tr>
                <td colspan="2" class="fs-1">
                    <div style="margin-top: 10px; margin-bottom: 10px;">
                        Berdasarkan pengakuan dari yang bersangkutan serta Surat Pengantar dari ketua RT/RW setempat, bahwa yang bersangkutan adalah benar <span>{{ $surat->ket }}</span>/Wali dari :
                    </div>
                </td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Nama</td>
                <td class="fs-1"style="font-weight: bold;"> : {{ ucwords(strtolower($surat->nama_anak)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">NIK</td>
                <td class="fs-1"> : {{ $surat->nik_anak }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tempat & Tanggal Lahir</td>
                <td class="fs-1"> : {{ $surat->ttl_anak }}</td>
            </tr> 
            <tr>
                <td width="35%" class="fs-1">Jenis Kelamin</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->jk_anak)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Kewarganegaraan</td>
                <td class="fs-1"> : {{ strtoupper($surat->kewarganegaraan_anak) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Agama</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->agama_anak)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Status Perkawinan</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->status_perkawinan_anak)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->pekerjaan_anak)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Alamat</td>
               <td class="fs-1" style="white-space: pre-wrap; text-indent: -0.5em; padding-left: 0.5em;">: {!! nl2br(e(ucwords(strtolower($surat->alamat_anak)))) !!}</td>
            </tr>
        </table>

        <div class="fs-1" style="margin-top: 20px;">Surat Keterangan ini kami buat untuk dipergunakan sebagaimana mestinya.</div>
        <div class="fs-1">Demikian agar yang berkepentingan maklum.</div>
    </div>

    <br>
    <br>
    <br>
    <!-- Tanda Tangan -->
    <div style="width: 100%; margin-top:-40px">
        <div align="center" style="width: 200px; position: relative; right: -30em" class="fs-1">
            <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p style="margin-top: -10px !important">Kepala Desa Palasari</p>
                
                <p style="margin-top: 90px !important">H.Ridwan.SH</p>
        </div>
    </div>
</body>

</html>
