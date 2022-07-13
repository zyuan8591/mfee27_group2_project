<div class="new-coupon-page position_abs flex_center invisible">
    <div class="cover position_abs"></div>
    <form class="new-coupon-form position-rel" action="new-coupon-exe.php
    " method="POST" onsubmit="return dateTest()">        
        <i class="fa-solid fa-xmark position_abs coupon-xmark"></i>
        <h2 class="coupon-title text-center">新增優惠券</h2>
		<div class="mb-3">
            <label for="" class="form-label">優惠券名稱</label>
            <input type="text" class="form-control" name="name" required>
        </div>
		<div class="mb-3">
            <label for="" class="form-label">序號</label>
            <input type="text" class="form-control" name="number" required>
        </div>
		<div class="mb-3">
            <label for="" class="form-label">起始日期</label>
            <input id="sDate" type="date" class="form-control" name="start-date" required>
        </div>
		<div class="mb-3">
            <label for="" class="form-label">結束日期</label>
            <input id="eDate" type="date" class="form-control" name="end-date" required>
        </div>
        <label for="" class="form-label mb-3">優惠選擇</label>
        <select class="form-select " name="discountSelect" id="discountSelect">
                            <option value="">請選擇</option>       
							<option value="A">(%)優惠</option>
							<option value="B">折價</option>						
					</select>
		<div class="mb-3 row" id="percentDiscountInput" name="percentDiscountInput">
            <label for="" class="form-label ">優惠折扣</label>
            <div class="col-8">
            <input id="percentDiscount" type="text" man="99" oninput = "value=value.replace(/[^\d]/g,'');if(value>99)value=99"  class="form-control" name="percentDiscount" style="color: blue; text-align: right;" >
            </div>
            <div class="col-4">
            <input class="form-control" type="text" readonly="readonly" value=%off>
            </div>
        </div>
        <div class="mb-3 row" id="underchargedInput" name="underchargedInput " >
            <label for="" class="form-label">優惠折扣</label>
            <div class="col-4">
            <input class="form-control" type="text" readonly="readonly" value=-$ style="text-align: right;">
            </div>
            <div class="col-8">
            <input id="undercharged" type="text" oninput = "value=value.replace(/[^\d]/g,'')"  class="form-control" name="undercharged" style="color: blue; text-align: right;" >
            </div>
        </div>
        <div class="my-3 flex_center">
            <button class="add-detail-btn save-and-add-coupon-btn me-3 transition" type="submit ">新增</button>
            <button class="add-detail-btn back-coupon transition">返回列表</button>
        </div>
    </form>
</div>
