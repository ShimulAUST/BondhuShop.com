<?php 

include 'connect_db.php';
include 'header.php';
$sql='';
$userName='';
$totalvalue=array();
$product_id_use=array();
$product_id_use_new=array();
$str='';
$new=0;
$sub='';
$i=0;

 if (isset($_POST['confirm_order'])) {
	foreach ($_SESSION['cart'] as $key => $value) {
		
		$product_id_use[]=array($value['0']);
		$totalvalue[]=array($value['2']*$value['3']);
	} 
	
	$sum=0;
	$sum= array_reduce($totalvalue,function(&$res, $item) {
    return $res + $item['0'];
	}, 0);

	
	
    $userName=$_SESSION['user']['name'];
	
	
	$tmpArr = array();
	foreach ($product_id_use as $sub) {
	$tmpArr[] = implode(',', $sub);
}
	$result = implode(',', $tmpArr);
	
	 
	 
	 	 
	
	
	 $sql="insert into order_table (prduct_ids,customer_name,total) values ('$result','$userName','$sum')";
	
	
	if(mysqli_query($link,$sql)){
		
		echo 'added';
	}
	else{
		echo 'failed';
	}
		
	 unset($_SESSION["cart"]);
	 ?>
	 <script>alert('Ordered Successfully');
	 window.location.href = "home.php";
	 </script>
	 <?php
	 
	
   }

if (isset($_POST['remove'])) {
		$product_id = $_POST["hidden_id"];

	if (!empty($_SESSION["cart"])) {
		foreach ($_SESSION["cart"] as $select => $val) {
			if($val[0] == $product_id)
			{
				unset($_SESSION["cart"][$select]);
				//header('location:cart.php');?>
				<script>window.location.href='cart.php';</script>
				<?php
				
			}
			
			
		}
		
	}
	else if(empty($_SESSION["cart"])){
				?>
			<script>alert('Cart is Empty');
		
			window.location.href='home.php';
			</script>
		
			<?php
					
			}
	
	}
	


?>

<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
 <link href="https://fonts.googleapis.com/css?family=Margarine" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	

	<!--Cart  Showing-->
	<div class="container">
	<div class="row ">
		<div class="col-md-12">
			<table class="table table-striped  ">
		<thead>
			<tr>
				
				<th scope="col">Id</th>
				<th scope="col">Name</th>
				<th scope="col">Quantity</th>
				<th scope="col">Price</th>
				<th scope="col">total</th>

			</tr>
		</thead>
		<tbody>
			<tr>
				<?php 
				$total=0;
				$j=0;
				foreach ($_SESSION['cart'] as $key => $value) {
					
					
					 ?>
					<td><?php echo $value['0'] ;?></td>
					<td><?php echo $value['1'] ;?></td>
					<td><?php echo $value['3'] ;?></td>
					<td>&#2547; <?php echo $value["2"] ;?></td>
					<td><?php echo $value['3']*$value['2'];?></td>
					<td><form method="post">
						<input type="hidden" name="hidden_id" value="<?php echo $value["0"]; ?>"/>
						<button type="submit" name="remove" class="btn btn-primary btn-sm">Remove</button>
					</form></td>	
			</tr>
			
			
				<?php 
				$total+=$value['2']*$value['3'];

				
				

			}
			
			?>
				<td ></td>
			<td></td>
			<td></td>
			<td>Total:</td>
			<td><?php echo $total; ?></td>
			<td></td>
			
			</tr>
			
			<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><form method="POST">
				<button type="submit" name="confirm_order" class="btn btn-primary">Confirm Order</button>
				</form></td>
			<td></td>
			</tr>
			
		</tbody>
	</table>
	

	</div>
	
	
		
	</div>
	</div>
<?php include 'footer_up.php'?>
</body>
</html>