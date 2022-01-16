$(document).ready(function(){
    barInitial();
    initial();
});

function initial(){
    var mId= sessionStorage.getItem("mId");

    if(mId== null || mId.substring(0,6)== "fdtest"){ // 未登入
        $(".portfolio-title h2").html("“ Plesae Login.<br>&emsp;&emsp;<span>請先登入</span> .””");
        $(".latest-news-widget-area").html("...");
    }
    else{ // 已登入
        let cmd= {"act": "getHotPost", "mId": mId};
        $.post("login.php", cmd, function (data){
            data= JSON.parse(data);
            
        });
        // get hot post
        /* 
        ***********************************************************
        (post)
        {
            "act": "getHotPost"
            "mId": "fd000001"
        }

        (get)
        {
            "status": true/ false, 
            "info": "Successfully show home page."/ "Can't show post.",
            "hotFood": [ // 5格
                {"foodName": "餐點", "shopName": "店家", "foodCost": 50, "foodCal": 425, "foodNote": "備註", "foodImg": "???"}, {}, {}, ...
            ]
        }
        ***********************************************************
        */
       let data= { //test
            "status": true, 
            "info": "Successfully show home page.",
            "hotFood": [ // 8格
                {"foodName": "餐點", 
                "shopName": "店家", 
                "foodCost": 123, 
                "foodCal": 1233, 
                "foodNote": "備註3333333333備註3333333333備註3333333333備註3333333333", 
                "foodImg": "img/bg-img/slide1.jpg"}
            ]
        };
        if(data.status== true){
            let hotFood= data.hotFood;
            for(var i= 0; i< hotFood.length; i++){
                var onePost= "<div class=\"widget-single-blog-post d-flex align-items-start\">"+
                                "<div class=\"widget-post-thumbnail pr-3\"><img src=\"";
                onePost+= hotFood[i].foodImg+ "\" style=\"width: 70px;\">"; // 餐點圖片
                onePost+= "</div><div class=\"widget-post-content\"><a href=\"javascript: void(0)\">";
                onePost+= hotFood[i].shopName+ " <strong>"+ hotFood[i].foodName+ "</strong></a>"; // 店名+餐點名
                onePost+= "<br><i class=\"fa fa-dollar\" style=\"color:darkgoldenrod\">"+ hotFood[i].foodCost; // 金額
                onePost+= "元 </i>>&nbsp;
                    <i class="fa fa-fire" style="color:darkred">425 cal </i>
                    <p>溫半</p>
                </div>
            </div>";

                $(".widget-blog-post").append(onePost);
            }
        }
        else{
            $(".widget-blog-post").html("...");
        }
    }
}