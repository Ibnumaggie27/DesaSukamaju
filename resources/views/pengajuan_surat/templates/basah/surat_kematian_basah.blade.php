<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Surat Keterangan Kematian</title>

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
            padding: 5px;
            width: 100%;
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
        <img src="https://raw.githubusercontent.com/Ibnumaggie27/sistem-informasi-desa-palasari/main/public/img/cop.png" width="100%" alt="">
    </div>

    <!-- No. Kode Desa -->
    <!-- Title -->
    <div align="center" style="text-align: center; margin-top: 1em;">
        <div  class="fw-bold fs-1 text-uppercase">
            <span style="text-decoration: underline; padding: 10px;" > Surat Keterangan Kematian</span>
        </div>
       
        <p class="fs-1"style="margin-top: 1px;">Nomor : {{ $surat->nomor_surat }}</p>
    </div>

    <!-- Content -->

   <div style="margin-top: 20px;">
        <div class="fs-1">Yang bertanda tangan di bawah ini :</div>
            <table width="100%">
                <tr>
                    <td width="35%" class="fs-1">Nama</td>
                    <td class="fs-1"> : H. Ridwan, SH</td>
                </tr>
                <tr>
                    <td width="35%" class="fs-1">Jabatan</td>
                    <td class="fs-1"> : Kepala Desa Palasari</td>
                </tr>
            </table>
            <div class="fs-1" style="margin-top: 20px;">Menerangkan bahwa :</div>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama Lengkap</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->nama)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">NIK</td>
                <td class="fs-1"> : {{ $surat->nik }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Jenis Kelamin</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->kelamin)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Umur</td>
                <td class="fs-1"> : {{ $surat->umur }}</td>
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
                    <div style="margin-top: 20px;">
                        Telah meninggal dunia pada :
                    </div>
                </td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Hari</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->hari_meninggal)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Tanggal</td>
                <td class="fs-1"> : {{$surat->tanggal_meninggal}}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Di</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->tempat_meninggal)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Disebabkan Karena</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->meninggal_karena)) }}</td>
            </tr>
            <tr>
                <td colspan="2" class="fs-1">
                    <div style="margin-top: 20px;">
                        Surat Keterangan ini dibuat atas dasar yang sebenarnya.
                    </div>
                </td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Nama Yang Melapor</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->nama_pelapor)) }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">NIK</td>
                <td class="fs-1"> : {{ $surat->nik_pelapor }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Hubungan pelapor dengan almarhum/almarhumah</td>
                <td class="fs-1" style="text-transform: uppercase"> : {{ ucwords(strtolower($surat->hub_pelapor_almarhum)) }}</td>
            </tr>
        </table>
    </div>

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
