<?php
session_start();
require("./db-connect.php");
$condition=0;
// echo $_SERVER['QUERY_STRING'];
// echo $_GET['id'];
$id=$_GET['id'];
$page=$_GET['page'];
$order=$_GET['order'];
$search=$_GET['search'];
$valid=$_GET['valid'];
$perPage=$_GET["per-page"];

$sqlOnoffshelf = "SELECT id, valid FROM coupon WHERE id='$id'";
$resultOnoffshelf = $conn->query($sqlOnoffshelf);
$rowOnoffshelf = $resultOnoffshelf->fetch_assoc();
var_dump($rowOnoffshelf);

if ($rowOnoffshelf["valid"] == 0) {
	$sqlUpadate = "UPDATE coupon SET valid=1 WHERE id='$id'";
    $condition=1;
}
if($rowOnoffshelf["valid"] == 1) {
	$sqlUpadate = "UPDATE coupon SET valid=0 WHERE id='$id'";
    $condition=2;
}

if($conn->query($sqlUpadate)){
    echo "資料更新成功 <br>";   
} else {
    echo "error: " . $conn->error;    
}
$conn->close();

if($condition!=0){
    $_SESSION["addCoupon"]=[
        "condition" => $condition
    ];
}

header("location: coupon-index.php?page=$page&order=$order&search=$search&valid=$valid&per-page=$perPage");
?>