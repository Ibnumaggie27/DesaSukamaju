<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link href="style.css" rel="stylesheet"> -->

    <title>Pindah WNI</title>

    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
}
.container {
    /* background-color: aquamarine; */
    margin: 5px;
    display: flex;
    width: 100%;
}
.gambar img {
    width: 25px;
    height: 25px;
}
.tulisan {
    /* background-color: blueviolet; */
    width: 100%;
}
.judul {
    text-align: center;
    font-weight: bold;
    margin-top: -40px;
    font-size: 10px;
    text-decoration: underline;
}
.kode {
    text-align: right;
    padding-right: 5px;
    font-weight: bold;
    font-size: 12px;
}
.data {
    font-weight: bold;
    font-size: 12px;
    text-decoration: underline;
    margin-top: -30px;
}




.isi {
    display: flex;
}
.no-kk {
    padding-left: 5px;
    margin-top: -5px;
    font-size: 10px;
}
.table-kk {
    margin-left: 80px;
    margin-top: -22px;
    font-size: 10px;

}
.table-kk table {
    width: 70px;
    border-collapse: collapse;
}
.table-kk table, td, tr {
    border: 1px solid;
}
.table-kk td {
    width: 36.5px;
    text-align: center;
}




.kepala {
    display: flex;
}
.nama {
    padding-left: 5px;
    margin-top: -5px;
    font-size: 10px;
}
.isi-nama {
    margin-left: 130px;
    margin-top: -26px;
    font-size: 10px;
}
.isi-nama td {
    width: 200px;
}
.nik {
    margin-left: 350px;
    margin-top: -18px;
    font-size: 10px;
}
.nik table {
    width: 40px;
    border-collapse: collapse;
}
.nik table, td, tr {
    border: 1px solid;
}
.nik td {
    width: 17px;
    text-align: center;
}




.tempat {
    display: flex;
}
.nama-tempat {
    margin-left: 5px;
    margin-top: -5px;
    font-size: 10px;
}
.isi-tempat table {
    width: 40px;
    margin-left: 65px;
    margin-top: -25px;
    font-size: 10px;
    border-collapse: collapse;
}
.isi-tempat table, td, tr {
    border: 1px solid;
}
.isi-tempat {
    margin-left: 68px;
}
.isi-tempat td {
    width: 100px;
}
.table-1 table{
    width: 40px;
    margin-left: 240px;
    margin-top: -25px;
    font-size: 10px;
    border-collapse: collapse;
}
.table-1 td {
    width: 30px;
    text-align: center;
}
.table-2 table{
    width: 40px;
    margin-left: 310px;
    margin-top: -25px;
    font-size: 10px;
    border-collapse: collapse;
}
.table-2 td {
    width: 30px;
    text-align: center;
}
.table-3 table{
    width: 40px;
    margin-left: 381px;
    margin-top: -25px;
    font-size: 10px;
    border-collapse: collapse;
}
.table-3 td {
    width: 30px;
    text-align: center;
}
.jenis {
    margin-left: 520px;
}
.jenis p{
    font-size: 10px;
    margin-top: -23px;
    border-collapse: collapse;
}
.table-4 table{
    width: 18px;
    margin-left: 587px;
    margin-top: -25px;
    font-size: 10px;
    border-collapse: collapse;
}
.table-4 td {
    width: 10px;
    text-align: center;
}
.laki {
    margin-left: 617px;
}
.laki p{
    font-size: 10px;
    margin-top: -23px;
    border-collapse: collapse;
}
.wanita {
    margin-left: 640px;
}
.wanita p{
    font-size: 10px;
    margin-top: -23px;
    border-collapse: collapse;
}




