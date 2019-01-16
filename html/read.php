<?php
  include('includes/header.html');
?>

<div class='container content'>
<?php

  // Check for a thread ID
  $threadID = FALSE;
  if (isset($_GET['threadID']) && filter_var($_GET['threadID'], FILTER_VALIDATE_INT, array('min_range' => 1)) ) {
  	$threadID = $_GET['threadID'];

  	// Convert the date if the user is logged in
  	if (isset($_SESSION['user_tz'])) {
  		$posted = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
  	} else {
  		$posted = 'p.posted_on';
  	}

  	$query = "SELECT t.subject, p.message, username, DATE_FORMAT($posted, '%e-%b-%y %l:%i %p') AS posted FROM threads AS t LEFT JOIN posts AS p USING (thread_id) INNER JOIN users AS u ON p.user_id = u.user_id WHERE t.thread_id = $threadID ORDER BY p.posted_on ASC";
  	$response = mysqli_query($dbc, $query);

  	if (!(mysqli_num_rows($response) > 0)) {
  		$threadID = FALSE;
  	}
  }

  // Get the messages in this thread
  if ($threadID) { 
  	$printed = FALSE;
  	while ($messages = mysqli_fetch_array($response, MYSQLI_ASSOC)) {
  		if (!$printed) {
  			echo "<h2>{$messages['subject']}</h2>\n";
  			$printed = TRUE;
  		}
  		echo "<p>{$messages['username']} ({$messages['posted']})<br>{$messages['message']}</p><br>\n";
  	}
  	include('includes/post_form.php');
  } else {
  	echo '<p class="bg-danger">This page has been accessed in error.</p>';
  }

  include('includes/footer.html');
?>
</div>