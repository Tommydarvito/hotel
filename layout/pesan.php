<?php
session_start();
require_once '../action/db.php';

// Cek login
if (!isset($_SESSION['id_user'])) {
    echo "<script>
            alert('Silakan login terlebih dahulu untuk memesan kamar!');
            window.location.href = '../layout/kamar.php';
          </script>";
    exit();
}

// Ambil ID kamar
if (!isset($_GET['id'])) die("Kamar tidak ditemukan.");
$id_kamar = intval($_GET['id']);

// Ambil data kamar
$sql = "SELECT * FROM kamar WHERE id_kamar = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_kamar);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) die("Data kamar tidak ditemukan.");
$kamar = $result->fetch_assoc();

// Hitung harga diskon
$harga_asli = $kamar['harga_per_malam'];
$diskon = $kamar['diskon'];
$harga_diskon = $diskon > 0 ? $harga_asli - ($harga_asli * $diskon / 100) : $harga_asli;

// Data user
$nama_user = $_SESSION['nama'];
$email_user = $_SESSION['email'];
$telepon_user = $_SESSION['no_tlp'] ?? '-';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kamar - Grand Horizon Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../jstyle/style.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../jstyle/konfig.js"></script>
</head>

<body class="font-poppins bg-light-gray">

    <?php include "../komponen/navbar.php"; ?>

    <section class="py-16">
        <div class="container mx-auto max-w-4xl bg-white shadow-xl rounded-2xl p-8">

            <h2 class="text-3xl font-bold mb-4"><?= htmlspecialchars($kamar['nama_kamar']) ?></h2>
            <div class="flex flex-col md:flex-row gap-6">
                <div class="md:w-1/2">
                    <img src="../img/<?= htmlspecialchars($kamar['gambar']) ?>" alt="<?= htmlspecialchars($kamar['nama_kamar']) ?>" class="rounded-xl w-full h-64 object-cover mb-4">
                </div>
                <div class="md:w-1/2">
                    <p class="text-gray-600 text-justify mb-4"><?= htmlspecialchars($kamar['deskripsi']) ?></p>
                    <div class="flex justify-between items-center mb-4">
                        <p class="text-gold-primary font-semibold text-lg">Rp<?= number_format($harga_diskon, 0, ",", ".") ?> / malam</p>
                        <p class="text-gray-500 text-sm">Kapasitas: <?= $kamar['kapasitas'] ?> orang</p>
                    </div>
                    <div class="grid grid-cols-2 gap-2 text-sm text-gray-600">
                        <?php
                        $fasilitas = preg_split("/\r\n|\n|\r/", $kamar['fasilitas']);
                        foreach ($fasilitas as $item) {
                            echo '<div class="flex items-center"><i class="fas fa-check text-gold-primary mr-2"></i>' . trim(htmlspecialchars($item)) . '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <form action="../action/action_pesan.php" method="POST" class="space-y-6 mt-8" id="formBooking">
                <input type="hidden" name="id_kamar" value="<?= $id_kamar ?>">
                <input type="hidden" id="harga_per_malam" name="harga_per_malam" value="<?= $harga_diskon ?>">

                <h3 class="text-xl font-bold mb-4">Informasi Pemesanan</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" value="<?= htmlspecialchars($nama_user) ?>" readonly class="w-full px-4 py-3 rounded-lg bg-gray-100">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="<?= htmlspecialchars($email_user) ?>" readonly class="w-full px-4 py-3 rounded-lg bg-gray-100">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label>Nomor Telepon</label>
                        <input type="text" name="no_tlp" value="<?= htmlspecialchars($telepon_user) ?>" readonly class="w-full px-4 py-3 rounded-lg bg-gray-100">
                    </div>
                    <div>
                        <label>Durasi (malam)</label>
                        <input type="number" name="durasi_malam" id="durasi_malam" min="1" value="1" class="w-full px-4 py-3 rounded-lg bg-gray-100 cursor-not-allowed" readonly>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label>Jumlah Tamu</label>
                        <input type="number" name="jumlah_tamu" min="1" value="1" max="<?= $kamar['kapasitas'] ?>" class="w-full px-4 py-3 rounded-lg" required>
                    </div>
                    <div>
                        <label>Jumlah Kamar</label>
                        <input type="number" name="jumlah_kamar" id="jumlah_kamar" min="1" value="1" class="w-full px-4 py-3 rounded-lg" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label>Tanggal Check-in</label>
                        <input type="date" name="tanggal_checkin" class="w-full px-4 py-3 rounded-lg" required>
                    </div>
                    <div>
                        <label>Tanggal Check-out</label>
                        <input type="date" name="tanggal_checkout" class="w-full px-4 py-3 rounded-lg" required>
                    </div>
                </div>

                <!-- Rincian Perhitungan -->
                <div class="mt-8 border-t pt-6 text-gray-700">
                    <h3 class="text-xl font-semibold mb-4 text-center">Rincian Pemesanan</h3>

                    <div class="space-y-2 text-base">
                        <p><strong>Jenis Kamar:</strong> <?= htmlspecialchars($kamar['nama_kamar']) ?></p>
                        <p><strong>Harga per Malam:</strong> <span id="hargaPerMalamTeks">Rp<?= number_format($harga_diskon, 0, ",", ".") ?></span></p>
                        <p><strong>Jumlah Kamar:</strong> <span id="rincianJumlahKamar">1</span></p>
                        <p><strong>Durasi (malam):</strong> <span id="rincianDurasi">1</span></p>
                        <p><strong>Subtotal:</strong> <span id="rincianSubtotal" class="text-gold-primary font-semibold">Rp<?= number_format($harga_diskon, 0, ",", ".") ?></span></p>
                    </div>
                </div>

                <!-- Total Harga -->
                <div class="text-center mt-8 border-t pt-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Total Harga:</h3>
                    <p id="totalHarga" class="text-3xl font-bold text-gold-primary">Rp<?= number_format($harga_diskon, 0, ",", ".") ?></p>
                </div>


                <div class="text-center pt-6">
                    <button type="submit" class="bg-gold-primary text-white px-10 py-3 rounded-lg hover:bg-yellow-600 transition">Pesan Sekarang</button>
                </div>
            </form>
        </div>
    </section>

    <?php include "../komponen/footer.php" ?>

    <script>
          AOS.init({
            duration: 800,
            once: false,
            offset: 100
        });

        const hargaPerMalam = parseFloat(document.getElementById('harga_per_malam').value);
        const jumlahKamarInput = document.getElementById('jumlah_kamar');
        const durasiInput = document.getElementById('durasi_malam');
        const totalHargaEl = document.getElementById('totalHarga');
        const checkinInput = document.querySelector('input[name="tanggal_checkin"]');
        const checkoutInput = document.querySelector('input[name="tanggal_checkout"]');
        const jumlahTamuInput = document.querySelector('input[name="jumlah_tamu"]');
        const maxTamu = parseInt(jumlahTamuInput.getAttribute('max'));
        const formBooking = document.getElementById('formBooking');

        function formatRupiah(angka) {
            return 'Rp' + angka.toLocaleString('id-ID');
        }

        function updateTotal() {
            const jumlahKamar = parseInt(jumlahKamarInput.value) || 1;
            const durasi = parseInt(durasiInput.value) || 1;
            const subtotal = hargaPerMalam * jumlahKamar * durasi;

            totalHargaEl.textContent = formatRupiah(subtotal);

            document.getElementById('rincianJumlahKamar').textContent = jumlahKamar;
            document.getElementById('rincianDurasi').textContent = durasi;
            document.getElementById('rincianSubtotal').textContent = formatRupiah(subtotal);
        }


        function hitungDurasi() {
            const checkin = new Date(checkinInput.value);
            const checkout = new Date(checkoutInput.value);

            if (checkout > checkin) {
                const selisih = Math.ceil((checkout - checkin) / (1000 * 60 * 60 * 24));
                durasiInput.value = selisih;
            } else {
                durasiInput.value = 1;
            }

            updateTotal();
        }

        jumlahTamuInput.addEventListener('input', () => {
            let nilai = parseInt(jumlahTamuInput.value);
            if (nilai > maxTamu) {
                alert(`Jumlah tamu maksimal untuk kamar ini adalah ${maxTamu} orang.`);
                jumlahTamuInput.value = maxTamu;
            } else if (nilai < 1) {
                jumlahTamuInput.value = 1;
            }
        });

        jumlahKamarInput.addEventListener('input', updateTotal);
        checkinInput.addEventListener('change', hitungDurasi);
        checkoutInput.addEventListener('change', hitungDurasi);

        formBooking.addEventListener('submit', function(event) {
            const konfirmasi = confirm('Pesananan anda sudah sesuai?');
            if (!konfirmasi) {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>