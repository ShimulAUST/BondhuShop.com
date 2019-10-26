<?php 

include 'connect_db.php';



if($link)
    {
        if ($_GET['name'] == "mens_shirt")               
            {
              $queryForProducts = "SELECT * FROM products where product_catagory = 'ms'";
            }            
        else if($_GET['name'] == "mens_pant")
            {
             $queryForProducts = "SELECT * FROM products where product_catagory ='mp'";
            }
        else if($_GET['name'] == "mens_panjabi")
            {
             $queryForProducts = "SELECT * FROM products where product_catagory ='mpan'";
            }
        else if($_GET['name'] == "womens_shirt")
            {
             $queryForProducts = "SELECT * FROM products where product_catagory ='ws'";      
    		}
	    else if($_GET['name'] == "womens_pant")
            {
             $queryForProducts = "SELECT * FROM products where product_catagory ='wp'";
            }
        else if($_GET['name'] == "womens_kurta")
            {
             $queryForProducts = "SELECT * FROM products where product_catagory ='wku'";
            }
        else if($_GET['name'] == "womens_sharee")
            {
             $queryForProducts = "SELECT * FROM products where product_catagory ='wss'";      
    		}
		else if($_GET['name'] == "kids_shirt")
            {
             $queryForProducts = "SELECT * FROM products where product_catagory ='ks'";
            }
        else if($_GET['name'] == "kids_pant")
            {
             $queryForProducts = "SELECT * FROM products where product_catagory ='kp'";
            }
        else if($_GET['name'] == "mugs")
            {
             $queryForProducts = "SELECT * FROM products where product_catagory ='mug'";      
    		}
		else if($_GET['name'] == "gift_items")
            {
             $queryForProducts = "SELECT * FROM products where product_catagory ='gifts'";      
    		}
		
		  $queryresult= mysqli_query($link,$queryForProducts);
          $rowCount = mysqli_num_rows($queryresult);
	}
 ?>
 
<html lang="en">

  <body>
	<?php include 'header.php';?>
	 <div class="container">
        <div class="row">
		<?php if($rowCount > 0)
                        {
                            while($product = mysqli_fetch_array($queryresult))
                            {
                            ?>
							
							<div class="col-lg-3 col-md-6 col-sm-12 " style="margin-top:20px;">
                                      <form action="" method="POST">
                                          <div class="card mb-3 ">
                                              <div class="card-body">
                                                  <img class="img-fluid" src="img\<?php echo $product['product_picture']; ?>" alt="image not found :( ">
													<input class="from-control text-center col-12 mb-1"  type="hidden" name="hidden_Id" value="<?php echo $product["product_id"]; ?>" readonly  >
													<input type="text" name="hidden_name" style= "border: none; text-align:center; background-color:green;color:white;" class="from-control text-center col-12 mb-1" value="<?php echo $product['product_name'] ?>">
													<input  style= "border: none; text-align:center; background-color:green;color:white; font-weight:bold;" type="text" name="hidden_price"  value= "<?php echo $product['product_price'] ?>">
                                                  <div style="margin-top:2px;margin-bottom:2px">
                                                      <input type="text" name="quantity" class="from-control text-center col-12 mb-1" placeholder="Quantity">
                                                  </div>
												  
                                                  <div>
												  <input type="submit" name="addToCart" class="btn btn-primary btn-block" value="Add to Cart">
                                                  </div>
												  
                                              </div>
                                          </div>
                                      </form>
                                  </div>
								  
							<?php }
						}else{
							
							?>
							 
							 <script>alert('No Items Found');
							  window.location.href = "home.php";</script>
							  
						<?php
						
						}?>
		
		
		</div>
	 </div>	



 
 <?php 
     if($_SESSION['user']['id']){
      if (isset($_POST["addToCart"]) && $_POST['quantity'] !=null) {
         
         
         if (isset($_SESSION["cart"])) {
            $item_array_id = array_column($_SESSION["cart"], 0);
            
            if (!in_array($_POST["hidden_Id"], $item_array_id)) {
               
               $count= count($_SESSION["cart"]);
               
               $item_array=array(

               $id= $_POST["hidden_Id"],
               $name=$_POST["hidden_name"],
               $price=$_POST["hidden_price"],
			   $quantity=$_POST['quantity']
               

            );
               $_SESSION["cart"][$count]=$item_array;
               

            } else {
            echo '<script language="javascript">';
            echo 'alert("Already Added")';
            echo '</script>';
               
            }   
         } else {
            $item_array=array(

               $id= $_POST["hidden_Id"],
               $name=$_POST["hidden_name"],
                $price=$_POST["hidden_price"],
				$quantity=$_POST['quantity']
            );
            $_SESSION["cart"][0]=$item_array;
         }
      }
	  
	  else if(isset($_POST["addToCart"]) && $_POST['quantity'] ==null){
		  ?>
		  <script>alert('Quantity field must be filled up properly');</script>
		  <?php
	  }
		
		
	 }else{ if (isset($_POST["addToCart"])){?>
	 <script>alert('Log in first for adding in the cart');</script>
	 <?php 
	  }
	 }
	 ?>


<?php include 'footer_up.php'?>
  </body>

</html>


  