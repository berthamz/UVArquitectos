jQuery(document).ready(function() {

	// Burger menu
	jQuery('.menu-main-menu-container a, .mobile-menu').click( function(){
		if(window.innerWidth < 769){
			jQuery('.menu-main-menu-container').fadeToggle(100);
		} else {}
	});

	jQuery('.filter-dropdown-menu').click( function(){
		jQuery('.st_sf_list_cats').fadeToggle(100);
	});


});