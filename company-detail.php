<div class="company-datail  flex_center invisible">
	<div class="cover-detail cover position_abs"></div>
	<form
		class="container-detail position-rel modify-company-detail-form"
		action="companyUpdate.php"
		method="POST" 
		enctype="multipart/form-data"
	>
		<i class="fa-solid fa-xmark position_abs detail-xMark"></i>
		<h2 class="company-title text-center">廠商詳細資料</h2>
		<div class="mb-3 row align-items-center">
			<label for="" class="col-sm-auto col-form-label">廠商編號：</label>
			<div class="col">
				<input 
					type="text" 
					readonly="readonly"
					class="form-control-plaintext"
					name="id" 
					value="<?=$row["id"]?>"
					required
				>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">廠商名稱：</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					name="name"
					value="<?=$row["name"]?>"
					required
				>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">帳號(信箱)：</label>
			<div class="col">
				<input
					type="email"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					name="email"
					value="<?=$row["email"]?>"
					required
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
					name="phone"
					value="<?=$row["phone"]?>"
					required
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
					name="address"
					value="<?=$row["address"]?>"
					required
				/>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">公司簡介：</label>
			<div class="col">
				<textarea 
					rows="5" 
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					name="intro"
					required
				><?=$row["intro"]?>
				</textarea>
			</div>
		</div>
		<div class="mb-3 d-flex flex-column align-items-start">
			<label for="" class="form-label">公司圖像</label>
			<label for="detail-image" class="detail-image">
				<div class="add-image-container cursor-pointer me-2">
					<img src="./company_img/<?= $row["logo_img"]?>" alt="" class="object-cover detailImgPre">
				</div>
			</label>
			<input
				id="detail-image"
				class=" detail-item-img detail-file invisible"
				type="file"
				accept="image/*"
				name="myfile-image"
				disabled = "true"
				value="<?= $row["image"] ?>"
			/>
		</div>
		<div class="mb-3 flex_center">
			<button class="add-detail-btn modify-detail-btn me-3 transition" type="submit ">
				修改
			</button>
			<button
				class="add-detail-btn save-detail-btn me-3 transition"
				type="submit"
				disabled="true"
			>
				儲存
			</button>
			<button class="add-detail-btn back-company-de transition">返回廠商列表</button>
		</div>
	</form>
</div>
