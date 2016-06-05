<?php
require_once 'lib/util.php';
require_once 'lib/releases.php';

function title() {
	return 'Taam - Team I/O';
}

function headerContent() {
?>
<meta name="description" content="Taam - Tech and Accessory Mod" />
<meta name="keywords" content="Taam,Tech and Accessory Mod,Minecraft,GitHub,CurseForge" />

<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@Team_IO_net" />
<meta name="twitter:title" content="Team I/O: Taam" />
<meta name="twitter:description" content="Tech and Accessory Mod" />
<meta name="twitter:image" content="https://team-io.net/static/logo_100dpi_square_blue.png"/>
<?php
}

function body() {
	?>
<article>
		<h1>Want to support this mod?</h1>
		<p>
		Check our <a href="https://www.patreon.com/Team_IO?ty=h">Patreon</a> page!
		</p>
</article>
<article>
	<h1>Taam</h1>
	<p>Presenting: Taam Industries latest collection of gadgets and tools
		for the heavy industry. Join the line of our valued customers and
		found your own factory. Expand your business with the high performance
		conveyor system. Build a production line tailored to your needs. Make
		your factory safe and sound using our collection of building materials
		and utilities.</p>
	<p>Taam is a mod for Minecraft 1.7.10. We add a production line using
		conveyors, machines and appliances, various gadgets, building blocks
		and tools. And there is more on our todo-list! Check the wiki for more
		info.</p>
</article>
<article>
	<a href="https://github.com/Team-IO/taam/wiki"
		onmouseenter="linkByTag(this);" onmouseout="unlink();"
		class="bigbutton"> Wiki </a>
	<a href="https://github.com/Team-IO/taam/issues"
		onmouseenter="linkByTag(this);" onmouseout="unlink();"
		class="bigbutton"> Issues </a>
	<a href="https://github.com/Team-IO/taam"
		onmouseenter="linkByTag(this);" onmouseout="unlink();"
		class="bigbutton"> Repository </a>
	<a href="http://minecraft.curseforge.com/projects/taam"
		onmouseenter="linkByTag(this);" onmouseout="unlink();"
		class="bigbutton"> CurseForge </a>
</article>
<article>
	<a id="milestones"></a>
	<h2>Milestones</h2>
	
	<?php

		function echo_milestone($mile) {
			echo "<a href=\"$mile->html_url\" onmouseenter=\"linkByTag(this);\" onmouseout=\"unlink();\" class=\"milestone bigbutton\"><span class=\"ms_name\">$mile->title<span>";
			echo '<span class="progress_parent"><span class="progress_bar"';
			$progress = 0;
			$total_issues = $mile->closed_issues + $mile->open_issues;
			if($total_issues > 0) {
				$progress = $mile->closed_issues / $total_issues * 100;
			}
			echo " style=\"width: $progress%\"></span></span>";
			echo "<span class=\"ms_stats\">Open Issues: $mile->open_issues Closed Issues: $mile->closed_issues<span></a> ";
		}
	
	
		$cache = new CacheControl('taam_milestones', '/repos/Team-IO/taam/milestones');
		$milestones = $cache->content;

		echo '<h3>Versions:</h3>';
		
		foreach ( $milestones as $mile ) {
			if(0 === strpos($mile->title, 'Version')) {
				echo_milestone($mile);
			}
		}

		echo '<h3>Implementation Phases:</h3>(planned features, not in current version)<br />';
		
		foreach ( $milestones as $mile ) {
			if(0 !== strpos($mile->title, 'Version')) {
				echo_milestone($mile);
			}
		}
		
		?>
		<h3>Current Build Status:</h3>
		<h4>Master (1.7.10):</h4>
		<a href="https://travis-ci.org/Team-IO/taam"><img src="https://travis-ci.org/Team-IO/taam.svg?branch=master" alt="Build Status" /></a>
		<h4>1.8:</h4>
		<a href="https://travis-ci.org/Team-IO/taam"><img src="https://travis-ci.org/Team-IO/taam.svg?branch=1.8" alt="Build Status" /></a>
</article>
<article>
	<a id="downloads"></a>
	<h2>Downloads</h2>
	<table>
		<?php

		$mc_versions = getReleases('taam');
		
		foreach($mc_versions as $mc_version) {
			echo "<tr><th>Minecraft $mc_version->mc_version</th></tr>";
			foreach ( $mc_version->versions as $rel ) {
		?>
		<tr class="release<?php if($rel->prerelease) { echo ' beta'; }?>">
			<td>
			<?php
			foreach ( $rel->assets as $asset ) {
				echo "<a href=\"$asset->browser_download_url\">⇩ $asset->name</a><br />";
				$size = get_size_display($asset->size);
				
				echo "<span class=\"smallgrey\">Size: $size DL: $asset->download_count</span><br />";
			}
			?>
			</td>
			<?php
				echo "<td>$rel->version";
				if($rel->prerelease) {
					echo "<br />($rel->suffix)";
				}
				echo "</td>";
			?>
			<td>
			<a href="<?php echo $rel->changelog_url; ?>">Changelog</a>
			</td>
		</tr>
	<?php }
		}
	?>
	</table>
	<a href="https://team-io.net/taam-updates.php">Machine-Readable Version</a>
</article>
<article>
	<a id="media"></a>
	<h2>Media</h2>
</article>
<?php
}
require 'template.php';

?>