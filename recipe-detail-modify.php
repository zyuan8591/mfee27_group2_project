<?php
require "db-connect.php";
session_start();

$modifyRecipe = 0;
if(isset($_POST["name"])){
    $name = $_POST["name"] ;
    if(empty($name)){
        echo "食譜名稱不得為空";
        exit;
    }
} else {
    echo "請輸入食譜名稱";
    exit;
}
$id=$_POST["id"];
$categoryFood = isset($_POST["category_food"]) ? $_POST["category_food"] : 1;
$categoryProduct = isset($_POST["categody_product"]) ? $_POST["categody_product"] : 1;
$content = isset($_POST["content"]) ? $_POST["content"] : "";
echo $id;

if(isset($_POST["image"])){
    $image = $_POST["image"] ;
} else {
    echo "請上傳食譜圖片";
    exit;
}
echo "<br>";
if(empty($image)){
    $sqlUpadate = "UPDATE recipe SET name='$name', content='$content', category_food='$categoryFood', 
    category_product='$categoryProduct' WHERE id='$id' ";
    
} else {
    $sqlUpadate = "UPDATE recipe SET name='$name', content='$content', category_food='$categoryFood', 
    category_product='$categoryProduct', image='$image' WHERE id='$id' ";
}

if($conn->query($sqlUpadate)){
    echo "資料更新成功 <br>";
    $modifyRecipe = 1;
} else {
    echo "error: " . $conn->error;
    $modifyRecipe = 0;
}

echo $id . $categoryFood . $categoryProduct;
$sqlMaterialDelete="DELETE FROM recipe_material WHERE recipe_id = $id";
if($conn->query($sqlMaterialDelete)){
    echo "資料刪除成功 <br>";
    $modifyRecipe = 1;
} else {
    echo "error: " . $conn->error;
    $modifyRecipe = 0;
}

// add material
$i = 0;
$aa=$_POST["detail-material-name-$id-$i"];
$bb=$_POST["detail-material-q-$id-$i"];

while (
	isset($_POST["detail-material-name-$id-$i"]) &&
	isset($_POST["detail-material-q-$id-$i"]) &&
	!empty($_POST["detail-material-name-$id-$i"]) &&
	!empty($_POST["detail-material-q-$id-$i"])
) {
	$material[$i][$_POST["detail-material-name-$id-$i"]] = $_POST["detail-material-q-$id-$i"];
	$i++;
}
var_dump($material);

foreach ($material as $row) {
	$materialName = key($row);
	$materialQ = current($row);
	$sqlAddMaterial = "INSERT INTO recipe_material(name, recipe_id, quantity)
	VALUES('$materialName', $id, '$materialQ' )";
	if ($conn->query($sqlAddMaterial)) {
		echo "食材新增成功 <br>";
        $modifyRecipe = 1;
	} else {
		echo "error: " . $conn->error;
        $modifyRecipe = 0;
	}
}
if($modifyRecipe == 1){
    $_SESSION["modifyRecipe"]=[
        "condition" => $modifyRecipe
    ];
}

header("location: recipe-index.php")

?>
