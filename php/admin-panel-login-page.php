<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>OSS Recruitment</title>
    <link rel="icon" href="images/logo.png" type="image/icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main5.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
</head>
<body onload="onbodcyload()">
  
<!-- Loader Coding Start
<div id="my-loader">
        <div class="my-loader-div">
            <img src="images/logo.png" class="loader-logo" alt="FLUX">
        <div class="loader"></div>
        </div>
</div>
 Loader Coding End-->



<!-- Main Body Coding Start-->

<!-- Nav Bar Coding Start-->
<div class="navbar-div">
        <div class="logo-name-div">
            <div style="float:left"><img src="../images/logo.png" width="40px" height="40px" style="border-radius:50%"></div>
            <div style="float:left; padding:5px">Open Source Software Research &amp; Development Centre</div>
        </div>
</div>
<!-- Nav Bar Coding End-->


<div id="full-body">

    <div class="login-form-div">
        <div class="heading-div">
            <span class="confirm-login-heading">Confirm Admin Credentials</span>
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
                <br>
                <div class="pass-form-div">
                    <div class="user-key-div"> 
                    </div>
                    <div class="user-key-input-div"> 
                        <input type="password" id="input-pass" placeholder="Password">
                    </div>
                </div>
                <br>
                <div class="pass-form-div">
                    <div class="user-key-div"> 
                    </div>
                    <div class="user-key-input-div"> 
                        <input type="password" id="input-key" placeholder="Master Key">
                    </div>
                </div>
                <br>
                <div class="submit-div">
                    <button type="submit" id="submit-div-btn">Login</button>
                </div>
                <div class="loading-error-div">
                    <span id="error-msg">Invalid Login! Please try Again...</span>
                </div>
            </form>
        </div>

    </div>

</div>


<!-- Footer Coding Start -->
<footer class="footer-div-design"></footer>
<!-- Footer Coding End -->

<!-- Main Body Coding End-->

<!-- jQuery Coding Start-->

<script>

$(document).ready(function() {
    $('#submit-div-btn').click(function(e){
        e.preventDefault();
        $.ajax({
            type : "POST",
            url  : "admin-login-check.php",
            data : {
                    username: btoa($("#input-mail").val()),
                    password: btoa($("#input-pass").val()),
                    secretkey: btoa($("#input-key").val())
            },
            cache : false,
            beforeSend : function(){
                    document.getElementById("submit-div-btn").innerHTML = "<div id='login-check'></div>";
            },
            success: function(response)
            {
              if(response.trim()=="success"){
                window.location = "admin-after-login.php";
              }
              else{
                document.getElementById("submit-div-btn").innerHTML = "Login";
                document.getElementById("error-msg").style.display = "block";
              }
              return false;
            }
        });
    });
});

</script>

<!-- jQuery Coding Start-->
</body>
</html>