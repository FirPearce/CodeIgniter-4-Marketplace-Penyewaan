<?php

namespace App\Models;

use CodeIgniter\Model;

class pesan extends Model
{
    protected $table = 'pesan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'produk_id', 'toko_id', 'status'];
    protected $returnType = 'App\Entities\pesan';
    protected $useTimestamps = false;
}
