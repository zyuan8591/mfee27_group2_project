<div class="detail-coupon-page flex_center invisible">
<div class="cover-detail cover position_abs"></div>
	<form
		class="container-detail position-rel modify-coupon-detail-form"
		action="coupon-detail-modify.php"       
		method="POST"
	>
        <input type="hidden" value="<?= $row["id"] ?>" name="id">
		<i class="fa-solid fa-xmark position_abs detail-xMark"></i>
		<h2 class="coupon-title text-center">詳細資料</h2>
        
        <div class="mb-3 row ">
            <label for="" class=" form-label">優惠券名稱</label>
            <div class="col">
            <input name="name" type="text" class="form-control-plaintext detail-item-input " readonly="readonly" value="<?=$row["name"]?>" >
            </div>
        </div>		
        <div class="mb-3 row ">
            <label for="" class=" form-label">序號</label>
            <div class="col">
            <input name="number" type="text" class="form-control-plaintext detail-item-input " readonly="readonly" value="<?=$row["number"]?>" >
            </div>
        </div>
        <div class="mb-3 row ">
            <label for="" class=" form-label">起始日期</label>
            <div class="col">
            <input name="startDate" type="date" class="form-control-plaintext detail-item-input " readonly="readonly" value="<?=$row["start_date"]?>" >
            </div>
        </div>
        <div class="mb-3 row ">
            <label for="" class=" form-label">結束日期</label>
            <div class="col">
            <input name="endDate" type="date" class="form-control-plaintext detail-item-input " readonly="readonly" value="<?=$row["end_date"]?>" >
            </div>
        </div>
        <div class="mb-3 row ">
            <label for="" class=" form-label">優惠折扣</label>
            <div class="col">
            <input name="discount" type="text" class="form-control-plaintext detail-item-input " readonly="readonly" value="<?=$row["discount"]?>" >
            </div>
        </div>
        
       
        
       	
        
        
		<div class="mb-3 flex_center">
			<button class="add-detail-btn modify-detail-btn me-3" type="submit">
				修改優惠券
			</button>
			<button
				class="add-detail-btn save-detail-btn me-3 transition"
				type="submit "
				disabled="true"
			>
				儲存優惠券
			</button>
			<button class="add-detail-btn backCoupon transition">返回優惠券</button>
		</div>
	</form>


</div>