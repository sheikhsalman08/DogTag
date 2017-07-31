<?php
	require('../functions.php');
	

	// if(isset($_SERVER['HTTP_REFERER'])){
	// 	if($_SERVER['HTTP_REFERER'] == 'localhost'){
	// 	echo "kaj kore";
	// 	}
	// }

if(!isset($_COOKIE['dog_tag_payment_acceptance'])){
	 header('Refresh: 0;url=../index.php');
}else{
	header('Refresh: 0;url=../index.php');
	if(isset($_GET['products']) && !isset($_GET['new_tag_user'])){
	$limit = $_GET['products'];
	echo $limit;
	$dog_tag->update_any_field('orders','order_status','Payment Done','order_user_id',user_id,'order_id','DESC',$limit);

	}elseif(isset($_GET['new_tag_user']) && !isset($_GET['products'])){
        $dog_tag->update_any_field('users','user_type','1','user_id',$_GET['new_tag_user'],'user_id','DESC','1');

	$dog_tag->update_into_table_by_id2('users','in_time',strtotime('0 years'),'user_id',$_GET['new_tag_user']);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Payment Successful</title>
</head>
<body>
	<h1>Thank You for buying from dog_tag</h1>
	<p>You will get your product soon..</p>
	<a href="../index.php">Back to home</a>
	<?php
	// header('Refresh: 1;url=../index.php');
	?>
</body>
</html>
