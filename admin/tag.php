<?PHP 
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
	<section>
		<h3 class="upload-text">See all the tags and silencer here.</h3>
	  <div class="container">
		  <div class="row">
		     <div class="col-sm-12">
			      <table style="width:100%">
					  <tr class="upload-text">
						<th>Tag name</th>
						<th>Tag Image</th>
						<th></th>
					  </tr>
					 <?php
					 $query = $dog_tag->show_sorted_row_values('tag_color','tag_color_id','DESC');
					 while($fetches = mysqli_fetch_assoc($query)) :
					  ?>
					  <tr class="upload-text">
						<td><?php echo $fetches['tag_color_name']; ?></td>
						<td><?php echo $fetches['tag_color_id']; ?></td>
						<td><img style="height:70px;" src="data:image;base64,<?php echo $fetches['tag_color_image']; ?>" /></td>
					<form method="post">
						<input type="hidden" name="tag_hidden" value="<?php echo $fetches['tag_color_id'] ?>"/>
						<td><button type="submit" name="submit_tag" class="btn btn-info btn-lg">Delete</button></td>
					</form>						
					  </tr>
					<?php endwhile; ?>
					<?php 
					  	if(isset($_POST['submit_tag'])){
					  		$dog_tag->delete_from_table_by_id('tag_color','tag_color_id',$_POST["tag_hidden"]);
					  		header("Refresh:0; url=tag.php");
					  	}
					  ?>
			 </div>
		  </div>
	  </div>
	</section>
	
    <section>
	  <div class="container">
		  <div class="row">
		     <div class="col-sm-12">
			      <table style="width:100%">
					  <tr class="upload-text">
						<th>  Silencer name</th>
						<th> Silencer color</th>
						<th></th>
					  </tr>
					  <hr>
					  <hr>
					  <hr>
					  <?php 
					  	$query = $dog_tag->show_sorted_row_values('silencer_color','silencer_color_id','DESC');
					  while($fetches = mysqli_fetch_assoc($query)) : 
					  ?>
					  <tr class="upload-text">
						<td><?php echo $fetches['silencer_color_name'] ?></td>
						<td><?php echo $fetches['silencer_color_id'] ?></td>
					<form method="post">
						<td><img style="height:70px;" src="data:image;base64,<?php echo $fetches['silencer_color_image'] ?>" /></td>
						<td><button type="submit" name="silencer_delete" class="btn btn-info btn-lg">Delete</button></td>
						<input type="hidden" name="hidden_silencer" value="<?php echo $fetches['silencer_color_id'] ?>" />
						</form>
					  </tr>
					<?php endwhile; ?>
					<?php 
					if(isset($_POST['silencer_delete'])){
						$dog_tag->delete_from_table_by_id('silencer_color','silencer_color_id',$_POST["hidden_silencer"]);
							header("Refresh:0; url=tag.php");
					}
					?>
                   </table>

			 </div>
		  </div>
	  </div>
	</section>
</body>
</html>