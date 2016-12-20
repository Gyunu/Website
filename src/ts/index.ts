/// <reference path="../../typings/globals/jquery/index.d.ts"/>
/// <reference path="../../typings/globals/slick-carousel/index.d.ts"/>

import { Popup } from "./base/popup";
import { Modal } from "./base/modal";
import { Ajax } from "./base/ajax";
import { Grabbable } from "./base/grabbable";

import { ControllerState } from "./base/controller";
import { MapController } from "./controllers/mapController";
import { HeroController } from "./controllers/heroController";
import { ProjectListController } from "./controllers/projectListController";
import { ArticleListController } from "./controllers/articleListController";
import { EducationListController } from "./controllers/educationListController";
import { TextController } from "./controllers/textController";
import { WorkListController } from "./controllers/workListController";

import * as $ from 'jquery';
window['$'] = window['jQuery'] = $;

import 'slick-carousel';

declare function require(name:string);

var rivets = require('rivets');

rivets.formatters['='] = function(value, compare) {
  if(compare.indexOf(',') > -1) {
    var found = false;
    var compares = compare.split(',');
    compares.forEach(function(c) {
      if(c === value) {
        found = true;
      }
    });

    return found;
  }
  else {
    return value == compare;
  }
}

rivets.formatters['image'] = function(value) {
  return "background-image: url(" + value + ");";
}

rivets.formatters['icon'] = function(value, icon) {
  return '<span class="ion ion-' + icon + '"></span>' + value;
}

rivets.formatters['hasLength'] = function(value) {
  if(value && value.length > 0) {
    return true;
  }
  else {
    return false;
  }

}

rivets.formatters['state'] = function(state, value) {
  return ControllerState[value.toUpperCase()] === state;
}

let data  = {};
let events = {};

//MAPS
let mapContainers = document.querySelectorAll('[gyunu-map]');
Array.prototype.forEach.call(mapContainers, function(mapContainer) {
  let map = new MapController({
    endpoint: "/api/locations",
    root: mapContainer
  });
  map.getData({groupBy: 'country'});
});

let heroContainers = document.querySelectorAll('.hero');
let heroControllers = [];
Array.prototype.forEach.call(heroContainers, function(heroContainer) {
  let hero = new HeroController({
    endpoint: "/api/hero",
    root: heroContainer
  });

  hero.state = ControllerState.LOADING;
  hero.data = data;
  heroControllers.push(hero);
});


let projectListContainers = document.querySelectorAll('.project__container');
let projectListControllers = [];
Array.prototype.forEach.call(projectListContainers, function(projectListContainer) {
  let projectList = new ProjectListController({
    endpoint: "api/projects",
    root: projectListContainer
  });

  projectList.state = ControllerState.LOADING;
  projectList.data = data;
  projectListControllers.push(projectList);
});

let articleListContainers = document.querySelectorAll('.article__container');
let articleListControllers = [];

Array.prototype.forEach.call(articleListContainers, function(articleListContainer) {
  let articleList = new ArticleListController({
    endpoint: "api/articles",
    root: articleListContainer
  });

  articleList.state = ControllerState.LOADING;
  articleList.data = data;
  articleListControllers.push(articleList);
});

let educationListContainers = document.querySelectorAll('.education__container');
let educationListControllers = [];

Array.prototype.forEach.call(educationListContainers, function(educationListContainer) {
  let educationList = new EducationListController({
    endpoint: "api/education",
    root: educationListContainer
  });

  educationList.state = ControllerState.LOADING;
  educationList.data = data;
  educationListControllers.push(educationList);
});

let textContainers = document.querySelectorAll('.text__container');
let textControllers = [];

Array.prototype.forEach.call(textContainers, function(textContainer) {
  let text = new TextController({
    endpoint: "api/text",
    root: textContainer
  });

  text.state = ControllerState.LOADING;
  text.data = data;
  textControllers.push(text);
});

let workContainers = document.querySelectorAll('.work__container');
let workControllers = [];

Array.prototype.forEach.call(workContainers, function(workContainer) {
  let work = new WorkListController({
    endpoint: "api/work",
    root: workContainer
  });

  work.state = ControllerState.LOADING;
  work.data = data;
  workControllers.push(work);
});


let location = "/datasource" + window.location.pathname;
console.log(location);

Ajax.get(location, function(error, d) {
  console.log(error);
  console.log(d);
  data = d.data;

  heroControllers.forEach(function(hero) {
    console.log(data);
    if(data['hero']) {
      hero.data = data['hero'][0];
      hero.state = ControllerState.LOADED;
    }
  });

  projectListControllers.forEach(function(projectList) {
    if(data['projects']) {
      projectList.data = data['projects'];
      setTimeout(function() {
        projectList.state = ControllerState.LOADED;
      }, 300);
    }
  });

  articleListControllers.forEach(function(articleList) {
    if(data['articles']) {
      articleList.data = data['articles'];
      setTimeout(function() {
        articleList.state = ControllerState.LOADED;
      }, 300);
    }
  });

  educationListControllers.forEach(function(educationList) {
    if(data['education']) {
      educationList.data = data['education'];
      setTimeout(function() {
        educationList.state = ControllerState.LOADED;
      }, 300);
    }
  });

  textControllers.forEach(function(text) {
    if(data['text']) {
      text.data = data['text'];
      setTimeout(function() {
        text.state = ControllerState.LOADED;
      }, 300);
    }
  });

  workControllers.forEach(function(work) {
    if(data['work']) {
      work.data = data['work'];
      setTimeout(function() {
        work.state = ControllerState.LOADED;
      }, 300);
    }
  });


  var node = document.querySelectorAll('.grabbable');
  Array.prototype.forEach.call(node, function(element) {
    let g = new Grabbable(element);
  });

});


let body = document.querySelector('html') as HTMLElement;
let navigation = document.querySelector('.navigation') as HTMLElement;
let navigationButton = document.querySelector('.navigation__button') as HTMLElement;
let oldPosition = [];

navigationButton.addEventListener('click', function(e) {
  body.classList.toggle('nav');
  if(body.classList.contains('nav')) {
    oldPosition = [window.pageXOffset, window.pageYOffset];
    window.scrollTo(0, 0);
  }
  else {
    window.scrollTo(oldPosition[0], oldPosition[1]);
  }
});
