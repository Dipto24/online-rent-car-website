<?php session_start();

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
<title>Booking list</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style2.css" type="text/css">


</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                    
      <h2>Manage <b>Booking</b></h2>
     </div>
     <div class="col-sm-6">

     <a href="Carlist.php" class="btn btn-success" ><span>Car List</span></a>
                    <a href="logout.php" class="btn btn-danger"><span>Logout</span></a>
     </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        
                        <th>ModelName</th>
                        <th>User</th>
                        <th>Phonenumber</th>
                        <th>User Email</th>
                        <th>Riding Time</th>
                        <th>Pick Up Point</th>

                        <th>Destination</th>
                        <th>Total Cost</th>
                        <th>Payment Status</th>

                        <th>Send Message</th>
                        <th>Action</th>



                    </tr>
                </thead>
                <tbody>

                  <?php
                      $connect = mysqli_connect('localhost', 'root', '', 'rent_car');
                     // $hospitalname = $_GET['state'];
                      $sel= "SELECT * FROM booking ORDER BY id DESC";
                      $Q=mysqli_query($connect,$sel);
                      while($data=mysqli_fetch_assoc($Q)){

                  ?>
                    <tr>
                        
                        <td><?= $data['car_namee']; ?></td>
                        <td><?= $data['user_namee']; ?></td>
                        <td><?= $data['user_phonee']; ?></td>
                        <td><?= $data['user_email']; ?></td>
                        <td><?= $data['timeeee']; ?></td>
                        <td><?= $data['pick_up']; ?></td>

                        <td><?= $data['destination']; ?></td>
                        <td><?= $data['total_cost']; ?></td>
                        <td><?= $data['pay_status']; ?></td>



                        <td>
                            
                            <a href="mail.php?ee=<?= $data['id']; ?>" class="edit"><i class="material-icons" title="Send Message">&#xE254;</i></a>
                        </td>
                        <td><a href="editbooking.php?edit=<?= $data['id'];?>" class="w3-button w3-green">Edit</a></td>
                      

                    </tr>
                <?php } ?>
                </tbody>
            </table>
  
 
 
 <script type="text/javascript" src="/javascript.js"></script>
</body>
</html>