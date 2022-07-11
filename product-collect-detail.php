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

//product-collect
if(isset($_GET["id"])){
    $user_id=$_GET["id"];
    $sqlUser="SELECT * FROM customer_users WHERE id=$user_id";
    $resultUser=$conn->query($sqlUser);
    $rowUser=$resultUser->fetch_assoc();

	$sql="SELECT product_like.*, products.* FROM product_like
    JOIN products ON product_like.product_id = products.id
    WHERE product_like.user_id=$user_id AND product_like.valid=1
    ";
    $result = $conn->query($sql);
    $productRows = $result->fetch_all(MYSQLI_ASSOC);
	$productCount=$result-> num_rows;

}else{
	echo "請從正常管道進入頁面";
}

//recipe-collect
if(isset($_GET["id"])){
    $user_id=$_GET["id"];
    $sqlUser="SELECT * FROM customer_users WHERE id=$user_id";
    $resultUser=$conn->query($sqlUser);
    $rowUser=$resultUser->fetch_assoc();

	$sqlrecipe="SELECT recipe_like.*, recipe.* FROM recipe_like
    JOIN recipe ON recipe_like.recipe_id = recipe.id AND recipe_like.valid=1
    WHERE recipe_like.user_id=$user_id
    ";
    $recipeResult = $conn->query($sqlrecipe);
    $recipeRows = $recipeResult->fetch_all(MYSQLI_ASSOC);
	$recipeCount=$recipeResult-> num_rows;

}else{
	echo "請從正常管道進入頁面";
}


// product-collect
if(isset($_GET["id"])){
    $user_id=$_GET["id"];
    $sqlUser="SELECT * FROM customer_users WHERE id=$user_id";
    $resultUser=$conn->query($sqlUser);
    $rowUser=$resultUser->fetch_assoc();

	$sqlAddProduct="SELECT * FROM products WHERE id";
    
	$resultAddProduct = $conn->query($sqlAddProduct);
    $rowsAddProduct= $resultAddProduct->fetch_all(MYSQLI_ASSOC);
	$countAddProduct=$resultAddProduct-> num_rows;

}else{
	echo "請從正常管道進入頁面";
}

