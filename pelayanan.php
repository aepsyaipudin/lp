<?php
error_reporting(E_ALL);
display_errors  (1);    
ini_set("display_errors", "On");
require_once 'vendor/autoload.php';

$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template.docx');

session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
$nama_penjamin=$_SESSION['username'];
?>
<form method="POST" action="process_form.php" enctype="multipart/form-data">
  <label for="nama_penjamin">Nama Penjamin:</label>
  <input type="text" id="nama" name="nama"><br><br>
  
  <label for="umur_penjamin">Umur:</label>
  <input type="text" id="umur_penjamin" name="umur"><br><br>
  
  <label for="pekerjaan_penjamin">Pekerjaan:</label>
  <input type="text" id="pekerjaan_penjamin" name="pekerjaan"><br><br>
  
  <label for="hubungan">Hubungan dengan Narapidana:</label>
  <input type="text" id="hubungan" name="hubungan"><br><br>
  
  <label for="alamat">Alamat:</label>
  <input type="text" id="alamat" name="alamat"><br><br>
  
  <label for="nomor_telepon">Nomor Telepon:</label>
  <input type="text" id="nomor_telepon" name="nomor_telepon"><br><br>
  
  <label for="nama_narapidana">Nama Narapidana:</label>
  <input type="text" id="nama_narapidana" name="nama_narapidana"><br><br>
  
<label for="umur_narapidana">Nomor Telepon:</label>
  <input type="text" id="umur_narapidana" name="nama_narapidana"><br><br>
  <input type="submit" value="Submit">
</form>


<?php


error_reporting(E_ALL);
display_errors  (1);    
ini_set("display_errors", "On");
require_once 'vendor/autoload.php';

$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('template.docx');

session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
$nama_penjamin=$_SESSION['username'];
?>
<form method="POST" action="process_form.php" enctype="multipart/form-data">
  <label for="nama_penjamin">Nama Penjamin:</label>
  <input type="text" id="nama" name="nama"><br><br>
  
  <label for="umur_penjamin">Umur:</label>
  <input type="text" id="umur_penjamin" name="umur"><br><br>
  
  <label for="pekerjaan_penjamin">Pekerjaan:</label>
  <input type="text" id="pekerjaan_penjamin" name="pekerjaan"><br><br>
  
  <label for="hubungan">Hubungan dengan Narapidana:</label>
  <input type="text" id="hubungan" name="hubungan"><br><br>
  
  <label for="alamat">Alamat:</label>
  <input type="text" id="alamat" name="alamat"><br><br>
  
  <label for="nomor_telepon">Nomor Telepon:</label>
  <input type="text" id="nomor_telepon" name="nomor_telepon"><br><br>
  
  <label for="nama_narapidana">Nama Narapidana:</label>
  <input type="text" id="nama_narapidana" name="nama_narapidana"><br><br>
  
<label for="umur_narapidana">Nomor Telepon:</label>
  <input type="text" id="umur_narapidana" name="nama_narapidana"><br><br>
  <input type="submit" value="Submit">
</form>


<?php

$nama_penjamin = $_POST['nama'];
$umur_penjamin = $_POST['umur_penjamin'];
$pekerjaan_penjamin = $_POST['pekerjaan_penjamin'];
$hubungan = $_POST['hubungan'];
$alamat = $_POST['alamat'];
$nomor_telepon = $_POST['nomor_telepon'];
$nama_narapidana = $_POST['nama_narapidana'];
$umur_narapidana = $_POST['umur_narapidana'];

$templateProcessor->setValue('namaPenjamin', $nama_penjamin);
$templateProcessor->setValue('umur_penjamin', $umur_penjamin);
$templateProcessor->setValue('pekerjaan_penjamin', $pekerjaan_penjamin);
$templateProcessor->setValue('hubungan', $hubungan);
$templateProcessor->setValue('alamat', $alamat);
$templateProcessor->setValue('nomor_telepon', $nomor_telepon);
$templateProcessor->setValue('nama_narapidana', $nama_narapidana);
$templateProcessor->setValue('umur_narapidana', $umur_narapidana);

// Generate the document and save it
$pathTosave="surat_jaminan.docx";
$templateProcessor ->save($pathTosave);

header('content-description: File Transfer');
header('content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('content-disposition: attachment; filename="surat_jaminan.docx"');
readfile($pathTosave);

// Generate the document and save it
$pathTosave="surat_jaminan.docx";
$templateProcessor ->save($pathTosave);

header('content-description: File Transfer');
header('content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('content-disposition: attachment; filename="surat_jaminan.docx"');
readfile($pathTosave);