<?php

namespace App\Controllers;

use App\Models\MenuModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Menu extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = new MenuModel();
    }

    public function index(): string
    {
        $sort     = $this->request->getGet('sort');
        $category = $this->request->getGet('category');

        $menus = $this->menuModel->getSortedMenus($sort, $category);

        $data = [
            'title'           => 'Daftar Menu Coto Makassar & Kuliner — Purnomo',
            'menus'           => $menus,
            'currentSort'     => $sort ?? '',
            'currentCategory' => $category ?? '',
        ];

        return view('menu/index', $data);
    }

    public function detail(int $id): string
    {
        $menu = $this->menuModel->find($id);

        if (!$menu) {
            throw PageNotFoundException::forPageNotFound('Menu tidak ditemukan.');
        }

        $relatedMenus = $this->menuModel
            ->where('kategori', $menu['kategori'])
            ->where('id !=', $id)
            ->limit(3)
            ->find();

        $data = [
            'title'        => $menu['nama_makanan'] . ' — Purnomo Coto Makassar',
            'menu'         => $menu,
            'relatedMenus' => $relatedMenus,
        ];

        return view('menu/detail', $data);
    }
}
