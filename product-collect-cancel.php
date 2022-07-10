<?php
$order=isset($_GET["order"]) ? $_GET["order"] : 1;
$page=isset($_GET["page"]) ? $_GET["page"] : 1;
$search=isset($_GET["search"]) ? $_GET["search"] : "";
$selectPages=isset($_GET["selectPages"]) ? $_GET["selectPages"] : 5;
$exist=isset($_GET["exist"]) ? $_GET["exist"] : 0;
$product=isset($_GET["product"]) ? $_GET["product"] : "";

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
// exit;
$sql="UPDATE product_like SET valid=0 WHERE user_id='$id' AND product_id='$product'";


if ($conn->query($sql) === TRUE) {
    echo "新增成功";
} else {
    echo "新增資料錯誤: " . $conn->error;
}


header("location: product-collect-detail.php?page=".$page."&order=".$order."&selectPages=".$selectPages."&search=".$search."&valid=".$valid."&id=".$id."&exist=0"."&product=".$product);


?>