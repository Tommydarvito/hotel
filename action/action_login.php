<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'db.php';

// Cek metode request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Akses tidak valid (bukan POST request).");
}

// Cek input kosong
if (empty($_POST['email']) || empty($_POST['password'])) {
    die("Data email atau password kosong!");
}

$email = trim($_POST['email']);
$password = $_POST['password'];

// Prepare query untuk ambil user
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Query gagal: " . $conn->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows >= 1) {
    $row = $result->fetch_assoc();

    // Cek password
    if (password_verify($password, $row['password'])) {
        $_SESSION['id_user']   = $row['id_user'];
        $_SESSION['nama']      = $row['nama'];
        $_SESSION['email']     = $row['email'];
        $_SESSION['no_tlp']    = $row['no_tlp'];
        header("Location: ../layout/riwayat.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Password salah! Silakan coba lagi.";
        header("Location: ../layout/beranda.php");
        exit();
    }
} else {
    $_SESSION['login_error'] = "Email tidak ditemukan! Pastikan sudah daftar.";
    header("Location: ../layout/beranda.php");
    exit();
}

$stmt->close();
$conn->close();
