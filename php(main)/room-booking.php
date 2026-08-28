<?php
session_start();
include 'connection.php';
if ($_SESSION['uid'] == null) {
    $_SESSION['prev-page'] == "room-booking.php";
    header('Location: user-login-bookings.php');
    $checkindate = $_POST['check-in-date'];
    $checkoutdate = $_POST['check-out-date'];
    $typeid = $_POST['type_b_id'];
    $child = $_POST['c_val'];
    $adult = $_POST['a_val'];
    $guests = $_POST['t_guests'];
    $room_need = $_POST['room_need'];
    $amount = $_POST['total_amount'];


    $hid = $_SESSION['hid'];

    $_SESSION['check-in-date'] = $checkindate;
    $_SESSION['check-out-date'] = $checkoutdate;
    $_SESSION['typeid'] = $typeid;
    $_SESSION['child'] = $child;
    $_SESSION['adult'] = $adult;
    $_SESSION['guests'] = $guests;
    $_SESSION['room_need'] = $room_need;

    $_SESSION['amount'] = $amount;
} else if (isset($_POST['book'])) {
    $checkindate = $_POST['check-in-date'];
    $checkoutdate = $_POST['check-out-date'];
    $typeid = $_POST['type_b_id'];
    $child = $_POST['c_val'];
    $adult = $_POST['a_val'];
    $guests = $_POST['t_guests'];
    $room_need = $_POST['room_need'];
    $amount = $_POST['total_amount'];


    $hid = $_SESSION['hid'];
    $_SESSION['check-in-date'] = $checkindate;
    $_SESSION['check-out-date'] = $checkoutdate;
    $_SESSION['typeid'] = $typeid;
    $_SESSION['child'] = $child;
    $_SESSION['adult'] = $adult;
    $_SESSION['guests'] = $guests;
    $_SESSION['room_need'] = $room_need;

    $_SESSION['amount'] = $amount;
} else {
    $checkindate = $_SESSION['check-in-date'];
    $checkoutdate = $_SESSION['check-out-date'];
    $typeid = $_SESSION['typeid'];
    $child = $_SESSION['child'];
    $adult = $_SESSION['adult'];
    $guests = $_SESSION['guests'];
    $room_need = $_SESSION['room_need'];

    $amount = $_SESSION['amount'];
    $hid = $_SESSION['hid'];
}


if (isset($_POST['details'])) {

    $_SESSION['user-details-fn'] = $_POST['fname'];
    $_SESSION['user-details-ln'] = $_POST['lname'];
    if (isset($_POST['email'])) {
        $_SESSION['user-details-email'] = $_POST['email'];
    }
    $_SESSION['user-details-mb'] = $_POST['mobile'];

    $_SESSION['userdetails'] ='yes';
}


?>


<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from andit.co/projects/html/and-tour/demo/room-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 07:31:18 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Room Booking Submission - Andtourtravel </title>
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
    <link rel="stylesheet" href="hotel.css" />
    <!-- Favicon -->

</head>

