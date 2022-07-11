<?php
session_start();
$condition=0;
$order=isset($_GET["order"]) ? $_GET["order"] : 1;
$page=isset($_GET["page"]) ? $_GET["page"] : 1;
$search=isset($_GET["search"]) ? $_GET["search"] : "";
$selectPages=isset($_GET["selectPages"]) ? $_GET["selectPages"] : 10;
$exist=isset($_GET["exist"]) ? $_GET["exist"] : 0;

if(isset($_GET["valid"])){
	$valid=$_GET["valid"];
	$validType="AND valid=$valid";
}else{
	$valid="";
	$validType="";
}
if ($valid == "") {
	$valid = "";
	$validType = "";
}

require("db-connect.php");

if(!isset($_POST["add-recipe"])){
    echo "沒有帶資料到此頁";
    exit;
}



$id=$_POST["recipe-user-id"];
$recipeType=$_POST["add-recipe"];

// echo "$id,$recipeType";
// exit;

if(empty($recipeType)){
    echo"請選擇食譜";
    exit;
}
if($recipeType !== 0 ) {
    $recipeType;
}else{
    echo "請選擇食譜";
}


$sql="SELECT * FROM recipe_like WHERE user_id='$id' AND recipe_id='$recipeType' AND valia!==1";
$result=$conn->query($sql);
$recipeExist=$result->num_rows;
// echo $recipeExist;
// exit;
if($recipeExist>0){
    echo"該食譜已收藏";
    exit;
}

$recipeCreateSql="INSERT INTO recipe_like (user_id,recipe_id,valid) VALUES ('$id','$recipeType',1)";

if ($conn->query($recipeCreateSql) === TRUE) {
    echo "新資料輸入成功";
} else {
    echo "修改資料表錯誤: " . $conn->error;
}

$conn->close();

header("location: product-collect-detail.php?page=".$page."&order=".$order."&selectPages=".$selectPages."&search=".$search."&valid=".$valid."&id=".$id."&exist=0");

?>