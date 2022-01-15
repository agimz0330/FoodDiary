$(document).ready(function(){
    barInitial();
    initial();
});

function initial(){
    var mId= sessionStorage.getItem("mId");
    console.log(mId);
    if(mId== null || mId.substring(0,6)== "fdtest"){ // 未登入
        $(".sonar-services-area").html("<h1>請先登入</h1>");
        $(".type-goal-area").html("<h3>請先登入</h3>");
        $(".testimonial-slides").html("<h6>請先登入</h6><h4>請先登入</h4><h2>請先登入</h2><h5>請先登入</h5><h1>請先登入</h1><h3>請先登入</h3><br><p>:)))</p>");
        
    }
    else{ // 已登入
        // get user info
        /* 
        ***********************************************************
        (post)
        {
            "act": "userInfo",
            "mId": mId
        }

        (get)
        {
            "status": true/ false, 
            "msg": "Successfully get."/ "Could not find the user data.",
            "account": "abc111",
            "password": "123456",
            "name": "陳小明",
            "gender": 'F'/ 'M',
            "age": 22,
            "weight": 48.6, 
            "goal": ["目標1", "目標2", "目標3", "目標4", "目標5"]
        }
        ***********************************************************
        */
    }
}

// 修改個資 按鈕
$("#edit-info-btn").click(function (){
    $(".contact-form").show();
    $("#save-info-btn").show();
});
// 儲存個資 按鈕
$("#save-info-btn").click(function (){
    $(".contact-form").hide();
    $("#save-info-btn").hide();
    // location.reload();
});

// 修改目標 按鈕
$("#edit-goal-btn").click(function (){
    $(".goal_textarea-control").show();
});
// 儲存目標 按鈕
$("#save-goal-btn").click(function (){
    $(".goal_textarea-control").hide();
    // location.reload();
});