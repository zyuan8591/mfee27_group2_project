<?php
require("db-connect.php");
$order_id= $_GET["order_id"];

$status = $_GET["status"];
$memo = $_GET["memo"];
$coupon = $_GET["coupon"];
// $product_id=$_GET["id"];


$sql="UPDATE orders SET status_id='$status', memo='$memo', coupon_id='$coupon' WHERE id = $order_id";

if ($conn->query($sql) === TRUE) {
    echo "資料表 users 修改完成";
} else {
    echo "修改資料表錯誤: " . $conn->error;
}

$i = 1;
while (isset($_GET["amount$i"]) || isset($_GET["id$i"]) ){
    $amount[$i]= $_GET["amount$i"];
    $id[$i]= $_GET["id$i"];

    // echo "amount".$i.":".$_GET["amount$i"];
    // echo "</br>";
    $i++;
}


for($j=1; $j<$i;$j++){
    $amountttttt=$amount[$j];
    $iddddddddd=$id[$j];
    $sqlOrdered = "UPDATE order_product SET product_quantity = '$amountttttt' 
    WHERE id= $iddddddddd";

    if ($conn->query($sqlOrdered) === TRUE) {
        echo "資料表 users 修改完成";
        echo "<br>";
    } else {
        echo "修改資料表錯誤: " . $conn->error;
    }
}



$conn->close();

// header("location: orders-index.php");
?>
