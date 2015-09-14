<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$to = 'rynostand@gmail.com';
		$subject = 'RYNOSTAND CONTACT: ';
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$nameErr = "";
		$emailErr = "";
		$messageErr = "";
		$sent = false;
		//Validate name
		if($name != "") {
			if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
				$nameErr .= "Invalid name.";
			}
		}
		else {
			$nameErr .= "Name can't be blank.";
		}
		//Validate email
		if($email != "") {
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr .= "Invalid email.";
			}
		}
		else {
			$emailErr .= "Email can't be blank.";
		}
		//Validate message
		if($message != "") {
			$message = filter_var($message, FILTER_SANITIZE_STRING);
			$message = wordwrap($message, 70, "\r\n") . "\r\n" . "\r\n" . $name . "\r\n" . $email;
		}
		else {
			$messageErr .= "Message can't be blank.";
		}
		//if no errors send message
		if($nameErr === "" && $emailErr === "" && $messageErr === "") {
			$subject .= $name;
			$sent = mail($to, $subject, $message);
		}
	}

	require('header.php');
?>

<body>
	<?php
		require('nav.php');
	?>
	<section id="about_section_1" class="light_bg">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center">
					<h1 class="dark_text">Contact</h1>
					<img src="images/rs_logo.png" alt="Ryno Stand Electrician Tools" class="about_text_img"/>
				</div>
			</div>
			
		</div>
	</section>
	<section id="contact_section_1" class="light_bg">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<p class="lead dark_text sans_serif_lite">
						Here at Brink Industries, home of the RynoStand, customer satisfaction is our #1 goal. Please feel free to email, call, or fax us with any questions or concerns you may have. Or simply leave a message with us below and we will try and respond within one business day. 
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-7 vcenter pad_top">
					<?php if($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
						<?php if($sent):?>
							<div class="alert alert-success">
								Your message has been sent.
							</div>
						<?php else: ?>
							<div class="alert alert-danger">
								Fix Errors.
							</div>
						<?php endif ?>
					<?php endif ?>
					<form method="post" action="contact.php">
						
						<?php if($nameErr != ""): ?>
							<div class="form-group has-error">
								<label for="name">Name</label>
								<p class="text-danger"><?= $nameErr ?></p>
								<input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" value=<?= $name ?>>
							</div>
						<?php else: ?>
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name">
							</div>
						<?php endif ?>
						
						<?php if($emailErr != ""): ?>
							<div class="form-group has-error">
								<label for="email">Email</label>
								<p class="text-danger"><?= $emailErr ?></p>
								<input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email" value=<?= $email ?>>
							</div>
							<?php else: ?>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email">
							</div>
						<?php endif ?>	
						
						<?php if($messageErr != ""): ?>
							<div class="form-group has-error">
								<label for="message">Message</label>
								<p class="text-danger"><?= $messageErr ?></p>
								<textarea name="message" class="form-control" rows="7" placeholder="How can we help you?" value=<?= $message ?>></textarea>
							</div>
						<?php else: ?>
							<div class="form-group">
								<label for="message">Message</label>
								<textarea name="message" class="form-control" rows="7" placeholder="How can we help you?"></textarea>
							</div>
						<?php endif ?>	
						
						<button type="submit" class="btn btn-default">Send</button>
					</form>
				</div><!--
			--><div class="col-xs-12 col-md-4 col-md-offset-1 vcenter pad_top">
					<p class="lead dark_text sans_serif_lite">
						<span class="glyphicon glyphicon-envelope orange_text" aria-hidden="true"></span> rynostand@gmail.com
					</p>
					<p class="lead dark_text sans_serif_lite">
						<span class="glyphicon glyphicon-phone-alt orange_text" aria-hidden="true"></span> 801.718.8442
					</p>
					<p class="lead dark_text sans_serif_lite">
						<span class="glyphicon glyphicon-print orange_text" aria-hidden="true"></span> 435.627.0466
					</p>
				</div>
			</div>
		</div>
	</section>

</body>

<?php
	require('footer.php');
?>