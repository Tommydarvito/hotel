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
    <script src="../jstyle/konfig.js"></script>
    <title>Kontak - Grand Horizon Hotel</title>
</head>

<body class="font-poppins text-dark-gray bg-white overflow-x-hidden">

    <?php include '../komponen/navbar.php'; ?>

    <!-- Informasi Kontak -->
    <section class="py-20 bg-light-gray">
        <div class="container mx-auto px-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-playfair font-bold mb-4 text-navy-accent">Informasi Kontak</h2>
                <div class="w-24 h-1 bg-gold-primary mx-auto mb-6"></div>
                <p class="text-lg max-w-2xl mx-auto">Hubungi kami melalui berbagai cara yang tersedia</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Alamat -->
                <div class="bg-white p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-gold-primary rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-navy-accent">Alamat</h3>
                    <p class="text-dark-gray">Jl. Horison No. 123<br>Depok<br>Indonesia 10110</p>
                </div>

                <!-- Telepon -->
                <div class="bg-white p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-gold-primary rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-navy-accent">Telepon</h3>
                    <p class="text-dark-gray">+62 21 1234 5678<br>+62 21 8765 4321</p>
                    <a href="#" class="inline-block mt-3 text-gold-primary hover:text-yellow-600 font-semibold">
                        <i class="fas fa-phone mr-2"></i>Hubungi Sekarang
                    </a>
                </div>

                <!-- Email -->
                <div class="bg-white p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-gold-primary rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-navy-accent">Email</h3>
                    <p class="text-dark-gray">info@grandhorizon.com<br>pesan@grandhorizon.com</p>
                    <a href="#" class="inline-block mt-3 text-gold-primary hover:text-yellow-600 font-semibold">
                        <i class="fas fa-envelope mr-2"></i>Kirim Email
                    </a>
                </div>

                <!-- Jam Operasional -->
                <div class="bg-white p-8 rounded-lg shadow-md text-center hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 bg-gold-primary rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-navy-accent">Jam Operasional</h3>
                    <p class="text-dark-gray">Setiap Hari<br>24 Jam Non-Stop<br>Resepsionis & Layanan Tamu</p>
                </div>
            </div>
        </div>
    </section>


    <!-- lokasi -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-10">
            <div data-aos="fade-left" class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-playfair font-bold mb-4 text-navy-accent">Lokasi Kami</h2>
                <div class="w-24 h-1 bg-gold-primary mx-auto mb-6"></div>
                <p class="text-lg max-w-2xl mx-auto">Kunjungi hotel kami di lokasi strategis di jantung kota Jakarta.</p>
            </div>

            <!-- Grid 2 Kolom -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                <!-- Kolom Peta -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-right">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.81956135063955!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e83956a7cc22!2sMonumen%20Nasional%20(MONAS)!5e0!3m2!1sid!2sid!4v1632977664812!5m2!1sid!2sid"
                        width="100%"
                        height="400"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        class="w-full h-96 lg:h-[500px]">
                    </iframe>
                </div>

                <!-- Kolom Informasi Tambahan -->
                <div class="space-y-8 mt-[85px] ml-4" data-aos="fade-left">
                    <div class="flex items-start space-x-6">
                        <i class="fas fa-subway text-gold-primary text-3xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-navy-accent text-xl mt-[6px]">Akses Transportasi</h4>
                            <p class="text-dark-gray text-base leading-relaxed">
                                5 menit dari stasiun MRT, 10 menit dari halte TransJakarta
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-6">
                        <i class="fas fa-car text-gold-primary text-3xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-navy-accent text-xl mt-[6px]">Parkir</h4>
                            <p class="text-dark-gray text-base leading-relaxed">
                                Area parkir luas dan aman untuk tamu hotel
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-6">
                        <i class="fas fa-landmark text-gold-primary text-3xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-navy-accent text-xl mt-[6px]">Lokasi Strategis</h4>
                            <p class="text-dark-gray text-base leading-relaxed">
                                Dekat dengan pusat bisnis, perbelanjaan, dan wisata
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-6">
                        <i class="fas fa-map-marker-alt text-gold-primary text-3xl mt-1"></i>
                        <div>
                            <h4 class="font-semibold text-navy-accent text-xl mt-[6px]">Alamat</h4>
                            <p class="text-dark-gray text-base leading-relaxed">
                                Jl. Merdeka No.10, Gambir, Jakarta Pusat
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Sosial Media -->
    <section class="py-20 bg-light-gray">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-playfair font-bold mb-4 text-navy-accent">Terhubung Dengan Kami</h2>
                <div class="w-24 h-1 bg-gold-primary mx-auto mb-6"></div>
                <p class="text-lg max-w-2xl mx-auto">Ikuti kami di media sosial untuk informasi terbaru dan penawaran spesial</p>
            </div>

            <!-- Sosial Media -->
            <div class="flex justify-center space-x-6 mb-16" data-aos="zoom-in">
                <a href="#" class="w-14 h-14 bg-navy-accent rounded-full flex items-center justify-center text-white hover:bg-gold-primary transition duration-300 transform hover:scale-110">
                    <i class="fab fa-instagram text-xl"></i>
                </a>
                <a href="#" class="w-14 h-14 bg-navy-accent rounded-full flex items-center justify-center text-white hover:bg-gold-primary transition duration-300 transform hover:scale-110">
                    <i class="fab fa-facebook-f text-xl"></i>
                </a>
                <a href="#" class="w-14 h-14 bg-navy-accent rounded-full flex items-center justify-center text-white hover:bg-gold-primary transition duration-300 transform hover:scale-110">
                    <i class="fab fa-tiktok text-xl"></i>
                </a>
                <a href="#" class="w-14 h-14 bg-navy-accent rounded-full flex items-center justify-center text-white hover:bg-gold-primary transition duration-300 transform hover:scale-110">
                    <i class="fab fa-whatsapp text-xl"></i>
                </a>
                <a href="#" class="w-14 h-14 bg-navy-accent rounded-full flex items-center justify-center text-white hover:bg-gold-primary transition duration-300 transform hover:scale-110">
                    <i class="fab fa-youtube text-xl"></i>
                </a>
            </div>
        </div>
    </section>

    <?php include '../komponen/footer.php'; ?>
    <?php include '../komponen/modal.php'; ?>

    <script src="../jstyle/lores.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const nama = document.getElementById('nama').value;
                const email = document.getElementById('email').value;
                const subjek = document.getElementById('subjek').value;
                const pesan = document.getElementById('pesan').value;

                if (nama && email && subjek && pesan) {
                    const button = form.querySelector('button[type="submit"]');
                    const originalText = button.innerHTML;

                    button.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i>Mengirim...';
                    button.disabled = true;

                    setTimeout(() => {
                        alert('Pesan Anda telah berhasil dikirim! Kami akan membalas dalam waktu 24 jam.');
                        form.reset();
                        button.innerHTML = originalText;
                        button.disabled = false;
                    }, 2000);
                } else {
                    alert('Harap lengkapi semua field yang wajib diisi.');
                }
            });
        });
    </script>
</body>

</html>