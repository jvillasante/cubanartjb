(function($){
  'use strict';

  var prefilled = null;
  if (old_tags.length === 0) {
    prefilled = painting_tags;
  } else {
    prefilled = old_tags;
  }

  $('.tagManager').tagsManager({
    prefilled: prefilled,
    typeahead: true,
    typeaheadAjaxSource: null,
    typeaheadSource: all_tags
  });
})(jQuery);

