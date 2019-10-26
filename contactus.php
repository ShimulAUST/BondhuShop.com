<?php
	
	include 'header.php';
	include 'connect_db.php';
		
$error='';
$comp_name = '';
$comp_email='';
$comp_phone ='';
$comp_complain='';
$sql='';

if(isset($_POST['submit_button']))
{
	if(empty($_POST['complaints_name']))
  {
    $error .= '<p> <label class="text-danger">Please Enter your Name</label></p>';
  }
  else { 
    $comp_name =$_POST['complaints_name'];
	$comp_name=stripcslashes($comp_name);
	$comp_name=mysqli_real_escape_string($link,$comp_name);
    if(!preg_match("/^[a-zA-Z]*$/",$comp_name))
    {
      $error .='<p><label class="text-danger">Only letters and white space allowed in name field</label></p>';
    }
}

	if(empty($_POST['complaints_email']))
  {
    $error .= '<p> <label class="text-danger">Please Enter your email</label></p>';
  }
  else {
    $comp_email =$_POST['complaints_email'];
	$comp_email=stripcslashes($comp_email);
	$comp_email=mysqli_real_escape_string($link,$comp_email);
    if(!filter_var($comp_email,FILTER_VALIDATE_EMAIL))
    {
      $error .='<p><label class="text-danger">invalid email format</label></p>';

    }


  }
  
   if(empty($_POST['complaints_mobile']))
  {
    $error .= '<p> <label class="text-danger">Please Enter your phoneNo</label></p>';
  }

  else {
    $comp_phone = $_POST['complaints_mobile'];
	$comp_phone=stripcslashes($comp_phone);
	$comp_phone=mysqli_real_escape_string($link,$comp_phone);
    if(!preg_match("/^[0-9]*$/",$comp_phone))
    {
      $error .='<p><label class="text-danger">Only degits are allowed in phone number field</label></p>';

    }

  }
  
  if(empty($_POST['complaints_comment']))
  {
    $error .= '<p> <label class="text-danger"></label></p>';
  }
  else {
    $comp_complain = trim($_POST['complaints_comment']);
	$comp_complain=stripcslashes($comp_complain);
	$comp_complain=mysqli_real_escape_string($link,$comp_complain);
  

  }
  
  
  
  	
   if($error =='')
   {
		
	   $sql="insert into contact_us (comp_name,comp_email,comp_phone,comp_complain)  values('$comp_name','$comp_email','$comp_phone','$comp_complain')";
	
	
  }
   if(mysqli_query($link,$sql))
   {
	   ?>
	   
	   <script>alert('Successfully complained recieved');</script>
	   <?php
   }
    else{
		 
		?>
		
		<script>alert('error');</script>
		<?php
	}
   
}


?>

	

	
	
	<html>
	<head>

	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="css/main.css" />
		

	</head>
	<body>
		
					
		<form formaction="" id="contactus" method="POST">
				
			<div class="container">
			<br>
			<h5>Conctact Us</h5><br>
			<br>
			<div class="row">
			 
			 
			 <div class="col-md-6">
			 
				
				<h5 >Contact information</h5>
				<hr>
				<h6>Name*</h6>
				<input type="text" name="complaints_name" placeholder="Enter your name..."  style= "width 50%"; class="form-control" required>
				<h6>Email*</h6>
				<input type="email" name="complaints_email" placeholder="Enter your email..." class="form-control" required>
				<h6>Mobile*</h6>
				<input type="text" name="complaints_mobile" placeholder="Enter your phone no..." class="form-control" required>
				<h6>Comment*</h6>
				<textarea rows = "5" cols = "50" name = "complaints_comment" style="text-align:left"; class="form-control" >
				
				</textarea>
				<p style="margin-top:5px";>
				<input type="submit" name="submit_button" class="btn btn-info" value="Submit" formaction="" >
				</p>
				</div>
				<div class="col-md-1">
				
				</div>
			 <div class="col-md-5">
				<h5 >Contact information / Complain Us</h5>
				<hr>
				<p class="text-justify">if you have a problem, comment or a general enquiry we would like to hear about it and be happy to help. Rang's mission is to provide the best service possible at all times, and we can only achieve this with your feedback. We would also be happy to hear from you with your views on our online service.</p>
					
				<address>
					<strong>Contact Address</strong> 
					<br>
					<img src = "img/logo.png">
					<br>
					Uttara,Dhaka<br>
					Mobile:01872571319<br>
					Email:bondhushop@gmail.com<br>
									
				</address>
			 
			 
			 </div>
			
			</div>
			</div>				
				
				</form>

			</div>
			
			</div>
		
		</div>

	<?php include 'footer_up.php'?>

	</body>
	</html>