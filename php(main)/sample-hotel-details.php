<?php
$conn = mysqli_connect('localhost', 'root', '', 'hotel_booking');
session_start();
$a = 0;
$_SESSION['logged-in'] = $a;
if (!isset($_GET['hid'])) {
    header("Location: userindex.php");
}

$hid = $_GET['hid'];
$_SESSION['hid'] = $hid;

if (isset($_POST['post_cmt'])) {
    $comment = $_POST['comment'];
    $_SESSION['comment'] = $comment;
    if ($_SESSION['uid'] == null) {


        $_SESSION['prev-page'] = $_SERVER['HTTP_REFERER'];
        header("Location:user-login-comment.php");
    } else {
        $uid = $_SESSION['uid'];


        $cmt = mysqli_query($conn, "INSERT INTO `comment_master`(`uid`, `hid`, `comment`) VALUES ($uid,$hid,'$comment')");
        if ($cmt) {
            header("Location:#");
        }
    }
}



?>


<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from andit.co/projects/html/and-tour/demo/hotel-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 07:30:31 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Hotel Details - Andtourtravel </title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="assets/css/fontawesome.all.min.css" />
    <link rel="stylesheet" href="../../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.8.2/font/bootstrap-icons.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <!-- Slick css -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css" />
    <!--slick-theme.css-->
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.html" />
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
    <link rel="stylesheet" href="banner.css" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/img/favicon.png">




