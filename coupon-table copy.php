

<?php if($pageCouponCount>0):?>
<table class="coupon-table table table-hover">	
	<div class="py-2 d-none ">第<?=$startItem?>筆-第<?=$endItem?>筆,共<?=$couponCount?>筆資料</div>
	第<?= $page ?>頁，共<?= $totalPage ?>頁，共<?= $couponCount ?>筆資料
		<thead class="table-dark">
		<tr>
			<th class="text-center" scope="col">優惠券編號</th>
			<th scope="col">名稱</th>
			<th scope="col">序號</th>
			<th scope="col">起始日期</th>
			<th scope="col">結束日期</th>
			<th class="text-center" scope="col">優惠折扣(%off)</th>
			<th scope="col">編輯優惠券</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($rows as $row):?>
		<tr>
			<th name="id" class="text-center" scope="row"><?=$row["id"]?></th>
			<td><?=$row["name"]?></td>
			<td><?=$row["number"]?></td>
			<td><?=$row["start_date"]?></td>
			<td><?=$row["end_date"]?></td>
			<td class="text-center">  <?php 
                if(abs($row["discount"])<1){
                echo 100-($row["discount"]*100) . "% " ;
                }else{
                    echo "-$".abs($row["discount"]);
                }
                ?></td>
			<td class="d-flex flex-wrap flex-shrink-1 gap-2">								
				<a class="btn-main transition me-3 on-shelf  <?php if ($row["valid"] == 1) {echo "point-event-none";} ?>" href="coupon-onoff-shelf.php?id=<?= $row["id"] ?>&page=<?=$page?>&order=<?=$order?>&search=<?=$search?>&valid=<?=$valid?>&per-page=<?=$perPage?>">上架</a>
				<a class="btn-main transition me-3 off-shelf  <?php if ($row["valid"] == 0) {echo "point-event-none";} ?>" href="coupon-onoff-shelf.php?id=<?= $row["id"] ?>&page=<?=$page?>&order=<?=$order?>&search=<?=$search?>&valid=<?=$valid?>&per-page=<?=$perPage?>">下架</a>
				<a class="btn-main transition me-3 coupon-detail" href="">詳細資料</a>			
				<?php require "coupon-detail.php"; ?>					
			</td>
		</tr>
		<?php endforeach;?>
		</tbody>
</table>

<div class=" flex_center w-100">	
	<div class="">
		<div class="btn-group me-2" role="group" aria-label="First group">			
			<a type="button" class="btn btn-outline-dark" href="coupon-index.php?page=<?=$upPage?>&order=<?=$order?>&search=<?=$search?>&valid=<?=$valid?>&per-page=<?=$perPage?>">上一頁</a>			
			<?php for($i=1;$i<=$totalPage;$i++):?>
			<a type="button" class="btn btn-outline-dark <?php if($page==$i)echo "active";?>" href="coupon-index.php?page=<?=$i?>&order=<?=$order?>&search=<?=$search?>&valid=<?=$valid?>&per-page=<?=$perPage?>"><?=$i?></a>			
			<?php endfor;?>						
			<a type="button" class="btn btn-outline-dark" href="coupon-index.php?page=<?=$downPage?>&order=<?=$order?>&search=<?=$search?>&valid=<?=$valid?>&per-page=<?=$perPage?>">下一頁</a>
		</div>
	</div>
<?php else:?>
	目前沒有資料
<?php endif;?>