<?php

use App\Controllers\toko;
use App\Models\tokomodel;
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-lock"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            <p style="font-size: small;"><?= session()->get('username'); ?></p>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Produk
    </div>

    <!-- Nav Item - Produk List-->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('toko/view'); ?>">
            <i class="fas fa-users"></i>
            <span>Daftar Produk</span></a>
    </li>

    <!-- Nav Item - Tambah Produk -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('toko/create'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tambah Produk</span></a>
    </li>
    <!-- Nav Item - Permintaan Produk -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('transaksi/permintaantoko'); ?>">
            <i class="fas fa-dolly-flatbed"></i>
            <span>Orderan Masuk</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('user/preorder'); ?>">
            <i class="fas fa-dolly-flatbed"></i>
            <span>Pre Order</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Profile
    </div>

    <!-- Nav Item - My Profile -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-user"></i>
            <span>Profile Toko</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/auth/logout">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>