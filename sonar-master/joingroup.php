<?php
//notYet
//joingroup //mygroup //groupmemberDatalist   //allgrouplist        ////印評分單


$mId = $_POST['mId'];
$gname = $_POST['groupName'];
// $mId ='fd000010';
// $gname = '海大212';



require_once 'server.php';

$db = mysqli_connect($serverName, $userName, $password, $databaseName);
if (mysqli_connect_errno()) {
printf("Connect failed:") . mysqli_connect_error();
exit();
}
mysqli_set_charset($db, "utf8");



$result = mysqli_query($db, "SELECT * FROM member");


















print_r(json_encode($arr));
// echo json_encode($arr);
// header("location:LoginAndRegister.html");
?>