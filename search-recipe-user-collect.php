<?php
session_start();
$condition=0;
$order=isset($_GET["order"]) ? $_GET["order"] : 1;
$page=isset($_GET["page"]) ? $_GET["page"] : 1;
$search=isset($_GET["search"]) ? $_GET["search"] : "";
$selectPages=isset($_GET["selectPages"]) ? $_GET["selectPages"] : 10;
$exist=isset($_GET["exist"]) ? $_GET["exist"] : 0;
$user_id=$_GET["id"];

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

require "db-connect.php";

if(!isset($_POST["search-recipe"])){
    echo "沒有帶資料到此頁";
    exit;
}


$recipeType=$_POST["search-recipe"];

// if(empty($recipeType)){
//     echo"請選擇食譜";
//     exit;
// }

// session
if($recipeType > 0 ){
	$recipeType;
	//search recipe
	if(isset($_POST["search-recipe"])){
		$recipeType=$_POST["search-recipe"];
		$sqlRecipe="SELECT * FROM recipe WHERE id=$recipeType";
		$resultRecipe=$conn->query($sqlRecipe);
		$rowRecipe=$resultRecipe->fetch_assoc();

		$sqlRecipeSearch="SELECT recipe_like.*, customer_users.* FROM recipe_like
		JOIN customer_users ON recipe_like.user_id = customer_users.id AND recipe_like.valid=1
		WHERE recipe_like.recipe_id=$recipeType
		";
		$recipeSearch = $conn->query($sqlRecipeSearch);
		$rowsRecipeSearch = $recipeSearch->fetch_all(MYSQLI_ASSOC);
		$countRecipeSearch=$recipeSearch-> num_rows;

	}
	
}else {
   header("location: search-user-collect.php?page=".$page."&order=".$order."&selectPages=".$selectPages."&search=".$search."&valid=".$valid."&id=".$user_id."&exist=0");
   $condition=1;
}
if($condition == 1){
    $_SESSION["searchCollect"] =[
        "condition" => $condition
    ];
}
// ------


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>廚聚</title>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;400;700&display=swap"
			rel="stylesheet"
		/>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Edu+QLD+Beginner:wght@600&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="./style/normalize.css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
		<style>
			<?php require "./style/style.css"; ?>
			<?php require "./style/recipe-style.css"; ?>
			<?php require "style/customer.css"; ?>
			
		</style>
		<link rel="stylesheet" href="./style/style.css" />
	</head>
    <body>
	
		

<div class="add-collect-page recipe-datail flex_center ">
	<div class="cover-detail collect-main position_abs"></div>
	<div
		class="container-detail position-rel modify-ricepe-detail-form submit-from"
	>
		
		<h2 class="recipe-title text-center collect-header">Recipe Favorites</h2>
	<a href="search-user-collect.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>&id=<?=$user_id?>&exist=0"><i class="fa-solid fa-xmark position_abs"></i></a>
		
<!--  -->
	
	<?php if($recipeType > 0):?>
	<div class="row collect-page">
		<p class="search-title my-2">食譜： <?=$rowRecipe["name"]?></p>
		<p class="search-text mb-2">-已被 <?=$countRecipeSearch?> 個會員收藏-</p>
		<?php if($countRecipeSearch>0): ?>
		<?php foreach($rowsRecipeSearch as $recipeSearchRow): ?>
		<div class="col-6">
			<div class="collect-card m-2 px-2 text-center shadow">
				<div class="search-img">
					<img class="object-contain" src="img/user_img/<?=$recipeSearchRow["img"]?>" alt="">
				</div>
				<div class="search-text text-center d-flex align-items-center justify-content-center border-top">
					<p class="p-2 m-0"><?=$recipeSearchRow["name"]?></p>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<?php else: ?>
			<p class="noCollectText text-center mt-5">該食譜目前沒有被會員收藏</p> 
		<?php endif ?>
	</div>
	<div class="mb-3 mt-4 flex_center d-flex justify-content-center">
			<a class="add-detail-btn back-recipe-de transition " href="search-user-collect.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>&id=<?=$user_id?>&exist=0">返回會員列表</a>
		</div>

<!--  -->
	</div>
	<?php endif; ?>		
</div>


		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
		
		
	</body>
</html>