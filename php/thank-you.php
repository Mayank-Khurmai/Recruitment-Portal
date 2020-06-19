<?php
    session_start();
    if(!isset($_SESSION['usermail']))
    {
        header("Location: instructions.php");
    }
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>OSS Recruitment</title>
    <link rel="icon" href="../images/logo.png" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/thank-you.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/main.js"></script>
</head>
<body>


<!-- Main Body Coding Start-->
<div id="full-body-admin-home">

<!-- Nav Bar Coding Start-->
<div class="navbar-div">
        <div class="logo-name-div">
            <div style="float:left"><img src="../images/logo.png" width="40px" height="40px" style="border-radius:50%"></div>
            <div style="float:left; padding:5px">Open Source Software Research &amp; Development Centre</div>
        </div>
</div>
<!-- Nav Bar Coding End-->



<!-- Section Coding Start -->
<section>
    <div class="section-div">
           <div class="thank-you-div">THANK&nbsp;&nbsp;YOU</div>
    </div>   
</section>
<!-- Section Coding End -->



<!-- Footer Coding Start -->
<footer>
   
</footer>
<!-- Footer Coding End -->



</div>
<!-- Main Body Coding End-->


</body>
</html>