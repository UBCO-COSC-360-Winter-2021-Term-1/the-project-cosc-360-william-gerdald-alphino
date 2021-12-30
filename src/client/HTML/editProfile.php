<?php
    session_start();

    if (isset($_SESSION["username"]))
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <script type="text/javascript" src="scripts/validate.js"></script>
    <title>Edit Profile Page</title>
</head>
<body>
    <header id="masthead">
        <h1>GameX</h1>

        <nav>
            <ul>
                <li><a href="main1.php">Home</a></li>
                <li><a href="login-signin.html">Logout</a></li>
            </ul>
        </nav>
    </header>
    <hr>
    <form method="post" action="editProfile.php" id="form" >
    username:<br>
        <input type="text" name="username" id="username">
        <br><br>
     >
        <br><br>
        Old Password:<br>
        <input type="text" name="old-password" id="old-password">
        <br>
        New Password::<br>
        <input type="text" name="new-password" id="new-password">
        <br><br>
        New Profile Image:<br>
        <input type="file" name="new-image" id="new-image">
        <br>
        <br>
        <input type="submit" value="Update your profile!">
        <br><br>
    </form>
    <hr><br>
  
    <br><br>
    <footer>
    </footer>
</body>
</html>
<?php
    }
    else
    {

        header("Location: main.html");
        exit();
    }
?>