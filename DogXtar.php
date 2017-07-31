<?php require('functions.php') ?>
<html>
  <head>
           
  </head>
 <html>
  <head>	
  		 <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="style.css">
	    <link rel="stylesheet" href="css/card.css">
	    <link rel="stylesheet" href="css/product.css">
	    <link rel="stylesheet" href="css/mediaquary.css">
	    
	    
	    <script src="js/map.js"></script>
	    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSynGTe5RpwVIy0z0d3kb_M3_U-Q-jC74"></script>
  </head>
   <body style="display:<?php echo $display; ?>">
	  <div class="mother_div">
		  <section id="top-bar">
		    <div class="container">
		        <div class="row">
			   <div class="col-sm-12">
			      <ul class="top-text">
			     <form class="paypal" action="be_a_club_member.php" method="post" id="paypal_form" >
				<li><a href="checkout.php">CHECKOUT</a></li>
				<?php if(isset($_SESSION['user_id'])) : ?>
					<li><a><?php echo user_name; ?></a> <a href="log_out.php">(log out)</a>
					<?php if($dog_tag->getting_data_by_another_field(
						'users','user_type','user_id',user_id
					) == 2) : ?>

					<span>
					

		<input type="submit" name="be_submitd" value="join Dog Club for $34.95"/>



					</span>
				<?php elseif($dog_tag->getting_data_by_another_field(
						'users','user_type','user_id',user_id
					) == 1): ?>
						<img style="height:33px;width:33px;" src="premium.png" /> 
				<?php endif; ?>
					</li>
				<?php else: ?>
					<li><a href="login.php">LOG IN</a></li>
				<?php endif; ?>
				</form>
			     </ul>
			  </div>
			</div>
		     </div>
	         </section><!-----------------------section---------------->
		  <section id="logo-bar">
			  <div class="container-fluid">
			     <div class="row">
				   <div class="col-sm-12">
					   <div class="col-sm-1">
					   </div>
					   <?php 
	$query = $dog_tag->show_sorted_row_values('general','general_id','ASC');
	while($fetches = mysqli_fetch_assoc($query)) :
 ?>
<div class="col-sm-2 logo-pic" >
	<img src="data:image;base64,<?php echo $dog_tag->show_general_settings('logo');
						   	?>">
</div>
<?php endwhile; ?>
					   <div class="col-sm-3">
					      <h2 class="free-shipping"><strong>FREE SHIPPING</strong></h2>
						  <h2 class="all-order">ON ALL orderS</h2>
					   </div>
					   <div class="col-sm-3" id="email">
					       <i class="fa fa-envelope-o fa-lg" aria-hidden="true"> <a id="email-text">
					       <?php echo $dog_tag->show_general_settings('email');
						   	?>
					       </a></i>
						   <br>
						   <br>
						   <i class="fa fa-mobile fa-lg" aria-hidden="true"> <a id="number">
						   	<?php echo $dog_tag->show_general_settings('phone_num');
						   	?>
						   </a></i>
					   </div>
					   <div class="col-sm-2 cart">
						   <div class="col-sm-6">
						       <img src="images/cart1.png" id="shopping">
						   </div>
						   












						  <div class="container">
                                    <div class="shopping-cart">
                                        <div class="shopping-cart-header">
                                            <i class="fa fa-shopping-cart cart-icon"></i>
                                            <span class="badge"><?php echo number_of_cart; ?></span>
                                            <div class="shopping-cart-total">
                                                <span class="lighter-text">Total:</span>
                                                <span class="main-color-text">$<?php echo total; ?></span>
                                            </div>
                                        </div>
                                        <!--end shopping-cart-header -->
                                         <style>
									.potrait-frame-cart{
									  height:100px;
									  width:97px;
									  position: absolute;
									  z-index: 10;
									}
									.potraitImg-cart {
										object-fit: cover;
										height: 94px;
										width: 76px;
										margin-left: 12px;
									}
								</style>

                                        <ul class="shopping-cart-items">
<?php 
$query = $dog_tag->show_sorted_value_of_user_in_limit('carts','cart_user_id',user_id,'cart_id','DESC','3');
while($fetches = mysqli_fetch_assoc($query)) :
?>

<?php 
	$silencer_top_cart = $dog_tag->getting_data_by_another_field('silencer_color','silencer_color_image','silencer_color_id',$fetches['cart_silencer1_color_id']);
	?>
                                            <li class="clearfix">
                                                <img src="data:image;base64,<?php echo $silencer_top_cart; ?>" class="potrait-frame-cart" alt="" />