<body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Listen for form submission
        document.getElementById('paymentForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Perform AJAX request to handle the form data
            handleFormSubmission();
        });

        // Function to handle form submission using AJAX
        function handleFormSubmission() {
            // Get form data
            var form = document.getElementById('paymentForm');
            var formData = new FormData(form);

            // Create a new AJAX request
            var xhr = new XMLHttpRequest();

            // Set up the request
            xhr.open('POST', 'verify.php', true);

            // Set up the callback function
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Request was successful, handle the response
                    var response = xhr.responseText;
                    // Handle the response as needed

                    // Set session variable if the response indicates success
                    if (response === 'success') {
                        setLoggedInSession();
                        console.log('suces');
                    }
                } else {
                    // Request failed
                    console.error('Error:', xhr.status, xhr.statusText);
                }
            };

            // Send the request with the form data
            xhr.send(formData);
        }

        // Function to set session variable logged-in to 1
        function setLoggedInSession() {
            // Create a new AJAX request
            var xhr = new XMLHttpRequest();

            // Set up the request
            xhr.open('GET', 'set_session.php', true);

            // Set up the callback function
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Request was successful, the session variable is set
                    console.log('Session variable set successfully');
                } else {
                    // Request failed
                    console.error('Error:', xhr.status, xhr.statusText);
                }
            };

            // Send the request
            xhr.send();
        }
    </script>


    <!-- preloader Area -->
    <div class="lds-spinner">
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
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
        <?php
        include 'user_nav.php';
        ?>
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

    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>Room boking</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span><a href="hotel-search.html">Hotel</a></li>
                            <li><span><i class="fas fa-circle"></i></span><a href="hotel-details.html">Hotel details</a>
                            </li>
                            <li><span><i class="fas fa-circle"></i></span> Booking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tour Booking Submission Areas -->
    <section id="tour_booking_submission" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tou_booking_form_Wrapper">
                        <div class="booking_tour_form">
                            <h3 class="heading_theme">Booking submission</h3>
                            <div class="tour_booking_form_box">
                                <form action="#" method="POST" id="tour_bookking_form_item">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <?php
                                            if (isset($_SESSION['user-details-fn'])) {
                                            ?>
                                                <div class="form-group">
                                                    <input type="text" class="form-control bg_input" name="fname" value="<?php echo $_SESSION['user-details-fn'] ?>" placeholder="First name*">
                                                </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg_input" name="lname" value="<?php echo $_SESSION['user-details-ln'] ?>" placeholder="Last name*">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg_input" name="email" value="<?php echo $_SESSION['user-details-email'] ?>" placeholder="Email address (Optional)">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control bg_input" name="mobile" value="<?php echo $_SESSION['user-details-mb'] ?>" placeholder="Mobile number*">
                                            </div>
                                        </div>


                                    <?php
                                            } else {
                                    ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control bg_input" name="fname" placeholder="First name*">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control bg_input" name="lname" placeholder="Last name*">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control bg_input" name="email" placeholder="Email address (Optional)">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control bg_input" name="mobile" placeholder="Mobile number*">
                                        </div>
                                    </div>


                                    <button type="submit" name="details" class="btn btn_theme btn_md">Submit</button>


                                <?php
                                            }
                                ?>





                            </div>


                            </form>
                        </div>
                    </div>

                    <?php

                    require('config.php');
                    require('razorpay-php/Razorpay.php');


                    // Create the Razorpay Order

                    use Razorpay\Api\Api;

                    $api = new Api($keyId, $keySecret);

                    //
                    // We create an razorpay order using orders api
                    // Docs: https://docs.razorpay.com/docs/orders
                    //

                    $orderData = [
                        'receipt'         => 3456,
                        'amount'          => $amount * 100, // 2000 rupees in paise
                        'currency'        => 'INR',
                        'payment_capture' => 1 // auto capture
                    ];

                    $razorpayOrder = $api->order->create($orderData);

                    $razorpayOrderId = $razorpayOrder['id'];

                    $_SESSION['razorpay_order_id'] = $razorpayOrderId;

                    $displayAmount = $amount = $orderData['amount'];

                    if ($displayCurrency !== 'INR') {
                        $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
                        $exchange = json_decode(file_get_contents($url), true);

                        $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
                    }

                    $data = [
                        "key"               => $keyId,
                        "amount"            => $amount,
                        "name"              => "letStay",
                        "description"       => "Finding for rooms? Let's stay!",
                        "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
                        "prefill"           => [
                            "name"              => 'customername',
                            "email"             => '$email',
                            "contact"           => '$contactno',
                        ],
                        "notes"             => [
                            "address"           => "Hello World",
                            "merchant_order_id" => "12312321",
                        ],
                        "theme"             => [
                            "color"             => "#F37254"
                        ],
                        "order_id"          => $razorpayOrderId,
                    ];

                    if ($displayCurrency !== 'INR') {
                        $data['display_currency']  = $displayCurrency;
                        $data['display_amount']    = $displayAmount;
                    }

                    $json = json_encode($data);
                    ?>

                    <?php

                    if (isset($_SESSION['user-details-fn'])) {
                        if ($_SESSION['user-details-fn'] != null) {


                    ?>
                            <div class="booking_tour_form">
                                <h3 class="heading_theme">Payment method</h3>
                                <div class="tour_booking_form_box">
                                    <div class="booking_payment_boxed">
                                        <?php
                                        if (isset($_POST['razorpay_payment_id'])) {
                                        ?>
                                            <div class="form-check">

                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Payment Confirmed

                                                    <img src="favi/right.png" width="20" height="50">
                                                    </br>
                                                    Payment ID: <?php echo $_POST['razorpay_payment_id'] ?>
                                                    <form action="final-book.php" id="bookingForm" method="POST" target="_blank">
                                                        <input type="hidden" value="<?php echo $_POST['razorpay_payment_id'] ?>" name="payid">
                                                        <button type="submit" name="bookings" class="btn btn_theme btn_md">Confirm Bookings</button>
                                                    </form>
                                                   

                                                </label>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="red">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Online Payment / Net Banking
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="black">
                                                <label class="form-check-label" for="flexRadioDefault3">
                                                    Cash on Check-In
                                                </label>
                                            </div>


                                            <div class="payment_filed_wrapper">
                                                <div class="payment_card payment_toggle red">
                                                    <div class="row">


                                                        <form method="POST" id="paymentForm">
                                                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $data['key'] ?>" data-amount="<?php echo $data['amount'] ?>" data-currency="INR" data-name="<?php echo $data['name'] ?>" data-image="<?php echo $data['image'] ?>" data-description="<?php echo $data['description'] ?>" data-prefill.name="<?php echo $data['prefill']['name'] ?>" data-prefill.email="<?php echo $data['prefill']['email'] ?>" data-prefill.contact="<?php echo $data['prefill']['contact'] ?>" data-notes.shopping_order_id="3456" data-order_id="<?php echo $data['order_id'] ?>" <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount'] ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency'] ?>" <?php } ?>>
                                                            </script>
                                                            <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                                                            <input type="hidden" name="shopping_order_id" value="3456">
                                                        </form>
                                                        <script>
                                                            document.getElementById('bookingForm').addEventListener('submit', function() {
                                                                setTimeout(function() {
                                                                    window.open('gen_pdf.php', '_blank');
                                                                }, 1000);
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="paypal_payment payment_toggle green">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control bg_input " placeholder="Email Address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="payoneer_payment payment_toggle black">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <form action="cashondev.php" method="POST">
                                                                    <button type="submit" class="btn btn_theme btn_md" name="cashondev" > Cash Pay </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        <?php
                                        }
                                        ?>


                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <div class="booking_tour_form_submit">
                        <div class="form-check write_spical_check">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="tour_details_right_sidebar_wrapper">
                    <div class="tour_detail_right_sidebar">
                        <div class="tour_details_right_boxed">
                            <div class="tour_details_right_box_heading">
                                <?php
                                $sql = mysqli_query($conn, "select tname from type_master where tid = $typeid");
                                if ($sql) {
                                    $row = mysqli_fetch_assoc($sql);
                                ?>
                                    <h3><?php echo $row['tname']; ?></h3>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="valid_date_area">
                                <div class="valid_date_area_one">
                                    <h5>Valid from</h5>
                                    <p><?php echo $checkindate ?></p>
                                </div>
                                <div class="valid_date_area_one">
                                    <h5>Valid till</h5>
                                    <p><?php echo $checkoutdate ?></p>
                                </div>
                            </div>
                            <div class="tour_package_details_bar_list">
                                <h5>Room facilities</h5>
                                <ul>
                                    <?php
                                    $query = mysqli_query($conn, "select f.fname,f.fid,f.fdescription,h.fid,h.hid from facility_master f, hotel_facility_master h where f.fid = h.fid and h.hid = $hid");
                                    if (mysqli_num_rows($query) > 0) {
                                        while ($facility = mysqli_fetch_assoc($query)) {
                                    ?>
                                            <li><i class="fas fa-circle"></i><?php echo $facility['fname'] . " - " . $facility['fdescription'] ?></li>

                                    <?php
                                        }
                                    }
                                    ?>


                                </ul>
                            </div>
                            <div class="tour_package_details_bar_price">
                                <h5>Price</h5>
                                <div class="tour_package_bar_price">
                                    <h6><del><?php $twenty = $amount / 100;
                                                echo $twenty += 20 * $amount / 10000 ?></del></h6>
                                    <h3><?php echo ($amount / 100) / $room_need  ?><sub>/Per Room</sub> </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tour_detail_right_sidebar">
                        <div class="tour_details_right_boxed">
                            <div class="tour_details_right_box_heading">
                                <h3>Travel date</h3>
                            </div>
                            <div class="edit_date_form">
                                <div class="form-group">

                                    <input type="date" id="dates" value="<?php echo $checkindate ?>" class="form-control">
                                </div>
                            </div>
                            <div class="tour_package_details_bar_list">
                                <h5>Tourist</h5>
                                <div class="select_person_item">
                                    <div class="select_person_left">
                                        <h6>Adult</h6>
                                        <p>12y+</p>
                                    </div>
                                    <div class="select_person_right">
                                        <h6><?php echo $adult ?></h6>
                                    </div>
                                </div>

                                <div class="select_person_item">
                                    <div class="select_person_left">
                                        <h6>Children</h6>
                                        <p>2 - 12 years</p>
                                    </div>
                                    <div class="select_person_right">
                                        <h6><?php echo $child ?></h6>
                                    </div>
                                </div>
                                <div class="select_person_item">
                                    <div class="select_person_left">
                                        <h6>Total</h6>
                                        <p>No. of peoples</p>
                                    </div>
                                    <div class="select_person_right">
                                        <h6><?php echo $guests ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tour_detail_right_sidebar">
                        <div class="tour_details_right_boxed">
                            <div class="tour_details_right_box_heading">
                                <h3>Booking amount</h3>
                            </div>

                            <div class="tour_booking_amount_area">
                                <ul>
                                    <li>Rooms x <?php echo $room_need ?> <span>Rs. <?php echo $twenty ?>/-</span></li>
                                    <li>Discount <span>-20%</span></li>

                                </ul>
                                <div class="tour_bokking_subtotal_area">
                                    <h6>Subtotal <span>Rs. <?php echo $amount / 100  ?>/-</span></h6>
                                </div>

                                <div class="total_subtotal_booking">
                                    <h6>Total Amount <span>Rs. <?php echo $amount / 100 ?>/-</span> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Cta Area -->
    <section id="cta_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="cta_left">
                        <div class="cta_icon">
                            <img src="assets/img/common/email.png" alt="icon">
                        </div>
                        <div class="cta_content">
                            <h4>Get the latest news and offers</h4>
                            <h2>Subscribe to our newsletter</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="cat_form">
                        <form id="cta_form_wrappper">
                            <div class="input-group"><input type="text" class="form-control" placeholder="Enter your mail address"><button class="btn btn_theme btn_md" type="button">Subscribe</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer  -->
    <footer id="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Need any help?</h5>
                    </div>
                    <div class="footer_first_area">
                        <div class="footer_inquery_area">
                            <h5>Call 24/7 for any help</h5>
                            <h3> <a href="tel:+00-123-456-789">+00 123 456 789</a></h3>
                        </div>
                        <div class="footer_inquery_area">
                            <h5>Mail to our support team</h5>
                            <h3> <a href="mailto:support@domain.com">support@domain.com</a></h3>
                        </div>
                        <div class="footer_inquery_area">
                            <h5>Follow us on</h5>
                            <ul class="soical_icon_footer">
                                <li><a href="#!"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#!"><i class="fab fa-twitter-square"></i></a></li>
                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#!"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-6 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Company</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="testimonials.html">Testimonials</a></li>
                            <li><a href="faqs.html">Rewards</a></li>
                            <li><a href="terms-service.html">Work with Us</a></li>
                            <li><a href="tour-guides.html">Meet the Team </a></li>
                            <li><a href="news.html">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Support</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="dashboard.html">Account</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="testimonials.html">Legal</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="top-destinations.html"> Affiliate Program</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Other Services</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="top-destinations-details.html">Community program</a></li>
                            <li><a href="top-destinations-details.html">Investor Relations</a></li>
                            <li><a href="flight-search-result.html">Rewards Program</a></li>
                            <li><a href="room-booking.html">PointsPLUS</a></li>
                            <li><a href="testimonials.html">Partners</a></li>
                            <li><a href="hotel-search.html">List My Hotel</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <div class="footer_heading_area">
                        <h5>Top cities</h5>
                    </div>
                    <div class="footer_link_area">
                        <ul>
                            <li><a href="room-details.html">Chicago</a></li>
                            <li><a href="hotel-details.html">New York</a></li>
                            <li><a href="hotel-booking.html">San Francisco</a></li>
                            <li><a href="tour-search.html">California</a></li>
                            <li><a href="tour-booking.html">Ohio </a></li>
                            <li><a href="tour-guides.html">Alaska</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_left">
                        <p>Copyright © 2022 All Rights Reserved</p>
                    </div>
                </div>
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_right">
                        <img src="assets/img/common/cards.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script src="assets/js/payment-form.js"></script>

</body>


<!-- Mirrored from andit.co/projects/html/and-tour/demo/room-booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 07:31:18 GMT -->

</html>