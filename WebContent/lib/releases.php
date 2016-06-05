<?php 

require_once 'util.php';

class CachedVersionInfo {

	public $mc_version;
	public $latest = null;
	public $recommended = null;
	public $versions = array();
	public $changelog = array();

	public function __construct($mc_version) {
		$this->mc_version = $mc_version;
	}
}

class CachedVersion {
	public $version;
	public $prerelease;
	public $suffix;
	public $changelog_url;
	public $assets;
}


function getReleases($repoName) {
	$cache_id_releases = "{$repoName}_releases";
	$cache_id_versions = "{$repoName}_versions";
	$repo_url = "/repos/Team-IO/$repoName/releases";
	
	// Fetch cached info
	$mc_versions = apcu_fetch($cache_id_versions);
	
	// Rebuild cache if there is no info available
	if($mc_versions == null || isset($_GET['nocache'])) {
		// Get potentially cached release info
		$cache = new CacheControl($cache_id_releases, $repo_url);
		$releases = $cache->content;
	
		$mc_versions = array();
	
		foreach ( $releases as $rel ) {
			$split = explode(" for MC ", $rel->name);
			if(count($split) >= 2) {
				$mod_ver = $split[0];
				$mc_ver = $split[1];
			} else {
				$mod_ver = 'N/A';
				$mc_ver = 'N/A';
			}
	
			// Get version store
			if(!isset($mc_versions[$mc_ver])) {
				$mc_versions[$mc_ver] = new CachedVersionInfo($mc_ver);
			}
			$versionInfoForMCVersion = $mc_versions[$mc_ver];

			// Set detail info for the page display
			$versionInfo = new CachedVersion();
			$versionInfoForMCVersion->versions[] = $versionInfo;
				
			$versionInfo->version = $mod_ver;
			$versionInfo->prerelease = $rel->prerelease;
			$versionInfo->assets = $rel->assets;
			$versionInfo->changelog_url = $rel->html_url;
			
			if($versionInfo->prerelease) {
				if(startsWith($versionInfo->version, '0') || endsWith($versionInfo->version, 'a')) {
					$versionInfo->suffix = 'alpha';
				} else {
					$versionInfo->suffix = 'beta';
				}
			}
	
			// Set information for the promo file
			if($versionInfoForMCVersion->latest == null) {
				$versionInfoForMCVersion->latest = $mod_ver;
			}
			if(!$versionInfo->prerelease) {
				if($versionInfoForMCVersion->recommended == null) {
					$versionInfoForMCVersion->recommended = $mod_ver;
				}
			}
			// Remove \r from the text, as minecraft does not render that. (GitHub delivers \r\n)
			$changelog = str_replace("\r", '', $rel->body);
			// Remove image alt-text & markdown, leaving only the link
			$changelog = preg_replace('/!\\[[a-zA-Z0-9 ._\-\/?&%]*\\]\\((https?:\/\/[[a-zA-Z0-9._\-\/?&%]+)\\)/', '$1', $changelog);//
			$versionInfoForMCVersion->changelog[$mod_ver] = $changelog;
		}
		apcu_store($cache_id_versions, $mc_versions, 300);
	}
	return $mc_versions;
}

function getReleasesPromoFile($repoName) {
	$cache_id_versions_json = "{$repoName}_versions_json";
	
	// Fetch cached info
	$promoFile = apcu_fetch($cache_id_versions_json);
	
	if(!$promoFile || isset($_GET['nocache'])) {
		$mc_versions = getReleases($repoName);
		
		$promoFile = array();
		
		$promoFile['homepage'] = "https://team-io.net/$repoName.php#downloads";
		$promoFile['promos'] = array();
		
		foreach ( $mc_versions as $version ) {
			$promoFile['promos'][$version->mc_version.'-latest'] = $version->latest;
			$promoFile['promos'][$version->mc_version.'-recommended'] = $version->recommended;
		
			$promoFile[$version->mc_version] = $version->changelog;
		}
		apcu_store($cache_id_versions_json, $promoFile, 300);
	}
	return $promoFile;
}