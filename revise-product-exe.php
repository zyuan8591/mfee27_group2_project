<?php
require("./db-connect.php");

$filterNum = isset($_GET["filter"]) ? $_GET["filter"] : "";
$validNum = isset($_GET["valid"]) ? $_GET["valid"] : "";
$order = isset($_GET["order"]) ? $_GET["order"] : 1;
$search = isset($_GET["product_search"]) ? $_GET["product_search"] : "";
$page = isset($_GET["page"]) ? $_GET["page"]:1;
$per = isset($_GET["per"]) ? $_GET["per"] : 10;

$sql="SELECT id FROM products";
$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);
foreach ($rows as $row){
    
}
$id=$_GET["id"] ;
$name=$_GET["name"];
$categoryMain=$_GET["category_main"];
$categorySub=$_GET["category_sub"];
$price=$_GET["price"];
$inventory=$_GET["inventory"];
$intro=$_GET["intro"];
$spec=$_GET["spec"];
$pic=$_GET["product_main_img"];

$sqlRevise="UPDATE products SET name='$name', category_main='$categoryMain', category_sub='$categorySub', price='$price', inventory='$inventory', intro='$intro', spec='$spec', product_main_img='$pic' WHERE id=$id ";

echo $sqlRevise;
echo "<br>";

if ($conn->query($sqlRevise) === TRUE) {
    echo "商品已更新";
} else {
    echo "更新失敗" . $conn->error;
}

// header("location: product-index.php?order=$order&filter=$filterNum&page=$page&id=$id&per=$per&product_search=$search")
?>