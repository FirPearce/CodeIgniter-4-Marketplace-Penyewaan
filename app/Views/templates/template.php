<!DOCTYPE html>
<html style="width: 1903px;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="<?= base_url(); ?>/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/fonts/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/Advanced-Pricing-Cards.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/Animated-CSS-Waves-Background-SVG.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/Animated-gradient-background-1.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/Animated-gradient-background-2.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/Animated-gradient-background.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/Loading-Page-Animation-Style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/Navbar---Apple-1.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/Navbar---Apple.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/Pretty-Footer.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/responsive-navbar.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/Skeleton-Loader.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>/css/modal.css">
</head>

<body style="background: rgb(34,40,49);height: 1500px;width: 1903px;margin-bottom: 0px;">

    <?= $this->include('templates/navbar'); ?>

    <?= $this->renderSection('content'); ?>

    <!-- Modal -->
    <div class="modal fade zoom-in" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a type="button" class="btn border text-white" style="background-color: #00adb5;" href="<?= base_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success" href="<?= base_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div> -->

    <script src="<?= base_url(); ?>/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/js/Advanced-Pricing-Cards.js"></script>
    <script src="<?= base_url(); ?>/js/Animated-gradient-background.js"></script>
    <script src="<?= base_url(); ?>/js/Loading-Page-Animation-Style.js"></script>
    <script src="<?= base_url(); ?>/js/Navbar---Apple.js"></script>
    <script src="<?= base_url(); ?>/js/scroll.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="<?= base_url(); ?>/js/jquery-3.5.1.min.js"></script>
    <?= $this->renderSection('script'); ?>
</body>

</html>