<?php
session_start();
require("./db-connect.php");
if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=1;
};
$perPage = isset($_GET["per-page"]) ? $_GET["per-page"] : 10;


//上下架篩選
$valid= isset($_GET["valid"]) ? $_GET["valid"] : 1;
if (empty($valid)) {
	$valid= 1;
}

switch($valid){
	case 1:
		$validType="";
		break;
	case 2:
		$validType="valid=1 AND";
		break;
	case 3:
		$validType="valid=0 AND";
		break;	
	case 4:
		$validType="abs(discount)<1 AND";
		break;	
	case 5:
		$validType="abs(discount)>1 AND";
		break;					
	default:
		$validType="";
		break;};

$search = isset($_GET["search"]) ? $_GET["search"] : "";
if (empty($search)) {
	$search = "";
}
$sqlAll="SELECT * FROM coupon WHERE $validType name LIKE '%$search%'";
$resultAll = $conn->query($sqlAll);
$couponCount=$resultAll->num_rows;

//order
$order=isset($_GET["order"])?$_GET["order"]:1;
switch($order){
	case 1:
		$orderType="id ASC";
		break;
	case 2:
		$orderType="id DESC";
		break;
	case 3:
		$orderType="name ASC";
		break;
	case 4:
		$orderType="name DESC";
		break;
	case 5:
		$orderType="start_date ASC";
		break;
	case 6:
		$orderType="start_date DESC";
		break;
	case 7:
		$orderType="end_date ASC";
		break;
	case 8:
		$orderType="end_date DESC";
		break;
};
if($order == 1 or $order == 3 or $order == 5 or $order == 7){
		$idOrder= 2;
		$nameOrder=4;
		$startDateOrder=6;
		$endDateOrder=8;						
	}else{
		$idOrder= 1;
		$nameOrder=3;
		$startDateOrder=5;
		$endDateOrder=7;	
	};

//page
// $perPage=10;
$start=($page-1)*$perPage;
$startItem=($page-1)*$perPage+1;
$endItem=$page*$perPage;
if($endItem>$couponCount)$endItem=$couponCount;
$totalPage=ceil($couponCount / $perPage);

if($page != 1){
	$upPage=$page-1;
}else{
	$upPage=1;
};?>
<?php if($page != $totalPage){
	$downPage=$page+1;
}else{
	$downPage=$totalPage;
};
// $sql="SELECT * FROM coupon WHERE  name LIKE '%$search%' LIMIT 4" ;
$sql="SELECT * FROM coupon WHERE $validType name LIKE '%$search%' ORDER BY $orderType LIMIT $start,$perPage";
$result = $conn->query($sql);
$pageCouponCount=$result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);

