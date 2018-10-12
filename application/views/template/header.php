<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SPTA</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?=base_url();?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery.dataTables.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/css.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico" />
</head>
<body>

    <?php

        $user = $this->session->userdata('logged_in');
        $profile = $this->session->userdata('profile');

        if($user){
            ?>
            <div class="container-scroller">
            <?php
            include 'navbar.php';
            ?>
            <div class="container-fluid page-body-wrapper">
            <?php
            include 'sidebar.php';
            ?>
                <div class="main-panel">
<?php
        }

?>