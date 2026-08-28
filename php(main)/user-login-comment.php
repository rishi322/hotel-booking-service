<!DOCTYPE html>
<html lang="zxx">

<?php
$alert = 0;
session_start();
include 'connection.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_check = mysqli_query($conn, "select * from user_master where email = '$email'");
    if (mysqli_num_rows($login_check) > 0) {


        $pass_check = mysqli_query($conn, "select * from user_master where email = '$email' and password = '$password'");
        if (mysqli_num_rows($pass_check) > 0) {
            $message = "login successful";
            $alert = 1;
            $uid = mysqli_fetch_assoc($pass_check);
            $_SESSION['uid'] = $uid['uid'];
            $_SESSION['password'] = $uid['password'];

            header("Location: " . $_SESSION['prev-page']);
        } else {
            $message = "password incorrect";
            $alert = 2;
        }
    } else {
        $message = "No such user found!";
        $alert = 3;
    }
}


?>


<!-- Mirrored from andit.co/projects/html/and-tour/demo/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 07:01:14 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Login - Andtourtravel </title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
</head>

<body>
    <?php if (isset($_POST['login'])) {
        if ($alert == 1) {
    ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong> <?php echo $message ?>!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> <?php echo $message ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

    <?php
        }
    }
    ?>

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
                            <h3>Login your account</h3>
                            <h2>Logged in to stay in touch</h2>
                        </div>
                        <div class="common_author_form">
                            <form action="#" method="POST" id="main_author_form">

                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Enter user email" />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Enter password" />
                                    <a href="forgot-password.html">Forgot password?</a>
                                </div>
                                <div class="common_form_submit">
                                    <button class="btn btn_theme btn_md" name="login">Log in</button>
                                </div>
                                <div class="have_acount_area">
                                    <p>Dont have an account? <a href="user-register-comment.php">Register now</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cta Area -->


    <!-- Footer -->


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


<!-- Mirrored from andit.co/projects/html/and-tour/demo/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 07:01:23 GMT -->

</html>