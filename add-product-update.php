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

if(!isset($_POST["add-product"])){
    echo "沒有帶資料到此頁";
    exit;
}



$id=$_POST["product-user-id"];
$productType=$_POST["add-product"];

// echo "$id,$productType";
// exit;

// if(empty($productType)){
//     echo"請選擇商品";
//     exit;
// }
if($productType > 0 ) {
    $productType;
    $sql="SELECT * FROM product_like WHERE user_id='$id' AND product_id='$productType'";
    $result=$conn->query($sql);
    $productExist=$result->num_rows;
    // echo $productExist;

    if($productExist>0){
        // echo"該商品已收藏";
        header("location: product-collect-detail.php?page=".$page."&order=".$order."&selectPages=".$selectPages."&search=".$search."&valid=".$valid."&id=".$id."&exist=0");
        $condition=4;
    }
    if($condition == 4){
        $_SESSION["addCollect"] =[
            "condition" => $condition
        ];
        exit;
    }

    $productCreateSql="INSERT INTO product_like (user_id,product_id,valid) VALUES ('$id','$productType',1)";

    if ($conn->query($productCreateSql) === TRUE) {
        echo "新資料輸入成功";
    } else {
        echo "修改資料表錯誤: " . $conn->error;
    }

    $conn->close();

    header("location: product-collect-detail.php?page=".$page."&order=".$order."&selectPages=".$selectPages."&search=".$search."&valid=".$valid."&id=".$id."&exist=0");
}else{
    // echo "請選擇商品";
    header("location: product-collect-detail.php?page=".$page."&order=".$order."&selectPages=".$selectPages."&search=".$search."&valid=".$valid."&id=".$id."&exist=0");
    $condition=2;
}
if($condition == 2){
    $_SESSION["addCollect"] =[
        "condition" => $condition
    ];
}
?>