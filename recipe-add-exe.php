<?php
$addRecipeName = isset($_GET["name"]) ? $_GET["name"] : "";
$addCateFood = isset($_GET["category_food"]) ? $_GET["category_food"] : 1;
$addCateProduct = isset($_GET["category_product"])
	? $_GET["category_product"]
	: 1;
echo "name: $addRecipeName <br> catfood: $addCateFood 
<br> catProduct: $addCateProduct <br> ";
$i = 0;
while (isset($_GET["material-name-$i"])) {
	$material[$i] = $_GET["material-name-$i"];
	$i++;
	echo "material:";
	var_dump($material);
	echo "<br>";
}
echo "end";
?>
