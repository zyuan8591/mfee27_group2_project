<?php
require("./db-connect.php");

$filterNum = isset($_GET["filter"]) ? $_GET["filter"] : "";
$validNum = isset($_GET["valid"]) ? $_GET["valid"] : "";
$order = isset($_GET["order"]) ? $_GET["order"] : 1;
$search = isset($_GET["product_search"]) ? $_GET["product_search"] : "";
$page = isset($_GET["page"]) ? $_GET["page"]:1;
$per = isset($_GET["per"]) ? $_GET["per"] : 10;

$name=$_GET["name"];
$categoryMain=$_GET["category_main"];
$categorySub=$_GET["category_sub"];
$price=$_GET["price"];
$inventory=$_GET["inventory"];
$intro=$_GET["intro"];
$spec=$_GET["spec"];
$pic=$_GET["product_main_img"];

$sqlRevise="UPDATE products  SET (name, category_main, category_sub, price, inventory, intro, spec, product_main_img) = ('$name', '$categoryMain', '$categorySub', '$price', '$inventory', '$intro', '$spec', '$pic')"
?>