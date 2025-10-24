
        const loginBtn = document.getElementById('loginBtn');
        const daftarBtn = document.getElementById('daftarBtn');
        const loginModal = document.getElementById('loginModal');
        const daftarModal = document.getElementById('daftarModal');
        const closeLoginModal = document.getElementById('closeLoginModal');
        const closeDaftarModal = document.getElementById('closeDaftarModal');
        const daftar = document.getElementById('daftar');
        const login = document.getElementById('login');


        function closeWithFade(modal) {
            modal.querySelector('div').classList.remove('animate-fadeIn');
            modal.querySelector('div').classList.add('animate-fadeOut');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.querySelector('div').classList.remove('animate-fadeOut');
            }, 200); // durasi sesuai animasi (0.3s)
        }

        // buka modal login
        loginBtn.addEventListener('click', () => {
            loginModal.classList.remove('hidden');
            loginModal.querySelector('div').classList.add('animate-fadeIn');
        });

        // tutup modal login
        closeLoginModal.addEventListener('click', () => closeWithFade(loginModal));

        // buka modal daftar
        daftarBtn.addEventListener('click', () => {
            daftarModal.classList.remove('hidden');
            daftarModal.querySelector('div').classList.add('animate-fadeIn');
        });

        // tutup modal daftar
        closeDaftarModal.addEventListener('click', () => closeWithFade(daftarModal));

        // klik di luar modal -> tutup
        window.addEventListener('click', (e) => {
            if (e.target === loginModal) closeWithFade(loginModal);
            if (e.target === daftarModal) closeWithFade(daftarModal);
        });

        // link antar modal
        daftar.addEventListener('click', (e) => {
            e.preventDefault();
            closeWithFade(loginModal);
            setTimeout(() => {
                daftarModal.classList.remove('hidden');
                daftarModal.querySelector('div').classList.add('animate-fadeIn');
            }, 300);
        });

        login.addEventListener('click', (e) => {
            e.preventDefault();
            closeWithFade(daftarModal);
            setTimeout(() => {
                loginModal.classList.remove('hidden');
                loginModal.querySelector('div').classList.add('animate-fadeIn');
            }, 300);
        });