<?php

$mId = $_POST['mId'];
// $mId ='fd000010' ;

//////////////////////////////////////////
require_once 'server.php';

$db = mysqli_connect($serverName, $userName, $password, $databaseName);
if (mysqli_connect_errno()) {
printf("Connect failed:") . mysqli_connect_error();
exit();
}
mysqli_set_charset($db, "utf8");

////要先確認123裡有沒有了!!!
// $ins = "INSERT INTO food (mId,shopName,foodName,foodCal,foodCost,foodPoint,foodImg,foodNote) VALUES ('$mId','$shopname','$foodname','$foodcal','$foodcost','$foodpoint','$foodimg','$foodnote')";
// $ins = "INSERT INTO food (mId,shopName,foodName,foodCal,foodCost,foodPoint,foodImg,foodNote) VALUES ('$mId','$shopname','$foodname','$foodcal','$foodcost','$foodpoint','$foodimg','$foodnote') WHERE NOT EXISTS (SELECT mId,shopName,foodName FROM food WHERE mid='$mId' AND shopName='$shopname' AND foodName='$foodname');";

$q = mysqli_query($db,"SELECT mId,shopName,foodName FROM food WHERE mId='$mId' AND shopName='$shopname' AND foodName='$foodname'");

if(mysqli_num_rows($q)<1)
{
    $ins = "INSERT INTO food (mId,shopName,foodName,foodCal,foodCost,foodPoint,foodImg,foodNote) VALUES ('$mId','$shopname','$foodname','$foodcal','$foodcost','$foodpoint','$foodimg','$foodnote')";
    $qq = mysqli_query($db,$ins);
    if($qq){ //$qq success   
        $ins2 = "INSERT INTO record (mId,shopName,foodName,mealDate,foodCount,mealTime) VALUES ('$mId','$shopname','$foodname','$mealdate','$foodcount','$mealtime')";
        $qqq = mysqli_query($db,$ins2);   

        if($qqq){
            echo "yap1";
            $arr = array(
                'status' => true,
            );
        }else{
            echo "Insert record failed1";
            $arr = array(
                'status' => false,
                'msg' => "Insert record failed",
            );
        }
        
    }else{
        echo "Insert food failed1";
        $arr = array(
            'status' => false,
            'msg' => "Insert food failed",
        );
    }
    
}else if(mysqli_num_rows($q) == 1){
    $ins2 = "INSERT INTO record (mId,shopName,foodName,mealDate,foodCount,mealTime) VALUES ('$mId','$shopname','$foodname','$mealdate','$foodcount','$mealtime')";
    $qqq = mysqli_query($db,$ins2);
    if($qqq){
        echo "success2";
        $arr = array(
            'status' => true,
        );
    }else{
        echo "Insert record failed2";
        $arr = array(
            'status' => false,
            'msg' => "Insert record failed",
        );
    }
}else{
    echo "no333";
    echo $db->error;
    $arr = array(
        'status' => false,
        'msg' => $db->error,
    );
}


// print($arr);
print_r(json_encode($arr));
?>