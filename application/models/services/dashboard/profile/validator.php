<?php

namespace Services\Dashboard\Profile;
use Services\Validation as Validation_Service;

class Validator extends Validation_Service {
  public function __construct($input) {
    if (empty($input['first_name'])) { unset($input['first_name']); }
    if (empty($input['last_name'])) { unset($input['last_name']); }

    parent::__construct($input);
  }

	/**
	 * publish
	 *
	 * @throws ValidateException
	 * @return void
	 */
	public function publish() {
		$this->rules = array(
      'username' => 'required|min:3|max:255|alpha_dash|unique:users,username,' . \Sentry\Sentry::user()->id,
		);

    if (array_key_exists('first_name', $this->input)) {
      $rules = array('first_name' => 'min:3|max:255');
      $this->rules = array_merge($this->rules, $rules);
    }

    if (array_key_exists('last_name', $this->input)) {
      $rules = array('last_name' => 'min:3|max:255');
      $this->rules = array_merge($this->rules, $rules);
    }

		$this->validate();
	}
}


