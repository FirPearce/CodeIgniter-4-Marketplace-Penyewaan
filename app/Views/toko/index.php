<?= $this->extend('toko/template/pagetemplate'); ?>

<?= $this->section('toko-content'); ?>
<h1>View Barang</h1>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <img class="img-fluid" alt="image" src="<?= base_url('uploads/' . $produks->gambar_produk) ?>" />
                </div>
            </div>
        </div>
        <div class="col-6">
            <h1 class="text-success"><?= $produks->nama_produk ?></h1>
            <h4>Harga : <?= $produks->harga ?></h4>
            <h4>Stok : <?= $produks->stok ?></h4>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>