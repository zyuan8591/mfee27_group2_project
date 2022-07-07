<?php
require "db-connect.php";

//add recipe
$name = isset($_GET["name"]) ? $_GET["name"] : "";
$cateFood = isset($_GET["category_food"]) ? $_GET["category_food"] : 1;
$cateProduct = isset($_GET["category_product"]) ? $_GET["category_product"] : 1;
$content = isset($_GET["content"]) ? $_GET["content"] : "";
$id = 0;
$now = date("Y-m-d H:i:s");
// echo "name: $addRecipeName <br> catfood: $addCateFood
// <br> catProduct: $addCateProduct <br> content: $addRecipeContent <br>";

//text exist or not

//add image
$addRecipeFile = $_GET["addRecipeFile"];

$sqlAddRecipe = "INSERT INTO recipe(name, image, content, category_food, category_product, user_id,create_time, valid)
VALUES ('$name','$addRecipeFile', '$content', '$cateFood', '$cateProduct', '$id', '$now', 1)";

if ($conn->query($sqlAddRecipe)) {
	echo "資料新增成功 <br>";
	$recipe_id = $conn->insert_id;
} else {
	echo "error: " . $conn->error;
}

//add material
$i = 0;
while (
	isset($_GET["material-name-$i"]) &&
	isset($_GET["material-q-$i"]) &&
	!empty($_GET["material-name-$i"]) &&
	!empty($_GET["material-q-$i"])
) {
	// $material[$i] = $_GET["material-name-$i"];
	// $materialQ[$i] = $_GET["material-q-$i"];
	$material[$i][$_GET["material-name-$i"]] = $_GET["material-q-$i"];
	$i++;
}

foreach ($material as $row) {
	$materialName = key($row);
	$materialQ = current($row);
	$sqlAddMaterial = "INSERT INTO recipe_material(name, recipe_id, quantity)
	VALUES('$materialName', $recipe_id, '$materialQ' )";
	if ($conn->query($sqlAddMaterial)) {
		echo "食材新增成功 <br>";
	} else {
		echo "error: " . $conn->error;
	}
}

header("location: recipe-index.php");
?>
