<?php 
session_start();
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

$q = mysqli_query($db,"SELECT * FROM member WHERE account=$acc");
// echo $q;
if($q){
    $row = mysqli_fetch_array($q);
    if ($pwd == $row['password']){
        $_SESSION['id'] = $row['mId'];
        // echo $_SESSION['id'];
        setcookie("id",$row['mId']);
        echo "<script> sessionStorage.setItem('id',". "'" . $row['mId'] . "'" . "));</script>";
        header("location:home.html");
        
    }
    else{
        header("location:LoginAndRegister.html");
    }
}
else{
    header("location:LoginAndRegister.html");
}

?>