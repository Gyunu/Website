<?php

return function($site, $pages, $page, $args) {

  $sort = get('sort', 'ASC');
  $groupBy = get('groupBy', null);
  $data = [];

  if($groupBy) {
    $grouped = $site->children()->find('data')->children()->find($page->uid())->children()->groupBy($groupBy);
    foreach($grouped as $d => $v) {
      $data[] = [
        'name' => $d,
        'data' => $v->toArrayWithFiles()
      ];
    }
  }
  else {
    $data = $site->children()->find('data')->children()->find($page->uid())->children()->sortBy('order', $sort)->toArrayWithFiles();
  }

	return [
		'results' => $data,
	];
};
