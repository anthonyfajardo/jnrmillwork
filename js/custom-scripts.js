
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

	$(document).on('click', '[data-toggle="lightbox"]', function(event){
		event.preventDefault();
		$(this).ekkoLightbox();
	});



	/* Scroll to specific section on front page */
	$('a[href*=\\#]:not([href=\\#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: (target.offset().top - 100)
				}, 1000);
				return false;
			}
		}
	});	




	// ISOTOPE INITIALIZATION
	$('.filter-button-group').on('click', 'button', function(){
		var filterValue = $(this).attr('data-filter');
		$('.grid').isotope({
			filter: filterValue,
			layoutMode: 'fitRows'
		});
	});


	var height = $('.site-header').height();
	var newHeight = height+32;
	console.log(height);
	$('.contact-margin-top').css('margin-top', newHeight+'px');


} )( jQuery );
