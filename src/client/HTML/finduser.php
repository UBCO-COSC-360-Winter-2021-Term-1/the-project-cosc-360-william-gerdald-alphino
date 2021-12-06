
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <script type="text/javascript" src="scripts/validate.js"></script>
    <title>Admin</title>
</head>
<body>
    <header id="masthead">
        <h1>GameX</h1>
        <nav>
            <ul>
                <li><a href="main.html">Home</a></li>
                <li><a href="createpost.html">Make New Post</a></li>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<li><a href=\"logout.html\">Logout</a></li></ul></nav></header>";
        echo "<h3>User detail of ".$_POST["username"].": </h3><br><br>";
        echo "<a href=\"admin.html\">Go To Previous Page</a><br><br>";
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