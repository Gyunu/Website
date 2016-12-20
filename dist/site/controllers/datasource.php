<?php

return function($site, $pages, $page, $args) {

  $withs = $page->with()->split(',');

  $sort = get('sort', 'ASC');

  $data = $site->children()->find('data')->children();

  $results = [];
  foreach($data as $d) {

    $r = $d->children()->search($page->uid(), 'page');
    if($r->count()) {
      $results[$d->dirname()] = (array_key_exists($d->dirname(), $d)) ? $results[$d->dirname()] : [];
      $results[$d->dirname()] = $r->toArrayWithFiles();
    }

  }

  $withData = [];

  foreach($withs as $with) {
    $r = $site->children()->find('data')->children()->find($with)->children();
    $withData[$with] = $r->toArrayWithFiles();
  }

	return [
		'results' => $results,
    'with' => $withData
	];
};
