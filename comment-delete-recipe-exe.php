<?php
require "db-connect.php";
session_start();
$recipeCommentDelete=0;

$id=isset($_GET["id"]) ? $_GET["id"] : "";
if(empty($id)){
    echo "找不到該筆留言";
    exit;
}

$sqlDelete = "DELETE FROM customer_recipe_message WHERE id= '$id'";
if($conn->query($sqlDelete)){
    echo "刪除資料成功";
    $recipeCommentDelete = 1;
} else {
    echo "error: " . $conn->error;
}

if($recipeCommentDelete == 1){
    $_SESSION["deleteRecipeComment"]=[
        "condition" => 1
    ];
}

header("location: comment-recipe-index.php")

?>