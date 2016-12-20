<section class="project__container cf" rv-class-loading="state | state 'loading'" rv-class-loaded="state | state 'loaded'" rv-if="data | hasLength">
  <header>
    <h1 class="project__header">My Projects</h1>
    <div class="buttons">
      <a href="/projects" class="btn btn--green"><span class="ion ion-link"></span>Go to project page</a>
    </div>
  </header>
  <div class="col s-12 m-6 project" rv-each-project="data">
    <h1 class="project__title" rv-html="project.content.title"></h1>
    <p class="project__summary" rv-html="project.content.summary"></p>
    <a class="btn btn--blue" rv-href="project.content.href" rv-html="project.content.button_text | icon 'social-github'"></a>
  </div>
  <div class="loading" rv-show="state | state 'loading'"><span class="loading__icon ion ion-load-d"></span></div>
</section>
