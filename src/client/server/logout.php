<?php
// Initialize the session
session_start();
 
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: login.php'); 
}
?>