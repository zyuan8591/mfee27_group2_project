<?php
require("./db-connect.php");



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
$sql="INSERT INTO products (name, category_main, category_sub, price, inventory, intro, spec, product_main_img, create_time, valid) 
VALUES ('$name', '$categoryMain', '$categorySub', '$price', '$inventory', '$intro', '$spec', '$pic', '$now', 1)";

echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "新增完成";
    echo $conn->insert_id;
} else {
    echo "新增失敗" . $conn->error;
}
$conn->close();
