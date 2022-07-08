<?php
require("./db-connect.php");

if(!isset($_POST["name"])){
    echo "資料未填寫完全";
    exit;
}

$name=$_POST["name"];
$number=$_POST["number"];
$startDate=$_POST["start-date"];
$endDate=$_POST["end-date"];
$discount=$_POST["discount"];
// date_default_timezone_set("Asia/Taipei");
$now=date('Y-m-d H:i:s');

$sql="INSERT INTO coupon (name,number,start_date,end_date,discount,create_time,valid) VALUES ('$name','$number','$startDate','$endDate','$discount','$now','1')";

if($conn->query($sql) === TRUE){
    echo "資料輸入成功";
}else{
    echo "Error: " .$sql . "<br>" . $conn->error;
}
$conn->close();
header("location: coupon-index.php");
?>