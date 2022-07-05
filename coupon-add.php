<div class="new-coupon-page position_abs flex_center invisible">
    <div class="cover position_abs"></div>
    <form class="new-coupon-form position-rel" action="new-coupon-exe.php
    " method="POST">        
        <i class="fa-solid coupon-xmark position_abs">x</i>
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
            <input type="date" class="form-control" name="start-date" required>
        </div>
		<div class="mb-3">
            <label for="" class="form-label">結束日期</label>
            <input type="date" class="form-control" name="end-date" required>
        </div>
		<div class="mb-3">
            <label for="" class="form-label">優惠折扣</label>
            <input type="text" class="form-control" name="discount" required>
        </div>
        <div class="mb-3 flex_center">
            <button class="add-detail-btn save-and-add-coupon-btn me-3" type="submit transition">新增</button>
            <button class="add-detail-btn back-coupon transition">返回列表</button>
        </div>
    </form>
</div>
