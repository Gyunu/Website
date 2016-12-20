<section class="text__container" rv-class-loading="state | state 'loading'" rv-class-loaded="state | state 'loaded'" rv-each-text="data">
  <header>
    <h1 class="text__header" rv-html="text.content.title"></h1>
  </header>
  <div class="col s-12 m-12 l-12 text" rv-each-school="data">
    <div class="col s-12 m-12 index-2 text__content">
      <p rv-html="text.content.copy"></p>
    </div>
  </div>
  <div class="loading" rv-show="state | state 'loading'"><span class="loading__icon ion ion-load-d"></span></div>
</section>
