<?php

namespace App\Entities;

use CodeIgniter\Entity;

class barang extends Entity
{
    public function setGambar($file)
    {
        $fileName = $file->getRandomName();
        $writePath = './uploads';
        $file->move($writePath, $fileName);
        $this->attributes['gambar_produk'] = $fileName;
        return $this;
    }
}
