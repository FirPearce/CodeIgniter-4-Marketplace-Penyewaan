<?= $this->extend('toko/template/templates'); ?>


<?= $this->section('toko_content'); ?>
<?php
$username = [
    'name' => 'username',
    'id' => 'username',
    'value' => null,
    'class' => 'form-control',
];
$password = [
    'name' => 'password',
    'id' => 'password',
    'type' => 'text',
    'class' => 'form-control',
];

$session = session();
$errors = $session->getFlashdata('errors');
?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <?php if (session()->getFlashdata('msg')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <?= form_open('Auth/login') ?>
            <span class="login100-form-title p-b-26">
                Welcome
            </span>

            <div class="form-group">
                <?= form_label("Username", "username") ?>
                <?= form_input($username) ?>
            </div>

            <div class="form-group">
                <?= form_label("Password", "password") ?>
                <?= form_password($password) ?>
            </div>


            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>
            </div>
            <?= form_close() ?>

            <div class="text-center p-t-115">
                <span class="txt1">
                    Don’t have an account?
                </span>

                <a class="txt2" href="<?= site_url('auth/register') ?>">
                    Sign Up
                </a>
            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>