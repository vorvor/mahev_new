$(function(){

	
	//$('a').attr('rel', 'external');
	$('a').attr('data-ajax', 'false');

	var s = location.hash,
	offset = $(s).offset().top;
	
	if (s) {
	  setTimeout(function() {

	    window.scrollTo(0, offset);
	    console.log('aaa' + offset);
	  }, 800);
	}
})