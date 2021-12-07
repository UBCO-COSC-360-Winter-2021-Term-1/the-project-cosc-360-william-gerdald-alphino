<?php 
define('DBSERVER', 'localhost'); 
define('DBUSERNAME','root');
define('DBPASSWORD','');
define('DBNAME', 'demo');

$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBUSERNAME); 

if($db == false){ 
    die("Error: connection error." .mysqli_connect_error());
}

?>