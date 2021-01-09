<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h4 class="text-white">Transaksi No <?= $transaksi->transaksi_id ?></h4>
    <table class="table text-white">
        <tr>
            <td>Barang</td>
            <td><?= $transaksi->nama_produk ?></td>
        </tr>
        <tr>
            <td>Penyewa</td>
            <td><?= $transaksi->username ?></td>
        </tr>
        <tr>
            <td>Pinjam Dari</td>
            <td><?= $transaksi->waktu_pinjam ?></td>
        </tr>
        <tr>
            <td>Kembali Dari</td>
            <td><?= $transaksi->waktu_kembali ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?= $transaksi->alamat ?></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><?= $transaksi->jumlah ?></td>
        </tr>
        <tr>
            <td>Total Harga</td>
            <td><?= $transaksi->total ?></td>
        </tr>
        <tr>
            <td>No Rekening</td>
            <td>5432186033</td>
        </tr>
    </table>
    <div><a href="<?= site_url('transaksi/bukti'); ?>" class="btn btn-primary">Kirim Bukti Pembayaran</a>
    </div>
</div>

<?= $this->endSection(); ?>