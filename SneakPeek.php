<!-- 
    

This is my own work and I have not received any unauthorized help in completing this. I have not copied from my classmate, friend, nor any unauthorized resource. 
I am well aware of the policies stipulated in the handbook regarding academic dishonesty. If proven guilty, I won't be credited any points for this endeavor.

    I have used resources found in the web as basis for my work.
    ex. tutorials, syntax, etc.

-->


<?php

    include 'dbconnect.php';
 

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
                    $sql = "DELETE FROM `cart` WHERE pid = $_GET[id]";
                    $exe = mysqli_query($connect, $sql);
                    
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="SneakPeek.php#cart"</script>';
                }
            }
        }
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sneak Peek</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="SneakPeek/css/body.css">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

<!-- Start Home -->
<div id="home">

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

    <!-- Start Carousel -->
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="4000">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"> 

            </li>

            <li data-target="#carouselExampleIndicators" data-slide-to="1"> 

            </li>

            <li data-target="#carouselExampleIndicators" data-slide-to="2"> 

            </li>
            
            <li data-target="#carouselExampleIndicators" data-slide-to="3"> 

            </li>

        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url(SneakPeek/assets/13.jpg);">

                <div class="carousel-caption text-center">
                        <h1> Welcome to Sneak Peek</h1>
                        <h3> Browse through our new collection</h3>
                        <a class="btn btn-outline-light btn-lg" href="#nike">
                            Try it now
                        </a>
                </div>

            </div>

            <div class="carousel-item" style="background-image: url(SneakPeek/assets/18.jpg_large);">

            </div>
            
            <div class="carousel-item" style="background-image: url(SneakPeek/assets/15.png);">

            </div>
            <div class="carousel-item" style="background-image: url(SneakPeek/assets/16.jpg);">

        </div>
        
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>



    </div>

    <!-- End Carousel -->

 </div>
<!-- End Home -->


<!-- Start Nike -->
<div id="nike">
    <!-- jumbotron -->
    <div class="jumbotron container-fluid">
        <h3 class="heading">
            Nike
        </h3>

        <div class="row">
			<!-- Products  -->
			<div class="col-md-4 product-grid">
				<div class="image">
					<a href="details-ben&jerry.php">
						<img src="SneakPeek/assets/7.jpg" class="w-100">
						<div class="overlay">
							<div class="detail">View Details</div>
						</div>
					</a>
				</div>
				<h5 class="text-center">Nike SB Dunk Low Pro Ben & Jerry’s</h5>
                <h5 class="text-center">Price: ₱45,000</h5>
				<a href="details-ben&jerry.php" ><button type="button" class="btn buy" data-target="#details-1">View Details</button></a>
            </div>
            
            <div class="col-md-4 product-grid">
				<div class="image">
					<a href="details-waffle.php">
						<img src="SneakPeek/assets/19.jpg" class="w-100">
						<div class="overlay">
							<div class="detail">View Details</div>
						</div>
					</a>
				</div>
				<h5 class="text-center">Nike LD Waffle Sacai Green Multi</h5>
				<h5 class="text-center">Price: ₱9,000</h5>
				<a href="details-waffle.php" ><button type="button" class="btn buy"  data-target="#details-2">View Details</button></a>
            </div>
            
            <div class="col-md-4 product-grid">
				<div class="image">
					<a href="details-mags.php">
						<img src="SneakPeek/assets/9.jpg" class="w-100">
						<div class="overlay">
							<div class="detail">View Details</div>
						</div>
					</a>
				</div>
				<h5 class="text-center">Nike MAG Back to the Future (2016)</h5>
				<h5 class="text-center">Price: ₱600,000</h5>
				<a href="details-mags.php" ><button type="button" class="btn buy"  data-target="#details-3">View Details</button></a>
			</div>

    </div>
</div>
   
<!-- End Nike -->

