<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: data-dojo-config</title>
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
		<?php
			include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
			Utils::printClaroCss();
		?>
		<style>
			#dialog { min-width: 200px; }
		</style>
	</head>
	<body class="claro">
		<h1>Demo: data-dojo-config</h1>
		<div id="dialog" data-dojo-type="dijit/Dialog" data-dojo-props="title: 'data-dojo-config / dojo.config'"></div>
		<?php
			include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
			Utils::printDojoScript("has:{'dojo-debugging-messages':true}, foo: 'bar', async: 1, isDebug: 1");
		?>
		<script>
			// Require the registry, parser, Dialog, and wait for domReady
			require(["dijit/registry", "dojo/parser", "dojo/json", "dojo/_base/config", "dijit/Dialog", "dojo/domReady!"]
			, function(registry, parser, JSON, config) {
				// Explicitly parse the page
				parser.parse();
				// Find the dialog
				var dialog = registry.byId("dialog");
				// Set the content equal to what dojo/_base/config is
				dialog.set("content", '<pre>' + JSON.stringify(config, null, '\t') + '</pre>');
				// Show the dialog
				dialog.show();
			});
		</script>
	</body>
</html>
