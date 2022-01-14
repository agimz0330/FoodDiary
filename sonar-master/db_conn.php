<?php
    $serverName = "127.0.0.1";
    $userName = "root";
    $password = "";
    $databaseName = "fooddiary";

    $db = mysqli_connect($serverName, $userName, $password, $databaseName);
    if (mysqli_connect_errno()) {
    printf("Connect failed:") . mysqli_connect_error();
    exit();
    }
    mysqli_set_charset($db, "utf8"); //設定編碼
    // mysqli_select_db($db, "test");//連線狀態中更換資料庫
    $mid = "11112111";
    $one = "21";
    $two = "2";
    $thr = "3";
    $four = '"m"';
    $age = "3";
    $weight = "10";

    //update
    $del = "UPDATE member SET age=200 WHERE mid=11112111";
    $qqq = mysqli_query($db,$del);
    if($qqq){
        echo "oh";
    }
    else echo $db->error;

    //delete
    // $del = "DELETE FROM member WHERE mid=11112111";
    // $qqq = mysqli_query($db,$del);
    // if($qqq){
    //     echo "oh";
    // }
    // else echo $db->error;

    //insert
    // $ins = "INSERT INTO member (mId,account,password,nickName,gender) VALUES ($mid,$one,$two,$thr,$four)";
    // $qq = mysqli_query($db,$ins);
    // if($qq){
    //     echo "no";
    // }
    // else echo $db->error;
        

    //select
    // $q = mysqli_query($db,"SELECT * FROM member");
    // // echo $q;
    // if($q){
    //     echo "yes";
    //     $row = mysqli_fetch_array($q);
    //     echo $row['mId'];
    // }
    // else echo "fuck";
    $db->close();
//mysqli_close()//斷掉連接
?>