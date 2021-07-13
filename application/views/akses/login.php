<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $title; ?></title>
    <!-- Favicon-->
    <link rel="icon" href="#" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/plugins/node-waves/waves.css') ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/plugins/animate-css/animate.css') ?>" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="<?= base_url('assets/plugins/sweetalert/sweetalert.css') ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url('assets/css/themes/all-themes.css') ?>" rel="stylesheet" />

</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo" style="font-family: sans-serif;">
            <a href="javascript:void(0);"> <b style="color: gray;"> FLASH LAUNDRY</b></a>
            <br>
            <small style="color: gray; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">A Personal and Professional Cleaning</small>
        </div>
        <div class="card" style="border-radius: 30px;">
            <div class="body">
                <?= form_open_multipart(site_url('akses/login')); ?>
                <div class="msg" style="font-family: sans-serif; font-size:larger;"><b>LOGIN</b></div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="user" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="pass" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn btn-block bg-blue waves-effect" type="submit" style="border-radius: 15px;">LOGIN</button>
                    </div>
                </div>
                <?php form_close() ?>
            </div>

        </div>
    </div>

    <!-- #END# Vertical Layout -->

    <!-- Jquery Core Js -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.js') ?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?= base_url('assets/plugins/bootstrap-select/js/bootstrap-select.js') ?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?= base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') ?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('assets/plugins/node-waves/waves.js') ?>"></script>

    <!-- Custom Js -->
    <script src="<?= base_url('assets/js/admin.js') ?>"></script>

    <!-- Demo Js -->
    <script src="<?= base_url('assets/js/demo.js') ?>"></script>

</body>

</html>