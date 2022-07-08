<?php
if(!isset($_POST["name"])){
    echo "沒有帶資料";
    exit;
}

require("db-connect.php");

$id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$intro=$_POST["intro"];

$sql="UPDATE company_users SET name='$name', email='$email', phone='$phone', address='$address', intro='$intro' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "資料表 users 修改完成";
} else {
    echo "修改資料表錯誤: " . $conn->error;
}

$conn->close();

// header("location: company-detail.php?");



?>
