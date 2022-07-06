<table class="recipe-table table table-hover">
	<thead class="table-dark">
		<tr>
			<th class="text-center" scope="col">訂單編號</th>
			<th scope="col">訂單日期</th>
			<th scope="col">會員名稱</th>
			<th scope="col">訂單狀態</th>
			<th scope="col">訂單金額</th>
			<th scope="col">訂單詳情</th>
			<th scope="col"></th>
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
		<tr>
			<th class="text-center" scope="row"><?=$row["id"]?></th>
			<td><?=$row["order_time"]?></td>
			<td><?=$row["name"]?></td>
			<td></td>
			<td></td>
			<td class="d-flex flex-wrap flex-shrink-1 gap-2">
                <a class="btn-main transition me-3 detail" href="">刪除</a>
				<a class="btn-main transition me-3 detail" href="">詳細資料</a>
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
<div class="row w-100">
	<div class="col-4 d-flex justify-content-start">
		<!-- <select class="form-select per-page" name="per-page" >
			<option value="1">每頁顯示5筆</option>
			<option value="2">每頁顯示15筆</option>
			<option value="3">每頁顯示20筆</option>
		</select> -->
	</div>
	<div class="col-4">
		<div class="btn-group me-2" role="group" aria-label="First group">
			<a type="button" class="btn btn-outline-dark">上一頁</a>

            <?php for($i=1;$i<=$totalPage;$i++): ?>
			<a href="orders-index.php?page=<?=$i?>&order=<?=$order?>" type="button" class="btn btn-outline-dark <?php
            if($page==$i)echo "active";?>"><?=$i?></a>
			<?php endfor; ?>

			<a type="button" class="btn btn-outline-dark">下一頁</a>
		</div>
	</div>
	<div class="col-4"></div>


</div>