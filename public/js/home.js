(function($){
  'use strict';

  $.fn.cycle.defaults.autoSelector = '.slideshow';

  $('.slideshow').on('click', 'img', function(evt) {
    window.location.replace(url_to_work);
  });
})(jQuery);

