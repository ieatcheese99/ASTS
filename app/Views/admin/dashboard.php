<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="py-10 bg-kertas-lontar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <!-- Header Bar -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white border-2 border-sutra-emas p-6 rounded-2xl shadow-md">
            <div>
                <span class="text-xs font-bold text-coto-orange uppercase tracking-wider">Area Pengelolaan</span>
                <h1 class="font-display font-extrabold text-2xl text-laut-bugis">Dashboard Admin Restaurant</h1>
                <p class="text-xs text-tinta/70 font-light mt-0.5">Kelola daftar varian Coto Makassar, minuman, dan pendamping.</p>
            </div>
            
            <div class="flex items-center space-x-3">
                <a href="<?= base_url('/admin/create') ?>" class="px-5 py-3 bg-coto-orange text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-lg hover:bg-orange-700 transition-all flex items-center space-x-2">
                    <span>+ Tambah Menu Baru</span>
                </a>
            </div>
        </div>

        <!-- Table Controls & Sorting -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-laut-bugis text-kabut-biru p-4 rounded-xl border border-sutra-emas">
            <span class="text-xs font-bold text-sutra-emas">Total Terdaftar: <?= count($menus) ?> Item Menu</span>

            <form method="GET" action="<?= base_url('/admin/dashboard') ?>" class="flex items-center space-x-3">
                <label for="sort" class="text-xs font-semibold text-kabut-biru/80">Urutkan Tabel:</label>
                <select id="sort" name="sort" onchange="this.form.submit()" class="bg-laut-bugis border border-sutra-emas text-kabut-biru text-xs font-semibold rounded-lg px-3 py-1.5 focus:outline-none">
                    <option value="" <?= empty($currentSort) ? 'selected' : '' ?>>Default (ID)</option>
                    <option value="harga_asc" <?= $currentSort === 'harga_asc' ? 'selected' : '' ?>>Harga: Termurah &rarr; Termahal</option>
                    <option value="harga_desc" <?= $currentSort === 'harga_desc' ? 'selected' : '' ?>>Harga: Termahal &rarr; Termurah</option>
                    <option value="nama_asc" <?= $currentSort === 'nama_asc' ? 'selected' : '' ?>>Nama Makanan (A &ndash; Z)</option>
                </select>
            </form>
        </div>

        <!-- Menu Data Table -->
        <div class="bg-white border-2 border-sutra-emas rounded-2xl overflow-hidden shadow-xl">
            <?php if (empty($menus)): ?>
                <!-- Empty State -->
                <div class="text-center py-16 px-6">
                    <div class="w-16 h-16 bg-coto-orange/10 text-coto-orange text-3xl flex items-center justify-center rounded-full mx-auto mb-4">📋</div>
                    <h3 class="font-display font-bold text-xl text-tinta">Belum ada menu</h3>
                    <p class="text-xs text-tinta/70 mt-1">Tambahkan varian pertama Anda untuk ditampilkan di website.</p>
                    <a href="<?= base_url('/admin/create') ?>" class="inline-block mt-4 px-5 py-2.5 bg-coto-orange text-white text-xs font-bold uppercase rounded-xl">
                        + Tambah Menu Pertama
                    </a>
                </div>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-laut-bugis text-kabut-biru text-xs font-bold uppercase tracking-wider border-b border-sutra-emas">
                                <th class="p-4 w-16 text-center">No</th>
                                <th class="p-4 w-24">Gambar</th>
                                <th class="p-4">Nama Makanan</th>
                                <th class="p-4">Kategori</th>
                                <th class="p-4">Harga</th>
                                <th class="p-4 w-36 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-xs">
                            <?php foreach ($menus as $index => $item): ?>
                                <tr class="hover:bg-kertas-lontar/50 transition-colors">
                                    <td class="p-4 text-center font-bold text-tinta/60"><?= $index + 1 ?></td>
                                    <td class="p-4">
                                        <img src="<?= base_url('uploads/' . $item['gambar']) ?>" alt="<?= esc($item['nama_makanan']) ?>" class="w-12 h-12 object-cover rounded-lg border border-sutra-emas/60 shadow-sm">
                                    </td>
                                    <td class="p-4">
                                        <p class="font-display font-bold text-sm text-tinta"><?= esc($item['nama_makanan']) ?></p>
                                        <p class="text-[11px] text-tinta/60 line-clamp-1 mt-0.5"><?= esc($item['deskripsi']) ?></p>
                                    </td>
                                    <td class="p-4">
                                        <span class="px-2.5 py-1 bg-laut-bugis/10 text-laut-bugis font-bold text-[10px] uppercase rounded-full border border-laut-bugis/20">
                                            <?= esc($item['kategori']) ?>
                                        </span>
                                    </td>
                                    <td class="p-4 font-display font-bold text-sm text-coto-orange">
                                        Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                                    </td>
                                    <td class="p-4 text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="<?= base_url('/admin/edit/' . $item['id']) ?>" class="px-3 py-1.5 bg-sutra-emas text-laut-bugis font-bold text-[11px] rounded hover:bg-yellow-400 transition-colors">
                                                Edit
                                            </a>
                                            <a href="<?= base_url('/admin/delete/' . $item['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')" class="px-3 py-1.5 bg-red-600 text-white font-bold text-[11px] rounded hover:bg-red-700 transition-colors">
                                                Hapus
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?= $this->endSection() ?>
