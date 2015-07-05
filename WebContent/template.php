<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo title(); ?></title>
<link rel="stylesheet" type="text/css" href="static/io.css" />
<link rel="stylesheet" type="text/css"
	href="https://fonts.googleapis.com/css?family=Source+Code+Pro:700" />
<link rel="stylesheet" type="text/css"
	href="https://fonts.googleapis.com/css?family=Titillium+Web" />

<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link rel="icon" type="image/x-icon" href="static/team-io-transparent-16.png" />
<link rel="shortcut icon" type="image/x-icon" href="static/team-io-transparent-16.png" />
<link rel="apple-touch-icon" type="image/png" href="static/team-io-256.png" />
<script type="text/javascript">
	var locations = {
		"io" : "cd /io",
		"taam" : "cd /taam",
	}

	function load() {
		if (window.devicePixelRatio == 2) {
			document.getElementById("icon").src="static/team-io-transparent@2x.png";
		}
	}
	
	function linkByKey(key) {
		var cmd = locations[key];
		link(cmd);
	}
	
	function linkByTag(tag) {
		var cmd = "wget \"" + tag.href + "\"";
		link(cmd);
	}
	
	function link(text) {
		document.getElementById("blink").style.display = "none";
		var hidden = document.getElementById("hidden");
		hidden.innerHTML = text;
		hidden.style.display = "inline";
	}

	function unlink() {
		var hidden = document.getElementById("hidden");
		hidden.style.display = "none";
		hidden.innerHTML = "";
		document.getElementById("blink").style.display = "inline";
	}

	function show(id) {
		document.getElementById(id).style.display = "block";
	}

	function hide(id) {
		document.getElementById(id).style.display = "none";
	}
</script>
</head>
<body onload="load();">
	<div id="nav">
		<img id="icon" src="static/team-io-transparent.png" alt="Team I/O"  width="64" height="64" />
		<div id="name">
			Team I/O:~$ <span id="blink">▉</span><span id="hidden"
				style="display: none;"></span>
		</div>
		<div id="name_only">
			Team I/O
		</div>
		<div id="links">
			<a href="index.php" onmouseenter="linkByKey('io');" onmouseout="unlink();">I/O</a>
			<a href="taam.php" onmouseenter="linkByKey('taam');" onmouseout="unlink();">Taam</a>
			<a href="https://github.com/Team-IO" onmouseenter="linkByTag(this);" onmouseout="unlink();">GitHub</a>
			<a href="https://twitter.com/Team_IO_net" onmouseenter="linkByTag(this);" onmouseout="unlink();">Twitter</a>
			<a href="https://www.youtube.com/channel/UCF-9Bc50BpD1tdHHZYYbGkA" onmouseenter="linkByTag(this);" onmouseout="unlink();">YouTube</a>
		</div>
	</div>
	<div id="content">
		<?php body(); ?>
	</div>
</body>
</html>