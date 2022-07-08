


<table class="coupon-table table table-hover">	
	<div class="py-2">第<?=$startItem?>筆-第<?=$endItem?>筆,共<?=$couponCount?>筆資料</div>
	<?php if($pageCouponCount>0):?>
		<thead class="table-dark">
		<tr>
			<th class="text-center" scope="col">優惠券編號</th>
			<th scope="col">名稱</th>
			<th scope="col">序號</th>
			<th scope="col">起始日期</th>
			<th scope="col">結束日期</th>
			<th scope="col">優惠折扣</th>
			<th scope="col">編輯優惠券</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($rows as $row):?>
		<tr>
			<th class="text-center" scope="row"><?=$row["id"]?></th>
			<td><?=$row["name"]?></td>
			<td><?=$row["number"]?></td>
			<td><?=$row["start_date"]?></td>
			<td><?=$row["end_date"]?></td>
			<td><?=$row["discount"]?></td>
			<td class="d-flex flex-wrap flex-shrink-1 gap-2">
				<a class="btn-main transition me-3 on-shelf " href="">上架</a>
				<a class="btn-main transition me-3 off-shelf" href="">下架</a>
				<a class="btn-main transition me-3 coupon-detail" href="">詳細資料</a>
				<?php require "coupon-detail.php"; ?>					
			</td>
		</tr>
		<?php endforeach;?>
		</tbody>
</table>
	<?php else:?>
		目前沒有資料
	<?php endif;?>
	<div class="py-2">
	<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
	<?php for($i=1;$i<=$totalPage;$i++):?>
    <li class="page-item"><a class="page-link <?php if($page==$i)echo "active";?>" href="coupon-index copy.php?page=<?=$i?>"><?=$i?></a></li>
	<?php endfor;?>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>

