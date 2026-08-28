<!DOCTYPE html>
<html lang="en">
<?php

include 'connection.php';

$htl = mysqli_query($conn, "select * from hotel_master");


?>

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

    <link href="assets1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets1/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets1/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets1/css/style.css" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



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

            </nav>

        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php

        include 'admin-nav.php'

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
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Welcome to JuStay Dashboard</li>
                                    </ol>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- end page-title -->

                    <!-- start top-Contant -->
                    <?php
                    include 'stats2.php';



                    ?>
                    <!-- container-fluid -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Latest Projects</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>

                                                    <th scope="col">Hotel Id</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Types of rooms</th>
                                                    <th scope="col">State</th>
                                                    <th scope="col">City</th>

                                                    <th scope="col">Minimal Price</th>
                                                    <th scope="col">Bookings</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($htl) {
                                                    if (mysqli_num_rows($htl) > 0) {
                                                        while ($hotel = mysqli_fetch_assoc($htl)) {
                                                ?>
                                                            <tr>
                                                                <td>
                                                                   
                                                                        <label class="asd" for="asd"><?php echo $hotel['hid'] ?></label>
                                                                   
                                                                </td>
                                                                <td> <?php echo $hotel['hname'] ?></td>
                                                                <td>
                                                                    <?php
                                                                    $hid = $hotel['hid'];
                                                                    $types = mysqli_query($conn, "select t.tname,t.tid,r.tid,r.hid from type_master t, room_master r where t.tid = r.tid and r.hid = $hid");

                                                                    if ($types) {
                                                                        if (mysqli_num_rows($types) > 0) {
                                                                            while ($typeid = mysqli_fetch_assoc($types)) {
                                                                                echo $typeid['tname'] . ", ";
                                                                            }
                                                                        }
                                                                    }

                                                                    ?>
                                                                </td>
                                                                <td> <?php
                                                                        $sid = $hotel['state_id'];
                                                                        $state = mysqli_query($conn, "select state from state_tb where state_id = $sid");
                                                                        $staten = mysqli_fetch_assoc($state);
                                                                        echo $staten['state'];
                                                                        $cid = $hotel['city_id'];
                                                                        $city = mysqli_query($conn, "select city from city_tb where city_id = $sid");
                                                                        $cityn = mysqli_fetch_assoc($city);


                                                                        ?></td>
                                                                <td> <?php echo $cityn['city'] ?></td>

                                                                <td><?php $amount = mysqli_query($conn, "select * from room_master where hid = $hid order by price_per_room LIMIT 1");
                                                                    $amt = mysqli_fetch_assoc($amount);
                                                                    if(mysqli_num_rows($amount)>0){
                                                                        echo "Rs. " . $amt['price_per_room'];
                                                                    } else {
                                                                        echo "-";
                                                                    }

                                                                    ?></td>
                                                                <td> <?php $count = mysqli_query($conn, "select COUNT(*) as totalb from booking_tb where hid=$hid");

                                                                        $tbook = mysqli_fetch_assoc($count);
                                                                        echo $tbook['totalb'];

                                                                        ?></td>

                                                            </tr>
                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                                <!-- start 1 -->

                                                <!-- end 1 -->

                                                <!-- start 2 -->

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>

                </div>
            </div>
            <!-- content -->

       
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>

    </script>
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