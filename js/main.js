function onbodyloadstart(){
    var docElm = document.documentElement;
        if (docElm.requestFullscreen) {
            docElm.requestFullscreen();
        }
        else if (docElm.mozRequestFullScreen) {
            docElm.mozRequestFullScreen();
        }
        else if (docElm.webkitRequestFullScreen) {
            docElm.webkitRequestFullScreen();
        }
}

$(document).ready(function(){
    setInterval(() => {
        var docElm = document.documentElement;
        if (docElm.requestFullscreen) {
            docElm.requestFullscreen();
        }
        else if (docElm.mozRequestFullScreen) {
            docElm.mozRequestFullScreen();
        }
        else if (docElm.webkitRequestFullScreen) {
            docElm.webkitRequestFullScreen();
        }
    }, 100);
});


$(document).ready(function(){
    $('.ques-no-id').click(function(){
        var question = $(this).attr('question');
        var quesno = $(this).attr('quesno');
        var quesid = $(this).attr('quesid');
        var visited = $(this).attr('visited');
        var reviewed = $(this).attr('reviewed');
        var marked = $(this).attr('marked');
        var optiona = $(this).attr('optiona');
        var optionb = $(this).attr('optionb');
        var optionc = $(this).attr('optionc');
        var optiond = $(this).attr('optiond');
        var option_a_ans = $(this).attr('option_a_ans');
        var option_b_ans = $(this).attr('option_b_ans');
        var option_c_ans = $(this).attr('option_c_ans');
        var option_d_ans = $(this).attr('option_d_ans');
        var isradiobox = $(this).attr('isradiobox');
        
        $("#quesno-preview-span").attr("quesid", quesid);
        $("#quesno-preview-span").attr("quesno", quesno);
        $("#quesno-preview-span").attr("isradio", isradiobox);
        document.getElementById("quesno-preview-span").innerHTML = quesno;
        document.getElementById("quesno-preview-span-b").innerHTML = ")";
        document.getElementById("question-preview").innerHTML = question;
        document.getElementById("optiona-preview").innerHTML = optiona;
        document.getElementById("optionb-preview").innerHTML = optionb;
        document.getElementById("optionc-preview").innerHTML = optionc;
        document.getElementById("optiond-preview").innerHTML = optiond;
        if(isradiobox==1)
        {
            $('.all-checkbox').css("display","none");
            $('.all-radio').css("display","block");
            $('#radio-a-ans, #radio-b-ans, #radio-c-ans, #radio-d-ans').prop("checked", false);
            if(option_a_ans==1)
            {
                $('#radio-a-ans').prop("checked", true);
            }
            if(option_b_ans==1)
            {
                $('#radio-b-ans').prop("checked", true);
            }
            if(option_c_ans==1)
            {
                $('#radio-c-ans').prop("checked", true);
            }
            if(option_d_ans==1)
            {
                $('#radio-d-ans').prop("checked", true);
            }
        }
        else
        {
            $('.all-radio').css("display","none");
            $('.all-checkbox').css("display","block");
            $('#check-a-ans, #check-b-ans, #check-c-ans, #check-d-ans').prop("checked", false);
            if(option_a_ans==1)
            {
                $('#check-a-ans').prop("checked", true);
            }
            if(option_b_ans==1)
            {
                $('#check-b-ans').prop("checked", true);
            }
            if(option_c_ans==1)
            {
                $('#check-c-ans').prop("checked", true);
            }
            if(option_d_ans==1)
            {
                $('#check-d-ans').prop("checked", true);
            }
        }

        if(visited==1)
        {
            if(marked == 1)
            {
                if(reviewed == 1)
                {
                    $(this).css("background-color", "blue");
                    $(this).attr("reviewed", 1);
                }
                else
                {
                    $(this).css("background-color", "green");
                    $(this).attr("marked", 1);
                }
            }
            else
            {
                $(this).css("background-color", "white");
            }
        }
        else
        {
            $(this).css("background-color", "white");
            $(this).attr("visited", 1);
        }

        new_visit(quesid);
    });
});
  

