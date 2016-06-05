<?php

require_once 'lib/util.php';
require_once 'lib/releases.php';

$promoFile = getReleasesPromoFile('taam', $modified);

$cache_time = cache_time;

header("Content-type: application/json");
header("Cache-Control: max-age=$cache_time");
header("Last-Modified: $modified");

echo json_encode($promoFile);

?>