<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Seed Admin User
        $adminData = [
            'username'   => 'admin',
            'password'   => password_hash('admin123', PASSWORD_BCRYPT),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        
        $this->db->table('admins')->truncate();
        $this->db->table('admins')->insert($adminData);

        // 2. Seed Initial Menu Items (Minimal 8 varian)
        $menuData = [
            [
                'nama_makanan' => 'Coto Daging Sapi Khasiat Rempah',
                'deskripsi'    => 'Coto Makassar khas warisan Bugis dengan 40 racikan rempah pilihan dan irisan daging sapi empuk berkualitas tinggi.',
                'harga'        => 35000.00,
                'kategori'     => 'coto',
                'gambar'       => 'coto_makassar.jpg',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nama_makanan' => 'Coto Campur Jeroan & Daging',
                'deskripsi'    => 'Perpaduan sempurna potongan daging sapi segar, babat, dan hati dengan kuah kaldu kacang yang gurih kaya rempah.',
                'harga'        => 38000.00,
                'kategori'     => 'coto',
                'gambar'       => 'coto_makassar.jpg',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nama_makanan' => 'Coto Iga Sapi Makassar',
                'deskripsi'    => 'Potongan iga sapi pilihan yang dimasak perlahan hingga empuk merekah dengan bumbu khas coto rumpun Bugis.',
                'harga'        => 45000.00,
                'kategori'     => 'coto',
                'gambar'       => 'coto_makassar.jpg',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nama_makanan' => 'Coto Paru Goreng Crispy',
                'deskripsi'    => 'Variasi coto dengan topping paru sapi goreng garing renyah disiram kuah hangat rempah lontar.',
                'harga'        => 37000.00,
                'kategori'     => 'coto',
                'gambar'       => 'coto_makassar.jpg',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nama_makanan' => 'Es Palu Butung Heritage',
                'deskripsi'    => 'Hidangan pencuci mulut khas Makassar berbahan pisang raja, bubur sumsum lembut, es serut, dan sirup Merah Cap Patung.',
                'harga'        => 18000.00,
                'kategori'     => 'minuman',
                'gambar'       => 'coto_makassar.jpg',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nama_makanan' => 'Es Pisang Ijo Daun Pandan',
                'deskripsi'    => 'Pisang manis dibalut adonan tepung hijau aroma pandan alami, disajikan dingin segar dengan saus santan gurih.',
                'harga'        => 20000.00,
                'kategori'     => 'minuman',
                'gambar'       => 'coto_makassar.jpg',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nama_makanan' => 'Buras Daun Pisang (2 pcs)',
                'deskripsi'    => 'Pendamping wajib coto: beras gurih bermasak santan yang dibungkus rapat daun pisang khas kuliner Sulawesi Selatan.',
                'harga'        => 8000.00,
                'kategori'     => 'pelengkap',
                'gambar'       => 'coto_makassar.jpg',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nama_makanan' => 'Ketupat Daun Kelapa',
                'deskripsi'    => 'Ketupat padat khas hidangan Bugis-Makassar, siap dipotong dan dinikmati bersama semangkuk coto hangat.',
                'harga'        => 6000.00,
                'kategori'     => 'pelengkap',
                'gambar'       => 'coto_makassar.jpg',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('menus')->truncate();
        $this->db->table('menus')->insertBatch($menuData);
    }
}