.agama {
    display: flex;
}
.nama-agama {
    margin-left: 5px;
}
.nama-agama p{
    font-size: 10px;
    margin-top: -2px;
    border-collapse: collapse;
}
.table-no {
    margin-left: 135px;
    width: 20px;
    margin-top: -30px;
}
.table-no table {
    font-size: 10px;
    width: 100%;
    border-collapse: collapse;
}
.table-no table, td, tr {
    border: 1px solid;
    text-align: center;
}
.textAgama td{
    font-size: 10px;
    width: 80px;
    border: none;
}
.textAgama {
    margin-left: 149px;
}
.textAgama table, td, tr {
    margin-top:-18px;
}


.alamat {
    display: flex;
}
.isi-alamat p{
    margin-left: 5px;
    margin-top:-1px;
    font-size: 10px;
}
.table-alamat table {
    font-size: 10px;
    margin-left: -7px;
    margin-top:-20px;
    width: 200px;
    border-collapse: collapse;
}
.table-alamat table, tr, td {
    border: 1px solid;
}
.table-alamat {
    width: 400px;
    margin-left: 140px;
    margin-top: 10px;
}
.rt {
    margin-left: 350px;
}
.rt p{
    font-size: 10px;
    margin-top:-19px;
    
}
.table-rt table {
    width: 100%;
    margin-top:-51.5px;
    border-collapse: collapse;
}
.table-rt table, tr, td {
    border: 1px solid;
    font-size: 10px;
    margin-left: 370px;
    margin-top: -23px;
}
.table-rt {
    width: 80px;
    text-align: center;
}
.rw {
    margin-left: 460px;
}
.rw p{
    font-size: 10px;
    margin-top:-22px;
}
.table-rw table {
    width: 100%;
    margin-top:-84.5px;
    border-collapse: collapse;
}
.table-rw table, tr, td {
    border: 1px solid;
    font-size: 10px;
    margin-left: 490px;
    margin-top: -25px;
}
.table-rw {
    width: 80px;
    text-align: center;
}


.desa {
    display: flex;
}
.isi-desa {
    margin-left: 5px;
}
.isi-desa p{
    font-size: 10px;
    margin-top:-3px;
    width: 200px;
    border-collapse: collapse;
}
.table-desa table {
    width: 100%;
    border-collapse: collapse;
}
.table-desa table, tr, td {
    border: 1px solid;
    font-size: 10px;
}
.table-desa {
    width: 200.5px;
    margin-left: 133px;
    margin-top: -21px;
}
.kab {
    margin-left: 350px;
}
.kab p{
    font-size: 10px;
    margin-top:-17px;
    width: 200px;
    border-collapse: collapse;
}
.table-kab table {
    width: 100%;
    border-collapse: collapse;
}
.table-kab table, tr, td {
    border: 1px solid;
    font-size: 10px;
    margin-top: -21.5px;
}
.table-kab {
    width: 200.5px;
    margin-left: 420px;
    border-collapse: collapse;
}


.kec {
    display: flex;
}
.isi-kec {
    margin-left: 5px;
}
.isi-kec p{
    font-size: 10px;
    margin-top:-3px;
    width: 200px;
    border-collapse: collapse; 
}
.table-kec table {
    width: 100%;
    border-collapse: collapse;
}
.table-kec table, tr, td {
    border: 1px solid;
    font-size: 10px;
}
.table-kec {
    width: 200.5px;
    margin-left: 133px;
    margin-top: -21px;
}
.pro {
    margin-left: 350px;
}
.pro p{
    font-size: 10px;
    margin-top:-17px;
    width: 200px;
    border-collapse: collapse;
}
.table-pro table {
    width: 100%;
    border-collapse: collapse;
}
.table-pro table, td, tr {
    border: 1px solid;
    font-size: 10px;
    margin-top: -21.5px;
}
.table-pro {
    width: 200.5px;
    margin-left: 420px;
    border-collapse: collapse;
}


