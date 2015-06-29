<?php 

function title() {
	return 'Team I/O';
}

function body() {
	?>
			<article>
			<h1>We are Team I/O</h1>
			<a href="#" onclick="hide('founderio'); show('Xanderio112'); return false;"
				onmouseenter="hide('founderio'); show('Xanderio112');">
				<img src="https://avatars2.githubusercontent.com/u/6298052?v=3&s=180"
				alt="Xanderio112" width="90" height="90" />
			</a>
			<a href="#" onclick="hide('Xanderio112'); show('founderio'); return false;"
				onmouseenter="hide('Xanderio112'); show('founderio');">
				<img src="https://avatars2.githubusercontent.com/u/6136865?v=3&s=180"
				alt="founderio" width="90" height="90" />
			</a>
			<div class="cv_placeholder">
				<div id="Xanderio112" class="cv" style="display: none">
					<h2>Xanderio112</h2>
					<span class="io_links">
						<a href="https://github.com/Xander112" onmouseenter="linkByTag(this);" onmouseout="unlink();"><img
							src="static/GitHub-Mark.png" alt="GitHub" width="32" height="32" /></a>
						<a href="https://twitter.com/AlexanderSieg" onmouseenter="linkByTag(this);" onmouseout="unlink();"><img
							src="static/TwitterLogo.png" alt="Twitter" width="32" height="32" /></a>
					</span>
					<div class="io_tasks">Recipe Guru, Tweak Pro, Modding
						Community Consultant</div>
				</div>
				<div id="founderio" class="cv" style="display: none">
					
					
					<h2>founderio</h2>
					<span class="io_links">
						<a href="https://github.com/founderio/" onmouseenter="linkByTag(this);" onmouseout="unlink();"><img
							src="static/GitHub-Mark.png" alt="GitHub" width="32" height="32" /></a>
						<a href="https://twitter.com/founderio_dhx" onmouseenter="linkByTag(this);" onmouseout="unlink();"><img
							src="static/TwitterLogo.png" alt="Twitter" width="32" height="32" /></a>
					</span>
					<div class="io_tasks">Art Guy, Code Monkey, Technical
						Consultant</div>
				</div>
			</div>
		</article>
	<?php 
}
require 'template.php';

?>