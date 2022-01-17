<?php  session_start();

if(!isset($_SESSION['user_login']) && !isset($_COOKIE['user_login']) ){
	header("Location: login.php" );
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="sty.css">
    <style>
            body{
                background: linear-gradient(to right,indigo,violet);
            }
            .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            margin-top: 20px; 
            margin-left: 5px;
            height: 450px;
            max-width: 350px;
            background: pink;
            
            
            font-family: arial;
            }
            .card .price {
              color: brown;
              font-size: 22px;
             }

            .card button {
              border: none;
              outline: 0;
              padding: 12px;
              color: white;
              background-color: whitesmoke;
              text-align: center;
              cursor: pointer;
              max-width: 300px;
              font-size: 18px;
              margin-top: 5px;
            }

            .card .center {
                display: block;
                padding-top: 10px;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
            
            }

            .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            }

            .container {
            padding: 2px 16px;
            }
            a{
                color: black;
            }

            a:link {
                  text-decoration: none;
                 
            }
            .grid-container {
                display: grid;
                grid-template-columns: auto auto auto;
                padding: 10px;
                
            }
            .grid-item {
            
            padding: 20px;
            background: linear-gradient(to right,violet);
            
            }
</style>
    
</head>
<body>



   
    <div class="container">
		<p style="color:black">Session : <?php echo isset($_SESSION['user_login']) ? $_SESSION['user_login'] : 'No Session'; ?></p>		 

		<p style="color:black">Cookie : <?= isset($_COOKIE['user_login']) ? $_COOKIE['user_login'] : 'No Cookie'; ?></p>

    <div class="row">
        <div class="grid-container">
    <?php
                      $connect = mysqli_connect('localhost', 'root', '', 'rent_car');
                     // $hospitalname = $_GET['state'];
                      $sel= "SELECT * FROM car_details ORDER BY car_id DESC";
                      $Q=mysqli_query($connect,$sel);
                      while($data=mysqli_fetch_assoc($Q)){

                  ?>
    
    
    <div class="grid-item">
        <div class="card">
    
            
            <img class="center" width="50%" height="50%" src="uploads/<?= $data['car_photo']; ?>">
                <div class="container">
                <h1><?= $data['car_name'] ?></h1>
                <p class="price">Tk: <?= $data['car_rent'] ?></p>
                <b>Car Seat Number : <?= $data['car_seat'] ?></b>
                <p><button><a href="booking.php?v=<?= $data['car_id']; ?>">Add to Cart</a></button></p>
       
                </div>
                    
                    
        </div>
        </div>     
    
        <?php } ?>
 
    </div>
    </div>
</div>
</body>
</html>