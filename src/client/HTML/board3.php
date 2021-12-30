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
    <title>Soccer Game Thread
    </title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
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
    <div>
        <a href="main.html">Go Back</a>
        <br>
        <br>
    </div>

    <div id="post">
        <img src="../img/soccer.jpeg" alt="image1">
        <div>
            <h3>This is a soccer game</h3>
            <span>By Alvin</span>
            <span> Dec 3, 2021</span>
<p>
I love soccer</p>
        </div>
    </div>

    <hr>

    <div id="comments-section">
        <div class="comment">
            <h4 id='author'>Elvin</h4>
            <p id=comments>What teams are included</p>
            
        </div>
        <div class="comment">
            <h4>Allvin</h4>
            <p>cant wait to try it</p>
            
        </div>
        <div class="comment">
            <h4>HeroDude</h4>
            <p>TROLOLOLOL</p>
            
        </div>
    </div>

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