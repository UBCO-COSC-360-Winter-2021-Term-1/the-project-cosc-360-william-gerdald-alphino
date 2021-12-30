<?php

  session_start();

    if (isset($_SESSION["username"]))
    {
        $logged_in  = true;
    }
    else
    {
        $logged_in = false;
    }

    if (!$logged_in)
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
        Old username:<br>
        <input type="text" name="old-username" id="old-username">
        <br>
        New username:<br>
        <input type="text" name="new-username" id="new-username">
        <br><br>
        Old E-mail:<br>
        <input type="email" name="old-email" id="old-email">
        <br>
        New E-mail:<br>
        <input type="email" name="new-email" id="new-email">
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
    <form method="post" action="close-account.php" id="form" >
        <input type="submit" value="Close your account">
    </form>
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