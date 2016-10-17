<section class="xs-12 p-h-xl p-b-xxxl c index-2">
	<div class="xs-12 m-t-xxxl">
		<h1>Work Experience<h1>
			<h2 class="inline-block m-b-n">
				<?php echo $data->company() ?>
			</h2>
			<a href="<?php echo $data->website() ?>">Website</a>
			<div class="block m-t-m m-b-xxl">
				From <strong><time datetime="<?php echo $data->from() ?>"><?php echo DateTime::createFromFormat('Y-m-d', $data->from())->format('F Y') ?></strong></time> to <strong><time datetime="<?php echo $data->to() ?>"> <?php echo DateTime::createFromFormat('Y-m-d', $data->to())->format('F Y') ?></time></strong>
			</div>
			<h2><?php echo $data->position() ?></h2>
			<p class="leader"><?php echo $data->overview() ?></p>
			<?php echo $data->description()->kt() ?>
	</div>
</section>
