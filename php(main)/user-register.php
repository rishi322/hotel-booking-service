<?php

include 'connection.php';
if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name = $fname." ".$lname;
    $phn = $_POST['phn'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sign = mysqli_query($conn,"INSERT INTO `user_master`(`name`,`password`,`email`,`phn`,`address`,`photo`)VALUES('$name','$pass','$email',$phn,'$address','images/user2.png')");
    if($sign){
        $uid = mysqli_query($conn,"SELECT uid
        FROM user_master
        ORDER BY timestamp DESC
        LIMIT 1;
        ");
        if(mysqli_num_rows($uid)>0){
            $fuid = mysqli_fetch_assoc($uid);
        }
        $_SESSION['uid'] = $fuid['uid'];
        header("Location:userindex.php");
    }

} 

?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from andit.co/projects/html/and-tour/demo/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 07:01:23 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Register - Andtourtravel </title>
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

    <!--  Common Author Area -->
    <section id="common_author_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="common_author_boxed">
                        <div class="common_author_heading">
                            <h3>Register account</h3>
                            <h2>Register your account</h2>
                        </div>
                        <div class="common_author_form">
                            <form action="#" method="POST" id="main_author_form">
                                <div class="form-group">
                                    <input type="text" name = "fname" class="form-control" placeholder="Enter first name*" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="lname" class="form-control" placeholder="Enter last name*" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email"
                                        placeholder="your email address (Optional)" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control" placeholder="Address" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phn" class="form-control" placeholder="Mobile number*" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="User name*" />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass" class="form-control" placeholder="Password" />
                                </div>
                                <div class="common_form_submit">
                                    <button class="btn btn_theme btn_md" name="register">Register</button>
                                </div>
                                <div class="have_acount_area other_author_option">
                                    <div class="line_or">
                                        <span>or</span>
                                    </div>
                                    <ul>
                                        <li><a href="#!"><img src="assets/img/icon/google.png" alt="icon"></a></li>
                                        <li><a href="#!"><img src="assets/img/icon/facebook.png" alt="icon"></a></li>
                                        <li><a href="#!"><img src="assets/img/icon/twitter.png" alt="icon"></a></li>
                                    </ul>
                                    <p>Already have an account? <a href="user-login.php">Log in now</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
  

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


<!-- Mirrored from andit.co/projects/html/and-tour/demo/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 07:01:26 GMT -->
</html>