//----------------------------------------------

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>廚聚 - 優惠券</title>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;400;700&display=swap"
			rel="stylesheet"
		/>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="./style/normalize.css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
		<style>
			<?php require "./style/style.css"; ?>
			<?php require "./style/coupon-style.css"; ?>

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
								<svg
									width="22"
									height="22"
									viewBox="0 0 22 22"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
								>
									<path
										d="M21.991 7.39997L21.118 1.56912C21.0649 1.2139 20.7861 0.935041 20.4309 0.881931L14.6 0.00901822C14.3437 -0.0293666 14.0844 0.0561559 13.9012 0.239373L0.239336 13.9011C-0.0797788 14.2202 -0.0797788 14.7378 0.239336 15.0569L6.94313 21.7606C7.26224 22.0798 7.77971 22.0798 8.09883 21.7606L21.7607 8.09878C21.9439 7.91557 22.0294 7.65622 21.991 7.39997ZM9.2542 15.8387C9.22498 16.4259 8.91499 17.0188 8.33274 17.6011C7.84618 18.0876 7.29037 18.4021 6.96214 18.5236C6.8964 18.548 6.82268 18.5222 6.7864 18.4622L6.33111 17.7096C6.30873 17.6726 6.30385 17.6276 6.31784 17.5868C6.33184 17.5459 6.36325 17.5133 6.40364 17.4977C6.84899 17.3263 7.2813 17.0513 7.58975 16.7427C8.01891 16.3136 8.10033 15.8825 7.80752 15.5898C7.54635 15.3286 7.20982 15.3578 6.47403 15.7056C5.40016 16.2248 4.59562 16.1954 4.01552 15.6154C3.23774 14.8376 3.37168 13.6588 4.34858 12.6818C4.72231 12.3081 5.1254 12.0273 5.54663 11.847C5.61501 11.8176 5.69452 11.8444 5.73122 11.9091L6.15432 12.6556C6.17497 12.6921 6.17898 12.7356 6.1654 12.7752C6.15172 12.8147 6.12177 12.8466 6.08311 12.8626C5.72739 13.0099 5.40672 13.2248 5.13001 13.5017C4.66724 13.9644 4.71734 14.3445 4.91866 14.5458C5.19469 14.8218 5.56031 14.699 6.32897 14.3531C7.37534 13.8716 8.14058 13.9245 8.73628 14.52C9.09469 14.8785 9.27869 15.3469 9.2542 15.8387ZM12.9083 12.8974L12.2363 13.5693C12.1864 13.6193 12.1081 13.6263 12.0501 13.5864L11.7787 13.3993L11.7595 13.4185C11.804 13.8696 11.6219 14.3246 11.247 14.6996C10.5826 15.364 9.75166 15.2283 9.27417 14.7508C8.8177 14.2943 8.7061 13.7151 8.95159 13.0759C9.15669 12.5416 9.574 12.0553 9.88792 11.7414L9.91482 11.7148L9.86991 11.6699C9.7192 11.5192 9.39229 11.3404 8.89634 11.8365C8.64802 12.0848 8.43157 12.4333 8.31737 12.7683C8.30347 12.8093 8.27206 12.8421 8.23162 12.8576C8.19119 12.8732 8.14601 12.87 8.10817 12.849L7.56618 12.548C7.5039 12.5133 7.47568 12.4389 7.49934 12.3717C7.59471 12.1007 7.83893 11.5616 8.40312 10.9974C9.30408 10.0964 10.2477 10.0876 11.1317 10.9718L12.2207 12.0607C12.4052 12.2452 12.672 12.5023 12.8958 12.6797C12.9285 12.7056 12.9485 12.7442 12.9509 12.7857C12.9533 12.8273 12.9378 12.8679 12.9083 12.8974ZM14.3017 11.5041L13.5346 12.2711C13.4776 12.3281 13.3852 12.3281 13.3281 12.2711L8.98688 7.92993C8.9298 7.87281 8.9298 7.7804 8.98688 7.72332L9.75385 6.95631C9.81092 6.89928 9.90338 6.89928 9.9605 6.95631L14.3017 11.2975C14.3587 11.3544 14.3587 11.4471 14.3017 11.5041ZM17.3183 8.29413C17.1252 8.69762 16.8176 9.11635 16.4291 9.50489C15.9202 10.0138 15.3504 10.2903 14.7813 10.3046C14.2094 10.319 13.6496 10.069 13.1622 9.58175C12.3571 8.77658 11.9855 7.41492 13.0726 6.32788C13.5391 5.86138 14.0904 5.66075 14.6669 5.74778C15.1366 5.81871 15.6214 6.08385 16.0318 6.49437C16.1533 6.61586 16.2487 6.73129 16.3072 6.80674C16.3524 6.86491 16.3471 6.9476 16.2952 6.99971L14.3664 8.92843C14.757 9.26154 15.3378 9.14839 15.846 8.64018C16.1221 8.36415 16.3321 8.09272 16.5072 7.78596C16.5274 7.75072 16.5614 7.72533 16.601 7.71612C16.6405 7.70687 16.6822 7.71457 16.7159 7.73723L17.2682 8.11004C17.3283 8.15039 17.3496 8.22875 17.3183 8.29413ZM18.6838 5.2098C18.1609 5.73265 17.3132 5.73265 16.7903 5.20966C16.2674 4.68682 16.2674 3.83911 16.7903 3.31618C17.3132 2.79329 18.1609 2.79329 18.6838 3.31618C19.2067 3.83907 19.2067 4.68686 18.6838 5.2098Z"
										fill="black"
									/>
								</svg>
								<a class="main_nav_item_content" href="product-index.php">商品管理</a>
							</div>
							<div class="nav_dropdown ">
								<svg
									width="24"
									height="13"
									viewBox="0 0 24 13"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
								>
									<path
										d="M11.9991 13C11.4873 13 10.9754 12.8186 10.5854 12.4559L0.585907 3.1702C-0.195302 2.44475 -0.195302 1.26953 0.585907 0.544085C1.36712 -0.181362 2.63268 -0.181362 3.41388 0.544085L11.9991 8.51964L20.5861 0.545535C21.3673 -0.179911 22.6329 -0.179911 23.4141 0.545535C24.1953 1.27098 24.1953 2.4462 23.4141 3.17165L13.4146 12.4574C13.024 12.8201 12.5115 13 11.9991 13Z"
										fill="black"
									/>
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
								<svg
									width="21"
									height="24"
									viewBox="0 0 21 24"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
								>
									<path
										d="M21 1.49998C21 0.670871 20.2791 0 19.3882 0H1.61175C0.721707 0 0 0.670871 0 1.49998V22.5C0 23.3291 0.721665 24 1.61175 24H13.6316V17.6628C13.6316 17.2482 13.992 16.9128 14.4375 16.9128H21V1.49998ZM2.42308 3.7584H10.5V5.44966H2.42308V3.7584V3.7584ZM2.42308 8.45638H10.5V10.1476H2.42308V8.45638V8.45638ZM10.5 19.5437H2.42308V17.8524H10.5V19.5437ZM18.1731 14.8457H2.42308V13.1544H18.1731V14.8457ZM18.1731 10.1477H13.125V3.7584H18.1731V10.1477Z"
										fill="black"
									/>
								</svg>
								<a class="main_nav_item_content" href="orders-index.php">訂單管理</a>
							</div>

							<div class="nav_dropdown">
								<svg
									width="24"
									height="13"
									viewBox="0 0 24 13"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
								>
									<path
										d="M11.9991 13C11.4873 13 10.9754 12.8186 10.5854 12.4559L0.585907 3.1702C-0.195302 2.44475 -0.195302 1.26953 0.585907 0.544085C1.36712 -0.181362 2.63268 -0.181362 3.41388 0.544085L11.9991 8.51964L20.5861 0.545535C21.3673 -0.179911 22.6329 -0.179911 23.4141 0.545535C24.1953 1.27098 24.1953 2.4462 23.4141 3.17165L13.4146 12.4574C13.024 12.8201 12.5115 13 11.9991 13Z"
										fill="black"
									/>
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
					<!-- 食譜管理 -->
					<?php if(isset($_SESSION["user"])): ?>
						<?php if($_SESSION["user"]["admin"]==1) : ?>
					<li class="main_nav_item_container">
						<div class="main_nav_item">
							<div class="flex_center">
								<svg
									width="21"
									height="24"
									viewBox="0 0 21 24"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
								>
									<path
										d="M21 20.7558V1.29734C21 0.584056 20.3115 0 19.4718 0H1.52724C0.687553 0 0 0.584056 0 1.29734V2.59469V20.7566V22.7027C0 23.4168 0.687553 24 1.52724 24H19.4718C20.0309 24 20.5199 23.7382 20.7856 23.3513H3.05447C2.21479 23.3513 1.52724 22.7681 1.52724 22.0548H19.4718C20.3124 22.054 21 21.4708 21 20.7558ZM5.21691 17.3572C4.94426 17.5888 4.50169 17.5888 4.22904 17.3572C3.95738 17.1264 3.95738 16.7496 4.23003 16.518L8.58354 12.819L9.57141 13.6582L5.21691 17.3572ZM15.8157 17.4092C15.5421 17.6417 15.0995 17.64 14.8259 17.4092L7.42281 11.1197C7.39021 11.092 7.37341 11.0576 7.34773 11.0266C6.2759 11.4596 4.73977 11.1483 3.59681 10.1773C2.23455 9.0193 1.95893 7.37622 2.98038 6.50769C4.00183 5.64 5.93607 5.87496 7.29833 7.03217C8.44129 8.00308 8.80779 9.30881 8.29805 10.2193C8.33559 10.2403 8.37609 10.2537 8.40968 10.2822L15.8137 16.5709C16.0854 16.8025 16.0874 17.1785 15.8157 17.4092ZM18.5264 8.35804L15.3544 11.0526C15.3297 11.0736 15.3 11.0862 15.2714 11.0996C14.1887 11.9178 13.0773 11.9236 12.1725 11.4294C12.1547 11.4478 12.1478 11.4705 12.126 11.4873L11.399 12.1057L10.4111 11.2674L11.1401 10.6481C11.1599 10.6313 11.1866 10.6246 11.2083 10.6103C10.6255 9.84084 10.6324 8.89594 11.5965 7.9779C11.6123 7.95441 11.6252 7.92839 11.6509 7.90825L14.8229 5.21287C14.9691 5.08783 15.2072 5.08783 15.3534 5.21287C15.4996 5.33706 15.4996 5.53846 15.3514 5.66266L12.2851 8.26741L12.8136 8.7172L15.8809 6.11161C16.0251 5.98741 16.2632 5.98741 16.4094 6.11161C16.5536 6.23496 16.5536 6.43552 16.4094 6.56056L13.3431 9.16615L13.8736 9.61594L16.9399 7.01119C17.0861 6.88699 17.3222 6.88615 17.4684 7.01035C17.6146 7.13455 17.6146 7.33594 17.4684 7.46014L14.4021 10.0649L14.9306 10.5138L17.9969 7.90825C18.1431 7.78406 18.3812 7.78406 18.5254 7.90825C18.6726 8.03161 18.6726 8.23385 18.5264 8.35804Z"
										fill="black"
									/>
								</svg>
								<a class="main_nav_item_content" href="recipes-index.php">食譜管理</a>
							</div>

							<div class="nav_dropdown">
								<svg
									width="24"
									height="13"
									viewBox="0 0 24 13"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
								>
									<path
										d="M11.9991 13C11.4873 13 10.9754 12.8186 10.5854 12.4559L0.585907 3.1702C-0.195302 2.44475 -0.195302 1.26953 0.585907 0.544085C1.36712 -0.181362 2.63268 -0.181362 3.41388 0.544085L11.9991 8.51964L20.5861 0.545535C21.3673 -0.179911 22.6329 -0.179911 23.4141 0.545535C24.1953 1.27098 24.1953 2.4462 23.4141 3.17165L13.4146 12.4574C13.024 12.8201 12.5115 13 11.9991 13Z"
										fill="black"
									/>
								</svg>
							</div>
						</div>
						<!-- 食譜管理細項 -->
						<ul class="unstyled_list sub_nav_item">
							<div class="sub_nav_item_container translateYtoNone">
								<li class="">
									<a class="sub_nav_item_content" href="recipes-index.php">食譜總覽</a>
								</li>
								<li>
									<a class="sub_nav_item_content" href="comment-recipe-index.php">評價總覽</a>
								</li>
							</div>
						</ul>
					</li>
					<!-- 會員管理 -->
					<li class="main_nav_item_container">
						<div class="main_nav_item">
							<div class="flex_center">
								<svg
									width="24"
									height="24"
									viewBox="0 0 24 24"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
								>
									<path
										d="M12 0.375C5.57812 0.375 0.375 5.57812 0.375 12C0.375 18.4219 5.57812 23.625 12 23.625C18.4219 23.625 23.625 18.4219 23.625 12C23.625 5.57812 18.4219 0.375 12 0.375ZM12 4.875C14.2781 4.875 16.125 6.72188 16.125 9C16.125 11.2781 14.2781 13.125 12 13.125C9.72188 13.125 7.875 11.2781 7.875 9C7.875 6.72188 9.72188 4.875 12 4.875ZM12 21C9.24844 21 6.78281 19.7531 5.13281 17.8031C6.01406 16.1437 7.73906 15 9.75 15C9.8625 15 9.975 15.0188 10.0828 15.0516C10.6922 15.2484 11.3297 15.375 12 15.375C12.6703 15.375 13.3125 15.2484 13.9172 15.0516C14.025 15.0188 14.1375 15 14.25 15C16.2609 15 17.9859 16.1437 18.8672 17.8031C17.2172 19.7531 14.7516 21 12 21Z"
										fill="black"
									/>
								</svg>
								<a class="main_nav_item_content" href="customer-index.php">會員管理</a>
							</div>

							<div class="nav_dropdown">
								<svg
									width="24"
									height="13"
									viewBox="0 0 24 13"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
								>
									<path
										d="M11.9991 13C11.4873 13 10.9754 12.8186 10.5854 12.4559L0.585907 3.1702C-0.195302 2.44475 -0.195302 1.26953 0.585907 0.544085C1.36712 -0.181362 2.63268 -0.181362 3.41388 0.544085L11.9991 8.51964L20.5861 0.545535C21.3673 -0.179911 22.6329 -0.179911 23.4141 0.545535C24.1953 1.27098 24.1953 2.4462 23.4141 3.17165L13.4146 12.4574C13.024 12.8201 12.5115 13 11.9991 13Z"
										fill="black"
									/>
								</svg>
							</div>
						</div>
						<!-- 會員管理細項 -->
						<ul class="unstyled_list sub_nav_item">
							<div class="sub_nav_item_container translateYtoNone">
								<li>
									<a class="sub_nav_item_content" href="customer-index.php">一般會員總覽</a>
								</li>
								<li>
									<a class="sub_nav_item_content" href="company-member-all-index.php">廠商會員總覽</a>
								</li>
							</div>
						</ul>
					</li>
						<?php endif; ?>
					<?php endif; ?>
					<li class="main_nav_item_container">
						<div class="main_nav_item">
							<div class="flex_center">
								<svg
									width="24"
									height="24"
									viewBox="0 0 24 24"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
								>
									<path
										d="M0 6.18087V10.1809H10.7365V3.5472L7.86167 1.06495C7.06602 0.378182 6.00825 0 4.88352 0C3.75862 0 2.70094 0.378182 1.90521 1.06495C1.10932 1.75171 0.670981 2.66516 0.670981 3.6368C0.670981 4.15265 0.795643 4.65156 1.03056 5.10931C0.444232 5.20378 0 5.6472 0 6.18087ZM3.69158 2.60807C4.01014 2.33324 4.43339 2.18182 4.88352 2.18182C5.33365 2.18182 5.75683 2.33324 6.07513 2.60785L8.94976 5.08996H4.92134H4.8767C4.42826 5.0888 4.00769 4.93847 3.69158 4.66545C3.37327 4.39076 3.19798 4.02545 3.19798 3.6368C3.1979 3.24815 3.37327 2.88284 3.69158 2.60807Z"
										fill="black"
									/>
									<path
										d="M22.0954 1.06516C21.2998 0.378255 20.2422 0 19.1171 0C17.9921 0 16.9344 0.378255 16.1391 1.06502L13.2637 3.54742V10.1809H24.0002V6.18087C24.0002 5.6472 23.5561 5.20378 22.9697 5.10931C23.2047 4.65156 23.3294 4.15258 23.3294 3.6368C23.3293 2.66516 22.891 1.75171 22.0954 1.06516ZM20.3085 4.66567C19.9927 4.9384 19.572 5.0888 19.1237 5.08996H19.079H15.0509L17.9259 2.60785C18.244 2.33316 18.6671 2.18182 19.1171 2.18182C19.5672 2.18182 19.9902 2.33316 20.3087 2.60807C20.627 2.88276 20.8023 3.24815 20.8023 3.6368C20.8024 4.02545 20.6271 4.39076 20.3085 4.66567Z"
										fill="black"
									/>
									<path
										d="M13.2632 23.9994H10.7363V12.3628H1.375V22.9092C1.375 23.5117 1.94069 24.0001 2.63846 24.0001H21.361C22.0588 24.0001 22.6244 23.5117 22.6244 22.9092V12.3628H13.2632V23.9994Z"
										fill="black"
									/>
								</svg>
								<a class="main_nav_item_content" href="coupon-index.php"> 活動管理 </a>
							</div>

							<div class="nav_dropdown nav_dropdown_active">
								<svg
									width="24"
									height="13"
									viewBox="0 0 24 13"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
								>
									<path
										d="M11.9991 13C11.4873 13 10.9754 12.8186 10.5854 12.4559L0.585907 3.1702C-0.195302 2.44475 -0.195302 1.26953 0.585907 0.544085C1.36712 -0.181362 2.63268 -0.181362 3.41388 0.544085L11.9991 8.51964L20.5861 0.545535C21.3673 -0.179911 22.6329 -0.179911 23.4141 0.545535C24.1953 1.27098 24.1953 2.4462 23.4141 3.17165L13.4146 12.4574C13.024 12.8201 12.5115 13 11.9991 13Z"
										fill="black"
									/>
								</svg>
							</div>
						</div>
						<!-- 活動管理細項 -->
						<ul class="unstyled_list sub_nav_item">
							<div class="sub_nav_item_container">
								<li class="sub_nav_item_active">
									<a class="sub_nav_item_content" href="coupon-index.php">優惠券</a>
								</li>
							</div>
						</ul>
					</li>
				</ul>
			</nav>
		</aside>
		<main class="main position-rel">
			<div>

				<h2 class="main-title">優惠券總覽</h2>
			</div>
			<div class="d-flex justify-content-between align-items-center flex-wrap sort-search">
				<div class="sort d-flex align-items-center">	
										
					<a class="sort-btn transition" href="coupon-index.php?page=<?=$page?>&order=<?=$idOrder?>&search=<?=$search?>&valid=<?=$valid?>&per-page=<?=$perPage?>">依編號排序</a>					
					<a class="sort-btn transition" href="coupon-index.php?page=<?=$page?>&order=<?=$nameOrder?>&search=<?=$search?>&valid=<?=$valid?>&per-page=<?=$perPage?>">依名稱排序</a>
					<a class="sort-btn transition" href="coupon-index.php?page=<?=$page?>&order=<?=$startDateOrder?>&search=<?=$search?>&valid=<?=$valid?>&per-page=<?=$perPage?>">依起始日期排序</a>
					<a class="sort-btn transition" href="coupon-index.php?page=<?=$page?>&order=<?=$endDateOrder?>&search=<?=$search?>&valid=<?=$valid?>&per-page=<?=$perPage?>">依結束日期排序</a>
				</div>
				<form class="coupon_search d-flex flex-wrap align-items-center gap-2 " action="coupon-index.php" method="get">
				<div>
					<select class="form-select per-page" name="per-page" >
							<option value="10" 
							<?php if ($perPage == 10) {echo "selected";} ?> >每頁顯示10筆</option>
							<option value="15" 
							<?php if ($perPage == 15) {echo "selected";} ?>>每頁顯示15筆</option>
							<option value="20" 
							<?php if ($perPage == 20) {echo "selected";} ?>>每頁顯示20筆</option>
					</select>
					</div>
					<div class="d-flex align-items-center " >
						<div class="d-flex ">  
							<input class="form-control search-box " type="text" name="search" placeholder="搜尋優惠券名稱">
						</div>
						<div class="">
							<button class="search-btn form-control" type="submit">
								<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M17.7292 18.8489L10.8802 11.9999C10.3594 12.4513 9.75174 12.8029 9.05729 13.0546C8.36285 13.3063 7.625 13.4322 6.84375 13.4322C4.96875 13.4322 3.38021 12.7812 2.07812 11.4791C0.776042 10.177 0.125 8.60582 0.125 6.76554C0.125 4.92527 0.776042 3.35409 2.07812 2.052C3.38021 0.749919 4.96007 0.098877 6.81771 0.098877C8.65799 0.098877 10.2248 0.749919 11.5182 2.052C12.8116 3.35409 13.4583 4.92527 13.4583 6.76554C13.4583 7.51207 13.3368 8.23256 13.0937 8.927C12.8507 9.62145 12.4861 10.2725 12 10.8801L18.875 17.703L17.7292 18.8489ZM6.81771 11.8697C8.22396 11.8697 9.42188 11.3706 10.4115 10.3723C11.401 9.37405 11.8958 8.17179 11.8958 6.76554C11.8958 5.35929 11.401 4.15704 10.4115 3.15877C9.42188 2.16051 8.22396 1.66138 6.81771 1.66138C5.3941 1.66138 4.18316 2.16051 3.1849 3.15877C2.18663 4.15704 1.6875 5.35929 1.6875 6.76554C1.6875 8.17179 2.18663 9.37405 3.1849 10.3723C4.18316 11.3706 5.3941 11.8697 6.81771 11.8697Z" fill="#222222"/>
								</svg>
							</button>
						</div>
					</div>
				</form>
			</div>
			<div class="d-flex justify-content-between align-items-center my-3">
