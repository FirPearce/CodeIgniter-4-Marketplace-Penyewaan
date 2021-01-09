<?php

namespace App\Models;

use CodeIgniter\Model;

class tokomodel extends Model
{
    protected $table = 'toko';
    protected $primaryKey = 'id';
    protected $allowedFields = ['salt', 'username', 'email', 'nama_toko', 'password', 'no_hp', 'alamat_toko', 'toko_image'];
    protected $returnType = 'App\Entities\toko';
    protected $useTimestamps = false;
}
