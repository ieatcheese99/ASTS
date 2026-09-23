<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- HERO SECTION -->
<section class="relative bg-laut-bugis text-kabut-biru overflow-hidden py-16 md:py-24 border-b-4 border-sutra-emas">
    <!-- Phinisi Silhouette Background Watermark -->
    <div class="absolute right-0 top-1/2 -translate-y-1/2 opacity-10 pointer-events-none select-none max-w-lg">
        <img src="<?= base_url('assets/logo.png') ?>" alt="Phinisi Watermark" class="w-96 h-96 object-contain filter brightness-200">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <!-- Left Column: Copywriting & CTA -->
        <div class="lg:col-span-7 space-y-6">
            <div class="inline-flex items-center space-x-2 px-3 py-1 bg-coto-orange/20 border border-coto-orange/40 rounded-full text-coto-orange text-xs font-bold uppercase tracking-wider">
                <span class="w-2 h-2 rounded-full bg-coto-orange animate-ping"></span>
                <span>Warisan Kuliner Sulawesi Selatan</span>
            </div>

            <h1 class="font-display font-extrabold text-4xl sm:text-5xl lg:text-6xl text-kabut-biru leading-tight">
                Keharuman 40 Rempah dalam Semangkuk <span class="text-coto-orange">Coto Makassar</span>
            </h1>

            <p class="text-base sm:text-lg text-kabut-biru/80 leading-relaxed max-w-2xl font-light">
                Selamat datang di <strong class="text-sutra-emas font-semibold">Purnomo Coto Makassar</strong>. Kami menyajikan citarasa otentik tanah Daeng yang dimasak dalam kuali tanah liat dengan bumbu warisan leluhur Bugis.
            </p>

            <div class="flex flex-wrap items-center gap-4 pt-4">
                <a href="<?= base_url('/menu') ?>" class="px-8 py-4 bg-coto-orange text-white font-bold text-sm uppercase tracking-widest rounded-lg shadow-xl hover:bg-orange-700 hover:scale-105 transition-all flex items-center space-x-3">
                    <span>Jelajahi Menu Kami</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <a href="#cerita" class="px-6 py-4 bg-laut-bugis border border-sutra-emas text-sutra-emas font-semibold text-sm rounded-lg hover:bg-sutra-emas/10 transition-colors">
                    Baca Cerita Kami
                </a>
            </div>

            <!-- Heritage Badge -->
            <div class="pt-6 border-t border-laut-bugis/60 flex items-center space-x-8 text-xs text-kabut-biru/70">
                <div>
                    <span class="block font-display font-bold text-lg text-sutra-emas">40+</span>
                    <span>Jenis Rempah Alami</span>
                </div>
                <div class="h-8 w-px bg-sutra-emas/30"></div>
                <div>
                    <span class="block font-display font-bold text-lg text-sutra-emas">100%</span>
                    <span>Resep Asli Makassar</span>
                </div>
                <div class="h-8 w-px bg-sutra-emas/30"></div>
                <div>
                    <span class="block font-display font-bold text-lg text-sutra-emas">Empuk</span>
                    <span>Daging Sapi Pilihan</span>
                </div>
            </div>
        </div>

        <!-- Right Column: Hero Image Frame -->
        <div class="lg:col-span-5 relative">
            <div class="relative mx-auto max-w-md lg:max-w-none">
                <div class="absolute -inset-2 bg-gradient-to-r from-coto-orange to-sutra-emas rounded-2xl blur-lg opacity-40"></div>
                <div class="relative bg-laut-bugis border-2 border-sutra-emas p-3 rounded-2xl shadow-2xl">
                    <img src="<?= base_url('uploads/coto_makassar.jpg') ?>" alt="Semangkuk Coto Makassar Purnomo" class="w-full h-80 sm:h-96 object-cover rounded-xl">
                    <div class="absolute bottom-6 left-6 right-6 bg-laut-bugis/90 backdrop-blur border border-sutra-emas/50 p-4 rounded-xl text-center">
                        <p class="font-display text-sm font-bold text-sutra-emas">Coto Daging Sapi Khasiat Rempah</p>
                        <p class="text-xs text-kabut-biru/80 font-light mt-0.5">Disajikan hangat bersama Buras &amp; Ketupat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MARQUEE MENU UNGGULAN (Pure CSS Animation) -->
