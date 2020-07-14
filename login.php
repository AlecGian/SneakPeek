<?php
    require_once "dbconnect.php";
    require_once "config.php";
    include 'fbconfig.php';

    

    $loginURL = $gClient->createAuthUrl();

    if(isset($_POST['submit'])){
        if(empty($_POST['username']) || empty($_POST['password'])){
            $error = "Username or Password is Invalid";
        }
        else {
            $username = $_POST['username'];
            $password = $_POST['password'];


            $query = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username' AND password= '$password'");
            $rows = mysqli_num_rows($query);

            if($rows == 1){
                header("location: SneakPeek.php");
            }else{
                $error = "Username or Password is Invalid";
            }
            mysqli_close($connect);
        }
    }
 
?>
   


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-signin-client_id" content="213578737376-mh6a4iuefg1f5dajintjtcq454tldfhi.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
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
					Login
			</h4>
			
			<form method="post"  >
				<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" placeholder="Username">
						<div class="invalid-feedback">
							Valid Username is required.
						</div>
					</div>


				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" placeholder=" Password" required>
					<div class="invalid-feedback">
						Wrong Password
					</div>
				</div>

					<hr class="mb-4">
				
					<button name="submit" class="btn btn-primary bt-lg btn-block" type="submit">Login</button>
					
			</form>
			<br />
            <button onclick="window.location = '<?php echo $loginURL ?>';" name="submit" class="btn btn-primary bt-lg btn-block btn-danger" type="submit">Login using Google</button>
            <button onclick="window.location = '<?php echo $facebook_login_url  ?>';" name="submit" class="btn btn-primary bt-lg btn-block " type="submit">Login using Facebook</button>
                    
                </div>
			
        </div>
        
        <p align=center>Don't have an account? <a href="register.php">Sign up now</a>.</p>



    
</body>
</html>
