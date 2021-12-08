<?php
// Include config file
require_once "config.php";


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate username
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
  } else if (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
    $username_err = "Username can only contain letters, numbers, and underscores.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE username = ?";

    if ($stmt = mysqli_prepare($mysqli, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = trim($_POST["username"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_err = "This username is already exist.";
        } else {
          $username = trim($_POST["username"]);
        }
      } else {
        echo " try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } else if (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Password must have atleast 6 characters.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate confirm password
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm password.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "Password did not match.";
    }
  }

  // Check input errors before inserting in database
  if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

    if ($stmt = mysqli_prepare($mysqli, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

      // Set parameters
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        header("location: login.php");
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Close connection
  mysqli_close($mysqli);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/form.css">
  <script type="text/javascript" src="../js/validate.js"></script>
  <title>Login</title>
</head>

<body>
  <header id="masthead">
    <h1>GameX</h1>
    <nav>
      <ul>
        <li><a href="main.html">Home</a></li>
        <li><a href="createpost.html">Make New Post</a></li>
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
              if (empty($username)) {
                array_push($errors, "Username is required");
              }
              if (empty($password)) {
                array_push($errors, "Password is required");
              }
              if (isset($_POST["username"]))
                $user_name = $_POST["username"];
              if (isset($_POST["password"]))
                $password = $_POST["password"];
              $password_hash = md5($password);
              $sql = "SELECT * FROM users where username = '$user_name' AND password = '$password_hash';";

              $results = mysqli_query($connection, $sql);

              if ($row = mysqli_fetch_assoc($results)) {
                echo "<p>This user has a valid account<p>";
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


</body>

</html>