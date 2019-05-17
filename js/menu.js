$(document).ready(function(){
	$('.hamburger').click(function () {
	  $('.menu').animate({right: '0px'}, 100)
	});

	$('.close-menu').click(function () {
	  $('.menu').animate({right: '-200px'}, 100)
	});
});