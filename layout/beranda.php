<?php
session_start();
include '../action/db.php';
?>


<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../jstyle/style.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../jstyle/konfig.js"></script>
    <title>Grand Horizon Hotel</title>
</head>

<body class="font-poppins text-dark-gray bg-white overflow-x-hidden">

    <!-- navbar -->
    <?php include '../komponen/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden bg-white">
        <div class="absolute inset-0"></div>
        <div
            class="absolute inset-0 bg-cover bg-center parallax z-0 bg-black/50"
            style="background-image: url('../img/hotel.jpg')">
        </div>

        <div class="absolute inset-0 bg-black/50 z-10"></div>

        <div class="container mx-auto px-4 text-center z-20" data-aos="slide-up" data-aos-duration="1000">
            <h2 class="text-5xl md:text-7xl font-playfair font-bold mb-6 text-white">
                Luxury Awaits
            </h2>
            <p class="text-xl md:text-2xl mb-10 max-w-2xl mx-auto text-white">
                Rasakan kenyamanan dan keanggunan yang tak tertandingi di Grand Horizon Hotel
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="kamar.php?#baris1"><button class="bg-gold-primary text-white px-8 py-4 rounded-md font-bold text-lg hover:shadow-lg transition duration-300 transform hover:scale-105">
                        Pesan Sekarang
                    </button></a>
                <a href="#kamar"><button class="bg-transparent gold-border text-gold-primary px-8 py-4 rounded-md font-bold text-lg hover:bg-gold-light transition duration-300">
                        Lihat Kamar
                    </button></a>
            </div>
        </div>

        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
            <a href="#kamar" class="text-gold-primary text-2xl">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </section>

    <!-- section kamar -->
    <section id="kamar" class="py-20 bg-light-gray relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
                <h2 class="text-4xl font-playfair font-bold mb-4 text-navy-accent">Pilihan Kamar</h2>
                <div class="w-24 h-1 bg-gold-primary mx-auto mb-6"></div>
                <p class="text-xl max-w-2xl mx-auto text-dark-gray">Temukan kenyamanan sesuai pilihan Anda.</p>
            </div>

            <div class="relative" data-aos="fade-left" data-aos-duration="800">
                <div id="carousel" class="flex transition-transform duration-700 ease-in-out">

                    <?php
                    include '../action/db.php';
                    $query = "SELECT * FROM kamar ORDER BY id_kamar ASC";
                    $result = $conn->query($query);

                    if ($result && $result->num_rows > 0) {
                        $counter = 0;
                        $total = $result->num_rows;

                        echo '<div class="min-w-full grid grid-cols-1 md:grid-cols-3 gap-8 px-4">';

                        while ($row = $result->fetch_assoc()) {
                            $counter++;
                            $harga_asli = $row['harga_per_malam'];
                            $diskon = $row['diskon'];
                            $harga_final = $diskon > 0 ? $harga_asli - ($harga_asli * $diskon / 100) : $harga_asli;

                            echo '
                        <div class="relative rounded-xl overflow-hidden shadow-lg group">
                            <div class="h-80 bg-cover bg-center" style="background-image: url(\'../img/' . $row['gambar'] . '\')"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            <div class="absolute text-[22px] top-3 right-5 text-white p-2 cursor-pointer">
                                <a href="kamar.php?id=' . $row['id_kamar'] . '">
                                    <i class="fas fa-arrow-right transition-all duration-500 ease-in-out hover:text-gold-primary hover:translate-x-1.5"></i>
                                </a>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                <h3 class="text-2xl font-playfair font-bold mb-2">' . $row['nama_kamar'] . '</h3>';

                            if ($diskon > 0) {
                                echo '<p class="text-sm text-red-400 line-through mb-1">Rp ' . number_format($harga_asli, 0, ",", ".") . '</p>';
                            }

                            echo '
                                <p class="text-gold-primary mb-3">Mulai dari Rp ' . number_format($harga_final, 0, ",", ".") . '/malam</p>
                                <div class="flex items-center space-x-4 text-sm">
                                    <span class="flex items-center">
                                        <i class="fas fa-user mr-1"></i> ' . $row['kapasitas'] . ' Tamu
                                    </span>
                                    <span class="flex items-center">
                                        <i class="fas fa-bed mr-1"></i> ' . $row['jumlah_bed'] . '
                                    </span>
                                </div>
                            </div>
                        </div>
                        ';

                            // tiap 3 kamar, tutup slide dan buka slide baru
                            if ($counter % 3 == 0 && $counter < $total) {
                                echo '</div><div class="min-w-full grid grid-cols-1 md:grid-cols-3 gap-8 px-4">';
                            }
                        }

                        echo '</div>';
                    } else {
                        echo '<p class="text-center text-gray-500 w-full">Belum ada data kamar.</p>';
                    }

                    $conn->close();
                    ?>
                </div>

                <!-- tombol navigasi -->
                <button id="prevBtn" class="absolute left-0 top-1/2 -translate-y-1/2 bg-black/40 text-white px-3 py-2 rounded-r-lg hover:bg-black/70 transition">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button id="nextBtn" class="absolute right-0 top-1/2 -translate-y-1/2 bg-black/40 text-white px-3 py-2 rounded-l-lg hover:bg-black/70 transition">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- fasilitas -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-10">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 mb-10 lg:mb-0 lg:pr-10" data-aos="fade-right" data-aos-duration="800">
                    <h2 class="text-4xl font-playfair font-bold mb-6 text-navy-accent">Pengalaman Mewah Tak Terlupakan</h2>
                    <div class="w-24 h-1 bg-gold-primary mb-6"></div>
                    <p class="text-lg mb-6 text-dark-gray">Grand Horizon Hotel menghadirkan akomodasi bintang 5 dengan sentuhan elegan dan pelayanan terbaik. Setiap detail dirancang untuk memberikan kenyamanan maksimal bagi tamu kami.</p>
                    <p class="text-lg mb-8 text-dark-gray">Dari kamar yang luas dengan pemandangan menakjubkan hingga fasilitas wellness terkini, kami memastikan setiap momen Anda bersama kami menjadi kenangan indah.</p>
                    <a href="fasilitas.php"><button class="bg-gold-primary text-white px-8 py-3 rounded-md font-bold text-lg hover:shadow-lg transition duration-300 transform hover:scale-105">
                            Jelajahi Fasilitas
                        </button></a>
                </div>
                <div class="lg:w-1/2" data-aos="fade-left" data-aos-duration="800">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="rounded-lg overflow-hidden shadow-md h-64 bg-cover bg-center" style="background-image: url('../img/suitee.jpg')"></div>
                        <div class="rounded-lg overflow-hidden shadow-md h-64 bg-cover bg-center mt-8" style="background-image: url('../img/loby.jpg')"></div>
                        <div class="rounded-lg overflow-hidden shadow-md h-64 bg-cover bg-center" style="background-image: url('../img/pool.jpg')"></div>
                        <div class="rounded-lg overflow-hidden shadow-md h-64 bg-cover bg-center mt-8" style="background-image: url('../img/ballroom.jpg')"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Testimoni -->
    <section class="py-20 bg-light-gray">
        <div class="container mx-auto px-10">
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
                <h2 class="text-4xl font-playfair font-bold mb-4 text-navy-accent">Apa Kata Tamu Kami</h2>
                <div class="w-24 h-1 bg-gold-primary mx-auto mb-6"></div>
                <p class="text-xl max-w-2xl mx-auto text-dark-gray">Pengalaman menginap yang tak terlupakan dari tamu-tamu kami</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg p-8 shadow-md hover-lift" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="100">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full bg-cover bg-center mr-4 border-2 border-gold-primary" style="background-image: url('../img/ambaa.jpg')"></div>
                        <div>
                            <h4 class="font-playfair font-bold text-lg text-navy-accent">Admin Sule</h4>
                            <p class="text-gold-primary text-md">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>

                        </div>
                    </div>
                    <p class="text-dark-gray italic">"Mengadakan pernikahan di ballroom Grand Horizon adalah keputusan terbaik. Staf sangat profesional dan semua tamu terkesan dengan kemewahan tempatnya."</p>
                </div>

                <div class="bg-white rounded-lg p-8 shadow-md hover-lift" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full bg-cover bg-center mr-4 border-2 border-gold-primary" style="background-image: url('../img/mas.png')"></div>
                        <div>
                            <h4 class="font-playfair font-bold text-lg text-navy-accent">Orang ngawi</h4>
                            <p class="text-gold-primary text-md">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>

                        </div>
                    </div>
                    <p class="text-dark-gray italic">"Saya sering menginap di hotel bintang 5, tapi Grand Horizon benar-benar istimewa. Spa-nya luar biasa dan makanan di restoran sangat lezat. Pasti akan kembali!"</p>
                </div>

                <div class="bg-white rounded-lg p-8 shadow-md hover-lift" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full bg-cover bg-center mr-4 border-2 border-gold-primary" style="background-image: url('../img/her.jpg')"></div>
                        <div>
                            <h4 class="font-playfair font-bold text-lg text-navy-accent">Panji JMk</h4>
                            <p class="text-gold-primary text-md">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>

                        </div>
                    </div>
                    <p class="text-dark-gray italic">"Pengalaman menginap yang luar biasa! Pelayanan sangat memuaskan, kamar bersih dan nyaman. Kolam renang infinity dengan pemandangan kota sungguh menakjubkan."</p>
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- cta -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-4xl md:text-5xl font-playfair font-bold mb-6 text-navy-accent">Siap Mengalami Kemewahan?</h2>
            <div class="w-24 h-1 bg-gold-primary mx-auto mb-6"></div>
            <p class="text-xl mb-10 max-w-2xl mx-auto text-dark-gray">Pesan kamar Anda sekarang dan nikmati pengalaman menginap yang tak terlupakan</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="kamar.php"><button class="bg-gold-primary text-white px-8 py-4 rounded-md font-bold text-lg hover:shadow-lg transition duration-300 transform hover:scale-105">
                        Lihat Kamar
                    </button></a>
                <a href="kontak.php"><button class="bg-transparent gold-border text-gold-primary px-8 py-4 rounded-md font-bold text-lg hover:bg-gold-light transition duration-300">
                        Hubungi Kami
                    </button></a>
            </div>
        </div>
    </section>


    <?php include '../komponen/footer.php'; ?>
    <?php include '../komponen/modal.php'; ?>


    <script src="../jstyle/lores.js"></script>
    <script src="../jstyle/carrosel.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: false,
            offset: 100
        });

        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('shadow-lg');
            } else {
                header.classList.remove('shadow-lg');
            }
        });
    </script>
</body>

</html>