<?php
    include 'dbconnect.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $u_name = $_POST["firstname"]; 
        $u_last = $_POST["lastname"];
        $u_email = $_POST["email"];
        $u_address = $_POST["address"];
        
       
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        
        $u_name = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING); 
        $u_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $u_address = filter_var($_POST["address"], FILTER_SANITIZE_STRING);
        
        
        $query = "INSERT INTO orders (amount, product) VALUES (" . " '" . $_POST['item_price'] . 
          "', '" . $_POST['item_name']. " )";
        
        
        
     
    }

}

?>
   


<!DOCTYPE html>
<html>
<head>
	<title>Checkout Form</title>
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
    <a class="navbar-brand" href="#"><img src="SneakPeek/assets/SneakPeek.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#nike">Nike</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#adidas">Adidas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#air-jordan">Air Jordan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#cart">Cart</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
               
            </ul>

        
        </div>
    </nav>


    <br />
		<div class="col-md-4 container bg-default">
			
			<h4 class="my-4">
					Enter Delivery Details
			</h4>
			
			<form method="post" action="process.php">
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
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" placeholder="you@example.com" required>
				</div>

				<div class="form-group">
					<label for="adress">Address</label>
					<input type="text" class="form-control" name="address" placeholder="Your address" required>
					<div class="invalid-feedback">
						Please enter your shipping address.
					</div>
				</div>

					<hr class="mb-4">
				
					<button class="btn btn-primary bt-lg btn-block" type="submit">Confirm Order</button>
			</form>
        </div>
        

        <br />
           
       <div>    
        <div style="clear: both"></div>
        <h3 class="title2"> Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $keys => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>P <?php echo $value["item_price"]; ?></td>
                            <td>
                                P <?php echo number_format($value["item_quantity"] * $value["item_price"], 2); ?></td>

                            <td>
                                <a href="SneakPeek.php?action=delete&id=<?php echo $value["item_id"]; ?>">
                                <span class="text-danger">Remove Item</span>
                                </a>
                            </td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["item_price"]);
                    }
                        ?>
                    
                        <?php
                        
                    }

                    
                ?>
            </table>
        </div>

    </div> 


    
</body>
</html>
