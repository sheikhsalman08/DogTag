<?php require('functions.php');
		require('Event-Tags-php.php');

	if(isset($_POST['ac_submit_for_cart'])){
		
if(!isset($_POST['e_quantity'])){
	$e_cart_quantity = 1;
	$cart_price = price;
}else{
	$e_cart_quantity = $_POST['e_quantity'];
	$cart_price = price * $e_cart_quantity;
}

		//rest values are in php page...
		$cart_type="2";
		
		$cart_user_id= user_id;
		$cart_user_email = user_email;
		$cart_user_type= user_type;

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
					'".$e_cart_quantity."'
					)

				");
			// $dog_tag->insert_into_table("
			// 		INSERT INTO carts (cart_tag2_line5_text) VALUES(
			// 		'".$cart_tag2_line5_text."'
			// 		)

			// 	");
			header('Location: checkout.php');
		}		//if submitted
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
                            <a  href="index.php" id="home">Home</a>
                        </li>
                        <li>
                            <a href="DogXtar.php" id="menu-hide">DogXtar Novelty Tags</a>
                        </li>
                        <li>
                            <a href="WAG-Z.php" id="menu-hide">Wag-Z Pet Tags</a>
                        </li>
                        <li>
                            <a href="Event-Tags.php" class="active">Event-Tags</a>
                        </li>
                        <li>
                            <a  href="checkout.php">Cart</a>
                        </li>
                        <li class="icon">
                            <a style="font-size:23px;" id="showDropDown"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                        </li>
                    </ul>
         </section><!-------------------section-menu----bar---------------->

         <section class="fixed-menu">
                    <ul class="topnav" id="myTopnav2">
                        <li>
                            <a class="active" href="?milestones=BIRTHDAY" id="home">BIRTHDAY</a>
                        </li>
                        <li>
                            <a href="?milestones=GRADUATION">GRADUATION</a>
                        </li>
                        <li>
                            <a href="?milestones=ANNIVERSARY">ANNIVERSARY</a>
                        </li>
                        <li>
                            <a href="?milestones=WEDDING">WEDDING</a>
                        </li>
                        <li>
                            <a href="?milestones=BABY_BRITH">BABY BIRTH</a>
                        </li>
                        
                        <li>
                            <a href="?milestones=MOTHERS_DAY">MOTHERS DAY</a>
                        </li>
                        <li>
                            <a href="?milestones=NEW_JOB">NEW JOB</a>
                        </li>

                        <li class="icon">
                            <a style="font-size:23px;" id="showDropDown"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
                        </li>
                    </ul>
         </section><!-------------------section-menu----bar---------------->

	
		 <section id="main-body">
		     <div class="conatiner-fluid">
			    <div class="row">
				   <div class="col-sm-12">
					   <div class="col-sm-2">
					   </div>
					   <div class="col-sm-8">
						   <div class="line"><img src="images/line.png"></div>
						   <h4 class="mideum-text">Build Your own Dog Tag Set With our Dog Tag Generator LARGE </h4>
						   <h5 class="last-text">DogXtar dog tag sets include: <br>• 2 Custom Embossed Military Dog Tags <br>• 2 Dog Tag Silencers <br>• 2 Stainless Steel Ball Chains </h5>
					   </div>
				   </div>
				</div>
			 </div>
		 </section><!----------------------section--text--flid------------- ---------------------------------->
		 <form method="POST">
		 <section id="main-body">
		     <div class="conatiner-fluid">
			    <div class="row">
				   <div class="col-sm-12" >
					   <div class="col-sm-2">
					   </div>
					   <div class="col-sm-8" id="setp-two">










					   <section id="show-first">
						   <div>
						   <div class="col-sm-2">
							   <img src="images/Untitled-1.png" class="one">
						   </div>
						   <div class="col-sm-10">
							   <h4 class="one-text"><strong>Pick Your Dog Tag Color</strong></h4>
							   <?php
							    $query = $dog_tag-> show_sorted_row_values('tag_color','tag_color_name','DESC');
							   	while($fetches = mysqli_fetch_assoc($query)):
								$looping_1 = 0;
								if($looping_1 == 0){
								$auto_check_1 = 'checked';
								}else{
								$auto_check_1 = '';
								}
							    ?>
							<label>
			<img id="" style="height:90px;" src="data:image;base64,<?php echo $fetches['tag_color_image']; ?>" data-back="data:image;base64,<?php echo $fetches['tag_color_image']; ?>" class="button-back" data-img ="<?php echo $fetches['tag_color_id'] ?>"/>
			<input <?php echo $auto_check_1; ?> style="display: none" type="radio" name="chose_tag_image" value="<?php echo $fetches['tag_color_id'] ?>"/>
							</label>
						<?php	$looping_1++; 
						?>
		<?php endwhile; ?>
			<br><br>
							   <!-- <h6 class="one-last-text">Selected Dog Tag Color: <span class="last-red">Purple Anodized Aluminum</span> </h6> -->
						   </div>
						  </div><!-----------------------set-bar-1---------------------------------->
						  <div>
							  <img src="images/red-link.png" class="red-link">
						   <div class="col-sm-2">
							   <img src="images/Untitled-2.png" class="two">
						   </div>
						   <div class="col-sm-10">
							   <h4 class="one-text"><strong>Pick Your Silencer Color</strong></h4>
							 <?php
							 $query = $dog_tag->show_sorted_row_values('silencer_color','silencer_color_id','DESC');
							 while($fetches = mysqli_fetch_assoc($query)):
