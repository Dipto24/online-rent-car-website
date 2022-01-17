<?php session_start();

if(!isset($_SESSION['user_login']) && !isset($_COOKIE['user_login']) ){
	header("Location: login.php" );
}
$connect = mysqli_connect('localhost','root','','rent_car');
$id=$_GET['edit'];
$sel= "SELECT * FROM booking WHERE id='$id'";
$re=mysqli_query($connect,$sel);
$data=mysqli_fetch_assoc($re);
//$connect = mysqli_connect('localhost','root','','rent_car');
if(!empty($_POST))
{
   
    //$stno=$_POST['seatno'];
    $pay_status = $_POST['payment_status'];
   // $image=$_FILES['photo'];
   // $imagename='car-'.time().'-'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
     $update = "UPDATE booking SET pay_status='$pay_status' WHERE id='$id'";
     $result1 = mysqli_query($connect,$update);
    if($result1)
    {
       echo '<script type="text/javascript">alert("Data Save")</script>';
       // $_SESSION['user_login'] = $phonenumber;
      header('location: booking_list.php');  
   }
   else{
           echo '<script type="text/javascript">alert("Sorry!Try Again")</script>';
    }

}



?>

<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="addcar1.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Edit Payment Status</h1>
    <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      
     

      <p class="w3-large"> Payment Status </p>
      <select name="payment_status" style="width:500px;">
							<option value="">Select</option>
							<option value="paid" >Paid</option>
							<option value="unpaid" >Unpaid</option>
							
						</select>


     
      <input type="submit" value="Submit" name="addcar" class="btn btn-block btn-primary" />
      <p style="color: white;">back a Booking list ? <a style=" color: white;" href="booking_list.php" >Yes</a></p>
    </form>

  </div>
</div>