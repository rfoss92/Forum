<?php
  require('includes/config.inc.php');
  $page_title = 'Forgot Your Password';
  include('includes/header.html');
?>

<div class='container content'>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Assume nothing
	$userID = FALSE;

	// Validate email
	if (!empty($_POST['email'])) {

		// Check if email exists
		$query = 'SELECT user_id FROM users WHERE email="'.  mysqli_real_escape_string($dbc, $_POST['email']) . '"';
		$response = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br>MySQL Error: " . mysqli_error($dbc));

		// Retrieve the userID
		if (mysqli_num_rows($response) == 1) {
			list($userID) = mysqli_fetch_array($response, MYSQLI_NUM);
		} else {
			echo '<p class="error">The submitted email address does not match those on file!</p>';
		}
	} else {
		echo '<p class="error">You forgot to enter your email address!</p>';
	}

	if ($userID) {
		// Create a new, random password:
		$password = substr(md5(uniqid(rand(), true)), 3, 15);
		$passwordHash = password_hash($password);

		// Update the database:
		$query = "UPDATE users SET pass='$passwordHash' WHERE user_id=$userID LIMIT 1";
		$response = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br>MySQL Error: " . mysqli_error($dbc));

		if (mysqli_affected_rows($dbc) == 1) {

			// Send an email
			$body = "Your password to log into this website has been temporarily changed to '$password'. Please log in using this password and this email address. Then you may change your password to something more familiar.";
			mail($_POST['email'], 'Your temporary password.', $body, 'From: admin@sitename.com');

			echo '<h3>Your password has been changed. You will receive the new, temporary password at the email address with which you registered. Once you have logged in with this password, you may change it by clicking on the "Change Password" link.</h3>';
			mysqli_close($dbc);
			include('includes/footer.html');
			exit();

		} else {
			echo '<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>';
		}

	} else {
		echo '<p class="error">Please try again.</p>';
	}

	mysqli_close($dbc);

}
?>

<h1>Reset Your Password</h1>
<p>Enter your email address below and your password will be reset.</p>
<form action="forgot_password.php" method="post">
	<fieldset>
	<p><strong>Email Address:</strong> <input type="email" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></p>
	</fieldset>
	<div align="center"><input type="submit" name="submit" value="Reset My Password"></div>
</form>

<?php include('includes/footer.html'); ?>
</div>