<?php  session_start();



if(!isset($_SESSION['user_login']) && !isset($_COOKIE['user_login']) ){
	header("Location: login.php" );
}

     $connect = mysqli_connect('localhost', 'root', '', 'rent_car');
     $id=  $_SESSION['booking_id'];
     
     $del= "DELETE FROM booking WHERE id=$id";
     $q=mysqli_query($connect,$del);
     
    if($q)
    {
        echo "Deleted Successfully";
        header('Location: user_car.php');
    }
    else
    {
        echo "Error";
    }

     

     

?>