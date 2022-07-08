<?php if($_SESSION["addRecipe"]["condition"]==1): ?>
<script type="text/javascript" >
	Toastify({
	text: "成功新增食譜",
	duration: 3000,
	newWindow: true,
	close: true,
	gravity: "bottom", // `top` or `bottom`
	position: "left", // `left`, `center` or `right`
	stopOnFocus: true, // Prevents dismissing of toast on hover
	style: {
		background: "linear-gradient(135deg, rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%)",
	},
	onClick: function(){} // Callback after click
	}).showToast();
</script>
<?php unset($_SESSION["addRecipe"]) ?>
<?php endif; ?>

<?php if($_SESSION["modifyRecipe"]["condition"]==1): ?>
<script type="text/javascript" >
	Toastify({
	text: "成功修改食譜",
	duration: 3000,
	newWindow: true,
	close: true,
	gravity: "bottom", // `top` or `bottom`
	position: "left", // `left`, `center` or `right`
	stopOnFocus: true, // Prevents dismissing of toast on hover
	style: {
		background: "linear-gradient(135deg, rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%)",
	},
	onClick: function(){} // Callback after click
	}).showToast();
</script>
<?php unset($_SESSION["modifyRecipe"]) ?>
<?php endif; ?>

<?php if($_SESSION["recipeOnoffShelf"]["condition"] == 1): ?>
<script type="text/javascript" >
	Toastify({
	text: "成功上架食譜",
	duration: 3000,
	newWindow: true,
	close: true,
	gravity: "bottom", // `top` or `bottom`
	position: "left", // `left`, `center` or `right`
	stopOnFocus: true, // Prevents dismissing of toast on hover
	style: {
		background: "linear-gradient(135deg, rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%)",
	},
	onClick: function(){} // Callback after click
	}).showToast();
</script>
<?php unset($_SESSION["recipeOnoffShelf"]) ?>
<?php elseif($_SESSION["recipeOnoffShelf"]["condition"] == 2): ?>
<script type="text/javascript" >
	Toastify({
	text: "成功下架食譜",
	duration: 3000,
	newWindow: true,
	close: true,
	gravity: "bottom", // `top` or `bottom`
	position: "left", // `left`, `center` or `right`
	stopOnFocus: true, // Prevents dismissing of toast on hover
	style: {
		background: "linear-gradient(135deg, rgba(69,72,77,1) 0%,rgba(0,0,0,1) 100%)",
	},
	onClick: function(){} // Callback after click
	}).showToast();
</script>
<?php unset($_SESSION["recipeOnoffShelf"]) ?>
<?php endif; ?>