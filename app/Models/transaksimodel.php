<?php

namespace App\Models;

use CodeIgniter\Model;

class transaksimodel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'total', 'waktu_pinjam', 'waktu_kembali', 'user_id', 'ongkir', 'produk_id', 'jumlah', 'alamat', 'ongkir',
    ];
    protected $returnType = 'App\Entities\transaksi';
    protected $useTimestamps = false;
}
