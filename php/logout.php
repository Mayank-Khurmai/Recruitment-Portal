<?php

session_start();
$_SESSION['adminmail'] = "";
session_destroy();
header("Location: admin-panel-login-page.php");

?>