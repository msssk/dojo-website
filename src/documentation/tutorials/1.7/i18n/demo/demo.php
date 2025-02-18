<?php include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/',dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php') ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Demo: i18n</title>
		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
		<?php Utils::printClaroCss() ?>
	</head>
	<body class="claro">
		<h1>Demo: Internationalization</h1>
		<h2>Change locale</h2>
		<ul>
			<li><a href="?en-us">en-us</a></li>
			<li><a href="?de-de">de-de</a></li>
			<li><a href="?fr-ca">fr-ca</a></li>
			<li><a href="?pt-pt">pt-pt</a></li>
			<li><a href="?es-es">es-es</a></li>
			<li><a href="?zh-cn">zh-cn</a></li>
		</ul>
		<p>Leave your cursor over the various editor buttons in order to see the internationalized tooltips</p>
		<div id="editor" data-dojo-type="dijit.Editor" data-dojo-props="style: 'height: 100px; width: 400px;', height: 100, width: 400"></div>
		<?php Utils::printDojoScript("async: true, parseOnLoad: true, locale: location.search.substring(1)") ?>
		<script>
			require(["dijit/Editor", "dojo/parser", "dojo/i18n", "dojo/domReady!"]);
		</script>
	</body>
</html>
