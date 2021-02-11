$(document).ready(function() {

	$('._configurator-3d').prepend('<div id="progress-bar-3d" class="hidden">loading</div>');

	path = './sequences/';
	whichAnim = 'outer';

	loadedProjects = [];

	var animTimer;

	model = $('#configurator').data('model');
	facility = $('._configurator-tabs #conf-tab-1 ._radio-extras:eq(0)').data('val');
	extColor = $('._configurator-tabs #conf-tab-2 ._radio-extras:eq(0)').data('val');
	rim = $('._configurator-tabs #conf-tab-3 ._radio-extras:eq(0)').data('val');
	intColor = $('._configurator-tabs #conf-tab-4 ._radio-extras:eq(0)').data('val');
	hook = '';

	// Default projetc on page load.
	var project = currentProject();

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
				loadImages(picnum, 'start', project);
				loadedProjects.push(currentProject());
			} else {
				setPic();
			}
		}
	})

	$('._configurator-tabs ._toggle-extras').click(function() {
		if ($(this).hasClass('on')) {
			hook = 'th';
		} else {
			hook ='';
		}

		// Update current project based upon selection.
		project = currentProject();
		picnum = $('#slider').val() * 4;
		// Load images to the project if it's a new choice and images not loaded before.
		if (!loadedProjects.includes(project)) {
			loadImages(picnum, 'start', project);
			loadedProjects.push(currentProject());
		} else {
			setPic();
		}
	})

	// Slider init.
	rangesliderJs.create(
		document.getElementById('slider'), {
		onSlide: (value, percent, position) => {
			setPic();
		},
	})

	// Current project changes as user changes color, rim or inner.
	function currentProject() {
		project = model + '_' + facility + '_' + extColor +'_' + intColor +'_' + rim;
		if (hook !== undefined && hook !== '') {
			project += '_' + hook;
		}
		return project;
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
		innerProject = currentProject();
		picnumstring = ('00000' + picnum).slice(-5);
		picstring = './sequences/rotate/ZOOMIN/' + innerProject + '/' + innerProject + '_' + picnumstring + '.jpg';

		if ($('.inner-' + innerProject + '-' + picnumstring).length == 0) {
			var image = new Image();
			image.className = 'hidden sequence-image inner-' + innerProject + '-' + picnumstring;
			image.src = picstring;
			image.onload = function() {
				clearAnim();
				$('#configurator .inner-' + innerProject + '-' + picnumstring).removeClass('hidden');
			}

			$('#configurator .inset-0').prepend(image);
			console.log('image added');
			console.log(picstring);
		} else {
			clearAnim();
			$('#configurator .inner-' + innerProject + '-' + picnumstring).removeClass('hidden');
		}

	}

	// Load images to background. If user chooses red model first, all red image loaded in background.
	function loadImages(i, dir, project) {
		if (i < 406 && i > -1) {
			$('#progress-bar-3d').removeClass('hidden');

			picnumstring = ('00000' + i).slice(-5);
			picstring = path + '/' + project +'/' + project + '_' + picnumstring + '.jpg';
			


			var image = new Image();
			image.className = 'hidden sequence-image ' + project + '-' + picnumstring;
			image.src = picstring;
			if (dir == 'start') {
				image.onload = function() {
					setPic();
				}
			}
			$('#configurator .inset-0').prepend(image);

			//$('#configurator .inset-0').prepend('<img class="hidden sequence-image ' + project + '-' + picnumstring + '" src="' + picstring + '">');
			
			// If slider changed to a position image not loaded yet, now lets show it to user.
			/*if ($('#slider').val() * 4 == i) {
				setPic(i);
			}*/

			if (dir == 'right') {
				setTimeout(function(){ loadImages(i+4, 'right', project) }, 50);
			}
			if (dir == 'left') {
				setTimeout(function(){ loadImages(i-4, 'left', project) }, 50);
			}

			if (dir == 'start') {
				setTimeout(function(){ loadImages(i+4, 'right', project) }, 50);
				setTimeout(function(){ loadImages(i-4, 'left', project) }, 50);
			}
		} else {
			// All images loaded.
			$('#progress-bar-3d').addClass('hidden');
		}

	}

	// Start default project images init.
	loadImages(192, 'start', project);
	loadedProjects.push(currentProject());
	//setPic();

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

	// Load zoomin animation images to the background.
	function loadZoomInImages(i) {
		if (i < 77) {
			picnumstring = ('00000' + i).slice(-5);
			innerProject = currentProject();
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
			innerProject = currentProject();
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