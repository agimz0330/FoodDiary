<?php
$mId = $_POST['mId'];
$loadtimes = $_POST['loadTimes'];
// $mId = 'fd000001';
// $loadtimes = 1;

require_once 'server.php';

$db = mysqli_connect($serverName, $userName, $password, $databaseName);
if (mysqli_connect_errno()) {
printf("Connect failed:") . mysqli_connect_error();
exit();
}
mysqli_set_charset($db, "utf8");

$q = mysqli_query($db,"SELECT * FROM food NATURAL JOIN record  WHERE food.mId='$mId'");
if($q){
    $times = $q->num_rows;
    if($times <= 0 ){
        $arr = array(
            'status' => false,
            'msg' => "Can't show post." ,
        );       
    } else{
        /////////////////////////////////////////////////
        // $array2=array();
        // for($i=0;$i<$q->num_rows;$i++){
        //     $row = mysqli_fetch_array($q);
        //     // print_r($row);
        //     // $log=array("mId"=>"$row[0]","foodName"=>"$row[1]","shopName"=>"$row[2]","foodCal"=>"$row[3]","foodCost"=>"$row[4]","foodPoint"=>"$row[5]","foodImg"=>"$row[6]","foodNote"=>"$row[7]","mealDate"=>"$row[8]","foodCount"=>"$row[9]","mealTime"=>"$row[10]");
        //     //!! =>   !!需要雙引號?!
        //     $log=array("foodName"=>$row[1],"shopName"=>$row[2],"mealTime"=>$row[10],"foodCount"=>$row[9], "foodCost"=>$row[4],"foodCal"=>$row[3], "foodPoint"=>$row[5], "foodNote"=>$row[7], "foodImg"=>$row[6], "mealDate"=>$row[8]);
        //     $arrary2[$i]=$log;
        // }
        //// print_r($array2);
        ////////////////////////////////////////////////
        if( $times <= ($loadtimes-1)*8 ){
            $arr = array(
                'status' => false,
                'msg' => "沒有此頁." ,
            );
        }else{
            $record_arr = array();
            for( $i = 0 ; $i<$times ; $i++ ){
                $row = mysqli_fetch_array($q);
                if($i < ($loadtimes-1)*8){
                    continue;
                }else if($i >= $loadtimes*8){
                    break;
                }else{
                    $record=array("foodName"=>$row[1],"shopName"=>$row[2],"mealTime"=>$row[10],"foodCount"=>$row[9], "foodCost"=>$row[4],"foodCal"=>$row[3], "foodPoint"=>$row[5], "foodNote"=>$row[7], "foodImg"=>$row[6], "mealDate"=>$row[8]);
                    array_push($record_arr, $record);
                }
            }
            $arr = array(
                'status' => true,
                'msg' =>"Successfully show home page.",
                'recordPost' => $record_arr,
            );
        }

        // if($loadtimes == 1){
        //     if($q->num_rows > 8)
        //     {
        //         $times=8;
        //     }else{
        //         $times=$q->num_rows;
        //     }

        //     $array2=array();
        //     for($i=0;$i<$times;$i++){
        //         $row = mysqli_fetch_array($q);
        //         // print_r($row);
        //         // $log=array("mId"=>"$row[0]","foodName"=>"$row[1]","shopName"=>"$row[2]","foodCal"=>"$row[3]","foodCost"=>"$row[4]","foodPoint"=>"$row[5]","foodImg"=>"$row[6]","foodNote"=>"$row[7]","mealDate"=>"$row[8]","foodCount"=>"$row[9]","mealTime"=>"$row[10]");
        //         //!! =>   !!需要雙引號?!
        //         //$log=array("mId"=>"$row[0]","foodName"=>"$row[1]","shopName"=>"$row[2]","foodCal"=>"$row[3]","foodCost"=>"$row[4]","foodPoint"=>"$row[5]","foodImg"=>"$row[6]","foodNote"=>"$row[7]","mealDate"=>"$row[8]","foodCount"=>"$row[9]","mealTime"=>"$row[10]");

        //         $log=array("foodName"=>$row[1],"shopName"=>$row[2],"mealTime"=>$row[10],"foodCount"=>$row[9], "foodCost"=>$row[4],"foodCal"=>$row[3], "foodPoint"=>$row[5], "foodNote"=>$row[7], "foodImg"=>$row[6], "mealDate"=>$row[8]);
        //         $arrary2[$i]=$log;
        //     }
        //     // print_r($array2);
        //     $arr = array(
        //         'status' => true,
        //         'msg' =>"Successfully show home page.",
        //         'recordPost' => $arrary2,
        //     );
        // }else if($loadtimes == 2){
        //     //若比數 
        //     // if($q->num_rows > 8)
        //     // {
        //     //     $times=8;
        //     // }else{
        //     //     $times=$q->num_rows;
        //     // }

        //     $array2=array();

        //     for($i=0;$i<16;$i++){
        //         if($i >7){
        //         $row = mysqli_fetch_array($q);
        //         // print_r($row);
        //         // $log=array("mId"=>"$row[0]","foodName"=>"$row[1]","shopName"=>"$row[2]","foodCal"=>"$row[3]","foodCost"=>"$row[4]","foodPoint"=>"$row[5]","foodImg"=>"$row[6]","foodNote"=>"$row[7]","mealDate"=>"$row[8]","foodCount"=>"$row[9]","mealTime"=>"$row[10]");
        //         //!! =>   !!需要雙引號?!
        //         $log=array("foodName"=>$row[1],"shopName"=>$row[2],"mealTime"=>$row[10],"foodCount"=>$row[9], "foodCost"=>$row[4],"foodCal"=>$row[3], "foodPoint"=>$row[5], "foodNote"=>$row[7], "foodImg"=>$row[6], "mealDate"=>$row[8]);
        //         $arrary2[$i]=$log;
        //         }
        //     }
        //     $arr = array(
        //         'status' => true,
        //         'msg' =>"Successfully show home page.",
        //         'recordPost' => $arrary2,
        //     );

        // }
    }
}
else{
    $arr = array(
        'status' => false,
        'msg' => $db->error,
    );
}
// print($arr);
print_r(json_encode($arr));
?>