<?php
require "db-connect.php" ;
// echo $order_id;

$sqlOrderProduct = "SELECT order_product.*, products.name AS product_name, products.price AS product_price,
orders.coupon_id AS couponId, products.company_id
-- , coupon.discount AS coupon_discount , coupon.start_date AS coupon_startDate, coupon.end_date AS coupon_endDate 
FROM order_product 
JOIN products ON order_product.product_id = products.id 
JOIN orders ON order_product.order_id = orders.id
-- JOIN coupon ON order_product.couponId = coupon.id 
WHERE order_id= $order_id $sqlUserWhere
ORDER BY product_id ASC";
// var_dump($sqlOrderProduct);

$resultOrderProduct = $conn->query($sqlOrderProduct);
$rowsOrderProduct = $resultOrderProduct->fetch_all(MYSQLI_ASSOC);
// var_dump($rowsOrderProduct);


$sqlOrderCoupon = "SELECT id, discount, start_date, end_date FROM coupon ";
$resultOderCoupon = $conn->query($sqlOrderCoupon);
$rowsOrderCoupon = $resultOderCoupon->fetch_all(MYSQLI_ASSOC);
// var_dump($rowsOrderCoupon);	

foreach($rowsOrderProduct as $rowOrderProduct){
	// var_dump ($rowOrderProduct["couponId"]);
	// var_dump($rowOrderProduct);
	// echo "<br>";
	foreach($rowsOrderCoupon as $rowOrderCoupon){
		// var_dump($rowOrderCoupon);
		if($rowOrderProduct["couponId"] == $rowOrderCoupon["id"]){
			$rowOrderProduct["couponDiscount"] = $rowOrderCoupon["discount"];
		}elseif(empty($rowOrderProduct["couponDiscount"])){
			$rowOrderProduct["couponDiscount"] = 1;
		}
	}
}

// var_dump($rowOrderProduct);

$order_time = $row["order_time"];
$ts = strtotime($order_time);
$order_time_ts = date('Y-m-d', $ts);
// echo $order_time_ts;

$sqlCouponLimit = "SELECT * FROM coupon WHERE start_date <= '$order_time_ts' AND end_date >= '$order_time_ts' ";
// echo $sqlCouponLimit . "<br>" ;
$resultCouponLimit = $conn->query($sqlCouponLimit);
$rowsCouponLimit = $resultCouponLimit->fetch_all(MYSQLI_ASSOC);
// var_dump($rowsCouponLimit);
// foreach($rowsCouponLimit as $rowCouponLimit){
// 	$rowLimits[$rowCouponLimit["id"]]=$rowCouponLimit["discount"];
// 	// var_dump($rowLimits);
// }


?>

