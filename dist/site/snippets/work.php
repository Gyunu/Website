<section class="work__container" rv-class-loading="state | state 'loading'" rv-class-loaded="state | state 'loaded'" rv-if="data | hasLength">
  <header>
    <h1 class="work__header">Work Experience</h1>
  </header>
  <div class="col s-12 m-12 l-12 work" rv-each-job="data">
    <div class="col s-12 m-12 index-2 work__content">
      <h1 class="work__title" rv-html="job.content.company"></h1>
      <div class="work__meta">
        <span>From</span> <time class="work__started-at" rv-datetime="job.content.from"><span rv-html="job.content.from"></span></time> <span>To</span> <span rv-html="job.content.to"></span></time>
      </div>
      <h2 class="work__subject leader" rv-html="job.content.position"></h2>
			<p class="leader" rv-html="job.content.overview"></p>
			<p rv-html="job.content.description"></p>
			<a class="btn btn--blue" target="_blank" rv-href="job.content.website" rv-html="'View Website' | icon 'eye'"></a>
    </div>
  </div>
  <div class="loading" rv-show="state | state 'loading'"><span class="loading__icon ion ion-load-d"></span></div>
</section>
