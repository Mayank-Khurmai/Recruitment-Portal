function form(){
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
                document.getElementById("submit-div-btn").innerHTML = "<div id='login-check'></div>";
            },
            success: function(response)
            {
              if(response.trim()=="success"){
                window.location = "php/student-after-login.php";
              }
              else{
                document.getElementById("submit-div-btn").innerHTML = "Login";
                document.getElementById("error-msg").style.display = "block";
              }
              return false;
            }
        });
    });
}


$(document).ready(function(){
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
                document.getElementById("submit-div-btn").innerHTML = "<div id='login-check'></div>";
            },
            success: function(response)
            {
              if(response.trim()=="success"){
                window.location = "php/student-after-login.php";
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


$(document).ready(function(){
    var m = Number($('#m-span').html());
    var s = Number($('#s-span').html());
    setInterval(() => {
        if(s<10)
        {
            if(s<0)
            {
                s=59;
                m--;
                $("#s-span").html(s);
                if(m<10){
                    $("#m-span").html('0'+m);   
                }
                else{
                    $("#m-span").html(m);
                }
            }
            else
            {
                $("#s-span").html('0'+s);
            }
        }
        else
        {
            $("#s-span").html(s);
        }
        s--;
        if(s==0){check_date()}
    }, 1000);
});


function check_date(){
    $.ajax({
        type : "POST",
        url  : "php/student-index-check-date.php",
        data :  {},
        cache : false,
        processType : true,
        success : function(response){
            $('.login-form-div').html(response);
            form();
        }
    }); 
}
