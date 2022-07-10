<div class="recipe-datail flex_center invisible">
	<div class="cover-detail cover position_abs"></div>
	<form
		class="container-detail position-rel modify-ricepe-detail-form"
		action="recipes-detail-modify.php"
		method="POST"
	>
		<input type="hidden" value="<?= $row["id"] ?>" name="id">
		<i class="fa-solid fa-xmark position_abs detail-xMark"></i>
		<h2 class="recipe-title text-center"><?= $row["name"] ?>詳細資料</h2>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">食譜名稱</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="<?= $row["name"] ?>" name="name"
					required
				/>
			</div>
		</div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">食物類別</label>
			<div class="col">
				<select
					class="form-select detail-item-select"
					name="category_food"
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
			<label for="" class="col-sm-auto col-form-label">商品類別</label>
			<div class="col">
				<select
					class="form-select detail-item-select"
					name="categody_product"
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
			$materialNum = 0;
			?>
			<?php foreach($rowsDetailMaterial as $rowMaterial): ?>
			<div class="ms-3  mb-3 row">
				<div class="col">
					<input
						type="text"
						readonly="readonly"
						class="form-control-plaintext detail-item-input border-bottom
						detail-material-name"
						name="detail-material-name-<?= $row["id"] ?>-<?= $materialNum ?>"
						value="<?= $rowMaterial["name"] ?>"
						placeholder="請輸入食材名稱"
						required
						data-id=<?= $row["id"] ?>
						data-materialNum=<?= $materialNum ?>
					/>
				</div>
				<div class="col-3">
					<input
						type="text"
						readonly="readonly"
						class="form-control-plaintext detail-item-input border-bottom
						detail-material-q"
						name="detail-material-q-<?= $row["id"] ?>-<?= $materialNum ?>"
						value="<?= $rowMaterial["quantity"] ?>"
						placeholder="請輸入數量"
						required
					/>
				</div>		
			</div>
			<?php $materialNum++ ?>
			<?php endforeach?>
		</div>
		<div class="mb-3  d-flex justify-content-end d-none">
            <button class="detail-material-btn transition point-event-none" >新增食材</button>
        </div>
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">食譜內容</label>
			<div class="col">
				<textarea
					type="text"
					readonly="readonly"
					class="detail-item-input form-control"
					rows="5"
					id="floatingTextarea"
					name="content"
					required
				><?= $row["content"] ?></textarea>
			</div>
		</div>
		<div class="mb-3 d-flex flex-column align-items-start">
			<label for="" class="form-label">食譜成品圖</label>
			<label for="detail-image-<?= $row["id"] ?>" class="detail-image">
                <div class="preview-add-img-container">
                    <img src="img/recipe_img/<?= $row["image"] ?>" alt="" class="object-cover detailImgPre" id="">
                </div>
			</label>
			<input
				id="detail-image-<?= $row["id"] ?>"
				class=" detail-item-img detail-file invisible"
				type="file"
				accept="image/*"
				disabled="true"
				name="image"
				value="<?= $row["image"] ?>"
			/>
		</div>

		<div class="mb-3 flex_center">
			<button class="add-detail-btn modify-detail-btn me-3 transition" type="submit ">
				修改食譜
			</button>
			<button
				class="save-detail-btn me-3 transition"
				type="submit "
				disabled="true"
			>
				儲存食譜
			</button>
			<button class="add-detail-btn back-recipe-de transition">返回食譜列表</button>
		</div>
	</form>
</div>
