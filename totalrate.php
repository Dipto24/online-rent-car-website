
<?php session_start();
    

if(!isset($_SESSION['user_login']) && !isset($_COOKIE['user_login']) ){
	header("Location: login.php" );
}
    $session_user =  $_SESSION['user_phone'];
    $session_phone=  $_SESSION['user_login'];
    $session_time =  $_SESSION['time'];
    $connect = mysqli_connect('localhost','root','','rent_car');
    
    $sel= "SELECT * FROM car_details WHERE car_id='$session_user'";
    $re=mysqli_query($connect,$sel);
    $data=mysqli_fetch_assoc($re);
    $c=$data['car_rent'];
    $cc=intval($c);
    $t=intval($session_time);
    $total_cost=$cc * $t;
    $t_cc=strval($total_cost);
    $sell= "SELECT * FROM booking WHERE user_phonee='$session_phone' ORDER BY id DESC LIMIT 1";
    $ree=mysqli_query($connect,$sell);
    $dataa=mysqli_fetch_assoc($ree);
    $_SESSION['booking_id']= $dataa['id'];
    $card=$_SESSION['booking_id'];
   // echo $_SESSION['booking_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  body{
    background: burlywood;
  }
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  transition: 0.3s;
  width: 550px;
  margin-top: 60px; 
  margin-left: 450px;
  text-align: center;
  font-family: arial;
  background: whitesmoke;
}

.card .center {
                display: block;
                padding-top: 10px;
                margin-top: 0px;
                margin-left: 180px;
               /* margin-right: auto;*/
                width: 50%;
                height: 30%;
               /* margin-bottom: 100px;*/
            
            }

.title {
  color: grey;
  font-size: 18px;
}
.t1 {
  color: hotpink;
  font-size: 17px;
}
.card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            }

.button1 {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 50px;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}


a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}
i{
   margin-right: 20px; 
}



</style>
</head>
<body>
    

<div class="card">
<img class="center" width="50%" height="30%" src="congrates.gif"  >
  <h1>Your order is complete! </h1>
  <p class="title">You will be receiving a confirmation email with order details. </p>
  <p class="t1">Your Total Cost is Tk.<?= $t_cc; ?></p>
  <p class="t1">Your Order id is <?= $card; ?></p>

  <a href="user_car.php" class="edit"><p><button class="button1"> <i class="fa fa-car"></i>Explore more cars</button></p>
  <a href="delete_book.php" class="edit"><p><button class="button1">Order Cancel</button></p>


</div>
</body>
</html>