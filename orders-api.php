<?php
require("db-connect.php");

$sql="SELECT orders.id, customer_users.name, orders.create_time FROM orders, customer_users WHERE orders.user_id = customer_users.id
";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($rows);
?>