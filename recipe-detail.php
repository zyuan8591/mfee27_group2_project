<div class="recipe-datail flex_center invisible">
	<div class="cover-detail cover position_abs"></div>
	<form
		class="container-detail position-rel modify-ricepe-detail-form"
		action="recipe-detail-modify.php
    "
		method="GET"
	>
		<i class="fa-solid fa-xmark position_abs detail-xMark"></i>
		<h2 class="recipe-title text-center"><?= $row["name"] ?>詳細資料</h2>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">食譜名稱</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="<?= $row["name"] ?>"
				/>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">食物類別</label>
			<div class="col">
				<select
					class="form-select detail-item-select"
					name="category_main"
					disabled="true"
				>
				<?php foreach($rowsCatFood as $rowFood): ?>
					<option value="<?= $rowFood["id"] ?>" <?php if($row["category_food"]==$rowFood["id"]){echo "selected";} ?> 
					><?= $rowFood["name"] ?></option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">食譜名稱</label>
			<div class="col">
				<select
					class="form-select detail-item-select"
					name="product_id"
					disabled="true"
				>
				<?php foreach($rowsCatProduct as $rowProduct): ?>
					<option value="<?= $rowProduct["id"] ?>" <?php if($row["category_product"]==$rowProduct["id"]){echo "selected";} ?>
					><?= $rowProduct["name"] ?></option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>
		<label for="" class="col-sm-auto col-form-label ">食材　　</label>
		<div class="detail-material-container">
			<?php
			$detailId =$row["id"];
			$sqlDetailMaterial = "SELECT * FROM recipe_material WHERE recipe_id= $detailId ";
			$result = $conn->query($sqlDetailMaterial);
			$rowsDetailMaterial = $result->fetch_all(MYSQLI_ASSOC);
			?>
			<?php foreach($rowsDetailMaterial as $rowMaterial): ?>
			<div class="ms-3  mb-2 row ">
				<div class="col">
					<input
						type="text"
						readonly="readonly"
						class="form-control-plaintext detail-item-input border-bottom"
						value="<?= $rowMaterial["name"] ?>"
					/>
				</div>
				<div class="col-3">
					<input
						type="text"
						readonly="readonly"
						class="form-control-plaintext detail-item-input border-bottom"
						value="<?= $rowMaterial["quantity"] ?>"
					/>
				</div>		
			</div>
			<?php endforeach?>	
		</div>
		<div class="mb-3  d-flex justify-content-end">
            <button class="detail-material-btn transition">新增食材</button>
        </div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">食譜內容</label>
			<div class="col">
				<textarea
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					rows="5"
				><?= $row["content"] ?></textarea>
			</div>
		</div>
		<div class="mb-3 d-flex flex-column align-items-start">
			<label for="" class="form-label">食譜成品圖</label>
			<label for="detail-image" class="detail-image">
                <div class="preview-add-img-container">
                    <img src="img/recipe_img/<?= $row["image"] ?>" alt="" class="object-cover detailImgPre" id="">
                    
                </div>
			</label>
			<input
				id="detail-image"
				class=" detail-item-img detail-file d-none"
				type="file"
				accept="image/*"
				disabled="true"
			/>
		</div>
		<div class="mb-3 flex_center">
			<button class="add-detail-btn modify-detail-btn me-3" type="submit transition">
				修改食譜
			</button>
			<button
				class="save-detail-btn me-3"
				type="submit transition"
				disabled="true"
			>
				儲存食譜
			</button>
			<button class="add-detail-btn back-recipe-de transition">返回食譜列表</button>
		</div>
	</form>
</div>