<div class="recipe-datail position_abs flex_center invisible ">
	<div class="cover-detail cover position_abs"></div>
	<form
		class="recipe_search container-detail position-rel modify-ricepe-detail-form "
		action="order-update.php
    "	
		method="GET"
	>
	<input type="hidden" name="userId" value="<?=$row["user_id"]?>">
		<i class="fa-solid fa-xmark position_abs detail-xMark"></i>
		<h2 class="recipe-title text-center">訂單資料</h2>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">訂單編號：</label>
			<div class="col">
				<input
					type="number"
					readonly="readonly"
					class="form-control-plaintext text-start"
					value="<?=$row["id"]?>" name="order_id"
				/>
			</div>
		</div>
        <div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label detail-label text-end">購買人：</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext text-start"
					value="<?=$row["name"]?>" name="name"
				/>
			</div>
		</div>
        <div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label detail-label text-end">電話：</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext text-start"
					value="<?=$row["phone"]?>" name="phone"
				/>
			</div>
		</div>
        <div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label detail-label text-end">地址：</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext text-start"
					value="<?=$row["address"]?>" name="address"
				/>
			</div>
		</div>
        <div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">訂單狀態：</label>
			<div class="col">
				<select
					type="text"
					disabled="true"
					class="form-select detail-item-select"
					name="status"
				>
				<?php foreach($rowStatus as $rowSta):?>
				<option
				 value="<?= $rowSta["id"] ?>"
				 <?php if($rowSta["id"]==$row["status_id"]) echo "selected";?> >
				 <?= $rowSta["status"] ?>
				</option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>
        <div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label detail-label text-end">備註：</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					<?php if(!empty($row["memo"])): ?>
					value="<?= $row["memo"] ?>"
					<?php else: ?>
					value="無"
					<?php endif; ?>
					name="memo"
				/>
			</div>
		</div>
		<?php
			$order_time = $row["order_time"];
			$ts = strtotime($order_time);
			$order_time_ts = date('Y-m-d', $ts);		
			$sqlCouponLimit = "SELECT * FROM coupon WHERE start_date <= '$order_time_ts' AND end_date >= '$order_time_ts'";
			$resultCouponLimit = $conn->query($sqlCouponLimit);
			$rowsCouponLimit = $resultCouponLimit->fetch_all(MYSQLI_ASSOC);
			// var_dump($rowsCouponLimit);

			// foreach ($rowsCouponLimit as $rowLimit){
			// 	$rowCoupon[$rowLimit["id"]] = $rowLimit["name"];
			// }
			// var_dump($rowCoupon);
		?>
        <div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label detail-label text-end">優惠券：</label>
			<div class="col">
			<select
					type="text"
					disabled="true"
					class="form-select detail-item-select coupon-select"
					name="coupon"
					id="coupon"
				>
				<option value="0">無</option>
				
				<?php foreach($rowsCouponLimit as $rowLimit):?>
				<option class="coupon"
				 	value="<?= $rowLimit["id"] ?>"
				 <?php if($rowLimit["id"]==$row["coupon_id"]) echo "selected";?> >
				 <?= $rowLimit["name"] ?>
				</option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>
		
        <div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">下單時間：</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext text-start"
					value="<?=$row["order_time"]?>"
				/>
			</div>
		</div>
		<div>
			<table class="table table-bordered">
				<thead class="detail-table">
					<tr>
						<th>id</th>
						<th>品名</th>
						<th>單價</th>
						<th>數量</th>
						<th>小計</th> 
					</tr>
					
				</thead>
				<tbody>
					<?php 
					$producti = 1;
					$totalPrice = 0;
					?>
					<?php foreach($rowsOrderProduct as $rowProduct ):
						// var_dump($rowProduct);
						$totalPrice+=$rowProduct["product_price"]*$rowProduct["product_quantity"];
					
					?>
		
					<input type="hidden" name="id<?=$producti?>" value="<?= $rowProduct["id"] ?>">
					

	
	
					
					<tr>
						<td class="text-center"><?= $rowProduct["product_id"] ?></td>
						<td><?= $rowProduct["product_name"] ?></td>
						<td class="text-end"><?= number_format($rowProduct["product_price"]) ?></td>
						<td><input type="number" 
						name="amount<?=$producti?>"
						value="<?= $rowProduct["product_quantity"] ?>" readonly="readonly"
					class="form-control-plaintext detail-item-input text-end"></td>
						<td class="text-end"><?= number_format($rowProduct["product_price"]*$rowProduct["product_quantity"]) ?></td>
					</tr>    
					<?php $producti+=1;?>
					<?php endforeach; ?>
					<tr>
						<td colspan="5" class="text-end">總計：<span><?=number_format($totalPrice)?></span> <br>
						<span class="text-danger discount">折扣：
							<?php
							// var_dump ($rowOrderProduct["couponId"]);

							// if($rowOrderProduct["couponId"]==0){
							// 	echo "無";
							// }elseif($rowOrderProduct["couponDiscount"]===$rowLimits["discount"]){
							// 	echo $rowOrderProduct["couponDiscount"];
							// }
							if($rowOrderProduct["couponDiscount"]==1) {echo "無";}else{echo $rowOrderProduct["couponDiscount"];} 
							// print_r($rowOrderProduct);
							?></span><br>
						<span >折扣後：
							<?php
							if($rowOrderProduct["couponDiscount"] >= 0 && $rowOrderProduct["couponDiscount"] <=1 ){
								echo number_format($totalPrice*$rowOrderProduct["couponDiscount"]);
							} else {
								echo number_format($totalPrice+$rowOrderProduct["couponDiscount"]);
							}
							?>
						</span> 
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>
		<!-- <div class="mb-3 row">
			<label for="" class="form-label">食譜成品圖</label>
			<label for="recipe-image" class="recipe-image">
				<svg
					width="134"
					height="134"
					viewBox="0 0 134 134"
					fill="none"
					xmlns="http://www.w3.org/2000/svg"
				>
					<rect
						x="1.5"
						y="1.5"
						width="131"
						height="131"
						rx="3.5"
						stroke="#CECECE"
						stroke-width="3"
					/>
					<path
						d="M97.7269 48.0768V40.2974H89.9616V34.8699H97.7269V27H103.144V34.8699H111V40.2974H103.144V48.0768H97.7269ZM36.4176 100C34.9729 100 33.7088 99.4572 32.6253 98.3717C31.5418 97.2862 31 96.0198 31 94.5725V48.1673C31 46.7803 31.5418 45.5289 32.6253 44.4133C33.7088 43.2976 34.9729 42.7398 36.4176 42.7398H49.6907L56.2822 34.8699H81.5643V40.2974H58.8104L52.219 48.1673H36.4176V94.5725H97.8172V56.5799H103.235V94.5725C103.235 96.0198 102.678 97.2862 101.564 98.3717C100.451 99.4572 99.2017 100 97.8172 100H36.4176ZM67.1174 86.7931C71.4515 86.7931 75.0933 85.3156 78.0429 82.3606C80.9925 79.4056 82.4673 75.727 82.4673 71.3247C82.4673 66.9827 80.9925 63.3492 78.0429 60.4244C75.0933 57.4996 71.4515 56.0372 67.1174 56.0372C62.7231 56.0372 59.0662 57.4996 56.1467 60.4244C53.2272 63.3492 51.7675 66.9827 51.7675 71.3247C51.7675 75.727 53.2272 79.4056 56.1467 82.3606C59.0662 85.3156 62.7231 86.7931 67.1174 86.7931ZM67.1174 81.3656C64.228 81.3656 61.8503 80.4157 59.9842 78.5161C58.1181 76.6165 57.1851 74.2193 57.1851 71.3247C57.1851 68.4903 58.1181 66.1384 59.9842 64.2689C61.8503 62.3994 64.228 61.4647 67.1174 61.4647C69.9466 61.4647 72.3093 62.3994 74.2054 64.2689C76.1016 66.1384 77.0497 68.4903 77.0497 71.3247C77.0497 74.2193 76.1016 76.6165 74.2054 78.5161C72.3093 80.4157 69.9466 81.3656 67.1174 81.3656Z"
						fill="#CECECE"
					/>
				</svg>
			</label>
			<div class="mb-3 d-flex flex-column align-items-start">
				<input
					id="recipe-image"
					class="d-none detail-item-img"
					type="file"
					accept="image/*"
					disabled="true"
				/>
			</div>
		</div> -->
		<div class="d-flex justify-content-center">
			<button class="add-detail-btn modify-detail-btn me-3" type="submit transition">
				編輯訂單
			</button>
			<button
				class="save-detail-btn me-3"
				type="submit transition"
				disabled="true"
			>
				儲存修改
			</button>
			<button class="add-detail-btn back-recipe-de transition">返回訂單列表</button>
		</div>
	</form>
</div>
