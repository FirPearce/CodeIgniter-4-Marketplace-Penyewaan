<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<?php
$user_id = [
    'name' => 'user_id',
    'id' => 'user_id',
    'value' => user()->id,
    'type' => 'hidden'
];
$produk_id = [
    'name' => 'produk_id',
    'id' => 'produk_id',
    'value' => $produkzz->id,
    'type' => 'hidden'

];
$toko_id = [
    'name' => 'toko_id',
    'id' => 'toko_id',
    'value' => $produkzz->toko_id,
    'type' => 'hidden'

];
$status = [
    'name' => 'status',
    'id' => 'status',
    'class' => 'form-control',
    'value' => 'PreOrder',
    'readonly' => true,
];
$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'type' => 'submit',
    'value' => 'Confirm',
    'class' => 'btn btn-success',
];
?>
<div class="container">
    <h2 class="text-white">PreOrder</h2>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <img class="img-fluid" src="<?= base_url('uploads/' . $produkzz->gambar_produk) ?>" />
                    <h1 class="text-success"><?= $produkzz->nama_produk ?></h1>
                    <h4> Harga : <?= $produkzz->harga ?></h4>
                    <h4> Stok : <?= $produkzz->stok ?></h4>
                </div>
            </div>
        </div>
        <div class="col-6">
            <hr class="bg-white">
            <?= form_open('user/pesan') ?>
            <?= form_input($produk_id) ?>
            <?= form_input($user_id) ?>
            <?= form_input($toko_id) ?>
            <div class="form-group text-white">
                <?= form_label('Status', 'status',) ?>
                <?= form_input($status) ?>
            </div>
            <div class="text-right">
                <?= form_submit($submit) ?>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>