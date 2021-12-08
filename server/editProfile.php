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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/form.css">
  <script type="text/javascript" src="../js/validate.js"></script>
  <title>Edit profile</title>
</head>

<body>
  <header id="masthead">
    <h1>GameX</h1>
    <nav>
      <ul>
        <li><a href="main.html">Home</a></li>
        <li><a href="createPost.html">Create Post</a></li>
        <li><a href="editProfile.html">Edit your profile</a></li>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          $host     = "localhost";
          $database = "GameX";
          $user     = "webuser";
          $password = "P@ssw0rd";

          $connection = mysqli_connect($host, $user, $password, $database);

          $error = mysqli_connect_error();
          if ($error != null) {
            $output = "<p>Unable to connect to database!</p>";
            exit($output);
          } else {

            if (isset($_SERVER["REQUEST_METHOD"]) &&  $_SERVER["REQUEST_METHOD"] == "POST") {
              if (isset($_POST["username"]))
                $user_name = $_POST["username"];
              if (isset($_POST["oldpassword"]))
                $oldpassword = $_POST["oldpassword"];

              if (isset($_POST["newpassword"]))
                $newpassword = $_POST["newpassword"];



              $password_hash = md5($oldpassword);
              $sql = "SELECT * FROM users where username = '$user_name' AND password = '$password_hash';";

              $results = mysqli_query($connection, $sql);

              if ($row = mysqli_fetch_assoc($results)) {
                $sql = "UPDATE users SET password = md5('$newpassword') WHERE username = '$user_name';";
                if (mysqli_query($connection, $sql)) {
                  $count = mysqli_affected_rows($connection);
                  echo "<p>The password for user $user_name has been updated</p>";
                }
              } else {
                echo "<p>Invalid username and/or password </p>";
                if (isset($return_link)) {
                  echo '<a href="' . $return_link . '">Return to user entry</a>';
                }
              }
              mysqli_free_result($results);
            } else {
              echo "<p>Bad information has been entered</p>";
            }

            mysqli_close($connection);
          }
        } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
          echo "<h3>GET method is not supported!</h3>";
        } else {
          echo "<h3>ERROR!!</h3>";
        }

        ?>

        <footer>
        </footer>
</body>

</html>