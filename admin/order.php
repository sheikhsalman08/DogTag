<?php require('../functions.php');
	 if(empty($_SESSION['admin_id'])) {
 	header("Refresh:0; url=security.php");
 }
?>

<!DOCTYPE html>
<php>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	    <link href="style.css" rel="stylesheet">
		<script src="js/main.js"></script>
        <script src="js/order.js"></script>
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
	
	<div id="accordion" role="tablist" aria-multiselectable="true">
	  <div class="card">
	  
         
       <?php
	$query = $dog_tag->show_sorted_row_values('orders','order_id','DESC');
	while($fetches = mysqli_fetch_assoc($query)) :
	?>
	<?php 
		$tag1_color_name = $fetches['order_tag1_color_id'];
	$tag1_color_name = $dog_tag->getting_data_by_another_field('tag_color','tag_color_name','tag_color_id',$tag1_color_name);
	

		$tag2_color_name = $fetches['order_tag2_color_id'];
		$tag2_color_name = $dog_tag->getting_data_by_another_field('tag_color','tag_color_name','tag_color_id',$tag2_color_name);

		$silencer1_color_name= $fetches['order_silencer1_color_id'];
		$silencer1_color_name = $dog_tag->getting_data_by_another_field('silencer_color','silencer_color_name','silencer_color_id',$silencer1_color_name);

		$silencer2_color_name= $fetches['order_silencer1_color_id'];
		$silencer2_color_name = $dog_tag->getting_data_by_another_field('silencer_color','silencer_color_name','silencer_color_id',$silencer2_color_name);
		

			$order_user_type = $fetches['order_user_type'];
			// $order_user_type = $dog_tag->getting_data_by_another_field('users','user_type','user_id',$order_user_type);
	if($order_user_type == 3){
		$order_user_type = 'guest';
	}elseif($order_user_type == 2){
		$order_user_type = 'Logged-In';
	}elseif($order_user_type == 1){
		$order_user_type = 'Dog-Member';
	}
		
	?>
          <section>
			    <div class="card-header" role="tab" id="headingOne">
			      <h5 class="mb-0">
			        <table  style="width:100%">
			          
								  <tr class="upload-text">
									<th>Serial num</th>
									<th>user name</th>
									<th>Tag1 color name</th>
									<th>silencer1 color name</th>
									<th>Tag2 color name</th>
									<th>silencer2 color name</th>

									<th>Price</th>
									<th>order user type</th>
									<th>User e-mail</th>
									<th>City</th>
									
								  </tr>
								  <tr class="upload-text">
									<td><?php echo $fetches['order_id'];  ?></td>
									<td><?php echo $fetches['order_user_first_name']; ?>  <?php echo $fetches['order_user_last_name'];  ?></td>

									<td><?php echo $tag1_color_name; ?></td>
									<td><?php echo $silencer1_color_name; ?></td>
									<td><?php echo $tag2_color_name; ?></td>
									<td><?php echo $silencer2_color_name; ?></td>

									<td><?php echo $fetches['order_price'];  ?></td>
									<td><?php echo $order_user_type;  ?></td>
									<td><?php echo $fetches['order_user_email'];  ?></td>
									<td><?php echo $fetches['order_user_city'];  ?></td>
								  </tr>
			        </table>
			      </h5>
			    </div>

			   <div id="collapseOne" class="boss">
			      <div class="card-block">
					  <div class="container-fluid">
					    <div class="row">
						   <div class="col-sm-12" >
							  <div class="col-sm-6">
							   		<div class="col-sm-6">
							   			<h6 class="product-color-text">Align 1: <span style="text-transform:uppercase">
								   			<?php 
								   					if(empty($fetches['order_tag1_text_align'])){
								   						echo "Left";
								   					}else{
								   			echo $fetches['order_tag1_text_align']; }?>
							   			</span></h6>
								 		<h6 class="product-color-text">Line 1: <span style="text-transform:uppercase"><?php echo $fetches['order_tag1_line1_text']; ?></span></h6>
										<h6 class="product-color-text">Line 2: <span style="text-transform:uppercase"><?php echo $fetches['order_tag1_line2_text']; ?></span></h6>
										<h6 class="product-color-text">Line 3: <span style="text-transform:uppercase"><?php echo $fetches['order_tag1_line3_text']; ?></span></h6>
										<h6 class="product-color-text">Line 4: <span style="text-transform:uppercase"><?php echo $fetches['order_tag1_line4_text']; ?></span></h6>
										<h6 class="product-color-text">Line 5: <span style="text-transform:uppercase"><?php echo $fetches['order_tag1_line5_text']; ?></span></h6>
								  	</div>
							   
							   <div class="col-sm-6">
							   		 <h6 class="product-color-text">Align 2: <span style="text-transform:uppercase">
							   		 <?php 
								   					if(empty($fetches['order_tag2_text_align'])){
								   						echo "Left";
								   					}else{
								   			echo $fetches['order_tag2_text_align']; }?>
							   		 </span></h6>
								     <h6 class="product-color-text">Line 1: <span style="text-transform:uppercase"><?php echo $fetches['order_tag2_line1_text']; ?></span></h6>
									<h6 class="product-color-text">Line 2: <span style="text-transform:uppercase"><?php echo $fetches['order_tag2_line2_text']; ?></span></h6>
									<h6 class="product-color-text">Line 3: <span style="text-transform:uppercase"><?php echo $fetches['order_tag2_line3_text']; ?></span></h6>
									<h6 class="product-color-text">Line 4: <span style="text-transform:uppercase"><?php echo $fetches['order_tag2_line4_text']; ?></span></h6>
									<h6 class="product-color-text">Line 5: <span style="text-transform:uppercase"><?php echo $fetches['order_tag2_line5_text']; ?></span></h6>
							   </div>
							</div>
							    <div class="col-sm-6">
				       				<table style="width:100%">
										  <tr class="upload-text">												  <th>order time</th>
												<th>user telephone</th>
												<th>user City + zip</th>
										  </tr>
										  <tr class="upload-text">
