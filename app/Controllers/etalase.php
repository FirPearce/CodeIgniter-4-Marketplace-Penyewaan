<?php

namespace App\Controllers;

class etalase extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }
    public function index()
    {
        $barang = new \App\Models\produkmodel();
        $model = $barang->findAll();
        $data['produkz'] = $model;
        $data['title'] = 'Produk | SewaKuy';
        return view('user/produk', $data);
    }
}
