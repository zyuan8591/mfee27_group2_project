<?php if($ordersCountAll > 0):?>
第 <?=$page?>頁，共<?=$totalPage?>頁，共<?=$ordersCountAll?>筆
<table class="recipe-table table table-hover">

	<thead class="table-dark">
		<tr>
			<th class="text-center" scope="col">訂單編號</th>
			<th scope="col">訂單日期</th>
			<th scope="col">會員名稱</th>
			<th scope="col">訂單狀態</th>
			<th class="text-end" scope="col">訂單金額</th>
			<th scope="col">訂單詳情</th>
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
				// sort($row["total"]); 
				// var_dump($rows); 
			?>
		<tr>
			<th class="text-center" scope="row"><?=$row["id"]?></th>
			<td><?=$row["order_time"]?></td>
			<td><?=$row["name"]?></td>
			<td><?=$orderStatusJJ[$row["status_id"]]?></td>
			<td class="text-end"><?= number_format($row["total"])?> </td>
			<td class="d-flex flex-wrap flex-shrink-1 gap-2">
                <a class="btn-main transition me-3 " href="orders-dele.php?orderId=<?=$row["id"]?>">刪除</a>
				<a class="btn-main transition me-3 detail" href="">詳細資料</a>
			<?php require "order-detail.php"; ?>
			</td>

		</tr>
		
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
<?php else:?>
	目前沒有資料
<?php endif?>