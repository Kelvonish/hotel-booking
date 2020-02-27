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
if (isset($_POST['add_user'])) {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password=$_POST['password'];
    if  (!$email && !$password) {
        header('Location:add_user.php?empty');
    }else{
         $result = mysqli_query($con,"SELECT * FROM user WHERE  email='$email'") or die(mysqli_error($con));

        if ( $result->num_rows > 0 ) {

       $message= " <h3 style='color:red'> User with this username or email already exists!<h3>";
}
else {

    $sql="INSERT INTO user(name,username,email,password)
          VALUES('$name','$username','$email','$password')";


          $insert= mysqli_query($con,$sql);



          if ($insert) {

           $imessage="<h3 style='color:green'> &#10003 registration successful <h3>";

          }
          else {
            $message="<p>Something went wrong: " . mysqli_error($con); + "</p>";
          }
}
}
}


?>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Add User</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add User</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">User details:</div>
                <div class="panel-body">
                    <form action="" method="post">
                        <div class="error">
                          <?php echo $imessage; ?>
                          <?php echo $message; ?>

                        </div>
                            <div class="form-group col-lg-6">
                                <label>name</label>
                                <input type="text" class="form-control"  id="name" name="name" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>username</label>
                                <input type="text" class="form-control"  id="username" name="username" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>email</label>
                                <input type="email" class="form-control"  id="email" name="email" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>password</label>
                                <input type="password" class="form-control"  id="password" name="password" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <button type="submit" name="add_user" id="add_user3" class="btn btn-lg btn-primary">create</button>
                    </form>
                </div>
            </div>
        </div></div></div>
