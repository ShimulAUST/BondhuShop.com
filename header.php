<!DOCTYPE HTML>

<?php 
session_start();
include 'login.php'?>

<html>
<head>

<!-- Bootstrap CSS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css" />
	

</head>
<body>
<div class="container_fluid">
<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <!-- Brand/logo -->
  
  <a class="navbar-brand" href="home.php">
    <img src="img/logo.png" alt="logo" >
  </a>
  
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
		
	<div id="navbarNavDropdown" class="navbar-collapse collapse">
  
  <!-- Links -->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="home.php">Home</a>
    </li>
	
	<li class=" dropdown drop-down">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""  >Mens Wear
				<span class="caret"></span></a>
							<ul class="dropdown-menu dropdown-content " >
										<li><a href="items.php?name=mens_shirt" class="dropdown-item" id="shirt">Shirts</a></li>
										<li><a href="items.php?name=mens_pant" class="dropdown-item" id="pant">Pants</a></li>
										<li><a href="items.php?name=mens_panjabi" class="dropdown-item" id="panjabi">Panjabi</a></li>
							</ul>
	</li>
	
	<li class=" dropdown drop-down">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""  >Womens Wear
				<span class="caret"></span></a>
							<ul class="dropdown-menu dropdown-content " >
									<li><a href="items.php?name=womens_shirt" class="dropdown-item">Shirts</a></li>
									<li><a href="items.php?name=womens_pant" class="dropdown-item">Pants</a></li>
									<li><a href="items.php?name=womens_kurta" class="dropdown-item">Kurtas</a></li>
									<li><a href="items.php?name=womens_sharee" class="dropdown-item">Sharees</a></li>			
							</ul>
	</li>
	
	<li class=" dropdown drop-down">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""  >Kids Wear
				<span class="caret"></span></a>
							<ul class="dropdown-menu dropdown-content " >
									<li><a href="items.php?name=kids_shirt" class="dropdown-item">Shirts</a></li>
									<li><a href="items.php?name=kids_pant" class="dropdown-item">Pants</a></li>			
							</ul>
	</li>
	
	<li class=" dropdown drop-down">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""  >Others
				<span class="caret"></span></a>
							<ul class="dropdown-menu dropdown-content " >
									<li><a href="items.php?name=mugs" class="dropdown-item">Mugs</a></li>
									<li><a href="items.php?name=gift_items" class="dropdown-item">Gift Items</a></li>			
							</ul>
	</li>

	<form class="form-inline my-2 my-lg-0" style="margin-left:20px";>
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" >
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
	 
 </ul>
 <?php if(!$_SESSION['user']['id']){ ?>
  <ul class="navbar-nav">
  <li class="nav-item">
					<button type="button " class="btn btn-basic font-weight-bold " data-toggle="modal" data-target="#modalLoginForm">Sign in <i class="fas fa-sign-in-alt"></i> </button>
                </li>
  
  </ul>
 <?php } else{?>

	<ul class="navbar-nav">
  <li class="nav-item">
					<button type="button" class="btn btn-success font-weight-bold " onclick ="window.location.href='user_profile.php'"><i class="fas fa-user"></i> <?php echo $_SESSION['user']['name'] ?> </button>
                </li>
	<li class="nav-item">
					<button type="button" class="btn btn-danger font-weight-bold " onclick ="window.location.href='cart.php'" style="margin-left:3px";><i class="fas fa-shopping-cart"></i></button>
                </li>
							
	<li class="nav-item">
					<button type="button " class="btn btn-dark font-weight-bold " style="margin-left:3px";  onclick ="window.location.href='logout.php'"><i class="fas fa-sign-out-alt"></i>  </button>
                </li>
<?php } ?>

 
 	</div>
 </div>
</nav>



		


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>
</html>
