<?php
if(!isset($_POST["name"])){
    echo "沒有帶資料";
    exit;
}

require("db-connect.php");

// $id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$intro=$_POST["intro"];
$now=date('Y-m-d H:i:s');

if(empty($name)){
    echo "請輸入名稱";
    exit;
}
if(empty($email)){
    echo "請輸入email";
    exit; 
}
if(empty($password)){
    echo "請輸入密碼";
    exit; 
}
if(empty($phone)){
    echo "請輸入電話";
    exit; 
}
if(empty($address)){
    echo "請輸入地址";
    exit; 
}
if(empty($intro)){
    echo "請輸入簡介內容";
    exit;
}

$password=md5($password);
$sql="SELECT email FROM company_users WHERE email='$email'";
$result = $conn->query($sql);
$userCount=$result->num_rows;

if($userCount>0){
    echo "廠商帳號已存在";
    exit;
}

$sql="INSERT INTO company_users (name, email, password, phone, address, create_time, logo_img, intro, valid) VALUES ('$name', '$email', '$password', '$phone', '$address', '$now', 'none', '$intro', 1)";

if ($conn->query($sql) === TRUE) {
    echo "資料表新增成功";
} else {
    echo "修改資料表錯誤: " . $conn->error;
}

$conn->close();

// header("location: company-detail.php?");



?>