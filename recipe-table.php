
<table class="recipe-table table table-hover">
	<thead class="table-dark">
		<tr>
			<th class="text-center" scope="col">會員編號</th>
			<th scope="col">會員名稱</th>
			<!-- <th scope="col">食譜類別</th> -->
			<th scope="col">會員類別</th>
			<th scope="col">會員狀態</th>
			<th scope="col">註冊日期</th>
			<th scope="col">編輯會員資料</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($rows as $row): ?>

		<tr>
			<th class="text-center" scope="row"><?=$row["id"]?></th>
			<td><?=$row["name"]?></td>
			<!-- <td>水餃</td> -->
			<td>用戶</td>
			<td>啟用</td>
			<td><?=$row["create_time"]?></td>
			<td class="d-flex flex-wrap flex-shrink-1 gap-2">
				<a class="btn-main transition me-3 on-shelf " href="">上架</a>
				<a class="btn-main transition me-3 off-shelf" href="">下架</a>
				<a class="btn-main transition me-3 detail" href="">詳細資料</a>
			</td>
		</tr>
		<?php endforeach; ?>

		<!-- <tr>
			<th class="text-center" scope="row">2</th>
			<td>便便氣泡水機</td>
			<td>飲品</td>
			<td>氣泡水機</td>
			<td>下架中</td>
			<td>2022/06/30</td>
			<td class="d-flex flex-wrap flex-shrink-1 gap-2">
				<a class="btn-main transition me-3 on-shelf" href="">上架</a>
				<a class="btn-main transition me-3 off-shelf" href="">下架</a>
				<a class="btn-main transition me-3 detail" href="">詳細資料</a>
			</td>
		</tr> -->
	</tbody>
</table>
<div class="py-2">
	共<?=$userCount;?>筆資料
</div>
