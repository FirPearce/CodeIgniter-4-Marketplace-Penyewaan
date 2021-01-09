<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $db, $builder, $namatoko;
    public function __construct()
    {
        $this->db     = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->namatoko = $this->db->table('toko');
    }

    public function index()
    {
        $data['title'] = 'Admin | UserList';


        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();

        $this->namatoko->select('toko.id as tokoid, username, nama_toko, email');
        $query = $this->namatoko->get();
        $data['role'] = "Toko";

        $data['toko'] = $query->getResult();

        return view('admin/index', $data);
    }

    public function detail($id = 0)
    {
        $data['title'] = 'Admin | UserList';

        $this->builder->select('users.id as userid, username, email, fullname, user_image, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();



        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }

        return view('admin/userdetail', $data);
    }

    public function tokodetail($id = 0)
    {
        $data['title'] = 'Admin | UserList';
        $this->namatoko->select('toko.id as tokoid, username, nama_toko, email, toko_image');
        $this->namatoko->where('toko.id', $id);
        $query = $this->namatoko->get();

        $data['toko'] = $query->getRow();
        $data['role'] = "Toko";

        if (empty($data['toko'])) {
            return redirect()->to('/admin');
        }
        return view('admin/tokodetail', $data);
    }

    public function delete($id = 0)
    {
        $this->builder->delete(['users.id' => $id]);
        $this->namatoko->delete(['toko.id' => $id]);

        return redirect()->to(site_url('admin/index'));
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Admin | Dashboard'
        ];
        return view('admin/dashboard', $data);
    }
    public function editprofile()
    {
        $data = [
            'title' => 'Admin | Edit Profile'
        ];
        return view('admin/editprofile', $data);
    }
    public function myprofile()
    {
        $data = [
            'title' => 'Admin | My Profile'
        ];
        return view('admin/myprofile', $data);
    }
    //--------------------------------------------------------------------

}
