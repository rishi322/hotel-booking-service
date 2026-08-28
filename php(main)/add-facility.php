<?php

$conn = mysqli_connect('localhost', 'root', '', 'hotel_booking');
$message = "";
$alert = 0;

if (isset($_POST['add_hotel'])) {

    $hid = $_POST['hotel'];
    $tid = $_POST['type'];

    $result = mysqli_query($conn, "INSERT INTO `hotel_facility_master`(`hid`, `fid`) VALUES($hid,$tid)");


    if ($result) {
        $message = "Facility succesfully added!";
        $alert = 1;
    } else {
        $alert = 2;
        $message = "Failed to add!";
    }
    // Process the form data (perform any desired operations)

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets1/images/favicon.ico">

    <link href="../plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">

    <link href="assets1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets1/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets1/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets1/css/style.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link rel="stylesheet" href="css/fade.css">
    <script src="js/fade.js"></script>

    <style>
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-100%);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .slide-in {
            opacity: 0;
            animation: slideIn 1s ease-in-out;
            animation-fill-mode: forwards;
        }
    </style>



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
        <div class="content-page ">

            <!-- Start content -->
            <div class="content">





                <div class="page-title-box">
                    <div class="container-fluid">
                        <?php if ($alert == 1) {
                        ?> <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong><?php echo $message ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div> <?php
                                } else if ($alert == 2) {
                                    ?> <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?php echo $message ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div> <?php
                                }  ?>

                        <div class="row align-items-center ">
                            <div class="col-md-8">
                                <div class="page-title-box">
                                    <h4 class="page-title slide-in">Add Facilities</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active slide-in">Welcome to Hotel Booking!!</li>
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
                    <?php
                    include 'stats2.php'
                    ?>
                    <!-- end top-Contant -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4 fade-in">Fill Up</h4>

                                    <form method="POST" id="insert" class="fade-in">



                                        <div class="form-row">

                                            <div class="form-group col-md-4">
                                                <label>Hotel</label>
                                                <select id="hotel" name="hotel" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <?php
                                                    $conn = mysqli_connect('localhost', 'root', '', 'hotel_booking') or die('failed connection');
                                                    $sql = "select * from hotel_master";
                                                    $result = mysqli_query($conn, $sql) or die('query failed');
                                                    if ($result) {
                                                        // Fetch the rows from the result set
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $stateId = $row['hid'];
                                                            $stateName = $row['hname'];

                                                            // Display the state information
                                                    ?><option value=<?php echo $stateId ?>><?php

                                                                                            echo $stateName; ?> </option> <?php
                                                                                                                        }
                                                                                                                    } else {
                                                                                                                        // Handle the case when the query fails
                                                                                                                        echo "Error executing query: " . mysqli_error($connection);
                                                                                                                    }

                                                                                                                            ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>type</label>
                                                <select id="type" name="type" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <?php
                                                    $conn = mysqli_connect('localhost', 'root', '', 'hotel_booking') or die('failed connection');
                                                    $sql = "select * from facility_master";
                                                    $result = mysqli_query($conn, $sql) or die('query failed');
                                                    if ($result) {
                                                        // Fetch the rows from the result set
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $tid = $row['fid'];
                                                            $name = $row['fname'];

                                                            // Display the state information
                                                    ?><option value=<?php echo $tid ?>><?php

                                                                                        echo $name; ?> </option> <?php
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    // Handle the case when the query fails
                                                                                                                    echo "Error executing query: " . mysqli_error($connection);
                                                                                                                }

                                                                                                                        ?>
                                                </select>
                                            </div>


                                        </div>

                                        <button type="submit" name="add_hotel" class="btn btn-primary fade-scroll">Add</button>
                                    </form>


                                </div>
                            </div>

                        </div>
                        <!-- end row -->


                        <div class="row ">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title mb-12 ">Latest Projects</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Facility Id</th>
                                                        <th scope="col">Hotel Name</th>
                                                        <th scope="col">Facility Name</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $fac = mysqli_query($conn, "select h.hname,h.hid,f.fid,f.fname,hf.hid, hf.hfid,hf.fid from hotel_master h, facility_master f, hotel_facility_master hf where h.hid = hf.hid and f.fid = hf.fid");


                                                    if (mysqli_num_rows($fac) > 0) {
                                                        while ($facility = mysqli_fetch_assoc($fac)) {
                                                    ?>
                                                            <tr>
                                                            <td><?php echo $facility['hfid'];?></td>
                                                                <td><?php echo $facility['hname'];?></td>
                                                                <td> <?php echo $facility['fname']?> </td>
                                                               
                                                            </tr>
                                                    <?php
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

                    <!-- container-fluid -->

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


<!-- Mirrored from themesdesign.in/zegva/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 May 2023 09:39:05 GMT -->

</html>