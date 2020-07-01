$(document).ready(function() {
    $('.admin-preview-index').click(function(e){
        var request = $(this).attr('id');
        $(".category-no").attr("current", request)
        e.preventDefault();
        $.ajax({
            type : "POST",
            url  : "admin-preview-index.php",
            data : {
                request : request
            },
            cache : false,
            processType : true,
            beforeSend : function(){
            
            },
            success: function(response)
            {
                document.getElementById("view-all-ajax-preview-output").innerHTML= response.trim();
                if(request=="add-question")
                {
                    $('.admin-preview-index>button').css("background-color","");
                    $('#view-approved-users>button').css("border", "1px solid black");  
                    $('.add-question>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('#add-question>button').css("background-color", "royalblue");
                    $("#download").attr("disabled","disabled");
                    $("#print").attr("disabled","disabled");
                    add_question();

                } 
                else if(request=="admin-home")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#admin-home>button').css("border", "1px solid black");  
                    $('#admin-home>button').css("background-color", "royalblue");  
                    $("#download").attr("disabled","disabled");
                    $("#print").attr("disabled","disabled");
                } 
                else if(request=="view-all-user")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#view-all-user>button').css("border", "1px solid black");  
                    $('#view-all-user>button').css("background-color", "royalblue");  
                    $("#download").removeAttr("disabled");
                    $("#print").removeAttr("disabled");
                }
                else if(request=="view-all-questions")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#view-all-questions>button').css("border", "1px solid black");  
                    $('#view-all-questions>button').css("background-color", "royalblue");    
                    $("#download").removeAttr("disabled");
                    $("#print").removeAttr("disabled");
                }
                else if(request=="delete-questions")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#delete-questions>button').css("border", "1px solid black");  
                    $('#delete-questions>button').css("background-color", "royalblue");     
                    delete_question();
                    $("#download").attr("disabled","disabled");
                    $("#print").attr("disabled","disabled");
                }
                else if(request=="email-single-user")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#email-single-user>button').css("border", "1px solid black");  
                    $('#email-single-user>button').css("background-color", "royalblue");  
                    $("#download").attr("disabled","disabled");    
                    $("#print").attr("disabled","disabled");
                }
                else if(request=="edit-student-details")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#edit-student-details>button').css("border", "1px solid black");  
                    $('#edit-student-details>button').css("background-color", "royalblue");      
                    edit_student();
                    $("#download").attr("disabled","disabled");
                    $("#print").attr("disabled","disabled");
                }
                else if(request=="email-all-user")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#email-all-user>button').css("border", "1px solid black");  
                    $('#email-all-user>button').css("background-color", "royalblue");   
                    $("#download").attr("disabled","disabled");
                    $("#print").attr("disabled","disabled");   
                }
                else if(request=="view-admin-members")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#view-admin-members>button').css("border", "1px solid black");  
                    $('#view-admin-members>button').css("background-color", "royalblue");     
                    $("#download").removeAttr("disabled"); 
                    $("#print").removeAttr("disabled");
                }
                else if(request=="add-admin-members")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#add-admin-members>button').css("border", "1px solid black");  
                    $('#add-admin-members>button').css("background-color", "royalblue");   
                    $("#download").attr("disabled","disabled");
                    $("#print").attr("disabled","disabled");
                    add_a_member();   
                }
                else if(request=="view-approved-users")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#view-approved-users>button').css("border", "1px solid black");  
                    $('#view-approved-users>button').css("background-color", "royalblue"); 
                    $("#download").removeAttr("disabled");
                    $("#print").removeAttr("disabled");
                    dverify_user_now();      
                }
                else if(request=="view-pending-users")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#view-pending-users>button').css("border", "1px solid black");  
                    $('#view-pending-users>button').css("background-color", "royalblue");
                    verify_user_now();      
                    $("#download").removeAttr("disabled");
                    $("#print").removeAttr("disabled");
                }
                else if(request=="remove-admin-members")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#remove-admin-members>button').css("border", "1px solid black");  
                    $('#remove-admin-members>button').css("background-color", "royalblue");
                    rm_admin();
                    $("#download").attr("disabled","disabled");
                    $("#print").attr("disabled","disabled");
                }
                else if(request=="view-final-result")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#view-final-result>button').css("border", "1px solid black");  
                    $('#view-final-result>button').css("background-color", "royalblue");   
                    $("#download").removeAttr("disabled"); 
                    $("#print").removeAttr("disabled");  
                }
                else if(request=="view-detailed-result")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#view-detailed-result>button').css("border", "1px solid black");  
                    $('#view-detailed-result>button').css("background-color", "royalblue");     
                    $("#download").removeAttr("disabled"); 
                    $("#print").removeAttr("disabled");
                }
                else if(request=="edit-questions")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#edit-questions>button').css("border", "1px solid black");  
                    $('#edit-questions>button').css("background-color", "royalblue"); 
                    $("#print").attr("disabled","disabled");
                    $("#download").attr("disabled","disabled");  
                    admin_edit_question();  
                }
                else if(request=="set-date-time")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#set-date-time>button').css("border", "1px solid black");  
                    $('#set-date-time>button').css("background-color", "royalblue");   
                    set_date_time();
                    $("#download").attr("disabled","disabled");
                    $("#print").attr("disabled","disabled");
                }
                else if(request=="remove-student")
                {
                    $('.admin-preview-index>button').css("border", "1px solid rgb(163, 163, 163)");
                    $('.admin-preview-index>button').css("background-color","");
                    $('#remove-student>button').css("border", "1px solid black");  
                    $('#remove-student>button').css("background-color", "royalblue");
                    remove_student();  
                    $("#download").attr("disabled","disabled"); 
                    $("#print").attr("disabled","disabled");  
                }
                else
                {
                     alert("Something Went Wrong");
                }
            }   
        });
    });
});

