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


                    $host     = "localhost";
                    $database = "GameX";
                    $user     = "webuser";
                    $password = "P@ssw0rd";

                    $connection = mysqli_connect($host, $user, $password, $database);

                    $error = mysqli_connect_error();
                    if ($error != null) {
                        $output = "<p>Unable to connect to database!</p>";
                        exit($output);
                    } else {
                        //get data from POST (last week)
                        //print_r($_POST);
                        if (isset($_SERVER["REQUEST_METHOD"]) &&  $_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST["username"]))
                                //echo $_POST["key"];
                                $user_name = $_POST["username"];

                            //check to see if user exists (based on username)
                            //good connection, so do you thing

                            //hash the password before checking
                            $sql = "SELECT * FROM users where username = '$user_name';";

                            $results = mysqli_query($connection, $sql);

                            echo "<fieldset><legend>User: $user_name</legend>";
                            echo "<table id=\"usertable\">";
                            //and fetch requsults
                            if ($row = mysqli_fetch_assoc($results)) {
                                echo "<tr><td>First Name:</td><td>" . $row['firstName'] . "</td></tr>";
                                echo "<tr><td>Last Name:</td><td>" . $row['lastName'] . "</td></tr>";
                                echo "<tr><td>Email:</td><td>" . $row['email'] . "</td></tr>";
                            } else {
                                echo "<tr><td>Invalid username and/or password</tr></td>";
                            }
                            echo "</table>";
                            echo "</fieldset>";
                            if (isset($return_link)) {
                                echo '<a href="' . $return_link . '">Return to user entry</a>';
                            }
                            mysqli_free_result($results);
                        } else {
                            //redirect
                            echo "<p>Bad information has been entered</p>";
                        }

                        mysqli_close($connection);
                    }
                } else if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    echo "<h3>GET method is not supported!</h3>";
                } else {
                    echo "<h3>ERROR!!</h3>";
                }

                ?>

                <footer>
                </footer>
</body>

</html>