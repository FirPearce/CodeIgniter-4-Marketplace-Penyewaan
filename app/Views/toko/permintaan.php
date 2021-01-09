<?= $this->extend('toko/template/pagetemplate'); ?>

<?= $this->section('toko-content'); ?>
<h1>Transaksi</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col"> No Transaksi</th>
            <th scope="col">Status</th>
            <th scope="col">Gambar Bukti</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $kembali = new \App\Models\pengembalian();
        $wadah = $kembali->findAll(); ?>
        <?php $i = 1; ?>
        <?php foreach ($wadah as $bukti) : ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $bukti->transaksi_id; ?></td>
                <td><?= $bukti->status; ?></td>
                <td><img class="img-fluid" style="max-height: 200px; max-width: 50%;" alt="image" src="<?= base_url('uploads/' . $bukti->gambar_bukti) ?>" /></td>
                <td><a href="<?= site_url('transaksi/permintaandelete/' . $bukti->id) ?>" class="btn btn-danger">Barang Sudah Dikembalikan</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>