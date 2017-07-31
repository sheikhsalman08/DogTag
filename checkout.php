<?php 
	require('functions.php'); 
	// echo parse_url($_SERVER['HTTP_REFERER']);
if(isset($_SERVER['HTTP_REFERER'])){
 if(website_url == $_SERVER['HTTP_REFERER']){
    header("Refresh:0");
	}
}	
?>
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
	    <link rel="stylesheet" href="css/login.css">
	    <link rel="stylesheet" href="css/checkout.css">
	    
	    
	    <script src="js/map.js"></script>
	    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSynGTe5RpwVIy0z0d3kb_M3_U-Q-jC74"></script>
  </head>
    <style>
    #top-bar{
    background-color: <?php echo $header_background_color; ?>;
}
    .top-text li a {
        color: <?php echo $header_text_color; ?>;
    }
    #logo-bar{
       background-color: <?php echo $header_background_color; ?>;
       color: <?php echo $header_text_color; ?>;
    }
    ul.topnav li a{
       color: <?php echo $header_text_color; ?>; 
    }
    ul.topnav{
        background-color: <?php echo $header_background_color; ?>;
    }
    #email-text{
        color: <?php echo $header_text_color; ?>; 
    }
    #number{
         color: <?php echo $header_text_color; ?>; 
    }
</style>
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
					      <h2 class="free-shipping"><strong></strong></h2>
						  <h2 class="all-order"></h2>
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
                                                <span class="item-price"><?php echo $fetches['cart_price']; ?></span>
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
                            <a  href="index.php" id="home" >Home</a>
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
                            <a  href="checkout.php" class="active">Cart</a>
                        </li>
                        <li class="icon">
                            <a style="font-size:23px;" id="showDropDown"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                        </li>
                    </ul>
         </section><!-------------------section-menu----bar---------------->
		 
		  <div id="shopping-cart-body">

