<?php
session_start();
$condition=0;
if(!isset($_POST["name"])){
    echo"沒有帶資料";
    exit;
}
require("db-connect.php");

$id=$_POST["id"];
$name=$_POST["name"];
$birthday=$_POST["birthday"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$address=$_POST["address"];
$image=$_FILES["image"]["name"];

// var_dump($_FILES["image"]["name"]);
// exit;
if ($_FILES["image"]["name"] !== ''){
    $image = $_FILES["image"]["name"]; 
}else{
    $image = $_POST["image_original"]; 
}

// echo "$name,$email,$phone,$birthday,$address,$image";
// exit;

if($image == ""){
    $sql="UPDATE customer_users SET name='$name',phone='$phone',birthday='$birthday',email='$email',address='$address' WHERE id=$id";
}else{
    $sql="UPDATE customer_users SET name='$name',phone='$phone',birthday='$birthday',email='$email',address='$address',img='$image' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    echo "資料表users修改完成";
    $condition=1;
} else {
    echo "資料表修改錯誤: " . $conn->error;
}

if($condition == 1){
    $_SESSION["usersModify"] =[
        "condition" => $condition
    ];
}

$conn->close();
header("location:customer-index.php");

