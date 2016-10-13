<?php snippet('header') ?>

  <main class="main" role="main">

		<?php foreach($elements as $element): ?>
			<?php snippet($element->intendedTemplate(), ['data' => $element]) ?>
		<?php endforeach ?>

  </main>

<?php snippet('footer') ?>
