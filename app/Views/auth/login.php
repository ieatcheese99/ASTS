<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="py-16 bg-kertas-lontar min-h-[70vh] flex items-center justify-center">
    <div class="max-w-md w-full mx-auto px-4">
        
        <div class="bg-white border-2 border-sutra-emas rounded-3xl p-8 sm:p-10 shadow-2xl space-y-6">
            
            <!-- Header Brand -->
            <div class="text-center space-y-2">
                <img src="<?= base_url('assets/logo.png') ?>" alt="Logo Purnomo" class="w-16 h-16 rounded-full border-2 border-sutra-emas mx-auto shadow-md">
                <h1 class="font-display font-extrabold text-2xl text-laut-bugis">Portal Admin Purnomo</h1>
                <p class="text-xs text-tinta/70 font-light">Masuk untuk mengelola data menu Coto Makassar</p>
            </div>

            <!-- Login Form -->
            <form action="<?= base_url('/login') ?>" method="POST" class="space-y-5">
                <?= csrf_field() ?>

                <!-- Username Field -->
                <div>
                    <label for="username" class="block text-xs font-bold text-laut-bugis uppercase tracking-wider mb-2">Username Admin</label>
                    <input type="text" id="username" name="username" value="<?= old('username') ?>" required class="w-full px-4 py-3 bg-kertas-lontar/40 border-2 border-sutra-emas/60 rounded-xl text-tinta text-sm font-semibold focus:outline-none focus:border-coto-orange transition-colors" placeholder="Masukkan username">
                    <?php if (isset($validation) && $validation->hasError('username')): ?>
                        <p class="text-[11px] text-laut-bugis font-semibold mt-1 flex items-center space-x-1">
                            <span>⚠️</span>
                            <span><?= $validation->getError('username') ?></span>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-xs font-bold text-laut-bugis uppercase tracking-wider mb-2">Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-3 bg-kertas-lontar/40 border-2 border-sutra-emas/60 rounded-xl text-tinta text-sm font-semibold focus:outline-none focus:border-coto-orange transition-colors" placeholder="Masukkan password">
                    <?php if (isset($validation) && $validation->hasError('password')): ?>
                        <p class="text-[11px] text-laut-bugis font-semibold mt-1 flex items-center space-x-1">
                            <span>⚠️</span>
                            <span><?= $validation->getError('password') ?></span>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3.5 bg-coto-orange text-white font-bold text-xs uppercase tracking-widest rounded-xl shadow-lg hover:bg-orange-700 transition-all">
                    Masuk ke Dashboard
                </button>
            </form>

            <div class="text-center pt-2 border-t border-gray-100">
                <a href="<?= base_url('/') ?>" class="text-xs text-tinta/60 hover:text-coto-orange transition-colors font-medium">
                    &larr; Kembali ke Beranda Utama
                </a>
            </div>

        </div>

    </div>
</section>

<?= $this->endSection() ?>
