<?php
include('koneksi2.php');//include file koneksi.php yang berisi koneksi ke database
require 'vendor/autoload.php';//equire file autoload.php di dalam folder vendor
//menggunakan namespace dari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();//membuat object dengan nama $spreadsheet dengan menggunakan class Spreadsheet
$sheet = $spreadsheet->getActiveSheet();//membuat variabel $sheet yang digunakan sebagai activesheet di file excel
//membuat heading dari tabel
$sheet->setCellValue('A1','No');
$sheet->setCellValue('B1','Jenis Pendaftaran');
$sheet->setCellValue('C1','Tanggal Masuk');
$sheet->setCellValue('D1','Nis');
$sheet->setCellValue('E1','No Peserta');
$sheet->setCellValue('F1','Paud');
$sheet->setCellValue('G1','TK');
$sheet->setCellValue('H1','No. SKHUN');
$sheet->setCellValue('I1','NO. Ijasah');
$sheet->setCellValue('J1','Hobi');
$sheet->setCellValue('K1','Cita- Cita');

$sheet->setCellValue('L1','Nama');
$sheet->setCellValue('M1','Jenis Kelamin');
$sheet->setCellValue('N1','NISN');
$sheet->setCellValue('O1','NIK');
$sheet->setCellValue('P1','Tempat Lahir');
$sheet->setCellValue('Q1','Tanggal Lahir');
$sheet->setCellValue('R1','Agama');
$sheet->setCellValue('S1','Kelainan');


$sheet->setCellValue('T1','Alamat jalan');
$sheet->setCellValue('U1','RT');
$sheet->setCellValue('V1','RW');
$sheet->setCellValue('W1','Dusun');
$sheet->setCellValue('X1','Desa');
$sheet->setCellValue('Y1','Kecamatan');
$sheet->setCellValue('Z1','Kode Pos');
$sheet->setCellValue('AA1','Tempat Tinggal');
$sheet->setCellValue('AB1','Transportasi');

$sheet->setCellValue('AC1','Handphone');
$sheet->setCellValue('AD1','Telepun');
$sheet->setCellValue('AE1','Email');
$sheet->setCellValue('AF1','Kps Pkh Kip');
$sheet->setCellValue('AG1','No Kps Kks Kip');
$sheet->setCellValue('AH1','Warga Negara');

//membuat query untuk mengambil data pada semua tabel di database/ menggabungkan tabel
$query = mysqli_query($con, "SELECT peserta_didik.jenispendaf, peserta_didik.tglmasuk, peserta_didik.nis, peserta_didik.nopeserta, peserta_didik.paud, 
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
$i = 2;
$no = 1;
//extract hasil query menggunakan while, dan setiap perulangan data akan disimpan di variabel $row
while($row = mysqli_fetch_array($query))
{//menuliskan perintah untuk menuliskan data dari hasil query
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $row['jenispendaf']);
    $sheet->setCellValue('C'.$i, $row['tglmasuk']);
    $sheet->setCellValue('D'.$i, $row['nis']);
    $sheet->setCellValue('E'.$i, $row['nopeserta']);
    $sheet->setCellValue('F'.$i, $row['paud']);
    $sheet->setCellValue('G'.$i, $row['tk']);
    $sheet->setCellValue('H'.$i, $row['noskhun']);
    $sheet->setCellValue('I'.$i, $row['noijasah']);
    $sheet->setCellValue('J'.$i, $row['hobi']);
    $sheet->setCellValue('K'.$i, $row['citacita']);

    $sheet->setCellValue('L'.$i, $row['nama']);
    $sheet->setCellValue('M'.$i, $row['jeniskelamin']);
    $sheet->setCellValue('N'.$i, $row['nisn']);
    $sheet->setCellValue('O'.$i, $row['nik']);
    $sheet->setCellValue('P'.$i, $row['tempallahir']);
    $sheet->setCellValue('Q'.$i, $row['tgllahir']);
    $sheet->setCellValue('R'.$i, $row['agama']);
    $sheet->setCellValue('S'.$i, $row['kelainan']);
    
    $sheet->setCellValue('T'.$i, $row['jalan']);
    $sheet->setCellValue('U'.$i, $row['rt']);
    $sheet->setCellValue('V'.$i, $row['rw']);
    $sheet->setCellValue('W'.$i, $row['dusun']);
    $sheet->setCellValue('X'.$i, $row['desa']);
    $sheet->setCellValue('Y'.$i, $row['kecamatan']);
    $sheet->setCellValue('Z'.$i, $row['kodpos']);
    $sheet->setCellValue('AA'.$i, $row['tempattinggal']);
    $sheet->setCellValue('AB'.$i, $row['transportasi']);

    $sheet->setCellValue('AC'.$i, $row['hp']);
    $sheet->setCellValue('AD'.$i, $row['telp']);
    $sheet->setCellValue('AE'.$i, $row['email']);
    $sheet->setCellValue('AF'.$i, $row['kps_pkh_kip']);
    $sheet->setCellValue('AG'.$i, $row['no_kps_kks_kip']);
    $sheet->setCellValue('AH'.$i, $row['warga_negara']);
    $i++;
}
//membuat settingan border untuk cell
$styleArray =[
    'borders'=> [
        'allBorders'=>[
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border :: BORDER_THIN, 
        ],
    ],
];
$i = $i -1;
//membuat batas border
$sheet->getStyle('A1:AH'.$i)->applyFromArray($styleArray); 

$write = new Xlsx($spreadsheet);//render menjadi file Xlsx hasil dari object $spreadsheet
$write->save('Data Pendaftaran Siswa.xlsx');//melakukan penyimpanan / Export file excel
?>
