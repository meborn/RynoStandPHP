<?php
	require('../includes/DB.php');
	$db = new DB();
	$id = $_GET['id'];
	$product = $db->getProduct($id);
	$images = $db->getImages($id);
	$details = $db->getDetails($id);
	$main_img_url = $images[0]['image_url'];
	$terms_url = "terms.php?id=$id";
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
					<h1 class="dark_text"><?= $product['name'] ?></h1>
					<img src="../images/rs_logo.png" alt="Ryno Stand Electrician Tools" class="about_text_img"/>
				</div>
			</div>
			
		</div>
	</section>
	<section id="product_show_section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-7">
					<img src=<?= $main_img_url ?> alt="Ryno Vise Electrician Tools" id="product_main_img"/>
					<?php foreach($images as $i):?>
						<?php
							$img_url = $i['image_url'];
						?>

						<img src=<?= $img_url ?> alt="Ryno Vise Electrician Tools" class="thumb"/>
					<?php endforeach ?>
				</div>
				<div class="col-xs-12 col-md-5">
					<h2 class="dark_text"><?= $product['name'] ?></h2>
					<h4 class="dark_text">Description</h4>
					<p class="dark_text">
						<?= $product['description'] ?>
					</p>
					<?php if($product['type'] === 'Package'):?>
						<h4 class="dark_text"><?= $product['name'] ?> Package Includes</h4>
						<ul>
							<?php foreach($details as $d):?>
								<li>(<?= $d['num'] ?>) <?= $d['name'] ?></li>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
					<p class="lead dark_text">$<?= $product['price'] ?></p>
					<a href=<?= $terms_url ?> class="dark_clear_btn">Buy Now</a>
				</div>
			</div>
		</div>
	</section>
</body>

<?php
	require('../footer.php');
?>
<script>
    $(document).ready(function() {
        $('.thumb').each(function() {
            $(this).click(function() {
                var img = $(this)
                $('#product_main_img').attr("src", img.attr("src"));
            });
        });
    });
</script>