<?php

namespace App\Models;

use CodeIgniter\Model;

class pengembalian extends Model
{
    protected $table = 'pengembalian';
    protected $primaryKey = 'id';
    protected $allowedFields = ['transaksi_id', 'status', 'gambar_bukti'];
    protected $returnType = 'App\Entities\pengembalian';
    protected $useTimestamps = false;
}
