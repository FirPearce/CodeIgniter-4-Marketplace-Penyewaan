<?php

namespace App\Controllers;

use App\Models\tokomodel;
use App\Models\produkmodel;

class toko extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }
    public function view()
    {
        $barangModel = new \App\Models\produkmodel();
        $barangs = $barangModel->where('toko_id', session()->id)->findAll();

        $data['produk'] = $barangs;
        $data['title'] = 'Daftar Produk | SewaKuy';
        return view('toko/home', $data);
    }
    public function index()
    {
        $id = $this->request->uri->getSegment(3);
        $barangModel = new \App\Models\produkmodel();
        $barangss = $barangModel->find($id);
        $data['produks'] = $barangss;
        $data['title'] = 'Daftar Produk | SewaKuy';

        return view('toko/index', $data);
    }
    public function create()
    {
        if ($this->request->getPost()) {
            //jika ada data yang di post
            $data = $this->request->getPost();
            $this->validation->run($data, 'barang');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                //simpan datanya
                $barangModel = new \App\Models\produkmodel();

                $barang = new \App\Entities\barang();

                $barang->fill($data);
                $barang->gambar = $this->request->getFile('gambar_produk');
                $barang->toko_id = $this->session->get('id');

                $barangModel->save($barang);
                $id = $barangModel->insertID();
                $segments = ['toko', 'index', $id];

                // /barang/view/$id
                return redirect()->to(site_url($segments));
            }
        }
        $data['title'] = 'Tambah Produk | SewaKuy';
        return view('toko/tambahproduk', $data);
    }
    public function update()
    {
        $id = $this->request->uri->getSegment(3);
        $barangModel = new \App\Models\produkmodel();
        $barangss = $barangModel->find($id);
        $data['barang'] = $barangss;

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'barangupdate');
            $errors = $this->validation->getErrors();
            if (!$errors) {
                $b = new \App\Entities\barang();
                $b->id = $id;
                $b->fill($data);
                if ($this->request->getFile('gambar_produk')->isValid()) {
                    $b->gambar_produk = $this->request->getFile('gambar_produk');
                }
                $b->toko_id = $this->session->get('id');
                $barangModel->save($b);
                $segments = ['toko', 'index', $id];
                return redirect()->to(base_url($segments));
            }
        }
        $data['title'] = 'Edit Produk | SewaKuy';
        return view('toko/update', $data);
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(3);
        $barangModel = new \App\Models\produkmodel();
        $delete = $barangModel->delete($id);

        return redirect()->to(site_url('toko/view'));
    }
}
