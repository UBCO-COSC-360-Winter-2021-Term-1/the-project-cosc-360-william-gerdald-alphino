<?php  
$username = $_POST["username"];
$password = md5($_POST["password"]);
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
        $sql = $connection->prepare("SELECT username FROM users WHERE username = '$username' and password = '$password'");
        $sql->execute();
        $complete = $sql->get_result();
        $entered = $complete->fetch_assoc();

        while ($entered){
            echo "WELCOME " . $entered['username'] . "!";
            mysqli_free_result($complete);
            mysqli_close($connection);
            die; 
        }
        echo "wrong username or password entered";
        mysqli_free_result($complete);
        mysqli_close($connection);
        die;
    }
} 
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    die("Unable to get data!");
}
?>