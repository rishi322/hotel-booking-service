<?php
if (!isset($_GET['state_id'])) {
    header("Location: userindex.php");
}

$state_id = $_GET['state_id'];

session_start();
if (isset($_POST['checkavail'])) {

    $_SESSION['hid'] = $_POST['hotelid'];
    header("Location: get-hotel-details.php");
}

?>


<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from andit.co/projects/html/and-tour/demo/hotel-search-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 07:30:12 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Hotel search result - JuStay </title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="assets/css/fontawesome.all.min.css" />
    <link rel="stylesheet" href="../../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.8.2/font/bootstrap-icons.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <!-- Rangeslider css -->
    <link rel="stylesheet" href="assets/css/nouislider.css" />
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
    <!-- navber css -->
    <link rel="stylesheet" href="assets/css/navber.css" />
    <!-- meanmenu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.css" />
    <!-- Style css -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- Responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>
    <!-- preloader Area -->
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Area -->
    <header class="main_header_arae">


        <?php include 'user_nav.php'; ?>
        <!-- Navbar Bar -->

    </header>

    <!-- search -->


    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Hotel search result</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span> Hotel</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Area -->
    <section id="theme_search_form_tour">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="theme_search_form_area">
                        <div class="theme_search_form_tabbtn">
                            <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'hotel_booking');
                            $countsql = mysqli_query($conn, "SELECT count_query.total_count, h.hid, h.photos, h.hname, h.city_id, r.price_per_room, c.city_id, c.city, t.tid, t.tname
                            FROM (
                              SELECT COUNT(*) AS total_count
                              FROM hotel_master AS h
                              JOIN city_tb AS c ON h.city_id = c.city_id
                              JOIN room_master AS r ON h.hid = r.hid
                              JOIN (
                                SELECT hid, MIN(tid) AS tid
                                FROM room_master
                                GROUP BY hid
                              ) AS subq ON h.hid = subq.hid AND r.tid = subq.tid
                              JOIN type_master AS t ON subq.tid = t.tid
                              WHERE h.state_id = $state_id
                            ) AS count_query
                            CROSS JOIN hotel_master AS h
                            JOIN city_tb AS c ON h.city_id = c.city_id
                            JOIN room_master AS r ON h.hid = r.hid
                            JOIN (
                              SELECT hid, MIN(tid) AS tid
                              FROM room_master
                              GROUP BY hid
                            ) AS subq ON h.hid = subq.hid AND r.tid = subq.tid
                            JOIN type_master AS t ON subq.tid = t.tid
                            WHERE h.state_id = $state_id
                            ");
                            if (mysqli_num_rows($countsql) > 0) {
                                $row = mysqli_fetch_assoc($countsql);
                                $count = $row['total_count'];

                            ?> <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="section_heading_center">
                                            <h2><?php echo $count ?> Hotels Found</h2>
                                        </div>
                                    </div>
                                </div> <?php
                                    } else {
                                        ?>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="section_heading_center">
                                            <h2>0 Hotels Found</h2>
                                        </div>
                                    </div>
                                </div>
                            <?php

                                    }
                            ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Flight Search Areas -->
    <section id="explore_area" class="section_padding">
        <div class="container">
            <!-- Section Heading -->z

            <div class="row">
                <div class="col-lg-2">
                    <div class="left_side_search_area">

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cruise_search_result_wrapper">

                                <?php

                                $conn = mysqli_connect('localhost', 'root', '', 'hotel_booking');

                                $sql = mysqli_query($conn, "SELECT h.hid, h.photos, h.hname, h.city_id, r.description,r.adults, r.price_per_room, c.city_id, c.city, t.tid, t.tname
                                FROM hotel_master AS h
                                JOIN city_tb AS c ON h.city_id = c.city_id
                                JOIN room_master AS r ON h.hid = r.hid
                                JOIN (
                                  SELECT hid, MIN(tid) AS tid
                                  FROM room_master
                                  GROUP BY hid
                                ) AS subq ON h.hid = subq.hid AND r.tid = subq.tid
                                JOIN type_master AS t ON subq.tid = t.tid
                                WHERE h.state_id = $state_id
                                ");
                                if (mysqli_num_rows($sql) > 0) {
                                    while ($rows = mysqli_fetch_assoc($sql)) { 
                                        $hid = $rows['hid'];?>
                                        <div class="cruise_search_item">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="cruise_item_img">
                                                        <img src="<?php echo $rows['photos'] ?>" alt="img">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="cruise_item_inner_content">
                                                        <div class="cruise_content_top_wrapper">
                                                            <div class="cruise_content_top_left">
                                                                <h4><?php echo $rows['hname'] ?></h4>
                                                                <p><i class="fas fa-map-marker-alt"></i><?php echo $rows['city'] ?></p>
                                                            </div>
                                                            <div class="cruise_content_top_right">
                                                                <h5>4.8/5 Excellent</h5>
                                                                <h4>(1214 reviewes)</h4>
                                                            </div>
                                                        </div>
                                                        <div class="cruise_content_middel_wrapper">
                                                            <div class="cruise_content_middel_left">
                                                                <h5><?php echo $rows['tname'] ?></h5>
                                                                <p><?php echo $rows['description']?></p>
                                                            </div>
                                                            <div class="cruise_content_middel_right">
                                                                <p><?php echo $rows['adults']?> adult</p>
                                                            </div>
                                                        </div>
                                                        <div class="cruise_content_middel_wrapper">
                                                            <div class="cruise_content_middel_left">
                                                                <h5>Free cancellation</h5>
                                                                <p>Cancel your booking at any time</p>
                                                            </div>
                                                            <div class="cruise_content_middel_right">
                                                                <h3>Rs.<?php echo $rows['price_per_room'] ?> <sub>/Per room</sub></h3>
                                                                <p>+ G.S.T.</p>
                                                            </div>
                                                        </div>
                                                        <div class="cruise_content_bottom_wrapper">
                                                            <div class="cruise_content_bottom_left">
                                                                <ul>
                                                                    <?php
                                                                    $facilityh = mysqli_query($conn, "select f.fid,f.fname,h.fid from facility_master f, hotel_facility_master h where f.fid=h.fid and h.hid = $hid LIMIT 4");
                                                                    if (mysqli_num_rows($facilityh) > 0) {
                                                                        while ($facility = mysqli_fetch_assoc($facilityh)) {
                                                                    ?>
                                                                            <li><?php echo $facility['fname'] ?></li>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                            <div class="cruise_content_bottom_right">


                                                                <a href="sample-hotel-details.php?hid=<?php echo $rows['hid'] ?>" type="submit" class="btn btn_theme btn_md">View More </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                <?php
                                    }
                                } else {
                                }
                                ?>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cta Area -->
    <?php
    include 'user-footer.php';

    ?>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <!-- Meanu js -->
    <script src="assets/js/jquery.meanmenu.js"></script>
    <!-- Range js -->
    <script src="assets/js/nouislider.min.js"></script>
    <script src="assets/js/wNumb.js"></script>
    <!-- owl carousel js -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- wow.js -->
    <script src="assets/js/wow.min.js"></script>
    <!-- Custom js -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/add-form.js"></script>
    <script src="assets/js/form-dropdown.js"></script>

</body>


<!-- Mirrored from andit.co/projects/html/and-tour/demo/hotel-search-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 07:30:31 GMT -->

</html>