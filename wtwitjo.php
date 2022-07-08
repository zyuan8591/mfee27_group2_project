<?php
require("./db-connect.php");

$sql="SELECT * FROM products";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

foreach($rows as $row){
    // var_dump($row["id"]);
}
var_dump($row["id"])

?>