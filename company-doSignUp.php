<?php
require("db-connect.php");

if(!isset($_POST["signup-name"])){
    echo "請循正常管道登入";
    exit;
}

$signupName = $_POST["signup-name"];
$signupEmail = $_POST["signup-email"];
$signupPassword = $_POST["signup-password"];
$signupRePassword = $_POST["signup-repassword"];
$signupPhone = $_POST["signup-phone"];
$signupAddress = $_POST["signup-address"];
$now=date('Y-m-d H:i:s');

if(empty($signupName)){
    echo "請輸入名稱";
    exit;
}
if(empty($signupEmail)){
    echo "請輸入email";
    exit; 
}
if(empty($signupPassword)){
    echo "請輸入密碼";
    exit; 
}
if(empty($signupRePassword)){
    echo "請再次確認密碼";
    exit; 
}
if(empty($signupPhone)){
    echo "請輸入電話";
    exit; 
}
if(empty($signupAddress)){
    echo "請輸入地址";
    exit; 
}
if($signupPassword != $signupRePassword){
    echo "前後密碼不一致";
    exit;
}

$sql="SELECT email FROM company_users WHERE email='$signupEmail'";
$result = $conn->query($sql);
$userCount=$result->num_rows;

if($userCount>0){
    echo "廠商帳號已存在";
    exit;
}

$signupPassword=md5($signupPassword);
$now=date('Y-m-d H:i:s');
$sqlCreate="INSERT INTO company_users (name, email, password, phone, address, create_time, logo_img, intro, valid) VALUES ('$signupName', '$signupEmail', '$signupPassword', '$signupPhone', '$signupAddress', '$now', '', '',  1)";

if ($conn->query($sqlCreate) === TRUE) {
    echo "新資料輸入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("location: login.php");
?>