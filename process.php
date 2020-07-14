<?php 
$server = "localhost";
$username = "root";
$password = "";
$dbname = "spdb";

session_start();
$connect = mysqli_connect("localhost", "root", "", "spdb");


if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["cart"]))
	{
		$item_array_id = array_column($_SESSION["cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
                'item_quantity'		=>	$_POST["quantity"]
			);
            $_SESSION["cart"][$count] = $item_array;
            
            $sql = "INSERT INTO cart (pid, p_name, price, quantity) values (" . " '" . $_GET['id'] . 
            "', '" . $_POST['hidden_name']. "', '" . $_POST['hidden_price'] . "','" . $_POST['quantity'] . "')";
            $exe = mysqli_query($connect, $sql);
            
				echo '<script>alert("Item Added to cart")</script>';
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["cart"] as $keys => $value)
		{
			if($value["item_id"] == $_GET["id"])
			{
                
				unset($_SESSION["cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="SneakPeek/css/body.css">
	</head>
    
    <body>
    <body data-spy="scroll" data-target="#navbarResponsive">

<div id="home">

 <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="SneakPeek.php"><img src="SneakPeek/assets/SneakPeek.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="SneakPeek.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="SneakPeek.php#nike">Nike</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="SneakPeek.php#adidas">Adidas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="SneakPeek.php#air-jordan">Air Jordan</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="SneakPeek.php#cart">Cart</a>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

  

            
		
<div class="col-sm-12 col-md-12 col-lg-12">

                    <hr />
                    <hr />

                    <hr />
                    <hr />

                    <h1 align= center>
                        Thank you for your purchase! We Will Contact You Soon!
                    </h1>

</div>


			
	</body>
</html>