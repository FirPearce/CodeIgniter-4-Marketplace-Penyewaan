<?php

namespace App\Controllers;

use App\Entities\user;
use App\Models\produkmodel;
use TCPDF;

class transaksi extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->email = \Config\Services::email();
    }

    public function view()
    {
        $id = $this->request->uri->getSegment(3);
        $transaksimod = new \App\Models\transaksimodel();
        $transaksi = $transaksimod->select('*, transaksi.id AS transaksi_id')->join('produk', 'produk.id=transaksi.produk_id')
            ->join('users', 'users.id=transaksi.user_id')
            ->where('user_id', user()->id)
            ->first($id);
        $data['title'] = 'Transaksi | SewaKuy';
        $data['transaksi'] = $transaksi;
        return view('user/transaksi', $data);
    }

    public function bukti()
    {
        $id = $this->request->uri->getSegment(3);
        $modeltransaksi = new \App\Models\transaksimodel();
        $transaksinya = $modeltransaksi->first($id);
        $data['transaksi'] = $transaksinya;
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'pengembalian');
            $errors = $this->validation->getErrors();
            print_r($errors);
            print_r($data);
            if (!$errors) {
                //simpan datanya
                $pengembalian = new \App\Models\pengembalian();
                $bukti = new \App\Entities\pengembalian();

                $bukti->fill($data);
                $bukti->gambar = $this->request->getFile('gambar_bukti');

                $pengembalian->save($bukti);
                $id = $pengembalian->insertID();
                $segments = ['transaksi', 'pengembalian', $id];

                // /barang/view/$id
                return redirect()->to(site_url($segments));
            }
        }
        $data['title'] = 'Transaksi Bukti | SewaKuy';
        return view('user/bukti', $data);
    }
    public function pengembalian()
    {
        $id = $this->request->uri->getSegment(3);
        $kembali = new \App\Models\pengembalian();
        $wadah = $kembali->find($id);
        // $hasil = $kembali->findAll();
        $data['hasil'] = $wadah;
        $data['title'] = 'Sedang Sewa | SewaKuy';
        return view('user/sewa', $data);
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(3);
        $transaksi = new \App\Models\transaksimodel();
        $delete = $transaksi->delete($id);

        return redirect()->to(site_url('transaksi/index'));
    }
    public function deletetoko()
    {
        $id = $this->request->uri->getSegment(3);
        $transaksi = new \App\Models\transaksimodel();
        $delete = $transaksi->delete($id);

        return redirect()->to(site_url('transaksi/permintaantoko'));
    }

    public function index()
    {
        $transaksiModel = new \App\Models\transaksimodel();
        // $model = $transaksiModel->select('*, transaksi.id AS transaksi_id, ')->join('produk', 'produk.id=transaksi.produk_id')->where('user_id', $produk_)->findAll();
        $model = $transaksiModel->where('user_id', user_id())->findAll();
        $data['transaksi'] = $model;
        $data['title'] = 'Transaksi Toko | SewaKuy';
        return view('user/viewpermintaan', $data);
    }

    public function permintaantoko()
    {
        $wasawawu = new \App\Models\pengembalian();
        $oke = $wasawawu->findAll();
        // $hasil = $kembali->findAll();
        $data['batu'] = $oke;
        $data['title'] = 'Transaksi Toko | SewaKuy';
        return view('toko/permintaan', $data);
    }
    public function permintaandelete()
    {
        $id = $this->request->uri->getSegment(3);
        $balik = new \App\Models\pengembalian();
        $hapus = $balik->delete($id);
        // $hasil = $kembali->findAll();
        return redirect()->to(site_url('transaksi/permintaantoko'));
    }
    public function permintaan()
    {
        $id = $this->request->uri->getSegment(3);
        $transaksimod = new \App\Models\transaksimodel();
        $transaksi = $transaksimod->select('*, transaksi.id AS transaksi_id')->join('produk', 'produk.id=transaksi.produk_id')
            ->join('users', 'users.id=transaksi.user_id')
            ->where('transaksi.id', $id)
            ->first();
        $data['title'] = 'Transaksi | SewaKuy';
        $data['transaksi'] = $transaksi;

        return view('toko/viewpermintaan', $data);
    }

    public function invoice()
    {
        $id = $this->request->uri->getSegment(3);

        $transaksiModel = new \App\Models\transaksimodel();
        $transaksi = $transaksiModel->find($id);

        $userModel = new \Myth\Auth\Models\UserModel();
        $pembeli = $userModel->find($transaksi->user_id);

        $barangModel = new \App\Models\produkmodel();
        $barang = $barangModel->find($transaksi->produk_id);

        $html = view('toko/viewpermintaan', [
            'transaksi' => $transaksi,
            'pembeli' => $pembeli,
            'barang' => $barang,
        ]);

        $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Firly Taufikurohman');
        $pdf->SetTitle('Invoice');
        $pdf->SetSubject('Invoice');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        // //line ini penting
        $this->response->setContentType('application/pdf');
        // // //Close and output PDF document
        // $pdf->Output(__DIR__ . '/../../public/uploads/invoices.pdf', 'F');
        $pdf->Output('invoice.pdf', 'I');

        // $attachment = base_url('uploads/Invoice.pdf');

        // $message = "<h1>Invoice Pembelian</h1><p>Kepada " . $pembeli->username . " Berikut Invoice atas pembelian " . $barang->nama . "";

        // // $this->sendEmail($attachment, 'deavenditama@gmail.com', 'Invoice', $message);

        // return redirect()->to(site_url('transaksi/index'));
    }
}
