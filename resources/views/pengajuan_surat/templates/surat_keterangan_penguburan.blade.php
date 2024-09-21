<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Penguburan</title>

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
    <div align="center" style="border-bottom: 2px solid #000000; padding-bottom: 3px; margin-top: -60px !important">
        <img src="https://raw.githubusercontent.com/Ibnumaggie27/sistem-informasi-desa-palasari/main/public/img/cop.png"
            width="100%" alt="">
    </div>

    <!-- No. Kode Desa -->

    <!-- Title -->
    <div align="center" style="text-align: center; margin-top: 1em;">
         <div  class="fw-bold fs-1 text-uppercase">
            <span style="text-decoration: underline; padding: 10px;"> Surat Keterangan Penguburan</span>
        </div>
        <p class="fs-1" style="margin-top: 1px;">Nomor : {{ $surat->nomor_surat }}</p>
    </div>

    <!-- Content -->

    <div style="margin-top: 50px;">
        <div class="fs-1">Yang bertanda tangan dibawah ini :</div>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama</td>
                <td class="fs-1"> : H.Ridwan, SH</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Jabatan</td>
                <td class="fs-1"> : Kepala Desa Palasari</td>
            </tr>
            <tr>
                <td colspan="2" class="fs-1">
                    <div style="margin-top: 10px;">
                        Dengan ini menerangkan bahwa :
                    </div>
                </td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Nama</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->nama)) }}</td>
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
                <td width="35%" class="fs-1">Agama</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->agama)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Status perkawinan</td>
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
                    <div style="margin-top: 10px;">
                        Nama tersebut  di atas benar-benar telah meninggal dunia :
                    </div>
                </td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Hari Tanggal</td>
                <td class="fs-1"> : {{ $surat->hari_tanggal }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tempat Meninggal</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->tempat_meninggal)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Dikuburkan Hari</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->dikuburkan)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Waktu</td>
                <td class="fs-1"> : {{ $surat->waktu }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tempat Penguburan</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->tempat_penguburan)) }}</td>
            </tr>
        </table>

        <div class="fs-1" style="margin-top: 20px;">Demikian Surat Keterangan ini kami buat untuk digunakan seperlunya.</div>
    </div>

    <br>
    <br>
    <br>
    <!-- Tanda Tangan -->
    <div style="width: 100%; margin-top:-30px;">
        <div align="center" style="width: 200px; position: relative; right: -30em" class="fs-1">
            <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p style="margin-top: -10px !important">Kepala Desa Palasari</p>
            <img style="margin-top: -1em !important"
                src="https://raw.githubusercontent.com/Ibnumaggie27/project/main/public/img/barttd.png"
                width="120" alt="">

            <p style="margin-top: -2px !important">Ridwan</p>
        </div>
    </div>
</body>

</html>
