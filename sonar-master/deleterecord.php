<?php
// $mId = $_POST['mId'];
// $shopname = $_POST['shopName'];
// $foodname = $_POST['foodName'];

$mId = 'fd000001';
$shopname = '天好茶';
$foodname = '珍珠鮮奶';


require_once 'server.php';

$db = mysqli_connect($serverName, $userName, $password, $databaseName);
if (mysqli_connect_errno()) {
printf("Connect failed:") . mysqli_connect_error();
exit();
}
mysqli_set_charset($db, "utf8");
/////////////////////

//!!!!
// $q = mysqli_query($db,"DELETE FROM food WHERE mid='$mId' AND  shopName='$shopname' AND  foodName='$foodname' ");
////還需要Date
$q = mysqli_query($db,"DELETE FROM record WHERE mid='$mId' AND  shopName='$shopname' AND  foodName='$foodname' ");
if($q){
    
        $arr = array(
            'status' => true,
            'msg' => "Delete Successed" ,
        );       
    } 
else{
    echo $db->error;
    $arr = array(
        'status' => false,
        'msg' => $db->error,
        // 'msg' =>"Delete Failed!",
    );
}
// print($arr);
print_r(json_encode($arr));
?>