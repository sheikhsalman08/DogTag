<?php
	$dog_tag->create_table('admins',
		'admin_id INT(5) NOT NULL AUTO_INCREMENT,
		admin_name VARCHAR(30) NOT NULL,
		admin_pass VARCHAR(8) NOT NULL,
		admin_email VARCHAR(254) NOT NULL,
		PRIMARY KEY(admin_id)'
		);

	$dog_tag->create_table('users',
		'user_id INT(6) NOT NULL AUTO_INCREMENT,
	user_name VARCHAR(30) NOT NULL,
	user_pass VARCHAR(20) NOT NULL,
	user_email VARCHAR(254) NOT NULL,
	in_time INT(15	) NOT NULL,
	user_type INT(1) NOT NULL,
	PRIMARY KEY(user_id)'
		);

	$dog_tag->create_table('guest_user',
		'	guest_id INT(7) NOT NULL AUTO_INCREMENT,
	log_type INT(1) NOT NULL,
	PRIMARY KEY(guest_id)'
		);

	$dog_tag->create_table('comments',
			'message_id INT(5) NOT NULL AUTO_INCREMENT,
	sender_email VARCHAR(254) NOT NULL,
	sender_name VARCHAR(20) NOT NULL,
	sender_comment VARCHAR(1000) NOT NULL,
	PRIMARY KEY(message_id)'
			);

	$dog_tag->create_table('carts',
			'cart_id INT(7) NOT NULL AUTO_INCREMENT,
	cart_user_id INT(7) NOT NULL,
	cart_user_type INT(1) NOT NULL,
	cart_tag1_color_id INT(3) NOT NULL,
	cart_silencer1_color_id INT(3) NOT NULL,
	cart_tag2_color_id INT(3) NOT NULL,
	cart_silencer2_color_id INT(3) NOT NULL,
	cart_type INT(1) NOT NULL,
	cart_tag1_line1_text VARCHAR(17) NOT NULL,
	cart_tag1_line2_text VARCHAR(17) NOT NULL,
	cart_tag1_line3_text VARCHAR(17) NOT NULL,
	cart_tag1_line4_text VARCHAR(17) NOT NULL,
	cart_tag1_line5_text VARCHAR(17) NOT NULL,
	cart_tag1_text_align VARCHAR(10) NOT NULL,
	cart_tag2_line1_text VARCHAR(17) NOT NULL,
	cart_tag2_line2_text VARCHAR(17) NOT NULL,
	cart_tag2_line3_text VARCHAR(17) NOT NULL,
	cart_tag2_line4_text VARCHAR(17) NOT NULL,
	cart_tag2_line5_text VARCHAR(17) NOT NULL,
	cart_tag2_text_align VARCHAR(10) NOT NULL,
	cart_price INT(6) NOT NULL,
	cart_image LONGBLOB NOT NULL,
	cart_image2 LONGBLOB NOT NULL,
	cart_user_email VARCHAR(254) NOT NULL,
	cart_quantity INT(3) NOT NULL,
	PRIMARY KEY(cart_id)'
			);

	 $dog_tag->create_table('orders',
			'order_id INT(7) NOT NULL AUTO_INCREMENT,
order_number INT(7) NOT NULL,
order_user_id INT(7) NOT NULL,
order_user_type INT(1) NOT NULL,
order_tag1_color_id INT(3) NOT NULL,
order_silencer1_color_id INT(3) NOT NULL,
order_type INT(1) NOT NULL,
order_tag1_line1_text VARCHAR(17) NOT NULL,
order_tag1_line2_text VARCHAR(17) NOT NULL,
order_tag1_line3_text VARCHAR(17) NOT NULL,
order_tag1_line4_text VARCHAR(17) NOT NULL,
order_tag1_line5_text VARCHAR(17) NOT NULL,
order_tag1_text_align VARCHAR(10) NOT NULL,
order_tag2_line1_text VARCHAR(17) NOT NULL,
order_tag2_line2_text VARCHAR(17) NOT NULL,
order_tag2_line3_text VARCHAR(17) NOT NULL,
order_tag2_line4_text VARCHAR(17) NOT NULL,
order_tag2_line5_text VARCHAR(17) NOT NULL,
order_tag2_text_align VARCHAR(10) NOT NULL,
order_price INT(6) NOT NULL,
order_user_email VARCHAR(254) NOT NULL,
Telephone INT(14) NOT NULL,
order_user_zip_id INT(7) NOT NULL,
order_user_ADDRES VARCHAR(60) NOT NULL,
order_time INT(15) NOT NULL,
order_status VARCHAR(20) NOT NULL,
order_image LONGBLOB NOT NULL,
order_image2 LONGBLOB NOT NULL,
order_tag2_color_id int(3) NOT NULL,
order_silencer2_color_id int(3) NOT NULL,
order_cart_id INT(7) NOT NULL,
order_user_first_name VARCHAR(20) NOT NULL,
order_user_last_name VARCHAR(20) NOT NULL,
order_user_state VARCHAR(20) NOT NULL,
order_user_city VARCHAR(20) NOT NULL,
order_quantity INT(3) NOT NULL,
PRIMARY KEY(order_id)'
			);

	$dog_tag->create_table('tag_color',
			'	tag_color_id INT(4) NOT NULL AUTO_INCREMENT,
	tag_color_name VARCHAR(20) NOT NULL,
	tag_color_image LONGBLOB NOT NULL,
	PRIMARY KEY(tag_color_id)'
			);

	$dog_tag->create_table('silencer_color',
			'	silencer_color_id INT(4) NOT NULL AUTO_INCREMENT,
	silencer_color_name VARCHAR(20) NOT NULL,
	silencer_color_image LONGBLOB NOT NULL,
	PRIMARY KEY(silencer_color_id)'
			);

 

		$dog_tag->create_table( "general" ,
	"general_id INT(2) NOT NULL AUTO_INCREMENT,
	logo LONGBLOB NOT NULL,
	email VARCHAR(254) NOT NULL,
	phone_num VARCHAR(15) NOT NULL,
	ADDRES VARCHAR(400) NOT NULL,
	shipping_dis INT(1) NOT NULL,
	tags_prize INT(8) NOT NULL,
	premium_dis INT(3) NOT NULL,
	shipping_charge INT(3) NOT NULL,
	paypal_email VARCHAR(254) NOT NULL,
	take_down_site int(1) NOT NULL,
	facebook_link VARCHAR(200) NOT NULL,
	header_background_color VARCHAR(20) NOT NULL,
	header_text_color VARCHAR(20) NOT NULL,
	PRIMARY KEY(general_id)"
	);

	$query = $dog_tag->show_sorted_row_values('general','general_id','DESC');
	$fetches = mysqli_fetch_assoc($query);
	if(!$fetches){
	$dog_tag->insert_into_table('
			INSERT INTO general (logo,email,phone_num,ADDRES,shipping_dis,tags_prize,premium_dis,shipping_charge,paypal_email,take_down_site) VALUES ("img","mdsalman01@ymail.com","0113","The Arc","2","9","10","1","mdsalman01755@gmail.com","2");
		');
}



	$dog_tag->create_table('slider_images',
			'slider_image_id INT(1) NOT NULL AUTO_INCREMENT,
	slider_image LONGBLOB NOT NULL,
	slider_link VARCHAR(500) NOT NULL,
	PRIMARY KEY(slider_image_id)'
			);


 ?>