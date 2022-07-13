<main class="main position-rel">

	<?php

	require "./db-connect.php";


	$order = isset($_GET["order"]) ? $_GET["order"] : 1;
	switch ($order) {
		case 1:
			$orderType = "id ASC";
			break;
		case 2:
			$orderType = "id DESC";
			break;
		case 3:
			$orderType = "name ASC";
			break;
		case 4:
			$orderType = "name DESC";
			break;
		case 5:
			$orderType = "create_time ASC";
			break;
		case 6:
			$orderType = "create_time DESC";
			break;
		case 7:
			$orderType = "price ASC";
			break;
		case 8:
			$orderType = "price DESC";
			break;
		default:
			$orderType = "id ASC";
			break;
	}

	$sqlCompany = "SELECT id, name FROM company_users WHERE is_admin=0";
	$resultCompany = $conn->query($sqlCompany);
	$rowsCompany = $resultCompany->fetch_all(MYSQLI_ASSOC);
	foreach ($rowsCompany as $row) {
		$companyName[$row["id"]] = $row["name"];
	}

	$sqlCate = "SELECT id, name FROM products_category";
	$resultCate = $conn->query($sqlCate);
	$rowsCate = $resultCate->fetch_all(MYSQLI_ASSOC);
	foreach ($rowsCate as $row) {
		$cate[$row["id"]] = $row["name"];
	}

	$sqlCateSub = "SELECT id, name FROM products_category_sub";
	$resultCateSub = $conn->query($sqlCateSub);
	$rowsCateSub = $resultCateSub->fetch_all(MYSQLI_ASSOC);
	foreach ($rowsCateSub as $row) {
		$cateSub[$row["id"]] = $row["name"];
	}

	$search = isset($_GET["product_search"]) ? $_GET["product_search"] : "";

	$filterNum = isset($_GET["filter"]) ? $_GET["filter"] : "";
	if (empty($_GET["filter"])) {
		$filter = "";
	} else {
		$filter = "AND category_sub=$filterNum";
	}
	$validNum = isset($_GET["valid"]) ? $_GET["valid"] : "";
	if ($validNum == "") {
		$valid = "";
	} elseif ($validNum == 0) {
		$valid = "AND valid=0";
	} else {
		$valid = "AND valid=$validNum";
	}
	$companyNum = isset($_GET["company"]) ? $_GET["company"] : "";
	if (empty($_GET["company"])) {
		$companyFil = "";
	} else {
		$companyFil = "AND company_id=$companyNum";
	}

	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	} else {
		$page = 1;
	}

	// $company=[
	// 	"id"=>0
	// ];

	// $_SESSION["company"]=$company;

	// echo json_encode($_SESSION["company"]["id"]);
	if (!isset($_SESSION["user"]["id"])) {
		header("location: login.php");
	} elseif ($_SESSION["user"]["admin"] == 1) {
		$companyId = "";
	} else {
		$company_id = $_SESSION["user"]["id"];
		$companyId = "AND company_id=$company_id";
		// var_dump($_SESSION["company"]["id"]) ;
	}

	$sqlAll = "SELECT * FROM products WHERE name LIKE '%$search%' $filter $valid $companyId $companyFil";
	$resultAll = $conn->query($sqlAll);
	$productCountAll = $resultAll->num_rows;


	$per = isset($_GET["per"]) ? $_GET["per"] : 10;
	if(empty($per)){
		$per=10;
	}

	$start = ($page - 1) * $per;
	$startPage = ($page - 1) * $per + 1;

	$sql = "SELECT * FROM products WHERE name LIKE '%$search%' $filter $valid $companyId $companyFil ORDER BY $orderType LIMIT $start, $per";

	$result = $conn->query($sql);
	$rows = $result->fetch_all(MYSQLI_ASSOC);
	$productCount = $result->num_rows;

	$totalPage = ceil($productCountAll / $per);
	if ($productCountAll < 10) {
		$per = 10;
	}

	?>
	<div>
		<h2 class="main-title">商品總覽</h2>
	</div>

	<div class="d-flex justify-content-between align-items-center flex-wrap sort-search">
		<div class="sort d-flex align-items-center">
			<a class="sort-btn transition" href="<?php if (
														$order == 1
													) : ?>product-index.php?order=2&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&per=<?=$per?>&page=<?= $page ?>&company=<?= $companyNum ?><?php elseif (
																																												$order == 2
																																											) : ?>product-index.php?order=1&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&per=<?=$per?>&page=<?= $page ?>&company=<?= $companyNum ?><?php else : ?>product-index.php?order=1&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&per=<?=$per?>&page=<?= $page ?>&company=<?= $companyNum ?><?php endif; ?>">依編號排序</a>
			<a class="sort-btn transition" href="<?php if (
														$order == 3
													) : ?>product-index.php?order=4&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&per=<?=$per?>&page=<?= $page ?>&company=<?= $companyNum ?><?php elseif (
																																												$order == 4
																																											) : ?>product-index.php?order=3&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&per=<?=$per?>&page=<?= $page ?>&company=<?= $companyNum ?><?php else : ?>product-index.php?order=3&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&per=<?=$per?>&page=<?= $page ?>&company=<?= $companyNum ?><?php endif; ?>">依名稱排序</a>
			<a class="sort-btn transition" href="<?php if (
														$order == 5
													) : ?>product-index.php?order=6&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&per=<?=$per?>&page=<?= $page ?>&company=<?= $companyNum ?><?php elseif (
																																												$order == 6
																																											) : ?>product-index.php?order=5&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&per=<?=$per?>&page=<?= $page ?>&company=<?= $companyNum ?><?php else : ?>product-index.php?order=5&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&per=<?=$per?>&page=<?= $page ?>&company=<?= $companyNum ?><?php endif; ?>">依日期排序</a>
			<a class="sort-btn transition" href="<?php if (
														$order == 7
													) : ?>product-index.php?order=8&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&per=<?=$per?>&page=<?= $page ?>&company=<?= $companyNum ?><?php elseif (
																																												$order == 8
																																											) : ?>product-index.php?order=7&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&per=<?=$per?>&page=<?= $page ?>&company=<?= $companyNum ?><?php else : ?>product-index.php?order=7&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&per=<?=$per?>&page=<?= $page ?>&company=<?= $companyNum ?><?php endif; ?>">依價格排序</a>
		</div>

		<form class="product_search d-flex align-items-center " action="product-index.php" method="get">
			<div class="mx-3">
				<select class="form-select mx-2 per-page" aria-label="Default select example" name="per">

					<option value="10" <?php if ($per == 10) {
											echo "selected";
										} ?>>每頁顯示10筆</option>
					<option value="15" <?php if ($per == 15) {
											echo "selected";
										} ?>>每頁顯示15筆</option>
					<option value="20" <?php if ($per == 20) {
											echo "selected";
										} ?>>每頁顯示20筆</option>
				</select>
			</div>
			<div class="d-flex align-items-center ">
				<div class="d-flex ">
					<input class="form-control search-box " type="text" name="product_search" placeholder="搜尋商品名稱">
				</div>
				<div class="">
					<button class="search-btn form-control" type="submit">
						<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M17.7292 18.8489L10.8802 11.9999C10.3594 12.4513 9.75174 12.8029 9.05729 13.0546C8.36285 13.3063 7.625 13.4322 6.84375 13.4322C4.96875 13.4322 3.38021 12.7812 2.07812 11.4791C0.776042 10.177 0.125 8.60582 0.125 6.76554C0.125 4.92527 0.776042 3.35409 2.07812 2.052C3.38021 0.749919 4.96007 0.098877 6.81771 0.098877C8.65799 0.098877 10.2248 0.749919 11.5182 2.052C12.8116 3.35409 13.4583 4.92527 13.4583 6.76554C13.4583 7.51207 13.3368 8.23256 13.0937 8.927C12.8507 9.62145 12.4861 10.2725 12 10.8801L18.875 17.703L17.7292 18.8489ZM6.81771 11.8697C8.22396 11.8697 9.42188 11.3706 10.4115 10.3723C11.401 9.37405 11.8958 8.17179 11.8958 6.76554C11.8958 5.35929 11.401 4.15704 10.4115 3.15877C9.42188 2.16051 8.22396 1.66138 6.81771 1.66138C5.3941 1.66138 4.18316 2.16051 3.1849 3.15877C2.18663 4.15704 1.6875 5.35929 1.6875 6.76554C1.6875 8.17179 2.18663 9.37405 3.1849 10.3723C4.18316 11.3706 5.3941 11.8697 6.81771 11.8697Z" fill="#222222" />
						</svg>
					</button>
				</div>
			</div>
		</form>
	</div>
	<div class="d-flex justify-content-between align-items-center my-3">
		<div class="filter d-flex align-items-center">
			<!-- <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0.218261 1.27627C0.593094 0.496667 1.39012 0 2.26588 0H26.7374C27.6154 0 28.4085 0.496667 28.7823 1.27627C29.1619 2.05587 29.0429 2.97833 28.4424 3.64576L18.127 16.1221V23.215C18.127 23.8902 17.7418 24.5097 17.1244 24.811C16.5126 25.1124 15.7762 25.051 15.2267 24.6436L11.6013 21.965C11.1425 21.6301 10.8762 21.1 10.8762 20.5363V16.1221L0.512202 3.64576C-0.0422022 2.97833 -0.156629 2.05587 0.218317 1.27627H0.218261Z" fill="black"/>
					</svg> -->
			<svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1.5701 1.9264L1.5739 1.9185C1.69657 1.67108 1.96042 1.5 2.26588 1.5H26.7374C27.0464 1.5 27.309 1.6729 27.4298 1.92489L27.4298 1.9249L27.4337 1.93284C27.5472 2.16604 27.5171 2.43152 27.3273 2.64252L27.3064 2.66581L27.2864 2.68995L16.971 15.1663L16.627 15.5823V16.1221V23.215C16.627 23.3139 16.5713 23.4118 16.4665 23.463L16.4616 23.4654C16.3465 23.5221 16.2115 23.5065 16.1201 23.4386L16.1181 23.4372L12.4927 20.7585L12.4927 20.7585L12.4855 20.7533C12.4167 20.703 12.3762 20.6247 12.3762 20.5363V16.1221V15.5804L12.0301 15.1637L1.66605 2.68731C1.66605 2.6873 1.66604 2.68729 1.66603 2.68728C1.48508 2.46941 1.45046 2.17516 1.5701 1.9264Z" fill="white" stroke="#393939" stroke-width="3" />
			</svg>
			<?php if ($_SESSION["user"]["admin"] == 1) : ?>
				<div class="filter-item  position-rel ">
					<button class="filter-btn transition"><?php if ($companyNum == 0) : echo "廠商" ?><?php elseif ($companyNum == "") : echo "廠商" ?><?php else : echo $companyName[$companyNum] ?><?php endif; ?></button>
					<ul class="filter-dropdown position_abs unstyled_list invisible text-start company d-flex flex-column flex-wrap">
						<li class="m-2"><a class="text-nowrap" href="product-index.php?filter=<?= $filterNum ?>&valid=<?= $validNum ?>&order=<?= $order ?>&company=">全部</a></li>
						<?php foreach ($rowsCompany as $row) : ?>
							<li class="company-li m-2"><a href="product-index.php?filter=<?= $filterNum ?>&valid=<?= $validNum ?>&order=<?= $order ?>&company=<?= $row["id"] ?>"><?= $row["name"] ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
			<div class="filter-item  position-rel ">
				<button class="filter-btn transition"><?php if ($filterNum == "") : echo "商品類別" ?><?php else : echo $cateSub[$filterNum] ?><?php endif; ?></button>
				<ul class="filter-dropdown position_abs unstyled_list invisible text-center">
					<li><a class="text-nowrap " href="product-index.php?filter=&valid=<?= $validNum ?>&company=<?= $companyNum ?>">全部</a></li>
					<?php foreach ($rowsCateSub as $row) : ?>
						<li><a class="company-a" href="product-index.php?filter=<?= $row["id"] ?>&valid=<?= $validNum ?>&company=<?= $companyNum ?>"><?= $row["name"] ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class=" filter-item position-rel ">
				<button class=" filter-btn transition"><?php if ($validNum == 1) : echo "上架中" ?><?php elseif ($validNum == "") : echo "商品狀態" ?><?php elseif ($validNum == 0) : echo "下架中" ?><?php else : echo "商品狀態" ?><?php endif; ?></button>
				<ul class="filter-dropdown  unstyled_list position_abs invisible text-center ">
					<li><a class="text-nowrap" href="product-index.php?filter=<?= $filterNum ?>&company=<?= $companyNum ?>&valid=">全部</a></li>
					<li><a class="text-nowrap" href="product-index.php?filter=<?= $filterNum ?>&company=<?= $companyNum ?>&valid=1">上架中</a></li>
					<li><a class="text-nowrap" href="product-index.php?filter=<?= $filterNum ?>&company=<?= $companyNum ?>&valid=0">下架中</a></li>
				</ul>
			</div>
		</div>
		<div>
			<a class="add-product-btn transition" href="">新增商品</a>
		</div>
	</div>
	<?php if ($productCountAll > 0) : ?>
		第<?= $page ?>頁，共<?= $totalPage ?>頁，共<?= $productCountAll ?>筆
		<table class="table table-hover">
			<thead class="table-dark">
				<tr class="">
					<th class="text-center" scope="col">商品編號</th>
					<th scope="col">廠商</th>
					<th scope="col">商品名稱</th>
					<th scope="col">商品主類別</th>
					<th scope="col">商品次類別</th>
					<th scope="col" class="text-center">價格</th>
					<th scope="col" class="text-center">數量</th>
					<th scope="col">商品狀態</th>
					<th scope="col">編輯商品</th>
				</tr>
			</thead>

			<tbody class="">
				<?php foreach ($rows as $row) : ?>

					<tr class="">
						<th class="text-center" scope="row"><?= $row["id"] ?></th>
						<td><?= $companyName[$row["company_id"]] ?></td>
						<td><?= $row["name"] ?></td>
						<td><?= $cate[$row["category_main"]] ?></td>
						<td><?= $cateSub[$row["category_sub"]] ?></td>
						<td class="text-end"><?= number_format($row["price"]) ?></td>
						<td class="text-center <?php if ($row["inventory"] == 0) : echo "out-of-stock" ?><?php endif; ?>"><?= $row["inventory"] ?></td>
						<td><?php if ($row["valid"] == 1) : ?><?= "上架中" ?><?php else : ?><?= "下架中" ?><?php endif; ?></td>
						<td class="">
							<a href="list-unlist.php?order=<?= $order ?>&filter=<?= $filterNum ?>&page=<?= $page ?>&id=<?= $row["id"] ?>&valid=<?= $row["valid"] ?>&company=<?=$companyNum?>" class="table-btn <?php if ($row["valid"] == 1) {
																																															echo "point-none";
																																														} ?>">上架</a>
							<a href="list-unlist.php?order=<?= $order ?>&filter=<?= $filterNum ?>&page=<?= $page ?>&id=<?= $row["id"] ?>&valid=<?= $row["valid"] ?>&company=<?=$companyNum?>" class="table-btn <?php if ($row["valid"] == 0) {
																																															echo "point-none";
																																														} ?>">下架</a>
							<button class="table-btn detail-btn">詳細資料</button>
							<?php require "product-detail.php"; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="page d-flex justify-content-center">
			<div class="btn-group me-2" role="group" aria-label="First group">
				<a href="
			product-index.php?order=1&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&order=<?= $order ?>&product_search=<?= $search ?>&company=<?= $companyNum ?>
			&page=<?php $prePage = $page - 1;
					if ($prePage < 1) {
						$prePage = 1;
					}
					echo $prePage; ?>&per=<?= $per ?>
			" type="button" class="btn btn-outline-dark text-nowrap ">上一頁</a>
				<?php for ($i = 1; $i <= $totalPage; $i++) : ?>
					<a type="button" class="btn btn-outline-dark <?php if ($page == $i) : echo "active" ?><?php endif; ?>" href="
				product-index.php?order=1&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&order=<?= $order ?>&page=<?= $i ?>&per=<?= $per ?>&product_search=<?= $search ?>&company=<?= $companyNum ?>"><?= $i ?></a>
				<?php endfor; ?>
				<a href="
			product-index.php?order=1&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&order=<?= $order ?>&product_search=<?= $search ?>&company=<?= $companyNum ?>
			&page=<?php $nextPage = $page + 1;
					if ($nextPage > $totalPage) {
						$nextPage = $totalPage;
					}
					echo $nextPage; ?>&per=<?= $per ?>" type="button" class="btn btn-outline-dark text-nowrap">下一頁</a>
			</div>
		</div>
</main>
<?php else : ?>
	目前尚無資料
<?php endif; ?>