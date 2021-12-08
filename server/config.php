<?php

	/* DATABASE CONNECTION INFORMATION */

	$DBHOST = "cosc360.ok.ubc.ca";
	$DBNAME = "cosc360";
	$DBUSER = "47441258";
	$DBPASSWORD = "47441258";

	$mysqli = mysqli_connect($DBHOST, $DBUSER, $DBPASSWORD, $DBNAME);

	$error = mysqli_connect_error();
	if ($error != null) {
		$output = "<p>Unable to connect to database!</p>";
		exit($output);
	}