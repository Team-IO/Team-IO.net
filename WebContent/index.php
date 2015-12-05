<?php 

function title() {
	return 'Team I/O';
}

function headerContent() {
?>
<meta name="description" content="We are Team I/O" />
<meta name="keywords" content="Team I/O,Team IO,TeamIO,founderio,Xanderio" />

<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@Team_IO_net" />
<meta name="twitter:title" content="Team I/O" />
<meta name="twitter:description" content="We are Team I/O" />
<meta name="twitter:image" content="https://team-io.net/static/team-io-256.png"/>

<?php
}

function body() {
	?>
			<article>
			<h1>We are Team I/O</h1>
			<div class="io_float_right">
				<a class="twitter-timeline"  href="https://twitter.com/Team_IO_net" data-widget-id="673174316813537280">Tweets von @Team_IO_net </a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          	</div>
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
						<a href="https://github.com/founderio" onmouseenter="linkByTag(this);" onmouseout="unlink();"><img
							src="static/GitHub-Mark.png" alt="GitHub" width="32" height="32" /></a>
						<a href="https://twitter.com/founderio_dhx" onmouseenter="linkByTag(this);" onmouseout="unlink();"><img
							src="static/TwitterLogo.png" alt="Twitter" width="32" height="32" /></a>
					</span>
					<div class="io_tasks">Art Guy, Code Monkey, Technical
						Consultant</div>
				</div>
			</div>
			<div class="io_float_clear"></div>
		</article>
	<?php 
}
require 'template.php';

?>