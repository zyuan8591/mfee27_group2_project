<?php
require("./db-connect.php");

if(!isset($_GET("name"))){
    echo "請輸入欄位";
}

$name=$_GET["name"];
$categoryMain=$_GET["category_main"];
$categorySub-$_GET["category_sub"];
$price=$_GET["price"];
$inventory=$_GET["inventory"];
$intro=$_GET["intro"];
$spec=$_GET["spec"];
$now=date('Y-m-d H:i:s');


$sql="INSERT INTO products (name, category_main, category_sub, price, inventory, intro, spec, now, valid) VALUES ('$name', '$category_main', '$category_sub', '$price', '$inventory', '$intro', '$spec', '$now', 1)";

echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "新增完成";
} else {
    echo "新增失敗" . $conn->error;
}
$conn->close();
?>