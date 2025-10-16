<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Grand Horizon Hotel</title>
    
    <script>
        // Konfigurasi Tailwind
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
    
    <style>
        .gold-border {
            border: 1px solid #D4AF37;
        }
        
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .parallax {
            background-attachment: fixed;
        }
        
        @media (max-width: 768px) {
            .parallax {
                background-attachment: scroll;
            }
        }
    </style>
</head>
<body class="font-poppins text-dark-gray bg-white overflow-x-hidden">
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
                Experience unparalleled comfort and elegance at Grand Horizon Hotel
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button class="bg-gold-primary text-white px-8 py-4 rounded-md font-bold text-lg hover:shadow-lg transition duration-300 transform hover:scale-105">
                    Book Now
                </button>
                <button class="bg-transparent gold-border text-gold-primary px-8 py-4 rounded-md font-bold text-lg hover:bg-gold-light transition duration-300">
                    Lihat Kamar
                </button>
            </div>
        </div>
        
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
            <a href="#facilities" class="text-gold-primary text-2xl">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </section>


    <!-- fasilitas -->
    <section id="fasilitas" class="py-20 bg-light-gray">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
                <h2 class="text-4xl font-playfair font-bold mb-4 text-navy-accent">Fasilitas Utama</h2>
                <div class="w-24 h-1 bg-gold-primary mx-auto mb-6"></div>
                <p class="text-xl max-w-2xl mx-auto text-dark-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 p-10 gap-8">
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover-lift" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <div class="h-56 bg-cover bg-center" style="background-image: url('../img/pool.jpg')"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-playfair font-bold mb-2 text-navy-accent">Kolam Renang</h3>
                        <p class="text-dark-gray">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, ipsa distinctio.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover-lift" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <div class="h-56 bg-cover bg-center" style="background-image: url('../img/spa.jpg')"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-playfair font-bold mb-2 text-navy-accent">Spa & Wellness</h3>
                        <p class="text-dark-gray">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore, mollitia.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover-lift" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                    <div class="h-56 bg-cover bg-center" style="background-image: url('../img/restoo.jpg')"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-playfair font-bold mb-2 text-navy-accent">Restoran Premium</h3>
                        <p class="text-dark-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, suscipit.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover-lift" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                    <div class="h-56 bg-cover bg-center" style="background-image: url('../img/ballroom.jpg')"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-playfair font-bold mb-2 text-navy-accent">Ballroom</h3>
                        <p class="text-dark-gray">Lorem ipsum dolor sit amet consectetur, adipisicing elit. A, velit.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- fasilitas2 -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-10">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 mb-10 lg:mb-0 lg:pr-10" data-aos="fade-right" data-aos-duration="800">
                    <h2 class="text-4xl font-playfair font-bold mb-6 text-navy-accent">fasilitas</h2>
                    <div class="w-24 h-1 bg-gold-primary mb-6"></div>
                    <p class="text-lg mb-6 text-dark-gray">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, aperiam. Non quaerat provident voluptatibus aspernatur.</p>
                    <p class="text-lg mb-8 text-dark-gray">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum eius obcaecati qui, facere praesentium iure.</p>
                    <button class="bg-gold-primary text-white px-8 py-3 rounded-md font-bold text-lg hover:shadow-lg transition duration-300 transform hover:scale-105">
                        Jelajahi Fasilitas
                    </button>
                </div>
                <div class="lg:w-1/2" data-aos="fade-left" data-aos-duration="800">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="rounded-lg overflow-hidden shadow-md h-64 bg-cover bg-center" style="background-image: url('../img/deluxe.jpg')"></div>
                        <div class="rounded-lg overflow-hidden shadow-md h-64 bg-cover bg-center mt-8" style="background-image: url('../img/loby.jpg')"></div>
                        <div class="rounded-lg overflow-hidden shadow-md h-64 bg-cover bg-center" style="background-image: url('../img/pool.jpg')"></div>
                        <div class="rounded-lg overflow-hidden shadow-md h-64 bg-cover bg-center mt-8" style="background-image: url('../img/suite.jpg')"></div>
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
                <p class="text-xl max-w-2xl mx-auto text-dark-gray">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg p-8 shadow-md hover-lift" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="100">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full bg-cover bg-center mr-4 border-2 border-gold-primary" style="background-image: url('../img/ambaa.jpg')"></div>
                        <div>
                            <h4 class="font-playfair font-bold text-lg text-navy-accent">Admin Sule</h4>
                            <p class="text-gold-primary">★★★★★</p>
                        </div>
                    </div>
                    <p class="text-dark-gray italic">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident autem modi ipsum vel optio distinctio?</p>
                </div>
                
                <div class="bg-white rounded-lg p-8 shadow-md hover-lift" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full bg-cover bg-center mr-4 border-2 border-gold-primary" style="background-image: url('../img/mas.png')"></div>
                        <div>
                            <h4 class="font-playfair font-bold text-lg text-navy-accent">Orang ngawi</h4>
                            <p class="text-gold-primary">★★★★★</p>
                        </div>
                    </div>
                    <p class="text-dark-gray italic">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur impedit sunt corporis sequi ad ratione.</p>
                </div>
                
                <div class="bg-white rounded-lg p-8 shadow-md hover-lift" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full bg-cover bg-center mr-4 border-2 border-gold-primary" style="background-image: url('../img/her.jpg')"></div>
                        <div>
                            <h4 class="font-playfair font-bold text-lg text-navy-accent">Panji JMk</h4>
                            <p class="text-gold-primary">★★★★★</p>
                        </div>
                    </div>
                    <p class="text-dark-gray italic">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum optio quam dicta dignissimos illo molestias!
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- cta -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="text-4xl md:text-5xl font-playfair font-bold mb-6 text-navy-accent">Lorem ipsum dolor sit.</h2>
            <div class="w-24 h-1bg-gold-primary mx-auto mb-6"></div>
            <p class="text-xl mb-10 max-w-2xl mx-auto text-dark-gray">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, quasi.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button class="bg-gold-primary text-white px-8 py-4 rounded-md font-bold text-lg hover:shadow-lg transition duration-300 transform hover:scale-105">
                    Lihat Kamar
                </button>
                <button class="bg-transparent gold-border text-gold-primary px-8 py-4 rounded-md font-bold text-lg hover:bg-gold-light transition duration-300">
                    Hubungi Kami
                </button>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="text-white bg-black py-12 border-t border-gold-light">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div data-aos="fade-up" data-aos-duration="800">
                    <h3 class="text-2xl font-playfair font-bold mb-4 text-gold-primary">Grand Horizon</h3>
                    <p class="mb-4 text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, suscipit..</p>
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
                    <h4 class="text-lg font-playfair font-bold mb-4 text-gold-primary">lorem</h4>
                    <p class="mb-4 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit..</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-300 mt-8 pt-8 text-center text-white">
                <p>&copy; 2023 Grand Horizon Hotel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Load AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Inisialisasi AOS
        AOS.init({
            duration: 800,
            once: false,
            offset: 100
        });
        
        // Navbar background change on scroll
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