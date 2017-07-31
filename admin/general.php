<?php
	require('../functions.php');
 if(empty($_SESSION['admin_id'])) {
 	header("Refresh:0; url=security.php");
 }
	$query = $dog_tag->show_sorted_row_values('general','general_id','DESC');
	while($fetches = mysqli_fetch_assoc($query)){
	$contact_email = $fetches['email'];
	$contact_number = $fetches['phone_num'];
	$admin_adress = $fetches['ADDRES'];
	$shipping_discount =$fetches['shipping_dis'];
	$current_prize_of_tag = $fetches['tags_prize'];
	$club_members_discount = $fetches['premium_dis'];
	$shipping_charge = $fetches['shipping_charge'];
	$paypal_email = $fetches['paypal_email'];
	$take_down_site = $fetches['take_down_site'];
}

?>
<!DOCTYPE html>
<html>
	<head>
	<style>
		body{
			color: aliceblue !important;	
		}
		input ,textarea {
			background: #181717;
		}
        input[type="submit"] {
    margin-top: 20px;
    width: 100px;
    border-radius: 10px;
    height: 30px;
    border: 1px solid black;
}
        input {
    border: 1px solid black;
    border-radius: 4px;
}
        textarea {
    border: 1px solid black;
}
        label {
    font-family: -webkit-pictograph;
    font-size: 20px;
    color: #ecebe7;
}
	</style>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	    <link href="style.css" rel="stylesheet">
		<script src="js/main.js"></script>
        
	</head>
<body>
			<ul class="topnav" id="myTopnav">
			  <li><a class="active" href="index.php">Upload Page</a></li>
			  <li><a href="order.php">order page</a></li>
			  <li><a href="general.php">General</a></li>
			  <li><a href="message.php">Message</a></li>
			  <li><a href="tag.php">Tags & Silencers</a></li>
			  <li><a href="users.php">Users</a></li>	
  <li><a href="admin_log_out.php">log_out</a></li>	
			  <li class="icon">
			    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
			  </li>
			</ul>
	<div style="padding:20px 0px 20px 40px">
			<section>
               
			<?php 
				if(isset($_POST['logo_submitter'])){
					if(!empty($_FILES['logo_uploader'])){
$logo_image = addslashes($_FILES['logo_uploader']['tmp_name']);
$logo_image = file_get_contents($logo_image);
$logo_image = base64_encode($logo_image);
		$dog_tag->input_general_settings('logo',$logo_image);
					}else{
						echo "no file chosen";
					}	//if file uploaded
				}		//if submit logo upload
			 ?>




				<form method="post" enctype = "multipart/form-data">
					<label>Upload logo</label>
					<input type="file" name="logo_uploader"/>
					<input type="submit" name="logo_submitter"/>
				</form><br>
