<?php
	if(isset($_GET['milestones'])){

	if($_GET['milestones'] == "BIRTHDAY"){
	$line1_placeholder = "HAPPY BIRTHDAY";
	$line2_placeholder = "12-23-16";
	$line3_placeholder = "2 YEARS";
	$line4_placeholder = "SAAD";
	$line5_placeholder = "STILL GOT IT";

	$line1_name = "WISHING WORDS";
	$line2_name = "DATE";
	$line3_name = "AGE";
	$line4_name = "NAME";
	$line5_name = "NOTE";
	} 
	elseif($_GET['milestones'] == "GRADUATION"){
	$line1_placeholder = "SALMAN";
	$line2_placeholder = "Pine View School";
	$line3_placeholder = "GRADUATION DATE";
	$line4_placeholder = "GREATE JOB";
	$line5_placeholder = "LOVE MOM";

	$line1_name = "NAME";
	$line2_name = "SCHOOL";
	$line3_name = "GRADUATION";
	$line4_name = "NOTE";
	$line5_name = "FROM";
	}		
	elseif($_GET['milestones'] == "ANNIVERSARY"){
	$line1_placeholder = "25TH ANNIVERSARY";
	$line2_placeholder = "JUNE 12, 2016";
	$line3_placeholder = "KATIE AND MARK";
	$line4_placeholder = "STILL IN LOVE";
	$line5_placeholder = "NOTES";

	$line1_name = "ANNIVERSARY NUMBER";
	$line2_name = "DATE";
	$line3_name = "FIRST NAMES";
	$line4_name = "NOTES";
	$line5_name = "NOTES";
	}		
	elseif($_GET['milestones'] == "WEDDING"){
	$line1_placeholder = "FRANK WRIGHT";
	$line2_placeholder = "MARY DEVIS";
	$line3_placeholder = "MARRIED";
	$line4_placeholder = "JUNE 12, 2012";
	$line5_placeholder = "NOTE";

	$line1_name = "GROOM";
	$line2_name = "BRIDE";
	$line3_name = "MARRIED";
	$line4_name = "WEDDING; DATE";
	$line5_name = "NOTE";
	}		
	elseif($_GET['milestones'] == "BABY_BRITH"){
	$line1_placeholder = "JOHN SMITH";
	$line2_placeholder = "Jan 23 2015";
	$line3_placeholder = "10 lbs oz";
	$line4_placeholder = "12 inches";
	$line5_placeholder = "John and Kate";

	$line1_name = "Name";
	$line2_name = "Birth-date";
	$line3_name = "Weight";
	$line4_name = "Height";
	$line5_name = "Parents";
	}	
	elseif($_GET['milestones'] == "MOTHERS_DAY"){
	$line1_placeholder = "16";
	$line2_placeholder = "LOVE YOU MOM";
	$line3_placeholder = "CAROL AND";
	$line4_placeholder = "BRIDGETTE";
	$line5_placeholder = "EXTRA";

	$line1_name = "DATE";
	$line2_name = "NOTE";
	$line3_name = "NAME 1";
	$line4_name = "NAME 2";
	$line5_name = "EXTRA";
	}		
	elseif($_GET['milestones'] == "NEW_JOB"){

	$line1_placeholder = "JOE SMITH";
	$line2_placeholder = "FR VICE PRES";
	$line3_placeholder = "Delphi";
	$line4_placeholder = "12-23-16";
	$line5_placeholder = "CONGRATS";

	$line1_name = "NAME";
	$line2_name = "NEW JOB TITLE";
	$line3_name = "COMPANY";
	$line4_name = "DATE";
	$line5_name = "NOTE";
	}
}
	else{
	$line1_placeholder = "";
	$line2_placeholder = "";
	$line3_placeholder = "";
	$line4_placeholder = "";
	$line5_placeholder = "";

	$line1_name = "";
	$line2_name = "";
	$line3_name = "";
	$line4_name = "";
	$line5_name = "";
	}	
 ?>



<?php 
if(isset($_POST['ac_submit_for_cart'])){

if(!isset($_POST['differ'])){
 	$_POST['differ'] = "off";
 }

if(!isset($_POST['ac_tag1_line1'])){
$cart_tag1_line1_text =  "";
}else{
	$cart_tag1_line1_text = $_POST['ac_tag1_line1'];
}
if(!isset($_POST['ac_tag1_line2'])){
$cart_tag1_line2_text = "";
}else{
	$cart_tag1_line2_text = $_POST['ac_tag1_line2'];
}
if(!isset($_POST['ac_tag1_line3'])){
$cart_tag1_line3_text =  "";
}else{
	$cart_tag1_line3_text = $_POST['ac_tag1_line3'];
}
if(!isset($_POST['ac_tag1_line4'])){
$cart_tag1_line4_text =  "";
}else{
	$cart_tag1_line4_text = $_POST['ac_tag1_line4'];
}
if(!isset($_POST['ac_tag1_line5'])){
$cart_tag1_line5_text = "";
}else{
	$cart_tag1_line5_text = $_POST['ac_tag1_line5'];
}
if(!isset($_POST['ac_tag1_align'])){
$cart_tag1_text_align = "";
}else{
$cart_tag1_text_align = $_POST['ac_tag1_align'];
}
$cart_silencer1_color_id = $_POST['chose_silencer_image'];
$cart_tag1_color_id = $_POST['chose_tag_image'];
		//tag 2

if($_POST['differ'] == "off"){ 

$cart_tag2_line1_text = $cart_tag1_line1_text;
$cart_tag2_line2_text = $cart_tag1_line2_text;
$cart_tag2_line3_text = $cart_tag1_line3_text;
$cart_tag2_line4_text = $cart_tag1_line4_text;
$cart_tag2_line5_text = $cart_tag1_line5_text;
$cart_tag2_text_align = $cart_tag1_text_align;
$cart_silencer2_color_id = $cart_silencer1_color_id;
$cart_tag2_color_id = $cart_tag1_color_id;

}elseif($_POST['differ'] == "on"){

if(!isset($_POST['chose_silencer2_image'])){
$cart_silencer2_color_id = $cart_silencer1_color_id;
}else{
	$cart_silencer2_color_id = $_POST['chose_silencer2_image'];
}

if(!isset($_POST['chose_tag2_image'])){
$cart_tag2_color_id = $cart_tag1_color_id;
}else{
	$cart_tag2_color_id = $_POST['chose_tag2_image'];
}



if(!isset($_POST['ac_tag2_line1'])){
$cart_tag2_line1_text = "";
}else{
	$cart_tag2_line1_text = $_POST['ac_tag2_line1'];
}
if(!isset($_POST['ac_tag2_line2'])){
$cart_tag2_line2_text =  "";
}else{
	$cart_tag2_line2_text = $_POST['ac_tag2_line2'];
}
if(!isset($_POST['ac_tag2_line3'])){
$cart_tag2_line3_text = "";
}else{
	$cart_tag2_line3_text = $_POST['ac_tag2_line3'];
}
if(!isset($_POST['ac_tag2_line4'])){
$cart_tag2_line4_text = "";
}else{
	$cart_tag2_line4_text = $_POST['ac_tag2_line4'];
}
if(!isset($_POST['ac_tag2_line5'])){
$cart_tag2_line5_text = "";
}else{
	$cart_tag2_line5_text = $_POST['ac_tag2_line5'];
}

if(!isset($_POST['ac_tag2_align'])){
$cart_tag2_text_align = "";
}else{
	$cart_tag2_text_align = $_POST['ac_tag2_align'];
}

 }		//end of if/else differ off

}	//IF FORM SUBMITTED