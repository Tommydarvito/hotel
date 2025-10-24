<?php 
session_start();
include '../action/db.php';
?>


<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../jstyle/style.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../jstyle/konfig.js"></script>
    <title>Kamar - Grand Horizon Hotel</title>
</head>

<body class="font-poppins text-dark-gray bg-white overflow-x-hidden">

    <?php include '../komponen/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="relative h-80 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('../img/room.jpg')"></div>
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="container mx-auto px-4 text-center relative z-10" data-aos="zoom-in" data-aos-duration="1000">
            <h2 class="text-4xl md:text-5xl font-playfair font-bold mb-6 text-white">Kamar & Suites</h2>
        </div>
    </section>

    <!-- Section kamar -->
    <section id="kamar" class="py-16 bg-light-gray">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-playfair font-bold text-gray-800 mb-4">
                    Pilihan Kamar Kami
                </h2>
                <div class="w-24 h-1 bg-gold-primary mx-auto mb-6"></div>
                <p class="text-lg text-dark-gray max-w-2xl mx-auto" data-aos="fade-up">
                    Temukan akomodasi sempurna untuk kenyamanan dan kemewahan selama menginap di Grand Horizon Hotel
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-10 max-w-6xl mx-auto">
                <?php
                include '../action/db.php';

                $sql = "SELECT * FROM kamar ORDER BY id_kamar ASC";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    $delay = 100;
                    while ($row = $result->fetch_assoc()) {
                        $harga_asli = $row['harga_per_malam'];
                        $diskon = $row['diskon'];
                        $rating = $row['rating'] ?: "4.8";
                        $harga_final = $diskon > 0 ? $harga_asli - ($harga_asli * $diskon / 100) : $harga_asli;
                        $hemat = $diskon > 0 ? "Hemat {$diskon}%" : "";
                        $gambar = !empty($row['gambar']) ? $row['gambar'] : 'default.jpg';

                        echo '
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 group" data-aos="fade-up" data-aos-delay="' . $delay . '">
                        <div class="relative overflow-hidden">
                            <img src="../img/' . $gambar . '" alt="' . $row['nama_kamar'] . '" class="w-full h-64 object-cover group-hover:scale-105 transition duration-700">
                            <div class="absolute top-4 right-4 bg-gold-primary text-white px-3 py-1 rounded-full text-sm font-semibold">
                                <span class="flex items-center"><i class="fas fa-star mr-1 text-xs"></i>' . $rating . '</span>
                            </div>
                            <div class="absolute bottom-4 left-4 flex space-x-2">
                                <span class="bg-white/90 text-gray-dark px-3 py-1 rounded-full text-sm font-medium">' . $row['luas'] . '</span>
                                <span class="bg-white/90 text-gray-dark px-3 py-1 rounded-full text-sm font-medium flex items-center">
                                    <i class="fas fa-user mr-1"></i> ' . $row['kapasitas'] . '
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-3xl font-playfair font-bold text-navy-accent mb-2">' . $row['nama_kamar'] . '</h3>
                            <p class="text-gray-dark mb-4 text-justify">' . $row['deskripsi'] . '</p>

                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <p class="text-gold-primary font-bold text-xl">Rp' . number_format($harga_final, 0, ",", ".") . '</p>
                                    <p class="text-gray-dark text-sm">/ malam</p>
                                </div>';

                        if ($diskon > 0) {
                            echo '
                                <div class="text-right">
                                    <p class="text-gray-500 text-sm line-through">Rp' . number_format($harga_asli, 0, ",", ".") . '</p>
                                    <p class="text-green-600 font-medium text-sm">' . $hemat . '</p>
                                </div>';
                        }

                        echo '
                            </div>
                            <a href="pesan.php?id=' . $row['id_kamar'] . '" class="block bg-gold-primary text-white px-4 py-3 rounded-lg hover:bg-gold-primary transition duration-300 text-center font-medium">
                                <i class="fas fa-calendar-check mr-2"></i> Pesan
                            </a>
                        </div>
                    </div>';

                        $delay += 100;
                    }
                } else {
                    echo '<p class="text-center text-gray-500 w-full">Belum ada data kamar yang tersedia.</p>';
                }

                $conn->close();
                ?>
            </div>
        </div>
    </section>


    <?php include '../komponen/footer.php'; ?>
    <?php include '../komponen/modal.php'; ?>

    <script src="../jstyle/lores.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: false,
            offset: 100
        });
    </script>
</body>

</html>