</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script>
        ////logic for displaying the room types in hotel details section //////
        $.ajax({
            url: "get_types_rooms.php",
            type: 'POST',
            data: {},
            dataType: 'json',
            success: function(response) {

                response.forEach(function(room) {
                    $("#display").append(`
                <div class="room_book_item">
                    <div class="room_book_img">
                        <!-- <img src="" alt="img"> -->
                    </div>
                    <div class="room_booking_right_side">
                        <div class="room_booking_heading">
                            
                            <h3><a href="room-booking.html">${room.tname} </a></h3>
                            <div class="room_fasa_area">
                                <ul>
                                    <li><img src="assets/img/icon/ac.png" alt="icon">Air condition</li>
                                    <li><img src="assets/img/icon/gym.png" alt="icon">Fitness center</li>
                                </ul>
                                <ul>
                                    <li><img src="assets/img/icon/tv.png" alt="icon">Flat television</li>
                                    <li><img src="assets/img/icon/wifi.png" alt="icon">Free Wi-fi</li>
                                </ul>
                                <ul>
                                    <li>
                                        <p>${room.description}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="room_person_select">
                            <h3 class="price">Rs.${room.ppr}/-<sub>Per room</sub></h3>
                            <select class="form-select perroom" aria-label="Default select example">
                                <option selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                </div>
            `);

                    // Event handler for the perroom select box change
                    $(".perroom").on("change", function() {
                        var selectedRooms = $(this).val();
                        var pricePerRoom = room.ppr;
                        var totalPrice = selectedRooms * pricePerRoom;

                        // Update the displayed price
                        $(this).closest(".room_person_select").find(".price").text("Rs." + totalPrice + "/-");
                    });
                });
            }
        });

        $.ajax({
            url: "reviews.php",
            type: 'POST',
            data: {},
            dataType: 'json',
            success: function(response) {
 // Check if this line is executed and the response data
                response.forEach(function(comment) {
                    var commentUID = comment.uid;
                    // Rest of your code here
                    var reviewHTML = `<div class="col-lg-4 col-md-6">
                <div class="all_review_box">
                    <div class="all_review_date_area">
                        <div class="all_review_date">
                        </div>
                        <div class="uif" data-comment-uid="${commentUID}">
                            <div class="fui"></div>
                        </div>
                    </div>
                    <div class="all_review_text">
                        <img src="${comment.photo}" alt="img">
                        <h4>${comment.uname}</h4>
                        <p>"${comment.cmt}"</p>
                    </div>
                </div>
            </div>`;
                
                $("#reviewsss").append(reviewHTML);
          
           

                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#search_avail').on("click", function() {
                var checkin = $("#checkin").val();

                $.ajax({
                    url: 'check-availability.php',
                    type: 'POST',
                    data: {
                        checkin: checkin
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        $("#display").empty();
                        response.forEach(function(checkin_num) {
                            var occupied = checkin_num.total_rooms;
                            var tid = checkin_num.tid;
                            var checkinDate = new Date($('#checkin').val());
                            var checkoutDate = new Date($('#checkout').val());
                            var timeDifference = checkoutDate.getTime() - checkinDate.getTime();
                            if (timeDifference == 0) {
                                timeDifference = 1;
                            }


                            $.ajax({
                                url: "get-available-rooms.php",
                                type: 'POST',
                                data: {
                                    total_rooms: occupied,
                                    tid: tid,
                                    guests: total_guests,
                                    adult: adults,
                                    child: child
                                },
                                dataType: 'json',
                                success: function(response) {

                                    response.forEach(function(room) {


                                        $("#display").append(`
                <div class="room_book_item">
                    <div class="room_book_img">
                        <!-- <img src="" alt="img"> -->
                    </div>
                    
                    <div class="room_booking_right_side">
                        <div class="room_booking_heading">
                            <h3><a href="room-booking.html">${room.tname} </a></h3>
                            <div class="room_fasa_area">
                                <ul>
                                    <li><img src="assets/img/icon/ac.png" alt="icon">Air condition</li>
                                    <li><img src="assets/img/icon/gym.png" alt="icon">Fitness center</li>
                                </ul>
                                <ul>
                                    <li><img src="assets/img/icon/tv.png" alt="icon">Flat television</li>
                                    <li><img src="assets/img/icon/wifi.png" alt="icon">Free Wi-fi</li>
                                </ul>
                                <ul>
                                    <li>
                                        <p>${room.description}</p>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="room_person_select">
                       <h3 class="price">Total Costing</h4>
                            <h3 class="price">Rs.${Math.round(room.ppr*room.need)} /-
                            <input type="hidden" class="perroom" value="${room.need}">
                            <p class="room_booking_heading"> ${room.need} Rooms required </p>
                           <div class="mt-5">
                        
                                <button class="btn btn_theme btn_md w-100 book_now" id="book_now" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Book Now</button>
                           </div>
                        </div>
                    </div>
                  
                </div>
            `);
                                        $('.book_now').on("click", function() {
                                            $('#check-in-date').val($('#checkin').val());
                                            $('#check-out-date').val($('#checkout').val());
                                            $('#edits').empty();
                                            $('#edits').append(adults);
                                            $('#a_val').val(adults);
                                            $('#d_child').empty();
                                            $('#d_child').append(child);
                                            $('#c_val').val(child);
                                            $('#d_infant').empty();
                                            $('#d_infant').append(infant);
                                            $('#t_guests').val(total_guests);
                                            $('#type_b_id').val(room.tid);
                                            $('#room_need').val(room.need);

                                            // Convert the time difference to days
                                            var daysDifference = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));
                                            $('#days').val(daysDifference);
                                            $('#total_amount').val(Math.round(room.ppr * room.need * daysDifference));
                                            console.log("room.tid:" + room.tid);
                                            console.log(daysDifference);

                                        })


                                    });
                                }
                            });
                        })
                    }
                })
            })
        })
    </script>




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
        <!-- Top Bar -->
        <?php include 'user_nav.php'; ?>
    </header>



    <!-- Common Banner Area -->
    <?php 
        $cover = mysqli_query($conn,"select image from coverpic_tb where hid= $hid LIMIT 1");
        if($cover){
            $coverpic= mysqli_fetch_assoc($cover);
            $cp = $coverpic['image'];
        }

    ?>
    <section id="hotel-details-banner" style='background-image: url(<?php echo $cp ?>);'>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Hotel details</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span><a href="hotel-search.html">Hotel</a></li>
                            <li><span><i class="fas fa-circle"></i></span> Hotel Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $hotel = mysqli_query($conn, "select * from hotel_master where hid = $hid");

    $hotel_details = mysqli_fetch_assoc($hotel);
    ?>
    <!-- Hotel Search Areas -->
    <section id="tour_details_main" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tour_details_leftside_wrapper">
                        <div class="tour_details_heading_wrapper">
                            <div class="tour_details_top_heading">
                                <h2><?php echo $hotel_details['hname'] ?></h2>
                                <?php
                                $state_id = $hotel_details['state_id'];
                                $city_id = $hotel_details['city_id'];
                                $state = mysqli_query($conn, "SELECT state AS staten FROM state_tb  WHERE state_id = $state_id");
                                $stater = mysqli_fetch_assoc($state);
                                $city = mysqli_query($conn, "SELECT city AS cityn FROM city_tb  WHERE city_id = $city_id");
                                $cityr = mysqli_fetch_assoc($city);
                                ?>
                                <h5><i class="fas fa-map-marker-alt"><?php echo $stater['staten'] . ", ";
                                                                        echo $cityr['cityn']; ?></i></h5>

                            </div>
                            <div class="tour_details_top_heading_right">
                                <h4>Excellent</h4>
                                <h6>4.8/5</h6>
                                <p>(1214 reviewes)</p>
                            </div>
                        </div>

                        <div class="tour_details_top_bottom">
                            <div class="toru_details_top_bottom_item">
                                <div class="tour_details_top_bottom_icon">
                                    <img src="assets/img/icon/ac.png" alt="icon">
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <p>Air condition</p>
                                </div>
                            </div>
                            <div class="toru_details_top_bottom_item">
                                <div class="tour_details_top_bottom_icon">
                                    <img src="assets/img/icon/tv.png" alt="icon">
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <p>Flat television</p>
                                </div>
                            </div>
                            <div class="toru_details_top_bottom_item">
                                <div class="tour_details_top_bottom_icon">
                                    <img src="assets/img/icon/gym.png" alt="icon">
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <p>Fitness center</p>
                                </div>
                            </div>
                            <div class="toru_details_top_bottom_item">
                                <div class="tour_details_top_bottom_icon">
                                    <img src="assets/img/icon/wifi.png" alt="icon">
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <p>Free Wi-fi</p>
                                </div>
                            </div>
                        </div>
                        <div class="tour_details_img_wrapper">
                            <div class="slider slider-for">
                                <div>
                                    <img src="<?php echo $hotel_details['wide_photos'] ?>" alt="img">
                                </div>
                                <?php
                                $sq = mysqli_query($conn, "select * from photos_master where hid=$hid");
                                if ($sq) {
                                    while ($getphotos = mysqli_fetch_assoc($sq)) {
                                ?>
                                        <div>
                                            <img src="<?php echo $getphotos['pic'] ?>" alt="img">
                                        </div>
                                <?php
                                    }
                                }
                                ?>

                            </div>
                            <div class="slider slider-nav">
                                <div>
                                    <img width="98%" src="<?php echo $hotel_details['wide_photos'] ?>" alt="img">

                                </div>
                                <?php
                                $sq = mysqli_query($conn, "select * from photos_master where hid=$hid");
                                if ($sq) {
                                    while ($getphotos = mysqli_fetch_assoc($sq)) {
                                ?>
                                        <div>
                                            <img width="98%" src="<?php echo $getphotos['pic'] ?>" alt="img">
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tour_details_boxed">
                            <h3 class="heading_theme">Overview</h3>
                            <div class="tour_details_boxed_inner">
                                <p><?php echo $hotel_details['description'] ?>
                                </p>
                                <ul>
                                    <?php

                                    $description = mysqli_query($conn, "select * from description_master where hid = $hid");

                                    if (mysqli_num_rows($description) > 0) {
                                        while ($desc = mysqli_fetch_assoc($description)) {
                                    ?>
                                            <li><i class="fas fa-circle"></i> <?php echo $desc['aspect'] . " - " . $desc['description'] ?></li>
                                    <?php
                                        }
                                    }

                                    ?>


                                </ul>
                            </div>
                        </div>
                        <div class="tour_details_boxed">
                            <h3 class="heading_theme">Select your room</h3>
                            <div class="room_select_area">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Book</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Enquiry</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="room_booking_area">
                                            <div class="tour_search_form">
                                                <form action="https://andit.co/projects/html/and-tour/demo/!#">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                                                            <div class="form_search_date">
                                                                <div class="flight_Search_boxed date_flex_area">
                                                                    <div class="Journey_date">
                                                                        <p>Check In date</p>
                                                                        <input type="date" id="checkin" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>">
                                                                        <span>Thursday</span>
                                                                    </div>
                                                                    <div class="Journey_date">
                                                                        <p>Check Out date</p>
                                                                        <input type="date" id="checkout" value="<?php echo date('Y-m-d'); ?>">
                                                                        <span>Thursday</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                                            <div class="flight_Search_boxed dropdown_passenger_area">
                                                                <p>Guests</p>
                                                                <div class="dropdown">
                                                                    <button class="dropdown-toggle" data-toggle="dropdown" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        0 Guests
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown_passenger_info" aria-labelledby="dropdownMenuButton1">
                                                                        <div class="traveller-calulate-persons">
                                                                            <div class="passengers">
                                                                                <h6>Passengers</h6>
                                                                                <div class="passengers-types">
                                                                                    <div class="passengers-type">
                                                                                        <div class="text"><span class="count" id="adults">0</span>
                                                                                            <div class="type-label">
                                                                                                <p>Adult</p>
                                                                                                <span>12+
                                                                                                    yrs</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="button-set">
                                                                                            <button type="button" id="plus_adult">
                                                                                                <i class="fas fa-plus"></i>
                                                                                            </button>
                                                                                            <button type="button" id="minus_adult">
                                                                                                <i class="fas fa-minus"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="passengers-type">
                                                                                        <div class="text"><span class="count" id="child">0</span>
                                                                                            <div class="type-label">
                                                                                                <p class="fz14 mb-xs-0">
                                                                                                    Children
                                                                                                </p><span>2
                                                                                                    - Less than 12
                                                                                                    yrs</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="button-set">
                                                                                            <button type="button" id="plus_child">
                                                                                                <i class="fas fa-plus"></i>
                                                                                            </button>
                                                                                            <button type="button" id="minus_child">
                                                                                                <i class="fas fa-minus"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="passengers-type">
                                                                                        <div class="text"><span class="count" id="infant">0</span>
                                                                                            <div class="type-label">
                                                                                                <p class="fz14 mb-xs-0">
                                                                                                    Infant
                                                                                                </p><span>Less
                                                                                                    than 2
                                                                                                    yrs</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="button-set">
                                                                                            <button type="button">
                                                                                                <i class="fas fa-plus" id="plus_infant"></i>
                                                                                            </button>
                                                                                            <button type="button">
                                                                                                <i class="fas fa-minus" id="minus_infant"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <span>Adult</span>

                                                            </div>
                                                        </div>
                                                        <div class="top_form_search_button text-right">
                                                            <button class="btn btn_theme btn_md" id="search_avail" type="button">Check
                                                                availability</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="write_review_inner_boxed">
                                            <form action="https://andit.co/projects/html/and-tour/demo/!#" id="news_comment_form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-froup">
                                                            <input type="text" class="form-control bg_input" placeholder="Enter full name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-froup">
                                                            <input type="text" class="form-control bg_input" placeholder="Enter email address">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-froup">
                                                            <textarea rows="6" placeholder="Write your comments" class="form-control bg_input"></textarea>
                                                        </div>
                                                        <div class="comment_form_submit">
                                                            <button class="btn btn_theme btn_md">Enquiry</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>

                                    <div class="display" id="display">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tour_details_boxed">
                            <h3 class="heading_theme">Included/Excluded</h3>
                            <div class="tour_details_boxed_inner">
                                <p>
                                    Stet clitaStet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                                    sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod.
                                </p>
                                <ul>
                                    <li><i class="fas fa-circle"></i>Buffet breakfast as per the Itinerary</li>
                                    <li><i class="fas fa-circle"></i>Visit eight villages showcasing Polynesian culture
                                    </li>
                                    <li><i class="fas fa-circle"></i>Complimentary Camel safari, Bonfire, and Cultural
                                        Dance at Camp</li>
                                    <li><i class="fas fa-circle"></i>All toll tax, parking, fuel, and driver allowances
                                    </li>
                                    <li><i class="fas fa-circle"></i>Comfortable and hygienic vehicle (SUV/Sedan) for
                                        sightseeing on all days as per the itinerary.</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tour_details_right_sidebar_wrapper">
                        <div class="tour_detail_right_sidebar">
                            <div class="tour_details_right_boxed">
                                <div class="tour_details_right_box_heading">
                                    <h3>Minimal Room Price</h3>
                                </div>
                                <?php $price = mysqli_query($conn, "select MIN(price_per_room) as min_price from room_master where hid=$hid");

                                $cost = mysqli_fetch_assoc($price);
                                $percent = 20;
                                $mrp = $cost['min_price'] + $percent * $cost['min_price'] / 100;

                                ?>
                                <div class="tour_package_bar_price">
                                    <h6><del>Rs. <?php echo $mrp ?></del></h6>
                                    <h3>Rs.<?php echo $cost['min_price']; ?>/
                                        <sub>Per Room <h2> 20% off </h2></sub>
                                    </h3>
                                </div>

                                <div class="tour_package_details_bar_list">
                                    <h5>Hotel facilities</h5>
                                    <ul>
                                        <?php
                                        $facility = mysqli_query($conn, "SELECT h.hid, f.fname
                                        FROM facility_master f, hotel_facility_master h
                                        WHERE h.fid = f.fid AND h.hid = $hid 
                                        ORDER BY f.fid ASC
                                        LIMIT 5;
                                        ");
                                        if (mysqli_num_rows($facility) > 0) {
                                            while ($data = mysqli_fetch_assoc($facility)) {
                                        ?>
                                                <li><i class="fas fa-circle"></i><?php echo $data['fname'] ?></li>

                                        <?php
                                            }
                                        }
                                        ?>

                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="tour_detail_right_sidebar">
                            <div class="tour_details_right_boxed">
                                <div class="tour_details_right_box_heading">
                                    <h3>Why choose us</h3>
                                </div>

                                <div class="tour_package_details_bar_list first_child_padding_none">
                                    <ul>
                                        <?php
                                        $facility = mysqli_query($conn, "SELECT h.hid,f.fdescription, f.fname
                                        FROM facility_master f, hotel_facility_master h
                                        WHERE h.fid = f.fid AND h.hid = $hid 
                                        ORDER BY f.fid DESC
                                        LIMIT 5;
                                        ");
                                        if (mysqli_num_rows($facility) > 0) {
                                            while ($data = mysqli_fetch_assoc($facility)) {
                                        ?>
                                                <li><i class="fas fa-circle"></i><?php echo $data['fname'] . "-" . $data['fdescription']; ?></li>

                                        <?php
                                            }
                                        }
                                        ?>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="write_your_review_wrapper">
                        <h3 class="heading_theme">Write your review</h3>
                        <div class="write_review_inner_boxed">
                            <form action="#" method="POST" id="news_comment_form">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-froup">
                                            <textarea rows="6" placeholder="Write your comments" name="comment" class="form-control bg_input"></textarea>
                                        </div>
                                        <div class="comment_form_submit">
                                            <button name="post_cmt" class="btn btn_theme btn_md">Post comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="reviewsss">
                <div class="col-lg-12">
                    <div class="all_review_wrapper">
                        <h3 class="heading_theme">All review</h3>
                    </div>
                </div>
                <!-- <div id="reviewsss"></div> -->

                <div>
                </div>

            </div>
        </div>
    </section>

    <!--Related tour packages Area -->
    <section id="promotional_tours" class="section_padding_top">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Related Hotels</h2>
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

                                        <?php
                                        $rating = mysqli_query($conn, "select * from ratings where hid=$hid");
                                        ?>


                                        <p><span class="review_rating"></span> <span class="review_count"><?php 
                                        $comment = mysqli_query($conn,"select COUNT(*) as total from comment_master where hid = $your_hotel_id");
                                        if($comment){
                                            $cmt = mysqli_fetch_assoc($comment);
                                            echo $cmt['total'];
                                        } ?>
                                                reviewes</span></p>
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

    <!-- Cta Area -->
  <?php
  include 'user-footer.php';
  ?>



    <div class="offcanvas select_offer_modal offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <form action="room-booking.php" method="POST">

            <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->

            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">Book now</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="side_canvas_wrapper">
                    <div class="travel_date_side">
                        <div class="form-group">
                            <label for="dates">Select your travel date</label>
                            <input type="date" value="2022-05-05" class="form-control" id="check-in-date" name="check-in-date">
                        </div>
                    </div>
                    <div class="travel_date_side">
                        <div class="form-group">
                            <label for="dates">Select your travel date</label>
                            <input type="date" value="2022-05-05" class="form-control" id="check-out-date" name="check-out-date">
                        </div>
                    </div>
                    <input type="hidden" id="type_b_id" name="type_b_id" value="">
                    <input type="hidden" id="days" name="days" value="">
                    <input type="hidden" id="c_val" name="c_val" value="">
                    <input type="hidden" id="a_val" name="a_val" value="">
                    <input type="hidden" id="t_guests" name="t_guests" value="">
                    <input type="hidden" id="total_amount" name="total_amount">
                    <input type="hidden" id="room_need" name="room_need">
                     <div class="select_person_side">
                        <h3>Select person</h3>
                        <div class="select_person_item">
                            <div class="select_person_left">
                                <h6>Adult</h6>
                                <p>12y+</p>
                            </div>
                            <div class="select_person_right">
                                <div class="button-set">
                                    
                                    <span id="edits">01</span>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="select_person_item">
                            <div class="select_person_left">
                                <h6>Children</h6>
                                <p>2 - 12 years</p>
                            </div>
                            <div class="select_person_right">
                                <div class="button-set">
                                    
                                    <span id="d_child">0</span>
                                    
                                </div>
                            </div>
                        </div>
                        

                        
                </div>
            </div>
    </div>

    <div class="proceed_booking_btn ">
        <button type="submit" name="book" class="btn btn_theme btn_md w-100">Proceed to Booking</button>
    </div>
    </form>
    </div>

    <script>
        $(document).ready(function() {

            $('#p_edit').on("click", function(e) {

                adults++;
                $('#edits').empty();
                $('#edits').append(adults

                );
                $('#a_val').val(adults);
                total_guests = adults + child;
                $('#t_guests').val(total_guests);
            })
            $('#m_edit').on("click", function(e) {

                adults--;
                if (adults < 0) {
                    adults = 0;
                }
                $('#edits').empty();
                $('#edits').append(adults

                );
                $('#a_val').val(adults);
                total_guests = adults + child;
                $('#t_guests').val(total_guests);
            })


            $('#p_child').on("click", function(e) {

                child++;
                $('#d_child').empty();
                $('#d_child').append(child

                );
                total_guests = adults + child;
            })
            $('#minus_childs').on("click", function(e) {

                child--;
                if (child < 0) {
                    child = 0;
                }
                $('#d_child').empty();
                $('#d_child').append(child

                );
                total_guests = adults + child;
            })

            $('#p_infant').on("click", function(e) {

                infant++;
                $('#d_infant').empty();
                $('#d_infant').append(infant

                );
                total_guests = adults + child;
            })
            $('#m_infant').on("click", function(e) {

                infant--;
                if (infant < 0) {
                    infant = 0;
                }
                $('#d_infant').empty();
                $('#d_infant').append(infant

                );
                total_guests = adults + child;
            })


        })
    </script>

    <script>
        var total_guests = 0;
        var adults = 0;
        var child = 0;
        var infant = 0;
        $(document).ready(function() {


            $('.dropdown-menu').on('click', function(e) {
                e.stopPropagation();
            });

            $('#plus_adult').on("click", function(e) {
                adults++;

                $('#adults').empty();
                $('#adults').append(+adults

                );


                total_guests = adults + child;
                $('#dropdownMenuButton1').empty();
                $('#dropdownMenuButton1').append(total_guests + ' Guests'

                );



            })

            $('#minus_adult').on('click', function() {
                adults--;
                if (adults < 0) {
                    adults = 0;
                }
                $("#adults").empty();
                $("#adults").append(adults

                );

                total_guests = adults + child;
                $('#dropdownMenuButton1').empty();
                $('#dropdownMenuButton1').append(total_guests + ' Guests'

                );

            })

            $('#plus_child').on('click', function() {
                child++;
                $("#child").empty();
                $("#child").append(child

                );

                total_guests = adults + child;
                $('#dropdownMenuButton1').empty();
                $('#dropdownMenuButton1').append(total_guests + ' Guests'

                );
            })
            $('#minus_child').on('click', function() {
                child--;
                if (child < 0) {
                    child = 0;
                }
                $("#child").empty();
                $("#child").append(child

                );

                total_guests = adults + child;
                $('#dropdownMenuButton1').empty();
                $('#dropdownMenuButton1').append(total_guests + ' Guests'

                );
            })

            $('#plus_infant').on('click', function() {
                infant++;

                $("#infant").empty();
                $("#infant").append(infant

                );

                total_guests = adults + child;
                $('#dropdownMenuButton1').empty();
                $('#dropdownMenuButton1').append(total_guests + ' Guests'

                );
            })

            $('#minus_infant').on('click', function() {
                infant--;
                if (infant < 0) {
                    infant = 0;
                }
                $("#infant").empty();
                $("#infant").append(infant

                );

                total_guests = adults + child;
                $('#dropdownMenuButton1').empty();
                $('#dropdownMenuButton1').append(total_guests + ' Guests'

                );
            })

        })
    </script>
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
    <!-- Slick js -->
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <!-- wow.js -->
    <script src="assets/js/wow.min.js"></script>
    <!-- Custom js -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/add-form.js"></script>

</body>


<!-- Mirrored from andit.co/projects/html/and-tour/demo/hotel-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 07:31:18 GMT -->

</html>