<section class="xs-12 p-h-xl p-b-xxxl c index-2 bg--white">
	<div class="xs-12">
		<h1>Education</h1>
			<h2 class="inline-block m-b-n">
				<?php echo $data->school() ?>
			</h2>
			<?php if(!$data->website()->isEmpty()): ?>
				<a href="<?php echo $data->website() ?>">
					Website
				</a>
			<?php endif ?>
			<div class="block m-t-m m-b-xxl">
				From <strong><time datetime="<?php echo $data->from() ?>"><?php echo DateTime::createFromFormat('Y-m-d', $data->from())->format('F Y') ?></strong></time> to <strong><time datetime="<?php echo $data->to() ?>"> <?php echo DateTime::createFromFormat('Y-m-d', $data->to())->format('F Y') ?></time></strong>
			</div>
			<h2><?php echo $data->subject() ?></h2>
			<p class="leader"><?php echo $data->overview() ?></p>
			<?php echo $data->description()->kt() ?>
	</div>
</section>
