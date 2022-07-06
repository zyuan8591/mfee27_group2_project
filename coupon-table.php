<?php
require("./db-connect.php");
$sql="SELECT * FROM coupon";

$result = $conn->query($sql);
$couponCount=$result->num_rows;
$rows = $result->fetch_all(MYSQLI_ASSOC);
?>


<table class="coupon-table table table-hover">	
	<div class="py-2">共<?=$couponCount?>筆資料</div>
	<?php if($couponCount>0):?>
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
			</td>
		</tr>
		<?php endforeach;?>
		</tbody>
</table>
	<?php else:?>
		目前沒有資料
	<?php endif;?>
<script>	
</script>