.kode-pos {
    display: flex;
}
.kode-pos p{
    font-size: 10px;
    margin-top:2px;
}
.nama-kode {
    margin-left: 132px;
}
.table-kode table {
    width: 100%;
    border-collapse: collapse;
}
.table-kode table, tr, td {
    border: 1px solid;
}
.table-kode {
    width: 100px;
    font-size: 10px;
    margin-left: 190px;
    margin-top: -25px;
    text-align: center;
}
.nama-telp {
    margin-left: 10px;
}
.nama-telp p{
    font-size: 10px;
    margin-top:-15px;
    margin-left: 290px;
}
.table-telp table {
    width: 100%;
    margin-top: -23px;
    border-collapse: collapse;
}
.border-telp table, tr, td {
    border: 1px solid;
}
.table-telp {
    width: 300px;
    margin-left: 340px;
    text-align: center;
    border-collapse: collapse;
}

.pindah {
    display: flex;
}
.nama-pindah {
    margin-left: 5px;
}
.nama-pindah p{
    font-size: 10px;
    margin-top: -2px;
    border-collapse: collapse;
}
.table-no-2 {
    margin-left: 135px;
    width: 20px;
    margin-top: -30px;
}
.table-no-2 table {
    font-size: 10px;
    width: 100%;
    border-collapse: collapse;
}
.table-no-2 table, td, tr {
    border: 1px solid;
    text-align: center;
}
.text-pindah td{
    font-size: 10px;
    width: 150px;
    border: none;
}
.text-pindah {
    margin-left: 149px;
}
.text-pindah table, td, tr {
    margin-top:-18px;
}
.table-no-3 td{
    margin-left: 135px;
    width: 20px;
    margin-top: -30px;
    border: none;
}
.table-no-3 {
    margin-left: 150px;
}




.alamat-kepindahan {
    display: flex;
}
.isi-alamat-kepindahan p{
    margin-left: 5px;
    margin-top:-1px;
    font-size: 10px;
}
.table-alamat-2 table {
    font-size: 10px;
    margin-left: -7px;
    margin-top:-20px;
    width: 200px;
    border-collapse: collapse;
}
.table-alamat-2 table, tr, td {
    border: 1px solid;
}
.table-alamat-2 {
    width: 400px;
    margin-left: 140px;
    margin-top: 10px;
}
.rt-2 {
    margin-left: 350px;
}
.rt-2 p{
    font-size: 10px;
    margin-top:-19px;
    
}
.table-rt-2 table {
    width: 100%;
    margin-top:-51.5px;
    border-collapse: collapse;
}
.table-rt-2 table, tr, td {
    border: 1px solid;
    font-size: 10px;
    margin-left: 370px;
    margin-top: -23px;
}
.table-rt-2 {
    width: 80px;
    text-align: center;
}
.rw-2 {
    margin-left: 460px;
}
.rw-2 p{
    font-size: 10px;
    margin-top:-22px;
}
.table-rw-2 table {
    width: 100%;
    margin-top:-84.5px;
    border-collapse: collapse;
}
.table-rw-2 table, tr, td {
    border: 1px solid;
    font-size: 10px;
    margin-left: 490px;
    margin-top: -25px;
}
.table-rw-2 {
    width: 80px;
    text-align: center;
}



.klasifikasi {
    display: flex;
}
.nama-klasifikasi {
    margin-left: 5px;
}
.nama-klasifikasi p{
    font-size: 10px;
    margin-top: -2px;
    border-collapse: collapse;
}
.table-no-4 {
    margin-left: 135px;
    width: 20px;
    margin-top: -30px;
}
.table-no-4 table {
    font-size: 10px;
    width: 100%;
    border-collapse: collapse;
}
.table-no-4 table, td, tr {
    border: 1px solid;
    text-align: center;
}
.text-klasifikasi td{
    font-size: 10px;
    width: 150px;
    border: none;
}
.text-klasifikasi {
    margin-left: 149px;
}
.text-klasifikasi table, td, tr {
    margin-top:-18px;
}
.table-no-5 td{
    margin-left: 135px;
    width: 20px;
    margin-top: -30px;
    border: none;
}
.table-no-5 {
    margin-left: 150px;
}



