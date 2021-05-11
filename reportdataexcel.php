<?php
include('koneksi1.php'); //include file koneksi.php yang berisi koneksi ke database
require 'vendor/autoload.php';//equire file autoload.php di dalam folder vendor
//menggunakan namespace dari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();//membuat object dengan nama $spreadsheet dengan menggunakan class Spreadsheet
$sheet = $spreadsheet->getActiveSheet(); //membuat variabel $sheet yang digunakan sebagai activesheet di file excel
$sheet->setCellValue('A1','No');//membuat heading dari tabel
$sheet->setCellValue('B1','Nama');
$sheet->setCellValue('C1','Kelas');
$sheet->setCellValue('D1','Alamat');

$query = mysqli_query($con, "SELECT * FROM tb_siswa");//membuat query untuk mengambil data di tabel
$i = 2;
$no = 1;
//extract hasil query menggunakan while, dan setiap perulangan data akan disimpan di variabel $row
while($row = mysqli_fetch_array($query)) 
{//menuliskan perintah untuk menuliskan data dari hasil query
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $row['nama']);
    $sheet->setCellValue('C'.$i, $row['kelas']);
    $sheet->setCellValue('D'.$i, $row['alamat']);
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
$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);

$write = new Xlsx($spreadsheet);//render menjadi file Xlsx hasil dari object $spreadsheet 
$write->save('Report Data Siswa.xlsx');//melakukan penyimpanan / Export file excel
?>