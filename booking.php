<?php session_start();



if(!isset($_SESSION['user_login']) && !isset($_COOKIE['user_login']) ){
	header("Location: login.php" );
}

$connect = mysqli_connect('localhost','root','','rent_car');
$id=$_GET['v'];
$sel= "SELECT * FROM car_details WHERE car_id='$id'";
$re=mysqli_query($connect,$sel);
$data=mysqli_fetch_assoc($re);




if(isset($_POST['save']))
{
    $cname=$_POST['carname'];
    $phone=$_POST['phonenumber'];
    
    $user=$_POST['username'];
    $useremail=$_POST['email'];
    $t=$_POST['timehour'];
    $pick_up=$_POST['from'];
    $d=$_POST['desti'];
    $c=$data['car_rent'];
    $cc=intval($c);
    //echo $cc;
    $tt=intval($t);
    $total_cost=$cc * $tt;
   // echo $total_cost;
    $t_c=strval($total_cost);
    $quantityy= $data['quantity'];
    $stus="unpaid";
    if($quantityy>0){
    $insert = "INSERT INTO `booking`(`car_namee`, `user_namee`, `user_phonee`, `user_email`, `timeeee`, `pick_up`, `destination`, `total_cost`,`pay_status`)
     VALUES ('$cname','$user','$phone','$useremail','$t','$pick_up','$d','$t_c','$stus');";
    $result = mysqli_query($connect,$insert);
    if($result)
    {
        //header('location: user_car.php');
        $_SESSION['user_phone'] = $data['car_id'];
         $_SESSION['time']=$t;
         $_SESSION['car_name']=$data['car_name'];
         $quantityy= $quantityy-1;
         $update = "UPDATE car_details SET quantity='$quantityy' WHERE car_id='$id'";
         $result1 = mysqli_query($connect,$update);
        // echo '<script type="text/javascript">alert("Data Save")</script>';
        // //$_SESSION['user_phone'] = $data['car_id'];
         header('location: totalrate.php');  
        
    }
    else{
        echo '<script type="text/javascript">alert("Sorry!Try Again")</script>';
    }
  }else{
    echo '<script type="text/javascript">alert("Sorry!Out of inventory")</script>';

  }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style6.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">s
    <title>Document</title>
</head>
<body>
  <div class="container">
  <div class="title">User Booking</div>

<form action="booking.php?v=<?= $data['car_id']; ?>" method="post">
    <div class="user-details">
      
    <div class="input-box">
      <p class="w3-large"> Car Name </p>
      <input type="text" placeholder="Carname" name="carname" value="<?= $data['car_name']; ?>"  />
    </div>
    <div class="input-box">
      <p class="w3-large">User Name </p>
      <input type="text" placeholder="Username" name="username" value="<?= $_SESSION['name']; ?>" />
    </div>
    <div class="input-box">
    <p class="w3-large">Mobile Number </p>

    <input type="text" placeholder="Phone number" name="phonenumber" value="<?= $_SESSION['user_login']; ?>" />

    </div>
    <div class="input-box">
    <p class="w3-large">Email </p>

    <input type="text" placeholder="Email" name="email" value="<?= $_SESSION['user_email']; ?>" />

    </div>
   
    <div class="input-box">
    <p class="w3-large">Riding Time </p>

    <input type="text" placeholder="Time Hour" name="timehour" required/>

    </div>
    <div class="input-box">
    <p class="w3-large">Pick up point </p>

    <input type="text" placeholder="pick up point" name="from" required/>

    </div>
    <div class="input-box">
    <p class="w3-large">Destination </p>

    <input type="text" placeholder="Destination" name="desti" required/>

    </div>
    

    </div>
    <div class="button">
          <input type="submit" name="save" value="Order">
        </div>      
        <a href="user_car.php" >explore another car</a></p>

    </form>
</div>
</body>
</html>