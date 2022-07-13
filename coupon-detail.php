<div class="detail-coupon-page flex_center invisible">
<div class="cover-detail cover position_abs"></div>
	<form
		class="container-detail position-rel modify-coupon-detail-form"
		action="coupon-detail-modify.php"       
		method="POST"
        onsubmit="return detailDateTest()"
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
            <input id="" name="startDate" type="date" class="form-control-plaintext detail-item-input startDate" readonly="readonly" value="<?=$row["start_date"]?>" >
            </div>
        </div>
        <div class="mb-3 row ">
            <label for="" class=" form-label">結束日期</label>
            <div class="col">
            <input id="" name="endDate" type="date" class="form-control-plaintext detail-item-input endDate" readonly="readonly" value="<?=$row["end_date"]?>" >
            </div>
        </div>
        <!-- 選單 -->
        <div id="" class="my-3 mb-3 detailSelect">
            <label for="" class="form-label mb-3">優惠選擇</label>
                <select class="form-select" name="detailDiscountSelect" id="detailDiscountSelect">
                    <option value="">請選擇</option>       
                    <option value="A">(%)優惠</option>
                    <option value="B">折價</option>						
                </select>        
            <div class="mb-3 row my-3 detailpercentDiscountInput" id="" name="detailpercentDiscountInput">
                <label for="" class="form-label ">優惠折扣</label>
            <div class="col-8">
                <input id="percentDiscount" type="text" man="99" oninput = "value=value.replace(/[^\d]/g,'');if(value>99)value=99"  class="form-control" name="percentDiscount" style="text-align: right;" >
            </div>
            <div class="col-4">
                <input class="form-control" type="text" readonly="readonly" value=%off>
            </div>
            </div>
            <div class="mb-3 row my-3 detailunderchargedInput" id="" name="detailunderchargedInput " >
                <label for="" class="form-label">優惠折扣</label>
                <div class="col-4">
                <input class="form-control" type="text" readonly="readonly" value=-$ style="text-align: right;">
                </div>
                <div class="col-8">
                <input id="undercharged" type="text" oninput = "value=value.replace(/[^\d]/g,'')"  class="form-control" name="undercharged" style=" text-align: right;" >
                </div>
            </div>
        </div>
        <!-- origina discount -->
        <div  id="" class="originalDiscount">
        <div class="mb-3 row ">
            <label for="" class=" form-label">優惠折扣</label>
            <div class="col">
            <input name="discount" type="text" class="form-control-plaintext detail-item-input " readonly="readonly" value="<?php 
                if(abs($row["discount"])<1){
                echo 100-($row["discount"]*100) . "% off " ;
                }else{
                    echo "-$".abs($row["discount"]);
                }
                ?>" >
            </div>
        </div> 
        </div>      
        <div class="mb-3 flex_center my-3">
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