<section class="bg-laut-bugis/95 border-b border-sutra-emas/30 py-6 overflow-hidden relative">
    <div class="max-w-7xl mx-auto px-4 mb-3 flex items-center justify-between">
        <span class="text-xs font-bold uppercase tracking-widest text-sutra-emas flex items-center space-x-2">
            <span class="w-2 h-2 rounded-full bg-coto-orange"></span>
            <span>Menu Unggulan Berjalan (Marquee)</span>
        </span>
        <span class="text-[11px] text-kabut-biru/60 hidden sm:inline">Arahkan kursor untuk menghentikan animasi</span>
    </div>

    <!-- Gradient Edge Masks -->
    <div class="absolute left-0 top-0 bottom-0 w-16 bg-gradient-to-r from-laut-bugis to-transparent z-10 pointer-events-none"></div>
    <div class="absolute right-0 top-0 bottom-0 w-16 bg-gradient-to-l from-laut-bugis to-transparent z-10 pointer-events-none"></div>

    <!-- Marquee Track -->
    <div class="flex whitespace-nowrap overflow-hidden">
        <div class="flex animate-marquee space-x-6 marquee-track py-2">
            <?php 
            // Duplicate array to ensure seamless infinite marquee loop
            $marqueeItems = array_merge($menus, $menus); 
            foreach ($marqueeItems as $item): 
            ?>
                <a href="<?= base_url('/menu/' . $item['id']) ?>" class="inline-flex items-center space-x-4 bg-laut-bugis border border-sutra-emas/40 px-5 py-3 rounded-xl hover:border-coto-orange hover:bg-laut-bugis/80 transition-all flex-shrink-0 group">
                    <img src="<?= base_url('uploads/' . $item['gambar']) ?>" alt="<?= esc($item['nama_makanan']) ?>" class="w-14 h-14 object-cover rounded-lg border border-sutra-emas/50 group-hover:scale-105 transition-transform">
                    <div>
                        <p class="font-display font-bold text-sm text-kabut-biru group-hover:text-coto-orange transition-colors"><?= esc($item['nama_makanan']) ?></p>
                        <p class="text-xs text-sutra-emas font-semibold mt-0.5">Rp <?= number_format($item['harga'], 0, ',', '.') ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION CERITA KAMI -->
<section id="cerita" class="py-20 bg-kertas-lontar relative">
    <!-- Lontara Background Watermark Pattern -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center space-y-6">
            <span class="text-coto-orange font-bold text-xs uppercase tracking-widest">Filosofi &amp; Tradisi</span>
            <h2 class="font-display text-3xl sm:text-4xl text-tinta font-bold">
                Cerita di Balik Kelezatan Coto Purnomo
            </h2>
            <div class="w-16 h-1 bg-sutra-emas mx-auto rounded-full"></div>
            <p class="text-tinta/80 text-sm sm:text-base leading-relaxed font-normal">
                Coto Makassar bukan sekadar hidangan sup daging biasa. Pada masa Kerajaan Gowa-Tallo, Coto dibuat khusus dari racikan 40 jenis rempah (Pasa' Pa'timang-timang) yang menyimbolkan keharmonisan alam dan budaya Sulawesi Selatan.
            </p>
            <p class="text-tinta/80 text-sm sm:text-base leading-relaxed font-normal">
                Di <strong class="text-coto-orange font-semibold">Purnomo</strong>, kami mempertahankan metode tradisional memasak menggunakan kuali tanah liat (gumba) dan kayu bakar agar keharuman rempah kacang meresap hingga ke serat daging sapi terbaik.
            </p>
        </div>
    </div>
</section>

