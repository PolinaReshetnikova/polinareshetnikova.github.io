/*$('.menu-bar').on('click', function(){
	$("#header").css("left", "0");
	element = $('#header');
	color = element.css('left');

	if (color != -375) {
		$('.menu-bar').on('click', function(){
			$("#header").css("left", "-375");
		});
	}
});*/

if ((window.innerWidth >= 737) && (window.innerWidth <= 960)) {
    var main = function() {
        $('.icon-menu').click(function() {
            $('#header').animate({
                left: '0px'
            }, 600);
        });
		
       
        $('.icon-close').click(function() {
            $('#header').animate({
                left: '-375px'
            }, 600);
        });
    };
}

if (window.innerWidth < 736)  {
    var main = function() {
        $('.icon-menu').click(function() {
            $('#header').animate({
                left: '0px'
            }, 600);
        });


        $('.icon-close').click(function() {
            $('#header').animate({
                left: '-375px'
            }, 600);
        });
    };
}
$(document).ready(main);
