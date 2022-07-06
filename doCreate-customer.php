<?php
require("../db-connect.php");

if(!isset($_POST["name"])){
    echo "沒有帶資料到此頁";
    exit;
}

$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
date_default_timezone_set("Asia/Taipei");
$now=date('Y-m-d H:i:s');
// echo $now;
// echo "$name,$email,$phone";
// exit;

$sql="INSERT INTO users (name,phone,email,create_time,valid) VALUES('$name','$phone','$email','$now',1)";

if ($conn->query($sql) === TRUE) {
    echo "新資料輸入成功";
} else {
    echo "修改資料表錯誤: " . $conn->error;
}

$conn->close();

header("location: create-user.php");
?>