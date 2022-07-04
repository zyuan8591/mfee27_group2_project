<div class="new-recipe-page position_abs flex_center invisible">
    <div class="cover position_abs"></div>
    <form class="new-recipe-form position-rel" action="new-recipe-exe.php
    " method="GET">
        <i class="fa-solid fa-xmark position_abs"></i>6
        <h2 class="recipe-title text-center">新增優惠券</h2>
        <div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">優惠券名稱</label>
			<div class="col">
				<input					
					readonly="readonly"
					class="form-control-plaintext detail-item-input"					
				/>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">序號</label>
			<div class="col">
				<input
					type="text"					
					class="form-control-plaintext detail-item-input"					
				/>
			</div>
		</div>
		<div class="mb-3">
			<label for="" class="col-sm-auto col-form-label">起始日期</label>
			
			<input
				type="date"					
				class="form-control-plaintext detail-item-input"									
			/>
			
		</div><div class="mb-3">
			<label for="" class="col-sm-auto col-form-label">結束日期</label>			
			<input
				type="date"				
				class="form-control-plaintext detail-item-input"									
				/>
			
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">優惠折扣</label>			
			<input
				type="text"				
				class="form-control-plaintext detail-item-input"				
				/>			
		</div>
		

		
		</div>
        <div class="mb-3 flex_center">
            <button class="add-detail-btn save-and-add-recipe-btn me-3" type="submit transition">新增優惠券</button>
            <button class="add-detail-btn back-recipe transition">返回列表</button>
        </div>
    </form>
</div>