<?php include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/',dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php') ?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: More Dijit Buttons</title>
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
		<?php Utils::printClaroCss() ?>
		<style>
			.dj_ie8 .dijitMenuItemLabel {
				position: static;
			}
		</style>
	</head>
	<body class="claro">
		<h1>Demo: More dijit/form/Button(s)!</h1>
		<p>
			In this demo, we see three other types of buttons included in the
			<code>dijit/form</code> namespace.
		</p>
		<div>
			<button id="toggle" data-dojo-type="dijit.form.ToggleButton"
				data-dojo-props="iconClass:'dijitCheckBoxIcon', checked:true">
				Toggle
			</button>

			<div id="combo" data-dojo-type="dijit.form.ComboButton"
				data-dojo-props="
					optionsTitle:'Save Options',
					iconClass:'dijitIconFile',
					onClick:function(){ console.log('Clicked ComboButton'); }">
				<span>Combo</span>
				<div id="saveMenu" data-dojo-type="dijit.Menu">
					<div data-dojo-type="dijit.MenuItem"
						data-dojo-props="
							iconClass:'dijitEditorIcon dijitEditorIconSave',
							onClick:function(){ console.log('Save'); }">
						Save
					</div>
					<div data-dojo-type="dijit.MenuItem"
						data-dojo-props="onClick:function(){ console.log('Save As'); }">
						Save As
					</div>
				</div>
			</div>

			<div id="dropDown" data-dojo-type="dijit.form.DropDownButton"
				data-dojo-props="iconClass:'dijitIconApplication'">
				<span>DropDown</span>
				<div data-dojo-type="dijit.TooltipDialog">
					This is a TooltipDialog. You could even put a form in here!
				</div>
			</div>
		</div>
		<?php Utils::printDojoScript("isDebug: true, async: true, parseOnLoad: true") ?>
		<script>
			// load requirements for declarative widgets in page content
			require(["dojo/parser", "dijit/form/ToggleButton", "dijit/form/ComboButton", "dijit/Menu", "dijit/MenuItem", "dijit/form/DropDownButton", "dijit/TooltipDialog"]);
		</script>
	</body>
</html>
