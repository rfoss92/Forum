<?php
  require('includes/config.inc.php');
  $page_title = 'Login';
  include('includes/header.html');
?>

<div class='container content'>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Validate  email
	if (!empty($_POST['email'])) {
		$email = mysqli_real_escape_string($dbc, $_POST['email']);
	} else {
		$email = FALSE;
		echo '<p class="error">You forgot to enter your email address!</p>';
	}

	// Validate the password:
	if (!empty($_POST['pass'])) {
		$password = trim($_POST['pass']);
	} else {
		$password = FALSE;
		echo '<p class="error">You forgot to enter your password!</p>';
	}

	if ($email && $password) {

		$query = "SELECT user_id, first_name, user_level, pass FROM users WHERE email='$email' AND active IS NULL";
		$response = mysqli_query($dbc, $query) or trigger_error("Query: $query\n<br>MySQL Error: " . mysqli_error($dbc));

		if (@mysqli_num_rows($response) == 1) {

			// Fetch the values
			list($user_id, $first_name, $user_level, $pass) = mysqli_fetch_array($response, MYSQLI_NUM);
			mysqli_free_result($response);

			// Check password
			if (password_verify($password, $pass)) {

				// Store the info in the session
				$_SESSION['user_id'] = $user_id;
				$_SESSION['first_name'] = $first_name;
				$_SESSION['user_level'] = $user_level;
				mysqli_close($dbc);

				// Redirect the user
				$url = BASE_URL . 'index.php';
				ob_end_clean();
				header("Location: $url");
				exit();

			} else {

				echo '<p class="error">Either the email address and password entered do not match those on file or you have not yet activated your account.</p>';
			}

		} else { // No match was made
			echo '<p class="error">Either the email address and password entered do not match those on file or you have not yet activated your account.</p>';
		}

	} else {
		echo '<p class="error">Please try again.</p>';
	}

	mysqli_close($dbc);

}
?>

<h1>Login</h1>
<p>Your browser must allow cookies in order to log in.</p>
<form action="login.php" method="post">
	<fieldset>
	<p><strong>Email Address:</strong> <input type="email" name="email" size="20" maxlength="60"></p>
	<p><strong>Password:</strong> <input type="password" name="pass" size="20"></p>
	<div align="center"><input type="submit" name="submit" value="Login"></div>
	</fieldset>
</form>

<?php include('includes/footer.html'); ?>
</div>