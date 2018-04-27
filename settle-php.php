<?php  
//    http://localhost/8888/settle-php.php
$url = $_SERVER['HTTP_REFERER'];
$rqst_host_name = parse_url($url, PHP_URL_HOST);
// echo $url;
// echo $rqst_host_name;

if(isset($url) && ($rqst_host_name=="http://moldurexpress.com")){
  setcookie("dog_tag_payment_acceptance","3",time()+3360);
}else{
  // Header("Location:../8888/index.php");
}



    require('functions.php');

          if(isset($_POST['checkout_submit'])){

          
          $order_user_email = $_POST["order_email"];
          $order_user_first_name = $_POST["order_f_name"];
          $order_user_last_name = $_POST["order_l_name"];
          $Telephone = $_POST["telephone"];
          $order_state = $_POST["order_state"];
          $order_user_zip_id = $_POST["order_zip"];
          $order_user_city = $_POST["order_city"];
          $order_user_ADDRES =$_POST[ "order_ADDRES"];
          $order_time = strtotime("now");
          $order_status = "Payment Pending";
  }
  
          
 
$how_many_products_on_cart = 0;

       $query = $dog_tag->show_sorted_value_of_user('carts','cart_user_id',user_id,'cart_id','DESC');
       while($fetches = mysqli_fetch_assoc($query)){

$order_price = $fetches['cart_price']+$fetches['cart_quantity'];
$dog_tag->delete_from_table_by_id('carts','cart_id',$fetches["cart_id"]);
$how_many_products_on_cart++;

       	echo "<br>";
          $dog_tag->insert_into_table("
          		INSERT INTO orders (
          		
order_user_id,
order_cart_id,
order_user_type,

order_tag1_color_id,
order_silencer1_color_id,
order_tag2_color_id,
order_silencer2_color_id,
order_type,

order_tag1_line1_text,
order_tag1_line2_text,
order_tag1_line3_text,
order_tag1_line4_text,
order_tag1_line5_text,
order_tag2_line1_text,
order_tag2_line2_text,
order_tag2_line3_text,
order_tag2_line4_text,
order_tag2_line5_text,
order_tag1_text_align,
order_tag2_text_align,
order_price,
order_user_email,
order_user_first_name,
order_user_last_name,
Telephone,
order_user_zip_id,
order_user_state,
order_user_ADDRES,
order_status,
order_user_city,
order_time,
order_quantity
          		
          		) VALUES(
          	
'".$fetches['cart_user_id']."',
'".$fetches['cart_id']."',
'".$fetches['cart_user_type']."',

'".$fetches['cart_tag1_color_id']."',
'".$fetches['cart_silencer1_color_id']."',
'".$fetches['cart_tag2_color_id']."',
'".$fetches['cart_silencer2_color_id']."',
'".$fetches['cart_type']."',

'".$fetches['cart_tag1_line1_text']."',
'".$fetches['cart_tag1_line2_text']."',
'".$fetches['cart_tag1_line3_text']."',
'".$fetches['cart_tag1_line4_text']."',
'".$fetches['cart_tag1_line5_text']."',
'".$fetches['cart_tag2_line1_text']."',
'".$fetches['cart_tag2_line2_text']."',
'".$fetches['cart_tag2_line3_text']."',
'".$fetches['cart_tag2_line4_text']."',
'".$fetches['cart_tag2_line5_text']."',
'".$fetches['cart_tag1_text_align']."',
'".$fetches['cart_tag2_text_align']."',
 
'".$order_price."',
'".$order_user_email."',
'".$order_user_first_name."',
'".$order_user_last_name."',

'".$Telephone."',
'".$order_user_zip_id."',
'".$order_state."',
'".$order_user_ADDRES."',
'".$order_status."',
'".$order_user_city."',
'".$order_time."',
'".$fetches['cart_quantity']."'

          		
          		
          		)
          	");
          	} //while fetch has
          		//if submitted
  
          $sub = 'paypal/payments.php';

?>



<form  class="paypal" action="<?php echo $sub; ?>" method="post" id="paypal_form"  >
    <input type="hidden" name="cmd" value="_xclick" />
    <input type="hidden" name="no_note" value="1" />
    <input type="hidden" name="lc" value="UK" />
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="bn" value="  " />
    <input type="hidden" name="first_name" value="Customer's First Name"  />
    <input type="hidden" name="last_name" value="Customer's Last Name"  />
    <input type="hidden" name="payer_email" value="customer@example.com"  />
    <input type="hidden" name="item_number" value="123456" />
    <input type="hidden" name="total" value="<?php echo sub_total; ?>" />
    <input type="hidden" name="products" value="<?php echo $how_many_products_on_cart; ?>" />
    <input style="display:none" type="submit" name="checkout_submit" value="Submit Payment"/>
</form>
  

<script type="text/javascript">

document.getElementById("paypal_form").submit();  
close();
</script>