$looping_2 = 0;
if($looping_2 == 0){
$auto_check_2 = 'checked';
}else{
$auto_check_2 = '';
}
							 ?>
						<label>
		<img style="height:90px;" src="data:image;base64,<?php echo $fetches['silencer_color_image']; ?>" data-tag="data:image;base64,<?php echo $fetches['silencer_color_image']; ?>" class="tag"  data-img ="<?php echo $fetches['silencer_color_id'] ?>">					   		
		<input <?php echo $auto_check_2; ?> style="display: none" type="radio" name="chose_silencer_image" value="<?php echo $fetches['silencer_color_id']; ?>"/>
						</label>
					<?php $looping_2++; ?>
			<?php endwhile; ?>
			<br><br>
						   </div>
						  </div><!-----------------------set-bar--2----- ---------------->
						  </section>









						  <section id="show-second-hidden">
						   <div>
						   <div class="col-sm-2">
							   <img src="images/one.png" class="one">
						   </div>
						   <div class="col-sm-10">
							   <h4 class="one-text"><strong>Pick Your Dog Tag Color</strong></h4>
							   <?php
							    $query = $dog_tag-> show_sorted_row_values('tag_color','tag_color_name','DESC');
							   	while($fetches = mysqli_fetch_assoc($query)):
$looping_3 = 0;
if($looping_3 == 0){
$auto_check_3 = 'checked';
}else{
$auto_check_3 = '';
}
							    ?>
							<label>
			<img id="" style="height:90px;" src="data:image;base64,<?php echo $fetches['tag_color_image']; ?>" data-back="data:image;base64,<?php echo $fetches['tag_color_image']; ?>" class="button-back" data-img ="<?php echo $fetches['tag_color_id'] ?>"/>
			<input <?php echo $auto_check_3; ?> style="display: none" type="radio" name="chose_tag2_image" value="<?php echo $fetches['tag_color_id'] ?>"/>
							</label>
						<?php	$looping_3++; 	?>
		<?php endwhile; ?>
			<br><br>
							   <!-- <h6 class="one-last-text">Selected Dog Tag Color: <span class="last-red">Purple Anodized Aluminum</span> </h6> -->
						   </div>
						  </div><!-----------------------set-bar-1---------------------------------->
						  <div>
							  <img src="images/red-link.png" class="red-link">
						   <div class="col-sm-2">
							   <img src="images/two.png" class="two">
						   </div>
						   <div class="col-sm-10">
							   <h4 class="one-text"><strong>Pick Your Silencer Color</strong></h4>
							 <?php
							 $query = $dog_tag->show_sorted_row_values('silencer_color','silencer_color_id','DESC');
							 while($fetches = mysqli_fetch_assoc($query)):
