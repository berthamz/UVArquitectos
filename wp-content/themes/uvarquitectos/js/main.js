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

	// Nosotros info display
	jQuery('.nosotros-img').click ( function () {
		jQuery('.nosotros-img').removeClass('nosotros-active');
		jQuery(this).addClass('nosotros-active');
		jQuery('.nosotros-txt').hide();
		jQuery(this).next().fadeIn(200);
	});

	// Servicios display
	jQuery('.mas-servicios-btn').click ( function () {
		jQuery('.mas-servicios-text').fadeToggle(100);
	});

});