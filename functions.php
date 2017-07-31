<?php 
	session_start();
	ob_start();
	require_once('classes.php');
	// error_reporting(0);
	
	/*
		while in localhost
	*/
//  	$dog_tag = new dog_ruff('localhost','root','');
//  	$dog_tag -> create_database('dog_tag');
// define("website_url","localhost/dog_tag/index.php");

        /*
		while in moldur
	*/
//  	 $dog_tag = new dog_ruff('localhost','moldu461_salman','salman');
//  	 $dog_tag -> create_database('moldu461_salman');
// define("website_url","http://moldurexpress.com/dog_tag/index.php");

	/*
		while in dogxtar.com
	*/
 	$dog_tag = new dog_ruff('quasar','ruff','rotorway');
 	$dog_tag -> create_database('dogtest');
define("website_url","http://dogxtar.com/index.php");

		

 	// default values
 	if(!isset($_COOKIE['guest']) && !isset($_SESSION['user_id'])){
 		define("user_type",0);
 		define("user_id","0");
 		define("user_email","0");
 		define("user_name","0");
 	}
	 require_once('auto_create_table.php');

 	$query = $dog_tag->show_sorted_row_values('users','user_id','DESC');

 	while($fetches = mysqli_fetch_assoc($query)){

 	if($fetches['user_type'] == 1 && $fetches['in_time'] != 0){
 		if(strtotime('0 years') - $fetches['in_time'] >= 120){
 			
 		$dog_tag->update_into_table_by_id2('users','in_time','0','user_id',$fetches['user_id']);
 		$dog_tag->update_into_table_by_id2('users','user_type','2','user_id',$fetches['user_id']);
 	}
 }

 	}


 	// default values
 	if(isset($_SESSION['user_id'])){
 	$user_name = $dog_tag->getting_data_by_another_field('users','user_name','user_id',$_SESSION['user_id']);
	define("user_name","$user_name");
	define("user_id",$_SESSION['user_id']);

	$user_type = $dog_tag->getting_data_by_another_field('users','user_type','user_id',$_SESSION['user_id']);
	define("user_type","$user_type");

	$user_email = $dog_tag->getting_data_by_another_field('users','user_email','user_id',$_SESSION['user_id']);
	define("user_email",$user_email);
}else{
	if(!isset($_COOKIE['guest'])){
	setcookie("guest",$_SERVER['REQUEST_TIME'],time()+33333);
	header("Refresh:0");
	}
	if(isset($_COOKIE['guest']) && !isset($_SESSION['user_id'])){
	$user_email = $_COOKIE['PHPSESSID'];
	define("user_email",$user_email);
	}
	if(isset($_COOKIE['guest'])){
		define("user_name","");
		$user_id = $dog_tag->getting_data_by_another_field(
				'users','user_id','user_email',user_email
			);
		define("user_id",$user_id);	
		if(isset($_COOKIE['PHPSESSID']) && !($dog_tag->email_existance('users','user_email',$_COOKIE['PHPSESSID'])) ){
		$dog_tag->insert_into_table("
		INSERT INTO users (user_email,user_name,user_type) VALUES('".$_COOKIE['PHPSESSID']."','".$_COOKIE['guest']."',3);
		");	
		}else{
			//type what if neither log-in neither set cookie
		}
		define("user_type",3);
 	}
}	


$number_of_cart = "0";
$query = $dog_tag->show_sorted_value_of_user('carts','cart_user_id',user_id,'cart_id','DESC');
while($fetches = mysqli_fetch_assoc($query)){
	$number_of_cart++;
}
define('number_of_cart',$number_of_cart);
// djfsldsdfsdfdfds
	$query = $dog_tag->show_sorted_row_values('general','general_id','DESC');
	while($fetches = mysqli_fetch_assoc($query)){
	$contact_email = $fetches['email'];
	$contact_number = $fetches['phone_num'];
	$admin_adress = $fetches['ADDRES'];
	$shipping_discount =$fetches['shipping_dis'];
	$current_prize_of_tag = $fetches['tags_prize'];
	$club_members_discount = $fetches['premium_dis'];
	$single_shipping_charge = $fetches['shipping_charge'];
	$paypal_email = $fetches['paypal_email'];
	$facebook_link = $fetches['facebook_link'];
	$header_background_color = $fetches['header_background_color'];
	$header_text_color = $fetches['header_text_color'];
	
}

// pricing 

$total_quantity = "0";
$query = $dog_tag->show_sorted_value_of_user('carts','cart_user_id',user_id,'cart_id','DESC');
while($fetches = mysqli_fetch_assoc($query)){
	$total_quantity = $total_quantity + $fetches['cart_quantity'];
}
if(user_type == 2 || user_type == 3){

	$price = $current_prize_of_tag;
	$total_price = $price*$total_quantity;
	if($shipping_discount == 2){
	$total_shipping_charge = $total_quantity * $single_shipping_charge;
	}else{
		$total_shipping_charge = 0;
	}
}elseif(user_type == 1){

	$givne_discount = ($current_prize_of_tag * $club_members_discount) / 100;
	$price = $current_prize_of_tag - $givne_discount;
	$total_price = $price*$total_quantity;
	$single_shipping_charge = 0;
	$total_shipping_charge = 0;

}

define("price",$price);

define('total_shipping_charge',$total_shipping_charge);
define('total',$total_price);
define('sub_total',total+total_shipping_charge);

//single cart price
$query = $dog_tag->show_sorted_row_values('carts','cart_id','DESC');
while($fetches = mysqli_fetch_assoc($query)){
	$this_cart_id = $fetches['cart_id'];
	$this_user_price = price;
	$this_cart_price = $fetches['cart_price'];
	$this_cart_quantity = $fetches['cart_quantity'];
	$should_be_price = $this_user_price * $this_cart_quantity;
	if($this_user_price * $this_cart_quantity != $this_cart_price){
		$dog_tag->update_into_table_by_id2('carts','cart_price',$should_be_price,'cart_id',$this_cart_id);
	}
}




if($dog_tag->email_existance('general','take_down_site',1) == true) :
	$display = "none";


 endif; ?>


