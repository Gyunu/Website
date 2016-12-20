<?php

if(get('contact', false)) {
	$contact = get('contact');
	if(isset($contact['page'])) {
		$name = $contact['page']['name'];
		$email_address = $contact['page']['email'];
		$telephone_number = $contact['page']['phone'];
		$company = $contact['page']['company'];
		$message = $contact['page']['message'];
		//TODO fix zoho.
		$mail = new Email([
			'to' => c::get('email.recipient'),
			'from' => 'hello@gyu.nu',
			'subject' => $name . ' has contacted you',
			'body'    => $message . ' email: ' . $email_address . ' phone: ' . $telephone_number . ' company: ' . $company . ' message: ' . $message,
			'service' => 'mail'
		]);

		if($mail->send()) {}
	}
}

?>

<?php snippet('header') ?>

  <main role="main">

		<section class="p-h-xl">
				<header>
					<h1>Contact me</h1>
					<div class="buttons">
						<a class="btn btn--blue" href="mailto:<?php echo $site->email() ?>"><span class="ion ion-email"></span><?php echo $site->email() ?></a>
					</div>
				</header>
				<form class="xs-12" action="" method="POST">
					<fieldset>
						<legend>Your Details</legend>
						<label>Name
							<input type="text" name="contact[page][name]" placeholder="John Smith"/>
						</label>
						<label>Email address
							<input type="email" name="contact[page][email]" placeholder="john.smith@johnsmith.com"/>
						</label>
						<label>Telephone Number
							<input type="tel" name="contact[page][phone]" placeholder="+81-123-456-789"/>
						<label>Company
							<input type="text" name="contact[page][company]" placeholder="John Smith Incorporated."/>
						</label>
					</fieldset>
					<fieldset>
						<legend>Your Message</legend>
						<label>Message
							<textarea name="contact[page][message]"></textarea>
						</label>
					</fieldset>
					<button type="submit" class="btn btn--green"><span class="ion ion-paper-airplane"></span> Submit</button>
				</form>
		</section>
  </main>

<?php snippet('footer') ?>
