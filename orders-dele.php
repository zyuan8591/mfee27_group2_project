<?php
require("db-connect.php");

$orderId = $_GET["orderId"];

$sql = "UPDATE orders SET valid = 0 WHERE orders.id = '$orderId'";

if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
} else {
    echo "刪除資料錯誤: " . $conn->error;
}
header("location: orders-index.php");
?>