<?php 
$username = $_POST["username"];
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
        $output = "<p>error with database</p>";
        die($output);
    } else {
       
        $sql = $connection->prepare("SELECT username, email FROM users WHERE username = '$username'");
        $sql->execute();
        $complete = $sql->get_result();
        $entered = $complete->fetch_assoc();

        while ($entered) {
          $sql = "DELETE FROM user WHERE username= $entered[username]";

if ($conn->query($sql) === TRUE) {
 
   echo "user deleted";
    } else {
   echo "Error deleting record: " . $conn->error;
      }
    

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
    die("Unable to get data");
}
