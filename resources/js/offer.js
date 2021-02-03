$(function(){

	switch(getCookie('mahev_model')) {
		case 's': 
			model = 'Model S';
			// no seats, no extra
			$('._config-summary li:nth-child(6)').hide();
			$('._config-summary li:nth-child(9)').hide();
		break;
		case '3': model = 'Model 3';
		break;
		case 'x': model = 'Model X';
		break;
		case 'y': model = 'Model Y';
		break;
	}

	$('.lastname').addClass('hidden');

	fields = ['model', 'facility', 'exterior', 'interior', 'rim', 'seats', 'selfdrive', 'wtire', 'extra'];

	$('._config-summary li:nth-child(1) span:nth-child(1)').html(model);

	facility = getCookie('mahev_facility');
	$('._config-summary li:nth-child(2) span:nth-child(2)').html(facility);
	$('#offer').append('');
	exterior = getCookie('mahev_exterior');
	$('._config-summary li:nth-child(3) span:nth-child(2)').html(exterior);
	interior = getCookie('mahev_interior');
	$('._config-summary li:nth-child(4) span:nth-child(2)').html(interior);
	rim = getCookie('mahev_rim');
	$('._config-summary li:nth-child(5) span:nth-child(2)').html(rim);
	seats = getCookie('mahev_seats');
	$('._config-summary li:nth-child(6) span:nth-child(2)').html(seats);
	selfdrive = getCookie('mahev_selfdrive');
	$('._config-summary li:nth-child(7) span:nth-child(2)').html(selfdrive);
	wtire = getCookie('mahev_wtire');
	$('._config-summary li:nth-child(8) span:nth-child(2)').html(wtire);
	extra = getCookie('mahev_extra');
	$('._config-summary li:nth-child(9) span:nth-child(2)').html(extra);

	$.each(fields, function(k, v) {
		if (window[v] !== '') {
			var newOption = document.createElement('input');  
	    	newOption.name = v;
	    	newOption.type = 'hidden';
	    	newOption.value = window[v];
	    	$('#offer').append(newOption); 
    	}
	})

	function getCookie(cname) {
	  var name = cname + "=";
	  var decodedCookie = decodeURIComponent(document.cookie);

	  var ca = decodedCookie.split(';');
	  for(var i = 0; i <ca.length; i++) {
	    var c = ca[i];
	    while (c.charAt(0) == ' ') {
	      c = c.substring(1);
	    }
	    if (c.indexOf(name) == 0) {
	      return c.substring(name.length, c.length);
	    }
	  }
	  return "";
	}




	$('#finance').click(function() {
		$('.finance-form').hide();
		if ($(this).is(':checked')) {
			$('.finance-form').show();
		}
	})

	$('#financial-construction').change(function() {
		$('.initial-deposit').addClass('hidden');
		$('.remain').addClass('hidden');
		$('#duration').val(0);
		if ($(this).val() == 'close-end') {
			$('.initial-deposit-close-end').removeClass('hidden');
		}

		if ($(this).val() == 'open-end') {
			$('.initial-deposit-open-end').removeClass('hidden');
		}

		if ($(this).val() == 'rental') {
			$('.initial-deposit-rental').removeClass('hidden');
		}
	})

	$('#duration').change(function() {
		$('.remain').addClass('hidden');
		if ($(this).val() <= 24) {
			$('.remain-24').removeClass('hidden');
		}
		if ($(this).val() > 24 && $(this).val() <= 36) {
			$('.remain-24-36').removeClass('hidden');
		}
		if ($(this).val() > 36 && $(this).val() <= 48) {
			$('.remain-36-48').removeClass('hidden');
		}
		if ($(this).val() > 48) {
			$('.remain-48').removeClass('hidden');
		}

	})
})