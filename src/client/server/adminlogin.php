<!DOCTYPE html>
<html>
<body>
<?php
session_start();

$connection = mysqli_connect($host, $user, $password, $database);
// $host     = "localhost";
// $database = "gamex";
// $user     = "valvin";
// $password = "P@ssword!";
$host = "localhost";
$database = "db_94461811";
$user = "db_94461811";
$password = "db_94461811";

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}
else
{

    if (isset($_SERVER["REQUEST_METHOD"]) &&  $_SERVER["REQUEST_METHOD"] == "POST")
    {
      if (isset($_POST["username"]))

        $userName = $_POST["username"];
      if (isset($_POST["password"]))

        $password1 = $_POST["password"];

        $sql = "SELECT * FROM users where username = '$userName' AND password = '$password1';";

        $results = mysqli_query($connection, $sql);

        if ($row = mysqli_fetch_assoc($results))
        {
            echo "WELCOME " . $entered['username'] . "!";
            header("Location: ../html/admin.html");
        }
        else
        {
          echo "<p>Invalid username and/or password </p>";
          if (isset($return_link))
          {
            echo '<a href="'.$return_link.'">Return to user entry</a>';
          }
        }
        mysqli_free_result($results);

    }
    else {

      echo "<p>Bad login</p>";

    }

    mysqli_close($connection);
}
?>
</body>
</html>