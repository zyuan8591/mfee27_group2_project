<?php
require("./db-connect.php");

$id=$_GET["id"];
$valid=$_GET["valid"];

if($valid==1){
    $sql="UPDATE products SET valid=0 WHERE id=$id";
}else{
    $sql="UPDATE products SET valid=1 WHERE id=$id";
}

$conn->close();
?>