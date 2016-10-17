<section class="hero index-1" style="background-image: url(<?php echo $data->images()->first()->url() ?>);">
		<h1 class="hero__text">
			<?php echo $data->header(); ?>
		</h1>
		<h4 class="hero__leader">
			<?php echo $data->subheader(); ?>
		</h4>
		<a href="<?php echo $data->button_link() ?>" class="hero__cta btn btn--light">
			<span class="ion ion-chatboxes"></span><?php echo $data->button_text() ?>
		</a>
	</section>
</section>
