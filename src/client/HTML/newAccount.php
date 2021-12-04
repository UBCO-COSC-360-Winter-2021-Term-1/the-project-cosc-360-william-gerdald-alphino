
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <script type="text/javascript" src="scripts/validate.js"></script>
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