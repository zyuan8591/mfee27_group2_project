<?php
require("./db-connect.php");

if(!isset($_GET()))

$name=$_GET["name"];
$categoryMain=$_GET["category_main"];
$categorySub-$_GET["category_sub"];
$price=$_GET["price"];
$inventory=$_GET["inventory"];
$intro=$_GET["intro"];
$spec=$_GET["spec"];

$now=date('Y-m-d H:i:s');

$sql="INSERT INTO product (name, category_main, category_sub, price, inventory, intro, spec, now, valid) VALUES ('$name', '$category_main', '$category_sub', '$price', '$inventory', '$intro', '$spec', '$now', 1)";


?>