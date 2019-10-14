<?php
	var_dump($_POST);

	$bookID = $_POST['bookID'];

	require('../vendor/autoload.php');

	$dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');   // we need to add '/.. to go up a level from DIR'
	$dotenv->load();

	require('../templates/connection.php');

	$sql = "DELETE FROM 'Books' WHERE _id = $bookID";
	$result = mysqli_query($dbc, $sql);

	if ($result && mysqli_affected_rows($dbc) > 0) {
		header('../books/allBooks.php');
	} else if ($result && mysqli_affected_rows($dbc) === 0) {
		header('../errors/404.php');
	} else {
		die('something went wrong with deleting a book!');
	}

 ?>
