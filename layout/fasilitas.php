<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="../jstyle/style.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../jstyle/konfig.js"></script>
    <title>Fasilitas - Grand Horizon Hotel</title>
</head>

<body class="font-poppins text-dark-gray bg-white overflow-x-hidden">

    <?php include "../komponen/navbar.php" ?>

    <!-- Hero Section -->
    <section id="facilities-hero" class="relative h-screen bg-gray-900">
        <div class="swiper facilities-hero-swiper h-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="../img/pool.jpg" alt="Kolam Renang Infinity" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                </div>
                <div class="swiper-slide">
                    <img src="../img/spa.jpg" alt="Spa & Wellness" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                </div>
                <div class="swiper-slide">
                    <img src="../img/restoo.jpg" alt="Restoran Mewah" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                </div>
                <div class="swiper-slide">
                    <img src="../img/loby.jpg" alt="Lobby Hotel" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                </div>
            </div>
        </div>

        <div class="absolute inset-0 flex items-center justify-center text-white text-center z-10 px-4">
            <div data-aos="fade-up" data-aos-duration="800">
                <h1 class="text-4xl md:text-6xl font-playfair font-bold mb-4">Nikmati Fasilitas Premium Kami</h1>
                <p class="text-lg md:text-2xl max-w-2xl mx-auto mb-8">Kami menghadirkan kenyamanan dan kemewahan dalam setiap detail.</p>
            </div>
        </div>

        <div class="absolute bottom-[140px] left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
            <a href="#fasilitas" class="text-gold-primary text-2xl">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </section>

    <!-- Highlight Section -->
    <section id="fasilitas" class="py-20 bg-white">
        <div class="container mx-auto px-9">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-playfair font-bold mb-4 text-navy-accent">Fasilitas Unggulan</h2>
                <div class="w-24 h-1 bg-gold-primary mx-auto mb-6"></div>
                <p class="text-lg text-dark-gray max-w-2xl mx-auto">Pengalaman tak terlupakan dengan fasilitas premium terbaik kami</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative overflow-hidden rounded-lg mb-4">
                        <img src="../img/pool.jpg" alt="Kolam Renang Infinity" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <h3 class="text-xl text-center font-playfair font-bold mb-2 text-navy-accent">Kolam Renang Infinity</h3>
                    <p class="text-dark-gray text-center">Nikmati panorama kota dari kolam renang rooftop kami.</p>
                </div>

                <div class="group cursor-pointer text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative overflow-hidden rounded-lg mb-4">
                        <img src="../img/spa.jpg" alt="Spa & Wellness" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <h3 class="text-xl font-playfair font-bold mb-2 text-navy-accent">Spa & Wellness Center</h3>
                    <p class="text-dark-gray">Relaksasi dengan pijat aromaterapi dari terapis profesional.</p>
                </div>

                <div class="group cursor-pointer text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative overflow-hidden rounded-lg mb-4">
                        <img src="../img/restoo.jpg" alt="Fine Dining" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <h3 class="text-xl font-playfair font-bold mb-2 text-navy-accent">Restoran Fine Dining</h3>
                    <p class="text-dark-gray">Hidangan internasional dengan cita rasa lokal terbaik.</p>
                </div>

                <div class="group cursor-pointer  text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="relative overflow-hidden rounded-lg mb-4">
                        <img src="../img/ballroom.jpg" alt="Fitness Center" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <h3 class="text-xl font-playfair font-bold mb-2 text-navy-accent">Ballroom</h3>
                    <p class="text-dark-gray">Tempat sempurna untuk acara pernikahan, konferensi, dan pertemuan penting.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Umum -->
    <section id="facilities-general" class="py-20 bg-light-gray">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-playfair font-bold mb-4 text-navy-accent">Fasilitas Umum</h2>
                <div class="w-24 h-1 bg-gold-primary mx-auto mb-6"></div>
                <p class="text-lg text-dark-gray max-w-2xl mx-auto">Berbagai fasilitas pendukung untuk kenyamanan tamu</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gold-primary bg-opacity-20 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-parking text-gold-primary text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-navy-accent">Area Parkir Luas</h3>
                    </div>
                    <p class="text-dark-gray">Aman & gratis untuk tamu hotel</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="150">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gold-primary bg-opacity-20 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-coffee text-gold-primary text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-navy-accent">Lounge & Coffee Bar</h3>
                    </div>
                    <p class="text-dark-gray">Tempat bersantai menikmati minuman</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gold-primary bg-opacity-20 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-wifi text-gold-primary text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-navy-accent">WiFi Berkecepatan Tinggi</h3>
                    </div>
                    <p class="text-dark-gray">Gratis di seluruh area hotel</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gold-primary bg-opacity-20 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-tshirt text-gold-primary text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-navy-accent">Laundry Service</h3>
                    </div>
                    <p class="text-dark-gray">Cepat dan higienis</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="150">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gold-primary bg-opacity-20 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-shuttle-van text-gold-primary text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-navy-accent">Layanan Antar-Jemput</h3>
                    </div>
                    <p class="text-dark-gray">Menuju bandara & destinasi populer</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gold-primary bg-opacity-20 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-concierge-bell text-gold-primary text-xl"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-navy-accent">Resepsionis 24 Jam</h3>
                    </div>
                    <p class="text-dark-gray">Siap membantu kapan pun</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas Eksklusif -->
    <section id="facilities-exclusive" class="py-20 bg-white text-navy-accent">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-playfair font-bold mb-4">Fasilitas Eksklusif</h2>
                <div class="w-24 h-1 bg-gold-primary mx-auto mb-6"></div>
                <p class="text-lg text-dark-gray max-w-2xl mx-auto">Pengalaman premium untuk tamu istimewa</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-gold-primary rounded-full flex items-center justify-center mr-4 mt-1">
                                <i class="fas fa-crown text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-playfair font-bold mb-2">Private Villa & Suite</h3>
                                <p class="text-dark-gray">Akomodasi mewah dengan jacuzzi pribadi dan pemandangan eksklusif</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-gold-primary rounded-full flex items-center justify-center mr-4 mt-1">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-playfair font-bold mb-2">Meeting & Ballroom</h3>
                                <p class="text-dark-gray">Ruang pertemuan berteknologi modern untuk acara bisnis dan pernikahan</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-gold-primary rounded-full flex items-center justify-center mr-4 mt-1">
                                <i class="fas fa-user-chef text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-playfair font-bold mb-2">Private Chef Service</h3>
                                <p class="text-dark-gray">Pengalaman kuliner personal dengan chef profesional</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-gold-primary rounded-full flex items-center justify-center mr-4 mt-1">
                                <i class="fas fa-cocktail text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-playfair font-bold mb-2">Sky Lounge</h3>
                                <p class="text-dark-gray">Lounge eksklusif dengan city view dan live music</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-gold-primary rounded-full flex items-center justify-center mr-4 mt-1">
                                <i class="fas fa-car text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-playfair font-bold mb-2">VIP Transportation</h3>
                                <p class="text-dark-gray">Layanan transportasi mewah dengan chauffeur profesional</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div data-aos="fade-left">
                    <img src="../img/ballroom.jpg" alt="Private Villa" class="w-full h-96 object-cover rounded-lg shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    </div>
    </div>
    </section>

    <?php include "../komponen/footer.php" ?>
    <?php include "../komponen/modal.php" ?>

    <script src="../jstyle/lores.js"></script>
    <script src="../jstyle/carrosel.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: false,
            offset: 100
        });

        const heroSwiper = new Swiper('.facilities-hero-swiper', {
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
        });

        document.querySelectorAll('.gallery-item img').forEach(img => {
            img.addEventListener('click', function() {
                const lightbox = document.createElement('div');
                lightbox.className = 'fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center';
                lightbox.innerHTML = `
                    <div class="relative max-w-4xl max-h-full">
                        <img src="${this.src}" alt="${this.alt}" class="max-w-full max-h-full">
                        <button class="absolute top-4 right-4 text-white text-2xl bg-black bg-opacity-50 w-10 h-10 rounded-full">×</button>
                    </div>
                `;
                document.body.appendChild(lightbox);

                lightbox.querySelector('button').addEventListener('click', () => {
                    lightbox.remove();
                });

                lightbox.addEventListener('click', (e) => {
                    if (e.target === lightbox) {
                        lightbox.remove();
                    }
                });
            });
        });
    </script>
</body>

</html>