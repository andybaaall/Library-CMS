<?php
	date_default_timezone_set('Pacific/Auckland');	// vagrant servers might use a different timezone?
	// we're always going to go -> host, username, password, table, IN THAT ORDER, when setting up dbc 
	$dbc = mysqli_connect(getenv('DB_HOST'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), getenv('DB_TABLE'));

	if ($dbc) {
		// var_dump('connected to the SQL DB!');
		$dbc->set_charset('utf8mb4');
	} else {
		die('Error: connection to SQL DB unsuccessful. Please check the credentials in your .env file; there\'s a .env.example to let you know which credentials you need.');
	}

 ?>
