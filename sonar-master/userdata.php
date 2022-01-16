<?php
    //default value


    // $mId = $_POST['mId'];
    $mId ='fd000013';

    //conn
    require_once 'server.php';

    $db = mysqli_connect($serverName, $userName, $password, $databaseName);
    if (mysqli_connect_errno()) {
    printf("Connect failed:") . mysqli_connect_error();
    exit();
    }
    mysqli_set_charset($db, "utf8");
    //conn end

    $q = mysqli_query($db,"SELECT * FROM member WHERE member.mId='$mId'");

    if($q){
        $row = mysqli_fetch_array($q);
        // $record=array("account"=>$row[1],"password"=>"********","nickName"=>$row[3],"gender"=>$row[4],"age"=>$row[5],"weight"=>$row[6]);
        $record=array("account"=>$row[1],"password"=>"********","nickName"=>$row[3],"gender"=>$row[4],"age"=>$row[5],"weight"=>$row[6]);
        
        print_r($record);

        $arr = array(
            'status' => true,
            'msg' =>"Success",
            'data' => $record,
        );
    }else{
        echo "failed!";
        $arr = array(
            'status' => false,
            'msg' =>"Failed.",
        );
    }     

    print_r(json_encode($arr));

?>