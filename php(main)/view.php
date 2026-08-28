<?php
$conn = mysqli_connect("localhost", "root", "", "hotel_booking");

if (isset($_GET['delete'])) {
    $hid = $_GET['hid'];
    $sql = mysqli_query($conn, "delete from room_master where hid = $hid");
    $sql2 = mysqli_query($conn, "delete from hotel_facility_master where hid = $hid");
    $sql3= mysqli_query($conn, "delete from description_master where hid = $hid");
    $sql4 = mysqli_query($conn, "delete from coverpic_tb where hid = $hid");
    $sql5 = mysqli_query($conn, "delete from comment_master where hid = $hid");
    $sql6 = mysqli_query($conn, "delete from booking_tb where hid = $hid");
    if ($sql && $sql2 && $sql3 && $sql4 && $sql5 && $sql6) {
        $sql7 = mysqli_query($conn, "delete from hotel_master where hid = $hid");
    }
}


?>



<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themesdesign.in/zegva/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 May 2023 09:38:29 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Hotel - Responsive Admin & Dashboard Template | Themesdesign</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets1/images/favicon.ico">

    <link href="../plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <link rel="stylesheet" href="css/fade.css">

    <link href="assets1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets1/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets1/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets1/css/style.css" rel="stylesheet" type="text/css">
    <link href="hotels.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/fade.js"></script>

    <script>
        $(document).ready(function() {
            $('#state').change(function() {
                var stateId = $(this).val();
                $.ajax({
                    url: 'get_cities.php',
                    type: 'POST',
                    data: {
                        stateId: stateId
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Clear previous options
                        $('#city').empty();
                        // Add new options based on the response
                        response.forEach(function(city) {
                            $('#city').append('<option value="' + city.cityId + '">' + city.cityName + '</option>');
                        });
                    }
                });
            });
        });
    </script>
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo">
                    Hotel Booking
                </a>
            </div>

            <!-- Search input -->
            <div class="search-wrap" id="search-wrap">
                <div class="search-bar">
                    <input class="search-input" type="search" placeholder="Search" />
                    <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                        <i class="mdi mdi-close-circle"></i>
                    </a>
                </div>
            </div>

            <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">

                    <li class="list-inline-item dropdown notification-list d-none d-md-inline-block">
                        <a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap">
                            <i class="fas fa-search noti-icon"></i>
                        </a>
                    </li>


                    <!-- full screen -->
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                            <i class="fas fa-expand noti-icon"></i>
                        </a>
                    </li>

                    <!-- notification -->
                    <li class="dropdown notification-list list-inline-item">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fas fa-bell noti-icon"></i>
                            <span class="badge badge-pill badge-danger noti-icon-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                            <!-- item-->
                            <h6 class="dropdown-item-text">
                                Notifications
                            </h6>
                            <div class="slimscroll notification-item-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                                    <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                                    <p class="notify-details"><b>Your item is shipped</b><span class="text-muted">It is a long established fact that a reader will</span></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i></div>
                                    <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                </a>

                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center notify-all text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown notification-list list-inline-item">
                        <div class="dropdown notification-list nav-pro-img">
                            <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets1/images/users/user-1.jpg" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-wallet"></i> My Wallet</a>
                                <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline"></i> Lock screen</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"><i class="mdi mdi-power text-danger"></i> Logout</a>
                            </div>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php


        include 'admin-nav.php';
        ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">
                    <div class="page-title-box">

                        <div class="row align-items-center ">
                            <div class="col-md-8">
                                <div class="page-title-box">
                                    <h4 class="page-title">Your Hotels</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Welcome to Hotel Booking!!</li>
                                    </ol>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="float-right d-none d-md-block app-datepicker">
                                    <input type="text" class="form-control" data-date-format="MM dd, yyyy" readonly="readonly" id="datepicker">
                                    <i class="mdi mdi-chevron-down mdi-drop"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page-title -->

                    <!-- start top-Contant -->
                    <div class="row">
                        <?php

                        $sql = "select * from hotel_master";
                        $conn = mysqli_connect('localhost', 'root', '', 'hotel_booking');
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($rows = mysqli_fetch_assoc($result)) {
                                $hid = $rows['hid'];
                                $name = $rows['hname'];
                                $location = $rows['street'];
                                $image = $rows['photos'];
                        ?>

                                <div class="col-sm-6 col-xl-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center p-1">
                                                <div class="col-lg-6">
                                                    <h5 class="font-20 "> <?php echo $name ?></h5>
                                                    <span> <img float="left" width="210%" height="100%" src="<?php echo $image ?>"></span>
                                                    <h5 class="text-info pt-1 mb-0"><?php 
                                                    
                                                    $price = mysqli_query($conn,"select * from room_master where hid = $hid LIMIT 1");
                                                    if(mysqli_num_rows($price)>0){
                                                        $amt = mysqli_fetch_assoc($price);

                                                       echo "Rs.".$amt['price_per_room'];
                                                    }
                                                    
                                                    ?></h4>
                                                        <form action="view.php" method="GET">
                                                            <input type="hidden" name="hid" value="<?php echo $rows['hid'] ?>">
                                                            <button type="submit" name="delete" class="btn btn-primary ">Delete</button>
                                                        </form>
                                                </div>
                                                <div class="col-lg-6">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }

                        ?>


                        <!-- end top-Contant -->
                        <!-- Start content -->


                        <div class="container-fluid">



                        </div>
                        <!-- content -->


                    </div>
                    <!-- ============================================================== -->
                    <!-- End Right content here -->
                    <!-- ============================================================== -->

                </div>
                <!-- END wrapper -->

                <!-- jQuery  -->

                <script src="assets1/js/jquery.min.js"></script>
                <script src="assets1/js/bootstrap.bundle.min.js"></script>
                <script src="assets1/js/metismenu.min.js"></script>
                <script src="assets1/js/jquery.slimscroll.js"></script>
                <script src="assets1/js/waves.min.js"></script>

                <script src="../plugins/apexchart/apexcharts.min.js"></script>
                <script src="../plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

                <!--Morris Chart-->
                <script src="../plugins/morris/morris.min.js"></script>
                <script src="../plugins/raphael/raphael.min.js"></script>

                <script src="assets1/pages/dashboard.init.js"></script>

                <!-- App js -->
                <script src="assets1/js/app.js"></script>

</body>


<!-- Mirrored from themesdesign.in/zegva/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 May 2023 09:39:05 GMT -->

</html>