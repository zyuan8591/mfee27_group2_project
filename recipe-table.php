<?php if($pageCustomerCount>0): ?>
<table class="recipe-table table table-hover">
	<thead class="table-dark">
		<tr>
			<th class="text-center" scope="col">會員編號</th>
			<th scope="col">會員名稱</th>
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
			<td>用戶</td>
			<td>
				<?php if($row["valid"]==0){
					echo "停用";
				} else{
					echo "啟用";
					}?>
			</td>
			<td><?=$row["create_time"]?></td>
			<td class="d-flex flex-wrap flex-shrink-1 gap-2">
				<a class="btn-main transition me-3 on-shelf <?php if($row["valid"]==1)echo "valid-btn"?>" href="customer-doValid1.php?id=<?=$row["id"]?>" >啟用</a>
				<a class="btn-main transition me-3 off-shelf <?php if($row["valid"]==0)echo "valid-btn"?>" id="onShelf" href="customer-doValid0.php?id=<?=$row["id"]?>">停用</a>
				<a class="btn-main transition me-3 detail" href="">詳細資料</a>
			</td>
		</tr>

		<?php endforeach; ?>
	</tbody>
</table>
	<?php else: ?>
        目前沒有資料
    <?php endif; ?>
<div class="text-end">
	第<?=$stertItem ?>-<?=$endItem ?> 筆, 共<?=$customerCount ?>筆資料
</div>
</div>
<div class="d-flex justify-content-between align-items-center"></div>
      <nav aria-label="...">
        <ul class="pagination pagination-md">
        	<?php for($i=1; $i<=$totalPage; $i++): ?>
        	<li class="page-item
        	<?php if($page==$i)echo "active" ?> 
        	">
        	<a class="page-link " href="recipe-index.php?page=<?=$i?>&order=<?=$order?>&search=<?=$search?>&valid=<?=$valid?>"><?=$i?></a>
          </li>
            <?php endfor; ?>
        </ul>
      </nav>
    </div>
	