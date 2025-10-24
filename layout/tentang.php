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
    <title>Tentang Kami - Grand Horizon Hotel</title>
</head>

<body class="font-poppins text-dark-gray bg-white overflow-x-hidden">

    <?php include '../komponen/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="relative h-80 md:h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')"></div>
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="container mx-auto px-4 text-center relative z-10" data-aos="zoom-in" data-aos-duration="1000">
            <h1 class="text-4xl md:text-5xl font-playfair font-bold mb-6 text-white">Tentang</h1>
            <h1 class="text-4xl md:text-5xl font-playfair font-bold mb-6 text-white">Grand Horizon Hotel</h1>
        </div>
    </section>

    <!-- Sejarah Hotel -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-10">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/2" data-aos="fade-right">
                    <img src="../img/hotell.jpg"
                        alt="Sejarah Hotel" class="w-full h-96 object-cover rounded-lg shadow-lg">
                </div>

                <div class="lg:w-1/2" data-aos="fade-left">
                    <h2 class="text-3xl md:text-4xl font-playfair font-bold mb-6 text-navy-accent">Sejarah Kami</h2>
                    <p class="text-lg text-justify mb-6">
                       Grand Horizon Hotel berdiri sejak tahun 1990 di kota Depok, dengan komitmen menghadirkan kenyamanan dan pelayanan premium. Berawal dari 30 kamar sederhana, kini kami telah berkembang menjadi resort bintang 5 dengan fasilitas lengkap seperti kolam renang rooftop, spa, restoran fine dining, dan ruang konferensi modern. Selama lebih dari tiga dekade, Grand Horizon Hotel menjadi tuan rumah berbagai acara bergengsi dan tetap menjunjung tinggi nilai keramahan, kenyamanan, serta keunggulan layanan, menjadikannya simbol gaya hidup elegan dan pengalaman menginap tak terlupakan di kota Depok.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi & Misi -->
    <section class="py-20 bg-light-gray">
        <div class="container mx-auto px-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-playfair font-bold mb-4 text-navy-accent">Visi & Misi Kami</h2>
                <div class="w-24 h-1 bg-gold-primary mx-auto mb-6"></div>
                <p class="text-lg max-w-2xl mx-auto">Komitmen kami untuk memberikan pengalaman terbaik bagi setiap tamu</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Visi -->
                <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition duration-300" data-aos="fade-right">
                    <div class="flex gap-4">
                        <div class="w-16 h-16 bg-gold-primary bg-opacity-20 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-bullseye text-gold-primary text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-playfair font-bold mt-4 text-navy-accent">Visi</h3>
                    </div>    
                    <p class="text-lg mb-4">Menjadi hotel pilihan utama dengan pelayanan bintang lima di setiap pengalaman tamu.</p>
                    <p class="text-dark-gray">Kami bercita-cita untuk terus menjadi yang terdepan dalam industri perhotelan dengan inovasi dan komitmen terhadap kualitas.</p>
                </div>

                <!-- Misi -->
                <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition duration-300" data-aos="fade-left">
                    <div class="flex gap-4">
                        <div class="w-16 h-16 bg-gold-primary bg-opacity-20 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-tasks text-gold-primary text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-playfair font-bold mt-4 text-navy-accent">Misi</h3>
                    </div>
                    <ul class="space-y-4 text-dark-gray">
                        <li class="flex items-start hover:translate-x-2 transition duration-300">
                            <i class="fas fa-check text-gold-primary mr-3 mt-1"></i>
                            <span>Memberikan pelayanan personal terbaik kepada setiap tamu</span>
                        </li>
                        <li class="flex items-start hover:translate-x-2 transition duration-300">
                            <i class="fas fa-check text-gold-primary mr-3 mt-1"></i>
                            <span>Menjaga kebersihan dan kenyamanan di setiap fasilitas</span>
                        </li>
                        <li class="flex items-start hover:translate-x-2 transition duration-300">
                            <i class="fas fa-check text-gold-primary mr-3 mt-1"></i>
                            <span>Mengutamakan kepuasan dan keamanan tamu dalam setiap aspek</span>
                        </li>
                        <li class="flex items-start hover:translate-x-2 transition duration-300">
                            <i class="fas fa-check text-gold-primary mr-3 mt-1"></i>
                            <span>Berinovasi terus menerus untuk meningkatkan pengalaman tamu</span>
                        </li>
                        <li class="flex items-start hover:translate-x-2 transition duration-300">
                            <i class="fas fa-check text-gold-primary mr-3 mt-1"></i>
                            <span>Menjadi bagian dari komunitas yang bertanggung jawab secara sosial</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Keunggulan-->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 " data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-playfair font-bold mb-4 text-navy-accent">Keunggulan Kami</h2>
                <div class="w-24 h-1 bg-gold-primary mx-auto mb-6"></div>
                <p class="text-lg max-w-2xl mx-auto">Alasan mengapa tamu memilih Grand Horizon Hotel</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-light-gray p-6 rounded-lg text-center hover:-translate-y-2 hover:shadow-xl transition duration-300" data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-16 h-16 bg-gold-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-navy-accent">Pelayanan 24 Jam</h3>
                    <p class="text-dark-gray">Staf kami siap melayani Anda kapan saja, 24 jam sehari untuk kenyamanan maksimal.</p>
                </div>

                <div class="bg-light-gray p-6 rounded-lg text-center hover:-translate-y-2 hover:shadow-xl transition duration-300" data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-16 h-16 bg-gold-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-navy-accent">Lokasi Strategis</h3>
                    <p class="text-dark-gray">Terletak di pusat kota dengan akses mudah ke pusat perbelanjaan, bisnis, dan wisata.</p>
                </div>

                <div class="bg-light-gray p-6 rounded-lg text-center hover:-translate-y-2 hover:shadow-xl transition duration-300" data-aos="zoom-in" data-aos-delay="300">
                    <div class="w-16 h-16 bg-gold-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-star text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-navy-accent">Fasilitas Premium</h3>
                    <p class="text-dark-gray">Nikmati kolam renang, spa, gym, dan rooftop bar dengan pemandangan kota yang memukau.</p>
                </div>

                <div class="bg-light-gray p-6 rounded-lg text-center hover:-translate-y-2 hover:shadow-xl transition duration-300" data-aos="zoom-in" data-aos-delay="400">
                    <div class="w-16 h-16 bg-gold-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-navy-accent">Staf Profesional</h3>
                    <p class="text-dark-gray">Tim kami yang ramah dan terlatih siap memberikan pengalaman terbaik selama menginap.</p>
                </div>
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