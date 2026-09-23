<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Header Page Banner -->
<section class="bg-laut-bugis text-kabut-biru py-12 border-b-2 border-sutra-emas">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="text-xs font-bold uppercase tracking-widest text-sutra-emas">Kuliner Otentik Makassar</span>
        <h1 class="font-display font-extrabold text-3xl sm:text-4xl text-kabut-biru">Daftar Menu Coto Purnomo</h1>
        <p class="text-xs sm:text-sm text-kabut-biru/80 max-w-xl mx-auto font-light">
            Temukan aneka varian Coto Makassar, pencuci mulut tradisional, dan pendamping buras gurih.
        </p>
    </div>
</section>

<!-- Filter & Sorting Bar -->
<section class="py-8 bg-kertas-lontar border-b border-sutra-emas/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-4">
        
        <!-- Category Filter Pills -->
        <div class="flex flex-wrap items-center gap-2">
            <a href="<?= base_url('/menu?sort=' . esc($currentSort)) ?>" class="px-4 py-2 text-xs font-bold rounded-lg transition-all <?= empty($currentCategory) ? 'bg-coto-orange text-white shadow-md' : 'bg-white text-tinta hover:bg-white/80 border border-sutra-emas/40' ?>">
                Semua Kategori
            </a>
            <a href="<?= base_url('/menu?category=coto&sort=' . esc($currentSort)) ?>" class="px-4 py-2 text-xs font-bold rounded-lg transition-all <?= $currentCategory === 'coto' ? 'bg-coto-orange text-white shadow-md' : 'bg-white text-tinta hover:bg-white/80 border border-sutra-emas/40' ?>">
                🍲 Coto Makassar
            </a>
            <a href="<?= base_url('/menu?category=minuman&sort=' . esc($currentSort)) ?>" class="px-4 py-2 text-xs font-bold rounded-lg transition-all <?= $currentCategory === 'minuman' ? 'bg-coto-orange text-white shadow-md' : 'bg-white text-tinta hover:bg-white/80 border border-sutra-emas/40' ?>">
                🍹 Minuman Segar
            </a>
            <a href="<?= base_url('/menu?category=pelengkap&sort=' . esc($currentSort)) ?>" class="px-4 py-2 text-xs font-bold rounded-lg transition-all <?= $currentCategory === 'pelengkap' ? 'bg-coto-orange text-white shadow-md' : 'bg-white text-tinta hover:bg-white/80 border border-sutra-emas/40' ?>">
                🍃 Pelengkap Buras
            </a>
        </div>

        <!-- Sorting Feature Dropdown -->
        <form method="GET" action="<?= base_url('/menu') ?>" class="flex items-center space-x-3 w-full md:w-auto justify-end">
            <?php if (!empty($currentCategory)): ?>
                <input type="hidden" name="category" value="<?= esc($currentCategory) ?>">
            <?php endif; ?>

            <label for="sort" class="text-xs font-bold text-tinta whitespace-nowrap flex items-center space-x-1">
                <svg class="w-4 h-4 text-coto-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/></svg>
                <span>Urutkan:</span>
            </label>

            <select id="sort" name="sort" onchange="this.form.submit()" class="bg-white border-2 border-sutra-emas text-tinta text-xs font-semibold rounded-lg px-4 py-2.5 focus:outline-none focus:border-coto-orange shadow-sm">
                <option value="" <?= empty($currentSort) ? 'selected' : '' ?>>Default (Terbaru)</option>
                <option value="harga_asc" <?= $currentSort === 'harga_asc' ? 'selected' : '' ?>>Harga: Termurah &rarr; Termahal</option>
                <option value="harga_desc" <?= $currentSort === 'harga_desc' ? 'selected' : '' ?>>Harga: Termahal &rarr; Termurah</option>
                <option value="nama_asc" <?= $currentSort === 'nama_asc' ? 'selected' : '' ?>>Nama Makanan (A &ndash; Z)</option>
            </select>
        </form>
    </div>
</section>

<!-- Menu Items Grid -->
<section class="py-12 bg-kertas-lontar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <?php if (empty($menus)): ?>
            <!-- Empty State -->
            <div class="max-w-md mx-auto text-center py-16 px-6 bg-white border-2 border-dashed border-sutra-emas rounded-3xl">
                <div class="w-16 h-16 bg-coto-orange/10 text-coto-orange text-3xl flex items-center justify-center rounded-full mx-auto mb-4">🍲</div>
                <h3 class="font-display font-bold text-xl text-tinta">Belum Ada Menu</h3>
                <p class="text-xs text-tinta/70 mt-2">Belum ada varian makanan pada kategori ini.</p>
                <a href="<?= base_url('/menu') ?>" class="inline-block mt-4 px-4 py-2 bg-laut-bugis text-kabut-biru text-xs font-bold rounded-lg hover:bg-coto-orange transition-colors">
                    Lihat Semua Menu
                </a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <?php foreach ($menus as $item): ?>
                    <div class="bg-white border-2 border-sutra-emas/40 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group flex flex-col justify-between hover:border-coto-orange">
                        <div>
                            <!-- Image Frame -->
                            <div class="relative h-52 overflow-hidden bg-laut-bugis">
                                <img src="<?= base_url('uploads/' . $item['gambar']) ?>" alt="<?= esc($item['nama_makanan']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <span class="absolute top-3 right-3 px-3 py-1 bg-laut-bugis/90 text-sutra-emas text-[10px] font-bold uppercase tracking-wider rounded-full border border-sutra-emas">
                                    <?= esc(ucfirst($item['kategori'])) ?>
                                </span>
                            </div>

                            <!-- Content -->
                            <div class="p-6 space-y-2">
                                <h3 class="font-display font-bold text-lg text-tinta group-hover:text-coto-orange transition-colors">
                                    <?= esc($item['nama_makanan']) ?>
                                </h3>
                                <p class="text-xs text-tinta/70 leading-relaxed line-clamp-3 font-light">
                                    <?= esc($item['deskripsi']) ?>
                                </p>
                            </div>
                        </div>

                        <!-- Footer / Price / Action -->
                        <div class="p-6 pt-0 border-t border-gray-100 mt-4 flex items-center justify-between">
                            <div>
                                <span class="text-[10px] text-tinta/50 block font-semibold">Harga Porsi</span>
                                <span class="font-display font-bold text-base text-coto-orange">
                                    Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                                </span>
                            </div>
                            <a href="<?= base_url('/menu/' . $item['id']) ?>" class="px-4 py-2 bg-laut-bugis text-kabut-biru hover:bg-coto-orange text-xs font-bold rounded-lg transition-colors flex items-center space-x-1">
                                <span>Detail</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</section>

<?= $this->endSection() ?>
