$(document).ready(function() {
    $('.category-option').click(function(e){
        e.preventDefault();
        $.ajax({
            type : "POST",
            url  : "admin-preview-index.php",
            data : {
                request : $(this).attr('id'),
            },
            cache : false,
            beforeSend : function(){
                document.getElementById("output-box").innerHTML = "<div id='my-admin-loader'><div class='my-admin-loader-div'><div class='admin-loader'></div></div></div>";
            },
            success: function(response)
            {
              document.getElementById("output-box").innerHTML= response.trim();
              return false;
            }
        });
    });
});


function add_question_fun_check(){
    alert("hello");
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
                setTimeout(function(){
                    document.getElementById("add-question-btn").innerHTML = "Add Question"; 
                }, 3000);
                return false;
            }
        });
    });

}


$(document).ready(function() {
    $('#logout-btn').click(function(){
        window.location = "logout.php";
    });
});