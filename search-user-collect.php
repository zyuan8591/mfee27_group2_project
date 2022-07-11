<?php
session_start();
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

//recipe
$sqlAddRecipe="SELECT * FROM recipe WHERE id";

$resultAddRecipe = $conn->query($sqlAddRecipe);
$rowsAddRecipe = $resultAddRecipe->fetch_all(MYSQLI_ASSOC);
$countAddRecipe =$resultAddRecipe-> num_rows;

//product
$sqlAddProduct="SELECT * FROM products WHERE id";
    
$resultAddProduct = $conn->query($sqlAddProduct);
$rowsAddProduct= $resultAddProduct->fetch_all(MYSQLI_ASSOC);
$countAddProduct=$resultAddProduct-> num_rows;

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
		<!-- <link rel="stylesheet" href="./style/style.css" /> -->
	</head>
    <body>

<div class="add-collect-page recipe-datail flex_center ">
	<div class="cover-detail collect-main position_abs"></div>
	<div
		class="container-detail position-rel modify-ricepe-detail-form submit-from"
	>
		
		<h2 class="recipe-title text-center collect-header">Favorites Search</h2>
	<a href="product-collect-detail.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>&id=<?=$user_id?>&exist=0"><i class="fa-solid fa-xmark position_abs"></i></a> 
		
	<!-- add-recipe-collect -->
    <form class="text-center px-4 my-4" action="search-recipe-user-collect.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>&id=<?=$user_id?>&exist=0" method="post">
		<div class="border p-3">
			<div class="add-main-title">食譜被哪些會員收藏？</div>
			<table class="add-recipe-table mb-3">
				<tr>
					<th>食譜名稱</th>
					<td class="px-4">
						<select class="form-select" name="search-recipe">  
							<option selected value="0">點選表單選擇食譜</option>
							<?php foreach($rowsAddRecipe as $addRecipeItems): ?>    
							<option value="<?=$addRecipeItems["id"]?>"><?=$addRecipeItems["name"]?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
			</table>
			<button class="btn btn-dark addBtn-recipe" type="submit">送出</button>
		</div>
	</form>
<!-- ------ -->

<!-- add-product-collect -->
<form class="text-center px-4" action="search-product-user-collect.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>&id=<?=$user_id?>&exist=0" method="post">
		<div class="border p-3">
			<div class="add-main-title">商品被哪些會員收藏？</div>
			<table class="add-recipe-table mb-3">
				<tr>
					<th class="text-nowrap">商品名稱</th>
					<td class="px-4">
						<select class="form-select" name="search-product">  
							<option selected value="0">點選表單選擇商品</option>
							<?php foreach($rowsAddProduct as $addProductItems): ?>
							<option value="<?=$addProductItems["id"]?>"><?=$addProductItems["name"]?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
			</table>
			<button class="btn btn-dark addBtn-recipe" type="submit">送出</button>
			
		</div>
	</form>
<!-- ------ -->
	</div>		
</div>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
		<!-- session -->
		<?php if($_SESSION["searchCollect"]["condition"]=="1"): ?>
		<script type="text/javascript">
			Toastify({
			text: "請選擇食譜",
			duration: 3000,
			newWindow: true,
			close: true,
			gravity: "bottom", // `top` or `bottom`
			position: "left", // `left`, `center` or `right`
			stopOnFocus: true, // Prevents dismissing of toast on hover
			style: {
				background: "linear-gradient(135deg, rgba(69,72,77,1)0%, rgba(0,0,0,1)100%)",
			},
			onClick: function(){} // Callback after click
			}).showToast();
		</script>
		<?php unset($_SESSION["searchCollect"]); ?>
		<?php endif; ?>
		<!-- ------ -->
		<!-- session -->
		<?php if($_SESSION["searchCollect"]["condition"]=="2"): ?>
		<script type="text/javascript">
			Toastify({
			text: "請選擇商品",
			duration: 3000,
			newWindow: true,
			close: true,
			gravity: "bottom", // `top` or `bottom`
			position: "left", // `left`, `center` or `right`
			stopOnFocus: true, // Prevents dismissing of toast on hover
			style: {
				background: "linear-gradient(135deg, rgba(69,72,77,1)0%, rgba(0,0,0,1)100%)",
			},
			onClick: function(){} // Callback after click
			}).showToast();
		</script>
		<?php unset($_SESSION["searchCollect"]); ?>
		<?php endif; ?>
		<!-- ------ -->
	</body>
</html>