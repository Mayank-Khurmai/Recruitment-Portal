
function onbodyload(){
    setTimeout(afterloader, 300);

}

function afterloader(){
    document.getElementById("my-loader").style.display = "none";
    document.getElementById("full-body").style.display = "block";
}

function edit_student(){
    $('.edit-stu').click(function(){
        var edit_id = $(this).attr("data");
        $('[login_id="+edit_id+"]').attr("contenteditable", true);
    });
}
