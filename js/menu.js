$('.icon-menu').on('click', function(){
	
	
	element = $('.menu');
	color = element.css('left');

	if (color != 0) {
		$(".menu").css("left", "0");
	}
	
	if (color != -375) {
		$('.icon-menu').on('click', function(){
			$(".menu").css("left", "-375");
		});
	}
});