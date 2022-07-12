<?php
require("./db-connect.php");

$id=$_GET["id"];

$sqlDelete="DELETE FROM customer_product_comment WHERE id=$id";

echo $id;
// echo $sql;
if ($conn->query($sqlDelete) === TRUE) {
    echo "完成刪除";
    $_SESSION["delete"]=[
        "id"=>1
    ];
} else {
    echo "刪除失敗" . $conn->error;
    $_SESSION["delete"]=[
        "id"=>2
    ];
}
$conn->close();

header("location: product-recomandation.php?order=<?=$order?>&page=<?=$page?>&per=<?=$per?>&comment=<?=$comment?>&user=<?=$user?>")
?>