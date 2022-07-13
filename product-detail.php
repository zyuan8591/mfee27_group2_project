<div class="detail-page flex_center invisible">
	<div class="detail-cover position_abs"></div>
	<form class="detail-form text-nowrap" action="revise-product-exe.php" method="GET">
		<h2 class="product-title text-center">商品詳細資料</h2>
		<input type="hidden" value="<?= $row["id"] ?>" name="id">
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">店家：</label>
			<div class="col">
				<input type="text" readonly class="form-control-plaintext " name="brand" value="<?= $companyName[$row["company_id"]] ?>" />
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">商品名稱：</label>
			<div class="col">
				<input type="text" readonly class="form-control-plaintext product-input" name="name" value="<?= $row["name"] ?>" required />
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">主要類型：</label>
			<div class="col">
				<select name="category_main" class="form-select product-input" disabled>
					<?php foreach ($rowsCate as $item) : ?>
						<option value="<?= $item["id"] ?>" <?php if ($row["category_main"] == $item["id"]) {
																echo "selected";
															} ?>><?= $item["name"] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">次要類型：</label>
			<div class="col">
				<select name="category_sub" class="form-select product-input" disabled>
					<?php foreach ($rowsCateSub as $item) : ?>
						<option value="<?= $row["category_sub"] ?>" <?php if ($row["category_sub"] == $item["id"]) {
																		echo "selected";
																	} ?>><?= $item["name"] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="mb-3 row d-flex align-items-center">
			<label for="" class="col-sm-2 col-form-label py-0">價格：</label>
			<div class="col-sm-10 product-container row d-flex align-items-center">
				<div class="col-5">
					<input
						type="number"
						readonly
						class="form-control-plaintext product-input"
						name="price"
						value="<?=$row["price"]?>"
						required
					/>
				</div>
				<label for="" class="col-sm-2 col-form-label py-0">數量：</label>
				<div class="col-2">
					<input
						type="number"
						readonly
						class="form-control-plaintext product-input"
						name="inventory"
						value="<?=$row["inventory"]?>"
						required
					/>
				</div>
			</div>
		</div>

		<div class="mb-3 row">
            <label for="" class="col-sm-auto col-form-label">商品簡介：</label>
			<div class="col">
            	<textarea cols="30" rows="6" type="text" class="form-control-plaintext product-input " readonly name="intro" required ><?=$row["intro"]?></textarea>
			</div>
		</div>
        <div class="mb-3 row">
            <label for="" class="col-sm-auto col-form-label">商品規格：</label>
			<div class="col">
            	<textarea cols="30" rows="14" type="text" class="form-control-plaintext product-input spec" readonly name="spec" required ><?=$row["spec"]?></textarea>
			</div>
		</div>

		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label py-0">新增日期：</label>
			<div class="col">
				<input
					type="text"
					readonly
					class="form-control-plaintext p-0"
					name="create_time"
					value="<?=$row["create_time"]?>"
					disabled
				/>
			</div>
		</div>
		<div class="mb-3 d-flex flex-column align-items-start">
			<label for="" class="form-label">商品圖片　</label>
			<label for="product-image-<?= $row["id"] ?>" class="product-image">
				<div class="product-img position_rel">
					<img class="object-cover detail-preview" src="img/products_main_img/<?= $row["product_main_img"] ?>" alt="">
				</div>
			</label>
			<input id="product-image-<?= $row["id"] ?>" class=" product-input detail-img-input d-none" type="file" accept="image/*" name="product_main_img" value="<?= $row["product_main_img"] ?>" disabled required />
		</div>
		<div class="mb-3 flex_center">
			<button class="revise-btn revise-hover" type="submit transition">
				修改內容
			</button>
			<button class="save-btn save-hover transition " type="submit">
				儲存內容
			</button>
			<button class="product-btn back-to-product transition">
				返回商品列表
			</button>
		</div>
	</form>
</div>