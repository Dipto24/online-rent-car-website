<?php  session_start();

if(!isset($_SESSION['user_login']) && !isset($_COOKIE['user_login']) ){
	header("Location: login.php" );
}
$connect = mysqli_connect('localhost','root','','rent_car');
$id=$_GET['e'];
$sel= "SELECT * FROM car_details WHERE car_id='$id'";
$re=mysqli_query($connect,$sel);
$data=mysqli_fetch_assoc($re);
$connect = mysqli_connect('localhost','root','','rent_car');
if(!empty($_POST))
{
    $carname=$_POST['carname'];
    $cond=$_POST['condition'];
    //$stno=$_POST['seatno'];
    $cost=$_POST['rentcost'];
    $quantity=$_POST['quantity'];

   // $image=$_FILES['photo'];
   // $imagename='car-'.time().'-'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
    $update = "UPDATE car_details SET car_name='$carname',car_condition='$cond',car_rent='$cost',quantity='$quantity' WHERE car_id='$id'";
    $result1 = mysqli_query($connect,$update);
    if($result1)
    {
        echo '<script type="text/javascript">alert("Data Save")</script>';
       // $_SESSION['user_login'] = $phonenumber;
       header('location: Carlist.php');  
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
    <h1>Edit Car Information</h1>
    <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      
      <p class="w3-large"> Car Name </p>
      <input type="text" placeholder="Carname" name="carname" value="<?= $data['car_name']; ?>" required />
      <p class="w3-large"> Condition </p>

      <input type="text" placeholder="AC/NonAC" name="condition" value="<?= $data['car_condition']; ?>" required />
      <p class="w3-large"> Quantity </p>

      <input type="number" placeholder="Quantity" name="quantity" value="<?= $data['quantity']; ?>" required />
      <p class="w3-large"> Rent Cost </p>

      <input type="text" placeholder="Rent cost" name="rentcost" value="<?= $data['car_rent']; ?>"required />


     
      <input type="submit" value="Submit" name="addcar" class="btn btn-block btn-primary" />
      <p style="color: white;">back a Car list ? <a style=" color: white;" href="Carlist.php" >Yes</a></p>

    </form>
  </div>
</div>