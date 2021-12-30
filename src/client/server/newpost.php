<?php

$host     = "localhost";
$database = "gamex";
$user     = "webuser";
$password = "P@ssw0rd!";


$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}
else

$query = "INSERT INTO `post`(`author`, `category`,`post`) VALUES ('$author','$category','$post')";

$run = mysqli_query($connect, $query);
    echo $author;
    echo $category;
    echo $post;
    echo "post added";
    echo "<br/><a href='../html/main1.php' title='Go Home'><--Go Home</a>";


?>