$(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
    if(e.which === 122){
        return false;
    }
    if(e.which === 27 || e.charCode===27 || e.keyCode===27 ){
        return false;
    }
    if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
    return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
    return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
    return false;
    }
    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
    return false;
    }
    if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
    return false;
    }
    if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
    return false;
    }
    if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
    return false;
    }
    if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
    return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keyCode == 'R'.charCodeAt(0)){
    location.reload();
    }
    if(e.ctrlKey && e.keyCode == 'R'.charCodeAt(0)){
    return false;
    }
});


document.addEventListener("fullscreenchange", function() {
    setInterval(() => {
        var docElm = document.documentElement;
        if (docElm.requestFullscreen) {
            docElm.requestFullscreen();
        }
        else if (docElm.mozRequestFullScreen) {
            docElm.mozRequestFullScreen();
        }
        else if (docElm.webkitRequestFullScreen) {
            docElm.webkitRequestFullScreen();
        }
    }, 100);
  });


function student_logout(){
    location.replace("student-submit-logout.php");
}


function time_fun()
{
    var m = Number($("#minute-span").html());
    var s = Number($("#second-span").html());
    setInterval(() => {
        if(s<10)
        {
            if(s<0)
            {
                s=59;
                m--;
                $("#second-span").html(s);
                if(m<10){
                    $("#minute-span").html('0'+m);   
                }
                else{
                    $("#minute-span").html(m);
                }
            }
            else
            {
                $("#second-span").html('0'+s);
            }
        }
        else
        {
            $("#second-span").html(s);
        }
        s--;
        if(m==0 && s==0){student_logout()}
    }, 1000);

    function time_update(){
        $.ajax({
            type : "POST",
            url  : "student-time-update.php",
            data : {
                usermail : $("#usermail-div").attr("userid"),
                m : Number($("#minute-span").html()),
                s : Number($("#second-span").html())
            },
            cache : false,
            processType : true
        }); 
    }

    setInterval(time_update, 5000);
}


function test_start_fun(){
    time_fun();
    $('.blurr-div-outer-box').fadeOut("2000");
    $('.question-no-box:first').click();
    $('.question-no-box:first').attr("visited", 1);
}


function new_visit(quesid){
    $.ajax({
        type : "POST",
        url  : "user-preview-index.php",
        data : {
            purpose  : "only-visit",
            usermail : $("#usermail-div").attr("userid"),
            quesid   : quesid
        },
        cache : false,
        processType : true,
    }); 
}

$(document).ready(function(){
    $('#clear-response').click(function(){
        var quesid = $("#quesno-preview-span").attr("quesid");

        $.ajax({
            type : "POST",
            url  : "user-preview-index.php",
            data : {
                purpose  : "clear-response",
                usermail : $("#usermail-div").attr("userid"),
                quesid   : quesid,
            },
            cache : false,
            processType : true,
            success : function(response){
                if(response=="success")
                {
                    var y = Number($("#quesno-preview-span").attr("quesno"));
                    var x = $('.ques-no-id').eq(y).click();
                    $('.ques-no-id').eq(y-1).attr("marked", 0);
                    $('.ques-no-id').eq(y-1).attr("reviewed", 0);
                    $('.ques-no-id').eq(y-1).attr("option_a_ans", 0);
                    $('.ques-no-id').eq(y-1).attr("option_b_ans", 0);
                    $('.ques-no-id').eq(y-1).attr("option_c_ans", 0);
                    $('.ques-no-id').eq(y-1).attr("option_d_ans", 0);
                    $('.ques-no-id').eq(y-1).css("background-color", "white");    
                }
            }
        });
    });
});


