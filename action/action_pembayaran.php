<?php
session_start();
require_once '../action/db.php';

if (!isset($_SESSION['id_user'])) {
    echo "<script>alert('Silahkan login terlebih dahulu'); window.location.href='../layout/kamar.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $required = ['id_pemesanan', 'total_harga', 'metode_pembayaran'];
    foreach ($required as $f) {
        if (!isset($_POST[$f]) || empty($_POST[$f])) {
            die("<script>alert('Field $f harus diisi'); window.history.back();</script>");
        }
    }

    $id_pemesanan = intval($_POST['id_pemesanan']);
    $total_harga = intval($_POST['total_harga']);
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $id_user = $_SESSION['id_user'];

    $stmt = $conn->prepare("SELECT id_pemesanan,status_pemesanan FROM pemesanan WHERE id_pemesanan=? AND id_user=?");
    $stmt->bind_param("ii", $id_pemesanan, $id_user);
    $stmt->execute();
    $res = $stmt->get_result()->fetch_assoc();
    if (!$res) die("<script>alert('Pemesanan tidak ditemukan'); window.history.back();</script>");

    // Semua pembayaran diset jadi pending
    $status_pembayaran = 'menunggu';
    $status_pemesanan = 'pending';

    $bukti = null;
    if ($metode_pembayaran == 'transfer' && isset($_FILES['bukti_pembayaran']) && $_FILES['bukti_pembayaran']['error'] == 0) {
        $ext = pathinfo($_FILES['bukti_pembayaran']['name'], PATHINFO_EXTENSION);
        $bukti = 'bukti_' . $id_pemesanan . '_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], '../uploads/' . $bukti);
    }

    $conn->begin_transaction();
    try {
        $stmt2 = $conn->prepare("INSERT INTO pembayaran (id_pemesanan, metode_pembayaran, total_bayar, status_pembayaran, bukti_pembayaran) VALUES (?,?,?,?,?)");
        $stmt2->bind_param("isiss", $id_pemesanan, $metode_pembayaran, $total_harga, $status_pembayaran, $bukti);
        $stmt2->execute();

        $stmt3 = $conn->prepare("UPDATE pemesanan SET status_pemesanan=? WHERE id_pemesanan=?");
        $stmt3->bind_param("si", $status_pemesanan, $id_pemesanan);
        $stmt3->execute();

        $conn->commit();

        echo "<script>alert('Pembayaran berhasil dikirim dan menunggu verifikasi admin.'); window.location.href='../layout/konfirmasi.php?id=$id_pemesanan';</script>";
    } catch (Exception $e) {
        $conn->rollback();
        die("<script>alert('Terjadi kesalahan saat menyimpan pembayaran.'); window.history.back();</script>");
    }
} else {
    die("<script>alert('Akses tidak valid'); window.history.back();</script>");
}
