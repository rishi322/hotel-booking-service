<?php

$conn = mysqli_connect('localhost', 'root', '', 'hotel_booking');
$message = "";
$alert = 0;

if (isset($_POST['add_hotel'])) {

    $hid = $_POST['hotel'];
    $tid = $_POST['type'];
    $no = $_POST['norooms'];
    $price = $_POST['price'];
    $adult = $_POST['adult'];
    $desc = $_POST['description'];
    $child = $_POST['child'];
    $result = mysqli_query($conn, "INSERT INTO `room_master`(`hid`, `tid`, `total_rooms`, `description`, `adults`,`price_per_room`,`childeren`)VALUES ($hid,$tid,$no,'$desc',$adult,$price,$child)");


    if ($result) {
        $message = "Hotel succesfully added!";
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
                                    <h4 class="page-title slide-in">Add Rooms</h4>
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
                    include 'stats2.php';
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
                                                    $sql = "select * from type_master";
                                                    $result = mysqli_query($conn, $sql) or die('query failed');
                                                    if ($result) {
                                                        // Fetch the rows from the result set
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $tid = $row['tid'];
                                                            $name = $row['tname'];

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
                                            <div class="form-group col-md-2">
                                                <label for="inputZip">Total Number Of Rooms</label>
                                                <input type="text" name="norooms" class="form-control" id="inputZip">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="inputZip">Price Per Room</label>
                                                <input type="text" name="price" class="form-control" id="inputZip">
                                            </div>
                                            <div class="form-group col-md-2">
                                            <label for="">Capacity of Adults / per room (In Numbers)</label>
                                            <input type="text" name="adult" class="form-control" id="inputZip">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="">Capacity of childeren / per room</label>
                                            <input type="text" name="child" class="form-control" id="inputZip">
                                        </div>

                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
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
                                        <h4 class="mt-0 header-title mb-4 ">Latest Projects</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Hotel Id</th>
                                                        <th scope="col">Hotel Name</th>
                                                        <th scope="col">Type Name</th>
                                                        <th scope="col">No of Rooms</th>
                                                        <th scope="col">Price per room</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                                    $typen = mysqli_query($conn, "select h.hname,h.hid,r.hid,r.tid,r.price_per_room,r.total_rooms,r.adults,r.childeren,r.description,t.tname,t.tid from hotel_master h,room_master r, type_master t where r.hid = h.hid and t.tid = r.tid");

                                                    if (mysqli_num_rows($typen) > 0) {
                                                        while ($type = mysqli_fetch_assoc($typen)) {
                                                    ?>
                                                            <tr>
                                                            <td><?php echo $type['hid']?></td>
                                                                <td><?php echo $type['hname']?></td>
                                                                <td><?php echo $type['tname']?></td>
                                                                <td>Rs. <?php echo $type['price_per_room']?></td>
                                                                <td>Rs. <?php echo $type['total_rooms']?></td>
                                                            </tr>

                                                    <?php
                                                        }
                                                    }


                                                    ?>
                                                    <!-- start 1 -->

                                                    <!-- end 1 -->

                                                    <!-- start 2 -->



                                                    <!-- end 2 -->



                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
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