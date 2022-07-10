<?php
require ("db-connect.php");

$perpage= isset($_GET["per-page"])? $_GET["per-page"] : 10;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$search = isset($_GET["search"]) ? $_GET["search"] : "";
$order = isset($_GET["order"]) ? $_GET["order"] : 1;
$valid = isset($_GET["valid"]) ? $_GET["valid"] : "";


$id = isset($_GET["id"]) ? $_GET["id"] : "";

$sqlOnoffShelf = "SELECT id, valid FROM company_users WHERE id='$id'";
$resultOnoffShelf = $conn->query($sqlOnoffShelf);
$rowOnoffShelf = $resultOnoffShelf->fetch_assoc();

var_dump($rowOnoffShelf);
$sqlUpadate = "";

if ($rowOnoffShelf["valid"] == 0) {
    $sqlUpadate = "UPDATE company_users SET valid=1 WHERE id='$id'";
}

if ($rowOnoffShelf["valid"] == 1) {
    $sqlUpadate = "UPDATE company_users SET valid=0 WHERE id= '$id'";
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
	"location: company-member-all-index.php?per-page=$perpage&page=$page&search=$search&order=$order&valid=$valid"
);

?>