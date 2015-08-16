<?php

class Work_Controller extends Base_Controller {
  public $restful = true;

  public function __construct() {
    parent::__construct();
  }

  public function get_index($painter = 'all') {
    $paintings = null;
    $painter_name = null;
    if ($painter == 'all') {
      $paintings = Painting::with('tags')->order_by('created_at')->paginate(Config::get('app.paginator_count'));
      $painter_name = __('application.all');
    } else {
      $paintings = Painting::with('tags')->where('painter', 'LIKE', '%'.$painter.'%')->order_by('created_at')->paginate(Config::get('app.paginator_count'));
      $painter_name = ($painter == 'brouwer') ? __('application.brouwer') : __('application.jacas');
    }

    return View::make('work.index')
      ->with('title', HtmlHelpers::name('work') . ' - ' . $painter_name)
      ->with('nav', 'work')
      ->with('painter', $painter_name)
      ->with('paintings', $paintings);
  }


  public function get_paintings_search() {
    list($terms, $paintings) = Search::search_paintings(Input::get('q'));

    return View::make('work.index')
      ->with('title', HtmlHelpers::name('work') . ' - ' . __('application.search_results'))
      ->with('nav', 'work')
      ->with('painter', __('application.search_results'))
      ->with('paintings', $paintings);
  }
}
