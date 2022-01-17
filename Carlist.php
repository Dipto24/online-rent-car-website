<?php  session_start();

if(!isset($_SESSION['user_login']) && !isset($_COOKIE['user_login']) ){
	header("Location: login.php" );
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Carlist</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styl2.css" type="text/css">


</head>
<body>
<h1  style="color: white" align= center><i>Welcome to Admin Panel</i></h1>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
      <h2>Manage <b>Car</b></h2>
     </div>
     <div class="col-sm-6">

      <a href="addcar.php" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Car</span></a>
      <a href="booking_list.php" class="btn btn-primary" ><span>Booking List</span></a>
      <a href="logout.php" class="btn btn-danger"><span>Logout</span></a>

     </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        
                        <th>ModelName</th>
                        <th>Condition</th>
                        <th>Quantity</th>

                        <th>seatnumber</th>
                        <th>Cost</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                  <?php
                      $connect = mysqli_connect('localhost', 'root', '', 'rent_car');
                     // $hospitalname = $_GET['state'];
                      $sel= "SELECT * FROM car_details ORDER BY car_id DESC";
                      $Q=mysqli_query($connect,$sel);
                      while($data=mysqli_fetch_assoc($Q)){

                  ?>
                    <tr>
                        
                        <td><?= $data['car_name']; ?></td>
                        <td><?= $data['car_condition']; ?></td>
                        <td><?= $data['quantity']; ?></td>

                        <td><?= $data['car_seat']; ?></td>
                        <td><?= $data['car_rent']; ?></td>
                        <td>
                            <img width="70" height="70" src="uploads/<?= $data['car_photo']; ?>"/>
                        </td>
                        <td>
                            
                            <a href="edit-car.php?e=<?= $data['car_id']; ?>" class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
                            <a href="delete-car.php?d=<?= $data['car_id']; ?>" class="delete" ><i class="material-icons" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
  
 
 
 <script type="text/javascript" src="/javascript.js"></script>
</body>
</html>