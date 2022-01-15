$(document).ready(function(){
    barInitial();
    initial();
});

function initial(){
    var mId= sessionStorage.getItem("mId");

    if(mId== null || mId.substring(0,6)== "fdtest"){ // 未登入
        
    }
    else{ // 已登入, 停留在該頁面
    }
}