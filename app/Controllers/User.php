<?php

namespace App\Controllers;


class User extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }
    public function index()
    {
        return view('user/index',);
    }



    public function hasilpreorder()
    {
        $hasilpesan = new \App\Models\pesan();
        $kotak = $hasilpesan->select('*, pesan.id AS pesan_id, pesan.status AS pesan_status')->join('produk', 'produk.id=pesan.produk_id')
            ->join('users', 'users.id=pesan.user_id')
            ->where('user_id', user()->id)
            ->find();
        $data['kotak'] = $kotak;
        $data['title'] = 'Hasil Pre Order | SewaKuy';
        return view('user/preorder', $data);
    }
    public function preorder()
    {
        $hasilpesan = new \App\Models\pesan();
        $kotak = $hasilpesan->select('*, pesan.id AS pesan_id, pesan.status AS pesan_status')->join('toko', 'toko.id=pesan.toko_id')->where('toko_id', session()->id)->findAll();
        $data['kotak'] = $kotak;
        $data['title'] = 'Hasil Pre Order | SewaKuy';
        return view('toko/preorder', $data);
    }
    public function notif()
    {
        $hasilpesan = new \App\Models\pesan();
        $kotak = $hasilpesan->select('*, pesan.id AS pesan_id, pesan.status AS pesan_status')->join('produk', 'produk.id=pesan.produk_id')
            ->join('users', 'users.id=pesan.user_id')
            ->where('user_id', user()->id)
            ->find();
        $data['kotak'] = $kotak;
        $data['title'] = 'Hasil Pre Order | SewaKuy';
        return view('user/notif', $data);
    }

    public function ada()
    {
        $id = $this->request->uri->getSegment(3);
        $hasilpesan = new \App\Models\pesan();
        $kotak = $hasilpesan->find($id);
        $data['kotak'] = $kotak;
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'pesanupdate');
            $errors = $this->validation->getErrors();
            print_r($errors);
            if (!$errors) {
                $b = new \App\Entities\pesan();
                $b->id = $id;
                $b->fill($data);
                $b->status = $this->request->getPost('status');
                $b->toko_id = $this->session->get('id');
                $hasilpesan->save($b);
                $segments = ['User', 'preorder', $id];
                return redirect()->to(base_url($segments));
            }
        }
        $data['title'] = 'PreOrder | SewaKuy';
        return view('toko/preorder', $data);
    }

    public function pesan()
    {
        $id = $this->request->uri->getSegment(3);
        $barang = new \App\Models\produkmodel();
        $model = $barang->find($id);
        $data['produkzz'] = $model;
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'pesan');
            $errors = $this->validation->getErrors();
            if (!$errors) {
                $barangmodel = new \App\Models\pesan();
                $message = new \App\Entities\pesan();
                $message->fill($data);
                $barangmodel->save($message);
                $id = $barangmodel->insertID();
                $segment = ['user', 'hasilpreorder', $id];
                return redirect()->to(site_url($segment));
            }
        }
        $data['title'] = 'Pre Order | SewaKuy';
        return view('user/pesan', $data);
    }

    public function cart()
    {
        $id = $this->request->uri->getSegment(3);
        $modelBarang = new \App\Models\produkmodel();
        $model = $modelBarang->find($id);
        $data['produkz'] = $model;
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'transaksi');
            $errors = $this->validation->getErrors();
            if (!$errors) {
                $transaksimodel = new \App\Models\transaksimodel();
                $transaksi = new \App\Entities\transaksi();
                $barangmodel = new \App\Models\produkmodel();

                $produk_id = $this->request->getPost('produk_id');
                $jumlah = $this->request->getPost('jumlah');
                $produk = $barangmodel->find($produk_id);
                $entitibarang = new \App\Entities\barang();
                $entitibarang->id = $produk_id;
                $entitibarang->stok = $produk->stok - $jumlah;
                $barangmodel->save($entitibarang);

                $transaksi->fill($data);
                $transaksimodel->save($transaksi);
                $id = $transaksimodel->insertID();
                $segment = ['transaksi', 'view', $id];
                return redirect()->to(site_url($segment));
            }
        }
        $data['title'] = 'Cart | SewaKuy';

        return view('user/cart', $data);
    }

    public function produk()
    {
        $barang = new \App\Models\produkmodel();
        $model = $barang->findAll();
        $data['produkz'] = $model;
        $data['title'] = 'Produk | SewaKuy';
        return view('user/produk', $data);
    }

    public function Membership()
    {
        $data = [
            'title' => 'Membership | SewaKuy'
        ];
        return view('user/membership', $data);
    }

    public function sewa()
    {
        $data = [
            'title' => 'Sewa | SewaKuy'

        ];
        return view('user/sewa', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile | SewaKuy'

        ];
        return view('user/profile', $data);
    }

    //--------------------------------------------------------------------

}
