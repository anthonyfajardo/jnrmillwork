
	console.log('custom-scripts.js loaded');



( function( $ ) {

	$(document).ready(function(){
		$('#hamburger').click(function(){
			$(this).toggleClass('clicked');
			$('.menu-primary-container').toggleClass('open');
		});
	});

} )( jQuery );
