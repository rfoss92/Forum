<?php

  if (!isset($words)) {
  	header ("Location: http://www.example.com/index.php");
  	exit();
  }

  // If logged in
  if (isset($_SESSION['user_id'])) {

  	echo '<form action="post.php" method="post" accept-charset="utf-8">';
  	if (isset($threadID) && $threadID) {
  		echo '<h3>' . $words['post_a_reply'] . '</h3>';
  		// Add the thread ID as a hidden input
  		echo '<input name="threadID" type="hidden" value="' . $threadID . '">';
  	} else {

  		echo '<h3>' . $words['new_thread'] . '</h3>';
  		// subject input
  		echo '<div class="form-group"><label for="subject">' . $words['subject'] . '</label> <input name="subject" type="text" class="form-control" size="60" maxlength="100" ';
  		// Check for existing value
  		if (isset($subject)) {
  			echo "value=\"$subject\" ";
  		}
  		echo '></div>';
  	}

  	// Create the body textarea:
  	echo '<div class="form-group"><label for="subject">' . $words['body'] . '</label> <textarea name="body" class="form-control" rows="10" cols="60">';
  	if (isset($body)) {
  		echo $body;
  	}
  	echo '</textarea></div>';
  	echo '<input name="submit" type="submit" class="form-control" value="' . $words['submit'] . '">
  	</form>';
  } else {
  	echo '<p class="bg-warning">You must be logged in to post messages.</p>';
  }

?>