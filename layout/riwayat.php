<?php
session_start();
require_once '../action/db.php';
if (!isset($_SESSION['id_user'])) header('Location: ../layout/kamar.php');
$id_user = $_SESSION['id_user'];

$stmt = $conn->prepare("SELECT p.*, k.nama_kamar, k.harga_per_malam, 
k.diskon, pm.metode_pembayaran, pm.status_pembayaran 
FROM pemesanan p JOIN kamar k ON p.id_kamar = k.id_kamar LEFT JOIN pembayaran pm ON p.id_pemesanan = pm.id_pemesanan
WHERE p.id_user = ? ORDER BY p.id_pemesanan DESC");
$stmt->bind_param("i", $id_user);
$stmt->execute();
$riwayat = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan - Grand Horizon Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../jstyle/style.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../jstyle/konfig.js"></script>
</head>

<body class="bg-gray-50 font-poppins min-h-screen flex flex-col">

    <header class="bg-white sticky top-0 z-50 shadow-sm transition-all duration-300">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center mb-1">
                    <h1 class="text-2xl font-playfair font-bold text-gold-primary">Grand</h1>
                    <h1 class="text-2xl font-playfair font-bold text-navy-accent ml-1">Horizon</h1>
                </div>

                <div class="hidden md:flex space-x-8 ml-[60px] mt-1">
                    <a href="beranda.php" class="text-navy-accent hover:text-gold-primary transition duration-300 font-medium border-b-2 border-transparent hover:border-gold-primary pb-1">Beranda</a>
                    <a href="kamar.php" class="text-navy-accent hover:text-gold-primary transition duration-300 font-medium border-b-2 border-transparent hover:border-gold-primary pb-1">Kamar & Suite</a>
                    <a href="fasilitas.php" class="text-navy-accent hover:text-gold-primary transition duration-300 font-medium border-b-2 border-transparent hover:border-gold-primary pb-1">Fasilitas</a>
                    <a href="tentang.php" class="text-navy-accent hover:text-gold-primary transition duration-300 font-medium border-b-2 border-transparent hover:border-gold-primary pb-1">Tentang Kami</a>
                    <a href="kontak.php" class="text-navy-accent hover:text-gold-primary transition duration-300 font-medium border-b-2 border-transparent hover:border-gold-primary pb-1">Kontak</a>
                </div>

                <div class="flex items-center mr-1 space-x-2">
                    <form action="../action/action_logout.php" method="POST">
                        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-md font-medium hover:shadow-lg transition duration-300 transform hover:scale-105">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow container mx-auto px-4 py-8 max-w-6xl mb-16">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Riwayat Pemesanan</h1>
            <p class="text-gray-600">Semua pesanan yang pernah Anda buat</p>
        </div>

        <?php if ($riwayat->num_rows > 0): ?>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full border-1">
                        <thead class="bg-gray-100 text-center">
                            <tr>
                                <th class="py-4 px-6 font-semibold text-gray-700">ID Pesanan</th>
                                <th class="py-4 px-6 font-semibold text-gray-700">Kamar</th>
                                <th class="py-4 px-6 font-semibold text-gray-700">Tanggal</th>
                                <th class="py-4 px-6 font-semibold text-gray-700">Harga per malam</th>
                                <th class="py-4 px-6 font-semibold text-gray-700">Durasi</th>
                                <th class="py-4 px-6 font-semibold text-gray-700">Harga</th>
                                <th class="py-4 px-6 font-semibold text-gray-700">Total</th>
                                <th class="py-4 px-6 font-semibold text-gray-700">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-center">
                            <?php while ($row = $riwayat->fetch_assoc()):
                                $status_class = '';
                                $status_icon = '';
                                switch (strtolower($row['status_pemesanan'])) {
                                    case 'confirmed':
                                    case 'selesai':
                                        $status_class = 'bg-green-100 text-green-800';
                                        $status_icon = 'fa-check-circle';
                                        break;
                                    case 'pending':
                                    case 'menunggu':
                                        $status_class = 'bg-yellow-100 text-yellow-800';
                                        $status_icon = 'fa-clock';
                                        break;
                                    case 'dibatalkan':
                                        $status_class = 'bg-red-100 text-red-800';
                                        $status_icon = 'fa-times-circle';
                                        break;
                                    default:
                                        $status_class = 'bg-gray-100 text-gray-800';
                                        $status_icon = 'fa-info-circle';
                                }
                            ?>
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 px-6">
                                        <div class="font-mono font-semibold text-blue-600">
                                            <?= ($row['id_pemesanan']) ?>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-medium text-gray-800"><?= htmlspecialchars($row['nama_kamar']) ?></div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="text-sm">
                                            <div class="font-medium"><?= date('d M Y', strtotime($row['tanggal_checkin'])) ?></div>
                                            <div class="text-gray-500">s/d <?= date('d M Y', strtotime($row['tanggal_checkout'])) ?></div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-medium">Rp<?= number_format($row['harga_per_malam'], 0, ",", ".") ?></div>
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-medium"><?= $row['jumlah_kamar'] ?> kamar</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-medium"><?= $row['durasi_malam'] ?> malam</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-semibold text-gold-primary">
                                            Rp<?= number_format($row['total_harga'], 0, ",", ".") ?>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium <?= $status_class ?>">
                                            <i class="fas <?= $status_icon ?> mr-2"></i>
                                            <?= ucfirst($row['status_pemesanan']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php else: ?>
            <div class="text-center py-12">
                <i class="fas fa-history text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum ada riwayat pemesanan</h3>
                <p class="text-gray-500 mb-6">Mulai pesan kamar untuk melihat riwayat di sini</p>
                <a href="../layout/kamar.php?#kamar" class="inline-flex items-center bg-gold-primary text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition-colors duration-200 font-medium">
                    <i class="fas fa-plus mr-2"></i>
                    Pesan Kamar
                </a>
            </div>
        <?php endif; ?>
    </main>

    <?php include "../komponen/footer.php" ?>

    <script>
        AOS.init({
            duration: 800,
            once: false,
            offset: 100
        });  
    </script>
</body>

</html>