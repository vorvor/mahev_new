$(function() {
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


});