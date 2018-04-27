<?php
	require('functions.php');
	if(isset($_COOKIE['dog_tag_payment_acceptance'])){
	setcookie("dog_tag_payment_acceptance","3",time()-331);
}
?>
<?php
	if(isset($_POST['tag1-line-1']) || isset($_POST['tag1-line-2']) || isset($_POST['tag1-line-3']) || isset($_POST['tag1-line-4']) || isset($_POST['tag1-line-5']) || isset($_POST['tag2-line-1']) || isset($_POST['tag2-line-2']) || isset($_POST['tag2-line-3']) || isset($_POST['tag2-line-4']) || isset($_POST['tag2-line-5']) ){
		if(!isset($_POST['tag1-text-align'])){
				$_POST['tag1-text-align'] = "left";
		}
		if(!isset($_POST['tag2-text-align'])){
				$_POST['tag2-text-align'] = "center";
		}
		$cart_user_id= user_id;
		$cart_user_email = user_email;
		$cart_user_type= user_type;
		$cart_tag1_color_id=$_POST['tag1Bg'];
		$cart_tag2_color_id=$_POST['tag2Bg'];
		$cart_silencer1_color_id=$_POST['tag1Br'];
		$cart_silencer2_color_id=$_POST['tag2Br'];
		$cart_type="1";
		$cart_tag1_line1_text = $_POST['tag1-line-1'];
		$cart_tag1_line2_text = $_POST['tag1-line-2'];
		$cart_tag1_line3_text = $_POST['tag1-line-3'];
		$cart_tag1_line4_text = $_POST['tag1-line-4'];
		$cart_tag1_line5_text = $_POST['tag1-line-5'];
		$cart_tag1_text_align = $_POST['tag2-text-align'];
		$cart_tag2_line1_text = $_POST['tag2-line-1'];
		$cart_tag2_line2_text = $_POST['tag2-line-2'];
		$cart_tag2_line3_text = $_POST['tag2-line-3'];
		$cart_tag2_line4_text = $_POST['tag2-line-4'];
		$cart_tag2_line5_text = $_POST['tag2-line-5'];
		$cart_tag2_text_align = $_POST['tag1-text-align'];
		$cart_quantity = $_POST['qty'];
		$cart_price = price * $cart_quantity;

			$dog_tag->insert_into_table("
					INSERT INTO carts (cart_tag1_line1_text,cart_tag1_line2_text,cart_tag1_line3_text,cart_tag1_line4_text,cart_tag1_line5_text,cart_tag2_line1_text,cart_tag2_line2_text,cart_tag2_line3_text,cart_tag2_line4_text,cart_tag2_line5_text,cart_tag1_text_align,cart_tag2_text_align,
					cart_user_id,cart_user_type,cart_type,cart_price,
					cart_silencer1_color_id,
					cart_silencer2_color_id,
					cart_tag1_color_id,
					cart_tag2_color_id,
					cart_user_email,
					cart_quantity
					) VALUES(
					'".$cart_tag1_line1_text."','".$cart_tag1_line2_text."','".$cart_tag1_line3_text."',
					'".$cart_tag1_line4_text."','".$cart_tag1_line5_text."','".$cart_tag2_line1_text."',
					'".$cart_tag2_line2_text."','".$cart_tag2_line3_text."','".$cart_tag2_line4_text."',
					'".$cart_tag2_line5_text."','".$cart_tag1_text_align."','".$cart_tag2_text_align."',
					'".$cart_user_id."','".$cart_user_type."','".$cart_type."','".$cart_price."',
					'".$cart_silencer1_color_id."',
					'".$cart_silencer2_color_id."',
					'".$cart_tag1_color_id."',
					'".$cart_tag2_color_id."',
					'".$cart_user_email."',
					'".$cart_quantity."'
					)

				");
			// $dog_tag->insert_into_table("
			// 		INSERT INTO carts (cart_tag2_line5_text) VALUES(
			// 		'".$cart_tag2_line5_text."'
			// 		)

			// 	");

			
		}		//if/else 
	?>
<html>
  <head>	
  		<title>Welcome to Dog-tag</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="style.css">
	    <link rel="stylesheet" href="css/card.css">
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
                            <a class="active" href="index.php" id="home">Home</a>
                        </li>
                        <li>
                            <a href="DogXtar.php" id="menu-hide">DogXtar Novelty Tags</a>
                        </li>
                        <li>
                            <a href="WAG-Z.php" id="menu-hide">Wag-Z Pet Tags</a>
                        </li>
                        <li>
                            <a href="Event-Tags.php">Event-Tags</a>
                        </li>
                        <li>
                            <a  href="checkout.php">Cart</a>
                        </li>
                        <li class="icon">
                            <a style="font-size:23px;" id="showDropDown"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                        </li>
                    </ul>
         </section><!-------------------section-menu----bar----------------->
		 <section>
		    <div class="">
				<div class="">
					<div class="">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
						  <ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							<li data-target="#carousel-example-generic" data-slide-to="3"></li>
							<li data-target="#carousel-example-generic" data-slide-to="4"></li>

						  </ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
								  <?php 
								  $find_active_class = 0;
								  	$query = $dog_tag->show_sorted_row_values('slider_images','slider_image_id','DESC');
								  while($fetches = mysqli_fetch_assoc($query)) :
								  ?>
							
									<?php if($find_active_class == 0) :?>
										<div class="item active">
									<?php else: ?>
										<div class="item">
									 <?php endif; ?>
								
							
								  <img src="data:image;base64,<?php echo $fetches['slider_image']; ?>" alt="" >
									</div>
							<?php 
							
							$find_active_class++;
							endwhile;
							?>
						</div>
						  <!-- Controls -->
						  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
				</div>
			</div>
		 </section><!----------------------section--slider-------------------------------------------------->
          
          
          <section id="second-footer">
                 <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="policy-header">RETURN POLICY<br><br></h2>
                            <h5 class="policy-sami-header">RETURNS:</h5>
                            <p class="policy-text">Returns are accepted within 14 days upon receipt of your item. Refunds will be given in tender paid. After 14 days refunds will be granted in merchandise credit or exchange.
                            <br><br>
                            After 30 days, we will not accept any returns or exchanges.
                                <br>
                            </p>
                            
                            <h5 class="policy-sami-header">All items returned must be in the same condition as received with all tags and packaging.</h5>
                            <div class="policy-text">
                              <p>.Any returns that do not have all original tags and are not in original, new condition will not be accepted.<br>
                                  .We will not accept returns for worn or used items.<br>
                                  .Return shipping will be deducted from the return amount unless shipped at your own expense. A flat return shipping rate of $6 will be applied unless shipped internationally. Please see international rates.<br>
                                  Please note: If item is returned damaged, without tags, soiled or used, the item be shipped back with a shipping fee and no refund will be made. Be sure to carefully read the return policy and return instructions.<br>
                                </p>
                            </div>
                            
                          <h5 class="policy-sami-header">EXCHANGE CREDIT:<br></h5>
                            <p class="policy-text">
                                If you wish to exchange an item, please return your original purchase by following the return directions above. Once the item is received to our warehouse in original condition you will then receive credit in your online account. Please anticipate 5-7 business days for exchange credit to be added to your online account. You may place your exchange order once the credit has been applied.<br><br>
                                
                                You are able to place a new order for replacement at anytime before we receive your return however, please note we will not refund for your return until we have received the merchandise undamaged, unused into our warehouse.<br>
                            </p>
                            
                            <h5 class="policy-sami-header">SALE Items Terms of Sale:<br></h5>
                            <p class="policy-text">
                                All SALE items can be returned for merchandise credit or exchange only..<br>
                            </p>
                        </div>
                     </div>
              </div>
                     </section>
		  
             
             <section>
              <div id="contact-map" ></div>
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
