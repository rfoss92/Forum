<?php
	header('Content-Type: text/html; charset=UTF-8');
	session_start();

	// For testing:
	// $_SESSION['user_id'] = 1;
	// $_SESSION['user_level'] = 1;
	// $_SESSION['user_tz'] = 'America/New_York';

	// logged out:
	// $_SESSION = [];

	require('../mysqli_connect.php');

	// Check for a new language ID
	if (isset($_GET['languageID']) && filter_var($_GET['languageID'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
	    $_SESSION['languageID'] = $_GET['languageID'];
	} elseif (!isset($_SESSION['languageID'])) {
	    $_SESSION['languageID'] = 1;
	}

	$query = "SELECT * FROM words WHERE lang_id = {$_SESSION['languageID']}";
	$response = mysqli_query($dbc, $query);

	// Use the default language
	if (mysqli_num_rows($response) == 0) {
	    $_SESSION['languageID'] = 1;
	    $query = "SELECT * FROM words WHERE lang_id = {$_SESSION['languageID']}";
	    $response = mysqli_query($dbc, $query);
	}

	$words = mysqli_fetch_array($response, MYSQLI_ASSOC);
	mysqli_free_result($response);
?>