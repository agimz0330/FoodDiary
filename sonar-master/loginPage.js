var act; // login / register

$(document).ready(function(){
    barInitial();
    initial();

    // 選擇: 登入 或 註冊
    $("#chooseLogin").click(function (){
        act= "login";
        $("#confirmPasswardDiv").hide(); // 再次確認密碼 隱藏
    });
    $("#chooseRegister").click(function (){
        act= "register";
        $("#confirmPasswardDiv").show(); // 再次確認密碼 顯示
    });

    // 註冊時 檢查是否符合
    $("#account").keyup(function (){
        if(act== "register"){

        }
    });
    $("#password").keyup(function (){
        if(act== "register"){

        }
    });
    $("#confirmPassward").keyup(function (){
        if(act== "register"){
            
        }
        if (con_passwrd()) {
            $("#validatePW").css("border", "2px solid green");
            $("#checkPw").html("<p class='text-success'>Validated</p>");
        }
        else {
            $("#validatePW").css("border", "2px solid red");
            $("#checkPw").html("<p class='text-danger'>Password are not Matching</p>");
        }
    });
})

function initial(){
    act= "login";
}