<?= $this->extend('toko/template/pagetemplate'); ?>

<?= $this->section('toko-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Produk</h1>
    <div class="row">
        <div class="col-lg-10">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">produk Id</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Gambar Produk</th>
                        <th scope="col">Deskripsi Produk</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($produk as $barangs) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $barangs->nama_produk; ?></td>
                            <td><?= $barangs->id; ?></td>
                            <td><?= $barangs->stok; ?></td>
                            <td><?= $barangs->harga; ?></td>
                            <td>
                                <img style="width: 200px; height: 300px; object-fit: cover;" src="<?= base_url('uploads/' . $barangs->gambar_produk); ?>"></img>
                            </td>
                            <td><?= $barangs->deskripsi_produk; ?></td>
                            <td>
                                <a href="<?= site_url('toko/index/' . $barangs->id) ?>" class="btn btn-success">View</a>
                                <a href="<?= site_url('toko/update/') . $barangs->id ?>" class="btn btn-primary">Update</a>
                                <a href="<?= site_url('toko/delete/') . $barangs->id ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>
</div>
<?= $this->endSection(); ?>