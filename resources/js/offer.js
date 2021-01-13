$(function(){

	$('._config-summary li:nth-child(1) span:nth-child(2)').html(getCookie('mahev_facility'));
	$('._config-summary li:nth-child(2) span:nth-child(2)').html(getCookie('mahev_exterior'));
	$('._config-summary li:nth-child(3) span:nth-child(2)').html(getCookie('mahev_interior'));
	$('._config-summary li:nth-child(4) span:nth-child(2)').html(getCookie('mahev_rim'));
	$('._config-summary li:nth-child(5) span:nth-child(2)').html(getCookie('mahev_seats'));
	$('._config-summary li:nth-child(6) span:nth-child(2)').html(getCookie('mahev_wtire'));
	$('._config-summary li:nth-child(7) span:nth-child(2)').html(getCookie('mahev_extra'));

	function getCookie(cname) {
	  var name = cname + "=";
	  var decodedCookie = decodeURIComponent(document.cookie);
	  console.log(decodedCookie);
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