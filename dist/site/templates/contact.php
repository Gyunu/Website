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

  <main class="main" role="main">

		<section class="main xs-12">
			<section class="xs-12 p-h-xl p-v-xxxl c">
				<div class="xs-12">
					<h1>Contact</h1>
					<h4><em>Contact me via the form below or email me using the button below</em></h4>
					<a class="leader" href="mailto:<?php echo $site->email() ?>"><?php echo $site->email() ?></a>
				</div>
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
					<button type="submit" class="btn"><span class="ion ion-paper-airplane"></span> Submit</button>
				</form>
				</section>
			</section>
  </main>

<?php snippet('footer') ?>
