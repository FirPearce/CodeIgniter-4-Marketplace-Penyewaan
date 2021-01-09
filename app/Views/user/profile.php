<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-white text-center">My Profile</h1>
    <div class="container" style="text-align: center;">
        <div class="col-lg">
            <div class="card mb-3" style="max-width: 540px; margin-left: 25%;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('/img/' . user()->user_image); ?>" class="card-img ml-2 mt-4 " alt="<?= user()->username; ?>">

                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><?= user()->username; ?></h4>
                                </li>

                                <?php if (user()->fullname) : ?>
                                    <li class="list-group-item"><?= user()->fullname; ?></li>
                                <?php endif; ?>

                                <li class="list-group-item"><?= user()->email; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<?= $this->endSection(); ?>