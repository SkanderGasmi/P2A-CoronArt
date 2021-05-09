<?php
session_start();
setcookie('email',"",-3600);
setcookie('email',"",-3600);
session_destroy();
header('Location:index.php');;
?>