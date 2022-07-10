<?php

require("./db-connect.php");
// echo $_SERVER['QUERY_STRING'];
// echo $_GET['id'];
$id=$_GET['id'];

$sqlOnoffshelf = "SELECT id, valid FROM coupon WHERE id='$id'";
$resultOnoffshelf = $conn->query($sqlOnoffshelf);
$rowOnoffshelf = $resultOnoffshelf->fetch_assoc();
var_dump($rowOnoffshelf);

if ($rowOnoffshelf["valid"] == 0) {
	$sqlUpadate = "UPDATE coupon SET valid=1 WHERE id='$id'";
}
if($rowOnoffshelf["valid"] == 1) {
	$sqlUpadate = "UPDATE coupon SET valid=0 WHERE id='$id'";	
}

if($conn->query($sqlUpadate)){
    echo "資料更新成功 <br>";   
} else {
    echo "error: " . $conn->error;    
}
$conn->close();

header("location: coupon-index.php");
?>