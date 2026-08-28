
<?php

include 'connection.php';

$hotel = mysqli_query($conn,"select COUNT(*) as totalh from hotel_master");

$count = mysqli_fetch_assoc($hotel);

$hcount = $count['totalh'];

$user = mysqli_query($conn,"select COUNT(*) as totalu from user_master");
$ucount = mysqli_fetch_assoc($user);

$utotal = $ucount['totalu'];


$book = mysqli_query($conn,"select COUNT(*) as totalb from booking_tb");
$bcount = mysqli_fetch_assoc($book);

$btotal = $bcount['totalb'];


$invoice = mysqli_query($conn,"select COUNT(*) as totali from booking_tb where paystatus='unpaid'");
$icount = mysqli_fetch_assoc($invoice);

$itotal = $icount['totali'];
?>
<div class="row">
                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center p-1">
                                        <div class="col-lg-6">
                                            <h5 class="font-16">Total Hotels</h5>
                                            <h4 class="text-info pt-1 mb-0"><?php echo $hcount ?></h4>
                                        </div>
                                        <div class="col-lg-6">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center p-1">
                                        <div class="col-lg-6">
                                            <h5 class="font-16">Total Customers</h5>
                                            <h4 class="text-warning pt-1 mb-0"><?php echo $utotal ?></h4>
                                        </div>
                                        <div class="col-lg-6">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center p-1">
                                        <div class="col-lg-6">
                                            <h5 class="font-16">Total Bookings</h5>
                                            <h4 class="text-primary pt-1 mb-0"><?php echo $btotal ?></h4>
                                        </div>
                                        <div class="col-lg-6">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center p-1">
                                        <div class="col-lg-6">
                                            <h5 class="font-16">Unpaid Invoices</h5>
                                            <h4 class="text-danger pt-1 mb-0"><?php echo $itotal ?></h4>
                                        </div>
                                        <div class="col-lg-6">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end top-Contant -->

              
                        
                        <!-- end row -->

