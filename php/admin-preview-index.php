<?php

session_start();
if(!isset($_SESSION['adminmail']))
{
    header("Location: admin-panel-login-page.php");
}
else
{
    
    $request = $_POST['request'];

    if($request=="view-all-user")
    {
        require("admin-preview-view-all-user.php");       
    }

    else if($request=="add-question")
    {
        require("admin-preview-add-question.php");       
    }

    else if($request=="view-all-questions")
    {
        require("admin-preview-view-all-questions.php");       
    }

    else if($request=="email-all-user")
    {
        require("admin-preview-email-all-user.php");      
    }

    else if($request=="delete-questions")
    {
        require("admin-preview-delete-questions.php");       
    }
    
    else if($request=="view-final-result")
    {
        require("admin-preview-view-final-result.php");      
    }
    
    else if($request=="view-detailed-result")
    {
        require("admin-preview-view-detailed-result.php");      
    }

    else if($request=="email-single-user")
    {
        require("admin-preview-email-single-user.php");      
    }

    else if($request=="view-approved-users")
    {
        require("admin-preview-view-approved-user.php");      
    }
    
    else if($request=="edit-student-details")
    {
        require("admin-preview-edit-student-details.php");      
    }
    
    else if($request=="remove-admin-members")
    {
        require("admin-preview-remove-admin-members.php");      
    }
    
    else if($request=="view-pending-users")
    {
        require("admin-preview-view-pending-user.php");      
    }
    
    else if($request=="view-admin-members")
    {
        require("admin-preview-view-admin-members.php");      
    }
    
    else if($request=="add-admin-members")
    {
        require("admin-preview-add-admin-members.php");      
    }
    
    else if($request=="edit-questions")
    {
        require("admin-preview-edit-questions.php");      
    }
    
    else if($request=="set-date-time")
    {
        require("admin-preview-set-date-time.php");      
    }

    else if($request=="remove-student")
    {
        require("admin-preview-remove-student.php");       
    }
    
    else{
        echo "<div id='my-admin-loader-output'> 
                <div class='my-admin-loader-div'>
                    <div class='admin-loader-logo-text'>OSS</div>
                    <div class='admin-loader'></div>
                </div>
             </div>
            ";
    }
}
 


?>