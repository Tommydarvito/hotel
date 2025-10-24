<!-- Login Modal -->
<div id="loginModal"
    class="fixed inset-0 flex items-center justify-center bg-black/50 z-[999] hidden transition-all duration-300">
    <div class="bg-white rounded-2xl shadow-xl w-[90%] max-w-md p-8 relative animate-fadeIn">
        <button id="closeLoginModal" class="absolute top-3 right-3 text-gray-500 hover:text-red-500">
            <i class="fas fa-times text-xl"></i>
        </button>

        <h2 class="text-2xl font-playfair font-bold text-center text-navy-accent mb-6">Login ke Akun Anda</h2>
        <form action="../action/action_login.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-gold-primary outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-gold-primary outline-none">
            </div>
            <button type="submit"
                class="w-full bg-gold-primary text-white py-2 rounded-md font-medium hover:bg-gold-dark transition duration-300">
                Login
            </button>

            <p class="text-center text-sm text-gray-600 mt-4">
                Belum punya akun?
                <a href="#daftar" id="daftar" class="text-navy-accent hover:underline">Daftar di sini</a>
            </p>
        </form>
    </div>
</div>


<!-- Daftar Modal -->
<div id="daftarModal"
    class="fixed inset-0 flex items-center justify-center bg-black/50 z-[999] hidden transition-all duration-300">
    <div class="bg-white rounded-2xl shadow-xl w-[90%] max-w-md p-8 relative animate-fadeIn">
        <button id="closeDaftarModal" class="absolute top-3 right-3 text-gray-500 hover:text-red-500">
            <i class="fas fa-times text-xl"></i>
        </button>

        <h2 class="text-2xl font-playfair font-bold text-center text-navy-accent mb-6">Buat Akun Baru</h2>
        <form action="../action/action_regis.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-gold-primary outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-gold-primary outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-gold-primary outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="konfirmasi" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-gold-primary outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">No Telepon</label>
                <input type="number" name="no_tlp" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-gold-primary outline-none">
            </div>
            <button type="submit"
                class="w-full bg-gold-primary text-white py-2 rounded-md font-medium hover:bg-gold-dark transition duration-300">
                Daftar
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-4">
            Sudah punya akun?
            <a href="#" id="login" class="text-navy-accent hover:underline">Masuk di sini</a>
        </p>
    </div>
</div>


