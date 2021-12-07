<?php
// an easy way to prevent users from browsing server folders without using .htaccess
header("Location: main.php");
exit();
?>