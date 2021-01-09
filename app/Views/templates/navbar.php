<header style="height: 80px;background: rgba(247,130,0,0);width: 1903px;">
    <nav class="navbar navbar-dark navbar-expand-md fixed-top d-xl-flex" style="width: 1140px;margin: 0px;margin-left: 381px;border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;background: rgb(34,40,49);box-shadow: 0px 10px 7px 1px rgba(0,0,0,0.52);">
        <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#menu"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"><i class="la la-navicon"></i></span></button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav flex-grow-1 justify-content-between ">
                    <li class="nav-item d-none d-xs-block d-md-block"><a class="nav-link" href="<?= base_url(); ?>/user/index"><img src="<?= base_url(); ?>/img/logoSewakuy.png" style="height: 25px;"></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/user/produk">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/user/sewa">Sedang Sewa</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('User/hasilpreorder'); ?>">PreOrder</a></li>
                    <li class="nav-item d-none d-xs-block d-md-block"><a class="nav-link" href="#"><i class="icon ion-ios-search-strong"></i></a></li>
                    <li class="nav-item d-none d-xs-block d-md-block"><a class="nav-link" href="<?= site_url('transaksi/index'); ?>"><i class="icon ion-android-cart" style="font-weight: normal;font-size: 18px;"></i></a></li>
                    <li class="nav-item d-none d-xs-block d-md-block">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" type="button" data-toggle="dropdown"><?= user()->username; ?></a>
                            <div class=" dropdown-menu" style="background-color: #00adb5;">
                                <a class="dropdown-item nav-link text-light" href="<?= base_url(); ?>/user/profile"><i class='fas fa-user-alt mr-2'></i>My Profile</a>
                                <a class="dropdown-item nav-link text-light" href="<?= base_url(); ?>/user/notif"><i class='fas fa-bell mr-2'></i>Notifikasi</a>
                                <a class="dropdown-item nav-link text-light" data-toggle="modal" data-target="#exampleModal" href="<?= base_url('logout'); ?>"><i class="fas fa-sign-out-alt mr-2"></i>LogOut</a>
                                <?php if (in_groups('admin')) : ?>
                                    <a class="dropdown-item nav-link text-light" href="<?= base_url(); ?>/Admin/index"><i class="fas fa-user-lock mr-2"></i></i>Admin</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>