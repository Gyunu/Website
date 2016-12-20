<section class="article__container" rv-class-loading="state | state 'loading'" rv-class-loaded="state | state 'loaded'" rv-if="data | hasLength">
  <header>
    <h1 class="article__header">Articles</h1>
    <div class="buttons">
      <a href="/articles" class="btn btn--green"><span class="ion ion-link"></span>Go to articles page</a>
    </div>
  </header>
  <div class="col s-12 m-12 l-6 article" rv-each-article="data">
    <div class="col s-12 m-8 index-2 article__content">
      <h1 class="article__title" rv-html="article.content.title"></h1>
      <div class="article__meta">
        <time class="article__published-at" rv-datetime="article.content.published_at">Published At <span rv-html="article.content.published_at"></span></time> <span class="article__author">by <span rv-html="article.content.author"></span></span>
      </div>
      <p class="article__summary leader" rv-html="article.content.summary"></p>
      <a rv-href="article.url" class="btn btn--blue" rv-html="'Read More' | icon 'eye'"></a>
    </div>
    <img rv-src="article.files.0.resized.medium" class="article__image s-12 m-4 index-1"></img>
  </div>
  <div class="loading" rv-show="state | state 'loading'"><span class="loading__icon ion ion-load-d"></span></div>
</section>
