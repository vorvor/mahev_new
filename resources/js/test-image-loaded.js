$(document).ready(function() {
	$('#image-wrapper').append('test js loaded');

	path = './test-sequences/';
	project = 'M3_SRP_ExBl_IntBk_18cAero_TH';

	var imageState = 'waiting';

	function checkImageLoaded() {

		

		$('#test-monitor').append(imageState);
		setTimeout(function() {
			checkImageLoaded()
		}, 1);
	}

	
	$('#image-load').click(function() {

		checkImageLoaded();
		
		var image = new Image();
		image.onload = function () {
		   imageState = "Image loaded !";
		   $('#image-wrapper #placeholder').hide();

		}
		image.onerror = function () {
			imageState = 'error';
		}
		



		r = Math.floor((Math.random() * 400) + 1);
		picnumstring = ('00000' + r).slice(-5);
		//picstring = path + '/' + project +'/' + project + '_' + picnumstring + '.jpg';
		picstring = path + '/test.jpg';


		image.src = path + '/test.jpg';
		$('#image-wrapper').append(image);
		
	})

	$('#init-test').click(function() {
		exist = $('#image-wrapper img').length;
		$('#test-monitor').append(exist);
	})

});