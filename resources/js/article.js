$(document).ready(function() {

    var isLoading = false;

	$('#more-news').click(function(e) {
		e.preventDefault();
        if (!isLoading) {
            isLoading = true;
    		$.ajax
              ({ 
                url: 'https://mah-ev.hu/backend/mahev_article/tesla/cikkek/' + $('#article-bookmark').val() + '/2',
                type: 'GET',
                success: function(result) {
                	$.each (result, function(key, val) {
                		article = '<div class="card-news"><a href="/' + result[key]['path'] + '"><div class="img relative w-full h-64 overflow-hidden flex gradient-overlay"><img class="object-cover object-center block h-full w-full" src="https://mah-ev.hu/' + result[key]['field_main_image'] + '" alt=""></div><div class="border-b-2 border-emerald-500 w-6 Xh-1 mt-6 leading-none"></div><h2 class="text-xl py-4 text-gray-500">' + result[key]['title'] + '</h2><p class="text-gray-500">' + result[key]['field_lead'] + '</p></a></div>'
                		$('#articles-container').append(article);
                	})
                	
                	$('#article-bookmark').val($('#article-bookmark').val() * 1 + 2);
                    isLoading = false;
                  
                }
              });
          }
	})
})