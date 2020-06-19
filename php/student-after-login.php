<?php
    session_start();
    if(!isset($_SESSION['usermail']))
    {
        header("Location: ../index.php");
    }
    else
    {
        header("Location: student-home.php");
    }
?>