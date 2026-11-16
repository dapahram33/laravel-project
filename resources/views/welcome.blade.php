<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bunga Di Tembok // Ruang Baca & Literasi Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        pitch: '#000000',
                        charcoal: '#3E3636',
                        crimson: '#D72323',
                        softwhite: '#F5EDED',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-softwhite text-pitch min-h-screen flex flex-col antialiased selection:bg-crimson selection:text-white">

    <!-- TOAST NOTIFIKASI -->
    <div id="toastNotification" class="fixed bottom-6 right-6 z-50 transform translate-y-24 opacity-0 transition-all duration-300 bg-pitch text-softwhite px-5 py-3.5 rounded-2xl shadow-2xl flex items-center gap-3 border border-charcoal/40 text-xs font-semibold">
        <span class="w-2 h-2 rounded-full bg-crimson"></span>
        <span id="toastMessage">Notifikasi sistem</span>
    </div>

    <!-- CONTAINER UTAMA -->
    <div id="appContainer" class="flex-1 flex flex-col">
        
        <!-- ==================== 1. HALAMAN LOGIN ==================== -->
        <div id="loginSection" class="flex-1 flex items-center justify-center p-6 bg-pitch relative overflow-hidden">
            <div class="absolute -top-32 -left-32 w-96 h-96 bg-crimson/15 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-charcoal/40 rounded-full blur-3xl pointer-events-none"></div>

            <div class="bg-softwhite/95 backdrop-blur-xl p-10 md:p-12 rounded-[2.5rem] shadow-2xl border border-charcoal/10 w-full max-w-md relative z-10">
                <div class="text-center mb-8">
                    <span class="px-3.5 py-1.5 text-[10px] font-bold uppercase tracking-widest bg-pitch text-softwhite rounded-full inline-block mb-3">
                        Digital Library Space
                    </span>
                    <h1 class="text-3xl font-extrabold tracking-tight text-pitch">Bunga Di Tembok<span class="text-crimson">.</span></h1>
                    <p class="text-xs text-gray-500 mt-1">Eksplorasi literatur, seni, dan bacaan pilihan.</p>
                </div>

                <form onsubmit="handleLogin(event)" class="space-y-4">
                    <div>
                        <label class="block text-[11px] font-bold text-gray-600 uppercase tracking-wider mb-1.5">Masuk Sebagai</label>
                        <select id="loginRole" class="w-full px-4.5 py-3.5 bg-white border border-charcoal/20 rounded-2xl focus:outline-none focus:ring-2 focus:ring-crimson text-xs font-bold text-pitch">
                            <option value="user">Pembaca (Reader)</option>
                            <option value="admin">Administrator Perpus</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-gray-600 uppercase tracking-wider mb-1.5">Nama Lengkap / Username</label>
                        <input type="text" id="loginName" required placeholder="Contoh: Dhafa / Asga" class="w-full px-4.5 py-3.5 bg-white border border-charcoal/20 rounded-2xl focus:outline-none focus:ring-2 focus:ring-crimson text-xs font-semibold">
                    </div>

                    <button type="submit" class="w-full py-4 bg-crimson text-white font-bold rounded-2xl shadow-lg hover:bg-opacity-90 transition-all text-xs tracking-wider uppercase">
                        Masuk ke Beranda
                    </button>
                </form>
            </div>
        </div>

        <!-- ==================== 2. HALAMAN DASHBOARD ==================== -->
        <div id="dashboardSection" class="hidden flex-1 flex flex-col">
            
            <!-- Navbar Minimalis Profesional -->
            <header class="bg-pitch text-softwhite sticky top-0 z-30 px-6 py-4 shadow-md border-b border-charcoal">
                <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
                    
                    <div class="flex items-center justify-between w-full md:w-auto">
                        <div class="flex items-center space-x-2">
                            <span class="text-lg font-black tracking-tight text-softwhite">Bunga Di Tembok<span class="text-crimson">.</span></span>
                        </div>
                        <button onclick="handleLogout()" class="md:hidden px-3 py-1 text-xs font-bold bg-charcoal text-softwhite rounded-xl">Keluar</button>
                    </div>

                    <!-- Navigation Switcher -->
                    <div id="navTabsContainer" class="flex items-center space-x-1 bg-charcoal/60 p-1.5 rounded-2xl border border-charcoal text-xs font-bold">
                        <!-- Render via JS -->
                    </div>

                    <!-- User Profile & Logout -->
                    <div class="hidden md:flex items-center space-x-3">
                        <div class="text-right">
                            <span id="userNameDisplay" class="block text-xs font-bold text-softwhite"></span>
                            <span id="roleBadgeText" class="text-[9px] uppercase font-bold text-crimson tracking-widest"></span>
                        </div>
                        <button onclick="handleLogout()" class="px-3.5 py-2 text-xs font-bold bg-charcoal hover:bg-crimson hover:text-white text-softwhite rounded-xl transition-all shadow-sm">
                            Keluar
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="max-w-7xl mx-auto px-6 py-8 flex-1 w-full space-y-10">
                
                <!-- ==================== VIEW 1: EKSPLORASI & VIRAL ==================== -->
                <div id="viewExplore" class="space-y-10">
                    
                    <!-- HERO SECTION: BUKU VIRAL & TOP READ -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-[10px] font-bold text-crimson uppercase tracking-widest">Paling Banyak Dibaca</span>
                                <h2 class="text-2xl font-extrabold text-pitch tracking-tight">Trending & Top Read Minggu Ini</h2>
                            </div>
                            <span class="text-xs font-semibold text-gray-500 bg-charcoal/10 px-3 py-1 rounded-lg">Real-Time Update</span>
                        </div>

                        <div id="viralBannerGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <!-- Render via JS -->
                        </div>
                    </div>

                    <!-- SEARCH & FILTER KATALOG -->
                    <div class="bg-white p-5 rounded-3xl border border-charcoal/10 shadow-sm space-y-4">
                        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                            <div class="w-full md:w-1/2 relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-400 font-bold">/</span>
                                <input type="text" id="searchInput" oninput="handleSearch()" placeholder="Cari judul buku atau penulis..." class="w-full pl-10 pr-4 py-3 bg-softwhite/60 border border-charcoal/20 rounded-2xl text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-crimson">
                            </div>

                            <div class="flex items-center space-x-2 overflow-x-auto hide-scrollbar w-full md:w-auto text-xs font-bold">
                                <button onclick="filterCategory('Semua')" class="cat-pill px-4 py-2 rounded-xl bg-pitch text-softwhite transition-all whitespace-nowrap">Semua</button>
                                <button onclick="filterCategory('Pemrograman')" class="cat-pill px-4 py-2 rounded-xl bg-softwhite text-gray-700 border border-charcoal/20 hover:bg-charcoal/10 transition-all whitespace-nowrap">Pemrograman</button>
                                <button onclick="filterCategory('Pengembangan Diri')" class="cat-pill px-4 py-2 rounded-xl bg-softwhite text-gray-700 border border-charcoal/20 hover:bg-charcoal/10 transition-all whitespace-nowrap">Self-Improvement</button>
                                <button onclick="filterCategory('Fiksi & Novel')" class="cat-pill px-4 py-2 rounded-xl bg-softwhite text-gray-700 border border-charcoal/20 hover:bg-charcoal/10 transition-all whitespace-nowrap">Fiksi & Novel</button>
                            </div>
                        </div>
                    </div>

                    <!-- GRID SEMUA KOLEKSI BUKU -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-extrabold text-pitch tracking-tight">Semua Koleksi Perpustakaan</h3>
                            <div class="flex items-center gap-3">
                                <span id="bookCountLabel" class="text-xs font-semibold text-gray-500">0 Buku Tersedia</span>
                                <button id="addBookBtnHeader" onclick="toggleAddModal(true)" class="hidden px-4 py-2 bg-crimson text-white text-xs font-bold rounded-xl shadow hover:bg-opacity-90 transition">
                                    + Tambah Buku
                                </button>
                            </div>
                        </div>
                        <div id="booksGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            <!-- Render via JS -->
                        </div>
                    </div>
                </div>

                <!-- ==================== VIEW 2: PEMINJAMAN SAYA (USER) ==================== -->
                <div id="viewMyBooks" class="hidden space-y-6">
                    <div class="bg-pitch text-softwhite p-8 rounded-[2.5rem] shadow-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <span class="text-[10px] font-bold uppercase text-crimson tracking-widest">Rak Buku Pribadi</span>
                            <h2 class="text-2xl font-extrabold">Peminjaman Saya & Tenggat Waktu</h2>
                            <p class="text-xs text-gray-400 mt-1">Pantau buku yang sedang dipinjam dan batas waktu pengembalian.</p>
                        </div>
                        <div class="bg-charcoal px-4 py-3 rounded-2xl border border-charcoal/40 text-xs font-semibold text-softwhite">
                            Batas peminjaman: <span class="text-crimson font-bold">7 Hari</span> (Denda Rp 2.000/hari jika lewat)
                        </div>
                    </div>

                    <div id="myBorrowedList" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Render via JS -->
                    </div>
                </div>

                <!-- ==================== VIEW 3: STATISTIK & MONITORING (ADMIN) ==================== -->
                <div id="viewAdminDashboard" class="hidden space-y-8">
                    <div class="bg-pitch text-softwhite p-8 rounded-[2.5rem] shadow-xl flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                        <div>
                            <span class="text-[10px] font-bold uppercase text-crimson tracking-widest">Panel Petugas & Statistik</span>
                            <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight">Monitoring Peminjaman & Statistik</h2>
                            <p class="text-xs text-gray-400 mt-1">Pantau daftar peminjam aktif, tenggat waktu, dan kelola database literatur.</p>
                        </div>
                        <button onclick="toggleAddModal(true)" class="px-5 py-3 bg-crimson text-white font-bold text-xs rounded-2xl hover:bg-opacity-90 transition-all shadow-md">
                            + Tambah Buku Baru
                        </button>
                    </div>

                    <!-- Statistik Cepat Admin -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="bg-white p-6 rounded-3xl border border-charcoal/10 shadow-sm">
                            <span class="block text-xs font-bold text-gray-400 uppercase">Total Judul Buku</span>
                            <span class="text-3xl font-extrabold text-pitch mt-1 block" id="adminStatTotal">0</span>
                        </div>
                        <div class="bg-white p-6 rounded-3xl border border-charcoal/10 shadow-sm">
                            <span class="block text-xs font-bold text-gray-400 uppercase">Buku Sedang Dipinjam</span>
                            <span class="text-3xl font-extrabold text-crimson mt-1 block" id="adminStatBorrowed">0</span>
                        </div>
                        <div class="bg-white p-6 rounded-3xl border border-charcoal/10 shadow-sm">
                            <span class="block text-xs font-bold text-gray-400 uppercase">Buku Tersedia di Rak</span>
                            <span class="text-3xl font-extrabold text-emerald-600 mt-1 block" id="adminStatAvailable">0</span>
                        </div>
                    </div>

                    <!-- Tabel Data Orang yang Meminjam Buku -->
                    <div class="bg-white rounded-3xl border border-charcoal/10 shadow-sm overflow-hidden">
                        <div class="p-6 border-b border-charcoal/10 bg-softwhite/50 flex justify-between items-center">
                            <h3 class="font-extrabold text-pitch text-sm">Daftar Peminjam Buku Aktif & Status Tenggat</h3>
                            <span class="text-xs font-bold bg-white px-3 py-1 rounded-xl border border-charcoal/10" id="adminLoansCount">0 Aktif</span>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-softwhite/80 text-[10px] font-bold text-gray-500 uppercase tracking-wider border-b border-charcoal/10">
                                        <th class="p-4 pl-6">Nama Peminjam</th>
                                        <th class="p-4">Judul Buku yang Dipinjam</th>
                                        <th class="p-4">Kategori</th>
                                        <th class="p-4">Batas Tenggat Waktu</th>
                                        <th class="p-4">Status & Denda</th>
                                        <th class="p-4 pr-6 text-right">Aksi Petugas</th>
                                    </tr>
                                </thead>
                                <tbody id="adminLoansTableBody" class="divide-y divide-charcoal/10 text-xs">
                                    <!-- Render via JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </main>
        </div>

    </div>

    <!-- ==================== MODAL TAMBAH BUKU (ADMIN) ==================== -->
    <div id="addBookModal" class="hidden fixed inset-0 bg-pitch/60 backdrop-blur-sm flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-[2.5rem] shadow-2xl border border-charcoal/10 w-full max-w-md p-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-extrabold text-pitch">Tambah Buku Baru</h3>
                    <p class="text-xs text-gray-400">Cover otomatis disesuaikan dengan kategori.</p>
                </div>
                <button onclick="toggleAddModal(false)" class="w-8 h-8 rounded-full bg-softwhite flex items-center justify-center text-gray-500 font-bold hover:bg-charcoal/10">✕</button>
            </div>

            <form onsubmit="handleAddBook(event)" class="space-y-4">
                <div>
                    <label class="block text-[11px] font-bold text-gray-600 uppercase mb-1">Judul Buku</label>
                    <input type="text" id="inputTitle" required placeholder="Contoh: Atomic Habits" class="w-full px-4 py-3 bg-softwhite/50 border border-charcoal/20 rounded-2xl text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-crimson">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-600 uppercase mb-1">Penulis</label>
                    <input type="text" id="inputAuthor" required placeholder="Contoh: James Clear" class="w-full px-4 py-3 bg-softwhite/50 border border-charcoal/20 rounded-2xl text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-crimson">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] font-bold text-gray-600 uppercase mb-1">Kategori</label>
                        <select id="inputCategory" class="w-full px-4 py-3 bg-softwhite/50 border border-charcoal/20 rounded-2xl text-xs font-bold focus:outline-none focus:ring-2 focus:ring-crimson">
                            <option value="Pemrograman">Pemrograman</option>
                            <option value="Pengembangan Diri">Pengembangan Diri</option>
                            <option value="Fiksi & Novel">Fiksi & Novel</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-gray-600 uppercase mb-1">Tahun</label>
                        <input type="number" id="inputYear" required placeholder="2026" class="w-full px-4 py-3 bg-softwhite/50 border border-charcoal/20 rounded-2xl text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-crimson">
                    </div>
                </div>

                <div class="flex justify-end space-x-2 pt-4 border-t border-charcoal/10">
                    <button type="button" onclick="toggleAddModal(false)" class="px-5 py-3 bg-gray-100 text-gray-600 font-bold text-xs rounded-2xl">Batal</button>
                    <button type="submit" class="px-5 py-3 bg-crimson text-white font-bold text-xs rounded-2xl shadow hover:bg-opacity-90">Simpan Buku</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ==================== LOGIKA JAVASCRIPT ==================== -->
    <script>
        const categoryCovers = {
            'Pemrograman': 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=500&auto=format&fit=crop&q=60',
            'Pengembangan Diri': 'https://images.unsplash.com/photo-1532012197267-da84d127e765?w=500&auto=format&fit=crop&q=60',
            'Fiksi & Novel': 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?w=500&auto=format&fit=crop&q=60'
        };

        let defaultBooks = [
            { id: 1, title: 'Atomic Habits', author: 'James Clear', category: 'Pengembangan Diri', year: 2024, cover: categoryCovers['Pengembangan Diri'], isBorrowed: false, borrowedBy: null, borrowedByName: null, dueDate: null, viralReads: '45K dibaca' },
            { id: 2, title: 'Pemrograman Laravel 11', author: 'Ahmad Fauzi', category: 'Pemrograman', year: 2026, cover: categoryCovers['Pemrograman'], isBorrowed: true, borrowedBy: 'user_sample', borrowedByName: 'Dhafa Reader', dueDate: new Date(Date.now() - 86400000 * 2).toISOString(), viralReads: '38K dibaca' },
            { id: 3, title: 'Bicara Itu Ada Seninya', author: 'Oh Su Hyang', category: 'Pengembangan Diri', year: 2023, cover: categoryCovers['Pengembangan Diri'], isBorrowed: false, borrowedBy: null, borrowedByName: null, dueDate: null, viralReads: '30K dibaca' },
            { id: 4, title: 'Gadis Pantai', author: 'Pramoedya Ananta Toer', category: 'Fiksi & Novel', year: 2022, cover: categoryCovers['Fiksi & Novel'], isBorrowed: false, borrowedBy: null, borrowedByName: null, dueDate: null, viralReads: '25K dibaca' }
        ];

        let books = JSON.parse(localStorage.getItem('bunga_tembok_v5_books')) || defaultBooks;
        let currentUser = JSON.parse(localStorage.getItem('bunga_tembok_v5_user')) || null;
        let currentFilter = 'Semua';
        let searchQuery = '';

        function showToast(message) {
            const toast = document.getElementById('toastNotification');
            document.getElementById('toastMessage').innerText = message;
            toast.classList.remove('translate-y-24', 'opacity-0');
            setTimeout(() => {
                toast.classList.add('translate-y-24', 'opacity-0');
            }, 3500);
        }

        function checkAuth() {
            const loginSection = document.getElementById('loginSection');
            const dashboardSection = document.getElementById('dashboardSection');
            const userNameDisplay = document.getElementById('userNameDisplay');
            const roleBadgeText = document.getElementById('roleBadgeText');
            const navTabsContainer = document.getElementById('navTabsContainer');
            const addBookBtnHeader = document.getElementById('addBookBtnHeader');

            if (currentUser) {
                loginSection.classList.add('hidden');
                dashboardSection.classList.remove('hidden');
                userNameDisplay.innerText = currentUser.name;
                roleBadgeText.innerText = currentUser.role === 'admin' ? 'Admin Perpus' : 'Pembaca';

                if (currentUser.role === 'admin') {
                    navTabsContainer.innerHTML = `
                        <button onclick="switchTab('explore')" id="tabExplore" class="px-4 py-2 rounded-xl bg-crimson text-white transition-all">Katalog & Buku</button>
                        <button onclick="switchTab('adminDashboard')" id="tabAdminDashboard" class="px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all">Statistik Peminjam</button>
                    `;
                    addBookBtnHeader.classList.remove('hidden');
                    switchTab('explore');
                } else {
                    navTabsContainer.innerHTML = `
                        <button onclick="switchTab('explore')" id="tabExplore" class="px-4 py-2 rounded-xl bg-crimson text-white transition-all">Eksplorasi Katalog</button>
                        <button onclick="switchTab('myBooks')" id="tabMyBooks" class="px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all">Peminjaman Saya</button>
                    `;
                    addBookBtnHeader.classList.add('hidden');
                    switchTab('explore');
                }
            } else {
                loginSection.classList.remove('hidden');
                dashboardSection.classList.add('hidden');
            }
        }

        function handleLogin(e) {
            e.preventDefault();
            const name = document.getElementById('loginName').value;
            const role = document.getElementById('loginRole').value;
            currentUser = { id: 'user_' + Date.now(), name, role };
            localStorage.setItem('bunga_tembok_v5_user', JSON.stringify(currentUser));
            checkAuth();
            showToast(`Sesi dimulai. Selamat datang, ${name}.`);
        }

        function handleLogout() {
            localStorage.removeItem('bunga_tembok_v5_user');
            currentUser = null;
            checkAuth();
            showToast('Sesi telah diakhiri.');
        }

        function switchTab(tabName) {
            document.getElementById('viewExplore').classList.add('hidden');
            document.getElementById('viewMyBooks').classList.add('hidden');
            document.getElementById('viewAdminDashboard').classList.add('hidden');

            if (document.getElementById('tabExplore')) document.getElementById('tabExplore').className = 'px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all';
            if (document.getElementById('tabMyBooks')) document.getElementById('tabMyBooks').className = 'px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all';
            if (document.getElementById('tabAdminDashboard')) document.getElementById('tabAdminDashboard').className = 'px-4 py-2 rounded-xl text-gray-300 hover:text-white transition-all';

            if (tabName === 'explore') {
                document.getElementById('viewExplore').classList.remove('hidden');
                if (document.getElementById('tabExplore')) document.getElementById('tabExplore').className = 'px-4 py-2 rounded-xl bg-crimson text-white transition-all shadow-sm';
                renderViralBanners();
                renderBooks();
            } else if (tabName === 'myBooks') {
                document.getElementById('viewMyBooks').classList.remove('hidden');
                if (document.getElementById('tabMyBooks')) document.getElementById('tabMyBooks').className = 'px-4 py-2 rounded-xl bg-crimson text-white transition-all shadow-sm';
                renderMyBorrowedBooks();
            } else if (tabName === 'adminDashboard') {
                document.getElementById('viewAdminDashboard').classList.remove('hidden');
                if (document.getElementById('tabAdminDashboard')) document.getElementById('tabAdminDashboard').className = 'px-4 py-2 rounded-xl bg-crimson text-white transition-all shadow-sm';
                renderAdminDashboard();
            }
        }

        function filterCategory(cat) {
            currentFilter = cat;
            document.querySelectorAll('.cat-pill').forEach(btn => {
                if (btn.innerText === cat) {
                    btn.className = 'cat-pill px-4 py-2 rounded-xl bg-pitch text-softwhite transition-all whitespace-nowrap shadow-sm';
                } else {
                    btn.className = 'cat-pill px-4 py-2 rounded-xl bg-softwhite text-gray-700 border border-charcoal/20 hover:bg-charcoal/10 transition-all whitespace-nowrap';
                }
            });
            renderBooks();
        }

        function handleSearch() {
            searchQuery = document.getElementById('searchInput').value.toLowerCase();
            renderBooks();
        }

        function renderViralBanners() {
            const container = document.getElementById('viralBannerGrid');
            container.innerHTML = '';
            const topViral = books.slice(0, 4);

            topViral.forEach((book, index) => {
                let actionBtn = '';
                if (currentUser.role === 'user') {
                    actionBtn = `
                        <button onclick="borrowBook(${book.id})" class="px-3 py-1.5 text-[11px] font-bold rounded-xl text-white ${book.isBorrowed ? 'bg-charcoal text-gray-400' : 'bg-crimson hover:bg-opacity-90'} transition-all">
                            ${book.isBorrowed ? 'Dipinjam' : 'Pinjam'}
                        </button>
                    `;
                } else {
                    actionBtn = `<span class="text-[10px] text-gray-400 tracking-wider uppercase font-semibold">Petugas</span>`;
                }

                container.innerHTML += `
                    <div class="relative bg-pitch rounded-3xl overflow-hidden shadow-lg group h-60 flex flex-col justify-end p-5 border border-charcoal">
                        <img src="${book.cover}" class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-pitch via-pitch/40 to-transparent"></div>
                        
                        <div class="absolute top-3 left-3 bg-crimson text-white text-[10px] font-bold px-2.5 py-1 rounded-lg uppercase tracking-wider">
                            Rank 0${index + 1}
                        </div>

                        <div class="relative z-10 space-y-1">
                            <span class="text-[10px] bg-white/20 backdrop-blur-md text-softwhite px-2 py-0.5 rounded font-medium">${book.category}</span>
                            <h3 class="text-softwhite font-bold text-sm leading-snug line-clamp-1">${book.title}</h3>
                            <p class="text-[11px] text-gray-300">Oleh ${book.author}</p>
                            <div class="pt-2 flex items-center justify-between">
                                <span class="text-[10px] text-gray-400">${book.viralReads || 'Populer'}</span>
                                <div>${actionBtn}</div>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        function renderBooks() {
            const grid = document.getElementById('booksGrid');
            const filtered = books.filter(b => {
                const matchCat = currentFilter === 'Semua' || b.category === currentFilter;
                const matchSearch = b.title.toLowerCase().includes(searchQuery) || b.author.toLowerCase().includes(searchQuery);
                return matchCat && matchSearch;
            });

            grid.innerHTML = '';
            document.getElementById('bookCountLabel').innerText = `${filtered.length} Buku Tersedia`;

            if (filtered.length === 0) {
                grid.innerHTML = '<p class="text-gray-400 col-span-full text-center py-12 text-xs">Buku tidak ditemukan.</p>';
                return;
            }

            filtered.forEach(book => {
                let actionBtn = '';
                if (currentUser.role === 'admin') {
                    actionBtn = `<button onclick="deleteBook(${book.id})" class="px-3 py-1.5 text-xs font-bold bg-red-50 text-crimson rounded-xl hover:bg-crimson hover:text-white transition-all">Hapus Buku</button>`;
                } else {
                    if (book.isBorrowed) {
                        actionBtn = `<span class="text-[11px] font-bold text-amber-700 bg-amber-50 px-3 py-1.5 rounded-xl border border-amber-200">Sedang Dipinjam</span>`;
                    } else {
                        actionBtn = `<button onclick="borrowBook(${book.id})" class="px-4 py-1.5 text-xs font-bold rounded-xl text-white bg-pitch hover:bg-crimson shadow-sm transition-all">Pinjam Buku</button>`;
                    }
                }

                grid.innerHTML += `
                    <div class="bg-white rounded-3xl border border-charcoal/10 overflow-hidden flex flex-col hover:shadow-md transition-all group">
                        <div class="relative h-48 w-full overflow-hidden bg-gray-100">
                            <img src="${book.cover}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-3 left-3 text-[10px] bg-pitch/90 backdrop-blur-md text-softwhite font-bold px-2.5 py-1 rounded-lg">
                                ${book.category}
                            </span>
                        </div>
                        <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                            <div>
                                <h3 class="font-bold text-xs text-pitch line-clamp-1 group-hover:text-crimson transition-colors">${book.title}</h3>
                                <p class="text-[11px] text-gray-400 mt-0.5">${book.author} (${book.year})</p>
                            </div>
                            <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-[10px] font-bold ${book.isBorrowed ? 'text-amber-600 bg-amber-50' : 'text-emerald-600 bg-emerald-50'} px-2.5 py-1 rounded-lg">
                                    ${book.isBorrowed ? 'Dipinjam' : 'Tersedia'}
                                </span>
                                <div>${actionBtn}</div>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        function borrowBook(id) {
            if (currentUser.role === 'admin') {
                showToast('Akses ditolak: Admin tidak dapat meminjam buku.');
                return;
            }

            const dueDate = new Date();
            dueDate.setDate(dueDate.getDate() + 7);

            books = books.map(b => b.id === id ? {
                ...b,
                isBorrowed: true,
                borrowedBy: currentUser.id,
                borrowedByName: currentUser.name,
                dueDate: dueDate.toISOString()
            } : b);

            localStorage.setItem('bunga_tembok_v5_books', JSON.stringify(books));
            renderViralBanners();
            renderBooks();
            showToast('Peminjaman berhasil. Periksa tab Peminjaman Saya.');
        }

        function returnBook(id) {
            books = books.map(b => b.id === id ? {
                ...b,
                isBorrowed: false,
                borrowedBy: null,
                borrowedByName: null,
                dueDate: null
            } : b);

            localStorage.setItem('bunga_tembok_v5_books', JSON.stringify(books));
            if (currentUser.role === 'admin') {
                renderAdminDashboard();
            } else {
                renderMyBorrowedBooks();
            }
            showToast('Buku telah dikembalikan ke sistem perpustakaan.');
        }

        function renderMyBorrowedBooks() {
            const container = document.getElementById('myBorrowedList');
            const myBooks = books.filter(b => b.borrowedBy === currentUser.id);
            container.innerHTML = '';

            if (myBooks.length === 0) {
                container.innerHTML = '<p class="text-gray-400 col-span-full text-center py-12 text-xs">Belum ada riwayat peminjaman buku aktif.</p>';
                return;
            }

            myBooks.forEach(book => {
                const due = new Date(book.dueDate);
                const now = new Date();
                const diffDays = Math.ceil((due - now) / (1000 * 60 * 60 * 24));
                
                let statusBadge = '';
                let fineInfo = '';

                if (diffDays < 0) {
                    const fineAmount = Math.abs(diffDays) * 2000;
                    statusBadge = `<span class="px-3 py-1 bg-red-50 text-crimson border border-red-200 rounded-xl text-[10px] font-bold">Terlambat ${Math.abs(diffDays)} Hari</span>`;
                    fineInfo = `<div class="mt-2 text-xs text-crimson font-bold">Denda Keterlambatan: Rp ${fineAmount.toLocaleString('id-ID')}</div>`;
                } else {
                    statusBadge = `<span class="px-3 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-xl text-[10px] font-bold">Tenggat ${diffDays} Hari Lagi</span>`;
                    fineInfo = `<div class="mt-2 text-xs text-gray-400 font-medium">Status: Tepat waktu (Tanpa Denda)</div>`;
                }

                container.innerHTML += `
                    <div class="bg-white p-6 rounded-3xl border border-charcoal/10 shadow-sm flex items-center gap-5">
                        <img src="${book.cover}" class="w-20 h-28 object-cover rounded-2xl border border-charcoal/10">
                        <div class="flex-1 space-y-1">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] font-bold text-pitch bg-softwhite px-2.5 py-0.5 rounded-md">${book.category}</span>
                                ${statusBadge}
                            </div>
                            <h3 class="font-bold text-sm text-pitch">${book.title}</h3>
                            <p class="text-xs text-gray-400">Penulis: ${book.author}</p>
                            <p class="text-[11px] text-gray-500 mt-1">Batas Pengembalian: <span class="font-bold text-pitch">${due.toLocaleDateString('id-ID')}</span></p>
                            ${fineInfo}
                            <div class="pt-2">
                                <button onclick="returnBook(${book.id})" class="px-4 py-1.5 text-xs font-bold bg-crimson hover:bg-opacity-90 text-white rounded-xl shadow-sm transition-all">
                                    Kembalikan Buku
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        function renderAdminDashboard() {
            const total = books.length;
            const borrowedBooks = books.filter(b => b.isBorrowed);
            const available = total - borrowedBooks.length;

            document.getElementById('adminStatTotal').innerText = total;
            document.getElementById('adminStatBorrowed').innerText = borrowedBooks.length;
            document.getElementById('adminStatAvailable').innerText = available;
            document.getElementById('adminLoansCount').innerText = `${borrowedBooks.length} Peminjam Aktif`;

            const tbody = document.getElementById('adminLoansTableBody');
            tbody.innerHTML = '';

            if (borrowedBooks.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" class="p-8 text-center text-gray-400 text-xs">Belum ada data peminjaman buku saat ini.</td></tr>';
                return;
            }

            borrowedBooks.forEach(book => {
                const due = new Date(book.dueDate);
                const now = new Date();
                const diffDays = Math.ceil((due - now) / (1000 * 60 * 60 * 24));
                
                let statusInfo = '';
                if (diffDays < 0) {
                    const fine = Math.abs(diffDays) * 2000;
                    statusInfo = `<span class="text-crimson font-bold">Terlambat ${Math.abs(diffDays)} hari (Denda: Rp ${fine.toLocaleString('id-ID')})</span>`;
                } else {
                    statusInfo = `<span class="text-emerald-700 font-bold">Aman (Sisa ${diffDays} hari)</span>`;
                }

                tbody.innerHTML += `
                    <tr class="hover:bg-softwhite/40 transition-colors">
                        <td class="p-4 pl-6 font-bold text-pitch">${book.borrowedByName || 'Pembaca'}</td>
                        <td class="p-4">
                            <div class="flex items-center space-x-2">
                                <img src="${book.cover}" class="w-8 h-8 rounded-lg object-cover">
                                <span class="font-bold text-pitch">${book.title}</span>
                            </div>
                        </td>
                        <td class="p-4"><span class="px-2.5 py-1 bg-softwhite text-pitch rounded-lg font-bold text-[10px]">${book.category}</span></td>
                        <td class="p-4 font-bold text-pitch text-[11px]">${due.toLocaleDateString('id-ID')}</td>
                        <td class="p-4 text-[11px]">${statusInfo}</td>
                        <td class="p-4 pr-6 text-right">
                            <button onclick="returnBook(${book.id})" class="px-3.5 py-1.5 text-xs font-bold bg-charcoal text-softwhite rounded-xl hover:bg-crimson transition-all shadow-sm">
                                Paksa Pengembalian
                            </button>
                        </td>
                    </tr>
                `;
            });
        }

        function toggleAddModal(show) {
            const modal = document.getElementById('addBookModal');
            if (show) modal.classList.remove('hidden');
            else modal.classList.add('hidden');
        }

        function handleAddBook(e) {
            e.preventDefault();
            const category = document.getElementById('inputCategory').value;
            const newBook = {
                id: Date.now(),
                title: document.getElementById('inputTitle').value,
                author: document.getElementById('inputAuthor').value,
                category: category,
                year: document.getElementById('inputYear').value,
                cover: categoryCovers[category] || categoryCovers['Pemrograman'],
                isBorrowed: false,
                borrowedBy: null,
                borrowedByName: null,
                dueDate: null,
                viralReads: 'Baru'
            };

            books.unshift(newBook);
            localStorage.setItem('bunga_tembok_v5_books', JSON.stringify(books));
            toggleAddModal(false);
            e.target.reset();
            renderBooks();
            showToast('Buku baru berhasil ditambahkan ke database.');
        }

        function deleteBook(id) {
            if (confirm('Yakin ingin menghapus buku ini dari sistem?')) {
                books = books.filter(b => b.id !== id);
                localStorage.setItem('bunga_tembok_v5_books', JSON.stringify(books));
                renderBooks();
                showToast('Buku berhasil dihapus dari sistem.');
            }
        }

        checkAuth();
    </script>
</body>
</html>