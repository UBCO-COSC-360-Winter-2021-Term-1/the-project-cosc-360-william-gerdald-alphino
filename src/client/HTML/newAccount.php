
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <script type="text/javascript" src="../js/validate.js"></script>
    <script>
        function checkPasswordMatch(e){
            var password = document.getElementById("password");
            var passwordCheck = document.getElementById("password-check");
            if (password.value != passwordCheck.value){
            makeRed(password);
            makeRed(passwordCheck);

            alert("Password do not match!");
            e.preventDefault();
            }
        }
    </script>
    <title>Create an account</title>
</head>
<body>
    <header id="masthead">
        <h1>GameX</h1>
        <nav>
            <ul>
                <li><a href="main.html">Home</a></li>
                <li><a href="newAccount.html">Create an account</a></li>
                <li><a href="login-signin.html">Login</a></li>
            </ul>
        </nav>
    </header>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h3>Account Created.</h3><br><br>";
        echo "<a href=\"login-signin.html\">Login Page</a>";
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
      if (isset($_POST["firstname"]))
        $first_name = $_POST["firstname"];
      if (isset($_POST["lastname"]))
        $last_name = $_POST["lastname"];
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
          echo "<p>User already exists with this name and/or email<p>";
          if (isset($return_link))
          {
            echo '<a href="'.$return_link.'">Return to user entry</a>';
          }
        }
        else {
          $sql = "INSERT INTO users (username, firstname, lastname, email, password) values ('$user_name','$first_name','$last_name','$email',md5('$password'));";
            if (mysqli_query($connection, $sql))
            {
              $count = mysqli_affected_rows($connection);
              echo "<p>An account for the user $user_name has been created</p>";
            }
        }
        mysqli_free_result($results);

    }
    else {
      echo "<p>Bad information has been entered</p>";
      if (isset($return_link))
      {
        echo '<a href="'.$return_link.'">Return to user entry</a>';
      }
    }

    mysqli_close($connection);
}
    }

    else if ($_SERVER["REQUEST_METHOD"] == "GET"){
        echo "<h3>GET method is not supported!</h3>";
    } 

    else {
        echo "<h3>ERROR!!</h3>";
    }

?>

<footer>
    </footer>
</body>
</html>