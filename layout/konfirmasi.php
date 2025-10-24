<?php
session_start();
require_once '../action/db.php';
if (!isset($_SESSION['id_user'])) header('Location: ../layout/kamar.php');

if (!isset($_GET['id'])) die("Pemesanan tidak ditemukan.");
$id_pemesanan = intval($_GET['id']);
$id_user = $_SESSION['id_user'];

$stmt = $conn->prepare("
    SELECT p.*, k.nama_kamar, k.harga_per_malam, k.diskon, pm.metode_pembayaran, pm.status_pembayaran
    FROM pemesanan p
    JOIN kamar k ON p.id_kamar=k.id_kamar
    LEFT JOIN pembayaran pm ON p.id_pemesanan=pm.id_pemesanan
    WHERE p.id_pemesanan=? AND p.id_user=?
");
$stmt->bind_param("ii", $id_pemesanan, $id_user);
$stmt->execute();
$pembayaran = $stmt->get_result()->fetch_assoc();
if (!$pembayaran) die("Pemesanan tidak ditemukan.");

$harga_diskon = $pembayaran['diskon'] > 0 ?
    $pembayaran['harga_per_malam'] - ($pembayaran['harga_per_malam'] * $pembayaran['diskon'] / 100)
    : $pembayaran['harga_per_malam'];
$total_harga = $harga_diskon * $pembayaran['jumlah_kamar'] * $pembayaran['durasi_malam'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran - Grand Horizon Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../jstyle/style.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../jstyle/konfig.js"></script>
</head>

<body class="bg-gray-50 font-poppins min-h-screen flex flex-col">

    <?php include "../komponen/navbar.php" ?>

    <main class="flex-grow container mx-auto px-4 py-8 max-w-4xl mb-16">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Informasi Pembayaran</h1>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-semibold mb-4 border-b pb-2">Ringkasan Pemesanan</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600">Kamar</span>
                        <span class="font-medium"><?= htmlspecialchars($pembayaran['nama_kamar']) ?></span>
                    </div>

                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600">Jumlah Kamar</span>
                        <span class="font-medium"><?= $pembayaran['jumlah_kamar'] ?></span>
                    </div>

                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600">Jumlah Tamu</span>
                        <span class="font-medium"><?= $pembayaran['jumlah_tamu'] ?></span>
                    </div>

                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600">Durasi Menginap</span>
                        <span class="font-medium"><?= $pembayaran['durasi_malam'] ?> Malam</span>
                    </div>

                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600">Harga per Malam</span>
                        <span class="font-medium">Rp <?= number_format($pembayaran['harga_per_malam'], 0, ",", ".") ?></span>
                    </div>

                    <?php if ($pembayaran['diskon'] > 0): ?>
                        <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                            <span class="text-green-600">Diskon</span>
                            <span class="font-medium text-green-600"><?= $pembayaran['diskon'] ?>%</span>
                        </div>

                        <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                            <span class="text-blue-600">Harga Setelah Diskon per Malam</span>
                            <span class="font-medium text-blue-600">Rp <?= number_format($harga_diskon, 0, ",", ".") ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="border-t pt-4 mt-4">
                        <div class="flex justify-between text-lg font-bold p-3 bg-gold-primary/10 rounded-lg">
                            <span class="text-gray-800">Total Pembayaran</span>
                            <span class="text-gold-primary">Rp <?= number_format($total_harga, 0, ",", ".") ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Pembayaran -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-semibold mb-4 border-b pb-2">Status Pembayaran</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600">Metode Pembayaran</span>
                        <span class="font-medium"><?= $pembayaran['metode_pembayaran'] ? ucfirst($pembayaran['metode_pembayaran']) : '-' ?></span>
                    </div>

                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600">Status Pembayaran</span>
                        <span class="font-medium <?= $pembayaran['status_pembayaran'] == 'lunas' ? 'text-green-600' : 'text-yellow-600' ?>">
                            <?= $pembayaran['status_pembayaran'] ? ucfirst($pembayaran['status_pembayaran']) : '-' ?>
                        </span>
                    </div>

                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600">Status Pemesanan</span>
                        <span class="font-medium <?= $pembayaran['status_pemesanan'] == 'confirmed' ? 'text-green-600' : 'text-yellow-600' ?>">
                            <?= $pembayaran['status_pemesanan'] ? ucfirst($pembayaran['status_pemesanan']) : '-' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 mt-8 pt-6 border-t border-gray-200">
            <a href="../layout/riwayat.php" class="flex-1 bg-blue-600 text-white px-6 py-3 rounded-lg text-center hover:bg-blue-700 transition-colors duration-200 font-medium">
                <i class="fas fa-history mr-2"></i>Lihat Pesanan
            </a>

            <a href="../layout/kamar.php" class="flex-1 bg-green-600 text-white px-6 py-3 rounded-lg text-center hover:bg-green-700 transition-colors duration-200 font-medium">
                <i class="fas fa-plus mr-2"></i>Pesan Lagi
            </a>
        </div>
    </main>

    <?php include "../komponen/footer.php" ?>

    <script>
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                once: false,
                offset: 100
            });
        }
    </script>

</body>

</html>