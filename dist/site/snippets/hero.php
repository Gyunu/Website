<section class="hero" rv-style="data.files.0.original.url | image" rv-class-loading="state | state 'loading'" rv-class-loaded="state | state 'loaded'">
		<div class="hero__container col col--no-gutter xs-12 s-7 grabbable shadow--xl">
			<h1 class="hero__text" rv-html="data.content.header"></h1>
			<h4 class="hero__leader" rv-html="data.content.subheader"></h4>
			<p class="hero__intro" rv-html="data.content.intro"></p>
			<div class="hero__cta">
				<a rv-href="data.content.href" class="btn btn--blue" rv-html="data.content.button_text | icon 'chatboxes'"></a>
			</div>
		</div>
		<div class="loading" rv-show="state | state 'loading'"><span class="loading__icon ion ion-load-d"></span></div>
</section>