<form id="ati" method="GET">	
		 <section>
			 <div class="container">
			    <div class="row">
					<div class="col-sm-12">
						<div class="col-sm-4">
					   	   <h1 class="shopping-cart-titel">Shopping Cart</h1>
						</div>
						<div class="col-sm-8">
							<button type="submit" name="submit_quantity"  class="create-button" value="submit"><span><span class="create-button-text"><h4>Update Cart</h4></span></span></button>
						</div>
					</div>
				</div>
			 </div>
		 </section><!---------------------------section---------------->
		<?php 
		 
			$_e_s_posts=[];
			foreach ($_GET as $s_post) {
				if($s_post != "submit"){
				array_push($_e_s_posts,$s_post);	
				}
			}

			$carts = [];
			$query = $dog_tag->show_sorted_row_values('carts','cart_id','DESC');
			while($fetches = mysqli_fetch_assoc($query)){
			array_push($carts,$fetches['cart_id']);
			}

			if(isset($_GET['submit_quantity'])){	
				foreach (array_combine($carts, $_e_s_posts) as $carts => $_e_s_post) {
				$dog_tag->update_into_table_by_id2('carts','cart_quantity',$_e_s_post,'cart_id',$carts);
					//single cart price
					$query = $dog_tag->show_sorted_row_values('carts','cart_id','DESC');
					while($fetches = mysqli_fetch_assoc($query)){
					$this_cart_id = $fetches['cart_id'];
					$this_user_price = price;
					$this_cart_price = $fetches['cart_price'];
					$this_cart_quantity = $fetches['cart_quantity'];
					$should_be_price = $this_user_price * $this_cart_quantity;
						if($should_be_price != $this_cart_price){
						$dog_tag->update_into_table_by_id2('carts','cart_price',$should_be_price,'cart_id',$this_cart_id);
						header("Refresh:0");
						}		//if not correct
					}		//while fetches 
				}		//end of foreach 
			}		//isset get submitted

	 	?>	  
		  <section id="shopping-cart-product">
			 <div class="container-fluid">
			    <div class="row">
					



			<?php
				$query = $dog_tag->show_sorted_value_of_user('carts','cart_user_id',user_id,'cart_id','DESC');
				while($fetches = mysqli_fetch_assoc($query)) :
			 ?>
					<div class="col-sm-12">
						<div class="col-sm-5">
						<div class="col-sm-6">
							<h3 class="check-product-name">Tag 1</h3>
							<!-- <h4 class="product-details-name">DogXtar Custom Military Dog Tags - Personalized ID - Tag Generator</h4> -->
						<h6 class="product-color-text">Tag Name: <span style="text-transform:uppercase">
						
							<?php
							echo $dog_tag->getting_data_by_another_field('tag_color','tag_color_name','tag_color_id',$fetches['cart_tag1_color_id'])
						 ?>
						</span></h6>
			<h6 class="product-color-text">Silencer Name:<span style="text-transform:uppercase">
			
			<?php
							echo $dog_tag->getting_data_by_another_field('silencer_color','silencer_color_name','silencer_color_id',$fetches['cart_silencer1_color_id'])
						 ?>
				
			</span></h6>
						<h6 class="product-color-text">Align:<span style="text-transform:uppercase"><?php echo $fetches['cart_tag1_text_align']; ?></span></h6>
						<h6 class="product-color-text">Line 1: <span style="text-transform:uppercase"><?php echo $fetches['cart_tag1_line1_text']; ?></span></h6>
						<h6 class="product-color-text">Line 2: <span style="text-transform:uppercase"><?php echo $fetches['cart_tag1_line2_text']; ?></span></h6>
						<h6 class="product-color-text">Line 3: <span style="text-transform:uppercase"><?php echo $fetches['cart_tag1_line3_text']; ?></span></h6>
						<h6 class="product-color-text">Line 4: <span style="text-transform:uppercase"><?php echo $fetches['cart_tag1_line4_text']; ?></span></h6>
						<h6 class="product-color-text">Line 4: <span style="text-transform:uppercase"><?php echo $fetches['cart_tag1_line5_text']; ?></span></h6>
						</div><!-----------------col-sm-7------------------>											


						<div class="maruf-c">
					   	     <?php
					   	     $cart_silencer1_color_image = $dog_tag->getting_data_by_another_field('silencer_color','silencer_color_image','silencer_color_id',$fetches['cart_silencer1_color_id']);
					   	     $cart_tag1_color_image = $dog_tag->getting_data_by_another_field('tag_color','tag_color_image','tag_color_id',$fetches['cart_tag1_color_id']);
					   	     ?>

					   	     <div style="background-image: url(data:image;base64,<?php echo $cart_tag1_color_image; ?>);" class="checkout-image"><img src="data:image;base64,<?php echo $cart_silencer1_color_image; ?>"></div>	
                            
                              <div id="checkout-text-line">
                                    <h6 class="checkout-ans1" style="text-align: <?php echo $fetches['cart_tag1_text_align']; ?>"><?php echo $fetches['cart_tag1_line1_text']; ?></h6>
                                    <h6 class="checkout-ans2" style="text-align: <?php echo $fetches['cart_tag1_text_align']; ?>"><?php echo $fetches['cart_tag1_line2_text']; ?></h6>
                                    <h6 class="checkout-ans3" style="text-align: <?php echo $fetches['cart_tag1_text_align']; ?>"><?php echo $fetches['cart_tag1_line3_text']; ?></h6>
                                    <h6 class="checkout-ans4" style="text-align: <?php echo $fetches['cart_tag1_text_align']; ?>"><?php echo $fetches['cart_tag1_line4_text']; ?></h6>
                                    <h6 class="checkout-ans5" style="text-align: <?php echo $fetches['cart_tag1_text_align']; ?>"><?php echo $fetches['cart_tag1_line5_text']; ?></h6>
                              </div><!---------------------new-line-over-tag----------->




						</div><!-----------------col-sm-1------------------->
						 </div> <!-----------------col-sm-6------------------>
						 <div class="col-sm-6">
						<div class="col-sm-5">
							<h3 class="check-product-name">Tag 2</h3>
							<!-- <h4 class="product-details-name">DogXtar Custom Military Dog Tags - Personalized ID - Tag Generator</h4> -->
						<h6 class="product-color-text">Tag Name: <span style="text-transform:uppercase">
						<?php
							echo $dog_tag->getting_data_by_another_field('tag_color','tag_color_name','tag_color_id',$fetches['cart_tag2_color_id'])
						 ?>
						</span></h6>
			<h6 class="product-color-text">Silencer Name:<span style="text-transform:uppercase">
			
				<?php
							echo $dog_tag->getting_data_by_another_field('silencer_color','silencer_color_name','silencer_color_id',$fetches['cart_silencer2_color_id'])
						 ?>
			</span></h6>
						<h6 class="product-color-text">Align:<span style="text-transform:uppercase"><?php echo $fetches['cart_tag2_text_align']; ?></span></h6>
						<h6 class="product-color-text">Line 1: <span style="text-transform:uppercase"><?php echo $fetches['cart_tag2_line1_text']; ?></span></h6>
						<h6 class="product-color-text">Line 2: <span style="text-transform:uppercase"><?php echo $fetches['cart_tag2_line2_text']; ?></span></h6>
						<h6 class="product-color-text">Line 3: <span style="text-transform:uppercase"><?php echo $fetches['cart_tag2_line3_text']; ?></span></h6>
						<h6 class="product-color-text">Line 4: <span style="text-transform:uppercase"><?php echo $fetches['cart_tag2_line4_text']; ?></span></h6>
						<h6 class="product-color-text">Line 5: <span style="text-transform:uppercase"><?php echo $fetches['cart_tag2_line5_text']; ?></span></h6>
						</div><!-----------------col-sm-7------------------>
						<div class="maruf-c">
					   	     <!-- <div style="background-image: url(images/background/background9.png);" class="checkout-image"><img src="images/bar-body/bar-body1.png"></div> -->	<!--  checkout.css 22 -->
					   	      <?php
					   	     $cart_silencer2_color_image = $dog_tag->getting_data_by_another_field('silencer_color','silencer_color_image','silencer_color_id',$fetches['cart_silencer2_color_id']);
					   	     $cart_tag2_color_image = $dog_tag->getting_data_by_another_field('tag_color','tag_color_image','tag_color_id',$fetches['cart_tag2_color_id']);
					   	     // echo $cart_tag1_color_image."<br>";
					   	     // echo $cart_silencer1_color_image;
					   	     ?>
					   	     <div style="background-image: url(data:image;base64,<?php echo $cart_tag2_color_image; ?>); width:242px" class="checkout-image"><img src="data:image;base64,<?php echo $cart_silencer2_color_image; ?>"></div>
                            
                            <div id="checkout-text-line">
                                    <h6 class="checkout-ans5" style="text-align: <?php echo $fetches['cart_tag2_text_align']; ?>"> <?php echo $fetches['cart_tag2_line1_text']; ?></h6>
                                    <h6 class="checkout-ans5" style="text-align: <?php echo $fetches['cart_tag2_text_align']; ?>"> <?php echo $fetches['cart_tag2_line2_text']; ?></h6>
                                    <h6 class="checkout-ans5" style="text-align: <?php echo $fetches['cart_tag2_text_align']; ?>"> <?php echo $fetches['cart_tag2_line3_text']; ?></h6>
                                    <h6 class="checkout-ans5" style="text-align: <?php echo $fetches['cart_tag2_text_align']; ?>"> <?php echo $fetches['cart_tag2_line4_text']; ?></h6>
                                    <h6 class="checkout-ans5" style="text-align: <?php echo $fetches['cart_tag2_text_align']; ?>"> <?php echo $fetches['cart_tag2_line5_text']; ?></h6>
                              </div><!---------------------new-line-over-tag----------->
                            
						</div><!-----------------col-sm-1------------------>
						<div class="arman-wrap">
							<div>
						   	     <h3 class="check-product-price">Price</h3>
								 <h3>$<?php echo $fetches['cart_price']; ?><h5 class="price-qut-name-checkout">Qty:<input type="text" name="checkout_cart_quantity<?php echo $fetches['cart_id']; ?>" value="<?php echo $fetches['cart_quantity']; ?>" id="input-size"></h5></h3>
							</div><!-----------------col-sm-1------------------>
							<div>
						   	     <!-- <h3 class="check-product-name">Qty</h3> -->
								<!-- <h3>1</h3> -->
								<br>
							</div><!-----------------col-sm-1------------------>
