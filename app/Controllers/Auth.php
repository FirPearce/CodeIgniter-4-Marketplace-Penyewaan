<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        return view('toko/home');
    }
    public function register()
    {
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'register');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $tokomodel = new \App\Models\tokomodel();

                $toko = new \App\Entities\toko();

                $toko->username = $this->request->getPost('username');
                $toko->nama_toko = $this->request->getPost('nama_toko');
                $toko->email = $this->request->getPost('email');
                $toko->password = $this->request->getPost('password');
                $toko->repeatpassword = $this->request->getPost('repeatpassword');

                $tokomodel->save($toko);

                return view('toko/logintoko');
            }
            $this->session->setFlashdata('errors', $errors);
        }
        return view('toko/daftartoko');
    }
    public function login()
    {
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'login');
            $errors = $this->validation->getErrors();

            if ($errors) {
                return view('toko/logintoko');
            }

            $tokomodel = new \App\Models\tokomodel();

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $toko = $tokomodel->where('username', $username)->first();

            if ($toko) {
                $salt = $toko->salt;
                if ($toko->password !== md5($salt . $password)) {
                    $this->session->setFlashdata('errors', ['Password Salah']);
                } else {
                    $sessData = [
                        'id' => $toko->id,
                        'username' => $toko->username,
                        'nama_toko' => $toko->nama_toko,
                        'email' => $toko->email,
                        'no_hp' => $toko->no_hp,
                        'alamat_toko' => $toko->alamat_toko,
                        'toko_image' => $toko->toko_image,
                        'isLoggedIn' => TRUE
                    ];

                    $this->session->set($sessData);
                    return redirect()->to(site_url('toko/view'));
                }
            } else {
                $this->session->setFlashdata('errors', ['User Tidak Ditemukan']);
                return view('toko/logintoko');
            }
        }
        return view('toko/logintoko');
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('auth/login'));
    }
}
