<?php

// $mId = $_POST['mId'];

// $pwd = $_POST['password'];
// $nickname = $_POST['nickName'];
// $gender = $_POST['gender'];
// $age = $_POST['age'];
// $weight = $_POST['weight'];
// $username = $_POST['userName'];

$pwd ='aaa12345678';
$mId ='fd000001' ;
$nickname ='小黑' ;
$gender ='F' ;
$weight ='82' ;
$username ='陳小黑';
$age = '37';

//////////////////////////////////////////
require_once 'server.php';

$db = mysqli_connect($serverName, $userName, $password, $databaseName);
if (mysqli_connect_errno()) {
printf("Connect failed:") . mysqli_connect_error();
exit();
}
mysqli_set_charset($db, "utf8");
///////////////////////////////////////////

$q = mysqli_query($db,"UPDATE member SET age='$age',weight='$weight',password='$pwd',gender='$gender',userName='$username',nickName='$nickname' WHERE mid='$mId'");

if($q)
{
    echo "update success!";
    $arr = array(
       'status' => true,
    );
       
}else{
    echo "failed";
    echo $db->error;
    $arr = array(
        'status' => false,
        'msg' => $db->error,
    );
}


// print($arr);
print_r(json_encode($arr));
?>