$looping_4 = 0;
if($looping_3 == 0){
$auto_check_4 = 'checked';
}else{
$auto_check_4 = '';
}
							 ?>
						<label>
		<img style="height:90px;" src="data:image;base64,<?php echo $fetches['silencer_color_image']; ?>" data-tag="data:image;base64,<?php echo $fetches['silencer_color_image']; ?>" class="tag"  data-img ="<?php echo $fetches['silencer_color_id'] ?>">					   		
		<input <?php echo $auto_check_4; ?> style="display: none" type="radio" name="chose_silencer2_image" value="<?php echo $fetches['silencer_color_id']; ?>"/>
						</label>
					<?php	$looping_4++; 	?>
			<?php endwhile; ?>
			<br><br>
						   </div>
						  </div><!-----------------------set-bar--2----- ---------------->
						  </section>









						   <div><!-----------------------new div------------------------>

			

							   <img src="images/red-link.png" class="red-link">
							   <div class="col-sm-12">
								   <div class="col-sm-2">
									   <img src="images/Untitled-3.png" class="three">
							   <p class="avilable">The Available Characters are:</p>
							   <p class="letter">A B C D E F G H I J K L M N O P Q R S T U V W X Y Z 0 1 2 3 4 5 6 7 8 9 & , . - / ( ) @ * + ! ? " ' : ; $ < #</p>
								   </div>
							      <div class="col-sm-5">
									  <section>
										  <div class="cols-sm-12">
								     <img src="images/bar-body/bar-body1.png" class="demo-pic1">
									   <div class="answer-fild answer-field-tag1" data-align="left">
								           <h3 class="ans1" data-tag="ans1"></h3>
										  
										   <h3 class="ans2" data-tag="ans2"></h3>
										   
										   <h3 class="ans3" data-tag="ans3"></h3>
										   
										   <h3 class="ans4" data-tag="ans4"></h3>
										   
										   <h3 class="ans5" data-tag="ans5"></h3>
									   </div>
									     </div><!------------col-sm-12---------------------->
										</section><!-------------section-------------------->
									    <section>
											<div class="cols-sm-12">
											   <div class="col-sm-1">
							                    </div><!-------------section-------------------->
												   <div class="col-sm-8">
													   <h4 class="tag-text">1. Tag Text</h4>

													   <h5>Align 1</h5>
													   	<DIV>
													    <label>
														   <input style="display:none" type="radio" name="ac_tag1_align" value="left"/>
														   <img src="images/menu-bar.png" class="check1">
													   <label>

													   <label>
														   <input style="display:none" type="radio" name="ac_tag1_align" value="center"/>
														   <img src="images/menu-bar1.png" class="check2"> 
													   </label>
													   </DIV>
													    
										<?php echo $line1_name; ?> <br><input type="text" name="ac_tag1_line1" class="input1" maxlength="15" placeholder="<?php echo $line1_placeholder; ?>"><br>
										<?php echo $line2_name; ?> <br><input type="text" name="ac_tag1_line2" class="input2" maxlength="15" placeholder="<?php echo $line2_placeholder; ?>"><br>
										<?php echo $line3_name; ?> <br><input type="text" name="ac_tag1_line3" class="input3" maxlength="15" placeholder="<?php echo $line3_placeholder; ?>"><br>
										<?php echo $line4_name; ?> <br><input type="text" name="ac_tag1_line4" class="input4" maxlength="15" placeholder="<?php echo $line4_placeholder; ?>"><br>
										<?php echo $line5_name; ?> <br><input type="text" name="ac_tag1_line5" class="input5" maxlength="15" placeholder="<?php echo $line5_placeholder; ?>"><br>
                                     			   </div><!---------------------------col--sm--8---------------------------->
											  </div><!------------col-sm-12-------------------->
									     </section><!-------------section-------------------->
								     </div><!----------col-m-5-------------->
								   <div class="col-sm-5">
									  <section>
										  <div class="cols-sm-12">
											  <div class="col-sm-4">
												  <input type="checkbox" name="differ" id="tag-two-enable" class="check-box"><strong> Edit Tag 2</strong>  <br><br><br>
												  <p class="avilable">The Available Characters are:</p>
							   <p class="letter">A B C D E F G H I J K L M N O P Q R S T U V W X Y Z 0 1 2 3 4 5 6 7 8 9 & , . - / ( ) @ * + ! ? " ' : ; $ < #</p>
											  </div>
											  <div class="col-sm-8">
								           <img src="images/bar-body/bar-body1.png" class="demo-pic2">
											   <div class="answer-fild answer-field-tag2" data-align="left" id="answer-fild">
												   <h3 class="ans1" data-tag="ans6" id="ans6"></h3>

												   <h3 class="ans2" data-tag="ans7" id="ans7"></h3>

												   <h3 class="ans3" data-tag="ans8" id="ans8"></h3>

												   <h3 class="ans4" data-tag="ans9" id="ans9"></h3>
												   
												   <h3 class="ans5" data-tag="ans10" id="ans10" ></h3>
											   </div>
									      </div><!------------col-sm-12-------------------->
										</section><!-------------section-------------------->
									    <section>
											<div class="cols-sm-12">
											    <div class="col-sm-4">
						                        </div><!-------------col-sm-1-------------------->
												   <div class="col-sm-8">
													   <h4 class="tag-text">2. Tag Text</h4>
													   <h5>Align 2</h5>
												<div>
													   <label>
														   <input style="display:none" type="radio" name="ac_tag2_align" value="left"/>
														   <img src="images/menu-bar.png" class="check1">
													   <label>
													   <label>
														   <input style="display:none" type="radio" name="ac_tag2_align" value="center"/>
														   <img src="images/menu-bar1.png" class="check2"> 
													   </label>
												</div>
												
								<?php echo $line1_name; ?> <br><input type="text" name="ac_tag2_line1" class="input1" maxlength="15" id="input6" placeholder="<?php echo $line1_placeholder; ?>"><br>
								<?php echo $line2_name; ?> <br><input type="text" name="ac_tag2_line2" class="input2" maxlength="15" id="input7" placeholder="<?php echo $line2_placeholder; ?>"><br>
								<?php echo $line3_name; ?> <br><input type="text" name="ac_tag2_line3" class="input3" maxlength="15" id="input8" placeholder="<?php echo $line3_placeholder; ?>"><br>
								<?php echo $line4_name; ?> <br><input type="text" name="ac_tag2_line4" class="input4" maxlength="15" id="input9" placeholder="<?php echo $line4_placeholder; ?>"><br>
								<?php echo $line5_name; ?> <br><input type="text" name="ac_tag2_line5" class="input5" maxlength="15" id="input10" placeholder="<?php echo $line5_placeholder; ?>"><br><br>
												   </div><!---------------------------col--sm--8---------------------------->
											</div><!------------col-sm-12-------------------->
									    </section><!-------------section-------------------->
								   </div><!----------col-m-5-------------->
							   </div><!---------------col-sm-12-------------->
						   
						   </div><!-----------------------new div end---------------------->
						  </div><!-----------------------set-bar--3---------------------->
					   </div>
		           </div>
				</div>
			 </div>
		 </section><!----------------------section--step--2---------------------------------------------->
		 <section id="main-body">
		     <div class="conatiner-fluid">
			    <div class="row">
				   <div class="col-sm-12" >
					   <div class="col-sm-2">
					   </div>
					   <div class="col-sm-8" id="setp-two">
						  <div>
						   <div class="col-sm-2">
							   <img src="images/Untitled-4.png" class="one">
						   </div>
						   <div class="col-sm-10">
							   <div class="col-sm-5">
							   </div>
							   <div class="col-sm-1">

								   <h1 class="price">$<?php echo price; ?></h1>

							   </div><!--------------armanchange------------>
                               <div class="col-sm-2">

								   <h5 class="price-qut-name">Qty:<input type="text" name="e_quantity" id="e_input-size" value="1"/></h5>


							   </div>
							   <div class="col-sm-4">
							   <input type="hidden" name="hidden_test" id="hidden_test" />
							      <!-- <img src="images/cart-button.JPG" > -->
							      <input  type="submit" name="ac_submit_for_cart" class="cart-button" id="add-tocart-btn" value="" style="width:176px;height:49px;background:url('images/cart-button.JPG');">
							      <!-- type="submit" -->
							   </div>
						   </div>
						  </div>
					   </div>
		           </div>
				</div>
			 </div>
			</form>
		 
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
