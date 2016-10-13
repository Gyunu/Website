<?php

	$pages = $page->site()->children()->filter(function($item) {
		return $item->isVisible();
	});

?>

<nav role="navigation" class="navigation index-10">
	<div class="logo navigation__logo col m-2 xl-1">
		<img src="/assets/img/logo-white.svg">
		<h1>gyunu</h1>
	</div>
	<ul class="navigation__list col xs-12 s-10">
		<?php foreach($pages as $page): ?>
			<li class="navigation__page"><a class="navigation__link" href="<?php echo $page->url() ?>"><?php echo $page->title() ?></a></li>
		<?php endforeach ?>
	</ul>


</nav>
