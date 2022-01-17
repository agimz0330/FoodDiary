var loadTimes= 0;

$(document).ready(function(){
    barInitial();
    initial();
});

function initial(){
    var mId= sessionStorage.getItem("mId");

    if(mId== null){ // 未登入
        sessionStorage.setItem("mId", "fdtest01");
    }
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

    
    var data= { //test
        "status": true, 
        "msg": "Successfully show home page.",
        "hotFood": [ // 8格
            {"foodName": "餐點", 
            "shopName": "店家", 
            "foodCost": 123, 
            "foodCal": 1233, 
            "foodNote": "備註3333333333備註3333333333備註3333333333備註3333333333", 
            "foodImg": "img/bg-img/slide1.jpg"}
        ]
    };
    var cmd= {"act": "getRecord", "mId": mId};
    // $.post("hotPost.php", cmd, function (data){
    //     data= JSON.parse(data);

        if(data.status== true){
            $("#errorMsg").html("");

            let hotFood= data.hotFood;
            // for start:
            for(var i= 0; i< hotFood.length; i++){
                var onePost= "<div class=\"hero-slides owl-carousel\"><div class=\"single-hero-slide bg-img slide-background-overlay\" style=\"background-image: url(img/bg-img/slide1.jpg);\">"+
                                "<div class=\"container h-100\">"+
                                    "<div class=\"row h-100 align-items-end\">"+
                                        "<div class=\"col-12\">"+
                                            "<div class=\"hero-slides-content\">"+
                                                "<div class=\"line\"></div>"+
                                                "<h2>添好茶 <strong>紅豆奶茶紅豆奶茶紅豆奶茶</strong></h2>"+
                                                "<i class=\"fa fa-dollar\" style=\"color:darkgoldenrod\">50元 </i>"+
                                                "<i class=\"fa fa-fire\" style=\"color:darkred\">425 cal </i>"+
                                                "<p>溫半</p></div></div></div></div></div></div>";

                // var onePost= "<div class=\"single-hero-slide bg-img slide-background-overlay\" style=\"background-image: url(";
                // onePost+= hotFood[i].foodImg+ ");\">"; // 餐點圖片?????
                // onePost+= "<div class=\"container h-100\">"+
                //             "<div class=\"row h-100 align-items-end\">"+
                //                 "<div class=\"col-12\">"+
                //                     "<div class=\"hero-slides-content\">"+
                //                         "<div class=\"line\"></div>";

                // onePost+= "<h2>"+ hotFood[i].shopName+ "&nbsp;<strong>"; // 店名
                // onePost+= hotFood[i].foodName+ "</strong></h2>"; // 餐點名
                // onePost+= "<i class=\"fa fa-dollar\" style=\"color:darkgoldenrod\">"+ hotFood[i].foodCost+ "元</i>&nbsp;"; // 金額
                // onePost+= "<i class=\"fa fa-fire\" style=\"color:darkred\">"+ hotFood[i].foodCal+ "cal </i>"; // 熱量
                // onePost+= "<p>"+ hotFood[i].foodNote+ "</p></div></div></div></div></div>";
                
                // $("section .hero-area").append(onePost);
                // $('.owl-carousel').trigger('add.owl.carousel', onePost)
                //                     .trigger('refresh.owl.carousel');
                // $(".owl-carousel").owlCarousel('add', onePost).owlCarousel('update');
                // $('.owl-carousel').trigger('refresh.owl.carousel');
            }
            // for end.
        }
        else{
            $("#errorMsg").html("Error...1");
        }
    // });

    // 發文紀錄
    var data= { //test
        "status": true, 
        "msg": "Successfully show home page.",
        "recordPost": [ // 8格
            {"foodName": "餐點", 
            "shopName": "店家", 
            "mealTime": "b", 
            "foodCount": 1, 
            "foodCost": 200, 
            "foodCal": 1200, 
            "foodPoint": 3, 
            "foodNote": "備註備註備註備註備註備註", 
            "foodImg": "img/portfolio-img/1.jpg", 
            "mealDate": "2022-01-16"}
        ]
    };
    var cmd= {"act": "getRecord", "mId": mId, "loadTimes": 1};
    // $.post("myrecords.php", cmd, function (data){
    //     data= JSON.parse(data);
        if(data.status== true){
            $("#errorMsg").html("");

            let recordPost= data.recordPost;
            // for start: (每則貼文)
            for(var i= 0; i< recordPost.length; i++){
                var onePost= "<div class=\"col-12 col-sm-6 col-lg-3 single_gallery_item wow fadeInUpBig\" data-wow-delay=\"300ms\">"+
                                "<div class=\"blog-post-thumbnail\">"+
                                    "<a class=\"gallery-img\" href=\"";
                onePost+= recordPost[i].foodImg+ "\"><img src=\""+ recordPost[i].foodImg; // 餐點圖片?????
                onePost+= "\"></a><div class=\"post-date\"><a href=\"#\">";
                
                var mealDateStr= recordPost[i].mealDate; // 2012-07-03
                var mealDate= "";
                var monthStr= mealDateStr.substring(5, 7); // 07
                if(monthStr== "01") mealDate+= "Jan";
                else if(monthStr== "02") mealDate+= "Feb";
                else if(monthStr== "03") mealDate+= "Mar";
                else if(monthStr== "04") mealDate+= "Apr";
                else if(monthStr== "05") mealDate+= "May";
                else if(monthStr== "06") mealDate+= "Jun";
                else if(monthStr== "07") mealDate+= "Jul";
                else if(monthStr== "08") mealDate+= "Aug";
                else if(monthStr== "09") mealDate+= "Sep";
                else if(monthStr== "10") mealDate+= "Oct";
                else if(monthStr== "11") mealDate+= "Nov";
                else mealDate+= "Dec";
                mealDate+= " "+ mealDateStr.substring(8, 10);
                mealDate+= " \'"+ mealDateStr.substring(2, 4); // '12

                onePost+= mealDate; // 日期(Jan 01 '09)(月 日 '年)
                onePost+= "</a></div></div><div class=\"gallery-content\"><h6><span style=\"color:gold\">";
                
                for(var point= 0; point< recordPost[i].foodPoint; point++) // 評價(1~5)
                    onePost+= "<i class=\"fa fa-star\"></i>&nbsp;"; // 星星
                
                onePost+= "</span></h6><h4>"+ recordPost[i].shopName+ " <strong>"; // 店名
                onePost+= recordPost[i].foodName+ "</strong></h4><h6>"; // 餐點名
                onePost+= recordPost[i].foodCount+ "份&nbsp;"; // 數量
                onePost+= "<i class=\"fa fa-dollar\" style=\"color:darkgoldenrod\">"+ recordPost[i].foodCost+ "元</i>&nbsp;"; // 金額
                onePost+= "<i class=\"fa fa-fire\" style=\"color:darkred\">"+ recordPost[i].foodCal+ "cal </i>&nbsp;&nbsp;"; // 熱量
                
                switch(recordPost[i].mealTime){ // 時段
                    case 'b':
                    onePost+= "<i class=\"bi bi-brightness-alt-high\">Breakfast</i></h6><p>";
                    break;
                    case 'l':
                    onePost+= "<i class=\"bi bi-brightness-high\">Lunch</i></h6><p>";
                    break;
                    case 'd':
                    onePost+= "<i class=\"bi bi-cloud-moon\">Dinner</i></h6><p>";
                    break;
                    case 'n':
                    onePost+= "<i class=\"bi bi-moon\">Night Meal</i></h6><p>";
                    break;
                    case 'o':
                    onePost+= "<i class=\"bi bi-emoji-wink\">Other</i></h6><p>";
                    break;
                }
                onePost+= recordPost[i].foodNote+ "</p></div></div>"; // 備註

                $(".sonar-portfolio").append(onePost).isotope("appended", onePost).isotope("destroy");
            }
            // for end.
        }
        else{
            $("#errorMsg").html("Error...2");
        }
    // });

    // 取得貼文
    /* 
    ***********************************************************
    (post)
    {
        "act": "getRecord"
        "mId": "fd000001"
        "loadTimes": 1
    }

    (get)
    {
        "status": true/ false, 
        "msg": "Successfully show home page."/ "Can't show post.",
        "recordPost": [ // loadTimes x8 後的8格
            {"foodName": "餐點", "shopName": "店家", "mealTime": "b", "foodCount": 1, "foodCost": 50, "foodCal": 425, "foodPoint": (1~5), "foodNote": "備註", "foodImg": "???", "mealDate": "???"}, {}, {}, ...
        ]
    }
    ***********************************************************
    */
}

