<?php
session_start();
require "db-connect.php";

$condition=0;
if(!isset($_POST["brand"])){
    echo "請輸入資料";
    exit();
}
$id = $_POST["id"];
$name = $_POST["brand"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$intro = $_POST["intro"];

// echo "$name <br> $email <br> $phone <br> $address <br> $intro";
// echo $id;
$sql = "UPDATE company_users SET name = '$name', email = '$email', phone = '$phone',
address = '$address', intro = '$intro' WHERE id = $id ";

if($conn->query($sql) == true ){
    echo "資料修改成功";
    $condition=1;

} else {
    $conn->error;
}
if($condition==1){
    $_SESSION["modify"]=[
        "condition" => $condition
    ];
}

header("location: company-info.php");


?>