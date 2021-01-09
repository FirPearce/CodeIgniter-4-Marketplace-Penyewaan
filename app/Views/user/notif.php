<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <table class="table text-white">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col"> No PreOrder</th>
                <th scope="col">Produk</th>
                <th scope="col">Peminat</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $i = 1; ?>
            <?php foreach ($kotak as $bukti) : ?>
                <?php if ($bukti->pesan_status == 'Tersedia') : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $bukti->pesan_id; ?></td>
                        <td><?= $bukti->nama_produk; ?></td>
                        <td><?= $bukti->username; ?></td>
                        <td><?= $bukti->pesan_status; ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>