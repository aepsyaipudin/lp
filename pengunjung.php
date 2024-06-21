<?php
require_once 'header.php';

ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);

// Mulai sesi untuk mengakses variabel sesi
session_start();

// Periksa apakah pengguna sudah login atau belum
if(isset($_SESSION['username'])) {
    // Jika sudah login, gunakan nama pengguna untuk mengisi formulir
    $nama_pengunjung = $_SESSION['username'];
} else {
    // Jika belum login, biarkan kolom nama pengunjung kosong
    $nama_pengunjung = '';
}
?>

<div class="wrapForm">
    <h2>Form Pengunjung</h2>
    <form action="process_pengunjung.php" method="POST" enctype="multipart/form-data">
        
                <label for="nama_pengunjung">Nama Pengunjung:</label><br>
                <div class="formPengunjung">
                    <input type="text" id="nama_pengunjung" name="nama_pengunjung" value="<?php echo $nama_pengunjung; ?>" required></div>
                    <br><br>

                <label for="nama_wbp">Nama WBP:</label><br>
                <div class="formPengunjung">
                    <input type="text" id="nama_wbp" name="nama_wbp" required></div>
                    <br><br>

            
                <label for="kamar_hunian">Pilih Blok Hunian:</label><br>
                <div class="formPengunjung">
                    <select id="kamar_hunian" name="kamar_hunian">
                    <option value="Kamar 1">Kamar 1</option>
                    <option value="Kamar 2">Kamar 2<option>
                    <option value="Kamar 3">Kamar 3</option>
                    <option value="Kamar 4">Kamar 4</option>
                    <option value="Kamar 5">Kamar 5</option>
                    <option value="Kamar 6">Kamar 6</option>
                    <option value="Kamar 7">Kamar 7</option>
                    <option value="Kamar 8">Kamar 8</option>
                    <option value="Kamar 9">Kamar 9</option>
                    <option value="Kamar 10">Kamar 10</option>
                    <option value="Kamar 11">Kamar 11</option>
                    <option value="Kamar 1MS">Kamar 1 Minimum Security</option>
                    <option value="Kamar 2MS">Kamar 2 Minimum Security</option>
                </select></div>
                <br>

                <label for="jumlah_pengunjung">Jumlah Pengunjung:</label><br>
                <div class="formPengunjung">
                    <input type="number" id="jumlah_pengunjung" name="jumlah_pengunjung" required></div>
                    <br><br>

                    <label for="nama_wbp">Titipan Uang:</label><br>
                <div class="formPengunjung">
                    <input type="text" id="titipan_uang" name="titipan_uang" required></div>
                    <br><br>
        </div>
        <div class="wrapForm">
            <label for="foto_wajah">Upload Foto Wajah:</label><br>
            <div class="formPengunjung">
                <input type="file" id="foto_wajah" name="foto_wajah" accept="image/*" required></div>
                <br><br>

            <label for="foto_ktp">Upload Foto KTP:</label><br>
            <div class="formPengunjung">
                <input type="file" id="foto_ktp" name="foto_ktp" accept="image/*" required></div>
                <br><br>
        </div>   

             <div class="saveData">
                <button class="btnSave" type="submit">Simpan Data</button>
            </div>
    </form>
    
    
</body>
</html>