function add_a_member(){
    $('.add-a-member-btn').on("click", function(){
        var mail = $("#input-mail").val();
        var name = $("#input-name").val();
        var mobile = $("#input-mobile").val();
        var pass = $("#input-pass").val();
        var role  = $("#select-div").find(":selected").val();
        
        if(mail!="" && name!="" && mobile!="" && pass!=""){
            $.ajax({
                type : "POST",
                url  : "../php/admin-preview-add-admin-member-sub.php",
                data : {
                        mail : btoa(mail),
                        name : btoa(name),
                        mobile : btoa(mobile),
                        pass : btoa(pass),
                        role : btoa(role),
                },
                cache : false,
                beforeSend : function(){
                    $("#add-member-btn").html("Adding...");
                },
                success: function(response)
                {
                    document.getElementById("add-member-btn").innerHTML = response;
                    $("#add-admin-members").click();
                    setTimeout(function(){
                        document.getElementById("add-member-btn").innerHTML = "Add Admin"; 
                    }, 3000);
                }
            });
        }
        else{
                $("#add-member-btn").html("Invalid");
                setTimeout(() => {
                    $("#add-member-btn").html("Add Admin"); 
                }, 2500);
        }
    
    });
}


function add_question(){
    $('.radio-check').change(function(){
        if($(this).attr("value")=="radiobox")
        {
            $(".all-radio-btn").removeAttr("disabled");
            $(".all-check-btn").attr("disabled","disabled");
            $("#add-question-btn").attr("disabled","disabled");
            $("#add-question-btn").attr("style","cursor:not-allowed");
            $('.all-radio-btn').change(function(){
                if($(".all-radio-btn:checked").attr("value")!="undefined")
                {   
                    check_add_btn("radio-ok");
                }   
            });           
        }
        else
        {
            $(".all-radio-btn:checked").attr("checked",false);
            $(".all-radio-btn").attr("disabled","disabled");
            $(".all-check-btn").removeAttr("disabled");
            $("#add-question-btn").attr("disabled","disabled");
            $("#add-question-btn").attr("style","cursor:not-allowed");
            $('.all-check-btn').change(function(){
                if($(".all-check-btn:checked").attr("value")=="1" || $(".all-check-btn:checked").attr("value")=="2" || $(".all-check-btn:checked").attr("value")=="3" || $(".all-check-btn:checked").attr("value")=="4")
                {   
                    check_add_btn("radio-ok");
                }  
                else
                {
                    $("#add-question-btn").attr("disabled","disabled");
                    $("#add-question-btn").attr("style","cursor:not-allowed");
                }
            });
        }    
    });

    $('#textarea,#option-a,#option-b,#option-c,#option-d').on("input",function(){
        if($(this).val()=="")
        {
            $("#add-question-btn").attr("disabled","disabled");
            $("#add-question-btn").attr("style","cursor:not-allowed"); 
        }
        else
        {
            check_add_btn("radio-not");
        }
    });

    function check_add_btn(radio_fill_checK){
        if($('#textarea').val()!="" && $('#option-a').val()!="" && $('#option-b').val()!="" && $('#option-c').val()!="" && $('#option-d').val()!="" && radio_fill_checK == "radio-ok")
        {
            $("#add-question-btn").removeAttr("disabled");
            $("#add-question-btn").attr("style","cursor:pointer");
        }
        else
        {
            $("#add-question-btn").attr("disabled","disabled");
            $("#add-question-btn").attr("style","cursor:not-allowed");
        }
    }

    $('#add-question-form').submit(function(e){
        e.preventDefault();
        var is_radiobox = 0;
        var is_checkbox = 0;
        var option_a_ans = 0;
        var option_b_ans = 0;
        var option_c_ans = 0;
        var option_d_ans = 0;
        if($('.radio-check:checked').attr("value")=="radiobox")
        {
            is_checkbox = 0;
            is_radiobox = 1;    
            if($(".all-radio-btn:checked").attr("value")=="1")
            {
                option_a_ans = 1;
            } 
            else if($(".all-radio-btn:checked").attr("value")=="2")
            {
                option_b_ans = 1;
            } 
            else if($(".all-radio-btn:checked").attr("value")=="3")
            {
                option_c_ans = 1;
            }
            else
            {
                option_d_ans = 1;
            }   
        }
        else
        {
            is_checkbox = 1;
            is_radiobox = 0;  
            if($("#check-a:checked").attr("value")=="1")
            {
                option_a_ans = 1;
            }
            if($("#check-b:checked").attr("value")=="2")
            {
                option_b_ans = 1;
            }
            if($("#check-c:checked").attr("value")=="3")
            {
                option_c_ans = 1;
            }
            if($("#check-d:checked").attr("value")=="4")
            {
                option_d_ans = 1;
            }
        }
        if($('#add-question-btn').attr('data')=="add-ques-btn")
        {
            $.ajax({
                type : "POST",
                url  : "../php/admin-preview-add-question-sub.php",
                data : {
                        question : btoa($("#textarea").val()),
                        option_a : btoa($("#option-a").val()),
                        option_b : btoa($("#option-b").val()),
                        option_c : btoa($("#option-c").val()),
                        option_d : btoa($("#option-d").val()),
                        option_a_ans : btoa(option_a_ans),
                        option_b_ans : btoa(option_b_ans),
                        option_c_ans : btoa(option_c_ans),
                        option_d_ans : btoa(option_d_ans),
                        is_radiobox  : btoa(is_radiobox),
                        is_checkbox  : btoa(is_checkbox),
                },
                cache : false,
                beforeSend : function(){
                    document.getElementById("add-question-btn").innerHTML = "Adding...";  
                },
                success: function(response)
                {
                    document.getElementById("add-question-btn").innerHTML = response;
                    $("#add-question-form")[0].reset();
                    setTimeout(function(){
                        document.getElementById("add-question-btn").innerHTML = "Add Question"; 
                    }, 3000);
                    return false;
                }
            });
        }
        else
        {
            $.ajax({
                type : "POST",
                url  : "../php/admin-preview-edit-question-sub-two.php",
                data : {
                        quesid   : btoa($('#add-question-btn').attr("data")),
                        question : btoa($("#textarea").val()),
                        option_a : btoa($("#option-a").val()),
                        option_b : btoa($("#option-b").val()),
                        option_c : btoa($("#option-c").val()),
                        option_d : btoa($("#option-d").val()),
                        option_a_ans : btoa(option_a_ans),
                        option_b_ans : btoa(option_b_ans),
                        option_c_ans : btoa(option_c_ans),
                        option_d_ans : btoa(option_d_ans),
                        is_radiobox  : btoa(is_radiobox),
                        is_checkbox  : btoa(is_checkbox),
                },
                cache : false,
                beforeSend : function(){
                    document.getElementById("add-question-btn").innerHTML = "Updating...";  
                },
                success: function(response)
                {
                    document.getElementById("add-question-btn").innerHTML = response;
                    setTimeout(function(){
                        $('#edit-questions').click();
                    }, 2000);
                }
            });
        }
        
    });

}


