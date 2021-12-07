<?php 
# check if user is already logged in, if yes redirect to edit profile
session_start();

if(isset($_session["userid"]) && $_session["userid"]=== true){ 
    header("location: editProfile.php");
    exit;
}
?>
