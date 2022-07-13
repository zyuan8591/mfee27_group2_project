<?php if (isset($_SESSION["add"]["id"])):?>
		<?php if($_SESSION["add"]["id"]==1):?>
			<script type="text/javascript">
			Toastify({
				text: "新增商品成功",
				duration: 3000,
				destination: "https://github.com/apvarun/toastify-js",
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
		    <?php unset($_SESSION["add"]); ?>
		<?php endif;?>
<?php endif;?>

	<?php if (isset($_SESSION["add"]["id"])):?>
		<?php if($_SESSION["add"]["id"]==2):?>
			<script type="text/javascript">
			Toastify({
				text: "新增商品失敗",
				duration: 3000,
				destination: "https://github.com/apvarun/toastify-js",
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
		    <?php unset($_SESSION["add"]); ?>
		<?php endif;?>
	<?php endif;?>

    <?php if (isset($_SESSION["revise"]["id"])):?>
		<?php if($_SESSION["revise"]["id"]==1):?>
			<script type="text/javascript">
			Toastify({
				text: "修改成功",
				duration: 3000,
				destination: "https://github.com/apvarun/toastify-js",
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
		    <?php unset($_SESSION["revise"]); ?>

		<?php endif;?>
	<?php endif;?>

    <?php if (isset($_SESSION["revise"]["id"])):?>
		<?php if($_SESSION["revise"]["id"]==2):?>
			<script type="text/javascript">
			Toastify({
				text: "修改失敗",
				duration: 3000,
				destination: "https://github.com/apvarun/toastify-js",
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
		    <?php unset($_SESSION["revise"]); ?>
		<?php endif;?>
	<?php endif;?>

	<?php if (isset($_SESSION["list"]["id"])):?>
		<?php if($_SESSION["list"]["id"]==1):?>
			<script type="text/javascript">
			Toastify({
				text: "商品已下架",
				duration: 3000,
				destination: "https://github.com/apvarun/toastify-js",
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
		    <?php unset($_SESSION["list"]); ?>

		<?php endif;?>
	<?php endif;?>

    <?php if (isset($_SESSION["list"]["id"])):?>
		<?php if($_SESSION["list"]["id"]==2):?>
			<script type="text/javascript">
			Toastify({
				text: "商品已上架",
				duration: 3000,
				destination: "https://github.com/apvarun/toastify-js",
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
		    <?php unset($_SESSION["list"]); ?>
		<?php endif;?>
	<?php endif;?>

