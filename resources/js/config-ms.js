$(function(){


	$('.offer .facility').html($('#conf-tab-1 ._radio-extras:nth-child(1) .text-sm').html());
	$('.offer .facility-price').html($('#conf-tab-1 ._radio-extras:nth-child(1) .price div').html());

	$('.offer .exterior').html($('#conf-tab-2 ._radio-extras:nth-child(1) .text-sm').html());
	$('.offer .exterior-price').html($('#conf-tab-2 ._radio-extras:nth-child(1) .price div').html());

	$('.offer .interior').html($('#conf-tab-4 ._radio-extras:nth-child(1) .text-sm').html());
	$('.offer .interior-price').html($('#conf-tab-4 ._radio-extras:nth-child(1) .price div').html());

	$('.offer .rim').html($('#conf-tab-3 ._radio-extras:nth-child(1) .text-sm').html());
	$('.offer .rim-price').html($('#conf-tab-3 ._radio-extras:nth-child(1) .price div').html());

	$('.offer .self-driving').html($('#conf-tab-5 ._radio-extras:nth-child(1) .text-sm').html());
	$('.offer .self-driving-price').html($('#conf-tab-5 ._radio-extras:nth-child(1) .price div').html());


	calcOfferPrice();

	setCookie('mahev_model','s');
	// Facility
	$('#conf-tab-1 ._radio-extras:nth-child(1)').removeClass('off').addClass('on');
	setCookie('mahev_facility', $('#conf-tab-1 ._radio-extras:nth-child(1) .text-sm').html());
	$('#conf-tab-1 ._radio-extras').each(function() {
		$(this).click(function() {
			text = $('.text-sm', this).html();
			price = $('.price div', this).html();

			// Offer list changes.
			$('.offer .block.facility').html(text);
			$('.offer .facility-price').html(price);

			// Save value.
			setCookie('mahev_facility', text);

			//Other tabs option changes.
			if (text.toLowerCase().includes('long range')) {
				$('#conf-tab-4 ._radio-extras').each(function() {
					if ($('.text-sm', this).html().includes('karbon')) {
						$(this).addClass('hidden');
					} else {
						$(this).removeClass('hidden');
					}
				})
			}

			if (text.toLowerCase().includes('plaid')) {
				$('#conf-tab-4 ._radio-extras').each(function() {
					if ($('.text-sm', this).html().includes('karbon')) {
						$(this).removeClass('hidden');
					} else {
						$(this).addClass('hidden');
					}
				})
			}

			// Under 3D rotate data.
			var regex = /[+-]?\d+(\.\d+)?/g;
			var str = $('.text-xs', this).html();
			var floats = str.match(regex).map(function(v) { return parseFloat(v); });
			$('.highlights li:nth-child(1) .circle .number').html(floats[0]);
			$('.highlights li:nth-child(3) .circle .number').html(floats[2]);
			$('.highlights li:nth-child(5) .circle .number').html(floats[1]);

			$('#conf-tab-4 ._radio-extras').not('.hidden').first().removeClass('off').addClass('on').click();

			calcOfferPrice();
		})
	})

	// Exterior
	$('#conf-tab-2 ._radio-extras:nth-child(1)').removeClass('off').addClass('on');
	setCookie('mahev_exterior', $('#conf-tab-2 ._radio-extras:nth-child(1) .text-sm').html());
	$('#conf-tab-2 ._radio-extras').each(function() {
		$(this).click(function() {
			text = $('.text-sm', this).html();
			price = $('.price div', this).html();

			$('.offer .block.exterior').html(text);
			$('.offer .exterior-price').html(price);

			// Save value.
			setCookie('mahev_exterior', text);

			calcOfferPrice();
		})

		
	})

	// Rim
	$('#conf-tab-3 ._radio-extras').each(function() {
		if ($('.text-sm', this).html().includes('20')) {
			$(this).addClass('hidden');
		} else {
			$(this).removeClass('hidden');
		}
	})
	$('#conf-tab-3 ._radio-extras').not('.hidden').first().removeClass('off').addClass('on');
	setCookie('mahev_rim', $('#conf-tab-3 ._radio-extras:nth-child(1) .text-sm').html());


	$('#conf-tab-3 ._radio-extras').each(function() {
		$(this).click(function() {
			text = $('.text-sm', this).html();
			price = $('.price div', this).html();

			$('.offer .block.rim').html(text);
			$('.offer .rim-price').html(price);

			// Save value.
			setCookie('mahev_rim', text);

			calcOfferPrice();
		})

		
	})


	// Interior
	$('#conf-tab-4 ._radio-extras').each(function() {
		if ($('.text-sm', this).html().includes('karbon')) {
			$(this).addClass('hidden');
		} else {
			$(this).removeClass('hidden');
		}
	})
	setCookie('mahev_interior', $('#conf-tab-4 ._radio-extras:nth-child(1) .text-sm').html());
	$('#conf-tab-4 ._radio-extras').each(function() {
		$(this).click(function() {
			text = $('.text-sm', this).html();
			price = $('.price div', this).html();

			$('.offer .block.interior').html(text);
			$('.offer .interior-price').html(price);

			// Save value.
			setCookie('mahev_interior', text);

			calcOfferPrice();
		})
	})
	$('#conf-tab-4 ._radio-extras').not('.hidden').first().removeClass('off').addClass('on');


	// Self drive
	$('#conf-tab-5 ._radio-extras').not('.hidden').first().removeClass('off').addClass('on');
	setCookie('mahev_selfdrive', $('#conf-tab-5 ._radio-extras:nth-child(1) .text-sm').html());

	$('#conf-tab-5 ._radio-extras').each(function() {
		$(this).click(function() {
			text = $('.text-sm', this).html();
			price = $('.price div', this).html();

			$('.offer .block.self-driving').html(text);
			$('.offer .self-driving-price').html(price);

			// Save value.
			setCookie('mahev_selfdrive', text);

			calcOfferPrice();
		})

		
	})

	setCookie('mahev_seats', '');
	setCookie('mahev_wtire', '');
	
	$('.offer .block.extra').addClass('hidden');
	$('.offer .extra-price').addClass('hidden');

	setCookie('mahev_extra', '');
	$('#conf-tab-6 ._toggle-extras').each(function() {
		$(this).click(function() {
			$('.offer .block.extra').addClass('hidden');
			$('.offer .extra-price').addClass('hidden');
			if ($(this).hasClass('on')) {
				$('.offer .block.extra').removeClass('hidden');
				$('.offer .extra-price').removeClass('hidden');

				// Save value.
				setCookie('mahev_extra', 'Fali töltő');
			} else {
				setCookie('mahev_extra', '');
			}

			calcOfferPrice();
		})

		
	})

	function calcOfferPrice() {
		price = 0;
		$('.offer .price').not('.hidden').each(function() {
			price += parseInt($(this).html().replace(/\s+/g, ''));
		})
		
		sumPrice = priceFormat(price);
		$('.sum-price').html(sumPrice + ' €');
		setCookie('mahev_price', sumPrice);
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
