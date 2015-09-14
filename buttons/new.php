<?php
	require('../includes/DB.php');
	$db = new DB();
	$products = $db->getProducts();


	require('../header.php');
?>

<body>
	<?php
		require('../nav.php');
	?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<form method="post" action="create.php">
					<div class="form-group">
						<label for="product_id">Product</label>
						<select name="product_id" class="form-control">
							<?php foreach($products as $p):?>
								<option value=<?= $p['id'] ?> ><?= $p['name'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="url">URL</label>
						<input type="text" name="url" class="form-control">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>

<?php
	require('../footer.php');
?>