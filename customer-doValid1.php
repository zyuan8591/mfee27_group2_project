<?php
$order=isset($_GET["order"]) ? $_GET["order"] : 1;
$page=isset($_GET["page"]) ? $_GET["page"] : 1;
$search=isset($_GET["search"]) ? $_GET["search"] : "";
if(isset($_GET["valid"])){
	$valid=$_GET["valid"];
	$validType="AND valid=$valid";
}else{
	$valid="";
	$validType="";
}
if ($valid == "") {
	$valid = "";
	$validType = "";
}
require("db-connect.php");

$id=$_GET["id"];
// echo $id;

$sql="UPDATE customer_users SET valid=1 WHERE id='$id'";


if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
} else {
    echo "刪除資料錯誤: " . $conn->error;
}


header("location: recipe-index.php?page=".$page."&order=".$order."&search=".$search."&valid=".$valid);
// header("location: recipe-index.php");

?>