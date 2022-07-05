<div class="coupone-datail position_abs flex_center invisible">
	<div class="cover-detail cover position_abs"></div>
	<form
		class="container-detail position-rel modify-ricepe-detail-form"
		action="coupon-detail-modify.php
    "
		method="GET"
	>
		<i class="fa-solid fa-xmark position_abs detail-xMark"></i>
		<h2 class="coupon-title text-center">XX詳細資料</h2>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">優惠券名稱</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="登入送好禮"
				/>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">序號</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="TK888"
				/>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">起始日期</label>
			<div class="col">
				<input
					type="date"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="2022-06-15"						
				/>
			</div>
		</div><div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">結束日期</label>
			<div class="col">
				<input
					type="date"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="2022-07-15"						
				/>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">優惠折扣</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="75%"
				/>
			</div>
		</div>
		

		
		</div>
		<div class="mb-3 flex_center">
			<button class="add-detail-btn modify-detail-btn me-3" type="submit transition">
				修改
			</button>
			<button
				class="add-detail-btn save-detail-btn me-3"
				type="submit transition"
				disabled="true"
			>
				儲存
			</button>
			<button class="add-detail-btn back-coupon-de transition">返回</button>
		</div>
	</form>
</div>
