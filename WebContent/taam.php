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
</article>
<article>
	<table>
		<?php

		$cache = new CacheControl('taam_releases', '/repos/founderio/edrouteplanner/releases');
		$releases = $cache->content;
		
		foreach ( $releases as $rel ) {
			$prerelease = !$rel->prerelease;
			$split = split('-', 'taam-1.7.10-'.$rel->name);
			$mc_ver = $split[1];
			$mod_ver = $split[2];
		?>
		<tr class="release<?php if($prerelease) { echo ' beta'; }?>">
			<td>
			<?php
			foreach ( $rel->assets as $asset ) {
				echo "<a href=\"$asset->browser_download_url\">$asset->name</a><br />";
				$size = get_size_display($asset->size);
				
				echo "<span class=\"smallgrey\">Size: $size DL: $asset->download_count</span><br />";
			}
			?>
			</td>
			<?php
				echo "<td>$mod_ver";
				if($prerelease) { echo '<br />(beta)'; }
				echo "</td><td>$mc_ver</td>";
			?>
			<td>
			<a href="<?php echo $rel->html_url; ?>">Changelog</a>
			</td>
		</tr>
	<?php } ?>
	</table>
</article>
<?php
}
require 'template.php';

?>