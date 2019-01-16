<?php
  include('includes/header.html');
?>

<div class='container content'>
<?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  	// Validate thread ID ($threadID)
  	if (isset($_POST['threadID']) && filter_var($_POST['threadID'], FILTER_VALIDATE_INT, array('min_range' => 1)) ) {
  		$threadID = $_POST['threadID'];
  	} else {
  		$threadID = FALSE;
  	}

  	// If there's no thread ID, a subject must be provided
  	if (!$threadID && empty($_POST['subject'])) {
  		$subject = FALSE;
  		echo '<p class="bg-danger">Please enter a subject for this post.</p>';
  	} elseif (!$threadID && !empty($_POST['subject'])) {
  		$subject = htmlspecialchars(strip_tags($_POST['subject']));
  	} else {
  		$subject = TRUE;
  	}

  	// Validate the body
  	if (!empty($_POST['body'])) {
  		$body = htmlentities($_POST['body']);
  	} else {
  		$body = FALSE;
  		echo '<p class="bg-danger">Please enter a body for this post.</p>';
  	}

  	if ($subject && $body) {
  		
      // Add the message to the database
  		if (!$threadID) { // Create a new thread
  			$query = "INSERT INTO threads (lang_id, user_id, subject) VALUES ({$_SESSION['languageID']}, {$_SESSION['user_id']}, '" . mysqli_real_escape_string($dbc, $subject) . "')";
  			$response = mysqli_query($dbc, $query);

  			if (mysqli_affected_rows($dbc) == 1) {
  				$threadID = mysqli_insert_id($dbc);
  			} else {
  				echo '<p class="bg-danger">Your post could not be handled due to a system error.</p>';
  			}
  		}

  		if ($threadID) { // Add this to the replies table

  			$query = "INSERT INTO posts (thread_id, user_id, message, posted_on) VALUES ($threadID, {$_SESSION['user_id']}, '" . mysqli_real_escape_string($dbc, $body) . "', UTC_TIMESTAMP())";
  			$response = mysqli_query($dbc, $query);

  			if (mysqli_affected_rows($dbc) == 1) {
  				echo '<p class="bg-success">Your post has been entered.</p>';
  			} else {
  				echo '<p class="bg-danger">Your post could not be handled due to a system error.</p>';
  			}
  		}
      
  	} else {
  		include('includes/post_form.php');
  	}
  } else {
  	include('includes/post_form.php');
  }

  include('includes/footer.html');

?>
</div>