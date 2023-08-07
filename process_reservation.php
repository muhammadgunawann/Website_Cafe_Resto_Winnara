<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $name = $_POST['name'];
    $nohp = $_POST['nohp'];
    $select1 = $_POST['select1'];
    $alamat = $_POST['alamat'];
    $specialRequest = $_POST['message']; // Perubahan variabel 'special_request' menjadi 'message'

    // Format pesan WhatsApp
    $message = "*[PESANAN BARU]*\n";
    $message .= "*Nama Pemesan* : " . $name . "\n";
    $message .= "*No Hp/Wa* : " . $nohp . "\n";
    $message .= "*Sistem* : " . $select1 . "\n";
    $message .= "*Alamat* : " . $alamat . "\n";
    
    // Periksa apakah Special Request diisi sebelum ditambahkan ke pesan
    if (!empty($specialRequest)) {
        $message .= "*Pesanan :* " . $specialRequest . "\n";
    }

    // Ganti YOUR_WHATSAPP_NUMBER dengan nomor WhatsApp bisnis Anda
    $ownerWhatsAppNumber = "+6281266926881";

    // Membuat tautan WhatsApp Web dengan pesan yang sudah diisi
    $apiUrl = "https://wa.me/" . $ownerWhatsAppNumber . "?text=" . urlencode($message);
    header("Location: " . $apiUrl);
    exit;
}
?>
