<?php 
session_start();
$username = $_POST["username"];
$oldpassword = md5($_POST["oldpassword"]);
$newpassword = md5($_POST["newpassword"]);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
// $host     = "localhost";
// $database = "gamex";
// $user     = "valvin";
// $password = "P@ssword!";
$host = "localhost";
$database = "db_94461811";
$user = "db_94461811";
$password = "db_94461811";
    $connection = mysqli_connect($host, $user, $password, $database);
    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Cant access database</p>";
        exit($output);
    } else {
        $sql = $connection->prepare("SELECT username FROM users WHERE username = '$username' and password = '$oldpassword'");
        $sql->execute();
        $complete = $sql->get_result();
        $entered = $complete->fetch_assoc();

        while ($entered) {
            $sql = $connection->prepare("UPDATE users SET password = '$newpassword' WHERE username = '$username' and password = '$oldpassword'");
            if ($sql->execute()) {
                echo "password has been changed";
                mysqli_free_result($complete);
                mysqli_close($connection);
                die;
            }
        }
        echo "error with pasword";
        mysqli_free_result($complete);
        mysqli_close($connection);
        die;
    }
}
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    die("fatal error");
}
