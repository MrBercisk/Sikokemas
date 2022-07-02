<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="<?= base_url('assets/admin/vendor/jqvmap/css/jqvmap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/chartist/css/chartist.min.css') ?>">
    <link href="<?= base_url('assets/admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/admin/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/admin/css/style.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
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


            <a href="<?= base_url('admin') ?>" class="brand-logo">
                <img class="logo-abbr" src="<?= base_url('assets/img/5425751-ai-removebg-preview.png') ?>">

            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">


                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <!-- <div class="header-info">
										<span class="text-black">Hello,<strong>Franklin</strong></span>
										<p class="fs-12 mb-0">Super Admin</p>
									</div> -->
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0">
                                            <?= $this->session->userdata('nama_login'); ?>
                                            <?php

                                          

                                            if($this->session->userdata('nama_puskesmas')=="")
                                            {
                                                echo "Admin Utama";
                                            }
                                            else
                                            {
                                                echo "Petugas Puskesmas (".$this->session->userdata('nama_puskesmas').")";
                                            }
                                            ?>


                                        </h4>
                                    </div>
                                    <img src="<?= base_url('assets/img/default.jpg') ?>" width="20" alt="" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="<?= base_url('admin/profiladm') ?>" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="<?= base_url('auth/logout') ?>" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->




<!--************
            Sidebar start
        *************-->
        <div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Menu</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                    <li><a href="<?= base_url('antrian_admin') ?>">Data Antrian </a></li>
                    <li><a href="<?= base_url('data_riwayat_pengobatan') ?>">Data Riwayat Pengobatan </a></li>
                    <li><a href="<?= base_url('data_dokter') ?>">Data Dokter</a></li>
                    <li><a href="<?= base_url('data_obat') ?>">Data Obat</a></li>
                    <li><a href="<?= base_url('data_puskesmas') ?>">Data Puskesmas</a></li>
                    <li><a href="<?= base_url('user_manajemen') ?>">User Manajemen</a></li>
                </ul>
            </li>

        </ul>

        <div class="copyright">
            <p><strong>Sikokemas Admin Dashboard</strong> © 2021 All Rights Reserved</p>
            <p>Made with by SIKOKEMAS</p>
        </div>
    </div>
</div>
<!--************
            Sidebar end
        *************-->