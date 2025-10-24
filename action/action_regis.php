<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db.php';

$nama       = $_POST['nama'];
$email      = $_POST['email'];
$password   = $_POST['password'];
$konfirmasi = $_POST['konfirmasi'];
$no_tlp     = $_POST['no_tlp'];
$tanggal_daftar = date('Y-m-d H:i:s');

//  Cek password
if ($password !== $konfirmasi) {
    echo "
    <script>
        alert('Password dan konfirmasi tidak sama!');
        window.location.href = '../layout/beranda.php';
    </script>
    ";
    exit;
}

// Cek email
$cek = $conn->prepare("SELECT * FROM users WHERE email = ?");
$cek->bind_param("s", $email);
$cek->execute();
$result = $cek->get_result();

if ($result->num_rows > 0) {
    echo "
    <script>
        alert('Email sudah terdaftar! Silakan gunakan email lain atau login.');
        window.location.href = '../layout/beranda.php';
    </script>
    ";
    exit;
}

$hashed = password_hash($password, PASSWORD_DEFAULT);

// --- Simpan User ---
$sql = "INSERT INTO users (nama, email, password, no_tlp, tanggal_daftar)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nama, $email, $hashed, $no_tlp, $tanggal_daftar);


if ($stmt->execute()) {
    echo "
    <script>
        alert('Pendaftaran berhasil! Silakan login sekarang.');
        window.location.href = '../layout/beranda.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Terjadi kesalahan! Gagal mendaftar, coba lagi nanti.');
        window.location.href = '../layout/beranda.php';
    </script>
    ";
}

$stmt->close();
$conn->close();
?>
