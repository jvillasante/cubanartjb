<?php

class Dashboard_Controller extends Base_Controller {
  public $restful = true;

  public function __construct() {
    parent::__construct();
    $this->filter('before', 'csrf')->on('post');
    $this->filter('before', 'auth');
  }

  public function get_profile() {
    $current_user = Sentry::user();
    $active_tab = Session::get('active_tab', 'profile');

    return View::make('dashboard.profile')
      ->with('title', HtmlHelpers::name('Profile'))
      ->with('active', 'profile')
      ->with('active_tab', $active_tab)
      ->with('current_user', $current_user);
  }

  public function post_profile() {
    $input = Input::all();

    try {
      $validator = new Services\Dashboard\Profile\Validator($input);
      $validator->publish();
    } catch (ValidateException $errors) {
      return Redirect::to(URL::to_route('dashboard.profile'))
        ->with_input()
        ->with('active_tab', 'profile')
        ->with_errors($errors->get());
    }

    try {
      if(!empty($input['username'])) {
        $input['username'] = filter_var($input['username'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
      }
      if(!empty($input['first_name'])) {
        $input['first_name'] = filter_var($input['first_name'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
      }
      if(!empty($input['last_name'])) {
        $input['last_name'] = filter_var($input['last_name'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
      }

      $errors = new Laravel\Messages();
      $user = Sentry::user();

      $update = $user->update(array(
        'username' => array_get($input, 'username', $user->get('username')),
        'metadata' => array(
          'first_name' => array_get($input, 'first_name', $user->get('metadata.first_name')),
          'last_name'  => array_get($input, 'last_name', $user->get('metadata.last_name')),
        )
      ));
      if ($update) {
        return Redirect::to(URL::to_route('dashboard.profile'))
          ->with('active_tab', 'profile')
          ->with('status_success', __('application.profile_updated'));
      } else {
        $errors->add('errors', __('application.generic_error'));
        return Redirect::to(URL::to_route('dashboard.profile'))
          ->with_input()
          ->with('active_tab', 'profile')
          ->with_errors($errors);
      }
    } catch (Sentry\SentryException $e) {
      $errors->add('errors', $e->getMessage());
      return Redirect::to(URL::to_route('dashboard.profile'))
        ->with_input()
        ->with('active_tab', 'profile')
        ->with_errors($errors);
    }
  }

  public function post_change_password() {
    $input = Input::all();

    try {
      $validator = new Services\Dashboard\Password\Validator($input);
      $validator->publish();
    } catch (ValidateException $errors) {
      return Redirect::to(URL::to_route('dashboard.profile'))
        ->with_input()
        ->with('active_tab', 'password')
        ->with_errors($errors->get());
    }

    try {
      $errors = new Laravel\Messages();
      $user = Sentry::user();

      if ($user->change_password(array_get($input, 'new_password'), array_get($input, 'current_password'))) {
        return Redirect::to(URL::to_route('dashboard.profile'))
          ->with('status_success', __('application.pass_changed'));
      } else {
        $errors->add('errors', __('application.generic_error'));
        return Redirect::to(URL::to_route('dashboard.profile'))
          ->with_input()
          ->with('active_tab', 'password')
          ->with_errors($errors);
      }
    } catch (Sentry\SentryException $e) {
      $errors->add('errors', $e->getMessage());
      return Redirect::to(URL::to_route('dashboard.profile'))
        ->with_input()
        ->with('active_tab', 'password')
        ->with_errors($errors);
    }
  }

  public function get_users() {
    $users = User::with('metadata')->paginate(Config::get('app.paginator_count'));

    return View::make('dashboard.users')
      ->with('title', HtmlHelpers::name('manage_users'))
      ->with('active', 'manage_users')
      ->with('users', $users);
  }

  public function get_users_new() {
    return View::make('dashboard.users_new')
      ->with('title', HtmlHelpers::name('new_user'))
      ->with('active', 'manage_users');
  }

  public function post_users_new() {
    $input = Input::all();

    try {
      $validator = new Services\Dashboard\Users\Add\Validator($input);
      $validator->publish();
    } catch (ValidateException $errors) {
      return Redirect::to(URL::to_route('dashboard.users.new'))
        ->with_input()
        ->with_errors($errors->get());
    }

    try {
      if(!empty($input['username'])) {
        $input['username'] = filter_var($input['username'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
      }
      if(!empty($input['first_name'])) {
        $input['first_name'] = filter_var($input['first_name'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
      }
      if(!empty($input['last_name'])) {
        $input['last_name'] = filter_var($input['last_name'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
      }

      $errors = new Laravel\Messages();
      $vars = array(
        'username' => $input['username'],
        'email'    => $input['email'],
        'password' => 'secret',
        'metadata' => array(
          'first_name' => $input['first_name'],
          'last_name'  => $input['last_name'],
        )
      );
      $user_id = Sentry::user()->create($vars);
      if ($user_id) {
        $permissions = array('is_admin' => 1);

        if (Sentry::user($vars['email'])->update_permissions($permissions)) {
          return Redirect::to(URL::to_route('dashboard.users'))
            ->with('status_success', __('application.user_added'));
        } else {
          $errors->add('errors', $e->getMessage());
          return Redirect::to(URL::to_route('dashboard.users.new'))
            ->with_input()
            ->with_errors($errors);
        }
      } else {
        $errors->add('errors', $e->getMessage());
        return Redirect::to(URL::to_route('dashboard.users.new'))
          ->with_input()
          ->with_errors($errors);
      }

    } catch (Sentry\SentryException $e) {
      $errors->add('errors', $e->getMessage());
      return Redirect::to(URL::to_route('dashboard.users.new'))
        ->with_input()
        ->with_errors($errors);
    }
  }

  public function delete_users_delete($user_id) {
    $current_user = Sentry::user();
    if ($current_user->id == (int)$user_id) {
      return Redirect::to(URL::to_route('dashboard.users'))->with('status_error', __('application.remove_yourself'));
    }

    $errors = new Laravel\Messages();
    try {
      $user = Sentry::user((int)$user_id);

      if ($user) {
        if ($user->delete()) {
          $directory = path('public').'uploads/users/'.sha1($user_id);
          File::rmdir($directory);

          return Redirect::to(URL::to_route('dashboard.users'))->with('status_success', __('application.user_deleted'));
        } else {
        return Redirect::to(URL::to_route('dashboard.users'))
          ->with('status_error', __('application.generic_error'));
        }
      } else {
        return Response::error('404');
      }
    } catch (Sentry\SentryException $e) {
      $errors->add('errors', $e->getMessage());
      return Redirect::to(URL::to_route('dashboard.users'))->with_errors($errors);
    }
  }

  public function get_paintings() {
    $paintings = Painting::paginate(Config::get('app.paginator_count'));

    return View::make('dashboard.paintings')
      ->with('title', HtmlHelpers::name('manage_paintings'))
      ->with('active', 'manage_paintings')
      ->with('paintings', $paintings);
  }

  public function get_paintings_new() {
    return View::make('dashboard.paintings_new')
      ->with('title', HtmlHelpers::name('new_painting'))
      ->with('active', 'manage_paintings');
  }

  public function post_paintings_new() {
    $input = Input::all();
    if (!empty($input['hidden-tags'])) {
      $input['tags'] = explode(',', $input['hidden-tags']);
    }

    try {
      $validator = new Services\Dashboard\Paintings\Add\Validator($input, 'new');
      $validator->publish();
    } catch (ValidateException $errors) {
      return Redirect::to(URL::to_route('dashboard.paintings.new'))
        ->with_input()
        ->with_errors($errors->get());
    }

    $errors = new Laravel\Messages();
    $extension = File::extension($input['painting_image']['name']);
    $directory = path('public').'uploads/paintings/'.sha1($input['name']);
    $filename = "original.{$extension}";
    $upload_success = ImageUtils::upload('painting_image', $directory, $filename);
    $image_path = URL::base().'/uploads/paintings/'.sha1($input['name']);

    if($upload_success) {
      $painting = Painting::create(array(
        'name' => $input['name'],
        'dimensions' => $input['dimensions'],
        'type' => $input['type'],
        'painter' => $input['painter'],
        'year' => $input['year'],
        'comment' => array_get($input, 'comment', null),
        'image_path' => $image_path
      ));

      if ($painting) {
        if (!empty($input['tags'])) {
          $painting->tag($input['tags']);
        }

        return Redirect::to(URL::to_route('dashboard.paintings'))
          ->with('status_success', __('application.painting_added'));
      } else {
        $errors->add('errors', __('application.generic_error'));
        return Redirect::to(URL::to_route('dashboard.paintings.new'))
          ->with_input()
          ->with_errors($errors);
      }
    } else {
      $errors->add('errors', __('application.upload_error'));
      return Redirect::to(URL::to_route('dashboard.paintings.new'))
        ->with_input()
        ->with_errors($errors);
    }
  }

  public function get_paintings_edit($painting_id) {
    $painting = Painting::find($painting_id);

    if ($painting) {
      return View::make('dashboard.paintings_edit')
        ->with('title', HtmlHelpers::name('edit_painting'))
        ->with('active', 'manage_paintings')
        ->with('painting', $painting);
    } else {
      return Response::error(404);
    }
  }

  public function put_paintings_edit($painting_id) {
    $input = Input::all();
    if (!empty($input['hidden-tags'])) {
      $input['tags'] = explode(',', $input['hidden-tags']);
    }

    try {
      $validator = new Services\Dashboard\Paintings\Add\Validator($input);
      $validator->publish();
    } catch (ValidateException $errors) {
      return Redirect::to(URL::to_route('dashboard.paintings.edit', array('painting_id' => $painting_id)))
        ->with_input()
        ->with_errors($errors->get());
    }

    $errors = new Laravel\Messages();
    $painting = Painting::find($painting_id);
    if ($painting) {
      if (!empty($input['painting_image']) && ($input['painting_image']['error'] == 4)) {
        $upload_success = true;
        $image_path = $painting->image_path;
      } else {
        $extension = File::extension($input['painting_image']['name']);
        $directory = path('public').'uploads/paintings/'.sha1($input['name']);
        $filename = "original.{$extension}";
        $upload_success = ImageUtils::upload('painting_image', $directory, $filename);
        $image_path = URL::base().'/uploads/paintings/'.sha1($input['name']);
      }

      if($upload_success) {
        $painting->name = $input['name'];
        $painting->dimensions = $input['dimensions'];
        $painting->type = $input['type'];
        $painting->painter = $input['painter'];
        $painting->year = $input['year'];
        $painting->comment = $input['comment'];
        $painting->image_path = $image_path;

        if ($painting->save()) {
          if (!empty($input['tags'])) {
            $painting->tag($input['tags']);
          }

          return Redirect::to(URL::to_route('dashboard.paintings'))
            ->with('status_success', __('application.painting_updated'));
        } else {
          $errors->add('errors', __('application.generic_error'));
          return Redirect::to(URL::to_route('dashboard.paintings.edit', array('painting_id' => $painting_id)))
            ->with_input()
            ->with_errors($errors);
        }
      } else {
        $errors->add('errors', __('application.generic_error'));
        return Redirect::to(URL::to_route('dashboard.paintings.edit', array('painting_id' => $painting->id)))
          ->with_input()
          ->with_errors($errors);
      }
    } else {
      return Response::error(404);
    }
  }

  public function delete_paintings_delete($painting_id) {
    $painting = Painting::find($painting_id);
    $errors = new Laravel\Messages();

    if ($painting) {
      if ($painting->delete_painting()) {
        return Redirect::to(URL::to_route('dashboard.paintings'))
          ->with('status_success', __('application.painting_deleted'));
      // }

      // if ($painting->delete()) {
        // $directory = path('public').'uploads/paintings/'.sha1($name);
        // File::rmdir($directory);

        // return Redirect::to(URL::to_route('dashboard.paintings'))
          // ->with('status_success', __('application.painting_deleted'));
      } else {
        $errors->add('errors', __('application.generic_error'));
        return Redirect::to(URL::to_route('dashboard.paintings'))->with_errors($errors);
      }
    } else {
      return Response::error(404);
    }
  }

  public function get_slideshow() {
    $slideshow_images = DB::table('slideshow_images')->get();
    if (!$slideshow_images) {
      $slideshow_images = new \stdClass();
    }

    return View::make('dashboard.slideshow')
      ->with('title', HtmlHelpers::name('manage_slideshow'))
      ->with('active', 'manage_slideshow')
      ->with('slideshow', $slideshow_images);
  }

  public function post_slideshow($num) {
    $input = Input::all();

    if (empty($input["image$num"])) {
      $image = DB::table('slideshow_images')->where('number', '=', $num)->first();

      if ($image) {
        $affected = DB::table('slideshow_images')->where('number', '=', $num)->delete();
        if ($affected) {
          $directory = path('public').'uploads/slideshow/'.sha1("image$num");
          File::rmdir($directory);
        }

        return Redirect::to(URL::to_route('dashboard.slideshow'))
          ->with('status_success', __('application.slideshow_deleted'));
      }
    }

    try {
      $validator = new Services\Dashboard\Slideshow\Validator($input, $num);
      $validator->publish();
    } catch (ValidateException $errors) {
      return Redirect::to(URL::to_route('dashboard.slideshow'))
        ->with_input()
        ->with_errors($errors->get());
    }

    $errors = new Laravel\Messages();
    $extension = File::extension($input["image$num"]['name']);
    $directory = path('public').'uploads/slideshow/'.sha1("image$num");
    $filename = "original.{$extension}";
    $upload_success = ImageUtils::upload_slideshow("image$num", $directory, $filename);
    $image_path = URL::base().'/uploads/slideshow/'.sha1("image$num");

    if($upload_success) {
      $image = DB::table('slideshow_images')->where('number', '=', $num)->first();

      if ($image) {
       DB::table('slideshow_images')
        ->where('number', '=', $num)
        ->update(array('image_path' => $image_path));
      } else {
        DB::table('slideshow_images')->insert(array('number' => $num, 'image_path' => $image_path));
      }

      return Redirect::to(URL::to_route('dashboard.slideshow'))
        ->with('status_success', __('application.slideshow_added'));
    } else {
      $errors->add('errors', __('application.generic_error'));
      return Redirect::to(URL::to_route('dashboard.slideshow'))
        ->with_input()
        ->with_errors($errors);
    }
  }

  public function get_paintings_search() {
    list($terms, $paintings) = Search::search_paintings(Input::get('q'));

    return View::make('dashboard.paintings')
      ->with('title', HtmlHelpers::name('manage_paintings'))
      ->with('active', 'manage_paintings')
      ->with('paintings', $paintings);
  }

  public function get_users_search() {
    list($terms, $users) = Search::search_users(Input::get('q'));

    return View::make('dashboard.users')
      ->with('title', HtmlHelpers::name('manage_users'))
      ->with('active', 'manage_users')
      ->with('users', $users);
  }

  public function get_events() {
    $events = GroupEvent::order_by('created_at', 'desc')->paginate(Config::get('app.paginator_count'));

    return View::make('dashboard.events')
      ->with('title', HtmlHelpers::name('manage_events'))
      ->with('active', 'manage_events')
      ->with('events', $events);
  }

  public function get_events_new() {
    return View::make('dashboard.events_new')
      ->with('title', HtmlHelpers::name('new_event'))
      ->with('active', 'manage_events');
  }

  public function post_events_new() {
    $input = Input::all();

    try {
      $validator = new Services\Dashboard\Events\Validator($input);
      $validator->publish();
    } catch (ValidateException $errors) {
      return Redirect::to(URL::to_route('dashboard.events.new'))
        ->with_input()
        ->with_errors($errors->get());
    }

    $errors = new Laravel\Messages();
    if(!empty($input['event_name'])) {
      $input['event_name'] = filter_var($input['event_name'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    }
    if(!empty($input['event_place'])) {
      $input['event_place'] = filter_var($input['event_place'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    }
    if(!empty($input['event_description'])) {
      $input['event_description'] = filter_var($input['event_description'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    }
    if(!empty($input['event_date'])) {
      $pieces = explode("/", $input['event_date']);
      $lang = Config::get('application.language', 'en');
      if ($lang == 'en') {
        $input['event_date'] = date('Y-m-d', mktime(0, 0, 0, $pieces[0], $pieces[1], $pieces[2]));
      } else {
        $input['event_date'] = date('Y-m-d', mktime(0, 0, 0, $pieces[1], $pieces[0], $pieces[2]));
      }
    }

    $event = new GroupEvent;
    $event->name = $input['event_name'];
    $event->place = $input['event_place'];
    $event->event_date = $input['event_date'];
    $event->description = $input['event_description'];
    if ($event->save()) {
      return Redirect::to(URL::to_route('dashboard.events'))
        ->with('status_success', __('application.event_added'));
    } else {
      $errors->add('errors', __('application.generic_error'));
      return Redirect::to(URL::to_route('dashboard.events.new'))
        ->with_input()
        ->with_errors($errors);
    }
  }

  public function get_events_edit($id) {
    $event = GroupEvent::find($id);

    if ($event) {
      return View::make('dashboard.events_edit')
        ->with('title', HtmlHelpers::name('edit_event'))
        ->with('active', 'manage_events')
        ->with('event', $event);
    } else {
      return Response::error(404);
    }
  }

  public function put_events_edit($id) {
    $input = Input::all();

    try {
      $validator = new Services\Dashboard\Events\Validator($input);
      $validator->publish();
    } catch (ValidateException $errors) {
      return Redirect::to(URL::to_route('dashboard.events.edit', array('id' => $id)))
        ->with_input()
        ->with_errors($errors->get());
    }

    $errors = new Laravel\Messages();
    $event = GroupEvent::find($id);
    if ($event) {
      if(!empty($input['event_name'])) {
        $input['event_name'] = filter_var($input['event_name'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
      }
      if(!empty($input['event_place'])) {
        $input['event_place'] = filter_var($input['event_place'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
      }
      if(!empty($input['event_description'])) {
        $input['event_description'] = filter_var($input['event_description'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
      }
      if(!empty($input['event_date'])) {
        $pieces = explode("/", $input['event_date']);
        $lang = Config::get('application.language', 'en');
        if ($lang == 'en') {
          $input['event_date'] = date('Y-m-d', mktime(0, 0, 0, $pieces[0], $pieces[1], $pieces[2]));
        } else {
          $input['event_date'] = date('Y-m-d', mktime(0, 0, 0, $pieces[1], $pieces[0], $pieces[2]));
        }
      }

      $event->name = $input['event_name'];
      $event->place = $input['event_place'];
      $event->event_date = $input['event_date'];
      $event->description = $input['event_description'];
      if ($event->save()) {
        return Redirect::to(URL::to_route('dashboard.events'))
          ->with('status_success', __('application.event_updated'));
      } else {
        $errors->add('errors', __('application.generic_error'));
        return Redirect::to(URL::to_route('dashboard.events.edit'))
          ->with_input()
          ->with_errors($errors);
      }
    } else {
      return Response::error(404);
    }
  }

  public function delete_events_delete($id) {
    $event = GroupEvent::find($id);
    $errors = new Laravel\Messages();

    if ($event) {
      if ($event->delete()) {
        return Redirect::to(URL::to_route('dashboard.events'))
          ->with('status_success', __('application.event_deleted'));
      } else {
        $errors->add('errors', __('application.generic_error'));
        return Redirect::to(URL::to_route('dashboard.events'))->with_errors($errors);
      }
    } else {
      return Response::error(404);
    }
  }

  public function get_events_search() {
    list($terms, $events) = Search::search_events(Input::get('q'));

    return View::make('dashboard.events')
      ->with('title', HtmlHelpers::name('manage_events'))
      ->with('active', 'manage_events')
      ->with('events', $events);
  }
}
