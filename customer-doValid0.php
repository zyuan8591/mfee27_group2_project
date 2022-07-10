<?php
$order=isset($_GET["order"]) ? $_GET["order"] : 1;
$page=isset($_GET["page"]) ? $_GET["page"] : 1;
$search=isset($_GET["search"]) ? $_GET["search"] : "";
$selectPages=isset($_GET["selectPages"]) ? $_GET["selectPages"] : 5;
$id=isset($_GET["id"]) ? $_GET["id"] : "";

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

$sql="UPDATE customer_users SET valid=0 WHERE id='$id'";


if ($conn->query($sql) === TRUE) {
    echo "新增成功";
} else {
    echo "新增資料錯誤: " . $conn->error;
}


header("location: customer-index.php?page=".$page."&order=".$order."&selectPages=".$selectPages."&search=".$search."&valid=".$valid);
// header("location: customer-index.php");

?>