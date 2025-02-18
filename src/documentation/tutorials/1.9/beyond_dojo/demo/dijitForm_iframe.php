<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Demo: Dijit Form widgets
	</title>
	<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen" type="text/css">
	<?php
		include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
		Utils::printClaroCss();
	?>
	<link rel="stylesheet" href="style.css" media="screen" type="text/css">
</head>
<body class="claro" style="margin: 0; padding: 6px; height: 170px; width: 570px;">
	<div data-dojo-type="dijit/form/Form" id="myForm" enctype="multipart/form-data" action="" method="">
		<table style="border: 1px solid #9f9f9f;" cellspacing="10">
			<tr>
				<td>
					<label for="firstname">Name:</label>
				</td>
				<td>
					<input type="text" id="firstname" dojo-data-id="firstname" data-dojo-type="dijit/form/TextBox" name="firstname" trim="true" id="firstname" propercase="true"></input>
				</td>
			</tr>
			<tr>
				<td>
					<label for="dob">Date of birth:</label>
				</td>
				<td>
					<input type="text" dojo-data-id="dob" id="dob" name="dob" data-dojo-type="dijit/form/DateTextBox" value="2011-03-11"></input>
				</td>
			</tr>
			<tr>
				<td>
					<label for="country">Country of Origin:</label>
				</td>
				<td>
					<div data-dojo-id="countryStore" data-dojo-type="dojo/store/JsonRest" data-dojo-props="target:'../resources/countries.json'"></div>
					<select dojo-data-id="country" id="country" name="country"
 						data-dojo-props="store: countryStore"
						data-dojo-type="dijit/form/FilteringSelect"></select>
				</td>
			</tr>
			<tr>
				<td>

				</td>
				<td>
					<button type="submit" data-dojo-type="dijit/form/Button">Submit Form</button>
				</td>
			</tr>
		</table>
	</div>

	<?php
		include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
		Utils::printDojoScript("async: true");
	?>
	<script>
		require([
			"dojo/parser",
			"dijit/form/TextBox",
			"dijit/form/DateTextBox",
			"dijit/form/FilteringSelect",
			"dijit/form/Form",
			"dojo/store/JsonRest",
			"dijit/form/Button",
			"dojo/domReady!"
		], function(parser){
			parser.parse();
		});
	</script>
</body>
</html>
