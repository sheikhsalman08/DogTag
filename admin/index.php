<?php
	require('../functions.php');
 if(empty($_SESSION['admin_id'])) {
 	header("Refresh:0; url=security.php");
 }
 ?>
<!DOCTYPE html>
<html>
	<head>
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
	<section >
	  <div class="container">
		  <div class="row">
		     <div class="col-sm-12">
			      <h3 class="upload-text">upload Tag</h3><br>
			      	  <?php 
			      $tag_name="";
			      $tag_pic ="";
			      	if(isset($_POST['submit_tag'])){
			      		if(!empty($_POST['tag_name']) && $_FILES['tag_pic']['tmp_name']){
 						$tag_image = addslashes($_FILES['tag_pic']['tmp_name']);
							$tag_image = file_get_contents($tag_image);
							$tag_image = base64_encode($tag_image);

			      			$dog_tag->insert_into_table("
			      			INSERT INTO tag_color (tag_color_name,tag_color_image) VALUES('".$_POST['tag_name']."','$tag_image');
			      			"); 
			      			$tag_name= $_POST['tag_name'];
			      			$tag_pic = $_FILES['tag_pic']['name'];
			      		}else{
			      		  echo "You need to fill up all the forms"; 
			      		}	//end of if/else of ifnot submit tag name or image
			      	}
			      ?>
					 
					 <form action="" method="POST" enctype = "multipart/form-data" >
					   <h4 class="upload-text">Name:</h4>
					  <input type="text" name="tag_name" value="<?php echo $tag_name ?>">
					  <br>
					  <h4 class="upload-text">Image:</h4>
					  <input type="file" name="tag_pic" accept="image/*" class="upload-image">
						<br>
					  <input type="submit" name="submit_tag" value="SUBMIT">
					</form>
<!-- 2nd part -->
<!-- 2nd part -->
<!-- 2nd part -->
<!-- 2nd part -->
<hr>
			      <?php 
			      $silencer_name="";
			      $silencer_pic ="";
			      	if(isset($_POST['submit_silencer'])){
			      		if(!empty($_POST['silencer_name']) && !empty($_FILES['silencer_pic'])){

 						$silencer_image = addslashes($_FILES['silencer_pic']['tmp_name']);
							$silencer_image = file_get_contents($silencer_image);
							$silencer_image = base64_encode($silencer_image);
			      			$dog_tag->insert_into_table("
			      			INSERT INTO silencer_color (silencer_color_name,silencer_color_image) VALUES('".$_POST['silencer_name']."','$silencer_image');
			      			
			      			"); 
			      			$silencer_name= $_POST['silencer_name'];
			      			$silencer_pic = $_FILES['silencer_pic']['name'];
			      		}else{
			      		  echo "You need to fill up all the forms"; 
			      		}	//end of if/else of ifnot submit silencer name or image
			      	}
			      ?>
			      <h3 class="upload-text">Upload Silencer</h3><br>
					<form action="" method="POST" enctype = "multipart/form-data" >
					  <h4 class="upload-text">Name:</h4>
					  <input type="text" name="silencer_name" value="<?php echo $silencer_name; ?>">
					  <br>
					  <h4 class="upload-text">Image:</h4>
					  <input type="file" name="silencer_pic" accept="image/*" class="upload-image" title=" " >
					  <br>
					  <input type="submit" name="submit_silencer" value="SUBMIT">
					 </form>
			 </div>
		  </div>
	  </div>
	</section>

</body>
</php>