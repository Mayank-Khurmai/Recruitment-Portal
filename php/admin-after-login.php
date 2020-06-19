<?php
    session_start();
    if(!isset($_SESSION['adminmail']))
    {
        header("Location: admin-panel-login-page.php");
    }
    else
    {
        header("Location: admin-home.php");
    }
?>