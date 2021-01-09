<?php

namespace App\Models;

use CodeIgniter\Model;

class produkmodel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_produk', 'stok', 'harga', 'gambar_produk', 'deskripsi_produk', 'toko_id'];
    protected $returnType = 'App\Entities\barang';
    protected $useTimestamps = false;
}