<?php 
$time=date('Y-m-d',$fetches['order_time']);
?>
												<td><?php echo $time; ?></td>
												<td><?php echo $fetches['Telephone'];  ?></td>
												<td>
													<?php echo $fetches['order_user_city']; ?>::
													<?php echo $fetches['order_user_zip_id']; ?>
												</td>
										  </tr>
									</table>
							   </div>


							   <div class="col-sm-6">
				       				<table style="width:100%">
										  <tr class="upload-text">
												<th>Order Quantity</th>
												<th>order State</th>
												<th>user ADDRES</th>
										  </tr>
										  <tr class="upload-text">
												<td><?php echo $fetches['order_quantity']; ?></td>
<?php 
$time=date('Y-m-d',$fetches['order_time']);
?>
												<td><?php echo $fetches['order_user_state']; ?></td>
												<td><?php echo $fetches['order_user_ADDRES'];  ?></td>
										  </tr>
									</table>
							   </div>



						   </div><!----------------------------first-line---------------------->
                            
						 </div>			<!-- end of row -->
					  </div>		<!-- end of container-fluid -->
			      </div> 		<!-- end of card-block -->
			    </div>		<!-- end of collapse in -->
              </section><!---------------------------section-one------------------------------>
              <?php
              	if($fetches['order_status'] == "Payment Done"){
              		$styles = 'style="background-color:green"';
              	}else{
              		$styles = 'style="background-color:grey"';
              	}
              ?>
              <div style="display: inline-flex;">
          <form method="post" action="#">
											<input <?php echo $styles; ?> type="submit" value="<?php echo $fetches['order_status']; ?>" />
										</form> 
			<?php
				if(isset($_POST['delete_order'])){
					$dog_tag->delete_from_table_by_id('orders','order_id',$_POST['hidden_delete_id']);
					header("Refresh: 0; url=order.php");
				}
			?>
			<form method="post" action="#">
				<input type="hidden" name="hidden_delete_id" value="<?php echo $fetches['order_id']; ?>"/>
				<input style="background-color:red; margin-left:30px" type="submit" name="delete_order" value="DELETE FROM LIST"/>
			</form>
			</div>
										<hr>
	
<?php endwhile; ?>



        
  </div>		<!-- end cart -->
</div>		<!-- end all div -->


</body>
</php>