//add-recipe-collect
if(isset($_GET["id"])){
    $user_id=$_GET["id"];
    $sqlUser="SELECT * FROM customer_users WHERE id=$user_id";
    $resultUser=$conn->query($sqlUser);
    $rowUser=$resultUser->fetch_assoc();

    $sqlAddRecipe="SELECT * FROM recipe WHERE id";

    $resultAddRecipe = $conn->query($sqlAddRecipe);
    $rowsAddRecipe = $resultAddRecipe->fetch_all(MYSQLI_ASSOC);
	$countAddRecipe =$resultAddRecipe-> num_rows;

}else{
	echo "請從正常管道進入頁面";
}
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
	<div class="recipe-datail flex_center">
	<div class="cover-detail collect-main position_abs"></div>
	
	<div
		class="container-detail position-rel modify-ricepe-detail-form submit-from"
	>
		<a href="customer-index.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>"><i class="fa-solid fa-xmark position_abs"></i></a> 
		<h2 class="recipe-title text-center collect-header"><?=$rowUser["name"]?>'s  Favorites</h2>
		<div class="d-flex align-items-center justify-content-between mb-3">
		<div class="collect-select-button">
            <a id="c1" class="collect-type button-pattern">食譜收藏</a>
            <a id="c2" class="collect-type mx-4">商品收藏</a>
		</div>
		<div>
			<i class="fa-solid fa-circle-plus fa-lg add-plus add-plus-background"></i>
			<a href="search-user-collect.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>&id=<?=$user_id?>&exist=0"><i class="fa-solid fa-magnifying-glass fa-lg ms-2 add-plus-background"></i></a>
		</div>
		</div>
	<!-- recipe-collect -->
	<div class="row collect-page">
		<?php if($recipeCount>0): ?>
		<?php foreach($recipeRows as $recipeItem): ?>
		<div class="col-6 ">
			<div class="collect-card m-2 text-center shadow">
				<div>
					<img class="object-fit" src="img/recipe_main_img/<?=$recipeItem["image"]?>" alt="">
				</div>
				<div class="collect-text text-center d-flex align-items-center justify-content-center">
					<p class="p-2"><?=$recipeItem["name"]?></p>
				</div>
				<div class="text-center border-top p-2">
					<a class="collect-icon" href="recipe-collect-cancel.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>&id=<?=$user_id?>&exist=0&recipe=<?=$recipeItem["id"]?>"><i class="fa-solid fa-heart fa-lg"></i></a>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<?php else: ?>
			<p class="noCollectText text-center mt-5">該會員目前沒有收藏的食譜</p> 
		<?php endif ?>
		<div class="mb-3 mt-4 flex_center d-flex justify-content-center">
			<a class="add-detail-btn back-recipe-de transition " href="customer-index.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>">返回會員列表</a>
		</div>
	</div>
	<!-- ------ -->

	<!-- product-collect -->
	<div class="row collect-page">
		<?php if($productCount>0): ?>
		<?php foreach($productRows as $productItem): ?>
		<div class="col-6 ">
			<div class="collect-card m-2 text-center shadow">
				<div>
					<img class="object-fit" src="img/products_main_img/<?=$productItem["product_main_img"]?>" alt="">
				</div>
				<div class="collect-text text-center d-flex align-items-center justify-content-center">
					<p class="p-2"><?=$productItem["name"]?></p>
				</div>
				<div class="text-center border-top p-2">
					<a class="collect-icon" href="product-collect-cancel.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>&id=<?=$user_id?>&exist=0&product=<?=$productItem["id"]?>"><i class="fa-solid fa-heart fa-lg"></i></a>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<?php else: ?>
			<p class="noCollectText text-center mt-5">該會員目前沒有收藏的商品</p> 
		<?php endif ?>		
		<div class="mb-3 mt-4 flex_center d-flex justify-content-center">
			<a class="add-detail-btn back-recipe-de transition " href="customer-index.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>">返回會員列表</a>
		</div>
	</div>
<!-- ------ -->

	</div>		
</div>

<?php require "add-collect.php"; ?>

		<script type="text/javascript">
			<?php require "js/collect.js"; ?>
		</script>
	</body>
</html>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
		<!-- session -->
		<?php if($_SESSION["addCollect"]["condition"]=="1"): ?>
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
		<?php unset($_SESSION["addCollect"]); ?>
		<?php endif; ?>
		<!-- ------ -->
		<!-- session -->
		<?php if($_SESSION["addCollect"]["condition"]=="2"): ?>
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
		<?php unset($_SESSION["addCollect"]); ?>
		<?php endif; ?>
		<!-- ------ -->
<!-- session -->
<?php if($_SESSION["addCollect"]["condition"]=="3"): ?>
		<script type="text/javascript">
			Toastify({
			text: "該食譜已收藏",
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
		<?php unset($_SESSION["addCollect"]); ?>
		<?php endif; ?>
		<!-- ------ -->
<!-- session -->
<?php if($_SESSION["addCollect"]["condition"]=="4"): ?>
		<script type="text/javascript">
			Toastify({
			text: "該商品已收藏",
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
		<?php unset($_SESSION["addCollect"]); ?>
		<?php endif; ?>
		<!-- ------ -->

<!-- 	<div class="col-6">
			<div class="border  m-1 text-center">
				<div class=" ">
					<img class="object-fit px-3" src="customer_img/fish.png" alt="">
				</div>
				<div class="collect-text m-2 rounded">
					<p class="p-1">氣炸鍋 智慧 氣炸鍋 3.5L 原廠保固一年 多功能電炸鍋 烤箱</p>
				</div>
				<i class="fa-solid fa-heart-circle-minus"></i>	
			</div>
		</div> -->