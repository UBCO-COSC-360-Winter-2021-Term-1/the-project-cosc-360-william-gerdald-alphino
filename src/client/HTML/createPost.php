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
    <title>New Post Page</title>
</head>
<body>
    <header id="masthead">
        <h1>GameX</h1>

        <nav>
            <ul>
                <li><a href="../HTML/main1.php">Home</a></li>
                <li><a href="../HTML/logout.html">Logout</a></li>
            </ul>
        </nav>
    </header>

    <h3>New Post!</h3>
    <form method="post" action="../server/newpost.php" id="form" >
        Author:
        <input type="text" name="author" id="author"><br>
        Category:
        <select name="category" id="category">
            <option value="Shooting">Shooting</option>
            <option value="Sports">Sports</option>
            <option value="Horror">Horror</option>
            <option value="Simulation">Simulation</option>
            <option value="Indie">Indie</option>
        </select>
        <br>
        <textarea name="textarea" id="textarea" cols="125" rows="20"></textarea><br><br>
        <br><br>
        <input type="submit" value="Post" id="submit"><br><br>
    </form>
    <footer>
        <p>Join us on Discord!</p>
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