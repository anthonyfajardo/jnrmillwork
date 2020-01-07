
	console.log('custom-scripts.js loaded');



( function( $ ) {

	$(document).ready(function(){
		$('#hamburger').click(function(){
			$(this).toggleClass('clicked');
			$('.menu-primary-container').toggleClass('open');
		});

		$('.menu-item a').click(function(){
			$('.menu-primary-container').removeClass('open');
			$('#hamburger').toggleClass('clicked');
		});
	});



} )( jQuery );



/* Scroll to specific section on front page */
( function($) {

	$('a[href*=\\#]:not([href=\\#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: (target.offset().top - 80)
				}, 1000);
				return false;
			}
		}
	});

}) (jQuery);