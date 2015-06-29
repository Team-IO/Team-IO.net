<?php 

require_once 'github-api.php';

use Milo\Github;

class CacheControl {
	
	public $content = '';
	
	public function __construct($id, $url) {
		$this->content = apc_fetch('cachecontrol_' . $id);
		if(!$this->content) {
			$api = new Github\Api ();
			$response = $api->get ( $url );
			$this->content = $api->decode ( $response );
			apc_store('cachecontrol_' . $id, $this->content, 300);
		}
	}
}

function get_size_display($size) {
	if($size > 1024*1024) {
		$size = round($size / 1024*1024, 2).' MB';
	} else if($size > 1024) {
		$size = round($size / 1024, 2).' KB';
	} else {
		$size = $size.' B';
	}
	return $size;
}
?>