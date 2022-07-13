<?php if($ordersCountAll > 0):?>
<?php if(isset($_SESSION["user"]["admin"])): ?>
	<?php if($_SESSION["user"]["admin"]==1): ?>
第 <?=$page?>頁，共<?=$totalPage?>頁，共<?=$ordersCountAll?>筆
	<?php endif; ?>
<?php endif; ?>
<table class="recipe-table table table-hover">

	<thead class="table-dark">
		<tr>
			<th class="text-center" scope="col">訂單編號</th>
			<th scope="col">訂單日期</th>
			<th scope="col">會員名稱</th>
			<th scope="col">訂單狀態</th>
			<th class="text-end" scope="col">訂單金額</th>
			<th class="text-center" scope="col">訂單詳情</th>
			<!-- <th scope="col"></th> -->
		</tr>
	</thead>
	<tbody>

			<!-- <tr>
				<td><span id="id"></span></td>
				<td><span id="create_time"></span></td>
				<td><span id="name"></span></td>
				<td></td>
				<td></td>
				<td class="d-flex flex-wrap flex-shrink-1 gap-2">
                	<a class="btn-main transition me-3 detail" href="">刪除</a>
					<a class="btn-main transition me-3 detail" href="">詳細資料</a>
				</td>
			</tr> -->
		<?php foreach($rows as $row): ?>
		<?php
		$order_id= $row["id"];
		//company user login-//
		$sqlUserWhere = "";
		if(isset($_SESSION["user"])){
			if($_SESSION["user"]["admin"]==0){
				$company_id = $_SESSION["user"]["id"]; //1
				$sqlUserWhere = "AND company_id = $company_id";
			}
		} else {
			$sqlUserWhere = "";
		}
		$sqlOrderProductAll = "SELECT order_product.*, products.name AS product_name, products.price AS product_price,
		orders.coupon_id AS couponId, products.company_id
		-- , coupon.discount AS coupon_discount , coupon.start_date AS coupon_startDate, coupon.end_date AS coupon_endDate 
		FROM order_product 
		JOIN products ON order_product.product_id = products.id 
		JOIN orders ON order_product.order_id = orders.id
		-- JOIN coupon ON order_product.couponId = coupon.id 
		WHERE order_id= $order_id $sqlUserWhere";
		// var_dump($sqlOrderProduct);

		$resultOrderProductAll = $conn->query($sqlOrderProductAll);
		$rowsOrderProductAll = $resultOrderProductAll->fetch_all(MYSQLI_ASSOC);
		$rowsOrderProductAllCount = $resultOrderProductAll->num_rows;
		
		?>
		<?php if($rowsOrderProductAllCount>0): ?>
		<tr>
			<th class="text-center" scope="row"><?=$row["id"]?></th>
			<td>
				<?php require "order-detail.php"; ?>
				<?=$row["order_time"]?>
			</td>
			<td><?=$row["name"]?></td>
			<td><?=$orderStatusJJ[$row["status_id"]]?></td>
			<td class="text-end order_price">
				<?php 
					//echo number_format($orderTotal[$row["id"]])
				?>
				<?= number_format($totalPrice*$rowOrderProduct["couponDiscount"]) ?> 
			</td>
			<td class="d-flex flex-wrap flex-shrink-1 gap-2 flex_center">
				<?php if(isset($_SESSION["user"])): ?>
					<?php if($_SESSION["user"]["admin"]==1): ?>
                <a class="btn-main transition me-3 " href="orders-dele.php?orderId=<?=$row["id"]?>">刪除</a>
					<?php endif; ?>
				<?php endif; ?>
				<a class="btn-main transition detail" href="">詳細資料</a>
			</td>
		</tr>
		<?php endif; ?>
		<?php endforeach; ?>
		<!-- <tr>
			<th class="text-center" scope="row">2</th>
			<td>2022/07/08</td>
			<td>78</td>
			<td>未出貨</td>
			<td>5000</td>
            <td class="d-flex flex-wrap flex-shrink-1 gap-2">
                <a class="btn-main transition me-3 detail" href="">刪除</a>
				<a class="btn-main transition me-3 detail" href="">詳細資料</a>
			</td>
		</tr> -->
	</tbody>
</table>

<?php if(isset($_SESSION["user"])): ?>
	<?php if($_SESSION["user"]["admin"]==1): ?>
<div class="w-100 flex_center">
	<div class="btn-group me-2" role="group" aria-label="First group">
		<a href="orders-index.php?page=<?php $prePage = $page - 1; if($prePage < 1){$prePage = 1;} echo $prePage;?>&order=<?=$order?>&per-page=<?= $perPage ?>&startDate=<?=$startDate?>&endDate=<?=$endDate?>&orderStat=<?=$orderStat?>" type="button" class="btn btn-outline-dark">上一頁</a>

        <?php for($i=1;$i<=$totalPage;$i++): ?>
		<a href="orders-index.php?page=<?=$i?>&order=<?=$order?>&per-page=<?= $perPage ?>&orderStat=<?=$orderStat?>&startDate=<?=$startDate?>&endDate=<?=$endDate?>" type="button" class="btn btn-outline-dark <?php
        if($page==$i)echo "active";?>"><?=$i?></a>
		<?php endfor; ?>

		<a href="orders-index.php?page=<?php $nextPage = $page + 1; if($nextPage > $totalPage){$nextPage = $totalPage;} echo $nextPage;?>&order=<?=$order?>&per-page=<?= $perPage ?>&startDate=<?=$startDate?>&endDate=<?=$endDate?>&orderStat=<?=$orderStat?>" type="button" class="btn btn-outline-dark">下一頁</a>
	</div>
</div>
	<?php endif?>
<?php endif?>
<?php else:?>
	目前沒有資料
<?php endif?>