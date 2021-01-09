<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<?php

$session = session();
?>
<div>
    <div class="container mb-5">
        <div class="carousel slide mt-5 mb-6" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" style="border-radius: 20px; box-shadow: 0px 10px 7px 1px rgba(0,0,0,0.52);">
                <div class="carousel-item active">
                    <img class="w-100 d-block" src="<?= base_url(); ?>/img/kamera.png" alt="Slide Image">
                    <div class="carousel-caption d-none d-md-block">
                        <h4>Sewa Kamera</h4>
                        <p>Hunting Foto dengan Kamera SewaKuy</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100 d-block" src="<?= base_url(); ?>/img/mobil.png" alt="Slide Image" style="background: url(&quot;<?= base_url(); ?>/img/mobil.png&quot;);">
                    <div class="carousel-caption d-none d-md-block">
                        <h4>Sewa Mobil</h4>
                        <p>Rekreasi Keluarga dengan Mobil SewaKuy</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100 d-block" src="<?= base_url(); ?>/img/tenda.png" alt="Slide Image">
                    <div class="carousel-caption d-none d-md-block">
                        <h4>Sewa Tenda</h4>
                        <p>Berkemah Bersama Orang tercinta dengan Tenda SewaKuy</p>
                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
        </div>
    </div>

</div>

<br>
<div class="container ">
    <hr class="divider bg-secondary " style="width: 90%;">
    </hr>
</div>

<div style="height: 1800px;width: 1903px;margin-top: 125px;">
    <header style="margin: 20px;">
        <h1 style="color: rgb(255,255,255);text-align: center;margin: 0px;">DAFTAR PRODUK</h1>
    </header>
    <div class="container">
        <div class="row">
            <?php foreach ($produkz as $m) : ?>
                <div class="col-4">
                    <div class="card text-center mt-5 bg-dark">
                        <div class="card-header">
                            <span class="text-success"><strong><?= $m->nama_produk ?></strong></span>
                        </div>
                        <div class="card-body">
                            <img class="img-thumbnail" style="max-height: 150px; max-width: 100%;" src="<?= base_url('uploads/' . $m->gambar_produk) ?>" />
                            <h5 class="mt-3 text-success"><?= "Rp " . number_format($m->harga, 2, ',', '.') ?></h5>
                            <p class="text-info">Stok : <?= $m->stok ?></p>
                        </div>
                        <div class="card-footer">
                            <?php if ($m->stok < 1) : ?>
                                <a href="<?= site_url('User/cart/' . $m->id) ?>" style="width:100%" class="btn btn-success disabled">Sewa</a>
                                <a href="<?= site_url('User/pesan/' . $m->id) ?>" class="btn btn-success mt-2"><i class="fas fa-shopping-basket">Pesan</i></a>
                            <?php else : ?>
                                <a href="<?= site_url('User/cart/' . $m->id) ?>" style="width:100%" class="btn btn-success">Sewa</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>