</form>
							<?php 
							if(isset($_POST['delete_cart'])){
								$dog_tag->delete_from_table_by_id('carts','cart_id',$_POST['hidden_delete_cart']);
								header("Refresh:0; url=checkout.php");
							}
							?>
					
						<form method="POST">
						<input type="hidden" name="hidden_delete_cart" value="<?php echo $fetches['cart_id']; ?>"/>
						<input style="background-color: slategray" type="submit" name="delete_cart" value="Remove" class="create-button-delete"/>
						</form>


						</div>
						 </div> <!-----------------col-sm-6------------------>

					</div><!-------------------------------------col-sm-12------------------------------>
				<?php endwhile; ?>








				</div>
			 </div>
		 </section><!---------------------------section---------------->
	     <section>
			 <div class="conatiner">
			    <div class="row">
					<div class="col-sm-12">
                        <div class="col-sm-3">
<button onclick="window.location='index.php';" type="button" title="Create an Account" class="create-button"><span><span class="create-button-text"><h4>Continue Shopping</h4></span></span></button>
</div>


<div class="col-sm-3">

</div>

<div class="col-sm-4">
<button onclick="window.location='settle.php';" type="button" title="Create an Account" class="create-button"><span><span class="create-button-text"><h4>Check Out</h4></span></span></button>
</div>
						<div class="col-sm-5">
						</div>
					   <div class="col-sm-5">
					   
						  <h3 class="total-text">Total: $<span class="price-totall-number"><?php echo total; ?>.00</span></h3><br><br><br><br>

						  <h3 class="total-text">Shipping Charge: $<span class="price-totall-number"><?php echo total_shipping_charge; ?>.00</span></h3><br><br><br><br>
						  <h3 class="total-text">Sub-Total: $<span class="price-totall-number"><?php echo sub_total; ?>.00</span></h3>
						</div>
						
					</div><!-----------------------------col-sm-12------------------------------>
				</div>
			 </div>
	     </section>
		  
		</div><!----------------------div---------------->



		<!---------------------------------------FOOTER-BAR------------------------------------------------------------>
         <section>
              <div id="contact-map" style="height:300px;"></div>
          </section><!---------------section-------------->
		  
          
          <section id="second-footer">
                 <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                           <div class="col-sm-3">
                               <ul class="second-footer-list">
                                   <li><h5 class="second-footer-list-header">CONNECT WITH US</h5></li>
                                  <li><img src="images/call.PNG"><span class="second-footer-span"><?php echo $contact_number; ?></span></li>
                                  <li><img src="images/message.PNG"><span class="second-footer-span"><a href="contactpage.php">Send Us Message</a></span></li>
                                   <!-- <li><img src="images/message.PNG"><span class="second-footer-span"><a href="contactpage.php"><?php echo $admin_adress; ?></a></span></li> -->
                               </ul>
                           </div>
                           <div class="col-sm-3">
                               <ul class="second-footer-list">
                                   <li><h5 class="second-footer-list-header">CONNECT WITH US</h5></li>
                                  <li><img src="images/arrow.PNG"><span class="second-footer-span"><a href="policy.php">Return Policy</a>
</span></li>
                                  <li><img src="images/arrow.PNG"><span class="second-footer-span"><a href="privacy.php">
Privacy Policy</a></span></li>
                                   <li><img src="images/arrow.PNG"><span class="second-footer-span"><a href="conditions.php">
Terms & Conditions</a></span></li>
                               </ul>
                           </div>
                            <div class="col-sm-3">
                                <ul class="second-footer-list">
                                    <li><h5 class="second-footer-list-header">PAYMENT OPTIONS</h5></li>
                                    <li><img src="images/all-cards.PNG" class="all-the-images"></li>
                                </ul>
                                
                           </div>
                            <div class="col-sm-3">
                                <ul class="second-footer-list">
                                    <li><h5 class="second-footer-list-header">FACEBOOK</h5></li>
                                    <li><img src="images/facebook.PNG" class="all-the-images"><span class="second-footer-span-2"><a href="<?php echo $facebook_link; ?>">Follow us on facebook</a></span></li>
                                </ul>
                           </div>
                        </div>
                    </div>
                 </div>
             </section>
	  </div><!----------------mother-div---------------->
	  <script src="js/main.js"></script>
  </body>
</html>
