<?php
    session_start();
    if(!isset($_SESSION['usermail']))
    {
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>OSS Recruitment</title>
    <link rel="icon" href="../images/logo.png" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main5.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/main.js"></script>
</head>
<body onload="onbodyloadtimestart()">

<!-- Blurr Instruction Coding Start -->

<div class="blurr-div-outer-box">
    <div class="instruction-div-outer-box">
        <div style="text-align:center;">
            <h2 style="color:red">Instructions</h2>
        </div>
        <div>
            <ul>
                <li>All questions are compulsory.</li>
                <li>Total duration of exam is 2 Hours.</li>
                <li>Violation of any rule may lead to disqualify.</li>
                <li>Do not try to minimize the Window Screen during Exam.</li>
                <li><div style="width:10px; height:10px; background-color:white; display:inline-block"></div> White Box - Already visited the question.</li>
                <li><div style="width:10px; height:10px; background-color:green; display:inline-block"></div> Green Box - Answer marked is final.</li>
                <li><div style="width:10px; height:10px; background-color:blue; display:inline-block"></div> Blue Box - Answer is saved and marked for review.</li>
            </ul>   
        </div>
        <div style="text-align:center;">
            <button class="test-start-btn" onclick="test_start_fun();">Start Now</button>
        </div>
    </div>
</div>

<!-- Blurr Instruction Coding End -->


<!-- Main Body Coding Start-->
<div id="full-body-home">

<!-- Nav Bar Coding Start-->
<div class="navbar-div">
        <div class="logo-name-div">
            <div style="float:left"><img src="../images/logo.png" width="40px" height="40px" style="border-radius:50%"></div>
            <div style="float:left; padding:5px">Open Source Software Research &amp; Development Centre</div>
            <div style="float:right; padding:5px">Time Left &nbsp;<b>
                <!-- <span id="minute-span">60</span> : <span id="second-span">00</span></b> -->
                <?php

                require("student-time-remain.php");

                ?>
            </div>
        </div>
</div>
<!-- Nav Bar Coding End-->



<!-- Section Coding Start -->
<section>
    <div class="section-div-one">
        <div class="instructions-div">
            <div class="instructions-heading-div" id="test">Instructions</div>
            <ul>
                <li>All questions are compulsory.</li>
                <li>Total duration of exam is 2 Hours.</li>
                <li>Violation of any rule may lead to disqualify.</li>
                <li><div style="width:10px; height:10px; background-color:white; display:inline-block"></div> White Box - Already visited the question.</li>
                <li><div style="width:10px; height:10px; background-color:green; display:inline-block"></div> Green Box - Answer marked is final.</li>
                <li><div style="width:10px; height:10px; background-color:blue; display:inline-block"></div> Blue Box - Answer is saved and marked for review.</li>
            </ul>
        </div>
        <div class="question-display-div">
            <div class="question-display-div-main">
               <div class="question-display-div-main-left" id="quesno-preview">
                <span id="quesno-preview-span"></span><span id="quesno-preview-span-b"></span>
                </div>
                <div class="question-display-div-main-right">
                    <div class="main-question" id="question-preview">
                        
                    </div>
                    <div class="main-question-option-div">
                        <div class="main-question-option-radio-div">
                            <input type="radio" name="radio_option" value="1" class="all-radio" id="radio-a-ans">
                            <input type="checkbox" name="optiona_check" value="1" class="all-checkbox" id="check-a-ans">
                        </div>
                        <div class="main-question-option-abcd-div" id="optiona-preview">
                            
                        </div>
                    </div>

                    <div class="main-question-option-div">
                        <div class="main-question-option-radio-div">
                            <input type="radio" name="radio_option" value="2" class="all-radio" id="radio-b-ans">
                            <input type="checkbox" name="optionb_check" value="2" class="all-checkbox" id="check-b-ans">
                        </div>
                        <div class="main-question-option-abcd-div" id="optionb-preview">
                            
                        </div>
                    </div>

                    <div class="main-question-option-div">
                        <div class="main-question-option-radio-div">
                            <input type="radio" name="radio_option" value="3" class="all-radio" id="radio-c-ans">
                            <input type="checkbox" name="optionc_check" value="3" class="all-checkbox" id="check-c-ans">
                        </div>
                        <div class="main-question-option-abcd-div" id="optionc-preview">
                            
                        </div>
                    </div>

                    <div class="main-question-option-div">
                        <div class="main-question-option-radio-div">
                            <input type="radio" name="radio_option" value="4" class="all-radio" id="radio-d-ans"> 
                            <input type="checkbox" name="optiond_check" value="4" class="all-checkbox"  id="check-d-ans">       
                        </div>
                        <div class="main-question-option-abcd-div" id="optiond-preview">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-div-two">
        <div class="user-profile-div">
            <div class="user-profile-div-image"></div>
            <?php require("student-details.php"); ?>    
        </div>
        <div class="questions-grid">
            Questions Grid
        </div>
        <div class="question-no">


            <?php

            require("student-question-logo.php");

            ?>

            
        </div>
    </div>   
</section>
<!-- Section Coding End -->



<!-- Footer Coding Start -->
<footer>
    <div class="all-btn">
        <button id="save-and-next">Save and Next</button>
        <button id="save-and-review">Save Review and Next</button>
        <button id="clear-response">Clear Response and Next</button>
    </div>
    <div class="final-submit-btn-div">
        <div class="final-submit-btn-div-div">
            <input type="submit" value="Submit">
        </div>
    </div>
</footer>
<!-- Footer Coding End -->



</div>
<!-- Main Body Coding End-->


</body>
</html>