$(document).ready(function(){
    $('#save-and-next, #save-and-review').click(function(){
        var question = document.getElementById("question-preview").innerHTML;
        var quesid = $("#quesno-preview-span").attr("quesid");
        var option_a_ans = 0;
        var option_b_ans = 0;
        var option_c_ans = 0;
        var option_d_ans = 0;
        var validation  = 0;
        var purpose = $(this).attr("id");        

        if($("#quesno-preview-span").attr("isradio")==1)
        {
            if($("#radio-a-ans:checked").attr("value")=="1")
            {
                option_a_ans = 1;
                validation = 1;
            } 
            if($("#radio-b-ans:checked").attr("value")=="2")
            {
                option_b_ans = 1;
                validation = 1;
            } 
            if($("#radio-c-ans:checked").attr("value")=="3")
            {
                option_c_ans = 1;
                validation = 1;
            }
            if($("#radio-d-ans:checked").attr("value")=="4")
            {
                option_d_ans = 1;
                validation = 1;
            }
        }
        else
        {
            if($("#check-a-ans:checked").attr("value")=="1")
            {
                option_a_ans = 1;
                validation = 1;
            }
            if($("#check-b-ans:checked").attr("value")=="2")
            {
                option_b_ans = 1;
                validation = 1;
            }
            if($("#check-c-ans:checked").attr("value")=="3")
            {
                option_c_ans = 1;
                validation = 1;
            }
            if($("#check-d-ans:checked").attr("value")=="4")
            {
                option_d_ans = 1;
                validation = 1;
            }
        }


        if(validation==1)
        {
            $.ajax({
                type : "POST",
                url  : "user-preview-index.php",
                data : {
                    purpose  : purpose,
                    usermail : $("#usermail-div").attr("userid"),
                    quesid   : quesid,
                    option_a_ans : option_a_ans,
                    option_b_ans : option_b_ans,
                    option_c_ans : option_c_ans,
                    option_d_ans : option_d_ans
                },
                cache : false,
                processType : true,
                success : function(response){
                    if(response=="success")
                    {
                        if(purpose=="save-and-next")
                        {
                            var y = Number($("#quesno-preview-span").attr("quesno"));
                            var x = $('.ques-no-id').eq(y).click();
                            $('.ques-no-id').eq(y-1).attr("marked", 1);
                            $('.ques-no-id').eq(y-1).attr("reviewed", 0);
                            $('.ques-no-id').eq(y-1).attr("option_a_ans", option_a_ans);
                            $('.ques-no-id').eq(y-1).attr("option_b_ans", option_b_ans);
                            $('.ques-no-id').eq(y-1).attr("option_c_ans", option_c_ans);
                            $('.ques-no-id').eq(y-1).attr("option_d_ans", option_d_ans);
                            $('.ques-no-id').eq(y-1).css("background-color", "green");
                        }
                        else if(purpose=="save-and-review")
                        {
                            var y = Number($("#quesno-preview-span").attr("quesno"));
                            var x = $('.ques-no-id').eq(y).click();
                            $('.ques-no-id').eq(y-1).attr("marked", 1);
                            $('.ques-no-id').eq(y-1).attr("reviewed", 1);
                            $('.ques-no-id').eq(y-1).attr("option_a_ans", option_a_ans);
                            $('.ques-no-id').eq(y-1).attr("option_b_ans", option_b_ans);
                            $('.ques-no-id').eq(y-1).attr("option_c_ans", option_c_ans);
                            $('.ques-no-id').eq(y-1).attr("option_d_ans", option_d_ans);
                            $('.ques-no-id').eq(y-1).css("background-color", "blue");
                        }
                        
                    }
                }
            });
        }
        else
        {
            if(purpose=="save-and-next")
            {
                document.getElementById(purpose).innerHTML = "Answer is Blank";
                $('#save-and-next').css("background-color", "rgb(255, 65, 7)");
                setTimeout(function(){
                    document.getElementById(purpose).innerHTML = "Save and Next"; 
                    $('#save-and-next').css("background-color", "");
                }, 2000);
            }
            else
            {
                document.getElementById(purpose).innerHTML = "Answer is Blank";
                $('#save-and-review').css("background-color", "rgb(255, 65, 7)");
                setTimeout(function(){
                    document.getElementById(purpose).innerHTML = "Save Review and Next"; 
                    $('#save-and-review').css("background-color", "");
                }, 2000);
            }
        }
    });
});


$(document).ready(function(){
    $(".exam-submit").on("click", function(){
        if($(".exam-submit").attr("value")=="Submit")
        {
            $(".exam-submit").attr("value","Click Again to Confirm"); 
            setInterval(() => {
                $(".exam-submit").attr("value","Submit"); 
            }, 2500);
        }
        else
        {
            student_logout();
        }
         
    });
});