.kepindahan {
    display: flex;
}
.nama-kepindahan {
    margin-left: 5px;
}
.nama-kepindahan p{
    font-size: 10px;
    margin-top: -2px;
    border-collapse: collapse;
}
.table-no-6 {
    margin-left: 135px;
    width: 20px;
    margin-top: -30px;
}
.table-no-6 table {
    font-size: 10px;
    width: 100%;
    border-collapse: collapse;
}
.table-no-6 table, td, tr {
    border: 1px solid;
    text-align: center;
}
.text-kepindahan td{
    font-size: 10px;
    width: 150px;
    border: none;
}
.text-kepindahan {
    margin-left: 149px;
}
.text-kepindahan table, td, tr {
    margin-top:-18px;
}
.table-no-7 td{
    margin-left: 135px;
    width: 20px;
    margin-top: -30px;
    border: none;
}
.table-no-7 {
    margin-left: 150px;
}



.status {
    display: flex;
}
.nama-status {
    margin-left: 5px;
}
.nama-status p{
    font-size: 10px;
    margin-top: -2px;
    border-collapse: collapse;
}
.table-no-8 {
    margin-left: 135px;
    width: 20px;
    margin-top: -30px;
}
.table-no-8 table {
    font-size: 10px;
    width: 100%;
    border-collapse: collapse;
}
.table-no-8 table, td, tr {
    border: 1px solid;
    text-align: center;
}
.text-status td{
    font-size: 10px;
    width: 150px;
    border: none;
}
.text-status {
    margin-left: 149px;
}
.text-status table, td, tr {
    margin-top:-18px;
}
.table-no-9 td{
    margin-left: 135px;
    width: 20px;
    margin-top: -30px;
    border: none;
}
.table-no-9 {
    margin-left: 150px;
}



.rencana {
    display: flex;
}
.nama-rencana {
    margin-left: 5px;
}
.nama-rencana p{
    font-size: 10px;
    margin-top: -2px;
    border-collapse: collapse;
}
.table-rencana-1 table {
    width: 100%;
    border-collapse: collapse;
}
.table-rencana-1 table, tr, td {
    border: 1px solid;
}
.table-rencana-1 {
    width: 50px;
    font-size: 10px;
    margin-left: 190px;
    margin-top: -25px;
    text-align: center;
}

.table-rencana-2 table {
    width: 100%;
    border-collapse: collapse;
}
.table-rencana-2 table, tr, td {
    border: 1px solid;
}
.table-rencana-2 {
    width: 50px;
    font-size: 10px;
    margin-left: 20px;
    margin-top: -25px;
    text-align: center;
}

.table-rencana-3 table {
    width: 100%;
    border-collapse: collapse;
}
.table-rencana-3 table, tr, td {
    border: 1px solid;
}
.table-rencana-3 {
    width: 80px;
    font-size: 10px;
    margin-left: 20px;
    margin-top: -25px;
    text-align: center;
}


.kl-yg-pindah {
    font-size: 10px;
    margin-left: 5px;
}

.table-kl-pindah table {
    width: 100%;
    border-collapse: collapse ;
}
.table-kl-pindah table, tr, td {
    border: 1px solid;
}




.baris-1 {
    display: flex;
    font-size: 10px;
}
.bagian-1 {
    margin-left: 5px;
}
.bagian-11 {
    margin-left: 360px;
    
}
.bagian-111 {
    margin-left: 250px;
}
.bagian-1111 {
    margin-left: 50px;
}

.baris-2 {
    display: flex;
    font-size: 10px;
    margin-top: -10px;
}
.bagian-2 {
    margin-left: 5px;
}
.bagian-22 {
    margin-left: 300px;
    
}
.bagian-222 {
    margin-left: 250px;
}
.bagian-2222 {
    margin-left: 50px;
}

.baris-3 {
    display: flex;
    font-size: 10px;
    margin-top: -10px;
}
.bagian-3 {
    margin-left: 5px;
}
.bagian-33 {
    margin-left: 335px;
    
}
.bagian-333 {
    margin-left: 250px;
}
.bagian-3333 {
    margin-left: 80px;
}

