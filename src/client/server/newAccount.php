<?php git
$email = $_POST['email'];
$username = $_POST['username'];
$password = md5($_POST['password']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
       
        $sql1 = $connection->prepare("INSERT INTO users(username, email, password) VALUE ('$username', '$email', '$password')");
        if ($sql1->execute()) {
            echo "user created";
        } else {
            echo "user already exists";
        }
        mysqli_close($connection);
        die;
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    die("did not get data yet");
}
?>
