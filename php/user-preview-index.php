<?php

session_start();
if(!isset($_SESSION['usermail']))
{
    header("Location: ../index.php");
}
else
{
    $purpose = $_POST['purpose'];
    if($purpose=="only-visit")
    {
        require("user-preview-only-visit.php");
    }
    
    else if($purpose=="save-and-next")
    {
        require("user-preview-save-and-next.php");
    }

    else if($purpose=="save-and-review")
    {
        require("user-preview-save-and-review.php");
    }

    else if($purpose=="clear-response")
    {
        require("user-preview-clear-response.php");
    }

    else
    {
        echo "somthing went erong";
    }
    
}

?>