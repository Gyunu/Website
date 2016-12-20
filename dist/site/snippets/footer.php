<?php

if(get('contact', false)) {
	$contact = get('contact');
	if(isset($contact['footer'])) {
		$name = $contact['footer']['name'];
		$email_address = $contact['footer']['email'];
		$message = $contact['footer']['message'];
		//TODO fix zoho.
		$mail = new Email([
			'to' => c::get('email.recipient'),
			'from' => 'hello@gyu.nu',
			'subject' => $name . ' has contacted you',
			'body'    => $message . ' ' . $email_address,
			'service' => 'mail'
		]);

		if($mail->send()) {}
	}
}

?>

<footer class="footer index-2 bg--black">
			<div class="footer__column col xs-12 m-4">
				<div class="footer__logo col xs-12 m-6">
					<img src="/assets/img/logo-white.svg">
				</div>
				<div class="col xs-12 m-8 col--no-gutter">
					<h2><?php echo $site->footer_title() ?></h2>
				</div>
				<div class="m-12">
					<h4 class="faded"><em><?php echo $site->footer_subtitle() ?></em></h4>
					<p class="faded"><?php echo $site->footer_copy() ?></p>
					<a class="btn btn--blue" href="mailto: <?php echo $site->email() ?>"><span class="ion ion-email"></span>Email me</a>
				</div>
			</div>
			<div class="footer__column col xs-12 m-4">
				<h3>Contact</h3>
				<form class="footer__form" action="" method="POST" >
					<fieldset>
						<legend>Details</legend>
						<label>Your name
							<input name="contact[footer][name]" required type="text" placeholder="John Smith"/>
						</label>
						<label>Your Email address
							<input name="contact[footer][email]" type="email" required placeholder="johnsmith@johnsmith.com"/>
						</label>
						<label>Your Message
							<textarea name="contact[footer][message]"></textarea>
						</label>
					</fieldset>
					<button class="btn btn--green" type="submit"><span class="ion ion-paper-airplane"></span>Submit</button>
				</form>
			</div>
			<div class="footer__column col xs-12 m-4">
				<div class="footer__feed">
					<h3>Articles</h3>
					<h4 class="faded">Sorry, articles aren't available at the moment</h4>
				</div>
			</div>
		</footer>
		<div class="footer__copyright xs-12">Copyright © 2016 <?php echo $site->site_name() ?></div>
		<?php echo css('assets/css/min.css') ?>
		<?php echo js('assets/js/min.js') ?>
	</body>
</html>
