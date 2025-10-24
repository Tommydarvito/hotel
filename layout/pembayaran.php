<?php
session_start();
require_once '../action/db.php';
if (!isset($_SESSION['id_user'])) header('Location: ../layout/kamar.php');

$id_pemesanan = intval($_GET['id_pemesanan']);
$id_user = $_SESSION['id_user'];

$stmt = $conn->prepare("SELECT p.*, k.nama_kamar, k.harga_per_malam, k.diskon 
                        FROM pemesanan p 
                        JOIN kamar k ON p.id_kamar=k.id_kamar 
                        WHERE p.id_pemesanan=? AND p.id_user=?");
$stmt->bind_param("ii", $id_pemesanan, $id_user);
$stmt->execute();
$pemesanan = $stmt->get_result()->fetch_assoc();
if (!$pemesanan) die("Pemesanan tidak ditemukan.");

$harga_diskon = $pemesanan['diskon'] > 0 ? $pemesanan['harga_per_malam'] - ($pemesanan['harga_per_malam'] * $pemesanan['diskon'] / 100) : $pemesanan['harga_per_malam'];
$total_harga = $harga_diskon * $pemesanan['jumlah_kamar'] * $pemesanan['durasi_malam'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Grand Horizon Hotel</title>
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
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Pembayaran</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Ringkasan Pesanan -->
            <div class="lg:col-span-1 bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-semibold mb-4 border-b pb-2">Ringkasan Pemesanan</h3>
                <div class="space-y-3">
                    <div class="flex justify-between"><span>Kamar</span><span class="font-medium"><?= htmlspecialchars($pemesanan['nama_kamar']) ?></span></div>
                    <div class="flex justify-between"><span>Jumlah Kamar</span><span class="font-medium"><?= $pemesanan['jumlah_kamar'] ?></span></div>
                    <div class="flex justify-between"><span>Durasi</span><span class="font-medium"><?= $pemesanan['durasi_malam'] ?> malam</span></div>
                    <?php if ($pemesanan['diskon'] > 0): ?>
                        <div class="flex justify-between text-green-600"><span>Diskon</span><span class="font-medium"><?= $pemesanan['diskon'] ?>%</span></div>
                    <?php endif; ?>
                    <div class="border-t pt-4 mt-4 flex justify-between text-lg font-bold">
                        <span>Total Pembayaran</span>
                        <span class="text-gold-primary">Rp <?= number_format($total_harga, 0, ",", ".") ?></span>
                    </div>
                </div>
            </div>

            <!-- Metode Pembayaran -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-semibold mb-6 border-b pb-2">Pilih Metode Pembayaran</h3>

                <form action="../action/action_pembayaran.php" method="POST" enctype="multipart/form-data" id="paymentForm">
                    <input type="hidden" name="id_pemesanan" value="<?= $id_pemesanan ?>">
                    <input type="hidden" name="total_harga" value="<?= $total_harga ?>">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <label class="payment-option flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer transition-colors">
                            <input type="radio" name="metode_pembayaran" value="cash" class="hidden">
                            <div class="flex items-center justify-center w-6 h-6 border-2 border-gray-300 rounded-full mr-4">
                                <div class="w-3 h-3 bg-gold-primary rounded-full hidden radio-dot"></div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-money-bill-wave text-green-500 text-2xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold">Bayar di Hotel</h4>
                                    <p class="text-sm text-gray-600">Bayar cash saat check-in</p>
                                </div>
                            </div>
                        </label>

                        <label class="payment-option flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer transition-colors">
                            <input type="radio" name="metode_pembayaran" value="transfer" class="hidden">
                            <div class="flex items-center justify-center w-6 h-6 border-2 border-gray-300 rounded-full mr-4">
                                <div class="w-3 h-3 bg-gold-primary rounded-full hidden radio-dot"></div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-university text-blue-500 text-2xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold">Transfer Bank</h4>
                                    <p class="text-sm text-gray-600">Transfer melalui bank</p>
                                </div>
                            </div>
                        </label>
                    </div>

                    <!-- Upload Bukti -->
                    <div id="uploadBuktiContainer" class="hidden transition-all duration-300 mb-6">
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                            <h4 class="font-semibold text-gray-800 mb-4">Upload Bukti Transfer</h4>
                            <div class="space-y-4">
                                <label class="block border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-gold-primary transition-colors relative">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-3"></i>
                                    <p class="text-gray-600 mb-2">Klik untuk upload bukti transfer</p>

                                    <input type="file" name="bukti_pembayaran" id="fileInput" accept=".jpg,.jpeg,.png,.pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                </label>
                                <div id="fileName" class="text-sm text-gray-600 text-center"></div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gold-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-yellow-600 transition-colors mt-4">
                        Lanjutkan Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </main>

    <?php include "../komponen/footer.php" ?>

    <script>
        AOS.init({
            duration: 800,
            once: false,
            offset: 100
        });

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('paymentForm');
            const paymentOptions = document.querySelectorAll('.payment-option');
            const uploadContainer = document.getElementById('uploadBuktiContainer');
            const fileInput = document.getElementById('fileInput');
            const fileName = document.getElementById('fileName');

            function selectPaymentMethod(selectedOption) {
                paymentOptions.forEach(option => {
                    option.classList.remove('border-gold-primary', 'bg-gold-primary/10');
                    option.querySelector('.radio-dot').classList.add('hidden');
                });

                selectedOption.classList.add('border-gold-primary', 'bg-gold-primary/10');
                selectedOption.querySelector('.radio-dot').classList.remove('hidden');

                const radio = selectedOption.querySelector('input[type="radio"]');
                radio.checked = true;

                if (radio.value === 'transfer') {
                    uploadContainer.classList.remove('hidden');
                } else {
                    uploadContainer.classList.add('hidden');
                    fileInput.value = '';
                    fileName.textContent = '';
                }
            }

            paymentOptions.forEach(option => {
                option.addEventListener('click', function() {
                    selectPaymentMethod(this);
                });
            });

            fileInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    fileName.textContent = 'File terpilih: ' + this.files[0].name;
                    fileName.classList.add('text-green-600');
                } else {
                    fileName.textContent = '';
                    fileName.classList.remove('text-green-600');
                }
            });

            form.addEventListener('submit', function(e) {
                const selectedRadio = document.querySelector('input[name="metode_pembayaran"]:checked');

                if (!selectedRadio) {
                    e.preventDefault();
                    alert('Silakan pilih metode pembayaran');
                    return false;
                }

                if (selectedRadio.value === 'transfer') {
                    if (!fileInput.files || fileInput.files.length === 0) {
                        e.preventDefault();
                        alert('Silakan upload bukti transfer');
                        return false;
                    }
                }

                return true;
            });
        });
    </script>

</body>

</html>