function admin_edit_question(){
    $('.edit-ques').click(function(){
        $.ajax({
            type : "POST",
            url  : "admin-preview-edit-questions-sub.php",
            data : {
                quesid : $(this).attr('data')
            },
            cache : false,
            processType : true,
            success: function(response)
            {
                document.getElementById("view-all-ajax-preview-output").innerHTML= response.trim();
                add_question();
            }
        });
    });
}


function rm_admin(){
    $('.rm-admin').click(function(){
        $.ajax({
            type : "POST",
            url  : "admin-preview-remove-admin-sub.php",
            data : {
                usermail  : $(this).attr("data")
            },
            cache : false,
            processType : true,
            success : function(response){
                if(response=="success")
                {
                    $('#remove-admin-members').click();
                }
            }
        });
    });
}


function verify_user_now(){
    $('.uverify').click(function(e){
        var uverify = $(this).attr("data");
        $.ajax({
            type : "POST",
            url  : "admin-preview-verify-user-now.php",
            data : {
                request : uverify
            },
            cache : false,
            processType : true,
            beforeSend : function(){
                
            },
            success : function(response){
                if(response=="success")
                {
                    $('#view-pending-users').click();
                }
            }
        });
    });
}


function dverify_user_now(){
    $('.dverify').click(function(e){
        var dverify = $(this).attr("data");
        $.ajax({
            type : "POST",
            url  : "admin-preview-dverify-user-now.php",
            data : {
                request : dverify
            },
            cache : false,
            processType : true,
            beforeSend : function(){
                
            },
            success : function(response){
                if(response=="success")
                {
                    $('#view-approved-users').click();
                }
            }
        });
    });
}

