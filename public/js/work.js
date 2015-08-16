(function($){
  'use strict';

  try {
    //adjust work item ovelay button and text to center
    var innerWidth = parseFloat($('.inner:eq(0)').outerWidth());
    var innerHeight = parseFloat($('.inner:eq(0)').outerHeight());

    $('.work-item-overlay .inner').css({ marginLeft: -innerWidth / 2.0, marginTop: -innerHeight / 2.0 });
  } catch (e) { }

  try {
    //Initialize PrettyPhoto here
    $("a[rel^='prettyPhoto']").prettyPhoto({
      animation_speed: 'normal',
      theme: 'facebook',
      slideshow: 5000,
      autoplay_slideshow: false,
      social_tools: false,
      opacity: 0.80,
      show_title: true,
      default_width: 850,
      default_height: 500,
      allow_resize: true,
      hideflash: false,
      // keyboard_shortcuts: false,
      ie6_fallback: true,
      gallery_markup: ''
    });
  } catch (e) { }
  
})(jQuery);

