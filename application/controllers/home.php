<?php

class Home_Controller extends Base_Controller {
  public $restful = true;

  public function __construct() {
    parent::__construct();
  }

	public function get_index() {
    $slideshow = DB::table('slideshow_images')->order_by('number', 'asc')->get();

    return View::make('home.index')
      ->with('title', HtmlHelpers::name('home'))
      ->with('slideshow', $slideshow);
	}

  public function get_about() {
    return View::make('home.about')
      ->with('nav', 'about')
      ->with('title', HtmlHelpers::name('about'));
  }

  public function get_faq() {
    return View::make('home.faq')
      ->with('nav', 'faq')
      ->with('title', HtmlHelpers::name('faq'));
  }

  public function get_contact() {
    return View::make('home.contact')
      ->with('nav', 'contact')
      ->with('title', HtmlHelpers::name('contact'));
  }

  public function post_send_message() {
    $input = Input::all();

    try {
      $validator = new Services\Home\Contact\Validator($input);
      $validator->publish();
    } catch (ValidateException $errors) {
      return Redirect::to(URL::to_route('home.contact'))
        ->with_input()
        ->with_errors($errors->get());
    }

    $errors = new Laravel\Messages();
    try {
      $message = Message::to(Config::get('app.email_address'))
        ->from($input['email'], $input['last_name'] + ', ' + $input['first_name'])
        ->subject($input['subject'])
        ->body($input['message'])
        ->send();

      if($message->was_sent()) {
        return Redirect::to(URL::to_route('home.index'))
          ->with('status_success', __('application.email_sent'));
      } else {
        $errors->add('errors', __('application.email_error'));
        return Redirect::to(URL::to_route('home.contact'))
          ->with_input()
          ->with_errors($errors);
      }
    } catch (\Exception $e) {
      $errors->add('errors', $e->getMessage());
      return Redirect::to(URL::to_route('home.contact'))
        ->with_input()
        ->with_errors($errors);
    }
  }

}
