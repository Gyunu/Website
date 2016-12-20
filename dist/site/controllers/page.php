<?php

return function($site, $pages, $page) {

	$results = $site->children()->find('data')->search($page->uid(), 'page')->sortBy('order', 'ASC');
	return [
		'elements' => $results
	];
};
