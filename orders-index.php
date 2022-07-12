<?php
session_start();
require("db-connect.php");
session_start();

if(isset($_GET["page"])){
	$page = $_GET["page"];
}else{
	$page=1;
}

if(isset($_GET["per-page"])){
	$perPage=$_GET["per-page"];	
}else{
	$perPage = 10;
};

$start=($page-1)*$perPage;

$startDate=isset($_GET["startDate"]) ? $_GET["startDate"] : "";
$endDate=isset($_GET["endDate"]) ? $_GET["endDate"] : "";

if(empty($startDate)||empty($endDate)){
	$sqlDate="";
}else{
	$sqlDate = "AND orders.order_time BETWEEN '$startDate' and '$endDate'";
}

if (isset($_GET["orderStat"])) {
	$orderStat = $_GET["orderStat"];
	// $orderStatus = "AND status_id = $orderStat";
	// $orderStatusAll = "AND status_id = $orderStat";

} else{
	$orderStat = "";
	// $orderStatus ="";
	// $orderStatusAll = "";
}

// if(!empty($orderStat)){
// 	$orderStatus = "AND status_id = $orderStat";
// 	$orderStatusAll = "AND status_id = $orderStat";
// }else{

// }

switch($orderStat){
	case 1:
		$orderStatus = "AND status_id = 1";
		$orderStatusAll = "AND status_id = 1";
		break;
	
	case 2:
		$orderStatus = "AND status_id = 2";
		$orderStatusAll = "AND status_id = 2";
		break;

	case 3:
		$orderStatus = "AND status_id = 3";
		$orderStatusAll = "AND status_id = 3";

		break;
			
	case 4:
		$orderStatus = "AND status_id = 4";
		$orderStatusAll = "AND status_id = 4";

		break;

	default:
		$orderStatus ="";
		$orderStatusAll = "";

  }

$sqlAll = "SELECT orders.*, customer_users.name FROM orders, customer_users 
WHERE orders.user_id = customer_users.id $orderStatusAll $sqlDate AND orders.valid = 1";
// $sqlAll = "SELECT * FROM orders $orderStatusAll $sqlDate";
// var_dump($sqlAll);
$resultAll = $conn->query($sqlAll);
// var_dump($resultAll);
$ordersCountAll = $resultAll->num_rows;
// echo $ordersCountAll;


//product_id => price---------------------------------
$sqlPrice = "SELECT * FROM products";
$resultPrice = $conn->query($sqlPrice);
$rowPrice = $resultPrice->fetch_all(MYSQLI_ASSOC);
// var_dump($rowPrice);
foreach ($rowPrice as $row) {
 $productPrice[$row["id"]] = $row["price"];
}
// var_dump($productPrice);
$sqlOrderPrice = "SELECT * FROM order_product";
$resultOrderPrice = $conn->query($sqlOrderPrice);
$rowsOrderPrice = $resultOrderPrice->fetch_all(MYSQLI_ASSOC);
foreach ($rowsOrderPrice as $row) {
	$alimamado = $row["product_quantity"] * $productPrice[$row["product_id"]];
	if(!isset($orderTotal[$row["order_id"]]) ){
		$orderTotal[$row["order_id"]]=0;
	}

	$orderTotal[$row["order_id"]] += $alimamado;
}
// var_dump($orderTotal);

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

	// case 5:
	// 	$orderType = "SUM(products.price * order_product.product_quantity) GROUP BY order_id  ASC";
	// 	break;
				
	// case 6:
	// 	$orderType = "  DESC";
	// 	break;

	default:
		$orderType = "id ASC";
  }

// $sqlDate = "SELECT * FROM orders WHERE orders.order_time BETWEEN '$startDate' and '$endDate'";
// $resultDate = $conn->query($sqlDate);
// $ordersDate = $resultDate->fetch_all(MYSQLI_ASSOC);
// var_dump($ordersDate);

