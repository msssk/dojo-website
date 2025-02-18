<?php include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/',dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php') ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: Dojo Logo</title>
		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
		<?php Utils::printClaroCss() ?>
	</head>
	<body class="claro">
		<h1>Demo: Dojo Logo</h1>

		<div style="padding:10px 0 20px 0;">

			<button data-dojo-type="dijit.form.Button" data-dojo-props="onClick:rotateLogo">Rotate Logo</a>

			<button data-dojo-type="dijit.form.Button" data-dojo-props="onClick:enlargeLogo">Enlarge Logo</a>

			<button data-dojo-type="dijit.form.Button" data-dojo-props="onClick:shrinkLogo">Shrink Logo</a>

			<button data-dojo-type="dijit.form.Button" data-dojo-props="onClick:skewUp">Skew Up</button>

			<button data-dojo-type="dijit.form.Button" data-dojo-props="onClick:skewDown">Skew Down</button>

			<button data-dojo-type="dijit.form.Button" data-dojo-props="onClick:animateStrokes">Animate Strokes</button>

			<button data-dojo-type="dijit.form.Button" data-dojo-props="onClick:animateFills">Animate Fill</button>

			<button data-dojo-type="dijit.form.Button" data-dojo-props="onClick:beautifyFills">Beautify Fill - Red</button>

			<button data-dojo-type="dijit.form.Button" data-dojo-props="onClick:wackyMovement">Random Chaos!</button>

		</div>

		<div id="surfaceElement" style="border:1px solid #ccc;width:1100px;height:700px;"></div>

		<?php Utils::printDojoScript("isDebug: true, async: true,  parseOnLoad: true") ?>
		<script>

			// Keep track of all shapes
			allShapes = [];

			// Require the dojox.gfx resource
			require(["dojox/gfx", "dojox/gfx/fx", "dojo/_base/array", "dijit/form/Button", "dojo/parser", "dojo/domReady!"],
			function(gfx, gfxFx, arrayUtil) {

				// Function to rotate logo
				rotateLogo = function() {
					new gfxFx.animateTransform({
					    duration: 700,
					    shape: allGroup,
					    transform: [{
					        name: 'rotategAt',
					        start: [0, 550, 350], // Starts at 0 degree rotation
					        end: [360, 550, 350]  // Ends at 360 degrees
					    }]
					}).play();
				};

				// Function to enlarge Logo
				enlargeLogo = function() {
					allGroup.applyTransform(gfx.matrix.scale({ x: 2, y: 2 }));
				};

				// Function to shrink Logo
				shrinkLogo = function() {
					allGroup.applyTransform(gfx.matrix.scale({ x: 0.5, y: 0.5 }));
				};

				// Skewing functions
				skewUp = function() {
					allGroup.applyTransform(gfx.matrix.skewYg(-20));
				};

				skewDown = function() {
					allGroup.applyTransform(gfx.matrix.skewYg(20));
				};

				// Animate strokes
				animateStrokes = function() {
					arrayUtil.forEach(allShapes, function(item) {
						new gfxFx.animateStroke({
							duration: 1200,
							shape: item,
							color: { end: "green" },
							width: { end: 15 },
							join:  { values: ["miter", "bevel", "round"] },
							onEnd: function() {
								new gfxFx.animateStroke({
									duration: 1200,
									shape: item,
									color: { end: "#000"},
									width: { end: 1 },
									join:  { values: ["round", "bevel", ""] }
								}).play();
							}
						}).play();
					});
				};

				// Animate fills
				animateFills = function() {
					arrayUtil.forEach(allShapes, function(item) {
						new gfxFx.animateFill({
							duration: 1200,
							shape: item,
							color: { start: "black", end: "green" },
							onEnd: function() {
								new dojox.gfx.fx.animateFill({
									duration: 1200,
									shape: item,
									color: { end: "black" }
								}).play();
							}
						}).play();
					});
				};

				// Create decent Fill
				beautifyFills = function() {
					arrayUtil.forEach(allShapes, function(item) {
						item.setFill(redFill).setStroke("#a70017");
					});
				};

				// Wacky animations
				wackyMovement = function() {
					arrayUtil.forEach(allShapes, function(shape) {
						var rand1 = Math.floor(Math.random() * 700);
						var rand2 = Math.floor(Math.random() * 700);

						new gfxFx.animateTransform({
						    duration: Math.floor(Math.random() * 2000),
						    shape: shape,
						    transform: [{
						        name: 'rotategAt',
						        start: [0, rand1, rand2], // Starts at 0 degree rotation
						        end: [720, rand1, rand2]  // Ends at 360 degrees
						    }]
						}).play();
					});
				};

				// Create a GFX surface
				// Arguments:  node, width, height
				surface = gfx.createSurface("surfaceElement", 1100, 700);

				// Regular fill
				regularFill = { type: "linear", x1: 0, y1: 0, x2: 0, y2: 900, colors: [{ offset: 0, color: "#555"},{ offset: 1, color: "#000"}] };
				redFill = { type: "linear", x1: 0, y1: 0, x2: 0, y2: 900, colors: [{ offset: 0, color: "#f3001f"},{ offset: 1, color: "#a40016"}] };

				// Tiny letter "t" in "toolkit"
				var letterToolkitT = surface.createPath("M826.698,536.736v11.722h12.71v6.758h-12.71v26.25c0,6.065,1.718,9.483,6.659,9.483    c2.427,0,3.834-0.203,5.147-0.61l0.406,6.759c-1.721,0.621-4.439,1.211-7.876,1.211c-4.145,0-7.466-1.404-9.575-3.729    c-2.429-2.729-3.442-7.062-3.442-12.82v-26.555h-7.576v-6.756h7.576v-8.996L826.698,536.736z").setFill(regularFill).setStroke("#000");

				// "o"
				var letterToolkitO1 = surface.createPath("M868.708,598.43c-13.119,0-23.418-9.695-23.418-25.142c0-16.354,10.801-25.938,24.225-25.938    c14.039,0,23.525,10.196,23.525,25.036c0,18.175-12.623,26.05-24.229,26.05h-0.103V598.43L868.708,598.43z M869.115,591.764    c8.481,0,14.846-7.975,14.846-19.089c0-8.267-4.146-18.686-14.643-18.686c-10.396,0-14.931,9.694-14.931,18.976    c0,10.717,6.052,18.783,14.638,18.783h0.09V591.764L869.115,591.764z").setFill(regularFill).setStroke("#000");

				// "o"
				var letterToolkitO2 = surface.createPath("M924.162,598.43c-13.119,0-23.406-9.695-23.406-25.142c0-16.354,10.801-25.938,24.213-25.938    c14.039,0,23.517,10.196,23.517,25.036c0,18.175-12.611,26.05-24.216,26.05h-0.106L924.162,598.43L924.162,598.43z     M924.574,591.764c8.487,0,14.834-7.975,14.834-19.089c0-8.267-4.129-18.686-14.638-18.686c-10.395,0-14.94,9.694-14.94,18.976    c0,10.717,6.063,18.783,14.643,18.783h0.103L924.574,591.764L924.574,591.764z").setFill(regularFill).setStroke("#000");

				// "l"
				var letterToolkitL = surface.createPath("M959.734,525.641h8.873v71.672h-8.873V525.641z").setFill(regularFill).setStroke("#000");

				// "k"
				var letterToolkitK = surface.createPath("M992.453,570.868h0.197c1.207-1.72,2.832-3.837,4.235-5.552l14.455-16.859h10.592l-18.883,20.086    l21.506,28.771h-10.801l-16.746-23.418l-4.541,5.043v18.377h-8.889v-71.676h8.889v45.229L992.453,570.868L992.453,570.868z").setFill(regularFill).setStroke("#000");

				// "i"
				var letterToolkitI = surface.createPath("M1036.886,540.172c-3.217,0-5.336-2.527-5.336-5.443c0-3.131,2.222-5.555,5.556-5.555    c3.215,0,5.452,2.424,5.452,5.555c0,2.916-2.118,5.443-5.555,5.443H1036.886z M1032.656,597.312v-48.854h8.877v48.854H1032.656z").setFill(regularFill).setStroke("#000");

				// "t"
				var letterToolkitT2 = surface.createPath("M1066.992,536.736v11.722h12.715v6.758h-12.715v26.25c0,6.065,1.715,9.483,6.662,9.483    c2.414,0,3.836-0.203,5.149-0.61l0.396,6.759c-1.709,0.621-4.435,1.211-7.869,1.211c-4.139,0-7.473-1.404-9.594-3.729    c-2.408-2.729-3.435-7.062-3.435-12.82v-26.555h-7.563v-6.756h7.563v-8.996L1066.992,536.736z").setFill(regularFill).setStroke("#000");

				// Big show
				var letterDojo = surface.createPath("M694.594,104.102v60.604h40.403v-60.604H694.594z M694.998,471.96   c-0.812,17.886-11.512,56.267-45.76,80.509l26.369,36.766c0,0,62.211-66.451,59.391-114.733V184.906h-40.4L694.998,471.96z    M1046.902,335.198c0,73.13-60.609,121.206-121.207,121.206c-70.703,0-118.781-60.604-118.781-121.206   c0-65.651,53.125-118.778,118.781-118.778C998.82,216.419,1046.902,277.023,1046.902,335.198z M1087.302,335.198   c0-85.854-68.278-159.182-161.606-159.182c-65.656,0-141.411,40.403-159.185,136.359v48.076c0,5.054,2.623,15.148,5.051,22.625   c25.251,80.809,98.578,113.732,154.134,113.732C1011.544,496.811,1087.302,428.531,1087.302,335.198z M280.47,94v126.057v71.61   v89.591c-18.989,46.672-65.653,75.151-112.322,75.151c-70.703,0-118.78-60.604-118.78-121.206   c0-65.651,53.128-118.779,118.78-118.779c30.608,0,56.867,10.708,77.064,27.268l7.072-45.048   c-24.141-14.238-52.722-22.619-84.139-22.619c-65.65-0.009-141.404,40.395-159.18,136.351v48.076   c0,5.054,2.623,15.149,5.052,22.625c25.252,80.809,98.578,113.733,154.129,113.733c42.524,0,82.729-16.869,112.322-45.232v36.355   h50.499V94.011H280.47V94z M632.775,335.198c0,73.13-60.604,121.206-121.207,121.206c-70.703,0-118.78-60.604-118.78-121.206   c0-65.651,53.125-118.778,118.78-118.778C584.699,216.419,632.775,277.023,632.775,335.198z M673.178,335.198   c0-85.854-68.275-159.182-161.609-159.182c-65.651,0-141.406,40.403-159.182,136.359v48.076c0,5.054,2.623,15.148,5.052,22.625   c25.25,80.809,98.578,113.732,154.129,113.732C597.423,496.811,673.178,428.531,673.178,335.198z M993.773,115.415h-131.31   c-2.432,2.623-5.053,2.623-5.053,7.674c0,7.476,2.621,7.476,2.621,10.102h131.309c2.433-2.623,5.053-2.623,5.053-10.102   C996.394,118.041,993.773,118.041,993.773,115.415z M579.65,115.415H448.34c-2.426,2.623-5.049,2.623-5.049,7.674   c0,7.476,2.623,7.476,2.623,10.102h131.307c2.43-2.623,5.053-2.623,5.053-10.102C582.273,118.041,579.65,118.041,579.65,115.415z").setFill(regularFill).setStroke("#000");

				// Put all pieces together
				allGroup = surface.createGroup();
				arrayUtil.forEach([letterToolkitT, letterToolkitO1, letterToolkitO2, letterToolkitL, letterToolkitK, letterToolkitI, letterToolkitT2, letterDojo], function(item) {
					allGroup.add(item);
					allShapes.push(item);
				});
			});
		</script>
	</body>
</html>
