<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Purnomo — Coto Makassar Heritage') ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400..900;1,9..144,400..900&family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'coto-orange': '#EA580C',
                        'laut-bugis': '#172554',
                        'kertas-lontar': '#F1E7D3',
                        'sutra-emas': '#C9A227',
                        'tinta': '#241C15',
                        'kabut-biru': '#EFF3FA',
                    },
                    fontFamily: {
                        display: ['Fraunces', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    animation: {
                        'marquee': 'marquee 25s linear infinite',
                    },
                    keyframes: {
                        marquee: {
                            '0%': { transform: 'translateX(0%)' },
                            '100%': { transform: 'translateX(-50%)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F1E7D3;
            color: #241C15;
        }
        h1, h2, h3, .font-serif-title {
            font-family: 'Fraunces', serif;
        }
        .marquee-track:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-kertas-lontar text-tinta flex flex-col min-h-screen selection:bg-coto-orange selection:text-white">

    <!-- Header / Navbar -->
    <header class="sticky top-0 z-50 bg-laut-bugis/95 backdrop-blur border-b-2 border-sutra-emas shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Logo & Brand Name -->
            <a href="<?= base_url('/') ?>" class="flex items-center space-x-3 group">
                <img src="<?= base_url('assets/logo.png') ?>" alt="Logo Purnomo Coto Makassar" class="w-12 h-12 rounded-full border-2 border-sutra-emas transition-transform group-hover:scale-105">
                <div>
                    <span class="font-display font-bold text-2xl tracking-wide text-kabut-biru group-hover:text-coto-orange transition-colors">PURNOMO</span>
                    <span class="block text-[10px] text-sutra-emas tracking-widest uppercase font-semibold">Coto Makassar Heritage</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="<?= base_url('/') ?>" class="text-kabut-biru hover:text-coto-orange font-medium transition-colors text-sm tracking-wide">Beranda</a>
                <a href="<?= base_url('/menu') ?>" class="text-kabut-biru hover:text-coto-orange font-medium transition-colors text-sm tracking-wide">Daftar Menu</a>
                <a href="<?= base_url('/#cerita') ?>" class="text-kabut-biru hover:text-coto-orange font-medium transition-colors text-sm tracking-wide">Cerita Kami</a>
                <a href="<?= base_url('/#lokasi') ?>" class="text-kabut-biru hover:text-coto-orange font-medium transition-colors text-sm tracking-wide">Lokasi &amp; Kontak</a>
            </nav>

            <!-- Action Button / Auth -->
            <div class="flex items-center space-x-4">
                <?php if (session()->get('isLoggedIn')): ?>
                    <a href="<?= base_url('/admin/dashboard') ?>" class="px-4 py-2 bg-sutra-emas text-laut-bugis text-xs font-bold uppercase tracking-wider rounded shadow hover:bg-yellow-400 transition-all">Dashboard Admin</a>
                    <a href="<?= base_url('/logout') ?>" class="text-red-400 hover:text-red-300 text-xs font-medium underline">Keluar</a>
                <?php else: ?>
                    <a href="<?= base_url('/menu') ?>" class="px-5 py-2.5 bg-coto-orange text-white text-xs font-bold uppercase tracking-wider rounded-md shadow-md hover:bg-orange-700 transition-all flex items-center space-x-2">
                        <span>Pesan Coto</span>
                    </a>
                    <a href="<?= base_url('/login') ?>" class="text-kabut-biru/70 hover:text-sutra-emas text-xs font-medium tracking-wide">Admin</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Flash Messages -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-4">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="p-4 bg-emerald-900/90 border-l-4 border-emerald-400 text-emerald-100 text-sm rounded shadow mb-4 flex items-center justify-between">
                <span><?= session()->getFlashdata('success') ?></span>
                <button onclick="this.parentElement.remove()" class="text-emerald-300 hover:text-white font-bold">&times;</button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="p-4 bg-red-950/90 border-l-4 border-coto-orange text-red-100 text-sm rounded shadow mb-4 flex items-center justify-between">
                <span><?= session()->getFlashdata('error') ?></span>
                <button onclick="this.parentElement.remove()" class="text-red-300 hover:text-white font-bold">&times;</button>
            </div>
        <?php endif; ?>
    </div>

    <!-- Main Content Body -->
    <main class="flex-grow">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-laut-bugis text-kabut-biru border-t-4 border-sutra-emas mt-16 pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8 pb-8 border-b border-laut-bugis/50">
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <img src="<?= base_url('assets/logo.png') ?>" alt="Logo Purnomo" class="w-10 h-10 rounded-full border border-sutra-emas">
                    <span class="font-display font-bold text-xl text-kabut-biru">PURNOMO</span>
                </div>
                <p class="text-xs text-kabut-biru/70 leading-relaxed mb-4">
                    Warisan rasa authentic Coto Makassar khas Sulawesi Selatan. Dibuat dengan 40 jenis rempah tradisional turun-temurun.
                </p>
                <span class="inline-block px-3 py-1 bg-coto-orange/20 text-coto-orange border border-coto-orange/30 text-[11px] font-semibold rounded">
                    Siswa: Zabdan Harjati Purnomo (No. Absen 24)
                </span>
            </div>

            <div>
                <h4 class="font-display font-semibold text-sutra-emas text-base mb-4 tracking-wider">Navigasi Cepat</h4>
                <ul class="space-y-2 text-xs text-kabut-biru/80">
                    <li><a href="<?= base_url('/') ?>" class="hover:text-coto-orange transition-colors">Beranda</a></li>
                    <li><a href="<?= base_url('/menu') ?>" class="hover:text-coto-orange transition-colors">Daftar Menu &amp; Sorting</a></li>
                    <li><a href="<?= base_url('/#cerita') ?>" class="hover:text-coto-orange transition-colors">Cerita Tradisi Bugis</a></li>
                    <li><a href="<?= base_url('/login') ?>" class="hover:text-coto-orange transition-colors">Portal Admin Restaurant</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-display font-semibold text-sutra-emas text-base mb-4 tracking-wider">Jam Operasional &amp; Alamat</h4>
                <p class="text-xs text-kabut-biru/80 mb-2">📍 Jl. Somba Opu No. 88, Somba Opu, Makassar</p>
                <p class="text-xs text-kabut-biru/80 mb-2">⏰ Buka Setiap Hari: 08.00 - 22.00 WITA</p>
                <p class="text-xs text-kabut-biru/80">📞 Reservasi / WhatsApp: +62 812-3456-7890</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 text-center text-xs text-kabut-biru/50 flex flex-col md:flex-row justify-between items-center space-y-2 md:space-y-0">
            <p>&copy; <?= date('Y') ?> Purnomo Coto Makassar. Hak Cipta Dilindungi.</p>
            <p class="text-[11px] text-sutra-emas/80">Ujian Praktik On The Spot Coding — CodeIgniter 4 + Tailwind CSS</p>
        </div>
    </footer>

</body>
</html>
