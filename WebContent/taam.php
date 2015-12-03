<?php
require_once 'lib/util.php';

function title() {
	return 'Taam - Team I/O';
}
function body() {
	?>
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
</article>
<article>
	<h2>Downloads</h2>
	<table>
		<?php

		$cache = new CacheControl('taam_releases', '/repos/Team-IO/taam/releases');
		$releases = $cache->content;
		
		foreach ( $releases as $rel ) {
			$prerelease = $rel->prerelease;
			$split = split(" for ", $rel->name);
			if(count($split) >= 2) {
				$mod_ver = $split[0];
				$mc_ver = $split[1];
			} else {
				$mod_ver = 'N/A';
				$mc_ver = 'N/A';
			}
		?>
		<tr class="release<?php if($prerelease) { echo ' beta'; }?>">
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
				echo "<td>$mod_ver";
				if($prerelease) {
					if(startsWith($mod_ver, '0') || endsWith($mod_ver, 'a')) {
						echo '<br />(alpha)';
					} else {
						echo '<br />(beta)';
					}
				}
				echo "</td><td>$mc_ver</td>";
			?>
			<td>
			<a href="<?php echo $rel->html_url; ?>">Changelog</a>
			</td>
		</tr>
	<?php } ?>
	</table>
</article>
<article>
	<h2>Media</h2>
</article>
<?php
}
require 'template.php';

?>