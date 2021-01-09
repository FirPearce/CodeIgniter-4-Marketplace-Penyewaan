<?php if (in_groups('admin')) : ?>
    <?= $this->extend('admin/templates/template'); ?>
    <?= $this->section('admin-content'); ?>

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">User List</h1>

        <div class="row">
            <div class="col-lg-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $user->username; ?></td>
                                <td><?= $user->email; ?></td>
                                <td><?= $user->name; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/' . $user->userid); ?>" class="btn btn-info">Detail</a>
                                    <a href="<?= base_url('admin/delete/' . $user->userid); ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php foreach ($toko as $toko) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $toko->username; ?></td>
                                <td><?= $toko->email; ?></td>
                                <td><?= $role; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/tokodetail/' . $toko->tokoid); ?>" class="btn btn-info">Detail</a>
                                    <a href="<?= base_url('admin/delete/' . $toko->tokoid); ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>
    <?= $this->endSection(); ?>
<?php endif; ?>