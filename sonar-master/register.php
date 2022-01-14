<?php
$acc = $_POST['account'];
$pwd = $_POST['password'];

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

$result = mysqli_query($db, "SELECT * FROM member");
$num_rows = mysqli_num_rows($result);
$id ="fd";
for ( $i=0 ; $i<6-strlen($num_rows) ; $i++ ) {
    $id .="0";
}
$id.=strval($num_rows+1);
$ins = "INSERT INTO member (mId,account,password,nickName) VALUES ('$id',$acc,$pwd,'$id')";
$qq = mysqli_query($db,$ins);
if(!$qq){
    echo $db->error;
}
$db->close();
header("location:LoginAndRegister.html");
?>