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
                            <h2 class="policy-header">TERMS AND CONDITIONS<br><br></h2>
                            <h5 class="policy-sami-header">INTRODUCTION</h5>
                            <p class="policy-text">
                                This Agreement contains the complete terms and conditions that apply to you in joining, buying, bidding, selling and all other activities you will make in our website. By using or shopping from this Web site, you agree to be bound by its terms of use and shall comply thereof. This Agreement describes and encompasses the entire agreement between us and you, and supersedes all prior or contemporaneous agreements, representations, warranties and understandings with respect to the Site, the content and computer programs provided by or through the Site, and the subject matter of this Agreement. Amendments to this agreement can be made and effected by us from time to time without specific notice to you end. Agreement posted on the Site reflects the latest agreement and you should carefully review the same before you use our site.<br>
                            </p>
                            
                            <h5 class="policy-sami-header">Use of the site & PROHIBITIONS</h5>
                            <div class="policy-text">
                              <p>The Site allows you to post offers, sell, advertise, bid and shop online. However, you are prohibited to do the following acts, to wit: (a) use our sites, including its services and or tools if you are not able to form legally binding contracts, are under the age of 18, or are temporarily or indefinitely suspended from using our sites, services, or tools (b) posting of an items in inappropriate category or areas on our sites and services; (c) collecting information about users’ personal information; (d) maneuvering the price of any item or interfere with other users' listings; (f) post false, inaccurate, misleading, defamatory, or libelous content; (g) take any action that may damage the rating system.
For you to complete the sign-up process in our site, you must provide your full legal name, current address, a valid email address, and any other information needed in order to complete the signup process. You must qualify that you are 18 years or older and must be responsible for keeping your password secure and be responsible for all activities and contents that are uploaded under your account. You must not transmit any worms or viruses or any code of a destructive nature.
                                </p>
                            </div>
                            
                          <h5 class="policy-sami-header">
PAYMENTS   AND PROCESSES OF INVIOCES<br></h5>
                            <p class="policy-text">
                                Tag-Z.com has the sole discretion to provide the terms of payment. Unless otherwise agreed, payment must first be received by Tag-Z.com prior to the latter’s acceptance of an order. Unless credit term has been agreed upon, payment for the products shall be made by credit card, paypal or wire transfers. Invoices are due and payable within the time period noted on your invoice, measured from the date of the invoice. An order may be invoice separately. Tag-Z.com has all the discretion to cancel or deny orders. Tag-Z.com is not responsible for pricing, typographical, or other errors in any offer by Tag-Z.com and reserves the right to cancel any orders arising from such errors. Invoices must be paid within 15 days of the invoice date. For all but consumer purchases, Tag-Z.com reserves the right to charge you a late penalty charge of 1% per month applied against undisputed overdue amounts or the maximum rate permitted by law whichever is less. Every 30 days thereafter, you will continue to be charged an additional late penalty charge.<br>
                            </p>
                            
                            <h5 class="policy-sami-header">Refund Policy<br></h5>
                            <p class="policy-text">
                                We do not have to provide a refund if you have changed your mind about a particular purchase, so please choose carefully. If the goods are faulty, we will meet our obligations under the applicable laws. However, if “non-faulty” accounts are cancelled within two weeks of the first payment a full refund, will be given.”<br>

                            </p>
                            
                            <h5 class="policy-sami-header">RISK OF LOSS<br></h5>
                            <p class="policy-text">
                                All items purchased from our website are made pursuant to a shipment contract. The risk of loss and title for such items pass to you upon our delivery to the carrier.<br>
                            </p>
                            
                            <h5 class="policy-sami-header">PRODUCT PRICING & DESCRIPTIONS<br></h5>
                            <p class="policy-text">
                                We do not warrant that product descriptions or other content of this site is accurate, complete, reliable, current, or error-free. If a product offered in our website is not as described, your sole remedy is to return it in unused condition.<br>
                            </p>
                            
                            <h5 class="policy-sami-header">Editing, Deleting and Modification<br></h5>
                            <p class="policy-text">
                               We may edit, delete or modify any of the terms and conditions contained in this Agreement, at any time and in our sole discretion, by posting a notice or a new agreement on our site. YOUR CONTINUED PARTICIPATION IN OUR PROGRAM, VISIT AND SHOPPING IN OUR SITE FOLLOWING OUR POSTING OF A CHANGE NOTICE OR NEW AGREEMENT ON OUR SITE WILL CONSTITUTE BINDING ACCEPTANCE OF THE CHANGE.<br>
                            </p>
                            
                            <h5 class="policy-sami-header">Acknowledgment of rights<br></h5>
                            <p class="policy-text">
                                You hereby acknowledge that all rights, titles and interests, including but not limited to rights covered by the Intellectual Property Rights, in and to the site, and that You will not acquire any right, title, or interest in or to the Program except as expressly set forth in this Agreement. You will not modify, adapt, translate, prepare derivative works from, decompile, reverse engineer, disassemble or otherwise attempt to derive source code from any of our services, software, or documentation, or create or attempt to create a substitute or similar service or product through use of or access to the Program or proprietary information related thereto.<br>
                            </p>
                            
                             <h5 class="policy-sami-header">Fraud<br></h5>
                            <p class="policy-text">
                               FRAUDULENT ACTIVITIES are highly monitored in our site and if fraud is detected Tag-Z.com shall resort al remedies available to us, and you shall be responsible for all costs and legal fees arising from these fraudulent activities.<br>
                            </p>
                            
                             <h5 class="policy-sami-header">WARRANTY DISCLAIMER AND LIMITATIONS OF LIABILITY<br></h5>
                            <p class="policy-text">
                               We will not be liable for indirect, special, or consequential damages, or any loss of revenue, profits, or data, arising in connection with this Agreement or the Program, even if we have been advised of the possibility of such damages. Further, our aggregate liability arising with respect to this Agreement and the Program will not exceed USD2,000 or the total price of the subject products paid or payable to you whichever is less.<br>
We make no express or implied warranties or representations with respect to the Program or any products sold and offered in our website (including, without limitation, warranties of fitness, merchantability, non-infringement, or any implied warranties arising out of a course of performance, dealing, or trade usage). In addition, we make no representation that the operation of our site will be uninterrupted or error-free, and we will not be liable for the consequences of any interruptions or errors. This site and its information, contents, materials, products and services are provided on an “as is” and “as available” basis. You and understand and agree that your use of this site is at your own risk.<br>
                            </p>
                            
                             <h5 class="policy-sami-header">Confidentiality<br></h5>
                            <p class="policy-text">
                              You agree not to disclose information you obtain from us and or from our clients, advertisers and suppliers. All information submitted to by an end-user customer pursuant to a Program is proprietary information of Tag-Z.com. Such customer information is confidential and may not be disclosed. Publisher agrees not to reproduce, disseminate, sell, distribute or commercially exploit any such proprietary information in any manner.<br>
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
