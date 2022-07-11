<?php
session_start();
require("./db-connect.php");

$filterNum = isset($_GET["filter"]) ? $_GET["filter"] : "";
$validNum = isset($_GET["valid"]) ? $_GET["valid"] : "";
$order = isset($_GET["order"]) ? $_GET["order"] : 1;
$search = isset($_GET["product_search"]) ? $_GET["product_search"] : "";
$page = isset($_GET["page"]) ? $_GET["page"]:1;
$per = isset($_GET["per"]) ? $_GET["per"] : 10;


$company=$_GET["company_id"];
$name=$_GET["name"];
$categoryMain=$_GET["category_main"];
$categorySub=$_GET["category_sub"];
$price=$_GET["price"];
$inventory=$_GET["inventory"];
$intro=$_GET["intro"];
$spec=$_GET["spec"];
$now=date('Y-m-d H:i:s');
$pic=$_GET["product_main_img"];

if(empty($name)){
    echo "請輸入欄位";
}
$sql="INSERT INTO products (company_id, name, category_main, category_sub, price, inventory, intro, spec, product_main_img, create_time, valid) 
VALUES ('$company', '$name', '$categoryMain', '$categorySub', '$price', '$inventory', '$intro', '$spec', '$pic', '$now', 1)";

echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "新增完成";
    echo $conn->insert_id;
    $sucess=[
        "id"=>1,
    ];
} else {
    echo "新增失敗" . $conn->error;
    $sucess=[
        "id"=>0,
    ];
}
$conn->close();
header("location: product-index.php?order=1&filter=$filterNum&valid=$validNum&order=$order&page=$page&per=$per");