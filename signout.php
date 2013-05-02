<?php
require 'session.php';
require 'DBconnection.php';
session_destroy();
echo "Signing out...<meta http-equiv=\"refresh\" content=\"1;URL='login.php'\">";
?>
