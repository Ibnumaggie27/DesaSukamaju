<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Surat Keterangan Kelahiran</title>

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
{{--  --}}

<body style="margin: 0px 10px;">
   
    <!-- Kop Surat -->
    <div align="center" style="border-bottom: 2px solid #000000; padding-bottom: 20px; margin-top: -50px !important">
        <img src="https://raw.githubusercontent.com/Ibnumaggie27/sistem-informasi-desa-palasari/main/public/img/cop.png" width="90%" alt="">
    </div>
    <!-- Title -->
    <div align="center" style="text-align: center; margin-top: 1em;">
       <div  class="fw-bold fs-1 text-uppercase">
            <span style="text-decoration: underline; padding: 10px;" > Surat Keterangan Kelahiran</span>
        </div>
        <p class="fs-1" style="margin-top: 1px;">Nomor : {{ $surat->nomor_surat }}</p>
    </div>

    <!-- Content -->

    <div style="margin-top: 10px;">
        <div class="fs-1" style="margin-bottom: 10px;">Yang bertanda tangan di bawah ini,</div>
            <table width="100%">
                <tr>
                    <td width="37%" class="fs-1">Nama</td>
                    <td class="fs-1" style="font-weight: bold;"> : H.Ridwan, SH</td>
                </tr>
                <tr>
                    <td width="37%" class="fs-1">Jabatan</td>
                    <td class="fs-1"> : Kepala Desa Palasari</td>
                </tr>
            </table>
        <div class="fs-1" style="margin-top: 10px;">Menerangkan bahwa pada :</div>
        <table width="100%">
            <tr>
                <td width="37%" class="fs-1">Hari</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->hari)) }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Tanggal</td>
                <td class="fs-1"> : {{$surat->tanggal}}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Tempat Kelahiran</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->tempat_lahir)) }}</td>
            </tr>
            <tr>
                <td colspan="2" class="fs-1">
                    <div style="margin-top: 10px;">
                        Telah lahir seorang anak :
                    </div>
                </td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Anak ke</td>
                <td class="fs-1" style="font-weight: bold;"> : {{ $surat->anak_ke }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Bernama</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->nama_anak)) }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Jenis Kelamin</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->Kelamin)) }}</td>
            </tr>
        </table>
        <table width="100%" style="margin-top:10px;">
            <tr>
                <td width="37%" class="fs-1">Dari seorang Ibu bernama</td>
                <td class="fs-1" style="font-weight: bold;"> : {{ ucwords(strtolower($surat->nama_ibu)) }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Umur</td>
                <td class="fs-1"> : {{ $surat->umur }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Agama</td>
                <td class="fs-1"> : {{ $surat->agama }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Istri Dari</td>
                <td class="fs-1" style="font-weight: bold;"> : {{ ucwords(strtolower($surat->nama_ayah)) }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Umur</td>
                <td class="fs-1"> : {{ $surat->umur_ayah }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Agama</td>
                <td class="fs-1"> : {{ $surat->agama_ayah }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->pekerjaan_ayah)) }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Warga Negara</td>
                <td class="fs-1"> : {{ strtoupper($surat->kewarganegaraan) }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Alamat</td>
               <td class="fs-1" style="white-space: pre-wrap; text-indent: -0.5em; padding-left: 0.5em;">: {!! nl2br(e(ucwords(strtolower($surat->alamat)))) !!}</td>
            </tr>
            <tr>
                <td colspan="2" width="37%" class="fs-1"><br> Surat Keterangan ini dibuat atas dasar yang sebenarnya.</td>

            </tr>
            <tr>
                <td width="37%" class="fs-1">Nama yang melapor</td>
                <td class="fs-1" style="font-weight: bold;"> : {{ ucwords(strtolower($surat->nama_pelapor)) }}</td>
            </tr>
            <tr>
                <td width="37%" class="fs-1">Hubungan dengan Ybs.</td>
                <td class="fs-1"> : {{ ucwords(strtolower($surat->hub_pelapor_anak)) }}</td>
            </tr>

        </table>
    </div>

    <!-- Tanda Tangan -->
    <div style="width: 100%; margin-top: 10px;">
        <div align="center" style="width: 200px; position: relative; right: -30em" class="fs-1">
            <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p style="margin-top: -10px !important">Kepala Desa Palasari</p>
                
                <p style="margin-top: 90px !important">H.Ridwan.SH</p>
        </div>
    </div>
</body>

</html>
