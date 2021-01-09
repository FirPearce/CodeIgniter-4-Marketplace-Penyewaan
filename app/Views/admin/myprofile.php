<?php if (in_groups('admin')) : ?>
    <?= $this->extend('admin/templates/template'); ?>
    <?= $this->section('admin-content'); ?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

    </div>
    <?= $this->endSection(); ?>
<?php endif; ?>