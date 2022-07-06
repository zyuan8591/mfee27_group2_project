<?php
require("db-connect.php");

if(!isset($_POST["name"])){
    echo "沒有帶資料到此頁";
    exit;
}

$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$date=$_POST["date"];
// date_default_timezone_set("Asia/Taipei");
$now=date('Y-m-d H:i:s');
// echo "$name,$email,$phone,$now,$password,$date";
// exit;

if(empty($name)){
    echo"請輸入名稱";
    exit;
}
if(empty($email)){
    echo"請輸入電子信箱帳號";
    exit;
}
if(empty($password)){
    echo"請輸入密碼";
    exit;
}
if(empty($repassword)){
    echo"請再輸入一次密碼";
    exit;
}
if($password != $repassword){
    echo "您輸入的前後密碼不一致";
    exit;
}
if(empty($phone)){
    echo"請輸入電話號碼";
    exit;
}
if(empty($address)){
    echo"請輸入地址";
    exit;
}
if(empty($date)){
    echo"請輸入生日日期";
    exit;
}

$password=md5($_POST["password"]);

$sql="SELECT * FROM customer_users WHERE name='$name'";
$result=$conn->query($sql);
$customerExist=$result->num_rows;
// echo $customerExist;
// exit;
if($customerExist>0){
    echo"該名稱已存在";
    exit;
}

$customerCreateSql="INSERT INTO customer_users (name,email,password,phone,address,birthday,create_time,img,valid) VALUES ('$name','$email','$password','$phone','$address','$date','$now',' ',1)";

if ($conn->query($customerCreateSql) === TRUE) {
    echo "新資料輸入成功";
} else {
    echo "修改資料表錯誤: " . $conn->error;
}

$conn->close();

header("location: recipe-index.php");
?>