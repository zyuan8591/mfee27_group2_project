<?php
require "db-connect.php";

$order = isset($_GET["order"]) ? $_GET["order"] : 1;
$perPage = isset($_GET["perPage"]) ? $_GET["perPage"] : 5;
$search = isset($_GET["search"]) ? $_GET["search"] : "";
$foodCate = isset($_GET["foodCate"]) ? $_GET["foodCate"] : "";
$productCate = isset($_GET["productCate"]) ? $_GET["productCate"] : "";
$valid = isset($_GET["valid"]) ? $_GET["valid"] : "";
$page = isset($_GET["page"]) ? $_GET["page"] : 1;

$id = isset($_GET["id"]) ? $_GET["id"] : "";

$sqlOnoffshelf = "SELECT id,valid FROM recipe WHERE id='$id'";
$resultOnoffshelf = $conn->query($sqlOnoffshelf);
$rowOnoffshelf = $resultOnoffshelf->fetch_assoc();

var_dump($rowOnoffshelf);
$sqlUpadate = "";

if ($rowOnoffshelf["valid"] == 0) {
	$sqlUpadate = "UPDATE recipe SET valid=1 WHERE id='$id' ";
}

if ($rowOnoffshelf["valid"] == 1) {
	$sqlUpadate = "UPDATE recipe SET valid=0 WHERE id='$id' ";
}

if ($conn->query($sqlUpadate) == true) {
	echo "修改資料成功";
} else {
	echo "error: " . $conn->error;
	exit();
}
echo $sqlUpadate;
$conn->close();

header(
	"location: recipe-index.php?order=$order&per-page=$perPage&page=$page&search=$search&foodCate=$foodCate&productCate=$productCate&valid=$valid"
);

?>
