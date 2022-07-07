<?php
require("db-connect.php");

if(isset($_GET["page"])){
	$page = $_GET["page"];
}else{
	$page=1;
}

$sqlALL = "SELECT * FROM orders";
$resultALL = $conn->query($sqlALL);
$ordersCount=$resultALL->num_rows;

if(isset($_GET["per-page"])){
	$perPage=$_GET["per-page"];	
}else{
	$perPage = 5;
};

$start=($page-1)*$perPage;

$order=isset($_GET["order"]) ? $_GET["order"] : 1;
  
switch($order){
	case 1:
		$orderType = "id ASC";
		break;
	
	case 2:
		$orderType = "id DESC";
		break;

	case 3:
		$orderType = "order_time ASC";
		break;
			
	case 4:
		$orderType = "order_time DESC";
		break;

	default:
		$orderType = "id ASC";
  }

$sql="SELECT orders.*, customer_users.name FROM orders, customer_users WHERE orders.user_id = customer_users.id
ORDER BY $orderType LIMIT $start, $perPage
";

$result = $conn->query($sql);
$pageUserCount=$result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);


$sqlPrice = "SELECT id, price FROM products";
$resultPrice = $conn->query($sqlPrice);
$rowPrice = $resultPrice->fetch_all(MYSQLI_ASSOC);
foreach ($rowPrice as $row) {
 $productPrice[$row["id"]] = $row["price"];
}

$sqlOrderPrice = "SELECT * FROM order_product";
$resultOrderPrice = $conn->query($sqlOrderPrice);
$rowsOrderPrice = $resultOrderPrice->fetch_all(MYSQLI_ASSOC);
$alimamado = 0;
foreach ($rowsOrderPrice as $row) {
 $alimamado += $row["product_quantity"] * $productPrice[$row["product_id"]];
 $orderTotal[$row["order_id"]] = $alimamado;
}

$sqlDetail="SELECT order_product.*, orders.*, customer_users.name,customer_users.phone,customer_users.address FROM orders,order_product, customer_users WHERE orders.user_id = customer_users.id AND orders.id = order_product.order_id
";

$resultDetail = $conn->query($sqlDetail);
$rowDetail = $resultDetail->fetch_assoc();
// var_dump($orderTotal);


$startItem=($page-1)*$perPage+1;
$endItem=$page*$perPage;
if($endItem>$ordersCount)$endItem=$ordersCount;

