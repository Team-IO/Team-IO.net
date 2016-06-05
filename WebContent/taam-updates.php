<?php
header("Content-type: application/json");

require_once 'lib/util.php';
require_once 'lib/releases.php';

$promoFile = getReleasesPromoFile('taam');

echo json_encode($promoFile);

?>