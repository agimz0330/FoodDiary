<?php
    //notYet
    //groupmemberDatalist.php

    //mId groupName 
    //

    // $mId = $_POST['mId'];
    // $gname = $_POST['groupName'];

    // $mId = 'fd000001';
    $gname = '幸福一家人';

    //conn
    require_once 'server.php';

    $db = mysqli_connect($serverName, $userName, $password, $databaseName);
    if (mysqli_connect_errno()) {
    printf("Connect failed:") . mysqli_connect_error();
    exit();
    }
    mysqli_set_charset($db, "utf8");
    //conn end
    //////////////////////////////////////////



    //natural join on 
    // $q = mysqli_query($db,"SELECT groupId,account,nickName,gender,age,weight,userName FROM mygroup NATURAL JOIN joingroup NATURAL JOIN member NATURAL JOIN goal WHERE mygroup.gName='$gname' AND joingroup.mId=member.mId AND member.mId=goal.mId AND  mygroup.groupId= joingroup.groupId  ");

    // $q = mysqli_query($db,"SELECT groupId,gName FROM mygroup NATURAL JOIN joingroup WHERE gName='$gname' ");         //success get groupId
    // $q = mysqli_query($db,"SELECT groupId,gName,mId FROM mygroup NATURAL JOIN joingroup NATURAL JOIN member  WHERE gName='$gname' "); //success get groupId
    // $q = mysqli_query($db,"SELECT groupId,gName,mId,account,nickName,gender,age,weight,userName FROM mygroup NATURAL JOIN joingroup NATURAL JOIN member  WHERE gName='$gname' ");   //success get groupmemberData(3)
    // $q = mysqli_query($db,"SELECT groupId,gName,mId,account,nickName,gender,age,weight,userName,number,target FROM mygroup NATURAL JOIN joingroup NATURAL JOIN member NATURAL JOIN goal WHERE gName='$gname' AND (EXISTS) ");   //success get groupmemberData
    $q2 = mysqli_query($db,"SELECT groupId,gName,member.mId,account,nickName,gender,age,weight,userName,GROUP_CONCAT(goal.target SEPARATOR ',')AS target FROM mygroup NATURAL JOIN joingroup NATURAL JOIN member LEFT OUTER JOIN goal ON member.mId=goal.mId WHERE gName='$gname' GROUP BY member.mId");   //success get groupmemberData
    // $q2 = mysqli_query($db,"SELECT mId, GROUP_CONCAT(target SEPARATOR ',')AS target FROM goal GROUP BY mId  ");         //success get groupId



    // //get groupId
    // $row = mysqli_fetch_array($q);
    // $gIdd = $row['groupId'];
    // var_dump($gIdd);
    // print_r($gIdd);

    if($q2){

        $times = $q2->num_rows;
        ///targetArray
        


        // $target_arr = array();

        // for( $j = 0 ; $j<5 ; $j++ ){
        //     $row2 = mysqli_fetch_array($q);
        //     if(empty($row2['target'])
        //     {
        //         $record2=array("target"=>"");
        //     }
        //     $record2=array("gName"=>$row2[10]);
        //     array_push($target_arr, $record2);
        //     print_r($row2);
        // }

        /////
        $record_arr = array();

        for( $i = 0 ; $i<$times ; $i++ ){
            $row = mysqli_fetch_array($q2);
            
            $record=array("mId"=>$row[2],"account"=>$row[3],"nickName"=>$row[4],"gender"=>$row[5],"age"=>$row[6],"weight"=>$row[7],"userName"=>$row[8],"target"=>$row[9],);
            array_push($record_arr, $record);
            // print_r($row);
        }
        print_r($record_arr);

        $arr = array(
            'status' => true,
            'msg' =>"Successfully show group list.",
            'grouplist' => $record_arr,
        );
    }else{
        echo "Failed!";
        echo $db->error;
        $arr = array(
            'status' => false,
            'msg' =>"Failed.",
        );
    }     

    print_r(json_encode($arr));

/*
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

*/
?>
