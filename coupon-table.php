


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
				<a class="btn-main transition me-3 on-shelf  <?php if ($row["valid"] == 1) {echo "point-event-none";} ?>" href="">上架</a>
				<a class="btn-main transition me-3 off-shelf  <?php if ($row["valid"] == 0) {echo "point-event-none";} ?>" href="">下架</a>
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
			<a type="button" class="btn btn-outline-dark" href="coupon-index.php?page=<?=$upPage?>&order=<?=$order?>&search=<?=$search?>&valid=<?=$valid?>">上一頁</a>			
			<?php for($i=1;$i<=$totalPage;$i++):?>
			<a type="button" class="btn btn-outline-dark <?php if($page==$i)echo "active";?>" href="coupon-index.php?page=<?=$i?>&order=<?=$order?>&search=<?=$search?>&valid=<?=$valid?>"><?=$i?></a>			
			<?php endfor;?>						
			<a type="button" class="btn btn-outline-dark" href="coupon-index.php?page=<?=$downPage?>&order=<?=$order?>&search=<?=$search?>&valid=<?=$valid?>">下一頁</a>
		</div>
	</div>
	<div class="col-4"></div>


</div>

