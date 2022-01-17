<?php  


$connect = mysqli_connect('localhost','root','','rent_car');
if(!empty($_POST))
{
    $name=$_POST['name'];
    $phone=$_POST['phonenumber'];
    $email=$_POST['email'];
    $user=$_POST['username'];
    $pw=md5($_POST['password']);
    $rpw=md5($_POST['repassword']);

    if($pw==$rpw){
      $phone_check="SELECT * FROM user WHERE user_phone='$phone'";
      $res=mysqli_query($connect,$phone_check);
      if(mysqli_num_rows($res)>0){
        echo '<script type="text/javascript">alert("Phone number you entered already exist")</script>';
      }
     
    $insert = "INSERT INTO user(user_name,user_phone,user_email,user_username,user_password) 
    VALUES('$name','$phone','$email','$user','$pw')";
    $result = mysqli_query($connect,$insert);
    if($result)
    {
        //header('location: user_car.php');
        echo '<script type="text/javascript">alert("Data Save")</script>';
        //$_SESSION['user_login'] = $phonenumber;
        header('location: login.php');  
    }
    else{
        echo '<script type="text/javascript">alert("Sorry!Try Again")</script>';
    }
}else{
    echo '<script type="text/javascript">alert("Password did not match")</script>';

}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style4.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">User Registration</div>
    <div class="content">
      <form action="" method="post" id="">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" name="name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phonenumber" placeholder="Enter Phone Number" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">UserName</span>
            <input type="text" name="username" placeholder="Enter your user name" required>
          </div>
          
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name="password" placeholder="Enter Password" required>
          </div>
          
          <div class="input-box">
            <span class="details">ConfirmPassword</span>
            <input type="text" name="repassword" placeholder="Enter Password" required>
          </div>
          
        </div>
        <div class="button">
          <input type="submit" name="save" value="Register">
        </div>
        <a href="login.php" >back in login page</a></p>

      </form>
           
    </div>

    </div>
  

</body>
</html>