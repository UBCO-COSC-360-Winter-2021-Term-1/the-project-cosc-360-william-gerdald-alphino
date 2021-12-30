<?php
require 'config.php';
session_start();

$loggedIn = false;

// check if logged in
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $loggedIn = true;

  // get the id of the logged in user and check if they are admin
  if ($stmt = $mysqli->prepare("SELECT username FROM users WHERE username=?")) {

    // bind parameters
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->fetch();
    $stmt->close(); // close the statement
  }
}

if (isset($_GET['id'])) {
  $user_id = $_GET['id'];

  // fetch user from DB with this id
  if ($stmt = $mysqli->prepare("SELECT username, email,firstName,lastName FROM users WHERE username=?")) {

    // bind parameters
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($username, $email, );


    while ($stmt->fetch()) {
      $userExists = true;
      break; // only want one user
    }

    $stmt->close(); // close the statement
  }

  if (!$userExists) {
    header('Location: login-signin.php'); // if no user exists with that ID
  }
} else {
  header('Location: login-signin.php'); // if no ID is set then re direct to home page
}


?>
