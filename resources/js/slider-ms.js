$(document).ready(function() {

	$('._configurator-3d').prepend('<div id="progress-bar-3d" class="hidden">loading</div>');

	path = './sequences/';
	projectPattern = 'model_facility_extcolor_IntBkDrkAsh_rim';

	whichAnim = 'outer';

	extcolors = ['ExBk', 'ExBl', 'ExGr', 'ExRd', 'ExWh'];
	intcolors = ['IntBkDrkAsh', 'IntWhBkAsh', 'IntBeigLbOak'];
	rims = ['19cSilv', '21cCarb'];

	loadedProjects = [];

	project = 'MS_LRP_ExWh_IntBkDrkAsh_19cSilv';
	model = 'MS';
	facility = 'LRP';
	extColor = 'ExWh';
	intColor = 'IntBkDrkAsh';
	rim = '19cSilv';

	var animTimer;

	// Init facility option buttons.
	$('._configurator-tabs #conf-tab-1 ._radio-extras').attr('data-prop', 'facility');
	$('._configurator-tabs #conf-tab-1 ._radio-extras:eq(0)').attr('data-val', 'LRP');
	$('._configurator-tabs #conf-tab-1 ._radio-extras:eq(1)').attr('data-val', 'PE');

	// Init color option buttons.
	$('._configurator-tabs #conf-tab-2 ._radio-extras').attr('data-prop', 'extColor');
	$('._configurator-tabs #conf-tab-2 ._radio-extras:eq(0)').attr('data-val', 'ExWh');
	$('._configurator-tabs #conf-tab-2 ._radio-extras:eq(1)').attr('data-val', 'ExBk');
	$('._configurator-tabs #conf-tab-2 ._radio-extras:eq(2)').attr('data-val', 'ExGr');
	$('._configurator-tabs #conf-tab-2 ._radio-extras:eq(3)').attr('data-val', 'ExBl');
	$('._configurator-tabs #conf-tab-2 ._radio-extras:eq(4)').attr('data-val', 'ExRd');

	// Init rim option buttons.
	$('._configurator-tabs #conf-tab-3 ._radio-extras').attr('data-prop', 'rim');
	$('._configurator-tabs #conf-tab-3 ._radio-extras:eq(0)').attr('data-val', '19cSilv');
	$('._configurator-tabs #conf-tab-3 ._radio-extras:eq(1)').attr('data-val', '21cCarb');

	// Interior option buttons.
	$('._configurator-tabs #conf-tab-4 ._radio-extras').attr('data-prop', 'intColor');
	$('._configurator-tabs #conf-tab-4 ._radio-extras:eq(0)').attr('data-val', 'IntBkDrkAsh');
	$('._configurator-tabs #conf-tab-4 ._radio-extras:eq(1)').attr('data-val', 'IntWhBkAsh');
	$('._configurator-tabs #conf-tab-4 ._radio-extras:eq(2)').attr('data-val', 'IntBkCarb');
	$('._configurator-tabs #conf-tab-4 ._radio-extras:eq(3)').attr('data-val', 'IntWhCarb');
	$('._configurator-tabs #conf-tab-4 ._radio-extras:eq(4)').attr('data-val', 'IntBeigLbOak');

	// Configuration option button selected, image management.
	$('._configurator-tabs ._radio-extras').click(function() {
		
		prop = $(this).data('prop');
		// Set neccessary color or rim variable to the selected.
		window[prop] = $(this).data('val');

		if (prop == 'intColor') {
			setInnerPic();
			return true;
		}
		
		if (prop == 'facility' || prop == 'extColor' || prop == 'intColor' || prop == 'rim') {
			// Update current project based upon selection.
			project = currentProject();
			picnum = $('#slider').val() * 4;
			// Load images to the project if it's a new choice and images not loaded before.
			if (!loadedProjects.includes(project)) {
				loadImages(picnum, 'start');
				loadedProjects.push(currentProject());
			} else {
				setPic();
			}
		}
	})

	rangesliderJs.create(
		document.getElementById('slider'), {
		onSlide: (value, percent, position) => {
			setPic();
		},
	})

	// Current project changes as user changes color, rim or inner.
	function currentProject() {
		return projectPattern
		.replace('facility', facility)
		.replace('model', model)
		.replace('extcolor', extColor)
		.replace('rim', rim);
		//.replace('intcolor', intColor)
		
	}

	// Hide all images.
	function clearAnim() {
		$('#configurator .sequence-image').addClass('hidden');
	}

	// Set current image (and hide all the other not relevant images).
	function setPic(picnum = null) {
		// Loads slider value relevant image.
		project = currentProject();
		if (picnum == null) {
			picnum = $('#slider').val() * 4;
		}
		picnumstring = ('00000' + picnum).slice(-5);
		picstring = path + '/' + project +'/' + project + '_' + picnumstring + '.jpg';
		//$('#configurator img').attr('src', picstring);

		// Only show picture if already loaded. Dont show empty showplace.
		if ($('#configurator .' + project + '-' + picnumstring).length > 0) {
			clearAnim();
			$('#configurator .' + project + '-' + picnumstring).removeClass('hidden');
			console.log('#configurator .' + project + '-' + picnumstring + ' is active');
		}
	}

	function setInnerPic() {
		
		picnum = 77;
		innerProject = currentInnerProject();
		
		picnumstring = ('00000' + picnum).slice(-5);
		picstring = path + '/' + innerProject +'/' + project + '_' + picnumstring + '.jpg';

		picstring = './sequences/rotate/ZOOMIN/' + innerProject + '/' + innerProject + '_' + picnumstring + '.jpg';
		if ($('.inner-' + innerProject + '-' + picnumstring).length == 0) {
			$('#configurator .inset-0').prepend('<img class="hidden sequence-image inner-' + innerProject + '-' + picnumstring + '" src="' + picstring + '">');
		}

		clearAnim();
		$('#configurator .inner-' + innerProject + '-' + picnumstring).removeClass('hidden');

	}

	// Load images to background. If user chooses red model first, all red image loaded in background.
	function loadImages(i, dir) {
		if (i < 406 && i > -1) {
			$('#progress-bar-3d').removeClass('hidden');

			project = currentProject();
			picnumstring = ('00000' + i).slice(-5);
			picstring = path + '/' + project +'/' + project + '_' + picnumstring + '.jpg';

			$('#configurator .inset-0').prepend('<img class="hidden sequence-image ' + project + '-' + picnumstring + '" src="' + picstring + '">');
			
			// If slider changed to a position image not loaded yet, now lets show it to user.
			if ($('#slider').val() * 4 == i) {
				setPic(i);
			}

			if (dir == 'right') {
				setTimeout(function(){ loadImages(i+4, 'right') }, 50);
			}
			if (dir == 'left') {
				setTimeout(function(){ loadImages(i-4, 'left') }, 50);
			}

			if (dir == 'start') {
				setTimeout(function(){ loadImages(i+4, 'right') }, 50);
				setTimeout(function(){ loadImages(i-4, 'left') }, 50);
			}
		} else {
			// All images loaded.
			$('#progress-bar-3d').addClass('hidden');
		}

	}

	// Start default project images init.
	loadImages(192, 'start');
	loadedProjects.push(currentProject());
	setPic();

	// Play sequence (rotate model) from actual position to position from where zoomin animation starts.
	// Decide if current position is before or after the position needs to be rotated to. 
	// Because of direction of rotating.
	function playInit(to) {
		picnum = $('#slider').val() * 4;
		step = 4;
		play(step, to, picnum);
	}

	// Actually the rotating step by step.
	function play(step, to, currentState) {
		if (to !== currentState) {
			currentState += step;
			if (currentState > 406) {
				currentState = 0;
			}
			setPic(currentState);
			animSpeed = 40;
			animTimer = setTimeout(function() { play(step, to, currentState) }, animSpeed);
		} else {
			// Animation finished. Start next animation.
			playZoomIn(0);
		}
	}

	// Prepare zoomin animation.
	innerProjectPattern = 'model_facility_extcolor_intcolor_rim';

	function currentInnerProject() {
		return innerProjectPattern
		.replace('facility', facility)
		.replace('model', model)
		.replace('extcolor', extColor)
		.replace('intcolor', intColor)
		.replace('rim', rim);
	}

	// Load zoomin animation images to the background.
	function loadZoomInImages(i) {
		if (i < 77) {
			picnumstring = ('00000' + i).slice(-5);
			innerProject = currentInnerProject();
			picstring = './sequences/rotate/ZOOMIN/' + innerProject + '/' + innerProject + '_' + picnumstring + '.jpg';
			$('#configurator .inset-0').prepend('<img class="hidden sequence-image inner-' + innerProject + '-' + picnumstring + '" src="' + picstring + '">');


			animTimer = setTimeout(function(){ loadZoomInImages(i + 1) }, 50);

			
		} else {
			loadedProjects.push(innerProject);
		}

	}

	function playZoomIn(i) {
		if (i < 77) {
			picnumstring = ('00000' + i).slice(-5);
			clearAnim();
			$('#configurator .inset-0 .inner-' + innerProject + '-' + picnumstring).removeClass('hidden');

			animTimer = setTimeout(function(){ playZoomIn(i + 1) }, 50);
		} else {
			animTimer = null;
		}
	}

	// Load zoomout animation images to the background.
	function loadZoomOutImages(i) {
		if (i < 77) {
			picnumstring = ('00000' + i).slice(-5);
			innerProject = currentInnerProject();
			picstring = './sequences/rotate/ZOOMOUT/' + innerProject + '/' + innerProject + '_' + picnumstring + '.jpg';
			$('#configurator .inset-0').prepend('<img class="hidden sequence-image outer-' + innerProject + '-' + picnumstring + '" src="' + picstring + '">');
			animTimer = setTimeout(function(){ loadZoomOutImages(i + 1) }, 50);

			
		} else {
			loadedProjects.push(innerProject);
		}

	}

	function playZoomOut(i) {
		if (i < 77) {
			picnumstring = ('00000' + i).slice(-5);
			clearAnim();
			$('#configurator .inset-0 .outer-' + innerProject + '-' + picnumstring).removeClass('hidden');
			animTimer = setTimeout(function(){ playZoomOut(i + 1) }, 50);
		} else {
			$('input[type="range"]').val(212).change();
			animTimer = null;
		}
	}

	// Belső clicked.
	$('._tab-nav a:nth-child(4)').click(function() {
		if (whichAnim == 'outer' && animTimer == null) {
			loadZoomInImages(0);
			playInit(60);
			whichAnim = 'inner';
			$('#slide').addClass('hidden');
		}
	})	

	// Other than belső clicked.
	$('._tab-nav a:nth-child(-n+3)').click(function() {
		if (whichAnim == 'inner' && animTimer == null) {
			loadZoomOutImages(0);
			setTimeout(function() {
				playZoomOut(0);	
			}, 1000);
			
			whichAnim = 'outer';
			$('#slide').removeClass('hidden');
		}
	});	

});