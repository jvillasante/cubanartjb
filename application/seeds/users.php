<?php

class Seed_Users extends \S2\Seed {
  public function grow() {
    $vars = array(
      'username' => 'lbrouwer',
      'email'    => 'brouwerart@cubarte.cult.cu',
      'password' => 'secret',
      'metadata' => array(
        'first_name' => 'Juan Leo',
        'last_name'  => 'Brouwer',
      )
    );
    $this->create_user($vars, true);

    $vars = array(
      'username' => 'ojacas',
      'email'    => 'robertlour@infomed.sld.cu',
      'password' => 'secret',
      'metadata' => array(
        'first_name' => 'Oscar Javier',
        'last_name'  => 'Jacas',
      )
    );
    $this->create_user($vars, true);

    $vars = array(
      'username' => 'jvillasante',
      'email'    => 'jvillasantegomez@gmail.com',
      'password' => 'secret',
      'metadata' => array(
        'first_name' => 'Julio Cesar',
        'last_name'  => 'Villasante',
      )
    );
    $this->create_user($vars, true);

    $vars = array(
      'username' => 'bsimpson',
      'email'    => 'bartsimpson@gmail.com',
      'password' => 'secret',
      'metadata' => array(
        'first_name' => 'Bart',
        'last_name'  => 'Simpson',
      )
    );
    $this->create_user($vars, false);
  }

  // This is optional. It lets you specify the order each seed is grown.
  // Seeds with a lower number are grown first.
  public function order() {
    return 3;
  }

  public function create_user($data, $is_admin) {
    Session::load();
    Bundle::start('sentry');
    try {
      $user_id = Sentry::user()->create($data);
      if ($user_id) {
        if ($is_admin) {
          $permissions = array(
            'is_admin'   => 1 // add is_admin,
          );

          if (Sentry::user($data['email'])->update_permissions($permissions)) {
            // all good
          } else {
            throw new \Exception('Error updation permission.');
          }
        }
      } else {
        throw new \Exception('Error creating user.');
      }
    } catch (Sentry\SentryException $e) {
      throw $e;
    }
  }
}

