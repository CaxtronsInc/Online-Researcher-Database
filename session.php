<?php
// create a session 
if (!isset($_SESSION)) {
  session_start();
}

$expiry = (5 * 60);  	//seconds till expiry

$now = time(); //current time

$limit = $now - $expiry;	

// check the time of the last activity
if (isset ($_SESSION['last_activity']) && $_SESSION['last_activity'] < $limit) {
  $_SESSION = array();
  header('Location: login.php?message=Logged out - Session inactive for too long.');
  exit;
} else {
  // otherwise, set the value to the current time
  $_SESSION['last_activity'] = $now;
}
echo "<meta http-equiv=\"refresh\" content=\"".($expiry+1)."\">"
?>

