<?php 
//equire file autoload.php di dalam folder vendor
require 'vendor/autoload.php';
//menggunakan namespace dari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//membuat object dengan nama $spreadsheet dengan menggunakan class Spreadsheet
$spreadsheet = new Spreadsheet();
//membuat variabel $sheet yang digunakan sebagai activesheet di file excel
$sheet = $spreadsheet->getActiveSheet();
//membuat heading dari tabel
$sheet->setCellValue('A1','Hello World !');

//render menjadi file Xlsx hasil dari object $spreadsheet 
$write = new Xlsx($spreadsheet);
$write->save('hello world.xlsx'); //melakukan penyimpanan / Export file excel
?>