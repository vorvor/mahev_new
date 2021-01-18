$(document).ready(function() {

	path = './sequences/';
	projectPattern = 'model_PE_extcolor_intcolor_rim_v2';
	projects = [
		'MS_PE_ExBk_IntBkDrkAsh_19cSilv_v2', 
		'MS_PE_ExBk_IntBkDrkAsh_21cCarb_v2', 
		'MS_PE_ExBl_IntBkDrkAsh_19cSilv_v2', 
		'MS_PE_ExBl_IntBkDrkAsh_21cCarb_v2', 
		'MS_PE_ExGr_IntBkDrkAsh_19cSilv_v2', 
		'MS_PE_ExGr_IntBkDrkAsh_21cCarb_v2', 
		'MS_PE_ExRd_IntBkDrkAsh_19cSilv_v2', 
		'MS_PE_ExRd_IntBkDrkAsh_21cCarb_v2', 
		'MS_PE_ExWh_IntBkDrkAsh_19cSilv_v2', 
		'MS_PE_ExWh_IntBkDrkAsh_21cCarb_v2'];

	extcolors = ['ExBk', 'ExBl', 'ExGr', 'ExRd', 'ExWh'];
	rims = ['19cSilv', '21cCarb'];

	loadedProjects = [];

	project = projects[0];
	model = 'MS';
	extColor = 'ExWh';
	intColor = 'IntBkDrkAsh';
	rim = '19cSilv';

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

	// Color or rim option button selected.
	$('._configurator-tabs ._radio-extras').click(function() {
		// Set neccessary color or rim variable to the selected.
		window[$(this).data('prop')] = $(this).data('val');
		// Update current project based upon selection.
		project = currentProject();
		picnum = $('#slider').val() * 4;
		// Load images to the project if it's a new choice and images not loaded before.
		if (!loadedProjects.includes(project)) {
			loadImages(picnum, 'start');
			loadedProjects.push(currentProject());
		}
		setPic();
	})

	// Slider change makes model rotate - set image based on slider value.
	$('#slide').change(function(event) {
		setPic();
	})

	// Current project changes as user changes color, rim or inner.
	function currentProject() {
		return projectPattern
		.replace('model', model)
		.replace('extcolor', extColor)
		.replace('intcolor', intColor)
		.replace('rim', rim);
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
		clearAnim();
		$('#configurator .' + project + '-' + picnumstring).removeClass('hidden');
		console.log('#configurator .' + project + '-' + picnumstring + ' is active');
	}

	// Load images to background. If user chooses red model first, all red image loaded in background.
	function loadImages(i, dir) {
		if (i < 406 && i > -1) { 
			project = currentProject();
			picnumstring = ('00000' + i).slice(-5);
			picstring = path + '/' + project +'/' + project + '_' + picnumstring + '.jpg';
			$('#configurator .inset-0').prepend('<img class="hidden sequence-image ' + project + '-' + picnumstring + '" src="' + picstring + '">');
			if (dir == 'right') {
				setTimeout(function(){ loadImages(i+4, 'right') }, 100);
			}
			if (dir == 'left') {
				setTimeout(function(){ loadImages(i-4, 'left') }, 100);
			}

			if (dir == 'start') {
				setTimeout(function(){ loadImages(i+4, 'right') }, 100);
				setTimeout(function(){ loadImages(i-4, 'left') }, 100);
			}
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
		if (picnum < to) {
			step = 4;
		} else {
			step = -4;
		}
		play(step, to, picnum);
	}

	// Actually the rotating step by step.
	function play(step, to, currentState) {
		if (to !== currentState && currentState > 0) {
			currentState += step;
			setPic(currentState);
			//$('.ui-slider-handle').css({ left: (currentState / 4) + '%' });
			animSpeed = 40;
			setTimeout(function() { play(step, to, currentState) }, animSpeed);
		} else {
			// Animation finished. Start next animation.
			playZoomin(0);
		}
	}

	// Prepare zoomin animation.
	innerProject = 'MS_LRP_ExBk_IntBeigLbOak_19cSilv';
	innerProjectPattern = 'MS_LRP_extcolor_IntBeigLbOak_19cSilv';

	function currentInnerProject() {
		return innerProjectPattern
		.replace('model', model)
		.replace('extcolor', extColor)
		.replace('intcolor', intColor)
		.replace('rim', rim);
	}

	// Load zoomin animation images to the background.
	function loadZoominImages(i) {
		if (i < 77) {
			picnumstring = ('00000' + i).slice(-5);
			innerProject = currentInnerProject();
			picstring = './sequences/rotate/ZOOMIN/' + innerProject + '/' + innerProject + '_' + picnumstring + '.jpg';
			$('#configurator .inset-0').prepend('<img class="hidden sequence-image ' + innerProject + '-' + picnumstring + '" src="' + picstring + '">');
			console.log('INNER LOADED ' + picstring);
			setTimeout(function(){ loadZoominImages(i + 1) }, 50);
		} 
		if (i == 70) {
			
		}

	}


	function playZoomin(i) {
		if (i < 77) {
			picnumstring = ('00000' + i).slice(-5);
			clearAnim();
			$('#configurator .inset-0 .' + innerProject + '-' + picnumstring).removeClass('hidden');
			console.log('#configurator .inset-0 .' + innerProject + '-' + picnumstring);
			setTimeout(function(){ playZoomin(i + 1) }, 50);
		}
	}

	// Belső clicked.
	$('._tab-nav a:nth-child(4)').click(function() {
		loadZoominImages(0);
		playInit(60);
	})	

});