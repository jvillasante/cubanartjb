<?php

class Session_Controller extends Base_Controller {
public $restful = true;

  public function __construct() {
    parent::__construct();
    $this->filter('before', 'csrf')->on('post');
  }

  public function get_login() {
    return View::make('session.login')
      ->with('title', HtmlHelpers::name('log_in'));
  }

  public function post_login() {
    $errors = new Laravel\Messages();
    $input = Input::get();

    try {
      $validator = new Services\Session\Login\Validator($input);
      $validator->publish();
    } catch (ValidateException $errors) {
      return Redirect::to(URL::to_route('session.login'))->with_input()->with_errors($errors->get());
    }

    try {
      $valid_login = Sentry::login(Input::get('email'), Input::get('password'), Input::get('remember-me'));

      if($valid_login) {
        $url = null;
        if (Session::has('pre_login_url')) {
          $url = Session::get('pre_login_url');
          Session::forget('pre_login_url');
        } else {
          $url = URL::to_route('dashboard.profile');
        }
        return Redirect::to($url);
      } else {
        $errors->add('errors', __('application.invalid_login'));
        return Redirect::to(URL::to_route('session.login'))->with_input()->with_errors($errors);
      }
    } catch (Sentry\SentryException $e) {
      $errors->add('errors', $e->getMessage());
      return Redirect::to(URL::to_route('session.login'))->with_input()->with_errors($errors);
    }
  }

  public function get_logout() {
    Sentry::logout();
    return Redirect::to(URL::to_route('home.index'));
  }

  public function get_reset() {
    return View::make('session.reset')
      ->with('title', HtmlHelpers::name('reset_password'));
  }

  public function post_reset() {
    $errors = new Laravel\Messages();
    $input = Input::get();

    try {
      $validator = new Services\Session\Reset\Validator($input);
      $validator->publish();
    } catch (ValidateException $errors) {
      return Redirect::to(URL::to_route('session.reset'))->with_input()->with_errors($errors->get());
    }

    try {
      $reset = Sentry::reset_password(Input::get('email'), Input::get('password'));

      if(!$reset) {
        $errors->add('errors', __('application.resset_error'));
        return Redirect::to(URL::to_route('session.reset'))->with_input()->with_errors($errors);
      }
    } catch (Sentry\SentryException $e) {
      $errors->add('errors', $e->getMessage());
      return Redirect::to(URL::to_route('session.reset'))->with_input()->with_errors($errors);
    }

    $errors = new Laravel\Messages();
    try {
      $message = Message::to(Input::get('email'))
        ->from(Config::get('app.email_address'), 'cubanartjb')
        ->subject('Reset Password!')
        ->body('Here\'s your link: ' . URL::base().'/session/confirmation/'.$reset['link'])
        ->send();

      if($message->was_sent()) {
        return Redirect::to(URL::to_route('session.login'))
          ->with('status_success', __('application.reset_confirm_link'));
      } else {
        $errors->add('errors', __('application.email_error'));
        return Redirect::to(URL::to_route('session.reset'))
          ->with_input()
          ->with_errors($errors);
      }
    } catch (\Exception $e) {
      $errors->add('errors', $e->getMessage());
      return Redirect::to(URL::to_route('session.reset'))
        ->with_input()
        ->with_errors($errors);
    }

    // return View::make('session/reset_confirmation')
      // ->with('title', HtmlHelpers::name('Reset Confirmation'))
      // ->with('hash_link', URL::base().'/session/confirmation/'.$reset['link']);
  }

  public function get_confirmation($email = null, $hash = null) {
    try {
      $confirmation = Sentry::reset_password_confirm($email, $hash);

      if($confirmation) {
        return Redirect::to(URL::to_route('session.login'))->with('status_success', __('application.resset_ok'));
      } else {
        return View::make('session/reset_confirmation_invalid')
          ->with('title', HtmlHelpers::name('reset_invalid_header'));
      }
    } catch (Sentry\SentryException $e) {
      return View::make('session/reset_confirmation_invalid')
        ->with('title', HtmlHelpers::name('reset_invalid_header'));
    }
  }
}
