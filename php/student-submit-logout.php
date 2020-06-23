<?php

session_start();
$_SESSION['usermail'] = "";
session_destroy();
header("Location: thank-you.php");
?>