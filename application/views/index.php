<?php
if (empty($this->session->userdata['level'])) {
    redirect(site_url('akses/'));
} else {
    if ($this->session->userdata['user'] == "manager") {
        $master = "hidden";
        $laporan = "";
    } else {
        $master = "";
        $laporan = "";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $title; ?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('assets/images/logov2.png') ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/plugins/node-waves/waves.css'); ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/plugins/animate-css/animate.css'); ?> " rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?= base_url('assets/plugins/morrisjs/morris.css'); ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url('assets/css/themes/all-themes.css'); ?>" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="<?= base_url('assets/plugins/sweetalert/sweetalert.css') ?>" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?= base_url('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') ?>" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="<?= base_url('assets/plugins/multi-select/css/multi-select.css') ?>" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?= base_url('assets/plugins/bootstrap-select/css/bootstrap-select.css') ?>" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="<?= base_url('assets/plugins/nouislider/nouislider.min.css') ?>" rel="stylesheet" />


    <style type="text/css">
        .block-header {
            text-transform: uppercase;
        }

        .row a {
            text-decoration: none;
        }
    </style>

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?= site_url('beranda/p/beranda') ?>" style="text-transform: uppercase;">FLASH LAUNDRY APP</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url('assets/images/user.png') ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <br>
                        <?= $this->session->userdata['user'] ?>
                    </div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" style="color: gray;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li><a href="<?= site_url('akses/logout') ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="<?= site_url('beranda/p/beranda') ?>">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li <?= $master; ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Master Data</span>
                        </a>
                        <ul class="ml-menu">
                            <li><a href="<?= site_url('kasir/p/data')  ?>">User</a></li>
                            <li><a href="<?= site_url('konsumen/p/data')  ?>">Customer</a></li>
                            <li><a href="<?= site_url('paket/p/data')  ?>">Service</a></li>
                            <li><a href="<?= site_url('transaksi/p/data')  ?>">Transaction</a></li>
                        </ul>
                    </li>

                    <li <?= $laporan; ?>>
                        <a href="<?= site_url('transaksi/p/laporan') ?>">
                            <i class="material-icons">assignment</i>
                            <span>Report</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2021 <a href="javascript:void(0);">Kevin Gilbert Toding</a>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <!-- Content -->
    <section class="content">
        <div class="container-fluid">
            <?php include $folder . "/" . $p . ".php"; ?>
        </div>
    </section>
    <!-- #END# Content -->

    <!-- Default Size -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.js') ?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?= base_url('assets/plugins/bootstrap-select/js/bootstrap-select.js'); ?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?= base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') ?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('assets/plugins/node-waves/waves.js') ?>"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?= base_url('assets/plugins/jquery-countto/jquery.countTo.js') ?>"></script>

    <!-- Morris Plugin Js -->
    <script src="<?= base_url('assets/plugins/raphael/raphael.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/morrisjs/morris.js') ?>"></script>

    <!-- ChartJs -->
    <script src="<?= base_url('assets/plugins/chartjs/Chart.bundle.js') ?>"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?= base_url('assets/plugins/flot-charts/jquery.flot.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/flot-charts/jquery.flot.resize.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/flot-charts/jquery.flot.pie.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/flot-charts/jquery.flot.categories.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/flot-charts/jquery.flot.time.js') ?>"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?= base_url('assets/plugins/jquery-sparkline/jquery.sparkline.js') ?>"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('assets/js/admin.js') ?>"></script>
    <script src="<?= base_url('assets/js/pages/index.js') ?>"></script>

    <!-- Demo Js -->
    <script src="<?= base_url('assets/js/demo.js') ?>"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="<?= base_url('assets/plugins/jquery-validation/jquery.validate.js') ?>"></script>
    <script src="<?= base_url('assets/js/pages/forms/form-validation.js') ?>"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="<?= base_url('assets/plugins/jquery-steps/jquery.steps.js') ?>"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="<?= base_url('assets/plugins/sweetalert/sweetalert.min.js') ?>"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?= base_url('assets/plugins/jquery-datatable/jquery.dataTables.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js') ?>"></script>

    <!-- Multi Select Plugin Js -->
    <script src="<?= base_url('assets/plugins/multi-select/js/jquery.multi-select.js'); ?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('ul li').click(function() {
                $('li').removeClass(".active");
                $(this).addClass(".active");
            });
        });
    </script>
    <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
    <script type="text/javascript">
        function cetak(div) {
            var b = document.getElementById(div).innerHTML;
            window.frames["print_frame"].document.title = document.title;
            window.frames["print_frame"].document.body.innerHTML = b;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>
</body>

</html>