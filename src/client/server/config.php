<?php
session_start();
	/* DATABASE CONNECTION INFORMATION */

// $host     = "localhost";
// $database = "gamex";
// $user     = "valvin";
// $password = "P@ssword!";
$host = "localhost";
$database = "db_94461811";
$user = "db_94461811";
$password = "db_94461811";

	$connection = mysqli_connect($host, $user, $password, $database);


	$sql="CREATE TABLE users (
		username varchar(255) NOT NULL,
		email varchar(255) NOT NULL,
		pasword VARCHAR(70) NOT NULL UNIQUE
	  ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	  	$sql="CREATE TABLE comments (
			author varchar(255) NOT NULL,
			category varchar(255) NOT NULL,
			post VARCHAR(255) NOT NULL 
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