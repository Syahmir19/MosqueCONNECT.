<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to index.html
header("Location: http://localhost/MasjidAr-Rahman/index.html");
exit();
?>
