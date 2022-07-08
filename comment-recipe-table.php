<?php if($countAll>0): ?>
<table class="recipe-table table table-hover">
	<thead class="table-dark">
		<tr>
			<th class="text-center" scope="col">評價編號</th>
			<th scope="col">食譜名稱</th>
			<th scope="col">使用者名稱</th>
			<th scope="col">留言</th>
			<th scope="col">評價分數</th>
			<th scope="col">新增日期</th>
			<th class="text-center" scope="col">編輯</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($rowsMsg as $row): ?>
		<tr>
			<th class="text-center" scope="row"><?= $row["id"] ?></th>
			<td><?= $row["recipeName"] ?></td>
			<td><?= $user[$row["user_id"]] ?></td>
			<td><?= $row["content"] ?></td>
			<td><?= $row["evaluation"] ?></td>
			<td><?= $row["create_time"] ?></td>
			<td class="text-center fw-bold"><a class="delete-btn" href="">刪除</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<div class=" w-100 flex_center position-rel">
	<div class="btn-group me-2" role="group" >
		<a href="" type="button" class="btn btn-outline-dark text-nowrap">上一頁</a>
		<a href="" type="button" class="btn btn-outline-dark "></a>
		<a href="" type="button" class="btn btn-outline-dark text-nowrap">下一頁</a>
	</div>
	<div class="page-hint position_abs">
		
	</div>
</div>
<?php else: ?>
	目前尚無評價資料
<?php endif; ?>
