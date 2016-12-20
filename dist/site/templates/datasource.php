<?php
header('Content-type: application/json; charset=utf-8');

foreach($with as $w => $items) {
  $results[$w] = $items;
}

echo json_encode($results);

?>
