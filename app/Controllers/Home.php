<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Home extends BaseController
{
    public function index(): string
    {
        $menuModel = new MenuModel();
        
        // Fetch all menus for the Marquee and Featured sections
        $data = [
            'title'        => 'Purnomo — Coto Makassar Heritage Bugis-Makassar',
            'menus'        => $menuModel->findAll(),
            'cotoMenus'    => $menuModel->where('kategori', 'coto')->limit(4)->find(),
            'totalMenu'    => $menuModel->countAllResults(),
        ];

        return view('home', $data);
    }
}
