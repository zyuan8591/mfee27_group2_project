<?php if($pagesCount > 0): ?>
<div class="py-1">第<?=$startItem?>-<?=$endItem?>筆,共<?=$CompanyUsersCountAll?>筆</div>
<table class="company-table table table-hover">
	<thead class="table-dark">
		<tr>
			<th class="text-center" scope="col">廠商編號</th>
			<th scope="col">廠商名稱</th>
			<th scope="col">廠商狀態</th>
			<th scope="col">建立時間</th>
			<th scope="col">編輯</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($rows as $row): ?>
		<tr>
			<th class="text-center" scope="row"><?=$row["id"]?></th>
			<td><?=$row["name"]?></td>
			<td><?php if ($row["valid"] == 1) {
				echo "啟用";
			} else {
   				echo "停用";
   			} ?></td>
			<td><?=$row["create_time"]?></td>
			<td>
				<a type="submit" class="btn-main transition me-3 on-shelf <?php if ($row["valid"] == 1) {
					echo "point-event-none";
    			} ?>" href="company-onoff-shelf.php?id=<?=$row["id"]?>&per-page=<?=$perpage?>&page=<?=$page?>&search=<?=$search?>&order=<?=$order?>&valid=<?=$valid?>">啟用</a> 	
				<a type="submit" class="btn-main transition me-3 off-shelf <?php if ($row["valid"] == 0) {
					echo "point-event-none";
    			} ?>" href="company-onoff-shelf.php?id=<?=$row["id"]?>&per-page=<?=$perpage?>&page=<?=$page?>&search=<?=$search?>&order=<?=$order?>&valid=<?=$valid?>">停用</a>
				<button type="submit" class="btn-main transition me-3 detail" href="">詳細資料</button>
				<?php require "company-detail.php"; ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<div class="col-4">
	<div class="btn-group me-2" role="group" >
		<?php for ($i=1; $i<=$totalPage; $i++): ?>
		<a href ="company-member-all-index.php?per-page=<?=$perpage?>&page=<?=$i?>&search=<?=$search?>&order=1&valid=<?=$valid?>" type="button" class="btn btn-outline-dark <?php if ($page==$i) {
					echo "active";
    			} ?>">
			<?=$i?>
		</a>
		<?php endfor; ?>
	</div>
</div>
<?php else: ?>
<div>目前沒有資料</div>
<?php endif; ?>