<?php if (in_groups('admin')) : ?>
    <?= $this->extend('admin/templates/template'); ?>
    <?= $this->section('admin-content'); ?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">User Detail</h1>
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('/img/' . $toko->toko_image); ?>" class="card-img ml-2 mt-4 " alt="<?= $toko->nama_toko; ?>">
                        </div>

                        <div class="col-md-8">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <h4><?= $toko->username; ?></h4>
                                    </li>

                                    <?php if ($toko->nama_toko) : ?>
                                        <li class="list-group-item"><?= $toko->nama_toko; ?></li>
                                    <?php endif; ?>

                                    <li class="list-group-item"><?= $toko->email; ?></li>

                                    <li class="list-group-item">
                                        <span class="badge badge-primary"><?= $role; ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <small><a href="<?= base_url('admin') ?>">&laquo; back to user list</a></small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <?= $this->endSection(); ?>
<?php endif; ?>