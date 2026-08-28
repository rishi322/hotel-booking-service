<?php

session_start();
$uid = $_SESSION['uid'];
include 'connection.php';


?>
<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from andit.co/projects/html/and-tour/demo/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 07:36:55 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Dashboard - Andtourtravel </title>
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
    <?php
if(isset($_SESSION['pdf'])){
    if($_SESSION['pdf'] === 'yes'){
       ?>
       <script> 
       window.open("gen_pdf.php","_blank")
       </script> <?php
    }
} ?>
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
                        <h2>Customer dashboard</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span>Customer dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Area -->
    <section id="dashboard_main_arae" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="dashboard_sidebar">
                        <div class="dashboard_sidebar_user">
                            <?php

                                $fuser = mysqli_query($conn,"select * from user_master where uid=$uid");
                                $user = mysqli_fetch_assoc($fuser);



                            ?>
                            <img src="<?php echo $user['photo'] ?>" alt="img">
                            <h3><?php echo $user['name']?></h3>
                            <p><a href="tel:+00-123-456-789"><?php echo $user['phn']?></a></p>
                            <p><a href="mailto:sherlyn@domain.com"><?php echo $user['email']?></a></p>
                        </div>
                        <div class="dashboard_menu_area">
                            <ul>
                                <li><a href="user-dashboard.php" class="active"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                                <li class="dashboard_dropdown_button" id="dashboard_dropdowns"><i class="fas fa-address-card"></i>My bookings
                                    <span> <i class="fas fa-angle-down"></i></span>
                                    <div class="booing_sidebar_dashboard" id="show_dropdown_item" style="display: none;">
                                        <ul>
                                            <li><a href="hotel-booking.html"><i class="fas fa-hotel"></i>Hotel
                                                    booking</a></li>
                                            <li><a href="flight-booking.html"><i class="fas fa-paper-plane"></i>Cancelled
                                                    booking</a></li>

                                        </ul>
                                    </div>
                                </li>
                                <li><a href="my-profile.html"><i class="fas fa-user-circle"></i>My profile</a></li>

                                <a href="logout.php" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-sign-out-alt"></i>Logout
                                </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="dashboard_main_top">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dashboard_top_boxed">
                                    <div class="dashboard_top_icon">
                                        <i class="fas fa-shopping-bag"></i>
                                    </div>
                                    <div class="dashboard_top_text">
                                        <h3>Encrypted end to end Transactions</h3>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dashboard_top_boxed">
                                    <div class="dashboard_top_icon">
                                        <i class="fas fa-sync"></i>
                                    </div>
                                    <div class="dashboard_top_text">
                                        <h3>24 * 7 Hours Booking Service</h3>
                                        <h1></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard_common_table">
                        <h3>My bookings</h3>
                        <div class="table-responsive-lg table_common_area">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>

                                        <th>Hotel</th>
                                        <th>Booking amount</th>
                                        <th>Payment type</th>
                                        <th>Payment Key</th>
                                        <th>Status</th>
                                        <th>View Invoice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $fetch = mysqli_query($conn, "select * from booking_tb where uid = $uid ORDER BY bid DESC");
                                    if (mysqli_num_rows($fetch) > 0) {
                                        while ($bookings = mysqli_fetch_assoc($fetch)) {
                                            $hid = $bookings['hid'];
                                            $fhotel = mysqli_query($conn, "select * from hotel_master where hid = $hid");
                                            $hotel = mysqli_fetch_assoc($fhotel);

                                    ?>

                                            <tr>
                                                <td><?php echo $bookings['bid'] ?></td>



                                                <td><?php echo $hotel['hname'] ?></td>
                                                <td>INR <?php echo $bookings['total amount'] ?></td>
                                                <td><?php echo $bookings['paytype'] ?></td>
                                                <td><?php if ($bookings['paymentkey'] != null) echo $bookings['paymentkey'];
                                                    else echo "-"; ?></td>

                                                <td class="complete"><?php echo $bookings['paystatus'] ?></td>
                                                <td><a href="download-pdf.php?bid=<?php echo $bookings['bid'] ?>"><i class="fas fa-eye"></i></a></td>
                                            </tr>

                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Cta Area -->
  
    <!-- Footer -->
                        <?php
                        include 'user-footer.php';
                        ?>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body logout_modal_content">
                    <div class="btn_modal_closed">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <h3>
                        Are you sure? <br>
                        you want to log out.
                    </h3>
                    <div class="logout_approve_button">
                        <button data-bs-dismiss="modal" class="btn btn_theme btn_md">Yes Confirm</button>
                        <button data-bs-dismiss="modal" class="btn btn_border btn_md">No Cancel</button>
                    </div>
                </div>
            </div>
        </div>
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

</body>


<!-- Mirrored from andit.co/projects/html/and-tour/demo/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 07:36:59 GMT -->

</html>