<?php
  include('includes/header.html');
?>

<div class='container content'>
<?php

// If the user is logged in and has chosen a time zone,
// use that to convert the dates and times:
if (isset($_SESSION['user_tz'])) {
	$first = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
	$last = "CONVERT_TZ(p.posted_on, 'UTC', '{$_SESSION['user_tz']}')";
} else {
	$first = 'p.posted_on';
	$last = 'p.posted_on';
}

// If this is the threads page, add a link for posting new threads:
if (isset($_SESSION['user_id'])) {
  if (basename($_SERVER['PHP_SELF']) == 'threads.php') {
      echo '<p class="newThread"><a href="post.php">' . $words['new_thread'] . '</a></p>';
  }
} else {
  // Register and login links:
  echo '<p class="newThread">Please log in to create new threads</p>';
}

// The query for retrieving all the threads in this forum, along with the original user,
// when the thread was first posted, when it was last replied to, and how many replies it's had
$query = "SELECT t.thread_id, t.subject, username, COUNT(post_id) - 1 AS responses, MAX(DATE_FORMAT($last, '%e-%b-%y %l:%i %p')) AS last, MIN(DATE_FORMAT($first, '%e-%b-%y %l:%i %p')) AS first FROM threads AS t INNER JOIN posts AS p USING (thread_id) INNER JOIN users AS u ON t.user_id = u.user_id WHERE t.lang_id = {$_SESSION['languageID']} GROUP BY (p.thread_id) ORDER BY last DESC";

$response = mysqli_query($dbc, $query);

if (mysqli_num_rows($response) > 0) {
	echo '<table class="table table-striped">
	<thead>
		<tr>
			<th>' . $words['subject'] . '</th>
			<th>' . $words['posted_by'] . '</th>
			<th>' . $words['posted_on'] . '</th>
			<th>' . $words['replies'] . '</th>
			<th>' . $words['latest_reply'] . '</th>
		</tr>
	</thead>
	<tbody>';

	// Fetch each thread
	while ($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {
		echo '<tr>
				<td><a href="read.php?threadID=' . $row['thread_id'] . '">' . $row['subject'] . '</a></td>
				<td>' . $row['username'] . '</td>
				<td>' . $row['first'] . '</td>
				<td>' . $row['responses'] . '</td>
				<td>' . $row['last'] . '</td>
			</tr>';
	}
  
	echo '</tbody></table>';
} else {
	echo '<p>There are currently no messages in this forum.</p>';
}

include('includes/footer.html');
?>
</div>