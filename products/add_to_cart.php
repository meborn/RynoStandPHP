<?php
	require('../includes/DB.php');
	$db = new DB();
	$id = $_GET['id'];
	$product = $db->getProduct($id);
	$images = $db->getImages($id);
	$details = $db->getDetails($id);
	$button = $db->getButton($id);
	$button_url = $button['url'];
	$main_img_url = $images[0]['image_url'];
	require('../header.php');
?>

<body>
	<?php
		require('../nav.php');
	?>
	<section id="add_section_1">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="dark_text">Thank You!</h1>
					<h4 class="dark_text">You can now add this item to your cart</h4>
				</div>
			</div>
		</div>
	</section>
	<section id="add_section_2">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 vcenter">
					<img src=<?= $main_img_url ?> alt="Ryno Stand" />
				</div><!--  
			--><div class="col-xs-12 col-sm-6 col-md-4 vcenter">
					<h4><?= $product['name'] ?></h4>
					<ul>
						<?php foreach($details as $d):?>
							<li>(<?= $d['num'] ?>) <?= $d['name'] ?></li>
						<?php endforeach ?>
					</ul>
					<p class="lead dark_text"><?= $product['price'] ?></p>
				</div><!--
			--><div class="col-xs-12 col-sm-12 col-md-4 vcenter">
					<?php
						$path = "http://localhost/~mneborn/RynoStand99/products/$button_url";
						require("$button_url");
					?>
				</div>
			</div>
		</div>
	</section>

</body>

<?php
	require('../footer.php');
?>

