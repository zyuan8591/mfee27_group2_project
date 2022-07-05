<table class="recipe-table table table-hover">
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
			<td>啟用</td>
			<td><?=$row["create_time"]?></td>
			<td>
				<a class="btn-main transition me-3 on-shelf" href="">啟用</a>	
				<a class="btn-main transition me-3 off-shelf" href="">停用</a>
				<a class="btn-main transition me-3 detail" href="">詳細資料</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
	<div class="py-2">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item">
            <a class="page-link" href="">1</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
    </div>