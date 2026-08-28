<!DOCTYPE html>
<html lang="zxx">
<?php

session_start();
if (!isset($_SESSION['uid'])) {
    $_SESSION['uid'] = null;
}

$_SESSION['prev-page'] = $_SERVER['HTTP_HOST'];
if (isset($_SERVER['HTTP_REFERER'])) {
    $_SESSION['prev-page'] = $_SERVER['HTTP_REFERER'];
}

?>

<!-- Mirrored from andit.co/projects/html/and-tour/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 06:53:34 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Home - JustStay </title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="assets/css/fontawesome.all.min.css" />
    <link rel="stylesheet" href="../../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.8.2/font/bootstrap-icons.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
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
    <link rel="stylesheet" href="inline.css" />
    <link rel="stylesheet" href="css/fade.css" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/fade.js"></script>

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
        <!----- Script for displaying the roomtypessss   --->

        <!-- Top Bar -->




        <script>
            $(document).ready(function() {
                $.ajax({
                    url: "getstates.php",
                    type: "GET",
                    dataType: "json",
                    success: function(response) {



                        response.forEach(function(state) {
                            if (state.stateid == 9) {
                                $("#states1").append(`<div class="destinations_content_box img_animation ">
                                <a href="get-state-hotels.php?state_id=` + state.stateid + `">
                                    <img src="` + state.image + `" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3><a href="get-state-hotels.php?state_id=` + state.stateid + `">` + state.name + `</a></h3>
                                </div>
                            </div>
                                `);


                            } else if (state.stateid < 3) {


                                $("#states1").append(`<div class="destinations_content_box img_animation">
                                <a href="get-state-hotels.php?state_id=` + state.stateid + `">
                                    <img src="` + state.image + `" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3><a href="get-state-hotels.php?state_id=` + state.stateid + `">` + state.name + `</a></h3>
                                </div>
                            </div>`);
                            }


                        });
                    }
                });
            });
        </script>




        <!----For states 2 --->
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: "getstates4-6.php",
                    type: "GET",
                    dataType: "json",
                    success: function(response) {



                        response.forEach(function(state) {
                            if (state.stateid == 10) {
                                $("#states2").append(`<div class="destinations_content_box img_animation">
                                <a href="get-state-hotels.php?state_id=` + state.stateid + `">
                                    <img src="` + state.image + `" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3><a href="get-state-hotels.php?state_id=` + state.stateid + `">` + state.name + `</a></h3>
                                </div>
                            </div>`);

                            } else if (state.stateid > 3 && state.stateid < 6) {
                                $("#states2").append(`<div class="destinations_content_box img_animation">
                                    <a href="get-state-hotels.php?state_id=` + state.stateid + `">
                                        <img src="` + state.image + `" alt="img">
                                    </a>
                                    <div class="destinations_content_inner">
                                        <h3><a href="get-state-hotels.php?state_id=` + state.stateid + `">` + state.name + `</a></h3>
                                    </div>
                                </div>
                                `);
                            }


                        });
                    }
                });
            });
        </script>




        <script>
            $(document).ready(function() {
                $.ajax({
                    url: "getstates7-8.php",
                    type: "GET",
                    dataType: "json",
                    success: function(response) {



                        response.forEach(function(state) {
                            if (state.stateid == 12) {
                                $("#states3").append(`   <div class="destinations_content_box img_animation">
                                <a href="get-state-hotels.php?state_id=` + state.stateid + `">
                                    <img src="` + state.image + `" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3><a href="get-state-hotels.php?state_id=` + state.stateid + `">` + state.name + `</a></h3>
                                </div>
                            </div>
                            <div class="destinations_content_box">
                                <a href="get-state-hotels.php?state_id=` + state.stateid + `" class="btn btn_theme btn_md w-100">View all</a>
                            </div>
                                `);
                            } else if (state.stateid == 7) {
                                $("#states3").append(`
                                <div class="destinations_content_box img_animation">
                                <a href="get-state-hotels.php?state_id=` + state.stateid + `">
                                    <img src="` + state.image + `" alt="img">
                                </a>
                                <div class="destinations_content_inner">
                                    <h3><a href="get-state-hotels.php?state_id=` + state.stateid + `">` + state.name + `</a></h3>
                                </div>
                            </div>
                                    
                                    `);
                            } else if (state.stateid < 7) {
                                $("#nav-tab").append(`  <button class="nav-link" id="nav-china-tab" data-bs-toggle="tab" data-bs-target="#nav-china" type="button" role="tab" aria-controls="nav-china" aria-selected="false">` + state.name + `</button>
                               `);
                            }



                        });
                    }
                });
            });
        </script>

        <?php include 'user_nav.php'; ?>
        <!-- Navbar Bar -->

    </header>

    <!-- search -->
    <div class="search-overlay">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-close">
                    <span class="search-overlay-close-line"></span>
                    <span class="search-overlay-close-line"></span>
                </div>
                <div class="search-overlay-form">
                    <form>
                        <input type="text" class="input-search" placeholder="Search here...">
                        <button type="button"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner Area -->
    <section id="home_one_banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_one_text">
                        <h1 class="slide-in-left">Explore the world together</h1>
                        <h3 class="fade-in">Find awesome hotel at best of it's offers</h3>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Form Area -->
    <section id="top_destinations" class="section_padding_top">

        <div class="container">
            <div class="section_heading_center" id="make_pref">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <h2 class="fade-scroll">Make your preferences</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- imagination Area -->


    <section id="go_beyond_area" class="section_padding_top">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-4">

                    <div class="heading_left_area">
                        <h2 class="fade-scroll">Room Types<span></span></h2>
                        <h5>Discover your ideal experience with us!</h5><br>
                        <h5>Help yourself with the luxury to book online hotel at any place in India.-</h5>
                    </div>

                </div>
                <div class="col-sm-8 ">
                    <div class="row align-items-center" id="col-sm-8">
                    </div>

                </div>
            </div>



    </section>




    <!-- Top destinations -->
    <section id="top_destinations" class="section_padding_top">
        <div class="container">
            <!-- Section Heading -->
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center ">
                        <h2 class="fade-scroll">Book In Any State</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
                    <div class="destinations_content_box">
                        <div class="row ">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 " id="states1"> </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12" id="states2">
                            </div>



                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 " id="states3">


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">

                    <div class="destinations_content_box img_animation">
                        <img src="assets/img/destination/big-img.png" alt="img">
                        <div class="destinations_content_inner">
                            <h2>Up to</h2>
                            <div class="destinations_big_offer">
                                <h1>20</h1>
                                <h6><span>%</span> <span>Off</span></h6>
                            </div>
                            <h2>Vacation Special Offers </h2>

                        </div>
                    </div>


                </div>
            </div>
    </section>



    <!--Promotional Tours Area -->
    <section id="promotional_tours" class="section_padding_top">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Our best promotional tours</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" id="hotel">

                    <div class="promotional_tour_slider owl-theme owl-carousel dot_style">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "hotel_booking");

                        $result = mysqli_query($conn, "SELECT
                        hotel_master.hid AS your_hotel_id,
                        hotel_master.hname,
                        hotel_master.location,
                        hotel_master.state_id,
                        hotel_master.photos,
                        state_tb.state,
                        hotel_master.city_id,
                        city_tb.city
                     FROM
                        hotel_master
                     JOIN
                        state_tb ON hotel_master.state_id = state_tb.state_id
                     JOIN
                        city_tb ON hotel_master.city_id = city_tb.city_id;
                     
                     ");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $your_hotel_id = $row['your_hotel_id'];
                                $minprice = mysqli_query($conn, "SELECT MIN(price_per_room) AS lowest_price
                                FROM room_master
                                WHERE hid = '$your_hotel_id'");
                                $minp = mysqli_fetch_assoc($minprice);

                        ?>

                                <div class="theme_common_box_two img_hover">
                                    <div class="theme_two_box_img">
                                        <a href="sample-hotel-details.php?hid=<?php echo $your_hotel_id ?>"><img src="<?php echo $row['photos'] ?>" alt="img"></a>
                                        <p><i class="fas fa-map-marker-alt"></i><?php echo $row['city'] . ", " . $row['state'] ?></p>
                                    </div>
                                    <div class="theme_two_box_content">
                                        <h4><a href="sample-hotel-details.php?hid=<?php echo $your_hotel_id ?>"><?php echo $row['hname'] . " " ?></a></h4>
                                        <p><span class="review_rating"></span> <span class="review_count"><?php 
                                        $comment = mysqli_query($conn,"select COUNT(*) as total from comment_master where hid = $your_hotel_id");
                                        if($comment){
                                            $cmt = mysqli_fetch_assoc($comment);
                                            echo $cmt['total'];
                                        }
                                        ?> Reviews</span></p>
                                        <h3> Rs.<?php echo $minp['lowest_price']; ?> <span>Price starts from</span></h3>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinations Area -->


    <!-- Footer  -->
    <?php

                        include 'user-footer.php';

    ?>
    
    <div class="go-top">
        <i class="fas fa-chevron-up"></i>
        <i class="fas fa-chevron-up"></i>
    </div>







    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <!-- Meanu js -->
    <script src="assets/js/jquery.meanmenu.js"></script>
    <!-- owl carousel js -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- wow.js -->
    <script src="assets/js/wow.min.js"></script>
    <!-- Custom js -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/add-form.js"></script>
    <script src="assets/js/form-dropdown.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "gettypes.php",
                type: "GET",
                dataType: "json",
                success: function(response) {

                    $("#col-sm-8").empty();

                    response.forEach(function(type) {
                        $("#col-sm-8").append(`
                      
                <div class="col-lg-3 col-md-6 col-sm-6 col-12" >
                    <div class="imagination_boxed">
                        <a href="get-rooms-types.php?tid=` + type.type_id + `">
                            <img src="` + type.image + `" alt="img">
                        </a>
                        <h3><a href="get-rooms-types.php?hid=` + type.type_id + `"> <span>` + type.name + `</span></a></h3>
                    </div>
                   
              
 `);
                    });
                }
            });
        });
    </script>

</body>


<!-- Mirrored from andit.co/projects/html/and-tour/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 06:57:24 GMT -->

</html>