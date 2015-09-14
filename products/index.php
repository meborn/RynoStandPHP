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
	<section id="about_section_1" class="light_bg">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center">
					<h1 class="dark_text">Products</h1>
					<img src="../images/rs_logo.png" alt="Ryno Stand Electrician Tools" class="about_text_img"/>
				</div>
			</div>
			
		</div>
	</section>

	<section id="packages_section" class="light_bg">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="dark_text">Packages</h1>
				</div>
			</div>
			<div class="row">
				<?php foreach($products as $p):?>
					<?php if($p['type'] === 'Package'):?>
						<?php
							$p_id = $p['id'];
							$p_show_url = "show.php?id=$p_id";
						?>
						<div class="col-xs-12 col-sm-6 col-md-4 text-center">
							<div class="thumbnail">
								<img src=<?= $p['image_url'] ?> alt=<?= $p['name'] ?> />
								<div class="caption">
									<h3 class="dark_text"><?= $p['name'] ?></h3>
									<p class="lead dark_text">$<?= $p['price'] ?></p>
									<a href=<?= $p_show_url ?> class="dark_clear_btn">View</a>
								</div>
							</div>
							
							
						</div>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	</section>
	
</body>

<?php
	require('../footer.php');
?>