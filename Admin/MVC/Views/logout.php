<?php
// Start the session
session_start();

// Check if the destroy parameter is set
if (isset($_GET['destroy']) && $_GET['destroy'] === 'true') {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}
?>
