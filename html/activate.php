<?php
	require('includes/config.inc.php');
	$page_title = 'Activate Your Account';
	include('includes/header.html');
?>

<div class='container content'>
<?php

	// If $x and $y don't exist or aren't of the proper format, redirect the user:
	if (isset($_GET['x'], $_GET['y']) 
		&& filter_var($_GET['x'], FILTER_VALIDATE_EMAIL) 
		&& (strlen($_GET['y']) == 32 )
		) {

		$query = "UPDATE users SET active=NULL WHERE (email='" . mysqli_real_escape_string($dbc, $_GET['x']) . "' AND active='" . mysqli_real_escape_string($dbc, $_GET['y']) . "') LIMIT 1";
		$response = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br>MySQL Error: " . mysqli_error($dbc));

		// Print a customized message:
		if (mysqli_affected_rows($dbc) == 1) {
			echo "<h3>Your account is now active. You may now log in.</h3>";
		} else {
			echo '<p class="error">Your account could not be activated. Please re-check the link or contact the system administrator.</p>';
		}

		mysqli_close($dbc);

	} else {

		$url = BASE_URL . 'index.php';
		ob_end_clean();
		header("Location: $url");
		exit();

	}

	include('includes/footer.html');
?>

</div>