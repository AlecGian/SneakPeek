<?php
 
  require_once 'dbconnect.php';

         
  if(isset($_POST['create'])){
      
      $username    = $_POST['username'] ;
      $firstname   = $_POST['firstname'] ;
      $lastname    = $_POST['lastname'] ;
      $email       = $_POST['email'] ;
      $password    = $_POST['password'] ;

       $s = "SELECT * From users where username = '$username'";

       $exe = mysqli_query($connect, $s);
       

       $num = mysqli_num_rows($exe);


          if($num === 1){
              echo '<script>alert("Username Already Taken, Please enter another username")</script>';
          }else {
              $sql = "INSERT INTO users (username,firstname, lastname,  email, password) VALUES ('$username','$firstname', '$lastname','$email','$password')";
              mysqli_query($connect, $sql);
              echo '<script>alert("Successfully created an account")</script>';
              header("location: SneakPeek.php");
          }
      

}

  

?>
 


<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="SneakPeek/css/body.css">
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="SneakPeek.php"><img src="SneakPeek/assets/SneakPeek.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

              <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
              </li>
              
              <li class="nav-item">
                  <a class="nav-link" href="register.php">Sign Up</a>
           
          </ul>
      </div>
  </nav>
     

  <br />
      <div class="col-md-4 container bg-default">
          
          <h2 class="my-4" align=center>
                  Sign Up
          </h4>
          
          
          <form method="POST" >
              <div class="form-row">
                  <div class="col-md-6 form-group">
                      <label for="firstname">First Name</label>
                      <input type="text" class="form-control" name="firstname" placeholder="First Name">
                      <div class="invalid-feedback">
                          Valid first name is required.
                      </div>
                  </div>

                  <div class="col-md-6 form-group">
                      <label for="lastname">Last Name</label>
                      <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                      <div class="invalid-feedback">
                          Valid last name is required.
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                  <div class="invalid-feedback">
                      Please enter Username.
                  </div>
              </div>

              <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
              </div>

              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                  <div class="invalid-feedback">
                      Please enter your Password.
                  </div>
              </div>
              
           
                  <hr class="mb-4">
              
                  <button name="create" class="btn btn-primary bt-lg btn-block" type="submit">Create Account</button>
                  
              </form>
              <br />
      </div>
      

      
      <p align=center>Already have an account? <a href="login.php">Login now</a>.</p>



  
</body>
</html>




