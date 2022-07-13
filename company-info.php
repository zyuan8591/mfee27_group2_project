<?php
// session_start();
// require "./db-connect.php";

// $company=[
// 	"id"=>0,
// ];

// $_SESSION["company"]=$company;
// if(!isset($_SESSION["company"]["id"])){
// 	header("location: login.php");
// }elseif($_SESSION["company"]["id"]==0){
// 	header("location: product-index.php");
// }else{
// 	$company_id=$_SESSION["company"]["id"];
// 	$companyId="id=$company_id";
// }

// $sql = "SELECT * FROM company_users WHERE $companyId";
// $result = $conn->query($sql);
// $rows = $result->fetch_all(MYSQLI_ASSOC);
// echo $sql;
session_start();
require "./db-connect.php";

if(!isset($_SESSION["user"]["id"])){
	header("location: login.php");
}elseif($_SESSION["user"]["admin"]==1){
	header("location: product-index.php");
}else{
	$company_id=$_SESSION["user"]["id"];
	$companyId=$company_id;
}

$sql = "SELECT * FROM company_users WHERE id = $companyId";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
// echo $sql;
?>
<!doctype html>
<html lang="en">

<head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.2.0-beta1 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;400;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="./style/normalize.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	<style>
		<?php
		require "./style/style.css";
		require "./style/product.css";
		require "./style/company-info.css";
		?>
	</style>
</head>

