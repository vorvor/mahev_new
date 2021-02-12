$(function(){

	calcOfferPrice();

	// Facility
	$('#conf-tab-1 ._radio-extras:nth-child(1)').removeClass('off').addClass('on');
	document.cookie = 'mahev_facility=' + $('#conf-tab-1 ._radio-extras:nth-child(1) .text-sm').html();
	$('#conf-tab-1 ._radio-extras').each(function() {
		$(this).click(function() {
			text = $('.text-sm', this).html();
			price = $('.price div', this).html();

			// Offer list changes.
			$('.offer .block.facility').html(text);
			$('.offer .facility-price').html(price);

			// Save value.
			document.cookie = 'mahev_facility=' + text;

			//Other tabs option changes.
			if (text.toLowerCase().includes('standard plus') || text.toLowerCase().includes('long range')) {
				$('#conf-tab-3 ._radio-extras').each(function() {
					if ($('.text-sm', this).html().includes('21')) {
						$(this).addClass('hidden');
					} else {
						$(this).removeClass('hidden');
					}
				})
			}
			if (text.toLowerCase().includes('performance')) {
				$('#conf-tab-3 ._radio-extras').each(function() {
					if ($('.text-sm', this).html().includes('21')) {
						$(this).removeClass('hidden');
					} else {
						$(this).addClass('hidden');
					}
				})
			}
			$('#conf-tab-3 ._radio-extras').not('.hidden').first().click();

			// Under 3D rotate data.
			var regex = /[+-]?\d+(\.\d+)?/g;
			var str = $('.text-xs', this).html();
			var floats = str.match(regex).map(function(v) { return parseFloat(v); });
			$('.highlights li:nth-child(1) .circle .number').html(floats[0]);
			$('.highlights li:nth-child(3) .circle .number').html(floats[2]);
			$('.highlights li:nth-child(5) .circle .number').html(floats[1]);

			$('#conf-tab-3 ._radio-extras').not('.hidden').first().removeClass('off').addClass('on');

			calcOfferPrice();
		})
	})

	// Exterior
	$('#conf-tab-2 ._radio-extras:nth-child(1)').removeClass('off').addClass('on');
	document.cookie = 'mahev_exterior=' + $('#conf-tab-2 ._radio-extras:nth-child(1) .text-sm').html();
	$('#conf-tab-2 ._radio-extras').each(function() {
		$(this).click(function() {
			text = $('.text-sm', this).html();
			price = $('.price div', this).html();

			$('.offer .block.exterior').html(text);
			$('.offer .exterior-price').html(price);

			// Save value.
			document.cookie = 'mahev_exterior=' + text;

			calcOfferPrice();
		})

		
	})

	// Rim
	$('#conf-tab-3 ._radio-extras').each(function() {
		if ($('.text-sm', this).html().includes('21')) {
			$(this).addClass('hidden');
		} else {
			$(this).removeClass('hidden');
		}
	})
	$('#conf-tab-3 ._radio-extras').not('.hidden').first().removeClass('off').addClass('on');
	document.cookie = 'mahev_rim=' + $('#conf-tab-3 ._radio-extras:nth-child(1) .text-sm').html();


	$('#conf-tab-3 ._radio-extras').each(function() {
		$(this).click(function() {
			text = $('.text-sm', this).html();
			price = $('.price div', this).html();

			$('.offer .block.rim').html(text);
			$('.offer .rim-price').html(price);

			// Save value.
			document.cookie = 'mahev_rim=' + text;

			calcOfferPrice();
		})

		
	})


	// Interior
	document.cookie = 'mahev_interior=' + $('#conf-tab-4 ._radio-extras:nth-child(1) .text-sm').html();
	$('#conf-tab-4 ._radio-extras').each(function() {
		$(this).click(function() {
			text = $('.text-sm', this).html();
			price = $('.price div', this).html();

			$('.offer .block.interior').html(text);
			$('.offer .interior-price').html(price);

			// Save value.
			document.cookie = 'mahev_interior=' + text;

			calcOfferPrice();
		})
	})
	$('#conf-tab-4 ._radio-extras').not('.hidden').first().removeClass('off').addClass('on');



	
	// Seats
	$('#conf-tab-5 ._radio-extras').not('.hidden').first().removeClass('off').addClass('on');
	document.cookie = 'mahev_seats=' + $('#conf-tab-5 ._radio-extras:nth-child(1) .text-sm').html();


	$('#conf-tab-5 ._radio-extras').each(function() {
		$(this).click(function() {
			text = $('.text-sm', this).html();
			price = $('.price div', this).html();

			$('.offer .block.seats').html(text);
			$('.offer .seats-price').html(price);

			// Save value.
			document.cookie = 'mahev_seats=' + text;

			calcOfferPrice();
		})

		
	})



	// Self drive
	$('#conf-tab-6 ._radio-extras').not('.hidden').first().removeClass('off').addClass('on');
	document.cookie = 'mahev_selfdrive=' + $('#conf-tab-6 ._radio-extras:nth-child(1) .text-sm').html();

	$('#conf-tab-6 ._radio-extras').each(function() {
		$(this).click(function() {
			text = $('.text-sm', this).html();
			price = $('.price div', this).html();

			$('.offer .block.self-driving').html(text);
			$('.offer .self-driving-price').html(price);

			// Save value.
			document.cookie = 'mahev_selfdrive=' + text;

			calcOfferPrice();
		})

		
	})


	// Extra
	
	$('.offer .block.winter-tire').addClass('hidden');
	$('.offer .winter-tire-price').addClass('hidden');

	document.cookie = 'mahev_wtire=';
	$('#conf-tab-7 ._toggle-extras').each(function() {
		$(this).click(function() {
			$('.offer .block.winter-tire').addClass('hidden');
			$('.offer .winter-tire-price').addClass('hidden');
			if ($(this).hasClass('on')) {
				$('.offer .block.winter-tire').removeClass('hidden');
				$('.offer .winter-tire-price').removeClass('hidden');

				// Save value.
				document.cookie = 'mahev_wtire=20\' téli garnitúra Pirelli gumival';
			}

			calcOfferPrice();
		})

		
	})


	function calcOfferPrice() {
		price = 0;
		$('.offer .price').not('.hidden').each(function() {
			price += parseInt($(this).html().replace(/\s+/g, ''));
			console.log(price);
		})
		
		$('.offer .sum-price').html(priceFormat(price) + ' €');
	}

	function priceFormat(nStr) {
	    nStr += '';
	    x = nStr.split('.');
	    x1 = x[0];
	    x2 = x.length > 1 ? '.' + x[1] : '';
	    var rgx = /(\d+)(\d{3})/;
	    while (rgx.test(x1)) {
	            x1 = x1.replace(rgx, '$1' + ' ' + '$2');
	    }
	    return x1 + x2;
	}


});
