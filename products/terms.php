<?php
	require('../includes/DB.php');
	$db = new DB();
	$id = $_GET['id'];
	$purchase_url = "add_to_cart.php?id=$id";
	// $product = $db->getProduct($id);
	// $images = $db->getImages($id);
	// $details = $db->getDetails($id);
	// $main_img_url = $images[0]['image_url'];
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
					<h1 class="dark_text">Terms of Service Agreement</h1>
					<img src="../images/rs_logo.png" alt="Ryno Stand Electrician Tools" class="about_text_img"/>
				</div>
			</div>
			
		</div>
	</section>
	<section id="terms_section_1">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-5">
					<h2 class="dark_text">Terms of Service Agreement</h2>
					<p class="dark_text">
						By checking this box I am verifying that I have watched the instructional video and understand how to safely use the RynoStand while also adhering to all ANSI laws or job site safety. 
					</p>
					<p class="dark_text">
						Also, the RynoStand and the other products from Brink Industries are on site tools only. The RynoStand should never be in the receiver hitch of any vehicle while the vehicle is moving from one job site to the other.
					</p>
					<a href=<?= $purchase_url ?> class="dark_clear_btn">I Agree</a>
				</div>
				<div class="col-xs-12 col-md-7">
					<div class="embed-responsive embed-responsive-16by9">
					  <iframe src="https://www.youtube.com/embed/ouwL6WbTtcY" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

<?php
	require('../footer.php');
?>

