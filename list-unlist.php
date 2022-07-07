<?php
require("./db-connect.php");

$id=$_GET["id"];
$valid=$_GET["valid"];

if($valid==1){
    $sql="UPDATE products SET valid=0 WHERE id=$id";
}else{
    $sql="UPDATE products SET valid=1 WHERE id=$id";
}

echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "資料表 users 修改完成";
} else {
    echo "修改資料表錯誤: " . $conn->error;
}

$conn->close();
?>