if($_SESSION["user"]["admin"]==0){

}



$sql="SELECT orders.*, customer_users.name,customer_users.phone,customer_users.address FROM orders, customer_users 
-- JOIN order_product ON orders.id = order_product.order_id
-- JOIN products ON orders.product_id = products.id
WHERE orders.user_id = customer_users.id $orderStatus $sqlDate AND orders.valid = 1
ORDER BY $orderType LIMIT $start, $perPage
";
// var_dump($sql);
$result = $conn->query($sql);
// var_dump($result);
$rows = $result->fetch_all(MYSQLI_ASSOC);
// echo "</br>";
// var_dump($rows);

for($i=1;$i<count($rows);$i++){
	// $rows[$i]["totalPrice"] = $orderTotal[$i];
}
// var_dump($rows);


$sqlStatus="SELECT * FROM order_status";
$resultStatus = $conn->query($sqlStatus);
$rowStatus = $resultStatus->fetch_all(MYSQLI_ASSOC);
// print_r($rowStatus);
foreach ($rowStatus as $row){
	$orderStatusJJ[$row["id"]]=$row["status"];
}
// var_dump($orderStatusJJ);

// $sqlCoupon = "SELECT * FROM coupon ";
$sqlALL="SELECT * FROM orders";
$resultALL = $conn->query($sqlALL);
$rowsALL = $resultALL->fetch_all(MYSQLI_ASSOC);
// var_dump($rowsALL);
foreach($rowsALL as $rowALL){
	$coupon_date[$rowALL["id"]] = $rowALL["order_time"]; 
}
// var_dump($coupon_date);

// $couponDate = $rowALL["order_time"];
// var_dump($couponDate);
// for($i=1; $i<$coupon_date.length;$i++){
// $sqlCoupon = "SELECT * FROM coupon WHERE $couponDate BETWEEN coupon.start_date and coupon.end_date";
$sqlCoupon = "SELECT * FROM coupon";
$resultCoupon = $conn->query($sqlCoupon);
$rowCoupon = $resultCoupon->fetch_all(MYSQLI_ASSOC);
// var_dump($rowCoupon);

foreach($rowCoupon as $row){
	$orderCoupon[$row["id"]]=$row["name"];
	$couponDiscount[$row["id"]]=$row["discount"];
}
// $orderCoupon = json_encode($orderCoupon);
// var_dump($orderCoupon);

// $sqlDetail=" SELECT orders.id, order_product.*, products.id, products.price,products.name FROM order_product, products, orders WHERE order_product.order_id = orders.id ";
// $resultDetail = $conn->query($sqlDetail);
// $rowDetail = $resultDetail->fetch_all(MYSQLI_ASSOC);
// // var_dump($rowDetail);
// foreach ($rowDetail as $row){
// 	$orderDetail[$row["order_id"]] = $row["product_id"];
// }
// // var_dump($orderDetail);

// for($i=1; $i<=$rows.length;$i++){
// 	$orderPrice = $orderTotal[$i];
// 	$sqlPrice = "INSERT INTO orders (order_price) VALUES  WHERE id=$i";'$orderPrice'

// 	if ($conn->query($sqlPrice) === TRUE) {
//         echo "資料表 users 修改完成";
//         echo "<br>";
//     } else {
//         echo "修改資料表錯誤: " . $conn->error;
//     }

// }



$totalPage=ceil($ordersCountAll / $perPage);

