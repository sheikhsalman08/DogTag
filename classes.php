<?php 
	class dog_ruff
	{
		function __construct($dbhost,$dbuser,$dbpass){
			$this->dbhost = $dbhost;
			$this->dbuser = $dbuser;
			$this->dbpass = $dbpass;
			$this->connection = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass);
		mysqli_connect_errno($this->connection);
		mysqli_connect_error($this->connection);
		mysqli_error($this->connection);
		mysqli_errno($this->connection);
		mysqli_query($this->connection,'SET GLOBAL max_allowed_packet=1073741824');
		}		//end of construct function

		function create_database($dbname){ 	// creating and using database;

			mysqli_query($this->connection,'CREATE DATABASE '.$dbname);
			mysqli_query($this->connection,'USE '.$dbname);

		}		//end of creating and using database

		function create_table($table_name,$table_values){		//creating new table
			$query = "CREATE TABLE ".$table_name."(".$table_values.")";
		     // echo $query."<br><br>";
			mysqli_query($this->connection,$query);
		}		//end of creating new table

		function insert_into_table($query){		//inserting into table
			// echo $query;
			mysqli_query($this->connection,$query);
		}		//end of insert_into_table function

		function update_into_table_by_id($table_name,$menu_name,$value,$id_num){		// id_filed spacafic
				$query = "UPDATE ".$table_name."
			  	SET ".$menu_name."='".$value."'
			 	WHERE id = ".$id_num;
			 	// echo $query;
			 mysqli_query($this->connection,$query);
		}		//end of updating inside table

		function update_into_table_by_id2($table_name,$menu_name,$value,$id_field,$id_num){		// can also change id field name
				$query = "UPDATE ".$table_name."
			  	SET ".$menu_name."='".$value."'
			 	WHERE $id_field = ".$id_num;
			 	// echo $query;
			 mysqli_query($this->connection,$query);
		}	

		function delete_from_table_by_id($table_name,$id_field_name,$id){
				$query = "DELETE FROM ".$table_name." WHERE ".$id_field_name."= ".$id;
				
			mysqli_query($this->connection,$query);

		}		//end of deleting inside table

		

		function show_sorted_row_values($table_name,$order_by_menu,$order_by){
			$query = "SELECT * FROM ". $table_name ." order BY ".$order_by_menu." ".$order_by;
			// echo $query;
			return mysqli_query($this->connection,$query);
			//fetch in the query data and and show by while loop
		}		//end of shwowing particular values with ASC/DESC


		function show_sorted_value_of_user($table_name,$user_data_col_name,$user_data_col_name_value,$order_by_menu,$order_by){
			$query = "SELECT * FROM ". $table_name ." WHERE ".$user_data_col_name." = '".$user_data_col_name_value."'order BY ".$order_by_menu." ".$order_by;
			// echo $query;
			return mysqli_query($this->connection,$query);
			//fetch in the query data and and show by while loop
		}		//end of show_sorted_value_of_user

		function show_sorted_value_of_user_in_limit($table_name,$user_data_col_name,$user_data_col_name_value,$order_by_menu,$order_by,$limit){
			$query = "SELECT * FROM ". $table_name ." WHERE ".$user_data_col_name." = '".$user_data_col_name_value."' order BY ".$order_by_menu." ".$order_by." limit ".$limit;
			// echo $query;
			return mysqli_query($this->connection,$query);
			//fetch in the query data and and show by while loop
		}		//end of show_sorted_value_of_user_in_limit


		function select_all_data_except_onc($table_name,$user_data_col_name,$user_data_col_name_value,$order_by_menu,$order_by){
			$query = "SELECT * FROM ". $table_name ." WHERE ".$user_data_col_name." != '".$user_data_col_name_value."' order BY ".$order_by_menu." ".$order_by;
			// echo $query;
			return mysqli_query($this->connection,$query);
			//fetch in the query data and and show by while loop
		}		//end of select_all_data_except_once


		function show_user_user_pass($table_name,$userorpass){
			$query = "SELECT * FROM '. $table_name .' WHERE '.$userorpass.'";
			return mysqli_query($this->connection,$query);
			//fetch in the query data and and show by while loop
		}		//end of shwowing particular values with ASC/DESC

		function show_menu_column_of_table($table_name){
			$query = "SHOW COLUMNS FROM ".$table_name;
			$query = mysqli_query($this->connection,$query);
			while($queryy = mysqli_fetch_row($query)){
				echo "<th style='text-align:center'>".$queryy[0]."</th>";
			}		//end of while loop
		}		//end of shwoing menu columns 


		function row_number($table_name){
			$query = "SELECT * FROM ". $table_name;
			$query = mysqli_query($this->connection,$query);
			$query = mysqli_num_rows($query);
			return $query;
			
		}		//end of row_number();

		function email_existance($table_name,$email_field,$email_value){
			$query = "SELECT * FROM ".$table_name." WHERE ".$email_field." = '".$email_value."'";
			$query = mysqli_query($this->connection,$query);
			if(mysqli_num_rows($query) > 0){
				return true;
			}else{
				return false;
			}
		 }		//end of email_existance

		 function finding_email_pass($table_name,$pass_field,$email_field,$email_value){
		 	$query = "SELECT ".$pass_field." FROM ".$table_name." WHERE ".$email_field." = '".$email_value."'";
		 	$query = mysqli_query($this->connection,$query);
		 	while($fetches = mysqli_fetch_assoc($query)){
		 		return $fetches[$pass_field];
		 	}		//end of  while($fetches = mysqli_fetch_assoc($query)){
		 }		//end of  function finding email pass


		function getting_data_by_another_field($table_name,$for_field,$from_field,$from_field_value){

		 	$query = "SELECT ".$for_field." FROM ".$table_name." WHERE ".$from_field." = '".$from_field_value."'";
		 //	 echo $query;
		 	$query = mysqli_query($this->connection,$query);
		 	while($fetches = mysqli_fetch_assoc($query)){
		 		return $fetches["$for_field"];
		 }		//end of while($fetch = mysqli_fetch_assoc($query)){
		}	//end of function getting_data_by_another_field


		 function finding_email_id($table_name,$id_field,$email_field,$email_value){
		 	$query = "SELECT ".$id_field." FROM ".$table_name." WHERE ".$email_field." = '".$email_value."'";
		 	$query = mysqli_query($this->connection,$query);
		 	while($fetches = mysqli_fetch_assoc($query)){
		 		return $fetches['admin_id'];
		 }		//end of while($fetch = mysqli_fetch_assoc($query)){
		}	//end of function finding email pass

		function insert_into_cart($query){
			$the_this = "INSERT INTO CART (cart_id,cus_id,frame_id,picture_id,order_price) VALUES('','','','','')";
			
			return mysqli_query($this->connection,$query);
		}		//end of insert_into_cart

		function show_particular_value($table_name,$field_name,$field_value){
			$query = "SELECT * FROM ". $table_name ." WHERE ".$field_name." = '".$field_value."'";
			return mysqli_query($this->connection,$query);
			//fetch in the query data and and show by while loop
		}		//end of shwowing particular values

		function image_base64_encoading($image_name){
$image = addslashes($_FILES['$image_name']['tmp_name']);
$image = file_get_contents($image);
$image = base64_encode($image);
		}

		function show_image(){
		echo '<img src="data:image;base64," />';
		}

		function update_any_field($table,$changing_field,$changing_value,$id_field_name,$id_field_value,$order_by_field,$order_by,$limit){
 		$query = "UPDATE $table
			  SET $changing_field ='$changing_value'
			  WHERE $id_field_name = '$id_field_value' order by $order_by_field $order_by limit $limit";
			  // echo $query;
 		mysqli_query($this->connection,$query);
 		}

 		function input_general_settings($field,$value){
 		$query = "UPDATE general
			  SET $field = '$value'
			  WHERE general_id = 1";
			  // echo $query;
 		mysqli_query($this->connection,$query);
 		}


 		function show_general_settings($field_name){

			$query = $this->show_sorted_row_values('general','general_id','ASC');
			while($fetches = mysqli_fetch_assoc($query)) 
				return $fetches["$field_name"];
 		}
 	
 		function refresh_redirect(){
 			header("Refresh:0");
 			header("Refresh:0; url=page2.php");
 			header("Location: http://example.com/myOtherPage.php");
 			basename(__FILE__, '.php'); //current file name
 		}



 		function shown(){
 			echo "working";
 		}


	 }		//end of class