$totalPage=ceil($ordersCount / $perPage);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Order Index</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;400;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="./style/normalize.css" />
	
    <style>
		<?php require "./style/style.css"; ?>
		<?php require "./style/recipe-style.css"; ?>
	</style>    
  </head>
  <body>
      <?php require ("header.php");?>
      <?php require("aside-orders-dashboard.php");?>
      <main class="main position-rel">
			<div>
				<h2 class="main-title">訂單列表</h2>
			</div>
			<div class="d-flex justify-content-between align-items-center flex-wrap sort-search">
				<div class="sort d-flex align-items-center">
					<a class="sort-btn transition" href="orders-index.php?page=<?=$page?>&order=1&per-page=<?=$perPage?>" <?php if($order==1)echo "active"?>>依訂單編號正序</a>
					<a class="sort-btn transition" href="orders-index.php?page=<?=$page?>&order=2&per-page=<?=$perPage?>" <?php if($order==2)echo "active"?>>依訂單編號反序</a>
					<a class="sort-btn transition" href="orders-index.php?page=<?=$page?>&order=3" <?php if($order==3)echo "active"?>>依日期正序</a>
					<a class="sort-btn transition" href="orders-index.php?page=<?=$page?>&order=4" <?php if($order==4)echo "active"?>>依日期反序</a>
					<a class="sort-btn transition" href="">依價格排序</a>
					<a class="sort-btn transition" href="">依價格排序</a>

				</div>
				<form class="recipe_search d-flex flex-wrap align-items-center gap-2" action="" method="get">
					<select class="form-select per-page" name="per-page" >
						<option value="5" >每頁顯示5筆</option>
						<option value="15">每頁顯示15筆</option>
						<option value="20" >每頁顯示20筆</option>
					</select>
					<div class="d-flex align-items-center" >
						<div class="d-flex ">
							<input class="form-control search-box " type="text" name="recipe_search" placeholder="搜尋訂單編號">
						</div>
						<div class="">
							<button class="search-btn form-control">
								<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M17.7292 18.8489L10.8802 11.9999C10.3594 12.4513 9.75174 12.8029 9.05729 13.0546C8.36285 13.3063 7.625 13.4322 6.84375 13.4322C4.96875 13.4322 3.38021 12.7812 2.07812 11.4791C0.776042 10.177 0.125 8.60582 0.125 6.76554C0.125 4.92527 0.776042 3.35409 2.07812 2.052C3.38021 0.749919 4.96007 0.098877 6.81771 0.098877C8.65799 0.098877 10.2248 0.749919 11.5182 2.052C12.8116 3.35409 13.4583 4.92527 13.4583 6.76554C13.4583 7.51207 13.3368 8.23256 13.0937 8.927C12.8507 9.62145 12.4861 10.2725 12 10.8801L18.875 17.703L17.7292 18.8489ZM6.81771 11.8697C8.22396 11.8697 9.42188 11.3706 10.4115 10.3723C11.401 9.37405 11.8958 8.17179 11.8958 6.76554C11.8958 5.35929 11.401 4.15704 10.4115 3.15877C9.42188 2.16051 8.22396 1.66138 6.81771 1.66138C5.3941 1.66138 4.18316 2.16051 3.1849 3.15877C2.18663 4.15704 1.6875 5.35929 1.6875 6.76554C1.6875 8.17179 2.18663 9.37405 3.1849 10.3723C4.18316 11.3706 5.3941 11.8697 6.81771 11.8697Z" fill="#222222"/>
								</svg>
							</button>
						</div>
					</div>
				</form>
			</div>
			<div class="d-flex justify-content-between align-items-center my-3">
				<div class="filter d-flex align-items-center">					
					<svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1.5701 1.9264L1.5739 1.9185C1.69656 1.67109 1.96041 1.5 2.26588 1.5H26.7374C27.0464 1.5 27.309 1.6729 27.4298 1.92489L27.4298 1.9249L27.4337 1.93284C27.5472 2.16604 27.5171 2.43152 27.3273 2.64252L27.3064 2.66581L27.2864 2.68995L16.971 15.1663L16.627 15.5823V16.1221V23.215C16.627 23.3139 16.5713 23.4118 16.4665 23.463L16.4616 23.4654C16.3465 23.5221 16.2115 23.5065 16.1201 23.4386L16.1181 23.4372L12.4927 20.7585L12.4927 20.7585L12.4855 20.7533C12.4167 20.703 12.3762 20.6247 12.3762 20.5363V16.1221V15.5804L12.0301 15.1637L1.66605 2.68731C1.66605 2.6873 1.66604 2.68729 1.66603 2.68728C1.48508 2.46941 1.45046 2.17516 1.5701 1.9264Z" fill="white" stroke="#393939" stroke-width="3"/>
					</svg>

					<div class=" filter-item position-rel">
						<button class=" filter-btn transition">訂單狀態</button>
						<ul class="filter-dropdown  unstyled_list position_abs invisible text-center">
							<li><a class="text-nowrap " href="">已送達</a></li>
                            <li><a class="text-nowrap " href="">已出貨</a></li>
                            <li><a class="text-nowrap " href="">待出貨</a></li>
							<li><a href="">已取消</a></li>
						</ul>
					</div>					
				</div>
				<div>
					<a class="add-recipe-btn transition" href="">新增訂單</a>
				</div>
			</div>
            <?php require "orders-table.php";?>
		</main>
		<?php require "recipe-add.php"; ?>
		
		
      <script type="text/javascript" >
			<?php require "./js/app.js"; ?>
			<?php require "./js/recipe-app.js"; ?>
	  </script>

  </body>
</html>