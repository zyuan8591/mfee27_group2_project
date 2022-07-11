<?php
require("./db-connect.php");

$id=$_GET["id"];

$sqlDelete="DELETE FROM costommer_product_comment WHERE id=$id";

echo $id;
echo $sql;
if ($conn->query($sqlDelete) === TRUE) {
    echo "完成刪除";
} else {
    echo "刪除失敗" . $conn->error;
}
$conn->close();


?>