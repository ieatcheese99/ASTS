<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Detail Menu Section -->
<section class="py-12 bg-kertas-lontar">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb / Back Button -->
        <a href="<?= base_url('/menu') ?>" class="inline-flex items-center space-x-2 text-xs font-bold text-laut-bugis hover:text-coto-orange transition-colors mb-6">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Kembali ke Daftar Menu</span>
        </a>

        <!-- Card Container -->
        <div class="bg-white border-2 border-sutra-emas rounded-3xl shadow-xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 gap-0">
            
            <!-- Left: Image Showcase -->
            <div class="lg:col-span-6 bg-laut-bugis relative min-h-[320px] lg:min-h-[450px]">
                <img src="<?= base_url('uploads/' . $menu['gambar']) ?>" alt="<?= esc($menu['nama_makanan']) ?>" class="w-full h-full object-cover">
                <span class="absolute top-4 left-4 px-4 py-1.5 bg-laut-bugis/90 text-sutra-emas text-xs font-bold uppercase tracking-wider rounded-full border border-sutra-emas">
                    <?= esc(ucfirst($menu['kategori'])) ?>
                </span>
            </div>

            <!-- Right: Content Information -->
            <div class="lg:col-span-6 p-8 sm:p-12 flex flex-col justify-between space-y-6">
                <div class="space-y-4">
                    <div class="inline-block px-3 py-1 bg-coto-orange/10 border border-coto-orange/30 text-coto-orange text-xs font-bold uppercase rounded-md">
                        Resep Heritage Purnomo
                    </div>
                    
                    <h1 class="font-display font-extrabold text-3xl sm:text-4xl text-tinta">
                        <?= esc($menu['nama_makanan']) ?>
                    </h1>

                    <div class="flex items-baseline space-x-3">
                        <span class="font-display font-bold text-3xl text-coto-orange">
                            Rp <?= number_format($menu['harga'], 0, ',', '.') ?>
                        </span>
                        <span class="text-xs text-tinta/60 font-medium">/ porsi</span>
                    </div>

                    <div class="w-full h-px bg-sutra-emas/30 my-4"></div>

                    <p class="text-sm text-tinta/80 leading-relaxed font-light">
                        <?= esc($menu['deskripsi']) ?>
                    </p>

                    <!-- Key Ingredients / Information -->
                    <div class="pt-4 space-y-2">
                        <h4 class="font-display font-bold text-xs uppercase tracking-widest text-sutra-emas">Bahan &amp; Racikan Utama</h4>
                        <div class="flex flex-wrap gap-2 text-xs">
                            <span class="px-3 py-1 bg-kertas-lontar text-tinta rounded-lg border border-sutra-emas/40 font-medium">🌿 40 Rempah Alami</span>
                            <span class="px-3 py-1 bg-kertas-lontar text-tinta rounded-lg border border-sutra-emas/40 font-medium">🥩 Daging Sapi Lokal</span>
                            <span class="px-3 py-1 bg-kertas-lontar text-tinta rounded-lg border border-sutra-emas/40 font-medium">🥜 Sangrai Kacang Tanah</span>
                            <span class="px-3 py-1 bg-kertas-lontar text-tinta rounded-lg border border-sutra-emas/40 font-medium">🍲 Kuah Kaldu Tajin</span>
                        </div>
                    </div>
                </div>

                <!-- CTA Actions -->
                <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/6281234567890?text=Halo%20Purnomo%20Coto%20Makassar,%20saya%20ingin%20pesan%20<?= urlencode($menu['nama_makanan']) ?>" target="_blank" class="flex-1 py-3.5 px-6 bg-coto-orange text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-lg hover:bg-orange-700 transition-all text-center flex items-center justify-center space-x-2">
                        <span>Pesan via WhatsApp</span>
                    </a>
                    <a href="<?= base_url('/menu') ?>" class="py-3.5 px-6 bg-laut-bugis text-kabut-biru font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-laut-bugis/90 transition-all text-center">
                        Lihat Menu Lain
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

<?= $this->endSection() ?>
