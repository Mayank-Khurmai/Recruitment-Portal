<?php
    session_start();
    if(!isset($_SESSION['adminmail']))
    {
        header("Location: admin-panel-login-page.php");
    }
    $xx="";
    if($_SESSION['role']=="Member")
    {
        $xx = "disabled='disabled'";
    }
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>OSS Recruitment</title>
    <link rel="icon" href="../images/logo.png" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin-css.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
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
    <div class="section-div-one">
        <div class="section-div-one-preview" id="output-box">

            <div class="preview-output" id="view-all-ajax-preview-output">
            
                        <div id='my-admin-loader-output'> 
                            <div class='my-admin-loader-div'>
                                <div class='admin-loader-logo-text'>OSS</div>
                                <div class='admin-loader'></div>
                            </div>
                        </div>
                        

            </div>

        </div>
    </div>

    <div class="section-div-two" style="border-left:2px solid black">
        <div class="user-profile-div">
            <div class="user-profile-div-image"></div>
            <div class="user-profile-div-fname">
                 Welcome Admin
            </div>
            <div class="user-profile-div-id">
                <?php echo $_SESSION['adminmail']; ?>
            </div>    
        </div>
        <div class="category-grid">
            Select Category
        </div>
        <div class="category-no">
            <div class="category-option admin-preview-index" id="admin-home">
                <button style="border: 1px solid rgb(163, 163, 163); background-color: royalblue;">Admin Home</button>
            </div>
            <div class="category-option admin-preview-index" id="view-all-user">
                <button>View all Users</button>
            </div>
            <div class="category-option admin-preview-index" id="view-approved-users">
                <button>Approved Users</button>
            </div>
            <div class="category-option admin-preview-index" id="view-pending-users">
                <button>Pending Approval</button>
            </div>
            <div class="category-option admin-preview-index" id="email-all-user">
                <button>E-mail to all Users</button>
            </div>
            <div class="category-option admin-preview-index" id="email-single-user">
                <button>E-mail to Single User</button>
            </div>
            <div class="category-option admin-preview-index" id="view-final-result">
                <button>Show Final Result</button>
            </div>
            <div class="category-option admin-preview-index" id="view-detailed-result">
                <button>Show Detailed Result</button>
            </div>
            <div class="category-option admin-preview-index" id="view-all-questions">
                <button>View all Questions</button>
            </div>
            <div class="category-option admin-preview-index" id="add-question">
                <button>Add Question</button>
            </div>
            <div class="category-option admin-preview-index" id="edit-questions">
                <button>Edit Question</button>
            </div>
            <div class="category-option admin-preview-index" id="delete-questions">
                <button>Delete Questions</button>
            </div>
            <div class="category-option admin-preview-index" id="remove-student">
                <button>Remove Student</button>
            </div>
            <div class="category-option admin-preview-index" id="edit-student-details">
                <button>Edit Student Details</button>
            </div>
            <div class="category-option admin-preview-index" id="view-admin-members">
                <button>View Admin Members</button>
            </div>
            <div class="category-option admin-preview-index" id="add-admin-members">
                <button <?php echo $xx; ?>>Add Admin Members</button>
            </div>
            <div class="category-option admin-preview-index" id="remove-admin-members">
                <button <?php echo $xx; ?>>Remove Admin Members</button>
            </div>
            <div class="category-option admin-preview-index" id="set-date-time">
                <button>Set Exam Date/Time</button>
            </div>
        </div>
    </div>   
</section>
<!-- Section Coding End -->



<!-- Footer Coding Start -->
<footer>
    <div class="all-admin-btn">
        <button id="print" disabled="disabled">Print</button>
        <button id="download" disabled="disabled">Download</button>
        <button id="index-mail-btn">E-mail</button>
    </div>
    <div class="final-logout-btn-div">
        <div class="final-logout-btn-div-div">
            <input type="submit" value="Logout" id="logout-btn">
        </div>
    </div>
</footer>
<!-- Footer Coding End -->



</div>
<!-- Main Body Coding End-->


<script src="../js/admin-main.js"></script>


</body>
</html>