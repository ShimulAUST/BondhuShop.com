	<?php 

	include 'connect_db.php';

	$sqlinsert='';
	$sqlupdate='';
	$sqlshow='';
	$sqldelete='';
	$addProductName='';
	$addProductPrice='';
	$addProductQuantity='';
	$addProductCatagory='';
	$addProductDiscount='';
	$addProductPicture='';

	$showProductName='';
	$showProductPrice='';
	$showProductQuantity='';
	$showProductCatagory='';
	$showProductDiscount='';
	$showProductPicture='';
	$rowcount='';
	$delProductId='';
	$sqlsearch='';
	
	$updateProductPrice='';
	$updateProductQuantity='';
	$updateProductCatagory='';
	$updateProductDiscount='';
	$updateProductPicture='';
	$updateProductName='';
	$updateId='';
	
	$showRow=array();
		if(isset($_POST['add_product']))
		{
			if(empty($_POST['add_product_name']) || empty($_POST['add_product_price'])  ||empty($_POST['add_product_picture']))
				{
			
					?>
					<script>alert('To add products you must fill up all the fields');</script>
				<?php
					
				}
			else{
				$addProductName=$_POST['add_product_name'];
				$addProductPrice=$_POST['add_product_price'];
				$addProductQuantity=$_POST['add_product_quantity'];
				$addProductCatagory=$_POST['add_product_catagory'];
				$addProductDiscount=$_POST['add_product_discount'];
				$addProductPicture=$_POST['add_product_picture'];
				
				

				
				$sqlinsert="insert into products (product_name,product_catagory,product_price,product_picture,product_stock,product_discount) values('$addProductName','$addProductCatagory','$addProductPrice','$addProductPicture','$addProductQuantity','$addProductDiscount')";
				
			  if(mysqli_query($link,$sqlinsert))
				{
					
			   ?>
			   <script>alert('Successfully Added');
			   </script>
			   <?php
				}else{?>
				<script>alert('Add Products Failed');
			   </script>
				
				<?php			
			
			
			
			
		}
		}
		}
		
		if(isset($_POST['show_product']))
		{
			
			if(empty($_POST['show_product_catagory']))
			{
				?>
				
				<script>alert('Select a product catagory');</script>
				
				<?php
		}else{
			$showProductCatagory=$_POST['show_product_catagory'];
			
			$sqlshow="select * from products where product_catagory ='$showProductCatagory'";
			$result= mysqli_query($link,$sqlshow);	
			
			$rowcount=mysqli_num_rows($result);
			
			
		}	
		}
		
		//for deleting product
		if(isset($_POST['del_product']))
		{
			if(empty($_POST['del_product_id']))
			{
				?>
				
				<script>alert('Enter a Product Id');</script>
				
				<?php
			
		}
		else{
			$delProductId=$_POST['del_product_id'];
			$sqldelete="delete from products where product_id='$delProductId'";
			if (mysqli_query($link,$sqldelete)) {
					echo "Deleted";
					header('Location:adminpanel.php');
				}
				else{
					echo "failed";
				}
			
		}
		
		} 
		//for updating
		
		if(isset($_POST['search_product']))
		{
			if(empty($_POST['search_product_id']))
			{
				?>
				
				<script>alert('Enter a Product Id');</script>
				
				<?php
			
			}
			else{
				$searchProductId=$_POST['search_product_id'];
				$sqlsearch="select * from products where product_id='$searchProductId'";
				$result= mysqli_query($link,$sqlsearch);
				$showRow=mysqli_fetch_array($result);
				
			
			}
			
		}
		if(isset($_POST['update_product_button']))
		{
			$updateId=$_POST['product_update_id'];
			$updateProductName=$_POST['product_update_name'];
			$updateProductCatagory=$_POST['product_update_catagory'];
			$updateProductDiscount=$_POST['product_update_discount'];
			$updateProductPicture=$_POST['product_update_picture'];
			$updateProductQuantity=$_POST['product_update_Stock'];
			$updateProductPrice=$_POST['product_update_price'];
			
			$sqlupdate="UPDATE products SET product_name='$updateProductName',product_catagory='$updateProductCatagory',product_discount='$updateProductDiscount',product_picture='$updateProductPicture',product_stock='$updateProductQuantity',product_price='$updateProductPrice'  where product_id='$updateId'";
				if (mysqli_query($link, $sqlupdate)) {
					
					
				?>
					<script>alert('Updated Successfully')</script>
				
				<?php	
				
				
			} else {
				?> 
				<script>alert('<?php echo "Error updating record: inner else" ?>')</script>
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

	<div class="container" align="center">
		<h1>ADMIN PANEL</h1>
		<hr>
		<hr>
		<div class="row">
		<div class="col-md-12" align="center">
		<div >
		<h3 >Add Product</h3>
		<hr>
		</div>
		<form method="POST">
			
			<p>Product Name: <input type ="text" name="add_product_name" placeholder="Enter Product Name"></p>
			
			<p>Product Price: <input type ="text" name="add_product_price" placeholder="Enter Product Price"></p>
			<p>Product Catagory: <select name="add_product_catagory">
				<option name="mens_shirt" value="ms">Mens Shirt</option>
				<option name="mens_pant"value="mp">Mens Pant</option>
				<option name="mens_panjabi"value="mpan">Mens Panjabi</option>
				<option name="womens_shirt" value="ws">Womens Shirt</option>
				<option name="womens_pant" value="wp">Womens Pant</option>
				<option name="womens_kurta" value="wku">Womens Kurta</option>
				<option name="womens_sharee"value="wss">Womens Sharees</option>
				<option name="kids_shirt" value="ks">Kids Shirt</option>
				<option name="womens_pant" value="kp">Kids Pant</option>
				<option name="mugs" value="mug">Mugs</option>
				<option name="gifts" value="gifts">Gift Items</option>
			</select ></p>
			<p>Product Quantity: <input type ="text" min="1" name="add_product_quantity" ></p>
			<p>Product picture:<input type ="text" name="add_product_picture"></p>
			<p>Product Discount:<input type ="text" name="add_product_discount"></p>
			
			<p><input type ="submit" class="btn btn-success" name="add_product" value="ADD PRODUCT"></p>
			
		</form>
		</div>
			
		<div class="col-md-12">
			<div >
			<hr>
				<h3 >Show Product</h3>
				<hr>
			</div>
			
			<form method="POST">
			<p>Select Catagory: <select name="show_product_catagory">
				<option name="mens_shirt" value="ms">Mens Shirt</option>
				<option name="mens_pant"value="mp">Mens Pant</option>
				<option name="mens_panjabi"value="mpan">Mens Panjabi</option>
				<option name="womens_shirt" value="ws">Womens Shirt</option>
				<option name="womens_pant" value="wp">Womens Pant</option>
				<option name="womens_kurta" value="wku">Womens Kurta</option>
				<option name="womens_sharee"value="wss">Womens Sharees</option>
				<option name="kids_shirt" value="ks">Kids Shirt</option>
				<option name="womens_pant" value="kp">Kids Pant</option>
				<option name="mugs" value="mug">Mugs</option>
				<option name="gifts" value="gifts">Gift Items</option>
			</select>
			<input type ="submit" class="btn btn-success" name="show_product"  style="margin-left:10px;"value="SHOW PRODUCT">
			</p>
			</form>
			
			
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Item Id</th>
						<th scope="col">Item Name</th>
						<th scope="col">Item Catagory</th>
						<th scope="col">Item Quantity</th>
						<th scope="col">Item Price</th>
						<th scope="col">Item Discount</th>
					</tr>
				</thead>
				<tbody>
				<?php  
					if ($rowcount>0) {
						while ($item =mysqli_fetch_array($result)) {


							?>
							<tr>
								<td><?php echo $item['product_id'] ?></td>
								<td><?php echo $item['product_name'] ?></td>
								<td><?php echo $item['product_catagory'] ?></td>
								<td><?php echo $item['product_stock'] ?></td>
								<td><?php echo $item['product_price'] ?></td>
								<td><?php echo $item['product_discount'] ?></td>

							</tr>
							<?php 

						}
						?>
		
				
			
				</tbody>
		
		
			</table>
			<?php 

			}
			?></div>
			<div class="col-md-12">
			<div >
			<hr>
				<h3 >Delete Product</h3>
				<hr>
			</div>
			
			<form method="POST">
			<p>Product Id:  <input type="text" name ="del_product_id" >
			<input type ="submit" class="btn btn-success" name="del_product"  style="margin-left:10px;"value="DELETE PRODUCT">
			</p>
			</form>
		
		
		</div>	
		
		
		<div class="col-md-12">
		
		<div >
			<hr>
				<h3 >Update Product</h3>
				<hr>
			</div>
			
			
			<form method="POST">
			<p>Product Id:  <input type="text" name ="search_product_id" >
			<input type ="submit" class="btn btn-success" name="search_product"  style="margin-left:10px;"value="SEARCH PRODUCT">
			</p>
			</form>
		
		
		<form action="" method="POST">

	  
		<table class="table table-striped">
				<thead>
					<tr>
						
					</tr>
				</thead>

				<tbody>
				<tr style="text-align:center; vertical-align:middle;">
				
					<td style="font-weight:bold;">Product Id:</td>
					<td style="font-weight:bold border:none;"><input type="text" name="product_update_id" value="<?php echo $showRow['0'] ?>" readonly></td>
				</tr>
				<tr style="text-align:center; vertical-align:middle;">
				<td style="font-weight:bold;">Product Name :</td>
				<td>  <input type="text" name="product_update_name" value="<?php echo $showRow['1'] ?>" ></td>
				</tr>
				<tr style="text-align:center; vertical-align:middle;">
				<td style="font-weight:bold;">Product Catagory:</td>
				<td style="font-weight:bold;"> <input type="text" name="product_update_catagory" value="<?php echo $showRow['2'] ?>" ></td>
				</tr>
				
				<tr style="text-align:center; vertical-align:middle;">
				<td style="font-weight:bold;">Product Price</td>
				<td><input type="text" name= "product_update_price" value="<?php echo $showRow['3']; ?>" ></td>
				</tr>
				
				<tr style="text-align:center; vertical-align:middle;">
				<td style="font-weight:bold;">Product Picture</td>
				<td><input type="text" name="product_update_picture" value="<?php echo $showRow['4']; ?>" ></td>
				</tr>
				
				<tr style="text-align:center; vertical-align:middle;">
				<td style="font-weight:bold;">Product Stock:</td>
				<td><input type="text" name="product_update_Stock" value="<?php echo $showRow['5']; ?>" ></td>
				</tr>
				
				<tr style="text-align:center; vertical-align:middle;">
				<td style="font-weight:bold;">Product Dicount:</td>
				<td><input type="text" name="product_update_discount" value="<?php echo $showRow['6']; ?>" ></td>
				</tr>
				
				</tbody>
				
				</table>
				
				<p align = "right"><input type="submit" name="update_product_button" class="btn btn-info   my-4" value="UPDATE" ></p>
	  
	  
			</form>
		
		
		</div>
		
		
		
		
		
		
		</div>






	</div>


	</body>
	</html>