.baris-4 {
    display: flex;
    font-size: 10px;
    margin-top: 40px;
}
.bagian-4 {
    margin-left: 5px;
}
.bagian-44 {
    margin-left: 335px;
    
}
.bagian-444 {
    margin-left: 200px;
}
.bagian-4444 {
    margin-left: 80px;
}


    </style>
</head>
<body>
    <div class="container">
        <div class="gambar">
            <img src="https://raw.githubusercontent.com/Ibnumaggie27/project/main/public/img/icon.png" alt="">
        </div>
        <div class="tulisan">
            <div class="judul">
                <p>SURAT KETERANGAN PINDAH WNI</p>
            </div>
            <div class="kode">
                <p>F-1.08</p>
            </div>
        </div>
    </div>

    <div class="data">
        <p>DATA DAERAH ASAL</p>
    </div>

    <div class="isi">
        <div class="no-kk">
            1. Nomor KK
        </div>
        <div class="table-kk">
            <table>
                <tr>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="kepala">
        <div class="nama">
            <p>2. Nama Kepala Keluarga</p>
        </div>
        <div class="isi-nama">
            <table>
                <tr>
                    <td>UDIN KEHED</td>
                </tr>
            </table>
        </div>
        <div class="nik">
            <table>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="tempat">
        <div class="nama-tempat">
            <p>3. Tempat Tgl.Lahir</p>
        </div>
        <div class="isi-tempat">
            <table>
                <tr>
                    <td>CIANJUR</td>
                </tr>
            </table>
        </div>
        <div class="table-1">
            <table>
                <tr>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
        <div class="table-2">
            <table>
                <tr>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
        <div class="table-3">
            <table>
                <tr>
                    <td>1</td>
                    <td>3</td>
                    <td>4</td>
                    <td>6</td>
                </tr>
            </table>
        </div>

        <div class="jenis">
            <p>Jenis Kelamin</p>
        </div>

        <div class="table-4">
            <table>
                <tr>
                    <td>1</td>
                </tr>
            </table>
        </div>
        <div class="laki"><p>1. L</p></div>
        <div class="wanita"><p>2. P</p></div>
    </div>

    <div class="agama">
        <div class="nama-agama">
            <p>4. Agama</p>
        </div>
        <div class="table-no">
            <table>
                <tr>
                    <td>1</td>
                </tr>
            </table>
        </div>
        <div class="textAgama">
            <table>
                <tr>
                    <td>1. Islam</td>
                    <td>2. Katolik</td>
                    <td>3. Protestan</td>
                    <td>4. Hindu</td>
                    <td>5. Budha</td>
                    <td>6. lainnya...........</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="alamat">
        <div class="isi-alamat">
            <p>5. Alamat</p>
        </div>
        <div class="table-alamat">
            <table>
                <tr>
                    <td>PALAPALA</td>
                </tr>
            </table>
        </div>
        <div class="rt">
            <p>RT.</p>
        </div>
        <div class="table-rt">
            <table>
                <tr>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
        <div class="rw">
            <p>RW.</p>
        </div>
        <div class="table-rw">
            <table>
                <tr>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="desa">
        <div class="isi-desa">
            <p>a. Desa / Kelurahan</p>
        </div>
        <div class="table-desa">
            <table>
                <tr>
                    <td>PALAPALA</td>
                </tr>
            </table>
        </div>
        <div class="kab">
            <p>c. Kab./Kota</p>
        </div>
        <div class="table-kab">
            <table>
                <tr>
                    <td>CIACAI</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="kec">
        <div class="isi-kec">
            <p>b. Kecamatan</p>
        </div>
        <div class="table-kec">
            <table>
                <tr>
                    <td>PALAPALA</td>
                </tr>
            </table>
        </div>
        <div class="pro">
            <p>d. Provinsi</p>
        </div>
        <div class="table-pro">
            <table>
                <tr>
                    <td>CIACAI</td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="kode-pos">
        <div class="nama-kode">
            <p>Kode Pos</p>
        </div>
        <div class="table-kode">
            <table>
                <tr>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>1</td>
                    <td>4</td>
                </tr>
            </table>
        </div>
        <div class="nama-telp">
            <p>Telp.</p>
        </div>
        <div class="table-telp">
            <table>
                <tr>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                    <td>4</td>
                    <td>2</td>
                    <td>4</td>
                    <td>4</td>
                    <td>4</td>
                    <td>3</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="data">
        <p>DATA KEPINDAHAN</p>
    </div>

    <div class="pindah">
        <div class="nama-pindah">
            <p>4. Agama</p>
        </div>
        <div class="table-no-2">
            <table>
                <tr>
                    <td>8</td>
                </tr>
            </table>
        </div>
        <div class="text-pindah">
            <table>
                <tr>
                    <td>1. Pekerjaan</td>
                    <td>3. Keamanan</td>
                    <td>5. Perumahan</td>
                    <td>7. Lainnya (lainnya) pindah alamat</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="pindah">
        <div class="nama-pindah">
            <p></p>
        </div>
        <div class="table-no-3">
            <table>
                <tr>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="text-pindah">
            <table>
                <tr>
                    <td>2. Pendidikan</td>
                    <td>4. Kesehatan</td>
                    <td>6. Keluarga</td>
                    <td>8. Turut Suami / Istri</td>
                </tr>
            </table>
        </div>
    </div>


    <div class="alamat-kepindahan">
        <div class="isi-alamat-kepindahan">
            <p>2. Alamat Tujuan Pindah</p>
        </div>
        <div class="table-alamat-2">
            <table>
                <tr>
                    <td>KP.LALALALA</td>
                </tr>
            </table>
        </div>
        <div class="rt-2">
            <p>RT.</p>
        </div>
        <div class="table-rt-2">
            <table>
                <tr>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
        <div class="rw-2">
            <p>RW.</p>
        </div>
        <div class="table-rw-2">
            <table>
                <tr>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="desa">
        <div class="isi-desa">
            <p>a. Desa / Kelurahan</p>
        </div>
        <div class="table-desa">
            <table>
                <tr>
                    <td>PALAPALA</td>
                </tr>
            </table>
        </div>
        <div class="kab">
            <p>c. Kab./Kota</p>
        </div>
        <div class="table-kab">
            <table>
                <tr>
                    <td>CIACAI</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="kec">
        <div class="isi-kec">
            <p>b. Kecamatan</p>
        </div>
        <div class="table-kec">
            <table>
                <tr>
                    <td>PALAPALA</td>
                </tr>
            </table>
        </div>
        <div class="pro">
            <p>d. Provinsi</p>
        </div>
        <div class="table-pro">
            <table>
                <tr>
                    <td>CIACAI</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="kode-pos">
        <div class="nama-kode">
            <p>Kode Pos</p>
        </div>
        <div class="table-kode">
            <table>
                <tr>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>1</td>
                    <td>4</td>
                </tr>
            </table>
        </div>
        <div class="nama-telp">
            <p>Telp.</p>
        </div>
        <div class="table-telp">
            <table>
                <tr>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                    <td>2</td>
                    <td>4</td>
                    <td>2</td>
                    <td>4</td>
                    <td>4</td>
                    <td>4</td>
                    <td>3</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="klasifikasi">
        <div class="nama-klasifikasi">
            <p>3. Klasifikasi Pindah</p>
        </div>
        <div class="table-no-4">
            <table>
                <tr>
                    <td>3</td>
                </tr>
            </table>
        </div>
        <div class="text-klasifikasi">
            <table>
                <tr>
                    <td>1. Dalam Satuan Desa / Kelurahan</td>
                    <td>3. Antar Kecamatan</td>
                    <td>5. Antar Provinsi</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="klasifikasi">
        <div class="nama-klasifikasi">
            <p></p>
        </div>
        <div class="table-no-5">
            <table>
                <tr>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="text-klasifikasi">
            <table>
                <tr>
                    <td>2. Antar Desa / Kelurahan</td>
                    <td>4. Antar Kab. / Istri</td>
                </tr>
            </table>
        </div>
    </div>


    <div class="kepindahan">
        <div class="nama-kepindahan">
            <p>4. Jenis Kepindahan</p>
        </div>
        <div class="table-no-6">
            <table>
                <tr>
                    <td>4</td>
                </tr>
            </table>
        </div>
        <div class="text-kepindahan">
            <table>
                <tr>
                    <td>1. Kepala Keluarga</td>
                    <td>3. Antar Keluarga & Sebagai Anggota Keluarga</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="kepindahan">
        <div class="nama-kepindahan">
            <p></p>
        </div>
        <div class="table-no-7">
            <table>
                <tr>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="text-kepindahan">
            <table>
                <tr>
                    <td>2. Kep. Keluarga & Seluruh Anggota Kel.</td>
                    <td>4. Anggota Keluarga</td>
                </tr>
            </table>
        </div>
    </div>


    <div class="status">
        <div class="nama-status">
            <p>5. Status No.KK Yg Pindah</p>
        </div>
        <div class="table-no-8">
            <table>
                <tr>
                    <td>2</td>
                </tr>
            </table>
        </div>
        <div class="text-status">
            <table>
                <tr>
                    <td>1. Numpang KK</td>
                    <td>3. Tdk ada anggota keluarga yang ditinggal</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="status">
        <div class="nama-status">
            <p></p>
        </div>
        <div class="table-no-9">
            <table>
                <tr>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="text-status">
            <table>
                <tr>
                    <td>2. Membuat KK Baru</td>
                    <td>4. Nomor KK Tetap</td>
                </tr>
            </table>
        </div>
    </div>


    <div class="rencana">
        <div class="nama-rencana">
            <p>7. Rencana Tanggal Pindah</p>
        </div>
        <div class="table-rencana-1">
            <table>
                <tr>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
        <div class="table-rencana-2">
            <table>
                <tr>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
        <div class="table-rencana-3">
            <table>
                <tr>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="kl-yg-pindah">
        <p>8. Keluarga Yang Pindah</p>
    </div>

    <div class="table-kl-pindah">
        <table>
            <thead>
                <td>NO</td>
                <td colspan="16">NIK</td>
                <td>NAMA</td>
                <td>KETERANAGAN</td>
            </thead>
            <tbody>
                <td>1</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>lalalalal</td>
                <td>kekekekekek</td>
            </tbody>
        </table>
    </div>

    <div class="baris-1">
        <div class="bagian-1">
            <p>Diketahui Oleh :</p>
        </div>
        <div class="bagian-11">
            <p></p>
        </div>
        <div class="bagian-111">
            <p>Diketahui Oleh :</p>
        </div>
        <div class="bagian-1111">
            <p></p>
        </div>
    </div>

    <div class="baris-2">
        <div class="bagian-2">
            <p>Camat Kec. Cipanas</p>
        </div>
        <div class="bagian-22">
            <p>Pemohon</p>
        </div>
        <div class="bagian-222">
            <p>Kepala Desa Palasari</p>
        </div>
        <div class="bagian-2222">
            <p></p>
        </div>
    </div>

    <div class="baris-3">
        <div class="bagian-3">
            <p>No. .............................</p>
        </div>
        <div class="bagian-33">
            <p></p>
        </div>
        <div class="bagian-333">
            <p>Sekretaris</p>
        </div>
        <div class="bagian-3333">
            <p>No. 471.2/   /Pem</p>
        </div>
    </div>

    <div class="baris-4">
        <div class="bagian-4">
            <p>-----------------------------</p>
        </div>
        <div class="bagian-44">
            <p>INDRA GUNAWAN</p>
        </div>
        <div class="bagian-444">
            <p>LASMINI. A.Md</p>
        </div>
        <div class="bagian-4444">
            <p>Tgl. 21-07-2023</p>
        </div>
    </div>
</body>
</html>