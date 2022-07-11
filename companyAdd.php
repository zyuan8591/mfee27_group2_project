<?php
session_start();

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
$image = $_FILES["myfile-image"]["name"];
$now=date('Y-m-d H:i:s');

// var_dump($_FILES["image"]);

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

$condition=0;

if($_FILES["myfile-image"]["error"]==0){

    if(move_uploaded_file($_FILES["myfile-image"]["tmp_name"],"img/company_img/".$_FILES["myfile-image"]["name"])){
        
        $fileName=$_FILES["myfile-image"]["name"];

        $sql="INSERT INTO company_users (name, email, password, phone, address, create_time, logo_img, intro, valid ,is_admin) VALUES ('$name', '$email', '$password', '$phone', '$address', '$now', '$fileName', '$intro', 1, 0)";
        
    }else{
        echo "upload fail!!";
    }
}

if($image == ""){
    $sql="INSERT INTO company_users (name, email, password, phone, address, create_time, intro, valid ,is_admin) VALUES ('$name', '$email', '$password', '$phone', '$address', '$now', '$intro', 1, 0)";
}else{
    $sql="INSERT INTO company_users (name, email, password, phone, address, create_time, logo_img, intro, valid ,is_admin) VALUES ('$name', '$email', '$password', '$phone', '$address', '$now', '$fileName', '$intro', 1, 0)";
}

if ($conn->query($sql) === TRUE) {
    echo "資料表users修改完成";
    $condition=4;
} else {
    echo "資料表修改錯誤: " . $conn->error;
}

if($condition == 4){ 
    $_SESSION["userModify"] =[
        "condition" => $condition
    ];
} 

$conn->close();

header("location: company-member-all-index.php");


?>