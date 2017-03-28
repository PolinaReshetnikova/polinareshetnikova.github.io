(function($) {
  var $li = $('.item').find('> li'),
      $links = $li.find('> a'),
      $lightbox = $('.lightbox'),
      $next = $('.next'),
      $prev = $('.prev'),
      $overlay = $('.overlay'),
      liIndex,
      targetImg;
  
  var imgSources = [
	"images/pic01.jpg",
	"images/pic02.jpg",
	"images/pic03.jpg",
	"images/pic04.jpg",
	"images/pic05.jpg",
	"images/pic06.jpg",
	"images/pic07.jpg",
	"images/pic08.jpg",
	"images/pic09.jpg",
];

  var imgs = [];
  for (var i = 0; i < imgSources.length; i++) {
    imgs[i] = new Image();
    imgs[i].src = imgSources[i];
  }
  

  function replaceImg(src) {
    $lightbox.find('img').attr('src', src);
  }

  function getHref(index) {
    return $li.eq(index).find('>a').attr('href');
  }

  function closeLigtbox() {
    $lightbox.fadeOut();
  }

  $overlay.click(closeLigtbox);

  $links.click(function(e) {
    e.preventDefault();
    targetImg = $(this).attr('href');
    liIndex = $(this).parent().index();
    replaceImg(targetImg);
    $lightbox.fadeIn();
  });

   $next.click( function() {  
    if ( (liIndex + 1) < $li.length ) { 
      targetImg = getHref(liIndex + 1);
      liIndex ++;
    }
    replaceImg(targetImg);
  });

   $prev.click( function() {  
    if ( (liIndex) > 0 ) { 
      targetImg = getHref(liIndex - 1);
      liIndex --;
    }
    replaceImg(targetImg);
  });
  
})(jQuery);
