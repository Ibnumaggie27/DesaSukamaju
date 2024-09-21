<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Beda Nama Data</title>

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
            <span style="text-decoration: underline; padding: 10px;" > Surat Keterangan Beda Nama Data</span>
        </div>
        <p class="fs-1">Nomor : {{ $surat->nomor_surat }}</p>
    </div>

    <!-- Content -->

    <div style="margin-top: 50px;">
        <div class="fs-1" style="margin-bottom: 10px;">Yang bertanda tangan dibawah ini, Pemerintah Desa Palasari Kecamatan Cipanas Kabupaten Cianjur, menerangkan dengan sebenarnya bahwa :</div>
        <table width="100%">
            <tr>
                <div class="fs-1" style="margin-top: 10px;">Yang Tertulis di Kartu Keluarga (KK) No. {{ $surat->kk }} a.n. <span style="text-transform: uppercase;">{{ ucwords(strtolower($surat->ankk)) }}</span> :</div>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1">Nama Ayah <span style="text-transform: uppercase;">{{ ucwords(strtolower($surat->ankk)) }}</span></td>
                <td class="fs-1"> : <span style="text-transform: uppercase;">{{ ucwords(strtolower($surat->ayahkk)) }}</span></td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Nama Ibu <span style="text-transform: uppercase;">{{ ucwords(strtolower($surat->ankk)) }}</span></td>
                <td class="fs-1"> : <span style="text-transform: uppercase;">{{ ucwords(strtolower($surat->ibukk)) }}</span></td>
            </tr>
            @foreach (range(1, 10) as $i)
            @if (isset($surat->{'nama' . $i}))
            <tr>
                <td width="35%" class="fs-1">Nama Ayah <span style="text-transform: uppercase;">{{ $surat->{'nama' . $i} }}</span></td>
                <td class="fs-1"> : <span style="text-transform: uppercase;">{{ $surat->{'nama_ayah' . $i} }}</span></td>
            </tr>
            <tr>
                <td width="35%" class="fs-1">Nama Ibu <span style="text-transform: uppercase;">{{ $surat->{'nama' . $i} }}</span></td>
                <td class="fs-1"> : <span style="text-transform: uppercase;">{{ $surat->{'nama_ibu' . $i} }}</span></td>
            </tr>
            @endif
        @endforeach
        </table>
        <table width="100%">
            <tr>
                <div class="fs-1" style="margin-top: 10px;">Yang Tertulis di {{ ucwords(strtolower($surat->data_benar)) }} a.n. <span style="text-transform: uppercase;">{{ ucwords(strtolower($surat->atas_nama)) }}</span> :</div>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td width="35%" class="fs-1"><span style="text-transform: uppercase;">{{ ucwords(strtolower($surat->perbaikan_data)) }}</span></td>
            </tr>
            @foreach (range(1, 10) as $i)
            @if (isset($surat->{'perbaikan' . $i}))
            <tr>
                <td width="35%" class="fs-1"><span style="text-transform: uppercase;">{{ $surat->{'perbaikan' . $i} }}</span></td>
            </tr>
            @endif
        @endforeach
        </table>
        @foreach (range(1, 10) as $i)
        @if (isset($surat->{'nama' . $i}))
        <div class="fs-1" style="margin-top: 20px;">Selanjutnya Keterangan bahwa Nama Ayah dan Ibu <span style="text-transform: uppercase;">{{ ucwords(strtolower($surat->ankk)) }}</span> Dengan Nama Ayah dan Ibu <span style="text-transform: uppercase;">{{ $surat->{'nama' . $i} }}</span> 
        yang tertulis di KK No. {{ $surat->kk }} a.n. <span style="text-transform: uppercase;">{{ ucwords(strtolower($surat->ankk)) }}</span> <span style="text-transform: uppercase; font-weight: bold;">{{ ucwords(strtolower($surat->keterangan)) }}</span><span style="font-weight: bold;">. Diterangkan juga data yang sebenarnya adalah data yang tertulis di {{ ucwords(strtolower($surat->data_benar)) }} a.n. <span style="text-transform: uppercase; font-weight: bold;">{{ ucwords(strtolower($surat->atas_nama)) }}</span></span></div>
        @endif
    @endforeach
    <div class="fs-1" style="margin-top: 20px;">Demikian Surat Keterangan ini dibuat dengan sebenarnya dan diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.</div>
    </div>

    <br>
    <br>
    <br>
    <!-- Tanda Tangan -->
    <div style="width: 100%;">
        <div align="center" style="width: 200px; position: relative; right: -30em" class="fs-1">
            <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p style="margin-top: -10px !important">Kepala Desa Palasari</p>
                
                <p style="margin-top: 90px !important">Ridwan</p>
        </div>
    </div>
</body>

</html>