$("#homeLoadmore").click(function (){
    loadTimes++;
    /* 
    ***********************************************************
    (post)
    {
        "act": "getRecord"
        "mId": "fd000001"
        "loadTimes": 1
    }

    (get)
    {
        "status": true/ false, 
        "info": "Successfully show home page."/ "Can't show post.",
        "recordPost": [ // loadTimes x8 後的8格
            {"foodName": "餐點", "shopName": "店家", "mealTime": "b", "foodCount": 1, "foodCost": 50, "foodCal": 425, "foodPoint": (1~5), "foodNote": "備註", "foodImg": "???", "mealDate": "???"}, {}, {}, ...
        ]
    }
    ***********************************************************
    */

   let data= { //test
        "status": true, 
        "info": "Successfully show home page.",
        "recordPost": [ // 8格
            {"foodName": "餐點2", 
            "shopName": "店家2", 
            "mealTime": "b", 
            "foodCount": 1, 
            "foodCost": 200, 
            "foodCal": 1200, 
            "foodPoint": 3, 
            "foodNote": "備註備註備註備註備註備註", 
            "foodImg": "img/portfolio-img/1.jpg", 
            "mealDate": "2001-09-11"}
        ]
    };

    if(data.status== true){
        $("#errorMsg").html("");

        let recordPost= data.recordPost;
        // for start: (每則貼文)
        for(var i= 0; i< recordPost.length; i++){
            var onePost= "<div class=\"col-12 col-sm-6 col-lg-3 single_gallery_item wow fadeInUpBig\" data-wow-delay=\"300ms\">"+
                            "<div class=\"blog-post-thumbnail\">"+
                                "<a class=\"gallery-img\" href=\"";
            onePost+= recordPost[i].foodImg+ "\"><img src=\""+ recordPost[i].foodImg; // 餐點圖片?????
            onePost+= "\"></a><div class=\"post-date\"><a href=\"#\">";
            
            var mealDateStr= recordPost[i].mealDate; // 2012-07-03
            var mealDate= "";
            var monthStr= mealDateStr.substring(5, 7); // 07
            if(monthStr== "01") mealDate+= "Jan";
            else if(monthStr== "02") mealDate+= "Feb";
            else if(monthStr== "03") mealDate+= "Mar";
            else if(monthStr== "04") mealDate+= "Apr";
            else if(monthStr== "05") mealDate+= "May";
            else if(monthStr== "06") mealDate+= "Jun";
            else if(monthStr== "07") mealDate+= "Jul";
            else if(monthStr== "08") mealDate+= "Aug";
            else if(monthStr== "09") mealDate+= "Sep";
            else if(monthStr== "10") mealDate+= "Oct";
            else if(monthStr== "11") mealDate+= "Nov";
            else mealDate+= "Dec";
            mealDate+= " "+ mealDateStr.substring(8, 10);
            mealDate+= " \'"+ mealDateStr.substring(2, 4); // '12

            onePost+= mealDate; // 日期(Jan 01 '09)(月 日 '年)
            onePost+= "</a></div></div><div class=\"gallery-content\"><h6><span style=\"color:gold\">";
            
            for(var point= 0; point< recordPost[i].foodPoint; point++) // 評價(1~5)
                onePost+= "<i class=\"fa fa-star\"></i>&nbsp;"; // 星星
            
            onePost+= "</span></h6><h4>"+ recordPost[i].shopName+ " <strong>"; // 店名
            onePost+= recordPost[i].foodName+ "</strong></h4><h6>"; // 餐點名
            onePost+= recordPost[i].foodCount+ "份&nbsp;"; // 數量
            onePost+= "<i class=\"fa fa-dollar\" style=\"color:darkgoldenrod\">"+ recordPost[i].foodCost+ "元</i>&nbsp;"; // 金額
            onePost+= "<i class=\"fa fa-fire\" style=\"color:darkred\">"+ recordPost[i].foodCal+ "cal </i>&nbsp;&nbsp;"; // 熱量
            
            switch(recordPost[i].mealTime){ // 時段
                case 'b':
                onePost+= "<i class=\"bi bi-brightness-alt-high\">Breakfast</i></h6><p>";
                break;
                case 'l':
                onePost+= "<i class=\"bi bi-brightness-high\">Lunch</i></h6><p>";
                break;
                case 'd':
                onePost+= "<i class=\"bi bi-cloud-moon\">Dinner</i></h6><p>";
                break;
                case 'n':
                onePost+= "<i class=\"bi bi-moon\">Night Meal</i></h6><p>";
                break;
                case 'o':
                onePost+= "<i class=\"bi bi-emoji-wink\">Other</i></h6><p>";
                break;
            }
            onePost+= recordPost[i].foodNote+ "</p></div></div>"; // 備註

            $(".sonar-portfolio").append(onePost).isotope("appended", onePost).isotope("destroy");
        }
        // for end.
    }
    else{
        $("#errorMsg").html(data.info);
    }
});