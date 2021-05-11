<html>
<head>
<!--membuat pengunaan bootstrapc-->
<link 
rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
crossorigin="anonymous">

<!--membuat css internal-->
<style>
body 
{  
    background-color: lightblue;
}
.latar{
    background-color: yellow;
}
</style>
</head>
<body>
<h1>Data Pendaftaran Siswa<h1>
    <table border="1" class="latar">
        <tr> <!-- membuat tabel-->
            <th>NO</th>
            <th>Jenis Pendaftaran</th>
            <th>Tanggal Masuk</th>
            <th>Nis</th>
            <th>No Peserta</th>
            <th>Paud</th>
            <th>TK</th>
            <th>No. SKHUN</th>
            <th>NO. Ijasah</th>
            <th>Hobi</th>
            <th>Cita- Cita</th>

            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>NISN</th>
            <th>NIK</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Kelainan</th>

            <th>Alamat jalan</th>
            <th>RT</th>
            <th>RW</th>
            <th>Dusun</th>
            <th>Desa</th>
            <th>Kecamatan</th>
            <th>Kode Pos</th>
            <th>Tempat Tinggal</th>
            <th>Transportasi</th>

            <th>Handphone</th>
            <th>Telepun</th>
            <th>Email</th>
            <th>Kps Pkh Kip</th>
            <th>No Kps Kks Kip</th>
            <th>Warga Negara</th>
            
        </tr>
        <?php
        include 'koneksi2.php'; //memangil file lain
        //membuat perintah select menampilkan isi database dengan menggabungkan 4 tabel
        $data =mysqli_query($con, "SELECT peserta_didik.jenispendaf, peserta_didik.tglmasuk, peserta_didik.nis, peserta_didik.nopeserta, peserta_didik.paud, 
        peserta_didik.tk,peserta_didik.noskhun, peserta_didik.noijasah, peserta_didik.hobi,peserta_didik.citacita,
        data_pribadi.nama, data_pribadi.jeniskelamin, data_pribadi.nisn, data_pribadi.nik, data_pribadi.tempallahir, data_pribadi.tgllahir, 
        data_pribadi.agama, data_pribadi.kelainan,
        data_tempattinggal.jalan, data_tempattinggal.rt, data_tempattinggal.rw, data_tempattinggal.dusun, data_tempattinggal.desa, 
        data_tempattinggal.kecamatan, data_tempattinggal.kodpos, data_tempattinggal.tempattinggal, data_tempattinggal.transportasi, 
        data_lainnya.hp, data_lainnya.telp, data_lainnya.email, data_lainnya.kps_pkh_kip, data_lainnya.no_kps_kks_kip, 
        data_lainnya.warga_negara FROM peserta_didik
        JOIN data_pribadi ON peserta_didik.id_pribadi= data_pribadi.id_pribadi 
        JOIN data_tempattinggal ON peserta_didik.id_tempattinggal= data_tempattinggal.id_tempattinggal
        JOIN data_lainnya ON peserta_didik.id_lainnya= data_lainnya.id_lainnya
        ");
        $no =1;
        foreach ($data  as $row){ //menmpilkan data pada setiap tabel pada database 
            echo"
            <tr>
            <td>$no</td>
            <td>".$row['jenispendaf']."</td>
            <td>".$row['tglmasuk']."</td>
            <td>".$row['nis']."</td>
            <td>".$row['nopeserta']."</td>
            <td>".$row['paud']."</td>
            <td>".$row['tk']."</td>
            <td>".$row['noskhun']."</td>
            <td>".$row['noijasah']."</td>
            <td>".$row['hobi']."</td>
            <td>".$row['citacita']."</td>
           
            <td>".$row['nama']."</td>
            <td>".$row['jeniskelamin']."</td>
            <td>".$row['nisn']."</td>
            <td>".$row['nik']."</td>
            <td>".$row['tempallahir']."</td>
            <td>".$row['tgllahir']."</td>
            <td>".$row['agama']."</td>
            <td>".$row['kelainan']."</td>

            <td>".$row['jalan']."</td>
            <td>".$row['rt']."</td>
            <td>".$row['rw']."</td>
            <td>".$row['dusun']."</td>
            <td>".$row['desa']."</td>
            <td>".$row['kecamatan']."</td>
            <td>".$row['kodpos']."</td>
            <td>".$row['tempattinggal']."</td>
            <td>".$row['transportasi']."</td>

            <td>".$row['hp']."</td>
            <td>".$row['telp']."</td>
            <td>".$row['email']."</td>
            <td>".$row['kps_pkh_kip']."</td>
            <td>".$row['no_kps_kks_kip']."</td>
            <td>".$row['warga_negara']."</td>
            </tr>";
            $no++;// setiap loop no di tambah 1
        }
        ?>
    </table> 
    </br>
    <!--membuat form untuk booton link-->
    <form action="reportdataexcel_pendaftaran.php">
        <div class="form-group row">
            <div class="col-sm-10">
            <button name= "simpan" type="submit" class="btn btn-primary">Export to Excel</button>
            </div>
        </div>
    </form>
</body>
</html>

