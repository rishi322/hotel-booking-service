<?php
require("fpdf185/fpdf.php");
include 'connection.php';
session_start();
if (!isset($_GET['bid'])) {
    header("Location:user-dashboard");
}
//customer and invoice details

$bid = $_GET['bid'];
$uid = $_SESSION['uid'];
$userf = mysqli_query($conn,"select * from user_master where uid = $uid");

$user = mysqli_fetch_assoc($userf);

$uname = $user['name'];

// $stateid = $user['state_id'];
// $cityid = $user['city_id'];

$mobile = $user['phn'];

$address = $user['address'];
// $statef = mysqli_query($conn,"select state from state_tb where state_id = $stateid");
// $staten = mysqli_fetch_assoc($statef);

// $state = $staten['state'];

// $cityf = mysqli_query($conn,"select * from city_tb where city_id = $cityid");
// $cityn = mysqli_fetch_assoc($city);

// $city = $cityn['city'];





$bookings = mysqli_query($conn,"select * from booking_tb where bid = $bid");

$book = mysqli_fetch_assoc($bookings);

$checkindate = $book['check-in-date'];
$checkoutdate = $book['check-out-date'];
$typeid = $book['tid'];
$hid = $book['hid'];

$hotel = mysqli_query($conn,"select hname from hotel_master where hid = $hid");
$htl = mysqli_fetch_assoc($hotel);

$type = mysqli_query($conn,"select * from type_master where tid = $typeid");
$typ = mysqli_fetch_assoc($type);

$amount = $book['total amount'];

$room = mysqli_query($conn,"select * from room_master where hid= $hid and tid = $typeid");

$ppr = mysqli_fetch_assoc($room);

$noofroom = $amount / $ppr['price_per_room'];
$twenty = $ppr['price_per_room']*20/100;

$info = [
    "customer" => $uname,
    "address" => $address,
    "mobile" => $mobile,
    "invoice_no" => $bid,
    "invoice_date" => $book['bdate'],
    "total_amt" => "INR ".$amount,
    "words" => $book['paystatus'],
    "method" =>$book['paytype'],
    "paykey" =>$book['paymentkey'],
    "check-in-date" => $checkindate,
    "check-out-date" => $checkoutdate
];

$tw = $amount /5 ;

$products_info = [
    [
        "name" => $htl['hname']." (".$typ['tname'].")",
        "price" => $ppr['price_per_room'] + $tw,
        "qty" => $noofroom,
        "total" => $amount + $tw
    ],
    [
        "name" => "20% Discount",
        "price" => "-".$twenty,
        "qty" => "",
        "total" => "-".$tw
    ],
    [
        "name" => "",
        "price" => "",
        "qty" => "",    
        "total" => ""
    ],
];

class PDF extends FPDF
{
    function Header()
    {

        //Display Company Info
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(50, 10, "JuStay Bookings", 0, 1);
        $this->SetFont('Arial', '', 14);
        $this->Cell(50, 7, "Surat, Gujarat", 0, 1);
        $this->Cell(50, 7, "justay@gmail.com", 0, 1);
        $this->Cell(50, 7, "PH : 7573021301", 0, 1);

        //Display INVOICE text
        $this->SetY(15);
        $this->SetX(-40);
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(50, 10, "Invoice", 0, 1);

        //Display Horizontal line
        $this->Line(0, 48, 210, 48);
    }

    function body($info, $products_info)
    {

        //Billing Details
        $this->SetY(55);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 10, "Bill To: ", 0, 1);
        $this->SetFont('Arial', '', 12);
        $this->Cell(50, 7, $info["customer"], 0, 1);
        $this->Cell(50, 7, $info["address"], 0, 1);
        $this->Cell(50, 7, $info["mobile"], 0, 1);

        //Display Invoice no
        $this->SetY(55);
        $this->SetX(-60);
        $this->Cell(50, 7, "Invoice No : " . $info["invoice_no"]);

        //Display Invoice date
        $this->SetY(63);
        $this->SetX(-60);
        $this->Cell(50, 7, "Invoice Date : " . $info["invoice_date"]);
        $this->SetY(70);
        $this->SetX(-60);
        $this->Cell(50, 7, "Check In Date : " . $info["check-in-date"]);
        $this->SetY(77);
        $this->SetX(-60);
        $this->Cell(50, 7, "Check Out Date : " . $info["check-out-date"]);

        //Display Table headings
        $this->SetY(95);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(80, 9, "DESCRIPTION", 1, 0);
        $this->Cell(40, 9, "PRICE PER ROOM", 1, 0, "C");
        $this->Cell(30, 9, "ROOMS", 1, 0, "C");
        $this->Cell(40, 9, "TOTAL", 1, 1, "C");
        $this->SetFont('Arial', '', 12);

        //Display table product rows
        foreach ($products_info as $row) {
            $this->Cell(80, 9, $row["name"], "LR", 0);
            $this->Cell(40, 9, $row["price"], "R", 0, "R");
            $this->Cell(30, 9, $row["qty"], "R", 0, "C");
            $this->Cell(40, 9, $row["total"], "R", 1, "R");
        }
        //Display table empty rows
        for ($i = 0; $i < 12 - count($products_info); $i++) {
            $this->Cell(80, 9, "", "LR", 0);
            $this->Cell(40, 9, "", "R", 0, "R");
            $this->Cell(30, 9, "", "R", 0, "C");
            $this->Cell(40, 9, "", "R", 1, "R");
        }
        //Display table total row
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(150, 9, "TOTAL", 1, 0, "R");
        $this->Cell(40, 9, $info["total_amt"], 1, 1, "R");

        //Display amount in words
        $this->SetY(225);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 9, "PAYMENT METHOD ", 0, 1);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 9, $info["method"], 0, 1);
        $this->SetY(225);
        $this->SetX(56);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 9, "PAYMENT STATUS ", 0, 1);
        $this->SetFont('Arial', '', 12);
        $this->SetY(234);
        $this->SetX(56);
        $this->Cell(0, 9, $info["words"], 0, 1);
        $this->SetX(56);
        $this->SetFont('Arial', 'B', 12);
        $this->SetY(225);
        $this->SetX(100);
        $this->Cell(0, 9, "PAYMENT KEY ", 0, 1);
        $this->SetFont('Arial', '', 12);
        $this->SetY(234);
        $this->SetX(100);
        $this->Cell(0, 9, $info["paykey"], 0, 1);
       
    }
    function Footer()
    {

        //set footer position
        $this->SetY(-50);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, "for JuStay Bookings", 0, 1, "R");
        $this->Ln(15);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, "Authorized Signature", 0, 1, "R");
        $this->SetFont('Arial', '', 10);

        //Display Footer Text
        $this->Cell(0, 10, "This is a computer generated invoice", 0, 1, "C");
    }
}
//Create A4 Page with Portrait 
$pdf = new PDF("P", "mm", "A4");
$pdf->AddPage();
$pdf->body($info, $products_info);
$pdf->Output();
