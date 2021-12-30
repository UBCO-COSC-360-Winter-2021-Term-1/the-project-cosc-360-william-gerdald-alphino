<?php

	/* DATABASE CONNECTION INFORMATION */

	$DBHOST = "cosc360.ok.ubc.ca";
	$DBNAME = "cosc360";
	$DBUSER = "94461811";
	$DBPASSWORD = "94461811";

	$mysqli = mysqli_connect($host, $user, $password, $database);

	$sql="CREATE TABLE users (
		username varchar(255) NOT NULL,
		firstName varchar(255) NOT NULL,
		lastName varchar(255) NOT NULL,
		email varchar(255) NOT NULL,
		pasword VARCHAR(70) NOT NULL UNIQUE
	  ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	  
	  if(mysqli_query($link, $sql)){
		echo "Table created successfully.";

	$error = mysqli_connect_error();
	if ($error != null) {
		$output = "<p>Unable to connect database!</p>";
		exit($output);  }else{
		(mysqli_query($link, $sql)){
		  echo "Table created successfully.";
	}
		}