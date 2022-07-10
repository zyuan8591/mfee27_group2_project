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
		default:
			$orderType = "id ASC";
			break;
	}

	$sqlCompany = "SELECT id, name FROM company_users";
	$resultCompany = $conn->query($sqlCompany);
	$rowsCompany = $resultCompany->fetch_all(MYSQLI_ASSOC);
	foreach ($rowsCompany as $row) {
		$companyName[$row["id"]] = $row["name"];
	}

    $sqlUser="SELECT id, name FROM customer_users";
    $resultUser=$conn->query($sqlUser);
    $rowsUser=$resultUser->fetch_all(MYSQLI_ASSOC);
    foreach ($rowsUser as $row){
        $commentUser[$row["id"]]=$row["name"];
    }

    $sqlComment="SELECT * FROM costommer_product_comment";
    $resultComment=$conn->query($sqlComment);
    $rowsComment=$resultComment->fetch_all(MYSQLI_ASSOC);
    foreach($rowsComment as $rowComment){

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

	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	} else {
		$page = 1;
	}

	$sqlAll = "SELECT * FROM products WHERE name LIKE '%$search%' $filter $valid";
	$resultAll = $conn->query($sqlAll);
	$productCountAll = $resultAll->num_rows;


	$per = isset($_GET["per"]) ? $_GET["per"] : 10;
	
	$start = ($page - 1) * $per;
	$startPage = ($page - 1) * $per + 1;

	$sql = "SELECT * FROM products WHERE name LIKE '%$search%' $filter $valid ORDER BY $orderType LIMIT $start, $per";

	$result = $conn->query($sql);
	$rows = $result->fetch_all(MYSQLI_ASSOC);
	$productCount = $result->num_rows;

	$totalPage = ceil($productCountAll / $per);
	if($productCountAll<10){
		$per=$productCountAll;
	}

	?>
	<div>
		<h2 class="main-title">商品評價總覽</h2>
	</div>

	<div class="d-flex justify-content-between align-items-center flex-wrap sort-search">
		<div class="sort d-flex align-items-center">
			<a class="sort-btn transition" href="<?php if (
														$order == 1
													) : ?>product-index.php?order=2&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&page=<?=$page?><?php elseif (
																																	$order == 2
																																) : ?>product-index.php?order=1&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&page=<?=$page?><?php else : ?>product-index.php?order=1&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&page=<?=$page?><?php endif; ?>">依編號排序</a>
			<a class="sort-btn transition" href="<?php if (
														$order == 3
													) : ?>product-index.php?order=4&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&page=<?=$page?><?php elseif (
																																	$order == 4
																																) : ?>product-index.php?order=3&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&page=<?=$page?><?php else : ?>product-index.php?order=3&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&page=<?=$page?><?php endif; ?>">依名稱排序</a>
			<a class="sort-btn transition" href="<?php if (
														$order == 5
													) : ?>product-index.php?order=6&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&page=<?=$page?><?php elseif (
																																	$order == 6	) : ?>product-index.php?order=5&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&page=<?=$page?><?php else : ?>product-index.php?order=5&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&page=<?=$page?><?php endif; ?>">依日期排序</a>
		</div>

			<form class="product_search d-flex align-items-center " action="product-index.php" method="get">
			<div class="mx-3">
				<select class="form-select mx-2 per-page" aria-label="Default select example" name="per">

					<option value="10" <?php if($per == 10){echo "selected";}?>>每頁顯示10筆</option>
					<option value="15" <?php if($per == 15){echo "selected";}?>>每頁顯示15筆</option>
					<option value="20" <?php if($per == 20){echo "selected";}?>>每頁顯示20筆</option>
					<option value="<?=$productCountAll?>"<?php if ($per == $productCountAll){echo "selected";}?>>全部顯示</option>

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
			<svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1.5701 1.9264L1.5739 1.9185C1.69657 1.67108 1.96042 1.5 2.26588 1.5H26.7374C27.0464 1.5 27.309 1.6729 27.4298 1.92489L27.4298 1.9249L27.4337 1.93284C27.5472 2.16604 27.5171 2.43152 27.3273 2.64252L27.3064 2.66581L27.2864 2.68995L16.971 15.1663L16.627 15.5823V16.1221V23.215C16.627 23.3139 16.5713 23.4118 16.4665 23.463L16.4616 23.4654C16.3465 23.5221 16.2115 23.5065 16.1201 23.4386L16.1181 23.4372L12.4927 20.7585L12.4927 20.7585L12.4855 20.7533C12.4167 20.703 12.3762 20.6247 12.3762 20.5363V16.1221V15.5804L12.0301 15.1637L1.66605 2.68731C1.66605 2.6873 1.66604 2.68729 1.66603 2.68728C1.48508 2.46941 1.45046 2.17516 1.5701 1.9264Z" fill="white" stroke="#393939" stroke-width="3" />
			</svg>
			
		</div>
	</div>
	<?php if($productCountAll > 0): ?>
	第<?= $page ?>頁，共<?= $totalPage ?>頁，共<?= $productCountAll ?>筆
	<table class="table table-hover">
		<thead class="table-dark">
			<tr class="">
				<th class="text-center" scope="col">評價編號</th>
				<th scope="col">店家</th>
				<th scope="col">商品名稱</th>
                <th scope="col">會員</th>
				<th scope="col">商品留言</th>
                <th scope="col">評價分數</th>
                <th scope="col">留言日期</th>
				<th scope="col">編輯</th>
			</tr>
		</thead>

		<tbody class="">
			<?php foreach ($rows as $row) : ?>

				<tr class="">
					<th class="text-center" scope="row"><?= $row["id"] ?></th>
					<td><?= $companyName[$row["company_id"]] ?></td>
					<td><?= $row["name"] ?></td>
					<td><?=$commentUser[$rowComment["user_id"]]?></td>
                    <td></td>
                    <td></td>
                    <td></td>
					<td class="">
						<button class="table-btn delete-btn">刪除</button>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<div class="page d-flex justify-content-center">
		<div class="btn-group me-2" role="group" aria-label="First group">
			<a href="
			product-index.php?order=1&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&order=<?=$order?>
			&page=<?php $prePage = $page - 1;
			if ($prePage < 1) {
				$prePage = 1;
			}
			echo $prePage;?>&per=<?=$per?>
			" type="button" class="btn btn-outline-dark text-nowrap ">上一頁</a>
			<?php for ($i = 1; $i <= $totalPage; $i++) : ?>
				<a type="button" class="btn btn-outline-dark <?php if($page==$i) : echo "active" ?><?php endif; ?>" href="
				product-index.php?order=1&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&order=<?=$order?>&page=<?= $i ?>&per=<?=$per?>"><?= $i ?></a>
			<?php endfor; ?>
			<a href="
			product-index.php?order=1&filter=<?= $filterNum ?>&valid=<?= $validNum ?>&order=<?=$order?>
			&page=<?php $nextPage = $page + 1;
			if ($nextPage > $totalPage) {$nextPage = $totalPage;}
			echo $nextPage; ?>&per=<?=$per?>" 
			type="button" class="btn btn-outline-dark text-nowrap">下一頁</a>
		</div>
	</div>
</main>
<?php else: ?>
目前尚無資料
<?php endif;?>