<!-- SECTION KEUNGGULAN -->
<section class="py-16 bg-laut-bugis text-kabut-biru border-y-2 border-sutra-emas">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="font-display text-3xl font-bold text-kabut-biru">Mengapa Memilih Coto Purnomo?</h2>
            <p class="text-xs text-sutra-emas tracking-widest uppercase mt-2">Komitmen Kualitas &amp; Otentisitas Rasa</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Poin 1 -->
            <div class="bg-laut-bugis/90 border border-sutra-emas/40 p-8 rounded-2xl space-y-4 hover:border-coto-orange transition-all">
                <div class="w-12 h-12 bg-coto-orange/20 border border-coto-orange text-coto-orange flex items-center justify-center rounded-xl font-display font-bold text-xl">
                    40
                </div>
                <h3 class="font-display font-bold text-xl text-sutra-emas">40 Jenis Rempah Tradisional</h3>
                <p class="text-xs text-kabut-biru/80 leading-relaxed font-light">
                    Kombinasi ketumbar, jintan, pala, cengkeh, lengkuas, serai, hingga kacang tanah sangrai menghasilkan aroma kuah pekat yang kaya khasiat.
                </p>
            </div>

            <!-- Poin 2 -->
            <div class="bg-laut-bugis/90 border border-sutra-emas/40 p-8 rounded-2xl space-y-4 hover:border-coto-orange transition-all">
                <div class="w-12 h-12 bg-sutra-emas/20 border border-sutra-emas text-sutra-emas flex items-center justify-center rounded-xl font-display font-bold text-xl">
                    🥩
                </div>
                <h3 class="font-display font-bold text-xl text-sutra-emas">Daging Sapi Segar Pilihan</h3>
                <p class="text-xs text-kabut-biru/80 leading-relaxed font-light">
                    Menggunakan potongan daging lokal segar yang direbus perlahan dengan air cucian beras (tajin) untuk tekstur yang super empuk.
                </p>
            </div>

            <!-- Poin 3 -->
            <div class="bg-laut-bugis/90 border border-sutra-emas/40 p-8 rounded-2xl space-y-4 hover:border-coto-orange transition-all">
                <div class="w-12 h-12 bg-coto-orange/20 border border-coto-orange text-coto-orange flex items-center justify-center rounded-xl font-display font-bold text-xl">
                    🍃
                </div>
                <h3 class="font-display font-bold text-xl text-sutra-emas">Pelengkap Asli Buras &amp; Ketupat</h3>
                <p class="text-xs text-kabut-biru/80 leading-relaxed font-light">
                    Disajikan lengkap bersama Buras santan bermasak daun pisang dan ketupat janur segar serta sambal tauco khas Makassar.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SECTION GALERI & SHOWCASE -->
