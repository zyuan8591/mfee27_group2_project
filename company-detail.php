<div class="recipe-datail position_abs flex_center invisible">
	<div class="cover-detail cover position_abs"></div>
	<form
		class="container-detail position-rel modify-ricepe-detail-form"
		action="recipe-detail-modify.php
    "
		method="GET" 
	>
		<i class="fa-solid fa-xmark position_abs detail-xMark"></i>
		<h2 class="recipe-title text-center">廠商詳細資料</h2>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">公司名稱：</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="xxxx"
				/>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">帳號(信箱)：</label>
			<div class="col">
				<input
					type="email"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="xxxx"
				/>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">密碼：</label>
			<div class="col">
				<input
					type="password"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="xxxx"
				/>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">電話：</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="xxxx"
				/>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">地址：</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="xxxx"
				/>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">公司簡介</label>
			<div class="col">
			<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="xxxx"
				/>
			</div>
		</div>
		<div class="mb-3 flex_center">
			<button class="add-detail-btn modify-detail-btn me-3" type="submit transition">
				修改食譜
			</button>
			<button
				class="add-detail-btn save-detail-btn me-3"
				type="submit transition"
				disabled="true"
			>
				儲存食譜
			</button>
			<button class="add-detail-btn back-recipe-de transition">返回食譜列表</button>
		</div>
	</form>
</div>
