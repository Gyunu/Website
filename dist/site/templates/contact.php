<?php snippet('header') ?>

  <main class="main" role="main">

		<section class="main xs-12">
			<section class="xs-12 p-h-xl p-v-xxxl c">
				<div class="xs-12">
					<h1>Contact</h1>
					<h4><em>Contact me via the form below or email me using the button below</em></h4>
					<a class="leader" href="mailto:<?php echo $site->email() ?>"><?php echo $site->email() ?></a>
				</div>
				<form class="xs-12">
					<fieldset>
						<legend>Your Details</legend>
						<label>Name
							<input type="text" name="name" placeholder="John Smith"/>
						</label>
						<label>Email address
							<input type="email" name="email" placeholder="john.smith@johnsmith.com"/>
						</label>
						<label>Telephone Number
							<input type="tel" name="phone" placeholder="+81-123-456-789"/>
						<label>Company
							<input type="text" name="company" placeholder="John Smith Incorporated."/>
						</label>
					</fieldset>
					<fieldset>
						<legend>Your Message</legend>
						<label>Message
							<textarea name="message"></textarea>
						</label>
					</fieldset>
					<button type="submit" class="btn"><span class="ion ion-paper-airplane"></span> Submit</button>
				</form>
				</section>
			</section>
  </main>

<?php snippet('footer') ?>
