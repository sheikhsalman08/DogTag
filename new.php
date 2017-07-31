<?php require('functions.php'); ?>
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
                                            <span class="badge">3</span>
                                            <div class="shopping-cart-total">
                                                <span class="lighter-text">Total:</span>
                                                <span class="main-color-text">$2,229.97</span>
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
                                            <li class="clearfix">
                                                <img src="images/bar-body/bar-body1.png" class="potrait-frame-cart" alt="" />
												<img src="images/background/background1.png" class="potraitImg-cart noborder main-img" alt=""/>
												
                                                <span class="item-name">Sony DSC-RX100M III</span>
                                                <span class="item-price">$849.99</span>
                                                <span class="item-quantity">Quantity: 01</span>
                                            </li>

                                            <li class="clearfix">
                                                <img src="images/bar-body/bar-body1.png" class="potrait-frame-cart" alt="" />
												<img src="images/background/background1.png" class="potraitImg-cart noborder main-img" alt=""/>
                                                <span class="item-name">KS Automatic Mechanic...</span>
                                                <span class="item-price">$1,249.99</span>
                                                <span class="item-quantity">Quantity: 01</span>
                                            </li>

                                            <li class="clearfix">
                                                <img src="images/bar-body/bar-body1.png" class="potrait-frame-cart" alt="" />
												<img src="images/background/background1.png" class="potraitImg-cart noborder main-img" alt=""/>
                                                <span class="item-name">Kindle, 6" Glare-Free To...</span>
                                                <span class="item-price">$129.99</span>
                                                <span class="item-quantity">Quantity: 01</span>
                                            </li>
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
                            <a href="DogXtar.php">DogXtar Novelty Tags</a>
                        </li>
                        <li>
                            <a href="WAG-Z.php">Wag-Z Pet Tags</a>
                        </li>
                        <li>
                            <a href="Event-Tags.php">Event-Tags</a>
                        </li>
                        <li class="icon">
                            <a style="font-size:23px;" id="showDropDown"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                        </li>
                    </ul>
         </section><!-------------------section-menu----bar----------------->

		 <section id="main-body">
		     <div class="conatiner-fluid">
			    <div class="row">
				   <div class="col-sm-12">
					   <div class="col-sm-2">
					   </div>
					   <div class="col-sm-8">
						   <h5 class="samll-text">DogXtar Custom Military Dog Tags - Personalized ID - Tag Generator</h5>
						   <h2 class="big-text">DogXtar Custom Military Dog Tags - Personalized ID - Tag Generator</h2>
						   <div class="line"><img src="images/line.png"></div>
						   <h4 class="mideum-text">Build your own dog tag set with our dog tag generator!</h4>
						   <h5 class="last-text">DogXtar dog tag sets include: 2 Custom Embossed Military Size Dog Tags • 2 Dog Tag Silencers • 2 Stainless Steel Ball Chains (1-27” & 1-4.5”)</h5>
					   </div>
				   </div>
				</div>
			 </div>
		 </section><!----------------------section--text--flid---------------------------------------------->
		 <section id="main-body">
		     <div class="conatiner-fluid">
			    <div class="row">
				   <div class="col-sm-12" >
					   <div class="col-sm-2">
					   </div>
					   <div class="col-sm-8" id="setp-two">
						   <div>
						   <div class="col-sm-2">
							   <img src="images/one.png" class="one">
						   </div>
						   <div class="col-sm-10">
							   <h4 class="one-text"><strong>Pick Your Dog Tag Color</strong></h4>
			<img src="images/back-button/back-button1.png" data-back="images/background/background1.png" class="button-back">
			<img src="images/back-button/back-button2.png" data-back="images/background/background2.png" class="button-back">
			<img src="images/back-button/back-button3.png" data-back="images/background/background3.png" class="button-back">
			<img src="images/back-button/back-button4.png" data-back="images/background/background4.png" class="button-back">
			<img src="images/back-button/back-button5.png" data-back="images/background/background5.png" class="button-back">
			<img src="images/back-button/back-button6.png" data-back="images/background/background6.png" class="button-back">
			<img src="images/back-button/back-button7.png" data-back="images/background/background7.png" class="button-back">
			<img src="images/back-button/back-button8.png" data-back="images/background/background8.png" class="button-back">
		    <img src="images/back-button/back-button9.png" data-back="images/background/background9.png" class="button-back">
		<img src="images/back-button/back-button10.png" data-back="images/background/background10.png" class="button-back">
		<img src="images/back-button/back-button11.png" data-back="images/background/background11.png" class="button-back">
		<img src="images/back-button/back-button12.png" data-back="images/background/background12.png" class="button-back">
							   <h6 class="one-last-text">Selected Dog Tag Color: <span class="last-red">Purple Anodized Aluminum</span> </h6>
						   </div>
						  </div><!-----------------------set-bar-1-------------------------------->
						  <div>
							  <img src="images/red-link.png" class="red-link">
						   <div class="col-sm-2">
							   <img src="images/two.png" class="two">
						   </div>
						   <div class="col-sm-10">
							   <h4 class="one-text"><strong>Pick Your Silencer Color</strong></h4>
		<img src="images/bar-button/bar-button1.png" data-tag="images/bar-body/bar-body1.png" class="tag">
		<img src="images/bar-button/bar-button2.png" data-tag="images/bar-body/bar-body2.png" class="tag">
		<img src="images/bar-button/bar-button3.png" data-tag="images/bar-body/bar-body3.png" class="tag">
		<img src="images/bar-button/bar-button4.png" data-tag="images/bar-body/bar-body4.png" class="tag">
		<img src="images/bar-button/bar-button5.png" data-tag="images/bar-body/bar-body5.png" class="tag">
		<img src="images/bar-button/bar-button6.png" data-tag="images/bar-body/bar-body6.png" class="tag">
		<img src="images/bar-button/bar-button7.png" data-tag="images/bar-body/bar-body7.png" class="tag">
  <img src="images/bar-body/bar-body8.png" width="90" height="57" data-tag="images/bar-body/bar-body8.png" class="tag">
		<img src="images/bar-button/bar-button9.png" data-tag="images/bar-body/bar-body9.png" class="tag">
		<img src="images/bar-button/bar-button10.png" data-tag="images/bar-body/bar-body10.png" class="tag">
		<img src="images/bar-button/bar-button11.png" data-tag="images/bar-body/bar-body11.png" class="tag">					    <img src="images/bar-button/bar-button12.png" data-tag="images/bar-body/bar-body12.png" class="tag">
		<img src="images/bar-button/bar-button13.png" data-tag="images/bar-body/bar-body13.png" class="tag">					    <img src="images/bar-button/bar-button14.png" data-tag="images/bar-body/bar-body14.png" class="tag">
		<img src="images/bar-button/bar-button15.png" data-tag="images/bar-body/bar-body15.png" class="tag">
		<img src="images/bar-button/bar-button16.png" data-tag="images/bar-body/bar-body16.png" class="tag">					    <img src="images/bar-button/bar-button17.png" data-tag="images/bar-body/bar-body17.png" class="tag">
		<img src="images/bar-button/bar-button18.png" data-tag="images/bar-body/bar-body18.png" class="tag">					   
							   <h6 class="one-last-text">Selected Silencer Color:  <span class="last-red">Black</span> </h6>
						   </div>
						  </div><!-----------------------set-bar--2--------------------->
						   <div><!-----------------------new div--------------------->
							   <img src="images/red-link.png" class="red-link">
							   <div class="col-sm-12">
								   <div class="col-sm-2">
									   <img src="images/three.png" class="one">
							   <p class="avilable">The Available Characters are:</p>
							   <p class="letter">A B C D E F G H I J K L M N O P Q R S T U V W X Y Z 0 1 2 3 4 5 6 7 8 9 & , . - / ( ) @ * + ! ? " ' : ; $ < #</p>
								   </div>
							      <div class="col-sm-5">
									  <section>
										  <div class="cols-sm-12">
								     <img src="images/bar-body/bar-body1.png" class="demo-pic1">
									   <div class="answer-fild">
								           <h3 class="ans1" data-tag="ans1">aaa</h3>
										  
										   <h3 class="ans2" data-tag="ans2">aaa</h3>
										   
										   <h3 class="ans3" data-tag="ans3">aaa</h3>
										   
										   <h3 class="ans4" data-tag="ans4">aaa</h3>
										   
										   <h3 class="ans5" data-tag="ans5">aa</h3>
									   </div>
									     </div><!------------col-sm-12-------------------->
										</section><!-------------section------------------->
									    <section>
											<div class="cols-sm-12">
											   <div class="col-sm-1">
							                    </div><!-------------section------------------->
												   <div class="col-sm-8">
													   <h4 class="tag-text">1. Tag Text</h4>

													   <h5>Aling 1</h5><img src="images/menu-bar.png" class="check1"><img src="images/menu-bar1.png" class="check2"> <br><br>
										Line1 <input type="text" name="LastName" class="input1" maxlength="15"><br><br>
										Line2 <input type="text" name="FirstName" class="input2" maxlength="15"><br><br>
										Line3 <input type="text" name="LastName" class="input3" maxlength="15"><br><br>
										Line4 <input type="text" name="FirstName" class="input4" maxlength="15"><br><br>
										Line5 <input type="text" name="FirstName" class="input5" maxlength="15"><br><br>
                                     			   </div><!---------------------------col--sm--8---------------------------->
											  </div><!------------col-sm-12-------------------->
									     </section><!-------------section------------------->
								     </div><!----------col-m-5------------->
								   <div class="col-sm-5">
									  <section>
										  <div class="cols-sm-12">
											  <div class="col-sm-4">
												  <input type="checkbox" name="tagEnable" id="tag-two-enable" class="check-box"><strong> Edit Tag 2</strong>  <br><br><br>
												  <p class="avilable">The Available Characters are:</p>
							   <p class="letter">A B C D E F G H I J K L M N O P Q R S T U V W X Y Z 0 1 2 3 4 5 6 7 8 9 & , . - / ( ) @ * + ! ? " ' : ; $ < #</p>
											  </div>
											  <div class="col-sm-8">
								           <img src="images/bar-body/bar-body1.png" class="demo-pic2">
											   <div class="answer-fild" id="answer-fild">
												   <h3 class="ans1" data-tag="ans6" id="ans6"></h3>

												   <h3 class="ans2" data-tag="ans7" id="ans7"></h3>

												   <h3 class="ans3" data-tag="ans8" id="ans8"></h3>

												   <h3 class="ans4" data-tag="ans9" id="ans9"></h3>
												   
												   <h3 class="ans5" data-tag="ans10" id="ans10" ></h3>
											   </div>
									      </div><!------------col-sm-12-------------------->
										</section><!-------------section------------------->
									    <section>
											<div class="cols-sm-12">
											    <div class="col-sm-4">
						                        </div><!-------------col-sm-1------------------->
												   <div class="col-sm-8">
													   <h4 class="tag-text">2. Tag Text</h4>
													   <h5>Aling 2</h5><img src="images/menu-bar.png" class="check1"><img src="images/menu-bar1.png" class="check2"> <br><br>
								Line1 <input type="text" name="LastName" class="input1" maxlength="15" id="input6"><br><br>
								Line2 <input type="text" name="FirstName" class="input2" maxlength="15" id="input7"><br><br>
								Line3 <input type="text" name="LastName" class="input3" maxlength="15" id="input8"><br><br>
								Line4 <input type="text" name="FirstName" class="input4" maxlength="15" id="input9"><br><br>
								Line5 <input type="text" name="FirstName" class="input5" maxlength="15" id="input10"><br><br>
												   </div><!---------------------------col--sm--8---------------------------->
											</div><!------------col-sm-12-------------------->
									    </section><!-------------section------------------->
								   </div><!----------col-m-5------------->
							   </div><!---------------col-sm-12-------------->
						   
						   </div><!-----------------------new div end--------------------->
						  </div><!-----------------------set-bar--3--------------------->
					   </div>
		           </div>
				</div>
			 </div>
		 </section><!----------------------section--step--2----------------------------------------------->
		 <section id="main-body">
		     <div class="conatiner-fluid">
			    <div class="row">
				   <div class="col-sm-12" >
					   <div class="col-sm-2">
					   </div>
					   <div class="col-sm-8" id="setp-two">
						  <div>
						   <div class="col-sm-2">
							   <img src="images/four.png" class="one">
						   </div>
						   <div class="col-sm-10">
							   <div class="col-sm-6">
							   </div>
							   <div class="col-sm-2">
								   <h1 class="price">$6.00</h1>
							   </div>
							   <div class="col-sm-4">
							      <img src="images/cart-button.JPG" class="cart-button">
							   </div>
						   </div>
						  </div>
					   </div>
		           </div>
				</div>
			 </div>
		 </section><!----------------------section--step--4----------------------------------------------->
		 <section id="prodeuct">
		     <div class="container-fluid">
			    <div class="row">
					<div class="col-sm-12">
					<h2 class="product">Product Description</h2>
						<div class="col-sm-2">
						</div>
						<div class="col-sm-8">
							<p class="footer-description"><strong>DogXtar dog tag sets include: 2 Custom Embossed Military Size Dog Tags • 2 Dog Tag Silencers • 2 Stainless Steel Ball Chains (1-27” & 1-4.5”)</strong></p>
							<p class="footer-description"><strong>If you have an order for more than 10 sets, please call us for pricing!</strong></p>
							<p class="footer-description">Obviously we’ve made tags for our fine young guys and gals in the U.S. Army, Navy, Air Force, Marines & Coast Guard, but we also make tags for:</p>
						</div>
						<div class="col-sm-2"></div>
					</div><!-------------------col-sm-12-------------------->
					<div class="col-sm-12">
						<div class="col-sm-2">
						</div>
						<div class="col-sm-8">
					    <div class="col-sm-3" id="footer-text">
							<h6>. Birthday Parties</h6>
							<h6>. Fundraisers</h6>
							<h6>. Family Outings</h6>
							<h6>. Golf Outings</h6>
							<h6>. Child ID Tags</h6>
							<h6>.Holiday Gifts</h6>
							<h6>. Backpacks & Book Bags</h6>
						</div>
						<div class="col-sm-3" id="footer-text">
							<h6>. Birthday Parties</h6>
							<h6>. Fundraisers</h6>
							<h6>. Family Outings</h6>
							<h6>. Golf Outings</h6>
							<h6>. Child ID Tags</h6>
							<h6>.Holiday Gifts</h6>
							<h6>. Backpacks & Book Bags</h6>
						</div>
						<div class="col-sm-3" id="footer-text">
							<h6>. Birthday Parties</h6>
							<h6>. Fundraisers</h6>
							<h6>. Family Outings</h6>
							<h6>. Golf Outings</h6>
							<h6>. Child ID Tags</h6>
							<h6>.Holiday Gifts</h6>
							<h6>. Backpacks & Book Bags</h6>
						</div>
						<div class="col-sm-3" id="footer-text">
							<h6>. Birthday Parties</h6>
							<h6>. Fundraisers</h6>
							<h6>. Family Outings</h6>
							<h6>. Golf Outings</h6>
							<h6>. Child ID Tags</h6>
							<h6>.Holiday Gifts</h6>
							<h6>. Backpacks & Book Bags</h6>
						</div>
						</div>
					</div><!-------------------col-sm-12-------------------->
				</div>
			 </div>
		 </section>
		<!---------------------------------------FOOTER-BAR-------------------------------------------------------------->
		  <section>
              <div id="contact-map" style="height:300px;"></div>
          </section><!---------------section--------------->
		  <section id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                          <h4>ADDRES</h4>
                          <p class="ADDRES">
                            120932 Amigo Street, Las Santos, Rio De Jenerio, Brazil
                          </p>
                          <p>
                            2016 Your Company, All Rghts Reserved
                          </p>
                        </div>
                        <div class="col-sm-6">
                          <h4>Contact Us</h4>
                          <form>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email ADDRES</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                          </form>
                        </div>
                    </div>
                </div>
            </section>
	  </div><!----------------mother-div----------------->
	  <script src="js/main.js"></script>
  </body>
</php>

