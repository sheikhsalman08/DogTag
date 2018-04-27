<?php
	require('functions.php');
if(isset($_POST['be_submitd'])){
	setcookie("dog_tag_payment_acceptance","3",time()+3360);
}

	?>
<form class="paypal" action="paypal/payments.php" method="post" id="this_paypal_form" target="_blank">
	<input type="hidden" name="cmd" value="_xclick" />
		<input type="hidden" name="no_note" value="1" />
		<input type="hidden" name="lc" value="UK" />
		<input type="hidden" name="currency_code" value="USD" />
		<input type="hidden" name="bn" value="	" />
		<input type="hidden" name="first_name" value="Customer's First Name"  />
		<input type="hidden" name="last_name" value="Customer's Last Name"  />
		<input type="hidden" name="payer_email" value="customer@example.com"  />
		<input type="hidden" name="item_number" value="123456" / >
		<input type="hidden" name="dog_club_payments" value="34.95" / >
		<input type="submit" name="be_a_club_member_submit" value="join Dog Club for $34.95"/>
</form>
<script type="text/javascript">

document.getElementById("this_paypal_form").submit();  
close();

</script>
