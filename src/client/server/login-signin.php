<!DOCTYPE html>
<html>
<body>
<?php
session_start();

$host     = "localhost";
$database = "gamex";
$user     = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  header("Location: ../html/main.html");
  alert("error");
    die("Unable to connect to database");}
else
{

    if (isset($_SERVER["REQUEST_METHOD"]) &&  $_SERVER["REQUEST_METHOD"] == "POST")
    {
      if (isset($_POST["username"]))
        $user_name = $_POST["username"];
      if (isset($_POST["password"]))
        $password = $_POST["password"];

        $securepassword = md5($password);
        $sql = "SELECT * FROM users where username = '$user_name' AND password = '$securepassword';";

        $results = mysqli_query($connection, $sql);

        if ($row = mysqli_fetch_assoc($results))
        {
            header("Location: ../html/main1.php");
        }
        else
        {
          echo "<p>Bad login </p>";
          if (isset($return_link))
          {
            echo '<a href="'.$return_link.'">Go Back</a>';
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