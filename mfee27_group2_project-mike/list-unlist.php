<?php
require("./db-connect.php");

$filterNum = isset($_GET["filter"]) ? $_GET["filter"] : "";
$validNum = isset($_GET["valid"]) ? $_GET["valid"] : "";
$order = isset($_GET["order"]) ? $_GET["order"] : 1;
$search = isset($_GET["product_search"]) ? $_GET["product_search"] : "";
$page = isset($_GET["page"]) ? $_GET["page"]:1;
$per = isset($_GET["per"]) ? $_GET["per"] : 10;

$sql="SELECT id, valid FROM products WHERE id=$id";

$id=$_GET["id"];
$valid=$_GET["valid"];

if($valid==1){
    $sqlUpdate="UPDATE products SET valid=0 WHERE id=$id";
}else{
    $sqlUpdate="UPDATE products SET valid=1 WHERE id=$id";
}

echo $sql;
if ($conn->query($sqlUpdate) === TRUE) {
    echo "已上架";
} else {
    echo "已下架 " . $conn->error;
}

$conn->close();
header("location: product-index.php?order=$order&filter=$filterNum&page=$page&id=$id&per=$per&product_search=$search")
?>