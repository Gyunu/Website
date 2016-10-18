<?php snippet('header') ?>

  <main class="main" role="main">

		<?php foreach($elements as $element): ?>
			<?php if($element->published()->bool()): ?>
				<?php snippet($element->intendedTemplate(), ['data' => $element]) ?>
			<?php endif ?>

		<?php endforeach ?>

  </main>

<?php snippet('footer') ?>
