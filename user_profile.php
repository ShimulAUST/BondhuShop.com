<!DOCTYPE html>
<?php 
	include 'connect_db.php';
    include 'header.php';
	$error='';
	$pass='';
	$sql='';
	$email='';
	$address='';
	$name='';
	$phone='';
	$oldPass='';
	$newPass='';
	$sql_update='';
	$sql_new='';
	$row_new='';
	$result_new='';
	
	if(isset($_POST['update_button']))
	{
		
		if(empty($_POST['user_update_name']) || empty($_POST['user_update_phone']) || empty($_POST['user_update_address']) || empty($_POST['user_update_old_pass']) || empty($_POST['user_update_new_pass']))
		{
			$error="Empty fields .Please filled up properly";
			
		?> 
			<script>alert('<?php echo $error ;?>');</script>
			<?php	
		}
		else{
			
			$email=$_SESSION['user']['email'];
			$name=$_POST['user_update_name'];
			$phone=$_POST['user_update_phone'];
			$address=$_POST['user_update_address'];
			$oldPass=$_POST['user_update_old_pass'];
			$newPass=$_POST['user_update_new_pass'];
		
			$oldPass=md5($oldPass);
			$newPass=md5($newPass);
			
			$sql="select * from user_profiles where user_email ='$email'";
			$result= mysqli_query($link,$sql);
			$row = mysqli_fetch_array($result);
			
				
			if($row['user_password'] == $oldPass && $row['user_email'] == $email )
			{
			$sql_update="UPDATE user_profiles SET user_name='$name',user_password='$newPass',user_address='$address' where user_email='$row[2]'";
				if (mysqli_query($link, $sql_update)) {
					
					$sql_new="select * from user_profiles where user_email ='$email'";
					
					
						$result_new= mysqli_query($link,$sql_new);
						$row_new = mysqli_fetch_array($result_new);
						
						$_SESSION['user']['id']=$row_new['user_id'];
						$_SESSION['user']['name']=$row_new['user_name'];
						$_SESSION['user']['email']=$row_new['user_email'];
						$_SESSION['user']['address']=$row_new['user_address'];
						$_SESSION['user']['phone']=$row_new['user_phone_no'];
				?>
					<script>alert('Updated Successfully')</script>
				
				<?php	
				
				
			} else {
				?> 
				<script>alert('<?php echo "Error updating record: inner else" ?>')</script>
				<?php
				
				}
			
			} else{ ?> 
				<script>alert('<?php echo "Please give your old password properly"?>')</script>

			<?php			
		}
		
	}

}


?>


<html>
<head>
<link rel="stylesheet" href="css/main.css" />
</head>
<body>
<div  class="container">
<h2 style="text-align:center; vertical-align:middle; margin-top:50px;">USER INFORMATION</h2>
<form action="" method="POST">

 
		<table class="table table-striped">
			<thead>
				<tr>
					
				</tr>
			</thead>

			<tbody>
			<tr style="text-align:center; vertical-align:middle;">
			
				<td style="font-weight:bold;">USER ID :</td>
				<td style="font-weight:bold;"><?php echo $_SESSION['user']['id']; ?></td>
			</tr>
			<tr style="text-align:center; vertical-align:middle;">
			<td style="font-weight:bold;">USER NAME :</td>
			<td>  <input type="text" name="user_update_name" value="<?php echo $_SESSION['user']['name']; ?>" ></td>
			</tr>
			<tr style="text-align:center; vertical-align:middle;">
			<td style="font-weight:bold;">USER EMAIL :</td>
			<td style="font-weight:bold;">  <?php echo $_SESSION['user']['email'] ?></td>
			</tr>
			
			<tr style="text-align:center; vertical-align:middle;">
			<td style="font-weight:bold;">USER ADDRESS :</td>
			<td><input type="text" name= "user_update_address" value="<?php echo $_SESSION['user']['address']; ?>" ></td>
			</tr>
			
			<tr style="text-align:center; vertical-align:middle;">
			<td style="font-weight:bold;">USER PHONE :</td>
			<td><input type="text" name="user_update_phone" value="<?php echo $_SESSION['user']['phone']; ?>" ></td>
			</tr>
			
			<tr style="text-align:center; vertical-align:middle;">
			<td style="font-weight:bold;">USER OLD PASSWORD :</td>
			<td><input type="password" name="user_update_old_pass" value="" ></td>
			</tr>
			
			<tr style="text-align:center; vertical-align:middle;">
			<td style="font-weight:bold;">USER NEW PASSWORD :</td>
			<td><input type="password" name="user_update_new_pass" value="" ></td>
			</tr>
			
			</tbody>
			
			</table>
			
			<p align = "right"><input type="submit" name="update_button" class="btn btn-info   my-4" value="UPDATE" ></p>
  
  
  
  
  
</form>
</div>
<?php include 'footer_up.php';?>
</body>
</html>