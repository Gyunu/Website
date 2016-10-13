<?php

$work_places = $page->site()->children()->find('data')->children()->find('work')->children();
$education_places = $page->site()->children()->find('data')->children()->find('education')->children();
$people = $page->site()->children()->find('data')->children()->find('people')->children();
?>
<?php snippet('header') ?>

  <main class="main" role="main">

		<section class="main xs-12">
				<section class="xs-12 p-h-xl p-v-xxxl c">
					<div class="xs-12">
						<?php echo $page->intro()->kt() ?>
						<a class="leader" href="<?php echo $site->github() ?>">Find Me on Github</a>
					</div>
					<div class="xs-12 m-t-xxxl">
						<h1>Education</h1>
						<?php foreach ($education_places as $education): ?>
							<h2 class="inline-block m-b-n"><?php echo $education->school() ?></h2>
							<a href="<?php echo $education->website() ?>">Website</a>
							<div class="block m-t-m m-b-xxl">
								From <strong><time datetime="<?php echo $education->from() ?>"><?php echo DateTime::createFromFormat('Y-m-d', $education->from())->format('F Y') ?></strong></time> to <strong><time datetime="<?php echo $education->to() ?>"> <?php echo DateTime::createFromFormat('Y-m-d', $education->to())->format('F Y') ?></time></strong>
							</div>
							<h2><?php echo $education->subject() ?></h2>
							<p class="leader"><?php echo $education->overview() ?></p>
							<?php echo $education->description()->kt() ?>
						<?php endforeach ?>
					</div>
					<div class="xs-12 m-t-xxxl">
						<h1>About Me</h1>
						<?php foreach($people as $person): ?>
							<p class="m-t-m leader">I'm a <time datetime="<?php echo $person->date_of_birth() ?>">28</time> year old guy from <?php echo $person->hometown() ?> now living in <?php echo $person->current_location() ?>.
							<?php echo $person->description()->kt() ?>
						<?php endforeach ?>
					</div>
				</section>
			</section>
  </main>

<?php snippet('footer') ?>