<section class="py-20 bg-kertas-lontar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="text-coto-orange font-bold text-xs uppercase tracking-widest">Sajian Kuliner</span>
                <h2 class="font-display text-3xl sm:text-4xl text-tinta font-bold mt-1">Galeri &amp; Varian Favorit</h2>
            </div>
            <a href="<?= base_url('/menu') ?>" class="mt-4 md:mt-0 text-sm font-bold text-coto-orange hover:text-orange-700 flex items-center space-x-1">
                <span>Lihat Semua Menu (<?= count($menus) ?> Item)</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <!-- Menu Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach (array_slice($menus, 0, 4) as $item): ?>
                <div class="bg-white border border-sutra-emas/40 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all group flex flex-col justify-between">
                    <div>
                        <div class="relative h-48 overflow-hidden">
                            <img src="<?= base_url('uploads/' . $item['gambar']) ?>" alt="<?= esc($item['nama_makanan']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-3 right-3 px-3 py-1 bg-laut-bugis text-sutra-emas text-[10px] font-bold uppercase rounded-full border border-sutra-emas">
                                <?= esc(ucfirst($item['kategori'])) ?>
                            </span>
                        </div>
                        <div class="p-5">
                            <h3 class="font-display font-bold text-lg text-tinta group-hover:text-coto-orange transition-colors">
                                <?= esc($item['nama_makanan']) ?>
                            </h3>
                            <p class="text-xs text-tinta/70 mt-2 line-clamp-2 leading-relaxed">
                                <?= esc($item['deskripsi']) ?>
                            </p>
                        </div>
                    </div>
                    <div class="p-5 pt-0 flex items-center justify-between border-t border-gray-100 mt-4">
                        <span class="font-display font-bold text-base text-coto-orange">
                            Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                        </span>
                        <a href="<?= base_url('/menu/' . $item['id']) ?>" class="px-3 py-1.5 bg-laut-bugis text-kabut-biru hover:bg-coto-orange text-xs font-semibold rounded-lg transition-colors">
                            Detail
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION TESTIMONI -->
<section class="py-16 bg-laut-bugis text-kabut-biru border-t-2 border-sutra-emas">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
        <span class="text-sutra-emas font-bold text-xs uppercase tracking-widest">Kutipan Pelanggan</span>
        <h2 class="font-display text-3xl font-bold text-kabut-biru">Apa Kata Penikmat Coto Purnomo?</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
            <div class="bg-laut-bugis/90 border border-sutra-emas/40 p-6 rounded-2xl relative">
                <p class="text-xs sm:text-sm text-kabut-biru/90 italic leading-relaxed">
                    "Kuah kacangnya kental gurih, bumbu rempahnya sangat berasa tapi pas di lidah. Daging iganya empuk banget disajikan hangat sama Buras!"
                </p>
                <div class="mt-4 pt-4 border-t border-sutra-emas/20 flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-coto-orange text-white flex items-center justify-center font-bold text-xs">AH</div>
                    <div>
                        <p class="text-xs font-bold text-sutra-emas">Andi Hassanuddin</p>
                        <p class="text-[10px] text-kabut-biru/60">Pengunjung Asal Makassar</p>
                    </div>
                </div>
            </div>

            <div class="bg-laut-bugis/90 border border-sutra-emas/40 p-6 rounded-2xl relative">
                <p class="text-xs sm:text-sm text-kabut-biru/90 italic leading-relaxed">
                    "Es Palu Butung sama Es Pisang Ijonya seger banget abis makan coto pedes. Tempatnya bersih dan nuansa heritage Bugisnya berasa!"
                </p>
                <div class="mt-4 pt-4 border-t border-sutra-emas/20 flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-sutra-emas text-laut-bugis flex items-center justify-center font-bold text-xs">NR</div>
                    <div>
                        <p class="text-xs font-bold text-sutra-emas">Nurul Rahmadani</p>
                        <p class="text-[10px] text-kabut-biru/60">Kuliner Enthusiast</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION LOKASI & KONTAK -->
<section id="lokasi" class="py-20 bg-kertas-lontar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white border-2 border-sutra-emas rounded-3xl p-8 sm:p-12 shadow-xl grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-7 space-y-4">
                <span class="text-coto-orange font-bold text-xs uppercase tracking-widest">Kunjungi Kami</span>
                <h2 class="font-display text-3xl font-bold text-tinta">Restoran Purnomo Coto Makassar</h2>
                <p class="text-sm text-tinta/80 leading-relaxed font-light">
                    Kunjungi kedai kami di pusat kuliner Makassar atau hubungi untuk pemesanan rombongan &amp; katering acara.
                </p>
                <div class="space-y-3 pt-2 text-xs text-tinta/90 font-medium">
                    <div class="flex items-center space-x-3">
                        <span class="p-2 bg-coto-orange/10 text-coto-orange rounded-lg">📍</span>
                        <span>Jl. Somba Opu No. 88, Somba Opu, Kota Makassar, Sulawesi Selatan</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="p-2 bg-coto-orange/10 text-coto-orange rounded-lg">⏰</span>
                        <span>Setiap Hari: 08.00 – 22.00 WITA</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="p-2 bg-coto-orange/10 text-coto-orange rounded-lg">📞</span>
                        <span>WhatsApp Pemesanan: +62 812-3456-7890</span>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-5 flex justify-center">
                <a href="https://wa.me/6281234567890" target="_blank" class="w-full sm:w-auto px-8 py-5 bg-emerald-600 text-white font-bold text-sm uppercase tracking-wider rounded-2xl shadow-xl hover:bg-emerald-700 transition-all flex items-center justify-center space-x-3 text-center">
                    <span>Chat WhatsApp Sekarang</span>
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
