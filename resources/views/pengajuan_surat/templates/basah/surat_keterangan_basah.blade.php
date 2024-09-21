<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan</title>

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

    <div style="margin-top: 1em;">
        <p class="fs-1">No. Kode Desa</p>
        <p class="fs-1" style="margin-top: -15px !important;">{{ $surat->kode_desa }}</p>
    </div>

    <!-- Title -->
    <div align="center" style="text-align: center; margin-top: 1em;">
        {{-- <table class="table" style="margin-right: -50% !important;">
            <tbody>
                <tr>
                    <td rowspan="2" class="td fw-bold fs-1 text-uppercase">Surat</td>
                    <td colspan="2" class="td fw-bold fs-1 text-uppercase" style="width: 150px;">Keterangan</td>
                </tr>
                <tr>
                    <td colspan="2" class="td fw-bold fs-1 text-uppercase">Pengantar</td>
                </tr>
            </tbody>
        </table> --}}

         <div  class="fw-bold fs-1 text-uppercase">
            <span style="border: 1px solid black; padding: 10px" > Surat Keterangan Pengantar</span>
        </div>
        <p class="fs-1">Nomor : {{ $surat->nomor_surat }}</p>
    </div>

    <!-- Content -->

    <div style="margin-top: 50px;">
        <div class="fs-1" style="margin-bottom: 10px;">Yang bertanda tangan dibawah ini menerangkan bahwa :</div>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama</td>
                <td class="fs-1"> : {{ $surat->nama }}</td>
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
                <td width="35%" class="fs-1">NO KK</td>
                <td class="fs-1"> : {{ $surat->no_kk }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Kewarganegaraan & Agama</td>
                <td class="fs-1"> : {{ $surat->negara_agama }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Pekerjaan</td>
                <td class="fs-1"> : {{ $surat->pekerjaan }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Alamat</td>
                <td class="fs-1"> : {{ $surat->alamat }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Keperluan</td>
                <td class="fs-1"> : {{ $surat->keperluan }}</td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Berlaku Mulai</td>
                <td class="fs-1"> : {{ \Carbon\Carbon::parse($surat->berlaku_mulai)->isoFormat('dddd, D MMMM Y') }}
                </td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Keterangan lain-lain</td>
                <td class="fs-1"> : {{ $surat->keterangan_surat }}</td>
            </tr>
        </table>

        <div class="fs-1" style="margin-top: 20px;">Demikian untuk dapat dipergunakan sebagaimana mestinya.</div>
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
