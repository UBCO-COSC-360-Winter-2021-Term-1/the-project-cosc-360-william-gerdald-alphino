<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/form.css">
    <script type="text/javascript" src="scripts/validate.js"></script>
    <title>Login</title>
</head>
<body>
    <header id="masthead">
        <h1>GameX</h1>
        <nav>
            <ul>
                <li><a href="main.html">Home</a></li>
                <li><a href="CreatePost.html">Make New Post</a></li>
                <li><a href="editProfile.html">Edit your profile</a></li>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<li><a href=\"logout.html\">Logout</a></li></ul></nav></header>";
        echo "<h3>You are now logged in!</h3><br><br>";
        echo "<a href=\"createPost.html\">Create a new Post</a><br><br>";
        echo "<a href=\"editProfile.html\">Edit your profile</a><br><br>";
    }

    else if ($_SERVER["REQUEST_METHOD"] == "GET"){
        echo "<h3>GET method is not supported!</h3>";
    } 

    else {
        echo "<h3>ERROR!!</h3>";
    }

?>


</body>
</html>