<body>
	<?php require "header.php"; ?>
	<aside class="aside position_abs">
		<!-- <div class="smaller_sidebar">
				<svg
					width="28"
					height="23"
					viewBox="0 0 28 23"
					fill="none"
					xmlns="http://www.w3.org/2000/svg"
				>
					<path
						d="M0.939428 10.684C0.353641 11.2698 0.353641 12.2195 0.939428 12.8053L10.4854 22.3512C11.0712 22.937 12.0209 22.937 12.6067 22.3512C13.1925 21.7654 13.1925 20.8157 12.6067 20.2299L4.12141 11.7446L12.6067 3.25935C13.1925 2.67356 13.1925 1.72381 12.6067 1.13803C12.0209 0.552241 11.0712 0.552241 10.4854 1.13803L0.939428 10.684ZM22.9092 10.2446L2.00009 10.2446V13.2446L22.9092 13.2446V10.2446Z"
						fill="black"
					/>
					<line x1="26.5" x2="26.5" y2="23" stroke="black" stroke-width="3" />
				</svg>
			</div> -->

		<!-- NAVBAR -->
		<nav class="">
			<!-- 商品管理 -->
			<ul class="nav unstyled_list">
				<li class="main_nav_item_container">
					<div class="main_nav_item">
						<div class="flex_center">
							<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M21.991 7.39997L21.118 1.56912C21.0649 1.2139 20.7861 0.935041 20.4309 0.881931L14.6 0.00901822C14.3437 -0.0293666 14.0844 0.0561559 13.9012 0.239373L0.239336 13.9011C-0.0797788 14.2202 -0.0797788 14.7378 0.239336 15.0569L6.94313 21.7606C7.26224 22.0798 7.77971 22.0798 8.09883 21.7606L21.7607 8.09878C21.9439 7.91557 22.0294 7.65622 21.991 7.39997ZM9.2542 15.8387C9.22498 16.4259 8.91499 17.0188 8.33274 17.6011C7.84618 18.0876 7.29037 18.4021 6.96214 18.5236C6.8964 18.548 6.82268 18.5222 6.7864 18.4622L6.33111 17.7096C6.30873 17.6726 6.30385 17.6276 6.31784 17.5868C6.33184 17.5459 6.36325 17.5133 6.40364 17.4977C6.84899 17.3263 7.2813 17.0513 7.58975 16.7427C8.01891 16.3136 8.10033 15.8825 7.80752 15.5898C7.54635 15.3286 7.20982 15.3578 6.47403 15.7056C5.40016 16.2248 4.59562 16.1954 4.01552 15.6154C3.23774 14.8376 3.37168 13.6588 4.34858 12.6818C4.72231 12.3081 5.1254 12.0273 5.54663 11.847C5.61501 11.8176 5.69452 11.8444 5.73122 11.9091L6.15432 12.6556C6.17497 12.6921 6.17898 12.7356 6.1654 12.7752C6.15172 12.8147 6.12177 12.8466 6.08311 12.8626C5.72739 13.0099 5.40672 13.2248 5.13001 13.5017C4.66724 13.9644 4.71734 14.3445 4.91866 14.5458C5.19469 14.8218 5.56031 14.699 6.32897 14.3531C7.37534 13.8716 8.14058 13.9245 8.73628 14.52C9.09469 14.8785 9.27869 15.3469 9.2542 15.8387ZM12.9083 12.8974L12.2363 13.5693C12.1864 13.6193 12.1081 13.6263 12.0501 13.5864L11.7787 13.3993L11.7595 13.4185C11.804 13.8696 11.6219 14.3246 11.247 14.6996C10.5826 15.364 9.75166 15.2283 9.27417 14.7508C8.8177 14.2943 8.7061 13.7151 8.95159 13.0759C9.15669 12.5416 9.574 12.0553 9.88792 11.7414L9.91482 11.7148L9.86991 11.6699C9.7192 11.5192 9.39229 11.3404 8.89634 11.8365C8.64802 12.0848 8.43157 12.4333 8.31737 12.7683C8.30347 12.8093 8.27206 12.8421 8.23162 12.8576C8.19119 12.8732 8.14601 12.87 8.10817 12.849L7.56618 12.548C7.5039 12.5133 7.47568 12.4389 7.49934 12.3717C7.59471 12.1007 7.83893 11.5616 8.40312 10.9974C9.30408 10.0964 10.2477 10.0876 11.1317 10.9718L12.2207 12.0607C12.4052 12.2452 12.672 12.5023 12.8958 12.6797C12.9285 12.7056 12.9485 12.7442 12.9509 12.7857C12.9533 12.8273 12.9378 12.8679 12.9083 12.8974ZM14.3017 11.5041L13.5346 12.2711C13.4776 12.3281 13.3852 12.3281 13.3281 12.2711L8.98688 7.92993C8.9298 7.87281 8.9298 7.7804 8.98688 7.72332L9.75385 6.95631C9.81092 6.89928 9.90338 6.89928 9.9605 6.95631L14.3017 11.2975C14.3587 11.3544 14.3587 11.4471 14.3017 11.5041ZM17.3183 8.29413C17.1252 8.69762 16.8176 9.11635 16.4291 9.50489C15.9202 10.0138 15.3504 10.2903 14.7813 10.3046C14.2094 10.319 13.6496 10.069 13.1622 9.58175C12.3571 8.77658 11.9855 7.41492 13.0726 6.32788C13.5391 5.86138 14.0904 5.66075 14.6669 5.74778C15.1366 5.81871 15.6214 6.08385 16.0318 6.49437C16.1533 6.61586 16.2487 6.73129 16.3072 6.80674C16.3524 6.86491 16.3471 6.9476 16.2952 6.99971L14.3664 8.92843C14.757 9.26154 15.3378 9.14839 15.846 8.64018C16.1221 8.36415 16.3321 8.09272 16.5072 7.78596C16.5274 7.75072 16.5614 7.72533 16.601 7.71612C16.6405 7.70687 16.6822 7.71457 16.7159 7.73723L17.2682 8.11004C17.3283 8.15039 17.3496 8.22875 17.3183 8.29413ZM18.6838 5.2098C18.1609 5.73265 17.3132 5.73265 16.7903 5.20966C16.2674 4.68682 16.2674 3.83911 16.7903 3.31618C17.3132 2.79329 18.1609 2.79329 18.6838 3.31618C19.2067 3.83907 19.2067 4.68686 18.6838 5.2098Z" fill="black" />
							</svg>
							<a class="main_nav_item_content" href="product-index.php">商品管理</a>
						</div>
						<div class="nav_dropdown">
							<svg width="24" height="13" viewBox="0 0 24 13" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.9991 13C11.4873 13 10.9754 12.8186 10.5854 12.4559L0.585907 3.1702C-0.195302 2.44475 -0.195302 1.26953 0.585907 0.544085C1.36712 -0.181362 2.63268 -0.181362 3.41388 0.544085L11.9991 8.51964L20.5861 0.545535C21.3673 -0.179911 22.6329 -0.179911 23.4141 0.545535C24.1953 1.27098 24.1953 2.4462 23.4141 3.17165L13.4146 12.4574C13.024 12.8201 12.5115 13 11.9991 13Z" fill="black" />
							</svg>
						</div>
					</div>
					<!-- 商品管理細項 -->
					<ul class="unstyled_list sub_nav_item">
						<div class="sub_nav_item_container translateYtoNone">
							<li class="">
								<a class="sub_nav_item_content" href="product-index.php">商品總覽</a>
							</li>
							<li>
								<a class="sub_nav_item_content" href="product-recomandation.php">評價總覽</a>
							</li>
						</div>
					</ul>
				</li>
				<!-- 訂單管理 -->
				<li class="main_nav_item_container">
					<div class="main_nav_item">
						<div class="flex_center">
							<svg width="21" height="24" viewBox="0 0 21 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M21 1.49998C21 0.670871 20.2791 0 19.3882 0H1.61175C0.721707 0 0 0.670871 0 1.49998V22.5C0 23.3291 0.721665 24 1.61175 24H13.6316V17.6628C13.6316 17.2482 13.992 16.9128 14.4375 16.9128H21V1.49998ZM2.42308 3.7584H10.5V5.44966H2.42308V3.7584V3.7584ZM2.42308 8.45638H10.5V10.1476H2.42308V8.45638V8.45638ZM10.5 19.5437H2.42308V17.8524H10.5V19.5437ZM18.1731 14.8457H2.42308V13.1544H18.1731V14.8457ZM18.1731 10.1477H13.125V3.7584H18.1731V10.1477Z" fill="black" />
							</svg>
							<a class="main_nav_item_content" href="orders-index.php">訂單管理</a>
						</div>

						<div class="nav_dropdown">
							<svg width="24" height="13" viewBox="0 0 24 13" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.9991 13C11.4873 13 10.9754 12.8186 10.5854 12.4559L0.585907 3.1702C-0.195302 2.44475 -0.195302 1.26953 0.585907 0.544085C1.36712 -0.181362 2.63268 -0.181362 3.41388 0.544085L11.9991 8.51964L20.5861 0.545535C21.3673 -0.179911 22.6329 -0.179911 23.4141 0.545535C24.1953 1.27098 24.1953 2.4462 23.4141 3.17165L13.4146 12.4574C13.024 12.8201 12.5115 13 11.9991 13Z" fill="black" />
							</svg>
						</div>
					</div>
					<!-- 訂單管理細項 -->
					<ul class="unstyled_list sub_nav_item">
						<div class="sub_nav_item_container translateYtoNone">
							<li>
								<a class="sub_nav_item_content" href="orders-index.php">訂單總覽</a>
							</li>
						</div>
					</ul>
				</li>
			</ul>
		</nav>
	</aside>

	<main class="main position-rel flex_center main-text">
		<?php foreach ($rows as $row) : ?>
			<form action="company-info-modify.php" class="info" method="POST">
				<div class="card-header"></div>
				<div class="d-flex card-content justify-content-center">
				<input type="hidden" value="<?= $row["id"] ?>" name="id" >
					<div>
						<div class="mx-3">
							<div class="mb-2 row">
								<label for="" class="col-sm-auto col-form-label">廠商名稱：</label>
								<div class="col">
									<input type="text" readonly class="form-control-plaintext product-input" name="brand" value="<?= $row["name"] ?>" />
								</div>
							</div>
							<div class="mb-2 row">
								<label for="" class="col-sm-auto col-form-label">　　信箱：</label>
								<div class="col">
									<input type="text" readonly class="form-control-plaintext product-input" name="email" value="<?= $row["email"] ?>" required />
								</div>
							</div>
							<div class="mb-2 row">
								<label for="" class="col-sm-auto col-form-label">　　電話：</label>
								<div class="col">
									<input type="text" readonly class="form-control-plaintext product-input" name="phone" value="<?= $row["phone"] ?>" required />
								</div>
							</div>
						</div>
						
					</div>
					<div>
						<div class="mx-1 d-flex justify-content-center logo ">
							<figure class="avatar">
								<img class="object-contain" src="./img/company_img/<?= $row["logo_img"] ?>" alt="">
							</figure>
						</div>
					</div>
				</div>
				<div class="row intro d-flex justify-content-center">
					<div class="mb-2 row">
						<label for="" class="col-sm-auto col-form-label address">地址：</label>
						<div class="col">
							<input type="text" readonly class="form-control-plaintext product-input w-75" name="address" value="<?= $row["address"] ?>" required />
						</div>
					</div>
					<label for="" class="col-sm-auto col-form-label ">介紹：</label>
					<div class="col mb-3">
						<textarea class="form-control-plaintext product-intro product-input w-75" name="intro" id="" cols="30" rows="5" readonly required><?= $row["intro"] ?></textarea>
					</div>
				</div>
				<div class="flex_center position-rel" >
					<button class="btn-main transition modify-btn position_abs top-0">修改資料</button>
					<button class="btn-main transition d-none save-btn position_abs top-0">儲存資料</button>
				</div>
				<div class="me-2 row time">
					<div class="col d-flex justify-content-end">
						<p class="time"><?= $row["create_time"] ?></p>
					</div>
				</div>
			</form>
		<?php endforeach; ?>
	</main>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
	<script type="text/javascript">
		<?php require "./js/app.js"; ?>
		<?php require "./js/company-info.js"; ?>
	</script>
	<?php if(isset($_SESSION["modify"])): ?>
		<?php if($_SESSION["modify"]["condition"]==1): ?>
			<script>
				Toastify({
				text: "資料修改成功",
				duration: 3000,
				destination: "https://github.com/apvarun/toastify-js",
				newWindow: true,
				close: true,
				gravity: "bottom", // `top` or `bottom`
				position: "left", // `left`, `center` or `right`
				stopOnFocus: true, // Prevents dismissing of toast on hover
				style: {
					background: "linear-gradient(135deg, rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%)",
				},
				onClick: function(){} // Callback after click
				}).showToast();
			</script>
		<?php unset($_SESSION["modify"]); ?>
		<?php endif; ?>
	<?php endif; ?>
</body>

</html>