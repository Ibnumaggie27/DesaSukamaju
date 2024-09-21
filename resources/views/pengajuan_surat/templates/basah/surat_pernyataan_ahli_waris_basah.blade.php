<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar Pernyataan Ahli Waris</title>

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
        .dots {
        display: inline-block;
        width: 500px; /* Sesuaikan lebar titik sesuai kebutuhan */
        text-align: right; /* Mengatur teks ke kanan */
        margin-top: -25px;
    }
    </style>
</head>


<body style="margin: 0px 10px;">

    <!-- Title -->
    <div align="center" style="text-align: center; margin-top: 1em;">
         <div  class="fw-bold fs-1 text-uppercase">
            <span style="text-decoration: underline; padding: 10px;" > Surat pernyataan Ahli Waris</span>
        </div>
        
    </div>

    <!-- Content -->

    <div style="margin-top: 10px;">
        <div class="fs-1" style="margin-top: 10px;">Kami yang bertanda tangan di bawah ini, ahli waris dari Almarhum/Almarhumah 
            <span style="font-weight: bold; text-transform: uppercase;">{{ ucwords(strtolower($surat->nama_almarhum)) }}</span></div>
        <table width="100%" style="margin-top: 10px; ">
            <tr>
                <td width="35%" class="fs-1"><span style="font-weight: bold; text-transform: uppercase;">1. {{ ucwords(strtolower($surat->nama_pertama)) }}</span>, Tempat/Tgl. Lahir : {{ $surat->ttl_pertama }}, Beralamat di <span style ="white-space: pre-wrap; text-indent: -0.5em; padding-left: 0.5em;"{!! nl2br(e(ucwords(strtolower($surat->alamat_pertama)))) !!}</td>
            </tr>
            @php
            $nomor = 2;
            @endphp
            @foreach (range(1, 10) as $i)
            @if (isset($surat->{'nama' . $i}))
            <tr>
                <td width="35%" class="fs-1">
                    <span style="font-weight: bold; text-transform: uppercase;">
                        {{ $nomor }}. {{ $surat->{'nama' . $i} }}
                    </span>, Tempat/Tgl. Lahir : {{ $surat->{'ttl' . $i} }}, Beralamat di {{ $surat->{'alamat' . $i} }}
                </td>
            </tr>
            @php
        $nomor++;
        @endphp
            @endif
        @endforeach
        </table>
        <div class="fs-1" style="margin-top:30px;">Dengan ini <span style="font-weight: bold;">Sepakat dan Setuju</span> bahwa {{ ucwords(strtolower($surat->warisan)) }} dengan PPTS No : 32.05.192.005.021.0448.0 Diberikan kepada saudara/saudari kami yang bernama :</div>
        <table width="100%" style="margin-top: 10px;">
            <tr>
                <td width="35%" class="fs-1"><span style="font-weight: bold; text-transform: uppercase;">1. {{ ucwords(strtolower($surat->nama_penerima)) }}</span>, Tempat/Tgl. Lahir : {{ $surat->ttl_penerima }}, Beralamat di <span style ="white-space: pre-wrap; text-indent: -0.5em; padding-left: 0.5em;"{!! nl2br(e(ucwords(strtolower($surat->alamat_penerima)))) !!}</td>
            </tr>
        </table>
        <div class="fs-1" style="margin-top:30px;">Demikian Surat Pernyataan Ahli Waris ini dibuat dengan sebenarnya dan untuk dipergunakan sebagaimana mestinya.</div>
    </div>

    <br>
    <br>
    <br>
    <!-- Tanda Tangan -->
    <div style="width: 100%; margin-top: -40px;">
        <div style="width: 50%; float: left;" class="fs-1">
            <p style="margin-top: 38px; font-weight: bold; !important ">YANG MENERIMA WARIS</p>
        </div>
        <div style="width: 50%; float: right;">
            <p style="margin-top: 150px; margin-left: -338px; font-weight: bold; ">{{ ucwords(strtolower($surat->nama_penerima)) }}</p>
        </div>
        <div style="width: 50%; float: right; margin-right: 0;" class="fs-1">
            <p style="text-align: right;">Dibuat di : Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
            <p style="text-align: center; font-weight: bold; margin-top: -10px !important; margin-left: 65px;">AHLI WARIS</p>
           <table width="500px" style="margin-left:-80px;">
            <tr>
                <td width="50%" class="fs-1"><span style="font-weight: bold; text-transform: uppercase;">1. {{ ucwords(strtolower($surat->nama_pertama)) }}</span></td>
            </tr>
            <tr>
            <td width="500px" style=" display: inline-block; text-align: right; margin-left:-190px; margin-top: -25px;">................</td>
            </tr>
            @php
            $nomor = 2;
            @endphp
            @foreach (range(1, 10) as $i)
            @if (isset($surat->{'nama' . $i}))
            <tr>
                <td width="50%" class="fs-1">
                    <span style="font-weight: bold; text-transform: uppercase; ">
                        {{ $nomor }}. {{ $surat->{'nama' . $i} }} 
                    </span>
                    <table style="margin-left:-190px;">
                    <span class="dots">................</span>
                    </table>
                </td>
            </tr>
            @php
        $nomor++;
        @endphp
            @endif
        @endforeach
    </table>
        </div>
    </div>
    <div style="width: 100%;margin-top:240px">
        <div style="width: 50%; float: left;" class="fs-1">
            <div align="center" style="margin-right:90px;">
                <p class="fs-1" style="margin-top: 1px; margin-bottom:-10px; font-weight: bold; ">Menyaksikan Kebenarannya,</p>
                <p style="margin-top: 80px; font-weight: bold;" >{{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
                <p style=" margin-top: -18px !important">Ketua RT </p>
            </div>
            <div align="center" style="margin-right:90px;">
                <p style="margin-top: 50px; font-weight: bold;"  >{{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
                <p style="margin-top: -18px !important">Ketua RT </p>
            </div>
        </div>
        <div style="width: 50%; float: right; text-align: right; margin-left:90px;" class="fs-1">
                <div align="center" class="fs-1">
                    <p class="fs-1" style="margin-top: 1px; margin-bottom:-10px;">Nomor : {{ $surat->nomor_surat }}</p>
                    <p>Palasari, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
                    <p style="margin-top: -10px !important">Kepala Desa Palasari</p>
                
                <p style="margin-top: 90px !important">Ridwan</p>
            </div>
        </div>
        
    </div>
    
</body>

</html>
