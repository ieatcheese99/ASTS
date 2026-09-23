<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="py-12 bg-kertas-lontar">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Back Link -->
        <a href="<?= base_url('/admin/dashboard') ?>" class="inline-flex items-center space-x-2 text-xs font-bold text-laut-bugis hover:text-coto-orange transition-colors mb-6">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            <span>Kembali ke Dashboard Admin</span>
        </a>

        <!-- Form Card -->
        <div class="bg-white border-2 border-sutra-emas rounded-3xl p-8 sm:p-10 shadow-2xl space-y-6">
            
            <div class="border-b border-sutra-emas/30 pb-4">
                <span class="text-xs font-bold text-coto-orange uppercase tracking-wider">Form Data Menu</span>
                <h1 class="font-display font-extrabold text-2xl text-laut-bugis mt-0.5">
                    <?= isset($menu) ? 'Edit Menu: ' . esc($menu['nama_makanan']) : 'Tambah Menu Baru' ?>
                </h1>
            </div>

            <?php 
                $errors = session()->getFlashdata('errors') ?? [];
                $actionUrl = isset($menu) ? base_url('/admin/update/' . $menu['id']) : base_url('/admin/store');
            ?>

            <form action="<?= $actionUrl ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                <?= csrf_field() ?>

                <!-- Field 1: Nama Makanan -->
                <div>
                    <label for="nama_makanan" class="block text-xs font-bold text-laut-bugis uppercase tracking-wider mb-2">Nama Makanan *</label>
                    <input type="text" id="nama_makanan" name="nama_makanan" value="<?= old('nama_makanan', $menu['nama_makanan'] ?? '') ?>" required class="w-full px-4 py-3 bg-kertas-lontar/40 border-2 <?= isset($errors['nama_makanan']) ? 'border-coto-orange' : 'border-sutra-emas/60' ?> rounded-xl text-tinta text-sm font-semibold focus:outline-none focus:border-coto-orange transition-colors" placeholder="Contoh: Coto Daging Sapi Special">
                    
                    <!-- Inline Error Display -->
                    <?php if (isset($errors['nama_makanan'])): ?>
                        <p class="text-xs text-laut-bugis font-bold mt-1.5 flex items-center space-x-1.5">
                            <span class="text-coto-orange">⚠️</span>
                            <span><?= esc($errors['nama_makanan']) ?></span>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Field 2: Deskripsi Makanan -->
                <div>
                    <label for="deskripsi" class="block text-xs font-bold text-laut-bugis uppercase tracking-wider mb-2">Deskripsi Makanan *</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" required class="w-full px-4 py-3 bg-kertas-lontar/40 border-2 <?= isset($errors['deskripsi']) ? 'border-coto-orange' : 'border-sutra-emas/60' ?> rounded-xl text-tinta text-sm font-normal focus:outline-none focus:border-coto-orange transition-colors" placeholder="Jelaskan cita rasa, racikan rempah, dan keunggulan menu ini..."><?= old('deskripsi', $menu['deskripsi'] ?? '') ?></textarea>
                    
                    <!-- Inline Error Display -->
                    <?php if (isset($errors['deskripsi'])): ?>
                        <p class="text-xs text-laut-bugis font-bold mt-1.5 flex items-center space-x-1.5">
                            <span class="text-coto-orange">⚠️</span>
                            <span><?= esc($errors['deskripsi']) ?></span>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Field Grid: Harga & Kategori -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Field 3: Harga -->
                    <div>
                        <label for="harga" class="block text-xs font-bold text-laut-bugis uppercase tracking-wider mb-2">Harga (Rupiah) *</label>
                        <input type="number" step="0.01" id="harga" name="harga" value="<?= old('harga', $menu['harga'] ?? '') ?>" required class="w-full px-4 py-3 bg-kertas-lontar/40 border-2 <?= isset($errors['harga']) ? 'border-coto-orange' : 'border-sutra-emas/60' ?> rounded-xl text-tinta text-sm font-semibold focus:outline-none focus:border-coto-orange transition-colors" placeholder="35000">
                        
                        <!-- Inline Error Display -->
                        <?php if (isset($errors['harga'])): ?>
                            <p class="text-xs text-laut-bugis font-bold mt-1.5 flex items-center space-x-1.5">
                                <span class="text-coto-orange">⚠️</span>
                                <span><?= esc($errors['harga']) ?></span>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Field 4: Kategori -->
                    <div>
                        <label for="kategori" class="block text-xs font-bold text-laut-bugis uppercase tracking-wider mb-2">Kategori Menu *</label>
                        <select id="kategori" name="kategori" required class="w-full px-4 py-3 bg-kertas-lontar/40 border-2 <?= isset($errors['kategori']) ? 'border-coto-orange' : 'border-sutra-emas/60' ?> rounded-xl text-tinta text-sm font-semibold focus:outline-none focus:border-coto-orange transition-colors">
                            <?php $selectedKat = old('kategori', $menu['kategori'] ?? 'coto'); ?>
                            <option value="coto" <?= $selectedKat === 'coto' ? 'selected' : '' ?>>🍲 Coto Makassar</option>
                            <option value="minuman" <?= $selectedKat === 'minuman' ? 'selected' : '' ?>>🍹 Minuman</option>
                            <option value="pelengkap" <?= $selectedKat === 'pelengkap' ? 'selected' : '' ?>>🍃 Pelengkap Buras</option>
                        </select>

                        <!-- Inline Error Display -->
                        <?php if (isset($errors['kategori'])): ?>
                            <p class="text-xs text-laut-bugis font-bold mt-1.5 flex items-center space-x-1.5">
                                <span class="text-coto-orange">⚠️</span>
                                <span><?= esc($errors['kategori']) ?></span>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Field 5: Upload Gambar -->
                <div>
                    <label for="gambar" class="block text-xs font-bold text-laut-bugis uppercase tracking-wider mb-2">
                        Foto Menu <?= isset($menu) ? '(Opsional: Upload jika ingin mengganti)' : '*' ?>
                    </label>
                    <input type="file" id="gambar" name="gambar" accept="image/*" <?= isset($menu) ? '' : 'required' ?> class="w-full px-4 py-2.5 bg-kertas-lontar/40 border-2 <?= isset($errors['gambar']) ? 'border-coto-orange' : 'border-sutra-emas/60' ?> rounded-xl text-tinta text-xs focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-laut-bugis file:text-kabut-biru hover:file:bg-coto-orange transition-all">
                    
                    <?php if (isset($menu['gambar'])): ?>
                        <div class="mt-3 flex items-center space-x-3">
                            <span class="text-xs text-tinta/60">Gambar saat ini:</span>
                            <img src="<?= base_url('uploads/' . $menu['gambar']) ?>" alt="Gambar saat ini" class="w-12 h-12 object-cover rounded-lg border border-sutra-emas">
                        </div>
                    <?php endif; ?>

                    <!-- Inline Error Display -->
                    <?php if (isset($errors['gambar'])): ?>
                        <p class="text-xs text-laut-bugis font-bold mt-1.5 flex items-center space-x-1.5">
                            <span class="text-coto-orange">⚠️</span>
                            <span><?= esc($errors['gambar']) ?></span>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 flex items-center justify-end space-x-4">
                    <a href="<?= base_url('/admin/dashboard') ?>" class="px-6 py-3.5 bg-gray-200 text-tinta font-bold text-xs uppercase tracking-wider rounded-xl hover:bg-gray-300 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-8 py-3.5 bg-coto-orange text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-lg hover:bg-orange-700 transition-all">
                        Simpan Menu
                    </button>
                </div>

            </form>

        </div>

    </div>
</section>

<?= $this->endSection() ?>
