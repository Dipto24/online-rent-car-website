<?php session_start();
$pass= md5('1234');
define('phonenumber', 'Admin');
define('password',$pass);   
if(isset($_SESSION['user_login']) || isset($_COOKIE['user_login']) ){
	if(($_SESSION['user_login'] == phonenumber) || ($_COOKIE['user_login'] == password))
	{
		header("Location: Carlist.php");

	}
	else
	{
		header("Location: navi.php");
	}
}
    $connect = mysqli_connect('localhost','root','','rent_car');

    if(!empty($_POST))
    {
       
        $phonenumber = $_POST['phonenumber'];
        $password = md5($_POST['password']);
        $keep = isset($_POST['keep']) ? $_POST['keep'] : NULL;

        if($phonenumber == phonenumber && $password == password)
        {
            $_SESSION['user_login'] = $phonenumber;
            if(isset($keep))
			{					
				setcookie('user_login', $phonenumber, time()+60*60);	
               // echo $_COOKIE['user_login'];
               // echo "Hello";
			}

            
           header('location: Carlist.php');  

        }
        else
        {
            $sql1 = "SELECT * FROM user WHERE user_phone='$phonenumber' AND user_password='$password'";
        
       
        $result1 = mysqli_query($connect,$sql1);
        $data = mysqli_fetch_assoc($result1);
        
        if($data)
        {
            $_SESSION['id'] = $data['user_id'];
            $_SESSION['name'] = $data['user_name'];
           // $_SESSION['user'] = $data['user_username'];
            $_SESSION['user_email'] = $data['user_email'];


            $_SESSION['user_login'] = $phonenumber;
            if(isset($keep))
			{					
				setcookie('user_login', $phonenumber, time()+60*60);	
               // echo $_COOKIE['user_login'];
               // echo "Hello";
			}

            header('location: navi.php');  

            echo '<script type="text/javascript">alert("Login")</script>';
            
        }
        else{
            echo '<script type="text/javascript">alert("Sorry")</script>';
        }

        }
        
    }
?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Animated Login Form</title>
        <link rel="stylesheet" href="sty.css">
    </head>
    <body>
        <form class="box" action="" method="post">
          <h1>Login</h1>
          <input type="text" name="phonenumber" value="" placeholder="Phonenumber">
          <input type="text" name="password" value="" placeholder="Password">
          <input type="submit" name="" value="Login">
          
          <input type="checkbox" name="keep" value="keep">
          <p style="color: white;">Remember me?</p>
          <p style="color: white;">haven"t sign up yet? <a href="Registration.php" >Sign up</a></p>

          


        </form>



    </body>
</html>