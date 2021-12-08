
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/form.css">
    <script type="text/javascript" src="../js/validate.js"></script>
    <title>Admin</title>
</head>
<body>
    <header id="masthead">
        <h1>GameX</h1>
        <nav>
            <ul>
                <li><a href="../HTML/main.html">Home</a></li>
                <li><a href="../HTML/createpost.html">Make New Post</a></li>

<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

$host     = "localhost";
$database = "GameX";
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
      if (isset($_POST["password"]))
        $password = $_POST["password"];


        $sql = "DELETE FROM users where username = '$user_name' AND password = '$password';";

        $results = mysqli_query($connection, $sql);

        if ($row = mysqli_fetch_assoc($results))
        {
            $sql = "DELETE FROM users where username = '$user_name' AND password = '$password';";
            if (mysqli_query($connection, $sql))
            {
              $count = mysqli_affected_rows($connection);
              echo "<p>The user $user_name has been deleted</p>";
            }

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
      echo "<p>Bad information has been entered</p>";

    }

    mysqli_close($connection);
}
        }






?>

<footer>
</footer>
</body>
</html>