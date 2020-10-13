

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

			if ( search_query.length >= 5 ) {
				// show the directory results listing
				directory.find('.directory-entries').addClass('searched');
			} else {
				// hide the directory results listing
				directory.find('.directory-entries').removeClass('searched');
			}

			// loop through the directory entries
			directory.find('.entry').each(function(){
				var entry = $(this);
				var content = $(this).text().toLowerCase();
				var zipcodes = $(this).attr('data-zipcodes');
				if ( ( content.match( search_query ) || zipcodes.match( search_query ) ) && search_query.length >= 5 ) {
					entry.show();
				} else {
					entry.hide();
				}
			});
		});

	}

});

