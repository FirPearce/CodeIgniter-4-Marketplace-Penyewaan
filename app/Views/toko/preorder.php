<?= $this->extend('toko/template/pagetemplate'); ?>

<?= $this->section('toko-content'); ?>
<?php
$session = session();
$status = [
    'name' => 'status',
    'id' => 'status',
    'class' => 'form-control',
    'value' => 'Tersedia',
    'type' => 'hidden'
];
$submit = [
    'name' => 'submit',
    'id' => 'submit',
    'type' => 'submit',
    'value' => 'Beri Tahu Produk Tersedia',
    'class' => 'btn btn-success',
];
?>
<div class="container">
    <h2>Banyak User Yang Menginginkan Barang</h2>
    <table class="table text-secondary">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col"> No PreOrder</th>
                <th scope="col">Produk</th>
                <th scope="col">Peminat</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1; ?>
            <?php foreach ($kotak as $bukti) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $bukti->pesan_id; ?></td>
                    <td><?= $bukti->produk_id; ?></td>
                    <td><?= $bukti->username; ?></td>
                    <td><?= $bukti->pesan_status; ?></td>
                    <?= form_open('User/ada/' . $bukti->pesan_id) ?>
                    <?= form_input($status) ?>
                    <td><a class="btn btn-success"><?= form_submit($submit) ?></a></td>
                    <?= form_close() ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>