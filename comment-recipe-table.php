<?php if($countAll>0): ?>
第<?= $page ?>頁，共<?= $pages ?>頁，共<?= $countAll ?>筆
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
			<td class="table-stars"><?= $row["evaluation"] ?></td>
			<td><?= $row["create_time"] ?></td>
			<td class="text-center"><a class="delete-btn" href="
			comment-delete-recipe-exe.php?id=<?= $row["id"] ?>.php
			">刪除</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<div class=" w-100 flex_center position-rel">
	<div class="btn-group me-2" role="group" >
		<a href="
		comment-recipe-index.php?page=
		<?php
		$prePage = $page - 1;
		if($prePage < 1){
			echo 1 ;
		} else {
			echo $prePage;
		}
		?>
		&search=<?= $search ?>&per-page=<?= $perPage ?>&order=<?= $order ?>&stars=<?= $stars ?>
		" type="button" class="btn btn-outline-dark text-nowrap">上一頁</a>
		<?php for($i = 1; $i <= $pages; $i++): ?>
		<a href="
		comment-recipe-index.php?page=<?= $i ?>&search=<?= $search ?>&per-page=<?= $perPage ?>&order=<?= $order ?>&stars=<?= $stars ?>
		" type="button" class="btn btn-outline-dark <?php if($page==$i){echo "active";} ?> "><?= $i ?></a>
		<?php endfor; ?>
		<a href="
		comment-recipe-index.php?page=
		<?php
		$nextPage = $page + 1;
		if($nextPage > $pages){
			echo $pages ;
		} else {
			echo $nextPage;
		}
		?>
		&search=<?= $search ?>&per-page=<?= $perPage ?>&order=<?= $order ?>&stars=<?= $stars ?>
		" type="button" class="btn btn-outline-dark text-nowrap">下一頁</a>
	</div>
</div>
<?php else: ?>
	目前尚無評價資料
<?php endif; ?>
