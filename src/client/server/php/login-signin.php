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
                session_start();
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    echo "<li><a href=\"logout.html\">Logout</a></li></ul></nav></header>";
                    echo "<h3>You are now logged in!</h3><br><br>";
                    echo "<a href=\"createPost.html\">Create a new Post</a><br><br>";
                    echo "<a href=\"editProfile.html\">Edit your profile</a><br><br>";
                    $host     = "localhost";
                    $database = "GameX";
                    $user     = "webuser";
                    $password = "P@ssw0rd";
                    $connection = mysqli_connect($host, $user, $password, $database);

                    $username = mysqli_real_escape_string($db, $_POST['username']);
                    $password = mysqli_real_escape_string($db, $_POST['password']);


                    if (empty($username)) {
                        array_push($errors, "Username is required");
                    }
                    if (empty($password)) {
                        array_push($errors, "Password is required");
                    }
                    if (isset($_POST["username"])) {
                        $user_name = $_POST["username"];
                    }

                    if (isset($_POST["password"])) {
                        $password = $_POST["password"];
                        $password_hash = md5($password);
                    }

                    if (count($errors) == 0) {
                        $password = md5($password);
                        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                        $results = mysqli_query($connection, $query);
                        if (mysqli_num_rows($results) == 1) {
                            $_SESSION['username'] = $username;
                            $_SESSION['success'] = "You are now logged in";
                            header('location: index.php');
                        } else {
                            echo "<p>Incorrect Username/password.</p>";
                            if (isset($return_link)) {
                                echo '<a href="' . $return_link . '">Return to user entry</a>';
                            }
                            
                        }
                    }
                } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    echo "<h3>GET method is not supported!</h3>";
                } else {
                    echo "<h3>ERROR!!</h3>";
                }

                ?>


</body>

</html>