<!-- 食譜類別******************************************************************************************************** -->
				<div class="filter d-flex align-items-center">					
					<svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1.5701 1.9264L1.5739 1.9185C1.69656 1.67109 1.96041 1.5 2.26588 1.5H26.7374C27.0464 1.5 27.309 1.6729 27.4298 1.92489L27.4298 1.9249L27.4337 1.93284C27.5472 2.16604 27.5171 2.43152 27.3273 2.64252L27.3064 2.66581L27.2864 2.68995L16.971 15.1663L16.627 15.5823V16.1221V23.215C16.627 23.3139 16.5713 23.4118 16.4665 23.463L16.4616 23.4654C16.3465 23.5221 16.2115 23.5065 16.1201 23.4386L16.1181 23.4372L12.4927 20.7585L12.4927 20.7585L12.4855 20.7533C12.4167 20.703 12.3762 20.6247 12.3762 20.5363V16.1221V15.5804L12.0301 15.1637L1.66605 2.68731C1.66605 2.6873 1.66604 2.68729 1.66603 2.68728C1.48508 2.46941 1.45046 2.17516 1.5701 1.9264Z" fill="white" stroke="#393939" stroke-width="3"/>
					</svg>
					<div class=" filter-item position-rel">
						<button class=" filter-btn transition"><?php if ($valid == 1) {
								echo "優惠券狀態";
							} elseif ($valid == 3) {
								echo "下架中";
							} elseif ($valid == 2) {
								echo "上架中";
							} else {
								echo "優惠券狀態";
							} ?></button>
						<ul class="filter-dropdown  unstyled_list position_abs invisible text-center">
						<li><a href="coupon-index.php?page=<?=$page?>&order=<?=$order?>&search=<?=$search?>&valid=1">全部</a></li>
							<li><a href="coupon-index.php?page=<?=$page?>&order=<?=$order?>&search=<?=$search?>&valid=2">上架中</a></li>
							<li><a href="coupon-index.php?page=<?=$page?>&order=<?=$order?>&search=<?=$search?>&valid=3">下架中</a></li>
						</ul>						
					</div> 
					<div class=" filter-item position-rel">
					<button class=" filter-btn transition"><?php if ($valid == 1) {
									echo "優惠種類";
								} elseif ($valid == 4) {
									echo "(%)優惠";
								} elseif ($valid == 5) {
									echo "折價";
								} else {
									echo "優惠種類";
								} ?></button>
							<ul class="filter-dropdown  unstyled_list position_abs invisible text-center">
							<li><a href="coupon-index.php?page=<?=$page?>&order=<?=$order?>&search=<?=$search?>&valid=1">全部</a></li>
								<li><a href="coupon-index.php?page=<?=$page?>&order=<?=$order?>&search=<?=$search?>&valid=4">(%)優惠</a></li>
								<li><a href="coupon-index.php?page=<?=$page?>&order=<?=$order?>&search=<?=$search?>&valid=5">折價</a></li>
							</ul>
					</div>					
									
					</div>
				<div>
					<a class="add-coupon-btn transition" href="">新增優惠券</a>
				</div>
			</div>
		<?php require "coupon-table.php"; ?>
		</main>
		<?php require "coupon-add.php"; ?>		
		

		<script type="text/javascript" >
			<?php require "./js/coupon-app.js"; ?>
		</script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
		<?php if(isset($_SESSION["addCoupon"])): ?>
			<?php if($_SESSION["addCoupon"]["condition"]==1): ?>
			<script type="text/javascript" >
				Toastify({
				text: "優惠券上架成功",
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
			<?php elseif($_SESSION["addCoupon"]["condition"]==2): ?>
			<script type="text/javascript" >
				Toastify({
				text: "優惠券下架成功",
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
			<?php endif; ?>
			<?php unset($_SESSION["addCoupon"]); ?>
		<?php endif; ?>
	</body>
</html>


</div>
						<div class=" filter-item position-rel">
							<button class=" filter-btn transition"><?php if ($valid == 1) {
									echo "優惠種類";
								} elseif ($valid == 4) {
									echo "(%)優惠";
								} elseif ($valid == 5) {
									echo "折價";
								} else {
									echo "優惠種類";
								} ?></button>
							<ul class="filter-dropdown  unstyled_list position_abs invisible text-center">
							<li><a href="coupon-index.php?page=<?=$page?>&order=<?=$order?>&search=<?=$search?>&valid=1">全部</a></li>
								<li><a href="coupon-index.php?page=<?=$page?>&order=<?=$order?>&search=<?=$search?>&valid=4">(%)優惠</a></li>
								<li><a href="coupon-index.php?page=<?=$page?>&order=<?=$order?>&search=<?=$search?>&valid=5">折價</a></li>
							</ul>
						</div>	