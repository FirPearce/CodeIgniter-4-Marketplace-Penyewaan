<?php

namespace App\Entities;

use CodeIgniter\Entity;

class pengembalian extends Entity
{
    public function setGambar($file)
    {
        $fileName = $file->getRandomName();
        $writePath = './uploads';
        $file->move($writePath, $fileName);
        $this->attributes['gambar_bukti'] = $fileName;
        return $this;
    }
}
