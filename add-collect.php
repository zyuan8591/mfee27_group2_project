<div class="add-collect-page recipe-datail flex_center invisible">
	<div class="cover-detail collect-main position_abs"></div>
	<div
		class="container-detail position-rel modify-ricepe-detail-form submit-from"
	>
		
		<h2 class="recipe-title text-center collect-header">Add Favorites</h2>
	<i class="fa-solid fa-xmark position_abs add-close-btn"></i>
		
	<!-- add-recipe-collect -->
    <form class="text-center px-4 mb-3" action="add-recipe-update.php" method="post">
		<div class="border p-3">
			<input type="hidden" value="<?=$user_id?>" name="recipe-user-id">
			<div class="add-main-title">新增食譜收藏</div>
			<table class="add-recipe-table mb-3">
				<tr>
					<th>會員名稱</th>
					<td class="px-4"><?=$rowUser["name"]?></td>
				</tr>
			</table>
			<table class="add-recipe-table mb-3">
				<tr>
					<th>食譜名稱</th>
					<td class="px-4">
						<select class="form-select" name="add-recipe">  
							<option selected value="0">點選表單選擇食譜</option>
							<?php foreach($rowsAddRecipe as $addRecipeItems): ?>    
							<option value="<?=$addRecipeItems["id"]?>"><?=$addRecipeItems["name"]?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
			</table>
			<button class="btn btn-dark addBtn-recipe" type="submit">送出</button>
		</div>
	</form>
<!-- ------ -->

<!-- add-product-collect -->
<form class="text-center px-4" action="add-product-update.php" method="post">
		<div class="border p-3">
			<input type="hidden" value="<?=$user_id?>" name="product-user-id">
			<div class="add-main-title">新增商品收藏</div>
			<table class="add-recipe-table mb-3">
				<tr>
					<th>會員名稱</th>
					<td class="px-4"><?=$rowUser["name"]?></td>
				</tr>
			</table>
			<table class="add-recipe-table mb-3">
				<tr>
					<th class="text-nowrap">商品名稱</th>
					<td class="px-4">
						<select class="form-select" name="add-product">  
							<option selected>點選表單選擇商品</option>
							<?php foreach($rowsAddProduct as $addProductItems): ?>    
							<option value="<?=$addProductItems["id"]?>"><?=$addProductItems["name"]?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
			</table>
			<button class="btn btn-dark addBtn-recipe" type="submit">送出</button>
		</div>
	</form>
<!-- ------ -->	
	</div>		
</div>

