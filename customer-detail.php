<div class="recipe-datail flex_center invisible">
	<div class="cover-detail cover position_abs"></div>
	<form
		class="container-detail position-rel modify-ricepe-detail-form submit-from"
		action="customer-detail-modify.php"
		method="post" enctype="multipart/form-data"
	>
		<i class="fa-solid fa-xmark position_abs detail-xMark"></i>
		<h2 class="recipe-title text-center">會員詳細資料</h2>
<!-- hidden -->
		<input
			type="hidden"
			class="form-control-plaintext detail-item-input "
			value="<?=$row["id"]?>"
			name="id"
		/>
<!-- ------- -->
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">會員名稱</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="<?=$row["name"]?>"
					name="name"
				/>
			</div>
		</div>

		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">會員生日</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="<?=$row["birthday"]?>"
					name="birthday"
				/>
			</div>
		</div>
		
		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">會員電話</label>
			<div class="col">
				<input
					type="tel"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="<?=$row["phone"]?>"
					name="phone"
				/>
			</div>
		</div>

		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">會員信箱</label>
			<div class="col">
				<input
					type="email"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="<?=$row["email"]?>"
					name="email"
				/>
			</div>
		</div>

		<div class="mb-3 row">
			<label for="" class="col-sm-auto col-form-label">會員地址</label>
			<div class="col">
				<input
					type="text"
					readonly="readonly"
					class="form-control-plaintext detail-item-input"
					value="<?=$row["address"]?>"
					name="address"
				/>
			</div>
		</div>
		<div class="mb-3 d-flex flex-column align-items-start">
			<label for="" class="form-label">新增圖像</label>
			
			<label for="customer-image-<?=$row["id"]?>" class="recipe-image" >
			<?php if($row["img"] == " "): ?>	
				<div class="customer-img">
					<img class="object-fit avatar-img d-none" src="img/user_img/<?=$row["img"]?>" alt="">
					<svg
						class="file-svg"
						width="134"
						height="134"
						viewBox="0 0 134 134"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
					 >
						<rect
							x="1.5"
							y="1.5"
							width="131"
							height="131"
							rx="3.5"
							stroke="#CECECE"
							stroke-width="3"
						/>
						<path
							d="M97.7269 48.0768V40.2974H89.9616V34.8699H97.7269V27H103.144V34.8699H111V40.2974H103.144V48.0768H97.7269ZM36.4176 100C34.9729 100 33.7088 99.4572 32.6253 98.3717C31.5418 97.2862 31 96.0198 31 94.5725V48.1673C31 46.7803 31.5418 45.5289 32.6253 44.4133C33.7088 43.2976 34.9729 42.7398 36.4176 42.7398H49.6907L56.2822 34.8699H81.5643V40.2974H58.8104L52.219 48.1673H36.4176V94.5725H97.8172V56.5799H103.235V94.5725C103.235 96.0198 102.678 97.2862 101.564 98.3717C100.451 99.4572 99.2017 100 97.8172 100H36.4176ZM67.1174 86.7931C71.4515 86.7931 75.0933 85.3156 78.0429 82.3606C80.9925 79.4056 82.4673 75.727 82.4673 71.3247C82.4673 66.9827 80.9925 63.3492 78.0429 60.4244C75.0933 57.4996 71.4515 56.0372 67.1174 56.0372C62.7231 56.0372 59.0662 57.4996 56.1467 60.4244C53.2272 63.3492 51.7675 66.9827 51.7675 71.3247C51.7675 75.727 53.2272 79.4056 56.1467 82.3606C59.0662 85.3156 62.7231 86.7931 67.1174 86.7931ZM67.1174 81.3656C64.228 81.3656 61.8503 80.4157 59.9842 78.5161C58.1181 76.6165 57.1851 74.2193 57.1851 71.3247C57.1851 68.4903 58.1181 66.1384 59.9842 64.2689C61.8503 62.3994 64.228 61.4647 67.1174 61.4647C69.9466 61.4647 72.3093 62.3994 74.2054 64.2689C76.1016 66.1384 77.0497 68.4903 77.0497 71.3247C77.0497 74.2193 76.1016 76.6165 74.2054 78.5161C72.3093 80.4157 69.9466 81.3656 67.1174 81.3656Z"
							fill="#CECECE"
						/>
					</svg>
				</div>
			<?php else: ?>
				<div class="customer-img">
					<img class="object-fit avatar-img" src="img/user_img/<?=$row["img"]?>" alt="">
					<svg
						class="file-svg d-none"
						width="134"
						height="134"
						viewBox="0 0 134 134"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
					 >
						<rect
							x="1.5"
							y="1.5"
							width="131"
							height="131"
							rx="3.5"
							stroke="#CECECE"
							stroke-width="3"
						/>
						<path
							d="M97.7269 48.0768V40.2974H89.9616V34.8699H97.7269V27H103.144V34.8699H111V40.2974H103.144V48.0768H97.7269ZM36.4176 100C34.9729 100 33.7088 99.4572 32.6253 98.3717C31.5418 97.2862 31 96.0198 31 94.5725V48.1673C31 46.7803 31.5418 45.5289 32.6253 44.4133C33.7088 43.2976 34.9729 42.7398 36.4176 42.7398H49.6907L56.2822 34.8699H81.5643V40.2974H58.8104L52.219 48.1673H36.4176V94.5725H97.8172V56.5799H103.235V94.5725C103.235 96.0198 102.678 97.2862 101.564 98.3717C100.451 99.4572 99.2017 100 97.8172 100H36.4176ZM67.1174 86.7931C71.4515 86.7931 75.0933 85.3156 78.0429 82.3606C80.9925 79.4056 82.4673 75.727 82.4673 71.3247C82.4673 66.9827 80.9925 63.3492 78.0429 60.4244C75.0933 57.4996 71.4515 56.0372 67.1174 56.0372C62.7231 56.0372 59.0662 57.4996 56.1467 60.4244C53.2272 63.3492 51.7675 66.9827 51.7675 71.3247C51.7675 75.727 53.2272 79.4056 56.1467 82.3606C59.0662 85.3156 62.7231 86.7931 67.1174 86.7931ZM67.1174 81.3656C64.228 81.3656 61.8503 80.4157 59.9842 78.5161C58.1181 76.6165 57.1851 74.2193 57.1851 71.3247C57.1851 68.4903 58.1181 66.1384 59.9842 64.2689C61.8503 62.3994 64.228 61.4647 67.1174 61.4647C69.9466 61.4647 72.3093 62.3994 74.2054 64.2689C76.1016 66.1384 77.0497 68.4903 77.0497 71.3247C77.0497 74.2193 76.1016 76.6165 74.2054 78.5161C72.3093 80.4157 69.9466 81.3656 67.1174 81.3656Z"
							fill="#CECECE"
						/>
					</svg>
				</div>
			<?php endif; ?>

			</label>
			<input type="hidden" value="<?= $row["img"] ?>" name="image_original">
			<input
				id="customer-image-<?=$row["id"]?>"
				class="d-none detail-item-img detail-input-img"
				type="file"
				accept="image/*"
				disabled="true"
				name="image"
				value="<?= $row["img"] ?>"
			/>		
		</div>
		
		<div class="mb-3 flex_center">
			<button class="add-detail-btn modify-detail-btn me-3 transition" type="submit ">
				修改會員資料
			</button>
			<button
				class="save-detail-btn me-3 submit-img transition"
				type="submit  "
				disabled="true"
			>
				儲存資料
			</button>
			<button class="add-detail-btn back-recipe-de transition">返回會員列表</button>
		</div>
	</form>
</div>
