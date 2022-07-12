<?php
session_start();
require("./db-connect.php");

$id=$_GET["id"];
$order=isset($_GET["order"])?($_GET["order"]):1;
$page=isset($_GET["page"])?($_GET["page"]):1;
$per=isset($_GET["per"])?($_GET["per"]):10;
$comment=isset($_GET["comment"])?($_GET["comment"]):"";
$user=isset($_GET["user"])?($_GET["user"]):"";
$sqlDelete="DELETE FROM customer_product_comment WHERE id=$id";

echo $id;
// echo $order;
// echo $page;
// echo $per;
// echo $comment;
// echo $user;
// echo $sql;
if ($conn->query($sqlDelete) === TRUE) {
    echo "完成刪除";
    $delete=[
        "id"=>1
    ];
    $_SESSION["delete"]=$delete;
} else {
    echo "刪除失敗" . $conn->error;
    $_SESSION["delete"]=[
        "id"=>2
    ];
}
$conn->close();

header("location: product-recomandation.php?order=$order&page=$page&per=$per&comment=$comment&user=$user")
?>