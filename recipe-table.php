

<?php if ($recipeCount > 0): ?>
<div>共<?= $recipeCountAll ?>筆</div>
<table class="recipe-table table table-hover">
	<thead class="table-dark">
		<tr>
			<th class="text-center" scope="col">食譜編號</th>
			<th scope="col">食譜名稱</th>
			<th scope="col">食譜類別</th>
			<th scope="col">商品類別</th>
			<th scope="col">食譜狀態</th>
			<th scope="col">新增日期</th>
			<th scope="col">編輯食譜</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($rows as $row): ?>
		<tr>
			<th class="text-center" scope="row"><?= $row["id"] ?></th>
			<td><?= $row["name"] ?></td>
			<td><?= $category_food[$row["category_food"]] ?></td>
			<td><?= $category_product[$row["category_product"]] ?></td>
			<td>
			<?php if ($row["valid"] == 0) {
   	echo "下架中";
   } else {
   	echo "上架中";
   } ?>
			</td>
			<td><?= $row["create_time"] ?></td>
			<td class="d-flex flex-wrap flex-shrink-1 gap-2">
				<a class="btn-main transition me-3 on-shelf <?php if ($row["valid"] == 1) {
    	echo "point-event-none";
    } ?>
				" href="recipe-onoff-shelf.php?valid=<?= $row["valid"] ?>">上架</a>
				<a class="btn-main transition me-3 off-shelf <?php if ($row["valid"] == 0) {
    	echo "point-event-none";
    } ?>
				" href="recipe-onoff-shelf.php?valid=<?= $row["valid"] ?>">下架</a>
				<a class="btn-main transition me-3 detail" href="">詳細資料</a>
			</td>
		</tr>
		<?php endforeach; ?>
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
		<div class="btn-group me-2" role="group" >
			<a href="
			recipe-index.php?order=1&per-page=<?= $perPage ?>
			&page=<?php
   $prePage = $page - 1;
   if ($prePage < 1) {
   	$prePage = 1;
   }
   echo $prePage;
   ?>&search=<?= $search ?>&foodCate=<?= $foodCate ?>
			" type="button" class="btn btn-outline-dark">上一頁</a>
			<?php for ($i = 1; $i <= $pages; $i++): ?>
			<a href ="
			recipe-index.php?order=1&per-page=<?= $perPage ?>&page=<?= $i ?>&search=<?= $search ?>&foodCate=<?= $foodCate ?>
			" type="button" class="btn btn-outline-dark <?php if ($page == $i) {
   	echo "active";
   } ?> ">
				<?= $i ?>
			</a>
			<?php endfor; ?>
			<a href="
			recipe-index.php?order=1&per-page=<?= $perPage ?>
			&page=<?php
   $nextPage = $page + 1;
   if ($nextPage > $pages) {
   	$nextPage = $pages;
   }
   echo $nextPage;
   ?>&search=<?= $search ?>&foodCate=<?= $foodCate ?>
			" type="button" class="btn btn-outline-dark">下一頁</a>
		</div>
	</div>
	<div class="col-4"></div>
</div>
<?php else: ?>
<div>目前尚無食譜</div>
<?php endif; ?>
