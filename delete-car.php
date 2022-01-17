<?php  session_start();

if(!isset($_SESSION['user_login']) && !isset($_COOKIE['user_login']) ){
	header("Location: login.php" );
}
     $connect = mysqli_connect('localhost', 'root', '', 'rent_car');
     $id=$_GET['d'];
     $del= "DELETE FROM car_details WHERE car_id='$id'";
     $q=mysqli_query($connect,$del);
     
     header('Location: Carlist.php');

     

?>