<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;

class AdminMenu extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = new MenuModel();
    }

    public function index()
    {
        $sort = $this->request->getGet('sort');
        $menus = $this->menuModel->getSortedMenus($sort);

        $data = [
            'title'       => 'Dashboard Admin — Kelola Menu Purnomo',
            'menus'       => $menus,
            'currentSort' => $sort ?? '',
        ];

        return view('admin/dashboard', $data);
    }

    public function create()
    {
        $data = [
            'title'      => 'Tambah Menu Baru — Purnomo Admin',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/form', $data);
    }

    public function store()
    {
        $rules = [
            'nama_makanan' => [
                'rules'  => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required'   => 'Nama makanan wajib diisi.',
                    'min_length' => 'Nama makanan minimal 3 karakter.',
                    'max_length' => 'Nama makanan maksimal 100 karakter.',
                ],
            ],
            'deskripsi' => [
                'rules'  => 'required|min_length[10]',
                'errors' => [
                    'required'   => 'Deskripsi makanan wajib diisi.',
                    'min_length' => 'Deskripsi makanan minimal 10 karakter.',
                ],
            ],
            'harga' => [
                'rules'  => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required'     => 'Harga wajib diisi.',
                    'numeric'      => 'Harga harus berupa angka.',
                    'greater_than' => 'Harga harus lebih besar dari 0.',
                ],
            ],
            'kategori' => [
                'rules'  => 'required|in_list[coto,minuman,pelengkap]',
                'errors' => [
                    'required' => 'Kategori wajib dipilih.',
                    'in_list'  => 'Kategori tidak valid.',
                ],
            ],
            'gambar' => [
                'rules'  => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]|max_size[gambar,2048]',
                'errors' => [
                    'uploaded' => 'File gambar wajib diunggah.',
                    'is_image' => 'File yang diunggah harus berupa gambar.',
                    'mime_in'  => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move(FCPATH . 'uploads', $namaGambar);

        $this->menuModel->save([
            'nama_makanan' => $this->request->getPost('nama_makanan'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'harga'        => $this->request->getPost('harga'),
            'kategori'     => $this->request->getPost('kategori'),
            'gambar'       => $namaGambar,
        ]);

        return redirect()->to('/admin/dashboard')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit(int $id)
    {
        $menu = $this->menuModel->find($id);

        if (!$menu) {
            return redirect()->to('/admin/dashboard')->with('error', 'Menu tidak ditemukan.');
        }

        $data = [
            'title'      => 'Edit Menu — ' . $menu['nama_makanan'],
            'menu'       => $menu,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/form', $data);
    }

    public function update(int $id)
    {
        $menu = $this->menuModel->find($id);

        if (!$menu) {
            return redirect()->to('/admin/dashboard')->with('error', 'Menu tidak ditemukan.');
        }

        $rules = [
            'nama_makanan' => [
                'rules'  => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required'   => 'Nama makanan wajib diisi.',
                    'min_length' => 'Nama makanan minimal 3 karakter.',
                    'max_length' => 'Nama makanan maksimal 100 karakter.',
                ],
            ],
            'deskripsi' => [
                'rules'  => 'required|min_length[10]',
                'errors' => [
                    'required'   => 'Deskripsi makanan wajib diisi.',
                    'min_length' => 'Deskripsi makanan minimal 10 karakter.',
                ],
            ],
            'harga' => [
                'rules'  => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required'     => 'Harga wajib diisi.',
                    'numeric'      => 'Harga harus berupa angka.',
                    'greater_than' => 'Harga harus lebih besar dari 0.',
                ],
            ],
            'kategori' => [
                'rules'  => 'required|in_list[coto,minuman,pelengkap]',
                'errors' => [
                    'required' => 'Kategori wajib dipilih.',
                    'in_list'  => 'Kategori tidak valid.',
                ],
            ],
        ];

        // Gambar opsional saat edit
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $rules['gambar'] = [
                'rules'  => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]|max_size[gambar,2048]',
                'errors' => [
                    'is_image' => 'File yang diunggah harus berupa gambar.',
                    'mime_in'  => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                    'max_size' => 'Ukuran gambar maksimal 2MB.',
                ],
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $namaGambar = $menu['gambar'];
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(FCPATH . 'uploads', $namaGambar);
            
            // Delete old file if exists and not default
            if ($menu['gambar'] !== 'coto_makassar.jpg' && file_exists(FCPATH . 'uploads/' . $menu['gambar'])) {
                @unlink(FCPATH . 'uploads/' . $menu['gambar']);
            }
        }

        $this->menuModel->update($id, [
            'nama_makanan' => $this->request->getPost('nama_makanan'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'harga'        => $this->request->getPost('harga'),
            'kategori'     => $this->request->getPost('kategori'),
            'gambar'       => $namaGambar,
        ]);

        return redirect()->to('/admin/dashboard')->with('success', 'Menu berhasil diperbarui!');
    }

    public function delete(int $id)
    {
        $menu = $this->menuModel->find($id);

        if (!$menu) {
            return redirect()->to('/admin/dashboard')->with('error', 'Menu tidak ditemukan.');
        }

        if ($menu['gambar'] !== 'coto_makassar.jpg' && file_exists(FCPATH . 'uploads/' . $menu['gambar'])) {
            @unlink(FCPATH . 'uploads/' . $menu['gambar']);
        }

        $this->menuModel->delete($id);

        return redirect()->to('/admin/dashboard')->with('success', 'Menu berhasil dihapus!');
    }
}
