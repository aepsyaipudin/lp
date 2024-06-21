<?php
// Mengambil data dari form
$nama_pengunjung = $_POST['nama_pengunjung'];
$nama_wbp = $_POST['nama_wbp'];
$jumlah_pengunjung = $_POST['jumlah_pengunjung'];
$foto_wajah = $_POST['foto_wajah'];
$foto_ktp = $_POST['foto_ktp'];

// Membuat konten dokumen berdasarkan data yang dimasukkan
$content = "Nama Pengunjung: $nama_pengunjung\n";
$content .= "Nama WBP: $nama_wbp\n";
$content .= "Jumlah Pengunjung: $jumlah_pengunjung\n";
$content .= "Foto Wajah: $foto_wajah\n";
$content .= "Foto KTP: $foto_ktp\n";

// Menyimpan konten ke file dokumen
$filename = 'data_kunjungan.doc';
file_put_contents($filename, $content);

// Mengarahkan pengguna untuk mengunduh file dokumen
header('Content-Type: application/msword');
header('Content-Disposition: attachment; filename="' . $filename . '"');
readfile($filename);
exit();
?>
