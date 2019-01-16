<?php
  include('includes/header.html');
?>

<div class='container content'>
<?php
  echo '<form action="search.php" method="get" accept-charset="utf-8">
  <p><em>Search</em>: <input name="terms" type="text" size="30" maxlength="60" ';

  // Check for existing value:
  if (isset($_GET['terms'])) {
  	echo 'value="' . htmlspecialchars($_GET['terms']) . '" ';
  }

  // Complete the form:
  echo '><input name="submit" type="submit" value="' . $words['submit'] . '"></p></form>';
  if (isset($_GET['terms'])) {
  	$terms = mysqli_real_escape_string($dbc, htmlentities(strip_tags($_GET['terms'])));

  	$query = "SELECT * FROM languages WHERE lang_id = 100";
  	$response = mysqli_query($dbc, $query);

  	if (mysqli_num_rows($response) > 0) {
  		echo '<h2>Search Results</h2>';
  	} else {
  		echo '<p>No results found.</p>';
  	}
  }

  include('includes/footer.html');
?>
</div>