function set_date_time(){
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        var minDate= year + '-' + month + '-' + day;
        $('#date-span').attr('min', minDate);
    


    $('#set-time-btn').click(function(){
        var edate = $('#date-span').val();
        var stime = $('#start-time-span').val();
        var etime = $('#end-time-span').val();
        
        if(edate!="")
        {
            if(stime!="" && etime!="")
            {
                if(etime>stime)
                {
                    ajax_set_date_time();
                }
                else
                {
                    date_time_invalid();
                }
            }
            else
            {
                date_time_invalid();
            }
        }
        else
        {
            date_time_invalid();
        }

        function ajax_set_date_time(){
           var d1 = new Date(edate +" "+ stime);
           var d2 = new Date(edate +" "+ etime);
           var tm = (d2.getTime() - d1.getTime())/60000;

            $.ajax({
                type : "POST",
                url  : "admin-preview-set-date-time-sub.php",
                data : {
                    edate  : edate,
                    stime  : stime,
                    etime  : etime,
                    tminute : tm
                },
                cache : false,
                processType : true,
                beforeSend : function(){
                    document.getElementById("set-time-btn").innerHTML = "Updating.....";
                },
                success : function(response){
                    if(response=="success")
                    {
                        document.getElementById("set-time-btn").innerHTML = "Suceesfully Updated";
                        $("#set-time-btn").css("background-color", "green");
                        setTimeout(function(){
                            document.getElementById("set-time-btn").innerHTML = "Set Exam Time"; 
                            $("#set-time-btn").css("background-color", "");
                        }, 2500);
                    }
                }
            });
        }

        function date_time_invalid(){
                document.getElementById("set-time-btn").innerHTML = "Invalid Date/Time";
                $("#set-time-btn").css("background-color", "rgb(255, 65, 7)");
                setTimeout(function(){
                    document.getElementById("set-time-btn").innerHTML = "Set Exam Time"; 
                    $("#set-time-btn").css("background-color", "");
                }, 1500);
        }
    });
}


function remove_student(){
    $('.rm-student').click(function(){
        $.ajax({
            type : "POST",
            url  : "admin-preview-remove-student-sub.php",
            data : {
                usermail  : $(this).attr("data")
            },
            cache : false,
            processType : true,
            success : function(response){
                if(response=="success")
                {
                    $('#remove-student').click();
                }
            }
        });
    });
}

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