<?php 
	$tag_top_cart = $dog_tag->getting_data_by_another_field('tag_color','tag_color_image','tag_color_id',$fetches['cart_tag1_color_id']);


	?>
												<img src="data:image;base64,<?php echo $tag_top_cart; ?>" class="potraitImg-cart noborder main-img" alt=""/>
												
                                                <span class="item-name">Dog Tag</span>
                                                <span class="item-price"><?php echo price; ?></span>
                                                <!-- <span class="item-quantity">Quantity: 01</span -->
                                            </li>
<?php endwhile; ?>
                                        </ul>

                                        <a href="checkout.php" class="button">Checkout</a>
                                    </div>
                                    
                                </div><!------------end shopping-cart--------->






					   </div>
				   </div><!-----------col-sm-12------------------>
				 </div><!--------------row------------------>
			  </div><!-----------container-fluid------------------>
		  </section><!-----------section------------------>
		  <section class="fixed-menu">
                    <ul class="topnav" id="myTopnav">
                        <li>
                            <a  href="index.php" id="home" class="active">Home</a>
                        </li>
                        <li>
                            <a href="DogXtar.php" id="menu-hide">DogXtar Novelty Tags</a>
                        </li>
                        <li>
                            <a href="WAG-Z.php" id="menu-hide">Wag-Z Pet Tags</a>
                        </li>
                        <li>
                            <a href="Event-Tags.php" >Event-Tags</a>
                        </li>
                        <li>
                            <a  href="checkout.php">Cart</a>
                        </li>
                        <li class="icon">
                            <a style="font-size:23px;" id="showDropDown"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                        </li>
                    </ul>
         </section><!-------------------section-menu----bar----------------->
		 
		  
		  <section id="main-body">
		     <div class="container">
			    <div class="row">
				   <div class="col-sm-12">
					   <div class="col-sm-1">
					   </div>
					   <div class="col-sm-11">
					     <h1 class="product-titel">DogXtar Novelty Tags</h1>
					   </div>
					</div><!-----------------col-sm-12---------------------------->
					<div class="col-sm-12">
					   <div class="col-sm-1">
					   </div>
					   <div class="col-sm-11">
					     <div class="col-sm-3 product-details">
							 <h4 class="product-des">DogXtar Custom Military Dog Tags - Personalized ID</h4>
							 <img src="images/product/tag/product1.png">
							 <h4 class="product-price">$4.00</h4>
						 </div>
						   <div class="col-sm-3 product-details">
							   <h4 class="product-des">Custom Embossed Dog Tag Necklaces</h4>
							   <img src="images/product/tag/product2.png">
							   <h4 class="product-price">$8.00</h4>
						 </div>
						   <div class="col-sm-3 product-details">
							   <h4 class="product-des">Custom Embossed Luggage Tags</h4>
							   <img src="images/product/tag/product3.png">
							   <h4 class="product-price">$12.00</h4>
						 </div>
						   <div class="col-sm-3 product-details">
							   <h4 class="product-des">Custom Embossed Replacement Dog Tags</h4>
							   <img src="images/product/tag/product4.png">
							   <h4 class="product-price">$10.00</h4>
						 </div>
					   </div>
					</div><!-----------------col-sm-12---------------------------->
				 </div><!--------------------row---------------------------->
			 </div><!-----------------------conatiner---------------------------->
		  </section><!-----------------------section---------------------------->
		  
		  <section id="main-body">
		     <div class="container">
			    <div class="row">
					<div class="col-sm-12">
					   <div class="col-sm-1">
					   </div>
					   <div class="col-sm-11">
					     <div class="col-sm-3 product-details">
							 <h4 class="product-des">DogXtar Custom Military Dog Tags - Personalized ID</h4>
							 <img src="images/product/tag/product5.png">
							 <h4 class="product-price">$10.00</h4>
						 </div>
						   <div class="col-sm-3 product-details">
							   <h4 class="product-des">Custom Embossed Dog Tag Necklaces</h4>
							   <img src="images/product/tag/product6.png">
							   <h4 class="product-price">$10.00</h4>
						 </div>
						   <div class="col-sm-3 product-details">
							   <h4 class="product-des">Custom Embossed Luggage Tags</h4>
							   <img src="images/product/tag/product7.png">
							   <h4 class="product-price">$8.00</h4>
						 </div>
						   <div class="col-sm-3 product-details">
							   <h4 class="product-des">Custom Embossed Replacement Dog Tags</h4>
							   <img src="images/product/tag/product8.png">
							   <h4 class="product-price">$9.00</h4>
						 </div>
					   </div>
					</div><!-----------------col-sm-12---------------------------->
				 </div><!--------------------row---------------------------->
			 </div><!-----------------------conatiner---------------------------->
		  </section><!-----------------------section---------------------------->
		  
		  <section id="main-body">
		     <div class="container">
			    <div class="row">
					<div class="col-sm-12">
					   <div class="col-sm-1">
					   </div>
					   <div class="col-sm-11">
					     <div class="col-sm-3 product-details">
							 <h4 class="product-des">DogXtar Custom Military Dog Tags - Personalized ID</h4>
							 <img src="images/product/tag/product9.png">
							 <h4 class="product-price">$11.00</h4>
						 </div>
						   <div class="col-sm-3 product-details">
							   <h4 class="product-des">Custom Embossed Dog Tag Necklaces</h4>
							   <img src="images/product/tag/product10.png">
							   <h4 class="product-price">$8.00</h4>
						 </div>
						   <div class="col-sm-3 product-details">
							   <h4 class="product-des">Custom Embossed Luggage Tags</h4>
							   <img src="images/product/tag/product11.png">
							   <h4 class="product-price">$12.00</h4>
						 </div>
						   <div class="col-sm-3 product-details">
							   <h4 class="product-des">Custom Embossed Replacement Dog Tags</h4>
							   <img src="images/product/tag/product12.png">
							   <h4 class="product-price">$14.00</h4>
						 </div>
					   </div>
					</div><!-----------------col-sm-12---------------------------->
				 </div><!--------------------row---------------------------->
			 </div><!-----------------------conatiner---------------------------->
		  </section><!-----------------------section---------------------------->
		  
		  <section id="main-body">
		     <div class="container">
			    <div class="row">
					<div class="col-sm-12">
					   <div class="col-sm-1">
					   </div>
					   <div class="col-sm-11">
					     <div class="col-sm-3 product-details">
							 <h4 class="product-des">DogXtar Custom Military Dog Tags - Personalized ID</h4>
							 <img src="images/product/tag/product13.png">
							 <h4 class="product-price">$11.00</h4>
						 </div>
						   <div class="col-sm-3 product-details">
							   <h4 class="product-des">Custom Embossed Dog Tag Necklaces</h4>
							   <img src="images/product/tag/product14.png">
							   <h4 class="product-price">$8.00</h4>
						 </div>
						   <div class="col-sm-3 product-details">
							   <h4 class="product-des">Custom Embossed Luggage Tags</h4>
							   <img src="images/product/tag/product15.png">
							   <h4 class="product-price">$12.00</h4>
						 </div>
						   <div class="col-sm-3 product-details">
							   <h4 class="product-des">Custom Embossed Replacement Dog Tags</h4>
							   <img src="images/product/tag/product16.png">
							   <h4 class="product-price">$14.00</h4>
						 </div>
					   </div>
					</div><!-----------------col-sm-12---------------------------->
				 </div><!--------------------row---------------------------->
			 </div><!-----------------------conatiner---------------------------->
		  </section><!-----------------------section---------------------------->
		  
		  
		 
		 
		<!---------------------------------------FOOTER-BAR-------------------------------------------------------------->
           <section>
              <div id="contact-map"></div>
          </section><!---------------section--------------->
		 <section id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                          <h4>ADDRES</h4>
                          <p class="ADDRES">
                            <?php echo $dog_tag->show_general_settings('ADDRES');
						   	?>
                          </p>
                          <p>
                            2016 Your Company, All Rghts Reserved
                          </p>
                        </div>
                      <?php 
                      	if(isset($_POST['submit_comment'])){
                      		if(isset($_POST['comment_email']) && isset($_POST['comment_name']) && isset($_POST['comment_comment']) ){
                      		$dog_tag->insert_into_table("
                      			INSERT INTO COMMENTS (sender_email,sender_name,sender_comment) VALUES('".$_POST['comment_email']."','".$_POST['comment_name']."','".$_POST['comment_comment']."')
                      			");

                      		echo "<h4>Comment is submitted will reply in your mail ".$_POST['comment_email'];
                      		}else{	
                      			echo "fill up the form first";
                      		}		//end of if/else filled up form
                      	}		//end of submit
                      ?>
                        <div class="col-sm-6">
                          <h4>Contact Us</h4>
                          <form method="POST">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email ADDRES</label>
                              <input name="comment_email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Your name</label>
                              <input name="comment_name" type="text" class="form-control" id="exampleInputPassword1" placeholder="Name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Comment</label>
                             <textarea name="comment_comment" type="text" class="form-control" id="exampleInputPassword1" placeholder="comments"></textarea>
                            </div>
                            <button name="submit_comment" type="submit" class="btn btn-default">Submit</button>
                          </form>
                        </div>
                    </div>
                </div>
            </section>
	  </div><!----------------mother-div---------------->
	  <script src="js/main.js"></script>
  </body>
</html>
