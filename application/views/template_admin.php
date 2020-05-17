<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sejayacorp</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/synchronize.jpg') ?>">
    <!-- Pignose Calender -->
    <link href="<?= base_url('assets/'); ?>plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">

    <link href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet"
		type="text/css">

    <!-- Custom Stylesheet -->
    <?php if ($konten == 'index.php/admin/scan') { ?>
        <link href="<?= base_url(); ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/qr/css/style.css" rel="stylesheet">
    <?php } ?>

    <link href="<?= base_url('assets/'); ?>css/style_admin.css" rel="stylesheet">



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> -->
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html" style="color:white;">
                   SYNCHRONIZE
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <!-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge badge-pill gradient-1">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-1">3</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/2.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Adam Smith</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Can you do me a favour?</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/3.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Barak Obama</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/4.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Hilari Clinton</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hello</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li> -->

                        <li class="icons d-none d-md-flex">
                            <a href="javascript:void(0)">
                                <b><span><h5 style="color: grey;"><?= $_SESSION['nama']; ?></h5></span></b>
                            </a>

                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="<?= base_url() ?>assets/img/user.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <!-- <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>

                                        </li>

                                        <hr class="my-2">
                                        <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li> -->
                                        <li><a href="<?= base_url('index.php/log/logout') ?>"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">ADMIN PAGE</li>
                    <li>
                        <a href="<?= base_url('index.php/admin/dashboard') ?>" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="<?= base_url('index.php/admin') ?>" aria-expanded="false">
                            <i class="fa fa-fw fa-user"></i><span class="nav-text">Data Admin</span>
                        </a>
                    </li> -->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Data</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('index.php/admin/admin') ?>">Data Admin</a></li>
                            <li><a href="<?= base_url('index.php/admin/member') ?>">Data Member</a></li>
                            <li><a href="<?= base_url('index.php/admin/guest_star') ?>">Data Guest</a></li>
                            <li><a href="<?= base_url('index.php/admin/tiket') ?>">Data Tiket</a></li>
                            <li><a href="<?= base_url('index.php/admin/dj') ?>">Data DJ</a></li>
                            <li><a href="<?= base_url('index.php/admin/data_event') ?>">Data Event</a></li>
                            <li><a href="<?= base_url('index.php/admin/sponsor') ?>">Data Sponsor</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/admin/transaksi') ?>" aria-expanded="false">
                            <i class="fa fa-fw fa-cart-plus"></i><span class="nav-text">Transaksi Masuk <sup class="badge badge-info"><?= $this->db->count_all('transaksi'); ?></sup></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/admin/scan') ?>" aria-expanded="false">
                            <i class="fa fa-fw fa-search"></i><span class="nav-text">Scan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/admin/galeri') ?>" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Galeri</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/admin/editable_home') ?>" aria-expanded="false">
                            <i class="fa fa-fw fa-home"></i><span class="nav-text">Ubah Tampilan User</span>
                        </a>
                    </li>
                    
                    <!-- <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Layouts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?//= base_url('admin/dashboard/ss') ?>">Data Guest Star</a></li>
                            <li><a href="./layout-one-column.html">One Column</a></li>
                            <li><a href="./layout-two-column.html">Two column</a></li>
                            <li><a href="./layout-compact-nav.html">Compact Nav</a></li>
                            <li><a href="./layout-vertical.html">Vertical</a></li>
                            <li><a href="./layout-horizontal.html">Horizontal</a></li>
                            <li><a href="./layout-boxed.html">Boxed</a></li>
                            <li><a href="./layout-wide.html">Wide</a></li>


                            <li><a href="./layout-fixed-header.html">Fixed Header</a></li>
                            <li><a href="layout-fixed-sidebar.html">Fixed Sidebar</a></li>
                        </ul>
                    </li> -->

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3" id="QR-Code">
                <?php $this->load->view($konten); ?>




            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by Synchronize Team</p>

            </div>
        </div>
        <!--**********************************
            Footer endlayo
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->


    <script src="<?= base_url('assets/'); ?>plugins/common/common.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/custom.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/settings.js"></script>
    <script src="<?= base_url('assets/'); ?>js/gleek.js"></script>
    <script src="<?= base_url('assets/'); ?>js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="<?= base_url('assets/'); ?>plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="<?= base_url('assets/'); ?>plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="<?= base_url('assets/'); ?>plugins/d3v3/index.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/topojson/topojson.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="<?= base_url('assets/'); ?>plugins/raphael/raphael.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="<?= base_url('assets/'); ?>plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="<?= base_url('assets/'); ?>plugins/chartist/js/chartist.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="<?= base_url('assets/'); ?>js/dashboard/dashboard-1.js"></script>

</body>

</html>
