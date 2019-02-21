<?php
// remove all session variables
session_unset();
$_SESSION = array();
// destroy the session
session_destroy();

echo "User ID not specified or invalid.";
header("Location: https://theatrenow.azurewebsites.net/index.html");
exit();
?>
