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
          
          <section>
              <div id="contact-map" ></div>
          </section><!---------------section-------------->
             
             
          <section id="second-footer">
                 <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="policy-header">PRIVACY POLICY<br><br></h2>
                            <h5 class="policy-sami-header">Please replace this text with you Privacy Policy. Please add any additional cookies your website uses below (e.g., Google Analytics)</h5>
                            <p class="policy-text">
                                This privacy policy sets out how Tag-Z.com uses and protects any information that you give Tag-Z.com when you use this website. Tag-Z.com is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement. Tag-Z.com may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes.<br>
                            </p>
                            
                            <h5 class="policy-sami-header">What we collect</h5>
                            <div class="policy-text">
                              <p>.name<br>
                                  .contact information including email address.<br>
                                  .demographic information such as postcode, preferences and interests.<br>
                                  .other information relevant to customer surveys and/or offers.<br>
                                  For the exhaustive list of cookies we collect see the List of cookies we collect section.<br>
                                </p>
                            </div>
                            
                          <h5 class="policy-sami-header">Security<br></h5>
                            <p class="policy-text">
                                We are committed to ensuring that your information is secure. In order to prevent unauthorised access or disclosure, we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect online.<br>
                            </p>
                            
                            <h5 class="policy-sami-header">How we use cookies<br></h5>
                            <p class="policy-text">
                                A cookie is a small file which asks permission to be placed on your computer's hard drive. Once you agree, the file is added and the cookie helps analyse web traffic or lets you know when you visit a particular site. Cookies allow web applications to respond to you as an individual. The web application can tailor its operations to your needs, likes and dislikes by gathering and remembering information about your preferences.<br>
                                
                                We use traffic log cookies to identify which pages are being used. This helps us analyse data about web page traffic and improve our website in order to tailor it to customer needs. We only use this information for statistical analysis purposes and then the data is removed from the system.<br>
                                
                                Overall, cookies help us provide you with a better website, by enabling us to monitor which pages you find useful and which you do not. A cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us. You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. This may prevent you from taking full advantage of the website.<br>
                            </p>
                            
                            <h5 class="policy-sami-header">Links to other websites<br></h5>
                            <p class="policy-text">
                                Our website may contain links to other websites of interest. However, once you have used these links to leave our site, you should note that we do not have any control over that other website. Therefore, we cannot be responsible for the protection and privacy of any information which you provide whilst visiting such sites and such sites are not governed by this privacy statement. You should exercise caution and look at the privacy statement applicable to the website in question.<br>
                            </p>
                        </div>
                     </div>
              </div>
                     </section>
		  
             
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
