<?php 
session_start();
$username = $_POST["username"];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $host = "localhost";
    $database = "gamex";
    $user = "webuser";
    $password = "P@ssw0rd";

    $connection = mysqli_connect($host, $user, $password, $database);
    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
       
        $sql = $connection->prepare("SELECT username, email FROM users WHERE username = '$username'");
        $sql->execute();
        $complete = $sql->get_result();
        $entered = $complete->fetch_assoc();

        while ($entered) {

            echo " 
            <fieldset>
            <legend>User: " . $entered['username'] . "</legend>
            <table>
                <tr><td>user name:</td><td>" . $entered['username'] . "</td></tr>
                <tr><td>Email:</td><td>" . $entered['email'] . "</td></tr>
            </table>
            </fieldset>";
            mysqli_free_result($complete);
            mysqli_close($connection);
            die;
        }
        echo "cannot find user";
        mysqli_free_result($complete);
        mysqli_close($connection);
        die;
    }
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    die("Unable to get data!");
}
