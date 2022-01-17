
<?php  session_start();

if(!isset($_SESSION['user_login']) && !isset($_COOKIE['user_login']) ){
	header("Location: login.php" );
}


$connect = mysqli_connect('localhost','root','','rent_car');
if(!empty($_POST))
{
    $carname=$_POST['carname'];
    $cond=$_POST['condition'];
    $quantity=$_POST['quantity'];

    $stno=$_POST['seatno'];
    $cost=$_POST['rentcost'];
    $image=$_FILES['photo'];
    $imagename='car-'.time().'-'.rand(100000,10000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
    $insert1 = "INSERT INTO car_details(car_name,car_condition,quantity,car_seat,car_rent,car_photo) 
    VALUES('$carname','$cond','$quantity','$stno','$cost','$imagename')";
    $result1 = mysqli_query($connect,$insert1);
    if($result1)
    {
        move_uploaded_file($image['tmp_name'],'uploads/'.$imagename);
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
    <h1>Add car</h1>
    <form class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"></div>
      
      <input type="text" placeholder="Carname" name="carname" required />
      <input type="text" placeholder="AC/NonAC" name="condition" required />
      <input type="number" placeholder="Quantity" name="quantity" required />

      <input type="number" placeholder="Seat number" name="seatno" required />
      <input type="text" placeholder="Rent cost" name="rentcost" required />


      <div class="avatar">
          <label>Select Car: </label>
          <input type="file" name="photo" accept="image/*" required />
      </div>
      <input type="submit" value="AddCar" name="addcar" class="btn btn-block btn-primary" />
      <p style="color: white;">back a Car list ? <a style=" color: white;" href="Carlist.php" >Yes</a></p>

    </form>
  </div>
</div>