// detail php



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
		<?php require "./style/recipes-style.css"; ?>
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
					<a class="sort-btn transition" id="idSort" href="
					<?php if($order == 1): ?>
						orders-index.php?order=2&page=<?=$page?>&per-page=<?=$perPage?>&orderStat=<?=$orderStat?>&startDate=<?=$startDate?>&endDate=<?=$endDate?>
					<?php elseif($order == 2): ?>
						orders-index.php?order=1&page=<?=$page?>&per-page=<?=$perPage?>&orderStat=<?=$orderStat?>&startDate=<?=$startDate?>&endDate=<?=$endDate?>
					<?php else: ?>
						orders-index.php?order=1&page=<?=$page?>&per-page=<?=$perPage?>&orderStat=<?=$orderStat?>&startDate=<?=$startDate?>&endDate=<?=$endDate?>
					<?php endif; ?>
					">依編號排序</a>
					<a class="sort-btn transition" id="idSort" href="
					<?php if($order == 3): ?>
						orders-index.php?order=4&page=<?=$page?>&per-page=<?=$perPage?>&orderStat=<?=$orderStat?>&startDate=<?=$startDate?>&endDate=<?=$endDate?>
					<?php elseif($order == 4): ?>
						orders-index.php?order=3&page=<?=$page?>&per-page=<?=$perPage?>&orderStat=<?=$orderStat?>&startDate=<?=$startDate?>&endDate=<?=$endDate?>
					<?php else: ?>
						orders-index.php?order=3&page=<?=$page?>&per-page=<?=$perPage?>&orderStat=<?=$orderStat?>&startDate=<?=$startDate?>&endDate=<?=$endDate?>
					<?php endif; ?>
					">依日期排序</a>
					
					<a class="sort-btn transition" id="idSort" href="
					<?php if($order == 5): ?>
						orders-index.php?order=6&page=<?=$page?>&per-page=<?=$perPage?>&orderStat=<?=$orderStat?>&startDate=<?=$startDate?>&endDate=<?=$endDate?>
					<?php elseif($order == 6): ?>
						orders-index.php?order=5&page=<?=$page?>&per-page=<?=$perPage?>&orderStat=<?=$orderStat?>&startDate=<?=$startDate?>&endDate=<?=$endDate?>
					<?php else: ?>
						orders-index.php?order=5&page=<?=$page?>&per-page=<?=$perPage?>&orderStat=<?=$orderStat?>&startDate=<?=$startDate?>&endDate=<?=$endDate?>
					<?php endif; ?>
					">依價錢排序</a>
					
				</div>
				<div class="d-flex">
					<?php require("order-time-filter.php");?>
				</div>
			</div>
			<div class="d-flex justify-content-between align-items-center my-3">
				<div class="filter d-flex align-items-center">					
					<svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1.5701 1.9264L1.5739 1.9185C1.69656 1.67109 1.96041 1.5 2.26588 1.5H26.7374C27.0464 1.5 27.309 1.6729 27.4298 1.92489L27.4298 1.9249L27.4337 1.93284C27.5472 2.16604 27.5171 2.43152 27.3273 2.64252L27.3064 2.66581L27.2864 2.68995L16.971 15.1663L16.627 15.5823V16.1221V23.215C16.627 23.3139 16.5713 23.4118 16.4665 23.463L16.4616 23.4654C16.3465 23.5221 16.2115 23.5065 16.1201 23.4386L16.1181 23.4372L12.4927 20.7585L12.4927 20.7585L12.4855 20.7533C12.4167 20.703 12.3762 20.6247 12.3762 20.5363V16.1221V15.5804L12.0301 15.1637L1.66605 2.68731C1.66605 2.6873 1.66604 2.68729 1.66603 2.68728C1.48508 2.46941 1.45046 2.17516 1.5701 1.9264Z" fill="white" stroke="#393939" stroke-width="3"/>
					</svg>

					<div class=" filter-item position-rel">
						<button class=" filter-btn transition">
						
						<?php if($orderStat == ""){
							echo "訂單狀態";
						}else{
							echo $orderStatusJJ[$orderStat];
						}
						
						?>
						
						</button>
						<ul class="filter-dropdown  unstyled_list position_abs invisible text-center">
							<li><a href="
							orders-index.php?order=<?= $order ?>&per-page=<?= $perPage ?>&page=1&orderStat=&startDate=<?=$startDate?>&endDate=<?=$endDate?>"
							class="text-nowrap ">全部</a></li>
							<li><a class="text-nowrap" href="
							orders-index.php?order=<?= $order ?>&per-page=<?= $perPage ?>&page=1&orderStat=1&startDate=<?=$startDate?>&endDate=<?=$endDate?>"
							class="text-nowrap ">已送達</a></li>
                            <li><a class="text-nowrap " href="
							orders-index.php?order=<?= $order ?>&per-page=<?= $perPage ?>&page=1&orderStat=2&startDate=<?=$startDate?>&endDate=<?=$endDate?>">已出貨</a></li>
                            <li><a class="text-nowrap " href="
							orders-index.php?order=<?= $order ?>&per-page=<?= $perPage ?>&page=1&orderStat=3&startDate=<?=$startDate?>&endDate=<?=$endDate?>">待出貨</a></li>
							<li><a href="
							orders-index.php?order=<?= $order ?>&per-page=<?= $perPage ?>&page=1&orderStat=4&startDate=<?=$startDate?>&endDate=<?=$endDate?>">已取消</a></li>
						</ul>
					</div>					
				</div>
				<form class="recipe_search d-flex flex-wrap align-items-center gap-2" action="orders-index.php" method="get">
					<select class="form-select per-page" name="per-page" >
						<option value="10" <?php if ($perPage == 10) {echo "selected";} ?> >每頁顯示10筆</option>
						<option value="15" <?php if ($perPage == 15) {echo "selected";} ?>>每頁顯示15筆</option>
						<option value="20" <?php if ($perPage == 20) {echo "selected";} ?>>每頁顯示20筆</option>
					</select>
					<div class="d-flex align-items-center" >
						
						<!-- <div class="d-flex ">
							<input class="form-control search-box " type="text" name="recipe_search" placeholder="搜尋訂單編號">
						</div>
						<div class="">
							<button class="search-btn form-control">
								<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M17.7292 18.8489L10.8802 11.9999C10.3594 12.4513 9.75174 12.8029 9.05729 13.0546C8.36285 13.3063 7.625 13.4322 6.84375 13.4322C4.96875 13.4322 3.38021 12.7812 2.07812 11.4791C0.776042 10.177 0.125 8.60582 0.125 6.76554C0.125 4.92527 0.776042 3.35409 2.07812 2.052C3.38021 0.749919 4.96007 0.098877 6.81771 0.098877C8.65799 0.098877 10.2248 0.749919 11.5182 2.052C12.8116 3.35409 13.4583 4.92527 13.4583 6.76554C13.4583 7.51207 13.3368 8.23256 13.0937 8.927C12.8507 9.62145 12.4861 10.2725 12 10.8801L18.875 17.703L17.7292 18.8489ZM6.81771 11.8697C8.22396 11.8697 9.42188 11.3706 10.4115 10.3723C11.401 9.37405 11.8958 8.17179 11.8958 6.76554C11.8958 5.35929 11.401 4.15704 10.4115 3.15877C9.42188 2.16051 8.22396 1.66138 6.81771 1.66138C5.3941 1.66138 4.18316 2.16051 3.1849 3.15877C2.18663 4.15704 1.6875 5.35929 1.6875 6.76554C1.6875 8.17179 2.18663 9.37405 3.1849 10.3723C4.18316 11.3706 5.3941 11.8697 6.81771 11.8697Z" fill="#222222"/>
								</svg>
							</button>
						</div> -->
					</div>
				</form>
				<!-- <div>
					<a class="add-recipe-btn transition" href="">新增訂單</a>
				</div> -->
			</div>
			
            <?php require "orders-table.php";?>
		</main>
				
		
		
      <script type="text/javascript" >
			<?php require "./js/app.js"; ?>
			<?php require "./js/order-app.js"; ?>
	  </script>

  </body>
</html>