<!-- Start Adidas -->
 <div id="adidas">
    <div class="jumbotron container-fluid">
        <h3 class="heading">
            Adidas
        </h3>

        <div class="row">
			<!-- Products  -->
			<div class="col-md-4 product-grid">
				<div class="image">
					<a href="details-polta.php">
						<img src="SneakPeek/assets/21.jpg" class="w-100">
						<div class="overlay">
							<div class="detail">View Details</div>
						</div>
					</a>
				</div>
				<h5 class="text-center"> Adidas Craig Green Polta AKH I</h5>
				<h5 class="text-center">Price: ₱18,000</h5>
				<a href="details-polta.php" ><button type="button" class="btn buy"  data-target="#details-4">View Details</button></a>
            </div>
            
            <div class="col-md-4 product-grid">
				<div class="image">
					<a href="details-continental.php">
						<img src="SneakPeek/assets/12.jpg" class="w-100">
						<div class="overlay">
							<div class="detail">View Details</div>
						</div>
					</a>
				</div>
				<h5 class="text-center">Adidas Continental 80 white</h5>
				<h5 class="text-center">Price: ₱5,000</h5>
				<a href="details-continental.php" ><button type="button" class="btn buy" data-target="#details-5">View Details</button></a>
            </div>
            
            <div class="col-md-4 product-grid">
				<div class="image">
					<a href="details-run.php">
						<img src="SneakPeek/assets/11.jpg" class="w-100">
						<div class="overlay">
							<div class="detail">View Details</div>
						</div>
					</a>
				</div>
				<h5 class="text-center">Adidas 4D RUN 1.0 PARLEY </h5>
				<h5 class="text-center">Price: ₱12,000</h5>
				<a href="details-run.php" ><button type="button" class="btn buy"  data-target="#details-6">View Details</button></a>
			</div>

    </div>

</div> -->
<!-- End Adidas -->

<!-- Start Air Jordan -->

<div id="air-jordan">
    <div class="jumbotron container-fluid">
            <h3 class="heading">
                Air Jordan
            </h3>

            <div class="row">
                <!-- Products  -->
                <div class="col-md-4 product-grid">
                    <div class="image">
                        <a href="details-blue.php">
                            <img src="SneakPeek/assets/8.jpg" class="w-100">
                            <div class="overlay">
                                <div class="detail">View Details</div>
                            </div>
                        </a>
                    </div>
                    <h5 class="text-center"> Jordan 1 Retro High Off-White University Blue</h5>
                    <h5 class="text-center">Price: ₱45,000</h5>
                    <a href="details-blue.php" ><button type="button" class="btn buy"  data-target="#details-7">View Details</button> </a>
                </div>
                
                <div class="col-md-4 product-grid">
                    <div class="image">
                        <a href="details-zero.php">
                            <img src="SneakPeek/assets/22.jpg" class="w-100">
                            <div class="overlay">
                                <div class="detail">View Details</div>
                            </div>
                        </a>
                    </div>
                    <h5 class="text-center">Jordan Why Not Zero.3 'Noise'</h5>
                    <h5 class="text-center">Price: ₱7,500</h5>
                    <a href="details-zero.php"><button type="button" class="btn buy" data-target="#details-8">View Details</button></a>
                    
                </div>
                
                <div class="col-md-4 product-grid">
                    <div class="image">
                        <a href="details-retro">
                            <img src="SneakPeek/assets/23.jpg" class="w-100">
                            <div class="overlay">
                                <div class="detail">View Details</div>
                            </div>
                        </a>
                    </div>
                    <h5 class="text-center">Jordan 1 Retro High Satin Black Toe</h5>
                    <h5 class="text-center">Price: ₱19,500</h5>
                    <a href="details-retro" >  <button type="button" class="btn buy" data-target="#details-9">View Details</button></a>
                </div>

        </div>

    </div>

</div> 
<!-- End Jordan -->

<!-- Start Cart -->
<div id="cart">
<div class="jumbotron container-fluid">
           
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
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">P <?php echo number_format($total, 2); ?></th>
                            <td>
                               <a href="checkout.php" class="btn btn-info" >Checkout</a>
                            </td>

                        </tr>
                        <?php
                        
                    }

                    
                ?>
  
            
                 
</body>
</html>
