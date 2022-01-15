<?php
$shopname = $_POST['shopName'];
$foodname = $_POST['foodName'];


$serverName = "127.0.0.1";
$userName = "root";
$password = "";
$databaseName = "fooddiary";

$db = mysqli_connect($serverName, $userName, $password, $databaseName);
if (mysqli_connect_errno()) {
printf("Connect failed:") . mysqli_connect_error();
exit();
}
mysqli_set_charset($db, "utf8");

$result = mysqli_query($db, "SELECT * FROM food");
$num_rows = mysqli_num_rows($result);
$id.=strval($num_rows+1);
$ins = "INSERT INTO member (mId,account,password,nickName) VALUES ('$id','$acc','$pwd','$acc')";
$qq = mysqli_query($db,$ins);
if(!$qq){
    $arr = array(
        'status' => false,
        'msg' => $db->error,
    );
    // echo $db->error;
}else{
    $arr = array(
        'status' => true,
        'mId' => $id ,
    );
}
$db->close();

print_r($arr);
// echo json_encode($arr);
// header("location:LoginAndRegister.html");
?>