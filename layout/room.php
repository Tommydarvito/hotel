<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Grand Horizon Hotel</title>
</head>

<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'gold-primary': '#D4AF37',
                    'gold-light': '#F4E4B8',
                    'gold-dark': '#B8941F',
                    'navy-accent': '#1E3A5F',
                    'light-gray': '#F8F8F8',
                    'dark-gray': '#333333',
                },
                fontFamily: {
                    'playfair': ['Playfair Display', 'serif'],
                    'poppins': ['Poppins', 'sans-serif'],
                }
            }
        }
    }
</script>


<body class="font-poppins text-dark-gray bg-white">

    <header class="bg-white sticky top-0 z-50 shadow-sm transition-all duration-300">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <h1 class="text-2xl font-playfair font-bold text-gold-primary">Grand</h1>
                    <h1 class="text-2xl font-playfair font-bold text-navy-accent ml-1">Horizon</h1>
                </div>

                <div class="hidden md:flex space-x-8">
                    <a href="beranda.php" class="text-navy-accent hover:text-gold-primary transition duration-300 font-medium border-b-2 border-transparent hover:border-gold-primary pb-1">Beranda</a>
                    <a href="room.php" class="text-navy-accent hover:text-gold-primary transition duration-300 font-medium border-b-2 border-transparent hover:border-gold-primary pb-1">Kamar & Suite</a>
                    <a href="#" class="text-navy-accent hover:text-gold-primary transition duration-300 font-medium border-b-2 border-transparent hover:border-gold-primary pb-1">Fasilitas</a>
                    <a href="#" class="text-navy-accent hover:text-gold-primary transition duration-300 font-medium border-b-2 border-transparent hover:border-gold-primary pb-1">Tentang Kami</a>
                    <a href="#" class="text-navy-accent hover:text-gold-primary transition duration-300 font-medium border-b-2 border-transparent hover:border-gold-primary pb-1">Kontak</a>
                </div>

                <div class="flex items-center mr-2 space-x-4">
                    <button class="bg-gold-primary text-white px-6 py-2 rounded-md font-medium hover:shadow-lg transition duration-300 transform hover:scale-105">
                        Login
                    </button>
                </div>
            </div>
        </nav>
    </header>


    <!-- hero section -->
    <section class="relative h-[270px] flex items-center justify-center overflow-hidden bg-white">
        <div class="absolute inset-0"></div>
        <div
            class="absolute inset-0 bg-cover bg-center  z-0 bg-black/50"
            style="background-image: url('../img/room.jpg')">
        </div>

        <div class="absolute inset-0 bg-black/50 z-10"></div>

        <div class="container mx-auto px-4 text-center z-20" data-aos="zoom-in" data-aos-duration="1000">
            <h2 class="text-3xl md:text-5xl font-playfair font-bold mb-6 text-white">
                Kamar & suits
            </h2>
        </div>
    </section>

    <!-- Section Daftar Kamar -->
    <section id="rooms" class="py-16 bg-light-gray">
        <div class="container mx-auto px-10">
            <h2 class="text-3xl md:text-4xl font-playfair font-bold text-center mb-4 text-navy-accent" data-aos="fade-up">
                Pilihan Kamar Kami
            </h2>
            <div class="w-24 h-1 bg-gold-primary mx-auto mb-6" data-aos="fade-up"></div>
            <p class="text-xl text-center max-w-2xl mx-auto text-dark-gray mb-16" data-aos="fade-up">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam ipsam, saepe maiores sunt tempora doloremque!</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-500" data-aos="zoom-in" data-aos-delay="100">
                    <img src="../img/single.jpg" alt="Single Room" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-playfair font-bold text-navy-accent mb-2">Single Room</h3>
                        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus.</p>
                        <p class="text-gold-primary font-semibold mb-4">Rp450.000 / malam</p>
                        <a href="#" class="bg-gold-primary text-white px-5 py-2 rounded-md hover:bg-gold-dark transition duration-300">Pesan Sekarang</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-500" data-aos="zoom-in" data-aos-delay="200">
                    <img src="../img/double.jpg" alt="Double Room" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-playfair font-bold text-navy-accent mb-2">Double Room</h3>
                        <p class="text-gray-600 mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi facere iste et?</p>
                        <p class="text-gold-primary font-semibold mb-4">Rp600.000 / malam</p>
                        <a href="#" class="bg-gold-primary text-white px-5 py-2 rounded-md hover:bg-gold-dark transition duration-300">Pesan Sekarang</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-500" data-aos="zoom-in" data-aos-delay="300">
                    <img src="../img/deluxe.jpg" alt="Deluxe Room" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-playfair font-bold text-navy-accent mb-2">Deluxe Room</h3>
                        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor molestiae cumque fugiat unde quas nostrum.</p>
                        <p class="text-gold-primary font-semibold mb-4">Rp850.000 / malam</p>
                        <a href="#" class="bg-gold-primary text-white px-5 py-2 rounded-md hover:bg-gold-dark transition duration-300">Pesan Sekarang</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-500" data-aos="zoom-in" data-aos-delay="400">
                    <img src="../img/suite.jpg" alt="Suite Room" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-playfair font-bold text-navy-accent mb-2">Suite Room</h3>
                        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore est quod molestias exercitationem maxime!</p>
                        <div class="flex items-center">
                            <p class="flex text-gold-primary font-semibold mb-4">Rp1.200.000 / malam </p>
                        </div>
                        <a href="booking.php?id=4" class="bg-gold-primary text-white px-5 py-2 rounded-md hover:bg-gold-dark transition duration-300">Pesan Sekarang</a>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-500" data-aos="zoom-in" data-aos-delay="500">
                    <img src="../img/loby.jpg" alt="Family Room" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-playfair font-bold text-navy-accent mb-2">Family Room</h3>
                        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem a animi quidem possimus repellendus.</p>
                        <p class="text-gold-primary font-semibold mb-4">Rp1.500.000 / malam</p>
                        <a href="booking.php?id=5" class="bg-gold-primary text-white px-5 py-2 rounded-md hover:bg-gold-dark transition duration-300">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- footer -->
    <footer class="text-white bg-black py-12 border-t border-gold-light">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div data-aos="fade-up" data-aos-duration="800">
                    <h3 class="text-2xl font-playfair font-bold mb-4 text-gold-primary">Grand Horizon</h3>
                    <p class="mb-4 text-white">Hotel bintang 5 dengan pelayanan terbaik dan fasilitas mewah untuk pengalaman menginap tak terlupakan.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white hover:text-gold-primary transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-white hover:text-gold-primary transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-white hover:text-gold-primary transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <h4 class="text-lg font-playfair font-bold mb-4 text-gold-primary">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-white hover:text-gold-primary transition duration-300">Beranda</a></li>
                        <li><a href="#" class="text-white hover:text-gold-primary transition duration-300">Kamar & Suite</a></li>
                        <li><a href="#" class="text-white hover:text-gold-primary transition duration-300">Fasilitas</a></li>
                        <li><a href="#" class="text-white hover:text-gold-primary transition duration-300">Tentang Kami</a></li>
                        <li><a href="#" class="text-white hover:text-gold-primary transition duration-300">Kontak</a></li>
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <h4 class="text-lg font-playfair font-bold mb-4 text-gold-primary">Kontak Kami</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center text-white">
                            <i class="fas fa-map-marker-alt mr-3 text-gold-primary"></i>
                            <span>Jalan No. 123, Jakarta</span>
                        </li>
                        <li class="flex items-center text-white">
                            <i class="fas fa-phone mr-3 text-gold-primary"></i>
                            <span>+62 21 1234 5678</span>
                        </li>
                        <li class="flex items-center text-white">
                            <i class="fas fa-envelope mr-3 text-gold-primary"></i>
                            <span>info@grandhorizon.com</span>
                        </li>
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                    <h4 class="text-lg font-playfair font-bold mb-4 text-gold-primary">Newsletter</h4>
                    <p class="mb-4 text-white">Dapatkan penawaran khusus dan informasi terbaru dari kami.</p>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-300 mt-8 pt-8 text-center text-white">
            <p>&copy; 2023 Grand Horizon Hotel. All rights reserved.</p>
        </div>
        </div>
    </footer>


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