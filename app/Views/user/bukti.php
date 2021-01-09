<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<?php
$transaksi_id = [
    'name' => 'transaksi_id',
    'id' => 'transaksi_id',
    'value' => $transaksi->id,
    'readonly' => true,

];
$status = [
    'name' => 'status',
    'id' => 'status',
    'value' => 'Pinjam',
    'readonly' => true,
    'class' => 'form-control',
];
$gambar_bukti = [
    'name' => 'gambar_bukti',
    'id' => 'gambar_bukti',
    'value' => null,
    'class' => 'form-control',
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
<div class="container text-white">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-white-800">Bukti Transaksi</h1>
    <?= form_open_multipart('transaksi/bukti') ?>
    <div class="form-group">
        <?= form_label("Status", "status") ?>
        <?= form_input($status) ?>
    </div>
    <div class="form-group">
        <?= form_label("Transaksi_id", "transaksi_id") ?>
        <?= form_input($transaksi_id) ?>
    </div>
    <div class="form-group">
        <?= form_label("Gambar Bukti", "gambar_bukti") ?>
        <?= form_upload($gambar_bukti) ?>
    </div>

    <div class="text-right">
        <?= form_submit($submit) ?>
    </div>
    <?= form_close() ?>
</div>
<?= $this->endSection(); ?>