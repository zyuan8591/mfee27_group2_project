<?php
$servername="localhost";
$username="admin";
$password="12345";
$dbname="my_test_db";

$conn= new mysqli($servername, $username, $password, $dbname);
// 檢查連線
if ($conn->connect_error){
    die("連線失敗".$conn->connect_error);
}else{
    // echo "連線成功";

};
?>