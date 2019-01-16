<?php 
  require('includes/config.inc.php');
  $page_title = 'Logout';
  include('includes/header.html');

  // If no first_name session variable exists, redirect the user:
  if (!isset($_SESSION['first_name'])) {

  	$url = BASE_URL . 'index.php';
  	ob_end_clean();
  	header("Location: $url");
  	exit();

  } else { 

  	$_SESSION = []; 
  	session_destroy();
  	setcookie(session_name(), '', time()-3600);
  	$url = BASE_URL . 'index.php';
  	ob_end_clean();
  	header("Location: $url");
  	exit();
  }

  include('includes/footer.html');
?>