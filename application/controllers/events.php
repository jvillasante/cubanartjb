<?php

class Events_Controller extends Base_Controller {
  public $restful = true;

  public function __construct() {
    parent::__construct();
  }

  public function get_index() {
    $events = GroupEvent::order_by('created_at', 'desc')->paginate(Config::get('app.paginator_count'));
    $count = ceil(count($events->results) / 2);

    return View::make('events.index')
      ->with('title', HtmlHelpers::name('events'))
      ->with('nav', 'events')
      ->with('events', $events)
      ->with('count', $count);

  }
}
