<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table            = 'menus';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_makanan', 'deskripsi', 'harga', 'kategori', 'gambar'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get sorted menus with optional category filter
     */
    public function getSortedMenus(?string $sort = null, ?string $category = null)
    {
        $builder = $this;

        if (!empty($category)) {
            $builder->where('kategori', $category);
        }

        switch ($sort) {
            case 'harga_asc':
                $builder->orderBy('harga', 'ASC');
                break;
            case 'harga_desc':
                $builder->orderBy('harga', 'DESC');
                break;
            case 'nama_asc':
                $builder->orderBy('nama_makanan', 'ASC');
                break;
            default:
                $builder->orderBy('id', 'ASC');
                break;
        }

        return $builder->findAll();
    }
}
