function viewport() {
    var e = window, a = 'inner';
    if (!('innerWidth' in window )) {
        a = 'client';
        e = document.documentElement || document.body;
    }
    return e[ a+'Width' ] + ':' + e[ a+'Height'];
}

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

function setCookie(cname, cvalue) {
  document.cookie = cname + '=' + cvalue;
}

$(document).ready(function() {
	$('#mainmenu .mm-navbar li:nth-child(1)').hide();
	$('#mainmenu .mm-navbar li:nth-child(2)').hide();
	$('#mainmenu .mm-navbar li:nth-child(3) a').attr({href :'https://m.me/MagyarAutokereskedohazZrt', _target: 'blank'});
	$('#mainmenu .mm-navbar li:nth-child(4)').hide();
	$('#mainmenu .mm-navbar li:nth-child(5) a').attr({href: 'info@mahzrt.hu', _target: 'blank'});
	$('#mainmenu .mm-navbar li:nth-child(6) a').attr({href: 'https://www.facebook.com/MagyarAutokereskedohazZrt', _target: 'blank'});

});
