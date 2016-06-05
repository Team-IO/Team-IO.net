<?php 

require_once 'github-api.php';

use Milo\Github;

class CacheControl {
	
	public $content = '';
	
	public function __construct($id, $url) {
		$this->content = apcu_fetch('cachecontrol_' . $id);
		if(!$this->content) {
			$api = new Github\Api ();
			$response = $api->get ( $url );
			$this->content = $api->decode ( $response );
			apcu_store('cachecontrol_' . $id, $this->content, 300);
		}
	}
}

function get_size_display($size) {
	if($size > 1024*1024) {
		$size = round($size / (1024*1024), 2).' MB';
	} else if($size > 1024) {
		$size = round($size / 1024, 2).' KB';
	} else {
		$size = $size.' B';
	}
	return $size;
}

function startsWith($haystack, $needle) {
	// search backwards starting from haystack length characters from the end
	return $needle === "" || strrpos($haystack, $needle, - strlen($haystack)) !== FALSE;
}

function endsWith($haystack, $needle) {
	// search forward starting from end minus needle length characters
	return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}
?>