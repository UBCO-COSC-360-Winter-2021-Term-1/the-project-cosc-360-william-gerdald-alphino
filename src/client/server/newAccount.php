<!DOCTYPE html>
<html>
<body>
<?php

$host     = "localhost";
$database = "gamex";
$user     = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

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

        $user_name = $_POST["username"];
      if (isset($_POST["email"]))

        $email = $_POST["email"];
      if (isset($_POST["password"]))

        $password = $_POST["password"];

        if (isset($_SERVER['HTTP_REFERER']))
          $return_link = $_SERVER['HTTP_REFERER'];

        $sql = "SELECT * FROM users where username = '$user_name' OR email = '$email';";

        $results = mysqli_query($connection, $sql);

        if ($row = mysqli_fetch_assoc($results))
        {
          echo "<p>User already exists<p>";
          if (isset($return_link))
          {
            echo '<a href="'.$return_link.'">Go Back</a>';
          }
        }
        else {
          $sql = "INSERT INTO users (username, email, password) values ('$user_name','$email',md5('$password'));";
            if (mysqli_query($connection, $sql))
            {
              $count = mysqli_affected_rows($connection);
              echo "<p>An account for the user $user_name has been created</p>";
              header("Location: main.html");
            }
        }
        mysqli_free_result($results);

    }
    else {
      echo "<p>Bad information has been entered</p>";

    }

    mysqli_close($connection);
}
?>
</body>
</html>