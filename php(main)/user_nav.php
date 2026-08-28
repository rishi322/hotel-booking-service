<head>
    <link rel="stylesheet" href="hotels.css" />

</head>
<?php

include 'connection.php';


?>
<div class="topbar-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <ul class="topbar-list">
                    <li><span>Contact Us</span></li>
                    <li>
                        <a href="#!"><i class="fab fa-facebook"></i></a>
                        <a href="#!"><i class="fab fa-twitter-square"></i></a>
                        <a href="#!"><i class="fab fa-instagram"></i></a>
                        <a href="#!"><i class="fab fa-linkedin"></i></a>
                    </li>
                    <li><a href="#!"><span>+91 7573 0213 01</span></a></li>
                    <li><a href="#!"><span>rishipatel1850@gmail.com</span></a></li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6">
                <?php

                if ($_SESSION['uid'] != null) {
                ?>
                    <ul class="topbar-others-options">
                        <?php
                        $uid = $_SESSION['uid'];
                        $fuser = mysqli_query($conn, "select * from user_master where uid=$uid");
                        $user = mysqli_fetch_assoc($fuser);



                        ?>
                        <img src="<?php echo $user['photo'] ?>" alt="Profile Picture" class="profile-pic">
                        <li><a href="user-dashboard.php"> <?php echo $user['name'] ?> </a></li>
                        <li><a href="logout.php">Logout</a></li>



                    </ul>
                <?php
                } else {
                ?>
                    <ul class="topbar-others-options">
                        <li><a href="user-login.php">Login</a></li>
                        <li><a href="user-register.php">Sign up</a></li>


                    </ul>

                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>


<div class="navbar-area">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a href="index.html">
                        <img src="assets/img/logo.png" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navbar">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" style="font-size:35px" href="userindex.php">
                    JuStay 
                    <br>
                    <h3>BOOKINGS</h3>
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="userindex.php" class="nav-link active">
                                Home

                            </a>




                    </ul>
                    </li>
                    <?php
                    if ($_SESSION['uid'] != null) {
                    ?>
                        <ul class="topbar-others-options">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Categories
                                    <i class="fas fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">


                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Hotel
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="hotel-search.html" class="nav-link">Hotel Grid</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="hotel-search-list.html" class="nav-link">Hotel List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="hotel-map.html" class="nav-link">Hotel Map</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="hotel-details.html" class="nav-link">Hotel Booking</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="room-details.html" class="nav-link">Room Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="room-booking.html" class="nav-link">Room Booking</a>
                                            </li>
                                        </ul>
                                    </li>


                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Dashboard <i class="fas fa-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="user-dashboard.php" class="nav-link">Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="user-dashboard.php" class="nav-link">Hotel booking</a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="my-profile.html" class="nav-link">My profile</a>
                                            </li>

                                        </ul>
                                    </li>

                                </ul>
                            <?php
                        }
                            ?>


                        </ul>
                        <div class="others-options d-flex align-items-center">
                            <div class="option-item">
                                <a href="#" class="search-box">
                                    <i class="bi bi-search"></i>
                                </a>
                            </div>

                        </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>
            <div class="container">
                <div class="option-inner">
                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <a href="#" class="search-box"><i class="fas fa-search"></i></a>
                        </div>
                        <div class="option-item">
                            <a href="contact.html" class="btn  btn_navber">Get free quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>