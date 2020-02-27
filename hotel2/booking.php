<?php
$servername="localhost";
$user="root";
$pass= "";
$database= "hotel";
$imessage="";
$message="";
$con=mysqli_connect($servername,$user,$pass) or
 die("not connected");

mysqli_select_db($con,$database)or
die("could not select database");
if (isset($_POST['check'])) {
$query = "SELECT * FROM room WHERE status != 1 ";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 1) {
          echo "available rooms";
        }

}

  ?>
<!DOCTYPE html>
<html>
<head>
	<title>BOOKING</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ minDate: 0 });
    $( "#datepicker2" ).datepicker({ minDate: 0 });
  } );
  </script>
  <style type="text/css">
    #section{
      padding: 30px;
      margin: 30px;
    }

  </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="#">SERVICES</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">ABOUT</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">CONTACT</a>
  </li>
</ul>
</nav>

<div id="section">
  <form action="" method="post">
  <p> Arrival: <input type="text" id="datepicker">Departure: <input type="text" id="datepicker2"></p>
   <input class="btn btn-primary" type="submit" name="check" value="check Avaialbility">
   </form>
</div>
<div id="checkavailable">
  
</div>
</body>
</html>