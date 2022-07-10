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
			<th scope="col">會員收藏</th>
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
				<a class="btn-main transition me-3 on-shelf <?php if($row["valid"]==1)echo "valid-btn"?>" href="customer-doValid1.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>&id=<?=$row["id"]?>" >啟用</a>
				<a class="btn-main transition me-3 off-shelf <?php if($row["valid"]==0)echo "valid-btn"?>" id="onShelf" href="customer-doValid0.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>&id=<?=$row["id"]?>">停用</a>
				<a class="btn-main transition detail" href="">詳細資料</a>
				<?php require "customer-detail.php"; ?>
			</td>
			<td>
				<a class="btn-main transition me-3 " href="product-collect-detail.php?page=<?=$page?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>&id=<?=$row["id"]?>&exist=0">商品收藏</a>
				<?php require "customer-detail.php"; ?>
			</td>
			<td> </td>
		</tr>

		<?php endforeach; ?>
	</tbody>
</table>
	<?php else: ?>
        目前沒有資料
    <?php endif; ?>

</div>
<div class="d-flex align-items-center justify-content-between ">
	<div class="d-flex align-items-center">
		<nav aria-label="..." class="d-flex align-items-center ">
			<ul class="pagination pagination-md page">
				<li class="page-item">
					<a class="page-link " href="customer-index.php?page=
					<?php
						$pageIdx=$page-1;
						if($pageIdx<1)$pageIdx=1;
						echo $pageIdx;
					?>
					&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>">上一頁</a>
				</li>
				<?php for($i=1; $i<=$totalPage; $i++): ?>
				<li class="page-item
				<?php if($page==$i)echo "active" ?> 
				">
					<a class="page-link " href="customer-index.php?page=<?=$i?>&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>"><?=$i?></a>
				</li>
				<?php endfor; ?>
				<li class="page-item">
					<a class="page-link " href="customer-index.php?page=
					<?php
						$pageNext=$page+1;
						if($pageNext>$totalPage)$pageNext=$totalPage;
						echo $pageNext;
					?>
					&order=<?=$order?>&selectPages=<?=$selectPages?>&search=<?=$search?>&valid=<?=$valid?>">下一頁</a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="text-end">
		第<?=$stertItem ?>-<?=$endItem ?> 筆, 共<?=$customerCount ?>筆資料
	</div>
</div>