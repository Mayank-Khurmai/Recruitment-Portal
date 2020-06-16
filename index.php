<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>OSS Recruitment</title>
    <link rel="icon" href="images/logo.png" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main5.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body onload="onbodyload()">
  
<!-- Loader Coding Start
<div id="my-loader">
        <div class="my-loader-div">
            <img src="images/logo.png" class="loader-logo" alt="FLUX">
        <div class="loader"></div>
        </div>
</div>
 Loader Coding End-->



<!-- Main Body Coding Start-->
<div id="full-body">

    <div class="login-form-div">
        <div class="heading-div">
            <span class="confirm-login-heading">Confirm your Credentials</span>
        </div>
        <div class="user-logo-div"></div>
        <div class="form-div">
            <form method="post">
                <div class="email-form-div">
                    <div class="user-id-div"> 
                    </div>
                    <div class="user-id-input-div"> 
                        <input type="email" id="input-mail" placeholder="Email Id">
                    </div>
                </div>
                <br><br>
                <div class="pass-form-div">
                    <div class="user-key-div"> 
                    </div>
                    <div class="user-key-input-div"> 
                        <input type="password" id="input-pass" placeholder="Password">
                    </div>
                </div>
                <br><br>
                <div class="submit-div">
                    <button type="submit" id="submit-div-btn">Login</button>
                </div>
                <div class="loading-error-div">
                    <span id="error-msg">Invalid Login! Please try Again...</span>
                    <div id="login-check"></div> 
                </div>
            </form>
        </div>

        <div class="oss-name-div">
              <span class="oss-name-text">Open Source Software Research &amp; Development Centre</span>   
        </div>
    </div>

</div>
<!-- Main Body Coding End-->

<!-- jQuery Coding Start-->

<script>

$(document).ready(function() {
    $('#submit-div-btn').click(function(e) {
        e.preventDefault();
        $.ajax({
            type : "POST",
            url  : "php/student-login-check.php",
            data : {
                    username : btoa($("#input-mail").val()),
                    password : btoa($("#input-pass").val())
            },
            cache : false,
            beforeSend : function(){
                    document.getElementById("login-check").style.display = "block";
            },
            success: function(response)
            {
              if(response.trim()=="success"){
                document.getElementById("login-check").style.display = "none";
                window.location = "php/student-after-login.php";
              }
              else{
                document.getElementById("login-check").style.display = "none";
                document.getElementById("error-msg").style.display = "block";
              }
              return false;
            }
        });
    });
});

    
    
function delete_question(){
    $('.del-question').click(function(){
        $.ajax({
            type : "POST",
            url  : "admin-preview-delete-questions-sub.php",
            data : {
                quesid  : $(this).attr("data")
            },
            cache : false,
            processType : true,
            success : function(response){
                if(response=="success")
                {
                    $('#delete-questions').click();
                }
            }
        });
    });
}
</script>

<!-- jQuery Coding Start-->
</body>
</html>
