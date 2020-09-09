

// tab controls
jQuery(document).ready(function($){

	// see if we have the directory div
	if ( $( '.directory' ).length ) {

		// store the directory div in a variable
		var directory = $( '.directory' );

		// store the search field
		var search = directory.find('.cu-search');

		// when the search field is typed into
		search.on('keyup',function(){

			// store the term (in lowercase)
			var search_query = $(this).val().toLowerCase();

			// loop through the directory entries
			directory.find('.entry').each(function(){
				var entry = $(this);
				var content = $(this).text().toLowerCase();
				var zipcodes = $(this).attr('data-zipcodes');
				if ( content.match(search_query) || zipcodes.match(search_query) ) {
					entry.show();
				} else {
					entry.hide();
				}
			});
		});

	}

});

