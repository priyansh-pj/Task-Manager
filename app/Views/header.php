<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Project Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href=<?= base_url("public/assets/images/favicon.ico") ?>>

    <!-- Plugin css -->
    <link href=<?= base_url("public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css") ?> rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src=<?= base_url("public/assets/js/hyper-config.js") ?>></script>

    <!-- App css -->
    <link href=<?= base_url("public/assets/css/app-saas.min.css") ?> rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href=<?= base_url("public/assets/css/icons.min.css") ?> rel="stylesheet" type="text/css" />

    <!-- Datatable -->
    <link href=<?= base_url("public/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css") ?> rel="stylesheet" type="text/css" />
    <link href=<?= base_url("public/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css") ?> rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-lg-2 gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="index.html" class="logo-light">
                            <span class="logo-lg">
                                <h2 style="color: white;">Task Manager</h2>
                            </span>
                            <span class="logo-sm">
                                <h2 style="color: white;">T</h2>
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="index.html" class="logo-dark">
                            <span class="logo-lg">
                                <h2 style="color: white;">Task Manager</h2>
                            </span>
                            <span class="logo-sm">
                                <h2 style="color: white;">T</h2>
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                    <!-- Topbar Search Form -->

                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">






                    <li class="d-none d-sm-inline-block">
                        <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left" title="Theme Mode">
                            <i class="ri-moon-line font-22"></i>
                        </div>
                    </li>


                    <li class="d-none d-md-inline-block">
                        <a class="nav-link" href="" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line font-22"></i>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src=<?= base_url("public/assets/images/users/avatar-1.jpg") ?> alt="user-image" width="32" class="rounded-circle">
                            </span>
                            <span class="d-lg-flex flex-column gap-1 d-none">
                                <h5 class="my-0"><?= $profile->name ?></h5>
                                <h6 class="my-0 fw-normal"><?php if ($profile->is_admin) {
                                                                echo "Admin";
                                                            } else {
                                                                echo "User";
                                                            } ?></h6>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->

                            <!-- item-->
                            <a href="<?= base_url('logout') ?>" class="dropdown-item">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- Brand Logo Light -->
            <a href="index.html" class="logo logo-light">
                <span class="logo-lg">
                    <h2 style="color: white;">Task Manager</h2>
                </span>
                <span class="logo-sm">
                    <h2 style="color: white;">T</h2>
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="index.html" class="logo logo-dark">
                <span class="logo-lg">
                    <h2 style="color: white;">Task Manager</h2>
                </span>
                <span class="logo-sm">
                    <h2 style="color: white;">T</h2>
                </span>
            </a>

            <!-- Sidebar Hover Menu Toggle Button -->
            <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
                <i class="ri-checkbox-blank-circle-line align-middle"></i>
            </div>

            <!-- Full Sidebar Menu Close Button -->
            <div class="button-close-fullsidebar">
                <i class="ri-close-fill align-middle"></i>
            </div>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>

                <!--- Sidemenu -->
                <ul class="side-nav">

                    <?php if ($profile->is_admin) : ?>
                        <li class="side-nav-title">Admin</li>

                        <li class="side-nav-item">
                            <a href="<?= base_url('ManageUsers') ?>" class="side-nav-link">
                                <i class="uil-users-alt"></i>
                                <span> Manager User</span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="<?= base_url('UserTask') ?>" class="side-nav-link">
                                <i class="uil-book-reader"></i>
                                <span> User Tasks</span>
                            </a>
                        </li>


                    <?php endif; ?>
                    <li class="side-nav-title">User</li>

                    <li class="side-nav-item">
                        <a href="<?= base_url('Task/' . $profile->id) ?>" class="side-nav-link">
                            <i class="uil-clipboard-alt"></i>
                            <span> Manage Tasks </span>
                        </a>
                    </li>


                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">