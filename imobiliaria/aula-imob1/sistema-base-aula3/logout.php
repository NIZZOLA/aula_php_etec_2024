<?php
// Remove o cookie
setcookie("loggedin", "", time() - 3600, "/");
header("Location: login.php");
exit;
?>
