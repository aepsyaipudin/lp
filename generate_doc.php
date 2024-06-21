<?php
require 'vendor/autoload.php'; // Load library PHPWord
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

// Mendapatkan data dari form
$nama_pengunjung = $_POST['nama_pengunjung'];
$nama_wbp = $_POST['nama_wbp'];
$jumlah_pengunjung = $_POST['jumlah_pengunjung'];
$foto_wajah = $_POST['foto_wajah'];
$foto_ktp = $_POST['foto_ktp'];

// Membuat dokumen Word
$phpWord = new PhpWord();
$section = $phpWord->addSection();

// Menambahkan data pengunjung ke dalam dokumen
$section->addText("Nama Pengunjung: $nama_pengunjung");
$section->addText("Nama WBP: $nama_wbp");
$section->addText("Jumlah Pengunjung: $jumlah_pengunjung");

// Menambahkan gambar foto wajah
$imageWajah = $section->addImageFromBase64($foto_wajah);
$section->addImage($imageWajah);

// Menambahkan gambar foto KTP
$imageKTP = $section->addImageFromBase64($foto_ktp);
$section->addImage($imageKTP);

// Simpan dokumen ke dalam file
$filename = 'data_kunjungan.docx';
$objWriter = IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save($filename);

// Download file
header("Content-Disposition: attachment; filename=$filename");
readfile($filename);
unlink($filename); // Hapus file setelah di-download
?>
