<?php
	require('functions.php');
	ob_start();
	if(isset($_SESSION['user_id'])){
		header('Location:index.php');
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
	    
	    
	    <script src="js/map.js"></script>
	    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSynGTe5RpwVIy0z0d3kb_M3_U-Q-jC74"></script>
  </head>
<html>
    <style>
        #show-email {
    margin-left: 28px;
    font-size: 18px;
    color: red;
    font-family: initial;
}
        span.create-button-text a {
    color: white;
    text-decoration: none;
}
    </style>
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
				<li><a href="checkout.php">CHECKOUT</a></li>
				<?php if(isset($_SESSION['user_id'])) : ?>
					<li><a><?php echo user_name; ?></a> <a href="log_out.php">(log out)</a></li>
				<?php else: ?>
					<li><a href="login.php">LOG IN</a></li>
				<?php endif; ?>
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
						       <img src="images/cart1.png" d="shopping">
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
$query = $dog_tag->show_sorted_value_of_user('carts','cart_user_id',user_id,'cart_id','DESC');
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
		 
		  
		 <section id="login-body">
		       <div class="container">
                    <div class="row">
						<div class="col-sm-12">
							 <h3 class="login-titel">Login or Create an Account</h3>
							<div class="col-sm-6">
								<div class="create-box">
								  <h4 class="new-customer">New Customers</h4>
								  <p class="login-para">By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping ADDRESes, view and track your orders in your account and more.</p>
									<button type="button" title="Create an Account" class="create-button"><span><span class="create-button-text"><a href="create-account.php">Create an Account</a></span></span></button>
								</div><!-------------------BOX---------------->
							</div>
							<div class="col-sm-6">
								<div class="create-box1">
									<h3 class="login-titel1">Registered Customers</h3>
									<h5 class="login-description">If you have an account with us, please log in.</h5>
<?php 
	if(isset($_POST['log_in_submit'])){
		if($dog_tag->email_existance('users','user_email',$_POST['user_email'])){
				if(($dog_tag->finding_email_pass('users','user_pass','user_email',$_POST['user_email'])) == $_POST['user_pass']){
				$_SESSION['user_id'] = $dog_tag->getting_data_by_another_field('users','user_id','user_email',$_POST['user_email']);
				// $user_name = $dog_tag->getting_data_by_another_field('users','user_name','user_id',$_SESSION['user_id']);
				// echo "<h1> Welcome ".$user_name."</h1>";
header("Location: index.php");

				}else{
				echo "<p id='show-email'>pass word didn't matches</p>";
				}   //if/else for password matches
			}else{
			echo "<p id='show-email'>E-mail doesn't exist</p>";
		}   //if/else email exist
	}   //isset log-in submit
?>

									<form action="" method="POST">
										<ul class="form-list">
						 					<li>
												<label class="email-tag">Email ADDRES</label>
												<div class="input-box">
													<input type="text" name="user_email" value="" class="email-fild" title="Email ADDRES">
												</div>
											</li><!-------------------------ul---------------------->
											<li>
												<label for="pass" class="email-tag">Password</label>
												<div class="input-box">
													<input type="password" name="user_pass"  class="password-fild" title="Password">
												</div>
												<!-- <h5>Forgot Your Password?</h5> -->
												<button type="submit" name="log_in_submit" title="Create an Account" class="create-button"><span><span class="create-button-text">login</span></span></button>
											</li><!-------------------------ul---------------------->
	                                     </ul><!-------------------------ul---------------------->
                                     <form>


								</div>
							</div>
						</div><!-------------------col-sm-12---------------->
					</div>
			   </div>
		 </section>
		  

		 
		<!---------------------------------------FOOTER-BAR-------------------------------------------------------------->
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

