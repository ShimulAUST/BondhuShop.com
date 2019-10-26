<!DOCTYPE HTML>


<html>
<head>
<!-- Bootstrap CSS -->
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  
</head>
<body>

<!-- Footer -->

<footer class="page-footer font-small mdb-color pt-4 ">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Footer links -->
      <div class="row text-center text-md-left mt-3 pb-3">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3  mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold">Payment</h5>
		  <hr class="w-100 clearfix"/>
          <p>You can pay by Visa, Master card, Paypal, Qcash, DBBL, Brac bank, Cash on Delivery anytime anywhere. Choose the best method that suitable for you with no more cost.</p>
		  <img src="img/payment.png"/>
        </div>
        <!-- Grid column -->
        <hr class="w-100 clearfix d-md-none">
        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold">our offers</h5>
          <hr class="w-100 clearfix ">
		  <p>
            <a href="aboutbondhu.php">About Bondhushop.com</a>
          </p>
          <p>
            <a href="#!">How To Buy</a>
          </p>
        </div>
        <!-- Grid column -->

        <hr class="w-100 clearfix d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold">Information</h5>
          <hr class="w-100 clearfix ">
		
			
			<p>
            <?php if($_SESSION['user']['id']){ ?>
			<a   href="user_profile.php"  >Your Account</a>
			<?php } else {?>
			<a   href="" data-toggle="modal" data-target="#modalLoginForm">Your Account</a>
			<?php }?>
			
			<script>
			$(document).ready(function(){
			$('[data-toggle="popover"]').popover();   
			});
			</script>
			</p>
			
			
		  
		  <p>
		  
		  
            <a href="#!">Delivary Information</a>
          </p>
          <p>
            <a href="contactus.php">Contact Us</a>
          </p>
        </div>

        <!-- Grid column -->
        <hr class="w-100 clearfix d-md-none">

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold">Contact</h5>
		  <hr class="w-100 clearfix ">
          <p>
            <i class="fas fa-home mr-3"></i>Uttara,Dhaka-1230</p>
          <p>
            <i class="fas fa-envelope mr-3"></i> bondhushop59@gmail.com</p>
          <p>
            <i class="fas fa-phone mr-3"></i> +880 1872571319</p>
        </div>
      </div>
		<hr>
	<!-- Footer links -->

    
	
	<div class="footer-copyright pb-2 text-center font-weight-bold"> &copy; 2019 ZS Software Solution.ALL rights Reserved.</div>


    </div>
    <!-- Footer Links -->

  </footer>



</body>
</html>