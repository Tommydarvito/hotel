<?php
session_start();
require_once '../action/db.php';

if (!isset($_SESSION['id_user'])) {
    echo "<script>alert('Silahkan login terlebih dahulu.'); window.location.href='../layout/kamar.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_SESSION['id_user'];
    $id_kamar = intval($_POST['id_kamar']);
    $jumlah_kamar = intval($_POST['jumlah_kamar']);
    $jumlah_tamu = intval($_POST['jumlah_tamu']);
    $durasi_malam = intval($_POST['durasi_malam']);
    $tanggal_checkin = $_POST['tanggal_checkin'];
    $tanggal_checkout = $_POST['tanggal_checkout'];
    $harga_per_malam = intval($_POST['harga_per_malam']);

    if (strtotime($tanggal_checkout) <= strtotime($tanggal_checkin)) {
        echo "<script>alert('Tanggal checkout harus lebih besar dari checkin'); window.history.back();</script>";
        exit();
    }

    $total_harga = $harga_per_malam * $jumlah_kamar * $durasi_malam;

    $stmt = $conn->prepare("INSERT INTO pemesanan 
        (id_user, id_kamar, jumlah_kamar, jumlah_tamu, durasi_malam, tanggal_checkin, tanggal_checkout, total_harga) 
        VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("iiiisssi", $id_user, $id_kamar, $jumlah_kamar, $jumlah_tamu, $durasi_malam, $tanggal_checkin, $tanggal_checkout, $total_harga);
    if ($stmt->execute()) {
        $id_pemesanan = $stmt->insert_id;
        echo "<script>alert('Pemesanan berhasil!'); window.location.href='../layout/pembayaran.php?id_pemesanan=$id_pemesanan';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan.'); window.history.back();</script>";
    }
}
