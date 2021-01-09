<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container text-white">
    <h1>Transaksi</h1>
    <table class="table text-white">
        <thead>
            <tr>
                <th>No</th>
                <th>No Transaksi</th>
                <th>Barang</th>
                <th>Penyewa</th>
                <th>Alamat</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Sewa Dari</th>
                <th>Sewa Sampai</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($transaksi as $trans) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $trans->id ?></td>
                    <td><?= $trans->produk_id ?></td>
                    <td><?= $trans->user_id ?></td>
                    <td><?= $trans->alamat ?></td>
                    <td><?= $trans->jumlah ?></td>
                    <td><?= $trans->total ?></td>
                    <td><?= $trans->waktu_pinjam ?></td>
                    <td><?= $trans->waktu_kembali ?></td>
                    <td>
                        <a href="<?= site_url('transaksi/view/' . $trans->id) ?>" class="btn btn-primary">View</a>
                        <a href="<?= site_url('transaksi/invoice/' . $trans->id) ?>" class="btn btn-info">Invoice</a>
                        <a href="<?= site_url('transaksi/delete/' . $trans->id) ?>" class="btn btn-danger">Cancel</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>