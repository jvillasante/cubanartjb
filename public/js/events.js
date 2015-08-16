(function($) {
  'use strict';

  $('#datepicker').datepicker().on('changeDate', function(ev) {
    $('#datepicker').datepicker('hide');
  });

})(window.jQuery);

