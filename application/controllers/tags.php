<?php

class Tags_Controller extends Base_Controller {
  public $restful = true;

  public function __construct() {
    parent::__construct();
  }

  public function get_index() {
    return View::make('tags.index')
      ->with('nav', 'work')
      ->with('title', HtmlHelpers::name('tags'));
  }

  public function get_show($tag) {
    $paintings = Tag::where('name', '=', $tag)->first()->paintings()->paginate(Config::get('app.paginator_count'));

    return View::make('tags.show')
      ->with('title', HtmlHelpers::name('tags') . ' - ' . Str::title($tag))
      ->with('nav', 'work')
      ->with('tag', $tag)
      ->with('paintings', $paintings);
  }
}
