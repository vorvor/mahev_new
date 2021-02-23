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

/*
function getCookie(cname) {
  savedParams = getBaseCookie('params');
  params = JSON.parse(savedParams);
  
  for (var i in params) {
    if (params[i].name == cname) {
      return params[i].value;
    }
  }
}

*/

function setCookie(cname, cvalue) {
  /*
  savedParams = getBaseCookie('params');
  if (savedParams == '') {
    var params = [];
  } else {
    params = JSON.parse(savedParams);
  }

  found = false;
  for (var i in params) {
    if (params[i].name == cname) {
      params[i].value = cvalue;
      found = true;
      break; //Stop this loop, we found it!
    }
  }

  if (!found) {
    var item = {};
    item.name = cname;
    item.value = cvalue;
    params.push(item);
  }
  document.cookie = 'params=' + JSON.stringify(params) + ';path=/';
  */
  document.cookie = cname + '=' + encodeURI(cvalue) + ';path=/';

}

function deleteAllCookies() {
  var res = document.cookie;
    var multiple = res.split(";");
    for(var i = 0; i < multiple.length; i++) {
       var key = multiple[i].split("=");
       document.cookie = key[0]+" =; expires = Thu, 01 Jan 1970 00:00:00 UTC;path=/";
    }
}

$(document).ready(function() {
	$('#mainmenu .mm-navbar li:nth-child(1)').hide();
	$('#mainmenu .mm-navbar li:nth-child(2)').hide();
	$('#mainmenu .mm-navbar li:nth-child(3) a').attr({href :'https://m.me/MagyarAutokereskedohazZrt', _target: 'blank'});
	$('#mainmenu .mm-navbar li:nth-child(4)').hide();
	$('#mainmenu .mm-navbar li:nth-child(5) a').attr({href: 'info@mahzrt.hu', _target: 'blank'});
	$('#mainmenu .mm-navbar li:nth-child(6) a').attr({href: 'https://www.facebook.com/MagyarAutokereskedohazZrt', _target: 'blank'});

  $('body.fooldal .innerwrapper').each(function() {
    $(this).click(function() {
      if ($('.block.rounded-full', this).length > 0) {
        window.location.href = $('.block.rounded-full', this).attr('href');
      }
    });
  })

});