function edit_student(){
    $('.edit-stu').click(function(){
        var edit_id = $(this).attr("data");
        if($("[data='"+edit_id+"']").html().trim()=="Save")
        {
            if($("[login_id='"+edit_id+"']").eq(0).html()!="")
            {
                $("[login_id='"+edit_id+"']").eq(0).css("border", "");
                if($("[login_id='"+edit_id+"']").eq(1).html()!="")
                {
                    $("[login_id='"+edit_id+"']").eq(1).css("border", "");
                    if($("[login_id='"+edit_id+"']").eq(2).html()!="")
                    {
                        $("[login_id='"+edit_id+"']").eq(2).css("border", "");
                        edit_stu_submit(edit_id);
                    }
                    else
                    {
                        $("[login_id='"+edit_id+"']").eq(2).css("border", "2px dashed red");
                    }
                }
                else
                {
                    $("[login_id='"+edit_id+"']").eq(1).css("border", "2px dashed red");
                }
            }
            else
            {
                $("[login_id='"+edit_id+"']").eq(0).css("border", "2px dashed red");
            }
        }
        $('.edit-stu-check').css("color", "black");
        $(".edit-stu").css("color", "red");
        $('.edit-stu').html("Edit");
        $('.edit-stu').attr("edit", "no");
        $(".edit-stu-check").attr("contenteditable", false);
        $(this).html("Save");
        $(this).attr("edit", "yes");    
        $("[login_id='"+edit_id+"']").attr("contenteditable", true);
        $("[login_id='"+edit_id+"']").css("color", "red");
        $("[data='"+edit_id+"']").css("color", "green");
        $('.edit-stu-check').on("input",function(){
            if($(this).html()=="")
            {
                $("[data='"+edit_id+"']").css("cursor", "not-allowed");
                $(this).css("border", "2px dashed red");
            }
            else
            {
                $("[data='"+edit_id+"']").css("cursor", "pointer");
                $(this).css("border", "");
            }
        });
    });

    function edit_stu_submit(edit_id){
        $.ajax({
            type : "POST",
            url  : "admin-preview-edit-student-details-sub.php",
            data : {
                editid  : edit_id,
                name    : $("[login_id='"+edit_id+"']").eq(0).html(),
                roll    : $("[login_id='"+edit_id+"']").eq(1).html(), 
                mobile : $("[login_id='"+edit_id+"']").eq(2).html()
            },
            cache : false,
            processType : true,
            success : function(response){
                $("[data='"+edit_id+"']").html(response);
                setTimeout(function(){
                    $("[data='"+edit_id+"']").html("Save"); 
                }, 2000);
            }
        });
    }
}


$(document).ready(function(){
    $("#download").on("click", function(){
        var x = $(".category-no").attr("current");
       if(x=="view-all-user"){
           window.open("download-view-all-users.php","_blank");
       }
       else if(x=="view-approved-users"){
        window.open("download-view-all-approved-users.php","_blank");
       }
       else if(x=="view-pending-users"){
        window.open("download-view-all-pending-users.php","_blank");
       }
       else if(x=="view-final-result"){
        window.open("download-view-final-result.php","_blank");
       }
       else if(x=="view-detailed-result"){
        window.open("download-view-detailed-result.php","_blank");
       }
       else if(x=="view-all-questions"){
        window.open("download-view-all-questions.php","_blank");
       }
       else if(x=="view-admin-members"){
        window.open("download-view-admin-members.php","_blank");
       }
       else{
           alert("Error! Unable to Download File");
       }
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


$(document).ready(function(){
    $("#print").on("click", function(){
        var x = $(".category-no").attr("current");
       if(x=="view-all-user"){
           window.open("print-view-all-users.php","_blank");
       }
       else if(x=="view-approved-users"){
        window.open("print-view-all-approved-users.php","_blank");
       }
       else if(x=="view-pending-users"){
        window.open("print-view-all-pending-users.php","_blank");
       }
       else if(x=="view-final-result"){
        window.open("print-view-final-result.php","_blank");
       }
       else if(x=="view-detailed-result"){
        window.open("print-view-detailed-result.php","_blank");
       }
       else if(x=="view-all-questions"){
        window.open("print-view-all-questions.php","_blank");
       }
       else if(x=="view-admin-members"){
        window.open("print-view-admin-members.php","_blank");
       }
       else{
           alert("Error! Unable to Download File");
       }
    });
});


$(document).ready(function(){
    $("#index-mail-btn").on("click", function(){
       $("#email-single-user").click();
    });
});


$(document).ready(function() {
    $('#logout-btn').click(function(){
        window.location = "logout.php";
    });
});