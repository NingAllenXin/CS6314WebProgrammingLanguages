$(document).ready(function(){
    $("button").click(function(){
        $(".valid").remove();
        $(".notValid").remove();
        if ($("#firstname").val() == "" || $("#lastname").val() == "" || $("#email").val() == "" ||$("#password").val() == "" || $("#repassword").val() == "") {
            $("button").after("<p class='notValid'>All red fields are mandatory. Please fill them out</p>");
        }
        if($("#firstName").val() == "") {
            $("#firstName").css("background", "red");
            $("#firstName").change(function(){
                $("#firstName").css("background-color","#f1f1f1");
            });
        }

        if($("#lastName").val() == "") {
            $("#lastName").css("background", "red");
            $("#lastName").change(function () {
                $("#lastName").css("background-color","#f1f1f1");
            });
        }
        if($("#email").val() == "") {
            $("#email").css("background", "red");
            $("#email").change(function () {
                $("#email").css("background-color","#f1f1f1");
            });
        }
        if($("#password").val() == "") {
            $("#password").css("background", "red");
            $("#password").change(function () {
                $("#password").css("background-color","#f1f1f1");
            });
        }
        if($("#repassword").val() == "") {
            $("#repassword").css("background", "red");
            $("#repassword").change(function () {
                $("#repassword").css("background-color","#f1f1f1");
            });
        }

        if ($("#cb").prop("checked")) {

        } else {
            $("#cbText").html("checkbox is not checked");
            $("#cbText").css({"color":"red", "font-size":"large"});
            $("#cb").change(function () {
                $("#cbText").hide();
            });
        }
        event.preventDefault()

    });




});

function validate() {

    var pwd = $("#password").val();
    var pwd1 = $("#repassword").val();
    <!-- 对比两次输入的密码 -->
    if(pwd == pwd1)
    {
        $("#tishi").html("password is match");
        $("#tishi").css("color","green");
        $("#xiugai").removeAttr("disabled");
    }
    else {
        $("#tishi").html("password is not match");
        $("#tishi").css("color","red")
        $("button").attr("disabled","disabled");
    }
}