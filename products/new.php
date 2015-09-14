<?php
	require('../includes/DB.php');
	require('../header.php');
?>
<body>
	<?php
		require('../nav.php');
	?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<form method="post" action="create.php">
					<div class="form-group">
						<label for="name">Product Name</label>
						<input type="text" name="name" id="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="description">Product Description</label>
						<textarea name="description" rows="5" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="image_url">Image Path</label>
						<input type="text" name="image_url" class="form-control">
					</div>
					<div class="form-group">
						<label for="price">Price</label>
						<input type="number" name="price" size="4" step="0.01">
					</div>
					<div class="form-group">
						<label for="type">Product Type</label>
						<select name="type" class="form-control">
							<option value="Package">Package</option>
							<option value="Accessory">Accessories</option>
						</select>
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