function kirimPesan() {

    var nama = document.getElementById('nama');
    var email = document.getElementById('email');
    var pesan = document.getElementById('pesan');

    var gabungan = 'Nama%3A%0A' + nama.value + '%0AEmail%3A%0A' + email.value + '%0APesan%3A%0A' + pesan.value;

    var token = '7165305046:AAF4Tn4avCW9W3zOQBx1-iu4giHx1LEuOPE'; // Ganti dengan token bot yang kamu buat
    var grup = '-1002015489042'; // Ganti dengan chat id dari bot yang kamu buat

    $.ajax({
        url: `https://api.telegram.org/bot${token}/sendMessage?chat_id=${grup}&text=${gabungan}&parse_mode=html`,
        method: `POST`,

        
    })
    header("Location: profile.php");
exit;
}