<?php 
$query = $dog_tag->show_sorted_row_values('general','general_id','ASC');
while($fetches = mysqli_fetch_assoc($query)) :
?>
<div class="col-sm-2 logo-pic" >
<img style="width:60px;" src="data:image;base64,<?php echo $fetches['logo']; ?>">
</div><br><br><br>
<?php endwhile; ?>
                         
                         
			</section>
				<hr>
			<section>
                <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-12">
			<?php
				if(isset($_POST['slider_image_submit'])){
					if(isset($_FILES['slider_image']['tmp_name'])){
					$slide = $_FILES['slider_image']['tmp_name'];
					$slide = addslashes($slide);
					$slide = file_get_contents($slide);
					$slide = base64_encode($slide);
					$slider_link_text = $_POST['slider_link_uploader'];
						$dog_tag->insert_into_table("
							INSERT INTO slider_images (slider_image,slider_link) VALUES('$slide','$slider_link_text')
							");
					}else{
						echo "fill the form first";
					}	//	if/else image uplaoded
				}	//	if iset submit
			?>
				<form method="post" enctype="multipart/form-data">
					<label>Upload Slider image</label><br>
					<label>Url </label>
					<input type="text" name="slider_link_uploader"/>
					<input type="file" name="slider_image"/>
					<input type="submit" name="slider_image_submit"/>
				</form>
			<?php 
				$query = $dog_tag->show_sorted_row_values('slider_images','slider_image_id','DESC');
				while($fetches = mysqli_fetch_assoc($query)) :
			?>
			<?php if(isset($_POST['delete_slide'])){
					// $dog_tag->delete_from_table_by_id('slider_images',$_POST['hidden_delete_slide']);
				$dog_tag->delete_from_table_by_id('slider_images','slider_image_id',$_POST["hidden_delete_slide"]);
				header("Refresh:0; url=general.php");
				}		//if delete_slide
			 ?>
                   
				<img style="width:100px; height:80px;margin-top:10px"  src="data:image;base64,<?php echo $fetches['slider_image']; ?>" />
                    
                         
			<form method="post">
				<input type="hidden" name="hidden_delete_slide" value="<?php echo $fetches['slider_image_id'] ?>"/>
				<input type="submit" name="delete_slide" value="Delete" style="background-color: red"/>
			</form>
			<?php endwhile; ?>
                            
                         
                         </div>
                   </div>
                </div>

			</section><!-----------------------section------------>
				<hr>
			<section>
			<?php
				if(isset($_POST['submit_email'])){
					if(isset($_POST['email'])){
						$dog_tag->input_general_settings('email',$_POST['email']);
					}else{
						echo "fill the form up";
					}	//	if/else isset email
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>Type your contact email</label>
					<input type="email" name="email" value="<?php echo $contact_email; ?>"/>
					<input type="submit" name="submit_email">
				</form>
			</section>
				<hr>
			<section>
			<?php
				if(isset($_POST['submit_num'])){
					if(isset($_POST['phone_num'])){
						$dog_tag->input_general_settings('phone_num',$_POST['phone_num']);
					}else{
						echo "fill the form up";
					}	//	if/else isset phn num
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>Type your contact number</label>
					<input type="text" name="phone_num" value="<?php echo $contact_number; ?>"/>
					<input type="submit" name="submit_num">
				</form>
			</section>
				<hr>
			<section>
			<?php
				if(isset($_POST['ADDRES_submit'])){
					if(isset($_POST['ADDRES'])){
						$dog_tag->input_general_settings('ADDRES',$_POST['ADDRES']);
					}else{
						echo "fill the form up";
					}	//	if/else isset shipping_charge
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>Type your ADDRES</label>
					<textarea type="text" name="ADDRES"><?php echo $admin_adress; ?></textarea>
					<input type="submit" name="ADDRES_submit">
				</form>
			</section>
				<hr>
			<section>
			<?php
				if(isset($_POST['shipping_dis_submit'])){
					if(isset($_POST['shipping_dis'])){
						$dog_tag->input_general_settings('shipping_dis',$_POST['shipping_dis']);
					}else{
						echo "fill the form up";
					}	//	if/else isset shipping_charge
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>Free shipping discount</label><br>
					<?php 
					if($shipping_discount == 1){
						$check_1 = 'checked';
						$check_2 =  '';
					}else{
						$check_1 = '';
						$check_2 =  'checked';
					}
						
					?>
					<label>On</label>
					<input type=radio name="shipping_dis" value="1" <?php echo $check_1; ?>/>
					<label>Off</label>
					<input type=radio name="shipping_dis" value="2" <?php echo $check_2; ?>/>
					<input type="submit" name="shipping_dis_submit">
				</form>
			</section>
				<hr>
			<section>
			<?php
				if(isset($_POST['current_prize_submit'])){
					if(isset($_POST['tags_prize'])){
						$dog_tag->input_general_settings('tags_prize',$_POST['tags_prize']);
					}else{
						echo "fill the form up";
					}	//	if/else isset shipping_charge
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>What is the current prize of tags</label>
					<input type="text" name="tags_prize" value="<?php echo $current_prize_of_tag; ?>" />
					<input type="submit" name="current_prize_submit">
				</form>
			</section>
				<hr>
			<section>
			<?php
				if(isset($_POST['premium_dis_submit'])){
					if(isset($_POST['Premium_customer_dis'])){
						$dog_tag->input_general_settings('premium_dis',$_POST['Premium_customer_dis']);
					}else{
						echo "fill the form up";
					}	//	if/else isset shipping_charge
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>How much discount you are giving to Dog tag members</label>
					<input type="text" name="Premium_customer_dis" value="<?php echo $club_members_discount; ?>%" />
					<input type="submit" name="premium_dis_submit">
				</form>
			</section>
				<hr>
			<section>
			<?php
				if(isset($_POST['shipping_charge_submit'])){
					if(isset($_POST['shipping_charge'])){
						$dog_tag->input_general_settings('shipping_charge',$_POST['shipping_charge']);
					}else{
						echo "fill the form up";
					}	//	if/else isset shipping_charge
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>What is the shipping charge</label>
					<input type="text" name="shipping_charge" value="<?php echo $shipping_charge; ?>" />
					<input type="submit" name="shipping_charge_submit">
				<form>
			</section>
			<hr>
			<section>
			<?php
				if(isset($_POST['add_paypal_email'])){
					if(isset($_POST['paypal_email'])){
						$dog_tag->input_general_settings('paypal_email',$_POST['paypal_email']);
					}else{
						echo "fill the form up";
					}	//	if/else isset shipping_charge
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>Paypal Email</label>
					<input type="text" name="paypal_email" value="<?php echo $paypal_email; ?>" />
					<input type="submit" name="add_paypal_email">
				<form>
			</section>
			<hr>
			<section>
			<?php
				if(isset($_POST['turn_site_down'])){
					if(isset($_POST['turn'])){
						$dog_tag->input_general_settings('take_down_site',$_POST['turn']);
					}else{
						echo "fill the form up";
					}	//	if/else isset shipping_charge
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>Take Down Your Site</label><br>
					<?php 
						if($take_down_site == 1){
							$take_down = 'checked';
							$keep_on = '';
						}else{
							$take_down = '';
							$keep_on = 'checked';
						}
					?>
					<label>On</label>
					<input type=radio name="turn" value="1" <?php echo $take_down; ?>/>
					<label>Off</label>
					<input type=radio name="turn" value="2" <?php echo $keep_on; ?>/>
					<input type="submit" name="turn_site_down">
				</form>
			</section>
				<hr>


				<section>
			<?php
				if(isset($_POST['facebook_link_submit'])){
					if(isset($_POST['facebook_link'])){
						$dog_tag->input_general_settings('facebook_link',$_POST['facebook_link']);
					}else{
						echo "fill the form up";
					}	//	if/else isset shipping_charge
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>Facebook page link</label>
					<textarea type="text" name="facebook_link"><?php echo $facebook_link; ?></textarea>
					<input type="submit" name="facebook_link_submit">
				</form>
			</section>
				<hr>
			<section>

			<section>
			<?php
				if(isset($_POST['header_background_color_submit'])){
					if(isset($_POST['header_background_color'])){
						$dog_tag->input_general_settings('header_background_color',$_POST['header_background_color']);
					}else{
						echo "fill the form up";
					}	//	if/else isset shipping_charge
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>Chose Background Color For Header Part</label>
					<input type="color" name="header_background_color" value=<?php echo $header_background_color; ?> />
					<input type="submit" name="header_background_color_submit">
				</form>
			</section>
				<hr>
			<section>

			<section>
			<?php
				if(isset($_POST['header_text_color_submit'])){
					if(isset($_POST['header_text_color'])){
						$dog_tag->input_general_settings('header_text_color',$_POST['header_text_color']);
					}else{
						echo "fill the form up";
					}	//	if/else isset shipping_charge
					header("Refresh:0; url=general.php");
				}		//if submitted
			?>
				<form method="post">
					<label>Chose Color For Header Text</label>
					<input type="color" name="header_text_color" value=<?php echo $header_text_color; ?> />
					<input type="submit" name="header_text_color_submit">
				</form>
			</section>
				<hr>
			<section>
				<hr>
			<section>

	</div>
</body>
</html>