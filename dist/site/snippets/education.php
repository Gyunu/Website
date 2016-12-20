<section class="education__container" rv-class-loading="state | state 'loading'" rv-class-loaded="state | state 'loaded'" rv-if="data | hasLength">
  <header>
    <h1 class="education__header">Education</h1>
  </header>
  <div class="col s-12 m-12 l-12 education" rv-each-school="data">
    <div class="col s-12 m-12 index-2 education__content">
      <h1 class="education__title" rv-html="school.content.school"></h1>
      <div class="education__meta">
        <span>From</span> <time class="education__started-at" rv-datetime="school.content.from"><span rv-html="school.content.to"></span></time> <span>To</span> <span rv-html="school.content.to"></span></time>
      </div>
      <h2 class="education__subject leader" rv-html="school.content.subject"></h2>
			<p class="leader" rv-html="school.content.overview"></p>
			<p rv-html="school.content.description"></p>
			<a class="btn btn--blue" target="_blank" rv-href="school.content.website" rv-html="'View Website' | icon 'eye'"></a>
    </div>
  </div>
  <div class="loading" rv-show="state | state 'loading'"><span class="loading__icon ion ion-load-d"></span></div>
</section>
