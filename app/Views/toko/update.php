<?= $this->extend('toko/template/pagetemplate'); ?>

<?= $this->section('toko-content'); ?>
<?php

$nama_produk = [
    'name' => 'nama_produk',
    'id' => 'nama_produk',
    'value' => $barang->nama_produk,
    'class' => 'form-control',
];

$stok = [
    'name' => 'stok',
    'id' => 'stok',
    'value' => $barang->stok,
    'class' => 'form-control',
    'type' => 'number',
    'min' => 0,
];

$harga = [
    'name' => 'harga',
    'id' => 'harga',
    'value' => $barang->harga,
    'class' => 'form-control',
    'type' => 'number',
    'min' => 0,
];

$gambar_produk = [
    'name' => 'gambar_produk',
    'id' => 'gambar_produk',
    'value' => null,
    'class' => 'form-control',
];

$deskripsi_produk = [
    'name' => 'deskripsi_produk',
    'id' => 'deskripsi_produk',
    'value' => $barang->deskripsi_produk,
    'class' => 'form-control'
];

$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'value' => 'Submit',
    'class' => 'btn btn-success',
    'type' => 'submit',
];

$session = session();

?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Produk</h1>
    <?= form_open_multipart('toko/update/' . $barang->id) ?>
    <div class="form-group">
        <?= form_label("Nama Produk", "nama_produk") ?>
        <?= form_input($nama_produk) ?>
    </div>

    <div class="form-group">
        <?= form_label("Stok", "stok") ?>
        <?= form_input($stok) ?>
    </div>

    <div class="form-group">
        <?= form_label("Harga", "harga") ?>
        <?= form_input($harga) ?>
    </div>
    <img class="img-fluid" alt="image" src="<?= base_url('uploads/' . $barang->gambar_produk) ?>" />
    <div class="form-group">
        <?= form_label("Gambar Produk", "gambar_produk") ?>
        <?= form_upload($gambar_produk) ?>
    </div>

    <div class="form-group">
        <?= form_label("Deskripsi", "deskripsi_produk") ?>
        <?= form_input($deskripsi_produk) ?>
    </div>

    <div class="text-right">
        <?= form_submit($submit) ?>
    </div>
    <?= form_close() ?>
</div>
<?= $this->endSection(); ?>