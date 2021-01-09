<?= $this->extend('toko/template/templates'); ?>


<?= $this->section('toko_content'); ?>
<?php
$username = [
    'name' => 'username',
    'id' => 'username',
    'value' => null,
    'class' => 'form-control',
];
$nama_toko = [
    'name' => 'nama_toko',
    'id' => 'nama_toko',
    'value' => null,
    'class' => 'form-control',
];
$email = [
    'name' => 'email',
    'id' => 'email',
    'value' => null,
    'class' => 'form-control',
];
$password = [
    'name' => 'password',
    'id' => 'password',
    'type' => 'text',
    'class' => 'form-control',
];
$repeatpassword = [
    'name' => 'repeatpassword',
    'id' => 'repeatpassword',
    'type' => 'text',
    'class' => 'form-control',
];
$session = session();
$errors = $session->getFlashdata('errors');
?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <?php if ($errors != null) : ?>
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Terjadi Kesalahan</h4>
                    <hr>
                    <p class="mb-0">
                        <?php
                        foreach ($errors as $eror) {
                            echo $eror . '<br>';
                        }
                        ?>
                    </p>
                </div>
            <?php endif; ?>
            <span class="login100-form-title p-b-26">
                Register
            </span>

            <?= form_open('Auth/register') ?>
            <div class="form-group">
                <?= form_label("Username", "username") ?>
                <?= form_input($username) ?>
            </div>
            <div class="form-group">
                <?= form_label("Nama Toko", "nama_toko") ?>
                <?= form_input($nama_toko) ?>
            </div>
            <div class="form-group">
                <?= form_label("Email", "email") ?>
                <?= form_input($email) ?>
            </div>
            <div class="form-group">
                <?= form_label("Password", "password") ?>
                <?= form_password($password) ?>
            </div>
            <div class="form-group">
                <?= form_label("Repeat Password", "repeatpassword") ?>
                <?= form_password($repeatpassword) ?>
            </div>

            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn" type="submit" name="submit">
                        Register
                    </button>
                </div>
            </div>
            <?= form_close() ?>

            <div class="text-center p-t-115">
                <span class="txt1">
                    Do you have an account?
                </span>

                <a class="txt2" href="<?= site_url('auth/login') ?>">
                    Login
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>